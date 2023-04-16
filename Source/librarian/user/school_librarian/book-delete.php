<?php

include 'inc/connection.php'; 

if (isset($_GET['id'])) {
    $accession_number = $_GET['id'];
    
    
    $query = "SELECT title FROM books WHERE accession_number = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $accession_number);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $title);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    
    $query = "DELETE FROM search WHERE title = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $title);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    $query = "DELETE FROM books WHERE accession_number = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $accession_number);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: manage_books_SL.php");
    exit();
} else {
    echo "Error: Book accession number not provided";
}
?>

