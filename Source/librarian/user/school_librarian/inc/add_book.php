<?php
session_start();

if (isset($_POST['submit'])) {
        $accession_number= $_POST['accession_number'];
        $isbn      = $_POST['isbn'];
        $issn = $_POST['issn'];
        $lccn   = $_POST['lccn'];
        $title    = $_POST['title'];
        $authors      = $_POST['authors'];
        $publish_date    = $_POST['publish_date'];
        $publisher   = $_POST['publisher'];
        $book_category    = $_POST['book_category'];
        $book_status   = $_POST['book_status'];
        $material_type    = $_POST['material_type'];
        $book_remarks    = $_POST['book_remarks'];
        $edition    = $_POST['edition'];
        $book_cover    = $_POST['book_cover'];
        $book_section    = $_POST['book_section'];
        $subject   = $_POST['subject'];
        $book_shelved    = $_POST['book_shelved'];
        $copyright    = $_POST['copyright'];
        $extent    = $_POST['extent'];
        $size    = $_POST['size'];
        $place    = $_POST['place'];
        $key_word    = $_POST['key_word'];

        if (isset($_SESSION['user_id'])) {
            include_once 'connection.php';
            $user_id = $_SESSION['user_id'];
            
            $query = "SELECT school_id FROM user WHERE user_id='$user_id'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);
            $school_id = $row['school_id'];

            $host = 'localhost';
            $db_name = 'onlinelibsystem';
            $pdo = new PDO("mysql:host=$host;dbname=$db_name", 'root', '');
            $currentDateTime = date('Y-m-d H:i:s');
            $stmt = $pdo->prepare('INSERT INTO books (accession_number, isbn, issn, lccn, school_id, title, authors, publish_date, publisher, book_category, book_status, material_type, book_remarks, edition, book_cover, book_section, subject, book_shelved, copyright, extent, size, place, time)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$accession_number, $isbn, $issn, $lccn, $school_id, $title, $authors, $publish_date, $publisher, $book_category, $book_status, $material_type, $book_remarks, $edition, $book_cover, $book_section, $subject, $book_shelved, $copyright, $extent, $size, $place, $currentDateTime]);
            $stmt = $pdo->prepare('INSERT INTO search (title, key_word) VALUES (?, ?)');
            $stmt->execute([$title, $key_word]);
            header('location: ../aquisition_SL.php?modify=success');
        } else {
            header('location: ../../../login.php');
        }
    }
?>
