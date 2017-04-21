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
				case "F": logIn(args[1], args[2]);
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
		if(studentId.length() != 9) {
			System.out.print(false);
			return;
		}
		if(!(isNum(studentId))) {
			System.out.print(false);
			return;
		}
		boolean success = insert("Student", "\"" + studentId + "\", \"" + fName + "\", \"" + lName + "\", \"" + major + "\"");
		System.out.print(success);
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

	public static void logIn(String id, String password) throws IOException, SQLException {
		String query = "Select * FROM login WHERE id = \"" + id + "\" AND password = \"" + password + "\"";
		statement.executeQuery(query);
		ResultSet resultSet = statement.executeQuery("SELECT FOUND_ROWS();");
		while(resultSet.next()){
			System.out.print(resultSet.getInt("FOUND_ROWS()"));
		}
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Utility Functions
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// used to test if a string can be converted to a num
	public static boolean isNum(String testNum) {
	int temp = 0;
		try {
    		temp = Integer.parseInt(testNum);
    	} catch (NumberFormatException ex) {
    		return false;
    	}
		return true;
	}

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
		String data; 
        for (int i = 1; i <= numColumns; i++) {
			data = metaData.getColumnName(i);
            if (i >= 1) {
				int length = data.length();
				int toAppend = (20 - length);
				for (int j = 0; j < toAppend; j++) {
					data = (data + "&nbsp;");
 				}
			}
            System.out.print(data);
        }
        System.out.print("<br>");
    }

    // Print the attribute values for all tuples in the result
    public static void printRecords(ResultSet resultSet, int numColumns) throws SQLException {
        String columnValue;
        while (resultSet.next()) {
            for (int i = 1; i <= numColumns; i++) {
				columnValue = resultSet.getString(i);

                if (i >= 1) {
					int length = columnValue.length();
					int toAppend = (20 - length);
					for (int j = 0; j < toAppend; j++) {
						columnValue = (columnValue + "&nbsp;");
 					}
				}
				System.out.print(columnValue);
            }
            System.out.print("<br>");
        }
    }

    // Insert into any table, any values from data passed in as String parameters
    public static boolean insert(String table, String values) {
        String query = "INSERT INTO " + table + " VALUES (" + values + ");";
        try {
            statement.executeUpdate(query);
        } catch (SQLException e) {
            return false;
        }
		return true;
    }
}
