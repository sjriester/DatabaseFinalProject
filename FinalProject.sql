Samuel Riester
010645505
Database Management Systems
Final Project

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
CREATE TABLE Code
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


USE sjrieste;

CREATE TABLE Student(
	studentId CHAR(9) PRIMARY KEY,
	fName CHAR(25) NOT NULL,
	lName CHAR(25) NOT NULL,
	major CHAR(50) NOT NULL
);

CREATE TABLE Course(
	courseNum CHAR(4) PRIMARY KEY,
	deptCode CHAR(4) NOT NULL,
	title CHAR(100) NOT NULL,
	creditHours INT
);

CREATE TABLE Enrollment(
	studentId CHAR(9) NOT NULL,
	courseNum CHAR(4) NOT NULL,
	deptCode CHAR(4) NOT NULL,
	// foreign keys not functional
	FOREIGN KEY(studentId) REFERENCES Student(studentId) ON DELETE SET NULL,
	FOREIGN KEY(courseNum) REFERENCES Course(courseNum) ON DELETE SET NULL,
	FOREIGN KEY(deptCode) REFERENCES Course(deptCode) ON DELETE SET NULL
);


