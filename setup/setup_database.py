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
    query = """
        DROP TABLE IF EXISTS admin;
        CREATE TABLE admin(
            id INTEGER PRIMARY KEY,
            first_name VARCHAR(25) NOT NULL,
            last_name VARCHAR(25) NOT NULL,
            gender VARCHAR(6),
            email VARCHAR(50) NOT NULL,
            password CHAR(32) NOT NULL
        );
    """
    logging.debug("Creating admin table")
    engine.execute_transaction(query)
    logging.debug("admin table successfully created")
    
    # Create student table
    query = """
        DROP TABLE IF EXISTS student;
        CREATE TABLE student(
            sr_code CHAR(8) PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            address VARCHAR(200),
            birthdate DATE,
            gender VARCHAR(6),
            civil_status VARCHAR(7),
            scholar BOOLEAN,
            activities BOOLEAN,
            transportation VARCHAR(30),
            accommodation VARCHAR(30),
            characteristics VARCHAR(200),
            interest VARCHAR(200),
            subjects_enrolled VARCHAR(1000),
            year_started INTEGER,
            year_level VARCHAR(10),
            target_gwa NUMERIC(3,2),
            attended_seminars INTEGER,
            learning_style VARCHAR(200)
        )
    """
    
    logging.debug("Creating student table")
    engine.execute_transaction(query)
    logging.debug("student table successfully created")
    
    # Create subject table - details of subjects
    query = """
    DROP TABLE IF EXISTS subject;
    CREATE TABLE subjects(
        subject_id VARCHAR(10) PRIMARY KEY,
        subject_name VARCHAR(50),
        units INTEGER
    )
    """

    logging.debug("Creating subjects table")
    engine.execute_transaction(query)
    logging.debug("subjects table successfully created")

    # Create scores table - contains outputs of students like quiz/activity scores
    query = """
    DROP TABLE IF EXISTS scores;
    CREATE TABLE scores(
        output_id SERIAL PRIMARY KEY,
        category VARCHAR(8) NOT NULL,
        score INTEGER,
        overall_score INTEGER,
        timestamp TIMESTAMP,
        class_id VARCHAR(8)
    )
    """

    logging.debug("Creating scores table")
    engine.execute_transaction(query)
    logging.debug("scores table successfully created")    
    
    # Create bulletin table - contains posts from admin to their class
    query = """
    DROP TABLE IF EXISTS bulletin;
    CREATE TABLE bulletin(
        post_id SERIAL PRIMARY KEY,
        content TEXT,
        attachment_url TEXT,
        time_created TIMESTAMP,
        admin_id INTEGER,
        class_id VARCHAR(8)
    )
    """

    logging.debug("Creating bulletin table")
    engine.execute_transaction(query)
    logging.debug("bulletin table successfully created")    
    
    
    # Create class table - contains posts from admin to their class
    query = """
    DROP TABLE IF EXISTS class;
    CREATE TABLE class(
        class id VARCHAR(8) PRIMARY KEY,
        admin_id INTEGER,
        subject_id VARCHAR(10),
        student_id VARCHAR(8)
    )
    """

    logging.debug("Creating class table")
    engine.execute_transaction(query)
    logging.debug("class table successfully created")    
    
    ### Add Table Foreign key references
    # Foreign key for scores.class_id referencing class.class_id
    engine.execute_transaction("ALTER TABLE scores ADD CONSTRAINT fk_scores_class FOREIGN KEY (class_id) REFERENCES class(class_id);")
    
    # Foreign key for bulletin.admin_id referencing admin.id
    engine.execute_transaction("ALTER TABLE bulletin ADD CONSTRAINT fk_bulletin_admin FOREIGN KEY (admin_id) REFERENCES admin(id);")
    # Foreign key for bulletin.class_id referencing admin.id
    engine.execute_transaction("ALTER TABLE bulletin ADD CONSTRAINT fk_bulletin_class FOREIGN KEY (class_id) REFERENCES class(class_id);")
    
    # Foreign key for class.admin_id referencing admin.id
    engine.execute_transaction("ALTER TABLE")
    
    ### Insert Table Records
    

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
