import psycopg2
from configparser import ConfigParser
import logging 
import csv

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
        self.__cursor.execute("BEGIN")
        self.__cursor.execute(query)  
        self.__cursor.execute("COMMIT")      
    
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
            "admin": {
                "columns": 'id, first_name, last_name, gender, email, password', 
                "values": "%(id)s, %(first_name)s, %(last_name)s, %(gender)s, %(email)s, %(password)s"
                },
            "subject": {
                "columns": "subject_id, subject_name, units",
                "values": "%(subject_id)s, %(subject_name)s, %(units)s"
                },
            "student": {
                "columns": "sr_code, name, email, password, birthdate, gender, civil_status, scholar, working_student, activities, transportation, accomodation, characteristics, interest, subjects_enrolled, year_started, year_level, target_gwa, attended_seminars, learning_style",
                "values": "%(sr_code)s, %(name)s, %(email)s, %(password)s, %(birthdate)s, %(gender)s, %(civil_status)s, %(scholar)s, %(working_student)s, %(activities)s, %(transportation)s, %(accommodation)s, %(characteristics)s, %(interest)s, %(subjects_enrolled)s, %(year_started)s, %(year_level)s, %(target_gwa)s, %(attended_seminars)s, %(learning_style)s"
                },
            "class": {
                "columns": "class_id, admin_id, subject_id, semester, students",
                "values": "%(class_id)s, %(admin_id)s, %(subject_id)s, %(semester)s, %(students)s"
                },            
            "scores": {
                "columns": "student_id, category, score, overall_score, timestamp, class_id",
                "values": "%(student_id)s, %(category)s, %(score)s, %(overall_score)s, %(timestamp)s, %(class_id)s"
                },            
            "bulletin": {
                "columns": "content, attachment_url, time_created, class_id",
                "values": "%(content)s, %(attachment_url)s, %(time_created)s, %(class_id)s"
                },
            "health_index": {
                "columns": "student_id, has_chronic_disease, currently_ill, admitted_to_hospital, injured, mood, health_condition, date",
                "values": "%(student_id)s, %(has_chronic_disease)s, %(currently_ill)s, %(admitted_to_hospital)s, %(injured)s, %(mood)s, %(health_condition)s, %(date)s",
                }
        }

   

        values = tables[table_name]["values"]
        columns = tables[table_name]["columns"]

        # Chunk insert - Insert at most 50000 records at a time
        for i in range(0, len(records), 50000):
            chunk_data = records[i:i+50000]
            crunched_records = b','.join(self.__cursor.mogrify(f"({values})", record) for record in chunk_data)
            self.execute_transaction(f"INSERT INTO {table_name}({columns}) VALUES {crunched_records.decode()}")
            logging.debug("Inserted %s rows to %s table", len(chunk_data), table_name)

    def fetch_records(self, table_name: str):
        self.__cursor.execute(f"SELECT * FROM {table_name};")
        return self.__cursor.fetchall()

    def custom_fetch(self, select_query):
        self.__cursor.execute(select_query)
        results = self.__cursor.fetchall()
        if len(results) == 1:
            return results[0]
        return results

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

    def read_csv(self, filepath):
        with open(filepath, "r", encoding = "UTF-8") as f:
            reader = csv.DictReader(f)            
            return [r for r in reader]