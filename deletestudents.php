<?php
    //Tasks 3,7

    include("_includes/config.inc");
    include("_includes/dbconnect.inc");
    include("_includes/functions.inc");

    // Account login check
    if (isset($_SESSION['id'])) {
        // Troubleshooting
        //var_dump($_POST['students']);
        //die();

        // If the students array is empty, redirect
        if (empty($_POST['students'])) {
            header("Location: students.php");
        }

        // Loops over students array and runs a SQL delete query
        foreach ($_POST['students'] as $student) {
            // Non-prepared statements
            //$sql = "DELETE FROM student WHERE studentid = $student";
            //$result = mysqli_query($conn, $sql);
            
            // Prepare statement and bind values
            $stmt = $conn->prepare("DELETE FROM student WHERE studentid = ?");
            $stmt->bind_param("s", $student);
            $stmt->execute();
            $result = $stmt->get_result();
        }

        if ($result) {
            echo "Record(s) deleted.";
        }

        // Redirect
        header("Location: students.php");
    } 
    else {
        header("Location: index.php");
    }
?>