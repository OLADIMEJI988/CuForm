<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'sholanke', 'shinnely_JR1', 'appoint_supe');

// Check connection
if (!$conn) {
    die('Connection error: ' . mysqli_connect_error());
}

// Getting student ID from the URL
$student_id = isset($_GET['id']) ? intval($_GET['id']) : null;

// Checking if the POST request contains the comment and action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'], $_POST['action'])) {
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $action = mysqli_real_escape_string($conn, $_POST['action']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    
    // Making sure student ID, comment, action, and role are valid
    if ($student_id && $comment && $action && $role) {
        if ($role === 'hod') {
           // SQL update query to update the hod comment and action for the specific student ID
            $sql = "UPDATE recommendation_of_supervisors 
                    SET hod_comment = ?, hod_action = ? 
                    WHERE id = ?";
        } else {
            echo "Invalid role specified";
            exit();
        }

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssi", $comment, $action, $student_id);

            if (mysqli_stmt_execute($stmt)) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid student ID or missing data";
    }
} else {
    echo "Invalid request method or missing parameters";
}

// Close connection
mysqli_close($conn);
?>