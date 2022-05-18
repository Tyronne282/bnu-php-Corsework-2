<?php
    // Tasks 1,7

    include("_includes/config.inc");
    include("_includes/dbconnect.inc");
    include("_includes/functions.inc");

    // Account login check
    if (isset($_SESSION['id'])) {
        // Create student entries
        $array_students = array(
            array(
                "studentid" => "20000001",
                "password" => password_hash("password1", PASSWORD_DEFAULT),
                "dob" => "1980-08-25",
                "firstname" => "Tyronne",
                "lastname" => "Bradburn",
                "house" => "1 Example Road",
                "town" => "Example",
                "county" => "Exampleshire",
                "country" => "UK",
                "postcode" => "EX1 1EX"
            ),
            array(
                "studentid" => "20000002",
                "password" => password_hash("password2", PASSWORD_DEFAULT),
                "dob" => "1970-05-23",
                "firstname" => "Xavier",
                "lastname" => "Bradburn",
                "house" => "2 Example Road",
                "town" => "Example",
                "county" => "Exampleshire",
                "country" => "UK",
                "postcode" => "EX2 2EX"
            ),
            array(
                "studentid" => "20000003",
                "password" => password_hash("password3", PASSWORD_DEFAULT),
                "dob" => "1982-03-15",
                "firstname" => "Paris",
                "lastname" => "Bradburn",
                "house" => "3 Example Road",
                "town" => "Example",
                "county" => "Exampleshire",
                "country" => "UK",
                "postcode" => "EX3 3EX"
            ),
            array(
                "studentid" => "20000004",
                "password" => password_hash("password4", PASSWORD_DEFAULT),
                "dob" => "1980-08-25",
                "firstname" => "Romelda",
                "lastname" => "Bradburn",
                "house" => "4 Example Road",
                "town" => "Example",
                "county" => "Exampleshire",
                "country" => "UK",
                "postcode" => "EX4 4EX"
            ),
            array(
                "studentid" => "20000005",
                "password" => password_hash("password5", PASSWORD_DEFAULT),
                "dob" => "1986-02-12",
                "firstname" => "Paul",
                "lastname" => "Bradburn",
                "house" => "5 Example Road",
                "town" => "Example",
                "county" => "Exampleshire",
                "country" => "UK",
                "postcode" => "EX5 5EX"
            ),
        );

        // Build prepared statements to insert 5 student records into the database
        foreach ($array_students as $key => $student_array) {
            $stmt = $conn->prepare("INSERT INTO student VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $stmt->bind_param("ssssssssss", $student_array["studentid"], $student_array["password"], $student_array["firstname"], $student_array["lastname"], 
                $student_array["house"], $student_array["town"], $student_array["county"], $student_array["country"], $student_array["postcode"]);
            $stmt->execute();
            $result = $stmt->get_result();
        }
    }
?>