import psycopg2
from configparser import ConfigParser
import logging 

class CreateEngine:
    def __init__(self, filename, section):
        self.__credentials = self.__read_credentials(filename, section)

    def __read_credentials(self, filename, section="postgresql"):        
        """
        Read PostgreSQL database credentials from a .ini file 

        Parameters:
        -----------
        - filename: string. Path + name of the file 
        - section: string, optional. Section in ini file that contains the PostgreSQL database credentials

        Returns:
        -----------
        - credentials: dict. Dictionary containing the database credentials

        Example:
        -----------
        >>> credentials = read_credentials("database.ini")
        >>> print(credentials)        
        {
            'host': '<your-database-host>',
            'database': '<your-database-name>',
            'user': '<your-database-user>',
            'password': '<your-user-password>'
        }
        """
        
        # read config file
        parser = ConfigParser()
        parser.read(filename)

        # get content of a section in config file and save it in `credentials`
        credentials = {}
        if parser.has_section(section):
            params = parser.items(section)
            for param in params:
                credentials[param[0]] = param[1]
        else:
            raise Exception(f"Section {section} not found in {filename}")

        return credentials

    def connect(self):
        """
        Start connection on database using self.__credentials
        """
        self.__conn = psycopg2.connect(**self.__credentials)
        self.__cursor = self.__conn.cursor()
        logging.debug("Connection established")

    def execute_transaction(self, query):
        """
        Execute SQL transactions (Create, Update, Delete, etc.)
        """
        with self.__conn as conn:
            with conn.cursor() as cursor:
                cursor.execute(query)        
    
    def insert_rows(self, table_name, records):
        """
        Insert rows in a table inside the database

        Parameters:
        -----------
        - table_name: string. Table name in the database
        - records: list[dict]. Table records individually in the format of dictionary stored in a list

        Returns:
        -----------
        - None
        """

        tables = {
            "admin": "%(id)s, %(first_name)s, %(last_name)s, %(gender)s, %(email)s, %(password)s"
        }

        columns = tables[table_name]

        # Chunk insert - Insert at most 1000 records at a time
        for i in range(0, len(records), 1000):
            chunk_data = records[i:i+1000]
            crunched_records = b','.join(self.__cursor.mogrify(f"({columns})", record) for record in chunk_data)
            self.execute_transaction(f"INSERT INTO {table_name} VALUES {crunched_records.decode()}")
            logging.debug("Inserted %s rows to %s table", len(chunk_data), table_name)

    def close_connection(self):
        """
        Close the database connection
        """

        try:
            self.__cursor.close()
            self.__conn.close()
        except AttributeError:
            logging.error("Cursor not present. Attempt to close an uninitialized session failed")
        else:
            logging.debug("Connection closed")