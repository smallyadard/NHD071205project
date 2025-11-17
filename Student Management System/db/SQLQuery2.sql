CREATE TABLE Users(
	userID char(8) PRIMARY KEY,
	username varchar(50) UNIQUE NOT NULL,
	password varchar(50) NOT NULL,
	role varchar(7) NOT NULL DEFAULT 'student',
	CONSTRAINT con_check_role CHECK (role = 'admin' OR role = 'teacher' OR role = 'student')
);

CREATE TABLE Admins(
	userID char(8),
	adminID int IDENTITY(1,1) PRIMARY KEY,
	name nvarchar(30),
	email varchar(50),
	CONSTRAINT adm_fk_userID FOREIGN KEY (userID) REFERENCES Users(userID)
);
CREATE TABLE Teachers(
	userID char(8),
	teacherID int IDENTITY(1,1) PRIMARY KEY,
	name nvarchar(30) NOT NULL DEFAULT N'Nguyễn Văn A',
	email varchar(50),
	degree nvarchar(50),
	CONSTRAINT tea_fk_userID FOREIGN KEY (userID) REFERENCES Users(userID)
);
CREATE TABLE Students(
	userID char(8),
	studentID int IDENTITY(1,1) PRIMARY KEY,
	name nvarchar(30) NOT NULL,
	gender nvarchar(6) DEFAULT N'Nam',
	birthdate DATETIME,
	Address nvarchar(100) NOT NULL
	CONSTRAINT stu_fk_userID FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Classes(
	classID int IDENTITY(1,1) PRIMARY KEY,
	classname nvarchar(30) NOT NULL UNIQUE,
	teacherID int NOT NULL,
	CONSTRAINT cla_fk_teacherID FOREIGN KEY (teacherID) REFERENCES Teachers(teacherID)
);

CREATE TABLE Studentclass(
	studentID int PRIMARY KEY,
	classID int NOT NULL,
	CONSTRAINT stucla_fk_studentID FOREIGN KEY (studentID) REFERENCES Students(studentID),
	CONSTRAINT stucla_fk_classID FOREIGN KEY (classID) REFERENCES Classes(classID)
);

CREATE TABLE Departments(
	departmentID int IDENTITY(1,1) PRIMARY KEY,
	departmentname nvarchar(30) NOT NULL UNIQUE,
	chiefID char(8) NOT NULL,
	CONSTRAINT dep_fk_chiefID FOREIGN KEY (chiefID) REFERENCES Users(userID)
);

CREATE TABLE Teacherdepartment(
	teacherID int PRIMARY KEY,
	departmentID int NOT NULL,
	CONSTRAINT teadep_fk_teacherID FOREIGN KEY (teacherID) REFERENCES Teachers(teacherID),
	CONSTRAINT teadep_fk_depID FOREIGN KEY (departmentID) REFERENCES Departments(departmentID)
);

CREATE TABLE Courses(
	courseID int IDENTITY(1,1) PRIMARY KEY,
	coursename nvarchar(50) NOT NULL,
	teacherID int NOT NULL,
	semester char(5) NOT NULL,
	departmentID int NOT NULL,
	CONSTRAINT cou_fk_teacherID FOREIGN KEY (teacherID) REFERENCES Teachers(teacherID),
	CONSTRAINT departmentID FOREIGN KEY (departmentID) REFERENCES Departments(departmentID)
);

CREATE TABLE Enrollments(
	enrollmentID int IDENTITY(1,1) PRIMARY KEY,
	courseID int NOT NULL,
	studentID int NOT NULL,
	CONSTRAINT enr_fk_courseID FOREIGN KEY (courseID) REFERENCES Courses(courseID),
	CONSTRAINT enr_fk_studentID FOREIGN KEY (studentID) REFERENCES Students(studentID)
);

CREATE TABLE Grades(
	studentID int not null,
	courseID int not null,
	midterm float DEFAULT 10,
	final float DEFAULT 10,
	grade float DEFAULT 10,
	CONSTRAINT gra_pk_stucouID PRIMARY KEY(studentID, courseID),
	CONSTRAINT gra_fk_courseID FOREIGN KEY (courseID) REFERENCES Courses(courseID),
	CONSTRAINT gra_fk_studentID FOREIGN KEY (studentID) REFERENCES Students(studentID)
);

CREATE TABLE Posts (
    postID INT IDENTITY(1,1),
    userID char(8) NOT NULL,
    courseID INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT posts_pk_postID PRIMARY KEY(postID),
    CONSTRAINT posts_fk_userID FOREIGN KEY (userID) REFERENCES Users(userid),
    CONSTRAINT posts_fk_courseID FOREIGN KEY (courseID) REFERENCES Courses(courseID)
);

CREATE TABLE Replies (
    replyID INT IDENTITY(1,1),
    postID INT NOT NULL,
    userID char(8) NOT NULL,
    content TEXT NOT NULL,
    createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT replies_pk_replyID PRIMARY KEY(replyID),
    CONSTRAINT replies_fk_postID FOREIGN KEY (postID) REFERENCES Posts(postID),
    CONSTRAINT replies_fk_userID FOREIGN KEY (userID) REFERENCES Users(userID)
);

CREATE TABLE Assignments(
	assignmentID int IDENTITY(1,1) PRIMARY KEY,
	courseID int not null,
	teacherID int not null,
	title nvarchar(50) not null,
	description nvarchar(200) not null,
	CONSTRAINT assignments_fk_courseID FOREIGN KEY (courseID) REFERENCES Courses(courseID),
    CONSTRAINT assignments_fk_teacherID FOREIGN KEY (teacherID) REFERENCES Teachers(teacherID)
 );

 CREATE TABLE Submissions(
	submissionID int IDENTITY(1,1) PRIMARY KEY,
	assignmentID int not null,
	studentID int not null,
	file_path nvarchar(255),
	submittedat DATETIME DEFAULT CURRENT_TIMESTAMP

	CONSTRAINT submissions_fk_assignmentID FOREIGN KEY (assignmentID) REFERENCES Assignments(assignmentID),
    CONSTRAINT submissions_fk_studentID FOREIGN KEY (studentID) REFERENCES Students(studentID)
 );
