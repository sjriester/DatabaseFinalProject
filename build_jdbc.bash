#!/bin/bash
set -e -v

echo "Compiling..."
javac *.java

echo "Running..."
java -cp .:mysql-connector-java-5.1.40-bin.jar RegistrationDbManager A 3654122b3 pearson wadely losingsoftballgames
