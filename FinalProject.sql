Samuel Riester
010645505
Database Management Systems
Final Project

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
CREATE TABLE Code
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


USE sjrieste;

CREATE TABLE login(
	id CHAR(25) NOT NULL PRIMARY KEY,
	password CHAR(255) NOT NULL
);

CREATE TABLE Student(
	StudentId CHAR(9) PRIMARY KEY,
	FirstName CHAR(25) NOT NULL,
	LastName CHAR(25) NOT NULL,
	Major CHAR(50) NOT NULL
);

CREATE TABLE Course(
	CourseNumber CHAR(4),
	DepartmentCode CHAR(4) NOT NULL,
	Title CHAR(100) NOT NULL,
	CreditHours INT,
	PRIMARY KEY(CourseNumber, DepartmentCode)
);

CREATE TABLE Enrollment(
	StudentId CHAR(9) NOT NULL,
	CourseNumber CHAR(4) NOT NULL,
	DepartmentCode CHAR(4) NOT NULL,
	FOREIGN KEY(StudentId) REFERENCES Student(StudentId) ON DELETE CASCADE,
	FOREIGN KEY(CourseNumber, DepartmentCode) REFERENCES Course(CourseNumber, DepartmentCode) ON DELETE CASCADE
);


