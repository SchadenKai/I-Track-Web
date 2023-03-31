import random
import names
import datetime
import csv
import logging
import json
import os
from password_generator import PasswordGenerator
from scipy.stats import skewnorm

class DataGenerator:    

    def __init__(self):       

        # in 1 semester(5 months: 2 exam, weekly quiz and activity. Set the attendance for class A as MTW, B as WThF, C as FSS
        # Semester 2 starts in week 4 (end of Jan). Semester 1 in week 31 (start of Aug)
        self.semester_starting_week = {
            1: 31,
            2: 4                    
        }

        # What day of week should a student attend? Those from class A attends day 1,2,3
        self.days_of_class = {
            "A": [1,2,3],
            "B": [3,4,5],
            "C": [5,6,7]
        }

        # Computer Science curriculum
        with open(f"{os.path.dirname(os.path.abspath(__file__))}/data/curriculum.json") as f:
            self.curriculum = json.load(f)
        
    @staticmethod        
    def write_csv(filename, all_data):
        """
        Write a list of dictionary into a local CSV file

        Parameter:
        -----------
        filepath: str
            Path of the local CSV file
        all_data: list[dict]
            List of dictionaries with each dictionary containing the record for a given row

        Returns:
        -----------
        None
        """
        with open(f"/tmp/{filename}", "w", newline="", encoding = "UTF-8") as f:
            writer = csv.DictWriter(f, all_data[0].keys())
            writer.writeheader()
            writer.writerows(all_data)

    @staticmethod
    def read_csv(filepath):
        """
        Read a local CSV file.

        Parameter:
        -----------
        filepath: str
            Path of the local CSV file

        Returns:
        -----------
        records: list[dict]
            List of dictionaries with each dictionary containing the record for a given row
        """
        with open(filepath, "r", encoding = "UTF-8") as f:
            reader = csv.DictReader(f)            
            return [r for r in reader]
    
    def __get_year_lvl(self, year_started):
        """
        Get Year Level based on the year the student started (assuming all the students are regular)
        IMPORTANT: This is based on the date when the project is created (year 2022). That is why the students that started this year(2022) are first years

        Parameter:
        -----------
        year_started: int
            Year that the student enrolled to college

        Returns:        
        -----------
        year_level: str

        Example:
        -----------
        >>> print(__get_year_lvl(2020))
        Third Year
        """
        year_levels = {2019: "Fourth Year", 2020: "Third Year", 2021: "Second Year", 2022: "First Year"}
        return year_levels[year_started]
        
    def __get_birthdate(self, year_lvl):
        """
        Get a random birthday based on student's year level. 
        IMPORTANT: This is based on the approximate ages of college student when the project is made (year 2022)

        Parameter:
        -----------
        year_lvl: int
            Current year level of the student        

        Returns:
        -----------
        birthdate: str
            Random Birthday date of the student in yyyy-mm-dd format

        Example:
        -----------
        >>> # Get a random birthday date for a first year student.
        >>> print(__get_birthdate(1))
        2003-10-15
        """

        birthdate_ranges = {"First Year": (datetime.datetime.strptime("2002-01-01", "%Y-%m-%d"), datetime.datetime.strptime("2004-12-31", "%Y-%m-%d")), "Second Year": (datetime.datetime.strptime("2001-01-01", "%Y-%m-%d"), datetime.datetime.strptime("2003-12-31", "%Y-%m-%d")), "Third Year": (datetime.datetime.strptime("2000-01-01", "%Y-%m-%d"), datetime.datetime.strptime("2002-12-31", "%Y-%m-%d")), "Fourth Year": (datetime.datetime.strptime("1999-01-01", "%Y-%m-%d"), datetime.datetime.strptime("2001-12-31", "%Y-%m-%d"))}

        start,end =  birthdate_ranges[year_lvl]
        delta = end - start
        int_delta = (delta.days * 24 * 60 * 60) + delta.seconds
        random_second = random.randrange(int_delta)
        birthdate = (start + datetime.timedelta(seconds=random_second)).strftime("%Y-%m-%d")
        logging.debug("Random birthday date for %s level student generated, %s", year_lvl, birthdate)
        return birthdate

    def __get_characteristics(self):
        """
        Get 3-6 random characteristics to apply on student data

        Returns:
        -----------
        characteristics: str
            Comma separated combination of random characteristics

        Example:
        -----------
        >>> print(__get_characteristics())
        Careful, Confident, Diligent, Witty
        """
        all_characteristics = ['Confident', 'Diligent', 'Punctual', 'Responsible', 'Obedient', 'Self-Disciplined', 'Honest', 'Creative', 'Witty', 'Persistent', 'Consitent', 'Alert', 'Adventurous', 'Adaptable', 'Ambitious', 'Analytical', 'Careful', 'Cooperative']
        randomized_characteristics = random.sample(all_characteristics, random.randint(3,6))
        logging.debug("%s random characteristics chosen, %s", len(randomized_characteristics), randomized_characteristics)
        return ", ".join(randomized_characteristics)

    def __get_interests(self):
        """
        Get 2-4 random interests to apply on student data. 

        Returns:
        -----------
        interests: str
            Comma separated combination of random interests

        Example:
        -----------
        >>> print(__get_interests())
        Music, Food, Travel
        """
        all_interests = ['Art', 'Food', 'Travel', 'Programming', 'Photography', 'Sports', 'Yoga', 'Dancing', 'Music', 'Reading Books', 'Volunteering', 'Games']
        random_interests = random.sample(all_interests, random.randint(2,4))
        logging.debug("%s random interests chosen, %s", len(random_interests), random_interests)
        return ", ".join(random_interests)

    def __get_subjects(self, year_lvl):
        """
        Get all the subjects (subject_id) for a given year and random semester

        Returns:
        -----------
        subjects: str
            Comma separated list of subjects (subject_id) for a given year-semester
        
        Example:
        -----------
        >>> # Get the subjects for year 1 and a random semester, say 2nd
        >>> print(__get_subjects(1))        
        CS 121, Fili 102, GEd 105, ...
        """
        return ", ".join([subject["subject_id"] for subject in self.curriculum[year_lvl][str(random.choice([1,2]))]])        
        

    def __get_learning_style(self):
        """
        Get 2-6 random learning styles from the list below

        Returns:
        -----------
        learning_styles: str
            Comma separated combination of random learning styles

        Example:
        -----------
        >>> print(__get_learning_style())
        Visual, Solitary, Auditory
        """

        styles = ['Visual', 'Auditory', 'Kinaesthetic / Hands-on', 'Read/Write', 'Logical / Patterns', 'Social', 'Intuitive']
        random_learning_styles = random.sample(styles, random.randint(2,6))
        logging.debug("%s random learning styles chosen, %s", len(random_learning_styles), random_learning_styles)
        return ", ".join(random_learning_styles)

    def __generate_password(self):
        """
        Generate a random 8-10 characters password 

        Returns:
        -----------
        password: str
            Random password 

        Example:        
        -----------
        >>> print(__generate_password())
        6^KhoW8#t_
        """
        pwo = PasswordGenerator()
        pwo.minlen = 8
        pwo.maxlen = 10
        password = pwo.generate()
        logging.debug("%s characters password generated, %s", len(password), password)
        return password

    def generate_student_data(self):
        """
        Generate Student Data for student table in the project database. Refer to the ERD for the proper list and details of the attributes
        """
        # Store all student data into a list of dicitonary `student_data`
        self.student_data = []
        logging.debug("Generating 720 random students accross 4 years of BS in Computer Science")
        
        all_sr_code_ids = random.sample(range(0, 99999), 720)
        for i in range(720):
            # Each dictionary represent student data. Stored to `current_student`
            current_student = {}

            year_started = random.randint(2019, 2022)
            student_sr_code = f"{year_started - 2000}-{all_sr_code_ids[i]:05d}"            
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
            self.student_data.append(current_student)
        
        csv_filepath = "students.csv"
        DataGenerator.write_csv(csv_filepath, self.student_data)
        logging.info("720 dummy student data written to %s", csv_filepath)
            

    def generate_subject_data(self):       
        """
        List out all the subjects based on CS curriculum. Write the output to a local CSV file in subjects.csv        
        """

        # Grab all subjects from curriculum
        all_subjects = []
        for _, items in self.curriculum.items():
            for _, subjects in items.items():
                all_subjects.extend(subjects)

        # Write the data to CSV
        csv_filepath = "subjects.csv"
        DataGenerator.write_csv(csv_filepath, all_subjects)
        logging.info("%s subject data based on Batangas State University's Computer Science curriculum written to %s", len(all_subjects), csv_filepath)


    def __generate_class_id_template(self, subject_id, units, year, semester, subject_number):
        """
        Generate class id using the parameters above. 

        Parameters:
        -----------
            subject_id: str
                Id of a subject based on CS curriculum
            units: int
                Number of units [2-3] for that subject
            year: int
                Year [1-4] where the subject is taught
            semester: int
                Semester [1-2] where the subject is taught
            subject_number
                Position of the subject [1-n] in the list (based on curriculum)

        Returns:
        -----------
        class_id_template: string
            Generated class id template

        Example:
        -----------
        For example, "Understanding the Self" is the 4th subject in 1st year 2nd Semester of CS Curriculum. Its class_id template would be "CS 114"
        """
        if units == 2 or "GEd" in subject_id:
            subject_classification = "GED"
        else:
            subject_classification = "CS"
        class_id_template = f'{subject_classification} {year}{semester}{subject_number}'
        logging.debug("Random class_id_template template generated, %s", class_id_template)
        return class_id_template

    def __split_list(self, a, n):
        """
        Split list a into n equal parts
        """
        k, m = divmod(len(a), n)
        return (a[i*k+min(i, m):(i+1)*k+min(i+1, m)] for i in range(n))

    def __fetch_class_student(self, subject_id):
        """
        Based on self.student_data, find the students enrolled in a given subject. Split the list into 3 approximately equal parts to separate them to sections A,B,C
        """
        students = [i["sr_code"] for i in self.student_data if subject_id in i['subjects_enrolled']]
        logging.debug("Found %s students enrolled to %s subject.", len(students) + 1, subject_id)
        return list(self.__split_list(students, 3))


    def generate_class_data(self):
        """
        Generate class data for database.class table. Write the output to a local CSV file in class.csv
        """
        self.all_classes = []

        all_admins = DataGenerator.read_csv(f"{os.path.dirname(os.path.abspath(__file__))}/data/admin.csv")
        int_equivalent = {"First Year": 1, "Second Year": 2, "Third Year": 3, "Fourth Year": 4}
        
        # Loop over the CS curriculum. Declared in __init__
        admin_index = 0         
        for year, items in self.curriculum.items():
            # Get the numerical equivalent of current year
            year_number = int_equivalent[year]                        
            for semester, subjects in items.items(): 
                # Loop over the subjects over the list    
                  
                for index, subject in enumerate(subjects):    
                    subject_id = subject["subject_id"]
                    class_id_template = self.__generate_class_id_template(subject_id, subject["units"], year_number, semester, index + 1)
                    # Grab the admin for this subject
                    current_admin = all_admins[admin_index]                    
                    enrolled_students = self.__fetch_class_student(subject_id)
                    
                    # Assuming there are 3 sections per year, it is only proper to create 3 classes for that specific subject
                    for section_number, section in enumerate(["A", "B", "C"]):           
                        current_class = {}               

                        current_class["class_id"] = f"{class_id_template}{section}"                        
                        current_class["admin_id"] = current_admin["id"]                        
                        current_class["subject_id"] = subject_id
                        current_class["semester"] = int(semester)
                        current_class["students"] = ", ".join(enrolled_students[section_number % 3])

                        self.all_classes.append(current_class)

                    # An admin can only have 2 subjects with 3 sections each handled at most. 
                    logging.info("Admin %s assigned to 3 classes for %s subject", current_admin, subject_id)
                    if index % 2 == 1 or index + 1 == len(subjects):
                        admin_index += 1

        # Write the data to CSV
        csv_filepath = "class.csv"
        DataGenerator.write_csv(csv_filepath, self.all_classes)
        logging.info("55 classes with 3 sections each totalling to 165 records generated and written to local CSV file %s", csv_filepath)

    def __generate_category_list(self, start_week):
        categories = {}
        for first_half, second_half in zip(range(start_week, start_week + 8), range(start_week + 9, start_week + 17)):
            categories[first_half] = random.choice(["quiz", "activity"])
            categories[second_half] = random.choice(["quiz", "activity"])
        categories[start_week + 8] = "exam"
        categories[start_week + 17] = "exam"

        return categories


    def generate_scores_data(self):
        category_max_score_ranges = {
            "exam": (40, 70),
            "quiz": (10, 45),
            "activity": (50, 100)
        }
        scores_data = []
        for classroom in self.all_classes:
            start_week = self.semester_starting_week[classroom["semester"]]
            categories = self.__generate_category_list(start_week)
            categories = dict(sorted(categories.items()))
            # Get the days the student from the class should attend. 
            schedule = self.days_of_class[classroom["class_id"][-1]]
            for week_number, category in categories.items():
                students = classroom["students"].split(", ")
                # Generate the score data for all students in this classroom         
                random_day_of_week = datetime.datetime.strptime(f"2022-W{week_number}-{random.choice(schedule)}", "%G-W%V-%u").strftime("%Y-%m-%d %H:%M")
                
                # Random total score that is a multiple of 5
                total_score = random.randint(*category_max_score_ranges[category]) // 5 * 5

                # Generate negatively skewed score distribution for a given activity/quiz/exam
                skewness = -4
                amount_of_values = len(students)
                random_percentages = skewnorm.rvs(a = skewness, loc = 100, size = amount_of_values)
                random_percentages = random_percentages - min(random_percentages) * (random.randrange(95, 100) / 100)
                random_percentages = random_percentages / max(random_percentages) 

                # Multiply the percentages to total score of the output
                class_score = [int(i) for i in random_percentages*total_score]
                logging.debug("Generating scores out of %s for %s output @%s in class %s", total_score, category, random_day_of_week, classroom["class_id"])
                for i in range(len(students)):
                    student_score = {
                        "student_id": students[i],
                        "category": category,
                        "score": class_score[i],
                        "overall_score": total_score,
                        "timestamp": random_day_of_week, 
                        "class_id": classroom["class_id"]
                    }
                    scores_data.append(student_score)

        # Write the data to CSV
        csv_filepath = "scores.csv"
        DataGenerator.write_csv(csv_filepath, scores_data)
        logging.info("%s dummy data for scores table generated and written to local CSV file %s", len(scores_data), csv_filepath)

    def generate_bulletin_data(self):
        """
        Generate a simple announcement ('Hello everyone') for bulletin table. Every class_id in class table will have this announcement.
        """

        bulletin = []

        # for all classes
        for classroom in self.all_classes:
            announcement = {
                "content": "Hello everyone", 
                "attachment_url": None,
                "time_created": datetime.datetime.now().strftime("%Y-%m-%d %H:%M"), 
                "class_id": classroom["class_id"]
            }
            bulletin.append(announcement)
        
        # Write the data to CSV
        csv_filepath = "bulletin.csv"
        DataGenerator.write_csv(csv_filepath, bulletin)
        logging.info("%s announcements for bulletin table generated and written to local CSV file %s", len(bulletin), csv_filepath)


    def generate_health_index_data(self):
        health_indexes = []
        
        
        # I think I can change the loop to use class.students instead. This way I can also get the class_id and determine if student is in section A,B, or C.
        for classroom in self.all_classes:
            # Get the week the student should attend based on their enrolled semester
            start_week = self.semester_starting_week[classroom["semester"]]
            # Get the days the student from the class should attend. 
            schedule = self.days_of_class[classroom["class_id"][-1]]

            # Generate the health data for all students in this classroom
            for student in classroom["students"].split(", "):       
                # Health in the normal class days
                for week_number in range(start_week, start_week + 17):
                    for day_of_week in schedule[:2]:                        
                        current_date_health = {
                            "student_id": student,
                            "has_chronic_disease": random.choices([True, False], [0.005, 0.995])[0],
                            "currently_ill": random.choices([True, False], [0.05, 0.95])[0],
                            "admitted_to_hospital": random.choices([True, False], [0.005, 0.995])[0],
                            "injured": random.choices([True, False], [0.005, 0.995])[0],
                            "mood": random.choices(list(range(0,101,25)), [0.1, 0.2, 0.3, 0.2, 0.2])[0],
                            "health_condition": random.choices(list(range(0,101,25)), [0.05, 0.1, 0.2, 0.3, 0.35])[0],
                            "date": datetime.datetime.strptime(f"2022-W{week_number}-{day_of_week}", "%G-W%V-%u").strftime("%Y-%m-%d")
                        }

                        health_indexes.append(current_date_health)
                    logging.debug("Generated 2 health indexes input for %s in ISO week number %s", student, week_number)

        # Write the data to CSV
        csv_filepath = "health_index.csv"
        DataGenerator.write_csv(csv_filepath, health_indexes)
        logging.info("%s records of health index generated and written to local CSV file %s", len(health_indexes), csv_filepath)

if __name__ == "__main__":
    # Logging config
    logging.basicConfig(format='[%(asctime)s] %(levelname)s (%(filename)s.%(funcName)s): %(message)s', level=logging.DEBUG)


    generator = DataGenerator()
    generator.generate_student_data()
    generator.generate_subject_data()
    generator.generate_class_data()
    generator.generate_scores_data()
    generator.generate_bulletin_data()
    generator.generate_health_index_data()