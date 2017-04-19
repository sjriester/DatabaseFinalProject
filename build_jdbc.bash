#!/bin/bash
set -e -v

echo "Compiling..."
javac *.java

echo "Running..."
java -cp .:mysql-connector-java-5.1.40-bin.jar RegistrationDbManager A 098765432 Dog Johnson Gender
