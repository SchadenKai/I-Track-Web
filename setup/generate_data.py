import random
import names
import datetime
import csv
import hashlib
from password_generator import PasswordGenerator

class DataGenerator:
    def __init__(self):
         # Computer Science curriculum
        self.curriculum = {
            "First Year": {
                1: [
                    {"subject_id": "IT 111", "subject_name": "Introduction to Computing", "units": 3},
                    {"subject_id": "CS 111", "subject_name": "Computer Programming", "units": 3},
                    {"subject_id": "Fili 101", "subject_name": "Kontekstwalisadong Komunikasyon sa Filipino", "units": 3},
                    {"subject_id": "GEd 101", "subject_name": "Understanding the Self", "units": 3},
                    {"subject_id": "GEd 102", "subject_name": "Mathematics in the Modern World", "units": 3},
                    {"subject_id": "Math 111", "subject_name": "Linear Algebra", "units": 3},
                    {"subject_id": "PE 101", "subject_name": "Physical Fitness, Gymnastics and Aerobics", "units": 2}
                ],
                2: [
                    {"subject_id": "CS 121", "subject_name": "Advanced Computer Programming", "units": 3},
                    {"subject_id": "Fili 102", "subject_name": "Filipino sa Iba't Ibang Disiplina", "units": 3},
                    {"subject_id": "GEd 105", "subject_name": "Readings in Philippine History", "units": 3},
                    {"subject_id": "GEd 108", "subject_name": "Art Appreciation", "units": 3},
                    {"subject_id": "Math 401", "subject_name": "Differential Calculus", "units": 3},
                    {"subject_id": "Math 407", "subject_name": "Number Theory", "units": 3},
                    {"subject_id": "PE 102", "subject_name": "Rhythmic Activities", "units": 2}
                ]
            },
            "Second Year": {
                1: [
                    {"subject_id": "CS 211", "subject_name": "Object-Oriented Programming", "units": 3},
                    {"subject_id": "CS 212", "subject_name": "Computer Organization w/ Assembly Language", "units": 3},
                    {"subject_id": "IT 211", "subject_name": "Database Management Systems", "units": 3},
                    {"subject_id": "IT 212", "subject_name": "Computer Networking 1", "units": 3},
                    {"subject_id": "Phy 101", "subject_name": "Calculus-Based Physics", "units": 3},
                    {"subject_id": "CpE 405", "subject_name": "Discrete Mathematics", "units": 3},
                    {"subject_id": "GEd 109", "subject_name": "Science, Technology and Society", "units": 3},
                    {"subject_id": "PE 103", "subject_name": "Individual and Dual Sports", "units": 2}
                ],
                2: [
                    {"subject_id": "CS 221", "subject_name": "Design and Analysis of Algorithms", "units": 3},
                    {"subject_id": "CS 222", "subject_name": "Advanced Object-Oriented Programming", "units": 3},
                    {"subject_id": "IT 221", "subject_name": "Information Management", "units": 3},
                    {"subject_id": "GEd 106", "subject_name": "Purposive Communication", "units": 3},
                    {"subject_id": "GEd 107", "subject_name": "Ethics", "units": 3},
                    {"subject_id": "ES 101", "subject_name": "Environmental Sciences", "units": 3},
                    {"subject_id": "ENGG 414", "subject_name": "Numerical Methods", "units": 3}, 
                    {"subject_id": "PE 104", "subject_name": "Team Sports", "units": 2}                
                ]
            },
            "Third Year": {
                1: [
                    {"subject_id": "CS 311", "subject_name": "Automata Theory and Formal Languages", "units": 3},
                    {"subject_id": "CS 312", "subject_name": "Mobile Computing", "units": 3},
                    {"subject_id": "IT 321", "subject_name": "Human Computer Interaction", "units": 3},
                    {"subject_id": "IT 314", "subject_name": "Web Systems and Technologies", "units": 3},
                    {"subject_id": "IT 331", "subject_name": "Application Development and Emerging Technologies", "units": 3},
                    {"subject_id": "Math 408", "subject_name": "Data Analysis", "units": 3},
                    {"subject_id": "GEd 104", "subject_name": "The Contemporary World", "units": 3}
                ],
                2: [
                    {"subject_id": "CS 321", "subject_name": "Programming Languages", "units": 3},
                    {"subject_id": "CS 322", "subject_name": "Software Engineering", "units": 3},
                    {"subject_id": "CS 324", "subject_name": "Modeling and Simulation", "units": 3},
                    {"subject_id": "Math 409", "subject_name": "Symbolic Logic", "units": 3},
                    {"subject_id": "GEd 103", "subject_name": "Life and Works of Rizal", "units": 3},
                    {"subject_id": "NTT 404", "subject_name": "Cloud Computing", "units": 3}                
                ]
            },
            "Fourth Year": {
                1: [
                    {"subject_id": "CS 411", "subject_name": "CS Thesis 1", "units": 3},
                    {"subject_id": "CS 412", "subject_name": "Fundamentals of Data Science", "units": 3},
                    {"subject_id": "CS 413", "subject_name": "Advanced Software Engineering", "units": 3},
                    {"subject_id": "CS 414", "subject_name": "Artificial Intelligence", "units": 3},
                    {"subject_id": "CS 415", "subject_name": "Principles of Operating Systems", "units": 3},
                    {"subject_id": "CS 424", "subject_name": "Parallel and Distributed Computing", "units": 3}
                ],
                2: [
                    {"subject_id": "CS 421", "subject_name": "CS Thesis 2", "units": 3},
                    {"subject_id": "CS 422", "subject_name": "Machine Learning", "units": 3},
                    {"subject_id": "CS 423", "subject_name": "Social Issues and Professional Practice", "units": 3},
                    {"subject_id": "IT 323", "subject_name": "Information Assurance and Security", "units": 3},
                    {"subject_id": "ENGG 405", "subject_name": "Technopreneurship", "units": 3},
                    {"subject_id": "CS 425", "subject_name": "Systems Fundamentals", "units": 3}
                ]
            }
        }

    @staticmethod        
    def write_csv(filepath, all_data):
        """
        Write a list of dictionary into a local CSV file
        """
        with open(filepath, "w", newline="", encoding = "UTF-8") as f:
            writer = csv.DictWriter(f, all_data[0].keys())
            writer.writeheader()
            writer.writerows(all_data)

    def __get_sr_code(self, year_started):
        """
        Generate Random SR Code for student
        """
        id = random.randint(0, 99999)
        return f"{year_started - 2000}-{id:05d}"
    
    def __get_year_lvl(self, year_started):
        """
        Get Year Level based on the year the student started (assuming all the students are regular)
        """
        year_levels = {2019: "Fourth Year", 2020: "Third Year", 2021: "Second Year", 2022: "First Year"}
        return year_levels[year_started]
        
    def __get_birthdate(self, year_lvl):
        """
        Get a random birthday from student's year level
        """

        birthdate_ranges = {"First Year": (datetime.datetime.strptime("2002-01-01", "%Y-%m-%d"), datetime.datetime.strptime("2004-12-31", "%Y-%m-%d")), "Second Year": (datetime.datetime.strptime("2001-01-01", "%Y-%m-%d"), datetime.datetime.strptime("2003-12-31", "%Y-%m-%d")), "Third Year": (datetime.datetime.strptime("2000-01-01", "%Y-%m-%d"), datetime.datetime.strptime("2002-12-31", "%Y-%m-%d")), "Fourth Year": (datetime.datetime.strptime("1999-01-01", "%Y-%m-%d"), datetime.datetime.strptime("2001-12-31", "%Y-%m-%d"))}

        start,end =  birthdate_ranges[year_lvl]
        delta = end - start
        int_delta = (delta.days * 24 * 60 * 60) + delta.seconds
        random_second = random.randrange(int_delta)
        return (start + datetime.timedelta(seconds=random_second)).strftime("%Y-%m-%d")

    def __get_characteristics(self):
        """
        Generate a list of characteristics from a list of values. Separated by (", ")
        """
        all_characteristics = ['Confident', 'Diligent', 'Punctual', 'Responsible', 'Obedient', 'Self-Disciplined', 'Honest', 'Creative', 'Witty', 'Persistent', 'Consitent', 'Alert', 'Adventurous', 'Adaptable', 'Ambitious', 'Analytical', 'Careful', 'Cooperative']
        return ", ".join(random.sample(all_characteristics, random.randint(3,6)))

    def __get_interests(self):
        all_interests = ['Art', 'Food', 'Travel', 'Programming', 'Photography', 'Sports', 'Yoga', 'Dancing', 'Music', 'Reading Books', 'Volunteering', 'Games']
        return ", ".join(random.sample(all_interests, random.randint(2,4)))

    def __get_subjects(self, year_lvl):
        return ", ".join([subject["subject_id"] for subject in self.curriculum[year_lvl][random.choice([1,2])]])        
        

    def __get_learning_style(self):
        styles = ['Visual', 'Auditory', 'Kinaesthetic / Hands-on', 'Read/Write', 'Logical / Patterns', 'Social', 'Solitary']
        return ", ".join(random.sample(styles, random.randint(2,6)))

    def __generate_password(self):
        pwo = PasswordGenerator()
        pwo.minlen = 8
        pwo.maxlen = 10
        return pwo.generate()

    def generate_student_data(self):
        """
        Generate Student Data for student table in the project database. Refer to the ERD for the proper list and details of the attributes
        """
        # Store all student data into a list of dicitonary `student_data`
        student_data = []
        for _ in range(1000):
            # Each dictionary represent student data. Stored to `current_student`
            current_student = {}

            student_sr_code = self.__get_sr_code(year_started)
            year_started = random.randint(2019, 2022)
            gender = random.choice(["male", "female"])
            year_level = self.__get_year_lvl(year_started)            
            civil_status = random.choices(["Single", "Married"], [0.9, 0.1])[0]
            scholar = random.choice([True, False])
            working_student = random.choices([True, False], [0.2, 0.8])[0]
            activities = random.choices([True, False], [0.2, 0.8])[0]
            transportation = random.choices(['Bus', 'Private Car / Taxi', 'Bicycle', 'Other'],[0.5, 0.4, 0.05, 0.05])[0]
            accomodation = random.choices( ['Apartment', 'Dormitory', 'With Family', 'Other'],[0.3, 0.3, 0.35, 0.05])[0]            

            current_student['sr_code'] = student_sr_code             
            current_student['name'] = names.get_full_name(gender = gender)
            current_student['email'] = f"{student_sr_code}@g.batstate-u.edu.ph"
            current_student['password'] = self.__generate_password()
            current_student['birthdate'] = self.__get_birthdate(year_level)
            current_student['gender'] = gender.title()
            current_student['civil_status'] = civil_status            
            current_student['scholar'] = scholar
            current_student['working_student'] = working_student
            current_student['activities'] = activities
            current_student['transportation'] = transportation
            current_student['accommodation'] = accomodation
            current_student['characteristics'] = self.__get_characteristics()
            current_student['interest'] = self.__get_interests()
            current_student['subjects_enrolled'] = self.__get_subjects(year_level) # Random semester            
            current_student['year_started'] = year_started
            current_student['year_level'] = year_level
            current_student['target_gwa'] = random.choice([1, 1.25, 1.5, 2])
            current_student["learning_style"] = self.__get_learning_style()
            current_student['attended_seminars'] = random.randint(0,10)

            # Append to all student data
            student_data.append(current_student)
        
        DataGenerator.write_csv("setup/data/students.csv", student_data)
            

    def generate_subject_data(self):       

        # Grab all subjects from curriculum
        all_subjects = []
        for year, items in self.curriculum.items():
            for semester, subjects in items.items():
                all_subjects.extend(subjects)

        # Write the data to CSV
        DataGenerator.write_csv("setup/data/subjects.csv", all_subjects)

if __name__ == "__main__":
    generator = DataGenerator()
    generator.generate_student_data()
    generator.generate_subject_data()