<?php

if (isset($_POST['submit'])) {
    $role = $_POST['role'];
    $school_id = $_POST['school_id'];
    $school_name = $_POST['school_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];

    // Check if all required fields are filled out
    include_once 'connection.php';
    if (
        empty($role) || empty($school_id) || empty($school_name) || empty($first_name) ||
        empty($middle_name) || empty($last_name) || empty($user_id) ||
        empty($password) || empty($phone_number) || empty($street) ||
        empty($barangay) || empty($city)
    ) {
        echo "Please fill out all required fields.";
    } else {
        // Insert data into database
        $user_sql = "INSERT INTO user (school_id, roles, user_id, passwords, phone_number, first_name, middle_name, last_name, school_name, photo, street, barangay, city, statuss) 
            VALUES ('$school_id','$role','$user_id', '$password','$phone_number', '$first_name', '$middle_name', '$last_name', '$school_name', 'none', '$street','$barangay', '$city','ACTIVE')";
            
        $school_sql = "INSERT INTO school (school_id, school_name, street, barangay, city) VALUES ('$school_id', '$school_name', '$street', '$barangay', '$city')";
    
        if (mysqli_query($link, $user_sql) && mysqli_query($link, $school_sql)) {
            header('location: ../adminaddacc.php');
        } else {
            echo "Error inserting data: " . mysqli_error($link);
        }
        // Close connection
        mysqli_close($link);
    }    
}
?>

