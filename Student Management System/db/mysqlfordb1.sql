-- Drop tất cả bảng nếu tồn tại
DROP TABLE IF EXISTS Submissions;
DROP TABLE IF EXISTS Assignments;
DROP TABLE IF EXISTS Replies;
DROP TABLE IF EXISTS Posts;
DROP TABLE IF EXISTS Grades;
DROP TABLE IF EXISTS Enrollments;
DROP TABLE IF EXISTS Courses;
DROP TABLE IF EXISTS Teacherdepartment;
DROP TABLE IF EXISTS Departments;
DROP TABLE IF EXISTS Studentclass;
DROP TABLE IF EXISTS Classes;
DROP TABLE IF EXISTS Students;
DROP TABLE IF EXISTS Teachers;
DROP TABLE IF EXISTS Admins;
DROP TABLE IF EXISTS Users;

-- Tạo bảng
CREATE TABLE Users (
	userID CHAR(8) PRIMARY KEY,
	username VARCHAR(50) UNIQUE NOT NULL,
	password VARCHAR(50) NOT NULL,
	role VARCHAR(7) NOT NULL DEFAULT 'student',
	CONSTRAINT con_check_role CHECK (role IN ('admin', 'teacher', 'student'))
);

CREATE TABLE Admins (
	userID CHAR(8),
	adminID INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30),
	email VARCHAR(50),
	CONSTRAINT adm_fk_userID FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Teachers (
	userID CHAR(8),
	teacherID INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL DEFAULT 'Nguyễn Văn A',
	email VARCHAR(50),
	degree VARCHAR(50),
	CONSTRAINT tea_fk_userID FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Students (
	userID CHAR(8),
	studentID INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	gender VARCHAR(6) DEFAULT 'Nam',
	birthdate DATETIME,
	Address VARCHAR(100) NOT NULL,
	CONSTRAINT stu_fk_userID FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Classes (
	classID INT AUTO_INCREMENT PRIMARY KEY,
	classname VARCHAR(30) NOT NULL UNIQUE,
	teacherID INT NOT NULL,
	CONSTRAINT cla_fk_teacherID FOREIGN KEY (teacherID) REFERENCES Teachers(teacherID)
);

CREATE TABLE Studentclass (
	studentID INT PRIMARY KEY,
	classID INT NOT NULL,
	CONSTRAINT stucla_fk_studentID FOREIGN KEY (studentID) REFERENCES Students(studentID),
	CONSTRAINT stucla_fk_classID FOREIGN KEY (classID) REFERENCES Classes(classID)
);

CREATE TABLE Departments (
	departmentID INT AUTO_INCREMENT PRIMARY KEY,
	departmentname VARCHAR(30) NOT NULL UNIQUE,
	chiefID CHAR(8) NOT NULL,
	CONSTRAINT dep_fk_chiefID FOREIGN KEY (chiefID) REFERENCES Users(userID)
);

CREATE TABLE Teacherdepartment (
	teacherID INT PRIMARY KEY,
	departmentID INT NOT NULL,
	CONSTRAINT teadep_fk_teacherID FOREIGN KEY (teacherID) REFERENCES Teachers(teacherID),
	CONSTRAINT teadep_fk_depID FOREIGN KEY (departmentID) REFERENCES Departments(departmentID)
);

CREATE TABLE Courses (
	courseID INT AUTO_INCREMENT PRIMARY KEY,
	coursename VARCHAR(50) NOT NULL,
	teacherID INT NOT NULL,
	semester CHAR(5) NOT NULL,
	departmentID INT NOT NULL,
	CONSTRAINT cou_fk_teacherID FOREIGN KEY (teacherID) REFERENCES Teachers(teacherID),
	CONSTRAINT departmentID FOREIGN KEY (departmentID) REFERENCES Departments(departmentID)
);

CREATE TABLE Enrollments (
	enrollmentID INT AUTO_INCREMENT PRIMARY KEY,
	courseID INT NOT NULL,
	studentID INT NOT NULL,
	CONSTRAINT enr_fk_courseID FOREIGN KEY (courseID) REFERENCES Courses(courseID),
	CONSTRAINT enr_fk_studentID FOREIGN KEY (studentID) REFERENCES Students(studentID)
);

CREATE TABLE Grades (
	studentID INT NOT NULL,
	courseID INT NOT NULL,
	midterm FLOAT DEFAULT 10,
	final FLOAT DEFAULT 10,
	grade FLOAT DEFAULT 10,
	CONSTRAINT gra_pk_stucouID PRIMARY KEY(studentID, courseID),
	CONSTRAINT gra_fk_courseID FOREIGN KEY (courseID) REFERENCES Courses(courseID),
	CONSTRAINT gra_fk_studentID FOREIGN KEY (studentID) REFERENCES Students(studentID)
);

CREATE TABLE Posts (
	postID INT AUTO_INCREMENT PRIMARY KEY,
	userID CHAR(8) NOT NULL,
	courseID INT NOT NULL,
	title VARCHAR(255) NOT NULL,
	content TEXT,
	createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT posts_fk_userID FOREIGN KEY (userID) REFERENCES Users(userID),
	CONSTRAINT posts_fk_courseID FOREIGN KEY (courseID) REFERENCES Courses(courseID)
);

CREATE TABLE Replies (
	replyID INT AUTO_INCREMENT PRIMARY KEY,
	postID INT NOT NULL,
	userID CHAR(8) NOT NULL,
	content TEXT NOT NULL,
	createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT replies_fk_postID FOREIGN KEY (postID) REFERENCES Posts(postID),
	CONSTRAINT replies_fk_userID FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Assignments (
	assignmentID INT AUTO_INCREMENT PRIMARY KEY,
	courseID INT NOT NULL,
	teacherID INT NOT NULL,
	title VARCHAR(50) NOT NULL,
	description VARCHAR(200) NOT NULL,
	CONSTRAINT assignments_fk_courseID FOREIGN KEY (courseID) REFERENCES Courses(courseID),
	CONSTRAINT assignments_fk_teacherID FOREIGN KEY (teacherID) REFERENCES Teachers(teacherID)
);

CREATE TABLE Submissions (
	submissionID INT AUTO_INCREMENT PRIMARY KEY,
	assignmentID INT NOT NULL,
	studentID INT NOT NULL,
	file_path VARCHAR(255),
	submittedAt DATETIME DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT submissions_fk_assignmentID FOREIGN KEY (assignmentID) REFERENCES Assignments(assignmentID),
	CONSTRAINT submissions_fk_studentID FOREIGN KEY (studentID) REFERENCES Students(studentID)
);
