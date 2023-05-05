-- Drop all foreign key constraints
ALTER TABLE IF EXISTS class DROP CONSTRAINT IF EXISTS fk_class_admin;
ALTER TABLE IF EXISTS class DROP CONSTRAINT IF EXISTS fk_class_subject;        
ALTER TABLE IF EXISTS scores DROP CONSTRAINT IF EXISTS fk_scores_class;        
ALTER TABLE IF EXISTS scores DROP CONSTRAINT IF EXISTS fk_scores_student;                
ALTER TABLE IF EXISTS bulletin DROP CONSTRAINT IF EXISTS fk_bulletin_class;
ALTER TABLE IF EXISTS health_index DROP CONSTRAINT IF EXISTS fk_health_student;

-- Drop the tables if they exist
DROP TABLE IF EXISTS admin;
DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS subject;  
DROP TABLE IF EXISTS class;
DROP TABLE IF EXISTS scores;
DROP TABLE IF EXISTS bulletin;
DROP TABLE IF EXISTS health_index;

-- Create admin table
-- Contains accounts for teachers / school admin to log in to the web application
CREATE TABLE admin(
    id INTEGER PRIMARY KEY,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    gender VARCHAR(6),
    email VARCHAR(50) NOT NULL,
    password CHAR(32) NOT NULL
);

-- Create student table
-- Contains personal details about the students
CREATE TABLE student(
    sr_code CHAR(8) PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email CHAR(28) NOT NULL, 
    password CHAR(32) NOT NULL,
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
    year_level VARCHAR(11),
    target_gwa NUMERIC(3,2),    
    learning_style VARCHAR(200),
    attended_seminars INTEGER            
);

-- Create subject table  
-- Contains subjects that the admin teaches
CREATE TABLE subject(
    subject_id VARCHAR(10) PRIMARY KEY,
    subject_name VARCHAR(50),
    units INTEGER
);

-- Create class table
-- Contains class that students are enrolled to
CREATE TABLE class(
    class_id VARCHAR(8) PRIMARY KEY,
    admin_id INTEGER,
    subject_id VARCHAR(10),
    semester INTEGER,
    students TEXT,
    CONSTRAINT fk_class_admin FOREIGN KEY(admin_id) REFERENCES admin(id),
    CONSTRAINT fk_class_subject FOREIGN KEY(subject_id) REFERENCES subject(subject_id)            
);

-- Create scores table
-- Contains output scores of students like activity and quiz
CREATE TABLE scores(
    output_id SERIAL PRIMARY KEY,
    student_id CHAR(8),
    category VARCHAR(8),
    score INTEGER,
    overall_score INTEGER,
    timestamp timestamp,
    class_id VARCHAR(8),
    CONSTRAINT fk_scores_class FOREIGN KEY(class_id) REFERENCES class(class_id),
    CONSTRAINT fk_scores_student FOREIGN KEY(student_id) REFERENCES student(sr_code)
);

-- Create bulletin table 
-- Contains posts by admin sent to student in mobile app
CREATE TABLE bulletin(
    post_id SERIAL PRIMARY KEY,
    content TEXT,
    attachment_url TEXT,
    time_created TIMESTAMP,        
    class_id VARCHAR(8),        
    CONSTRAINT fk_bulletin_class FOREIGN KEY(class_id) REFERENCES class(class_id)        
);

-- Create health_index table
-- Contains health info provided by students
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


-- INSERTING DATA
-- Ingesting user data from flat CSV files using COPY command 

-- Insert Admin data
COPY admin FROM '/docker-entrypoint-initdb.d/data/admin.csv'
DELIMITER ','
CSV HEADER;

-- Insert student data
COPY student FROM '/tmp/students.csv'
DELIMITER ','
CSV HEADER;

-- Insert subject data
COPY subject FROM '/tmp/subjects.csv'
DELIMITER ','
CSV HEADER;

-- Insert class data
COPY class FROM '/tmp/class.csv'
DELIMITER ','
CSV HEADER;

-- Insert scores data
COPY scores(student_id, category, score, overall_score, timestamp, class_id) FROM '/tmp/scores.csv'
DELIMITER ','
CSV HEADER;

-- Insert bulletin data
COPY bulletin(content, attachment_url, time_created, class_id) FROM '/tmp/bulletin.csv'
DELIMITER ','
CSV HEADER;

-- Insert health_index data
COPY health_index(student_id, has_chronic_disease, currently_ill, admitted_to_hospital, injured, mood, health_condition, date) FROM '/tmp/health_index.csv'
DELIMITER ','
CSV HEADER;

-- Alter student table
-- Add grade column
ALTER TABLE student ADD column grade numeric(5,2);
WITH student_grades AS (SELECT student_id, ROUND(AVG(score::decimal/overall_score) * 100, 2) as n FROM scores GROUP BY student_id) UPDATE student SET grade = sg.n FROM student_grades AS sg WHERE sr_code = sg.student_id;

-- reset_tokens - store token when the user tried to reset the password
CREATE TABLE reset_tokens(
    id SERIAL PRIMARY KEY,
    email VARCHAR(50), 
    reset_token CHAR(64) NOT NULL, 
    created_at DATE
);