// Samuel Riester 010645505
// Database Management Systems HW4

import java.util.Scanner;
import java.io.IOException;
import java.sql.*;

public class RegistrationDbManager{

	// utility instance variables
	public static Connection connection;
    public static Statement statement;	

	public static void main(String args[]) throws IOException, SQLException{
		String Username = "sjrieste";              
        String mysqlPassword = "zei7cuCh";    

        connect(Username, mysqlPassword);
		statement = connection.createStatement();
		
			switch (args[0]) {
				case "A": addStudent(args[1], args[2], args[3], args[4]);
						  break;
				case "B": addCourse(args[1], args[2], args[3], args[4]);
						  break;
				case "C": addApplication(args[1], args[2], args[3]);
						  break;
				case "D": viewStudents();
						  break;
				case "E": viewDeptCourses();
						  break;
				case "Q": viewStudentCourses();
						  break;
				default:  break;
			}
		disConnect();
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Functions for user menu options
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public static void addStudent(String studentId, String fName, String lName, String major) {
		insert("Student", "\"" + studentId + "\", \"" + fName + "\", \"" + lName + "\", \"" + major + "\"");
	}

	public static void addCourse(String deptCode, String courseNum, String title, String creditHours) {
		insert("Course", "\"" + deptCode + "\", \"" + courseNum + "\", \"" + title + "\", " + creditHours);
	}

	public static void addApplication(String studentId, String courseNum, String deptCode) {
		insert("Enrollment", "\"" + studentId + "\", \"" + courseNum + "\", \"" + deptCode + "\"");
	}

	public static void viewStudents() {
		String query = "SELECT * FROM Student";
		query(query);
	}

	public static void viewDeptCourses() {
	}

	public static void viewStudentCourses() {
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Utility Functions
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Used to generate the next valid id for a row of a table, guarentees no duplicates
	public static int generateNum(String table, String column) throws IOException, SQLException {
		ResultSet resultSet = statement.executeQuery("SELECT MAX(" + column + ") FROM " + table + ";");
		int max = -1;
		while(resultSet.next()){
        	max = resultSet.getInt("MAX(" + column + ")");
        }
		return (max + 1);
	}

	// Check to see if the previous query returned any rows
	public static boolean doesExist() throws IOException, SQLException {
		ResultSet resultSet = statement.executeQuery("SELECT FOUND_ROWS();");
		int numRows = -1;
		while(resultSet.next()){
        	numRows = resultSet.getInt("FOUND_ROWS()");
        }		
		return (numRows > 0);
	}

	// Connect to the database
    public static void connect(String Username, String mysqlPassword) throws SQLException {
        try {
            connection = DriverManager.getConnection("jdbc:mysql://localhost/" + Username + "?" +
                    "user=" + Username + "&password=" + mysqlPassword);
        }
        catch (Exception e) {
            throw e;
        }
    }

    // Disconnect from the database
    public static void disConnect() throws SQLException {
        connection.close();
        statement.close();
    }

	// Execute an SQL query passed in as a String parameter
    // and print the resulting relation
	public static void query(String q) {
        try {
            ResultSet resultSet = statement.executeQuery(q);
            System.out.println("\n---------------------------------");
            print(resultSet);
        }
        catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // Print the results of a query with attribute names on the first line
    // Followed by the tuples, one per line
    public static void print(ResultSet resultSet) throws SQLException {
        ResultSetMetaData metaData = resultSet.getMetaData();
        int numColumns = metaData.getColumnCount();

        printHeader(metaData, numColumns);
        printRecords(resultSet, numColumns);
    }

	// Print the attribute names
    public static void printHeader(ResultSetMetaData metaData, int numColumns) throws SQLException {
        for (int i = 1; i <= numColumns; i++) {
            if (i > 1)
                System.out.print(",  ");
            System.out.print(metaData.getColumnName(i));
        }
        System.out.println();
    }

    // Print the attribute values for all tuples in the result
    public static void printRecords(ResultSet resultSet, int numColumns) throws SQLException {
        String columnValue;
        while (resultSet.next()) {
            for (int i = 1; i <= numColumns; i++) {
                if (i > 1)
                    System.out.print(",  ");
                columnValue = resultSet.getString(i);
                System.out.print(columnValue);
            }
            System.out.println("");
        }
    }

    // Insert into any table, any values from data passed in as String parameters
    public static void insert(String table, String values) {
        String query = "INSERT INTO " + table + " VALUES (" + values + ");" ;
        try {
            statement.executeUpdate(query);
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
