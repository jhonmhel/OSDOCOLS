<?php
if (isset($_POST['submit'])) {
    // Get form data
    $full_name = $_POST['full_name'];
    $school_name = $_POST['school_name'];
    $date = date("Y-m-d"); 
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];

    // Validate form data
    if (empty($full_name) || empty($school_name) || empty($time_in) || empty($time_out)) {
        echo "Please fill out all required fields.";
        exit;
    }

    // Retrieve current user's school ID
    session_start();
    $user_id = $_SESSION['user_id'];
    
    // Use prepared statements to prevent SQL injection attacks
    $stmt = mysqli_prepare($link, "SELECT school_id FROM user WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $school_id = $row['school_id'];
        echo "Current school ID: " . $school_id;
    } else {
        echo "Error retrieving school ID.";
        exit;
    }

    // Insert attendance data into database
    $attendance_sql = "INSERT INTO attendance (full_name, school_name, date, time_in, time_out, f_school_id) 
        VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $attendance_sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $full_name, $school_name, $date, $time_in, $time_out, $school_id);
            
    if (mysqli_stmt_execute($stmt)) {
        header('location: ../attendance_SL.php');
        exit;
    } else {
        echo "Error inserting data: " . mysqli_error($link);
        exit;
    }
}


?>

