from psql import CreateEngine
import csv
import logging
import hashlib

if __name__ == "__main__":
    # Logging config
    logging.basicConfig(format='[%(asctime)s] %(levelname)s (%(filename)s.%(funcName)s): %(message)s', level=logging.DEBUG)

    # Start connection to database
    engine = CreateEngine("setup/credentials.ini", "postgresql")
    engine.connect()

    # Create Admin Table - Contains accounts for teachers / school admin to log in to the web application
    create_admin_query = """
        DROP TABLE IF EXISTS admin;
        CREATE TABLE IF NOT EXISTS admin(
            id INTEGER PRIMARY KEY,
            first_name VARCHAR(25) NOT NULL,
            last_name VARCHAR(25) NOT NULL,
            gender VARCHAR(6),
            email VARCHAR(50) NOT NULL,
            password CHAR(32) NOT NULL
        );
    """
    logging.debug("Creating admin table")
    engine.execute_transaction(create_admin_query)
    logging.debug("admin table successfully created")

    # Insert records to admin table
    with open("setup/data/admin.csv", "r") as f:
        records = [r for r in csv.DictReader(f)]
        for record in records:
            # Convert id to int
            record['id'] = int(record['id'])
            # Encrypt with md5
            record['password'] = hashlib.md5(record['password'].encode('utf-8')).hexdigest()
    logging.debug("Inserting records to admin table")
    engine.insert_rows("admin", records)
    logging.debug("All %s records inserted to admin table", len(records))

    # Close the database connection
    engine.close_connection()
