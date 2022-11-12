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

    ### DROP all foreign key constraints
    query = """
        ALTER TABLE IF EXISTS class DROP CONSTRAINT fk_class_admin;
        ALTER TABLE IF EXISTS class DROP CONSTRAINT fk_class_subject;
        ALTER TABLE IF EXISTS class DROP CONSTRAINT fk_class_student;
        ALTER TABLE IF EXISTS scores DROP CONSTRAINT fk_scores_class;
        ALTER TABLE IF EXISTS bulletin DROP CONSTRAINT fk_bulletin_admin;
        ALTER TABLE IF EXISTS bulletin DROP CONSTRAINT fk_bulletin_class;
        ALTER TABLE IF EXISTS health_index DROP CONSTRAINT fk_health_student;
    """
    logging.debug("Dropping foreign key constraints")
    engine.execute_transaction(query)
    logging.debug("All FKs dropped")
    
    ### Create the Tables
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
    
    
    # Create student Table - Contains personal details about the students
    query = """
        DROP TABLE IF EXISTS student;
        CREATE TABLE student(
            sr_code CHAR(8) PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            birthdate DATE,
            gender VARCHAR(6),
            civil_status VARCHAR(7),
            scholar BOOLEAN,
            working_student BOOLEAN,
            activities BOOLEAN,
            transportation VARCHAR(30),
            accomodation VARCHAR(30),
            characteristics VARCHAR(200),
            interest VARCHAR(200),
            subjects_enrolled VARCHAR(1000),
            year_started INTEGER,
            year_level VARCHAR(10),
            target_gwa NUMERIC(3,2),
            attended_seminars INTEGER,
            learning_style VARCHAR(200)            
        );
    """
    logging.debug("Creating subject table")
    engine.execute_transaction(query)
    logging.debug("subject table successfully created")
    
    
    # Create subject table - Contains subjects that the admin teaches
    query = """       
        DROP TABLE IF EXISTS subject;    
        CREATE TABLE subject(
            subject_id VARCHAR(10) PRIMARY KEY,
            subject_name VARCHAR(50),
            units INTEGER
        );
    """
    logging.debug("Creating subject table")
    engine.execute_transaction(query)
    logging.debug("subject table successfully created")
    
    
    # Create class - contains class that students are enrolled to
    query = """        
        DROP TABLE IF EXISTS class;    
        CREATE TABLE class(
            class_id VARCHAR(8) PRIMARY KEY,
            admin_id INTEGER,
            subject_id VARCHAR(10),
            student_id CHAR(8),
            CONSTRAINT fk_class_admin FOREIGN KEY(admin_id) REFERENCES admin(id),
            CONSTRAINT fk_class_subject FOREIGN KEY(subject_id) REFERENCES subject(subject_id),
            CONSTRAINT fk_class_student FOREIGN KEY(student_id) REFERENCES student(sr_code)
        );
    """
    logging.debug("Creating class table")
    engine.execute_transaction(query)
    logging.debug("class table successfully created")
    
    # Create scores table - Contains output scores of students
    query = """    
    DROP TABLE IF EXISTS scores;
    CREATE TABLE scores(
        output_id SERIAL PRIMARY KEY,
        category VARCHAR(8),
        score INTEGER,
        overall_score INTEGER,
        timestamp timestamp,
        class_id VARCHAR(8),
        CONSTRAINT fk_scores_class FOREIGN KEY(class_id) REFERENCES class(class_id)
    );
    """
    logging.debug("Creating scores table")
    engine.execute_transaction(query)
    logging.debug("scores table successfully created")
    
    # Create bulletin table - contains posts by admin sent to student in mobile app
    query = """    
    DROP TABLE IF EXISTS bulletin;
    CREATE TABLE bulletin(
        post_id SERIAL PRIMARY KEY,
        content TEXT,
        attachment_url TEXT,
        time_created TIMESTAMP,
        admin_id INTEGER,
        class_id VARCHAR(8),
        CONSTRAINT fk_bulletin_admin FOREIGN KEY(admin_id) REFERENCES admin(id),
        CONSTRAINT fk_bulletin_class FOREIGN KEY(class_id) REFERENCES class(class_id)        
    );
    """
    logging.debug("Creating bulletin table")
    engine.execute_transaction(query)
    logging.debug("bulletin table successfully created")
    
    # Create health_index table - contains health info provided by students
    query = """    
    DROP TABLE IF EXISTS health_index;
    CREATE TABLE health_index(
        id SERIAL PRIMARY KEY,
        student_id CHAR(8),
        has_chronic_disease BOOLEAN,
        currently_ill BOOLEAN,
        admitted_to_hospital BOOLEAN,
        injured BOOLEAN,
        mood INTEGER,
        health_condition INTEGER,
        date DATE,
        CONSTRAINT fk_health_student FOREIGN KEY(student_id) REFERENCES student(sr_code)
    );
    """
    logging.debug("Creating health_index table")
    engine.execute_transaction(query)
    logging.debug("health_index table successfully created")
 
    
    
    ### Insert data to database tables

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
