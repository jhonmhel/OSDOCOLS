<?php

include 'connection.php';

//session_start();

if(isset($_GET['accession_number'])) {   
    $an = $_GET['accession_number'];
    header("location: ../admin_book_management.php?accession_number=$an&modalDisplay=true");
}


// $res5 = mysqli_query($link, "SELECT * FROM books WHERE accession_number='". mysqli_real_escape_string($link, $_SESSION['accession_number']) . "'");
// if ($row5 = mysqli_fetch_array($res5)) {
//     $accession_number   = $row5['accession_number'];
//     $isbn      = $row5['isbn'];
//     $issn = $row5['issn'];
//     $lccn   = $row5['lccn'];
//     $title    = $row5['title'];
//     $authors      = $row5['authors'];
//     $publish_date    = $row5['publish_date'];
//     $publisher   = $row5['publisher'];
//     $book_category    = $row5['book_category'];
//     $book_status   = $row5['book_status'];
//     $material_type    = $row5['material_type'];
//     $book_remarks    = $row5['book_remarks'];
//     $edition    = $row5['edition'];
//     $book_cover    = isset($row5['book_cover']) ? $row5['book_cover'] : '';
//     $book_section    = $row5['book_section'];
//     $subject   = $row5['subject'];
//     $book_shelved    = $row5['book_shelved'];
//     $copyright    = $row5['copyright'];
//     $extent    = $row5['extent'];
//     $size    = $row5['size'];
//     $place    = $row5['place'];
// }

// if (isset($_POST["update"])) {
//     $accession_number = mysqli_real_escape_string($link, $_SESSION['accession_number']);
//     $query = "UPDATE books SET isbn='". $_POST['isbn']."', issn='". $_POST['issn']."', lccn='". $_POST['lccn']."', title='". $_POST['title']."',  authors = '". $_POST['authors']."', publish_date ='". $_POST['publish_date']."', publisher = '". $_POST['publisher']."', book_category = '". $_POST['book_category']."',
//         book_status = '". $_POST['book_status']."',material_type = '". $_POST['material_type']."', book_remarks = '". $_POST['book_remarks']."',edition = '". $_POST['edition']."', book_cover = '". $_POST['book_cover']."',
//         book_section = '". $_POST['book_section']."', subject = '". $_POST['subject']."', book_shelved = '". $_POST['book_shelved']."', copyright = '". $_POST['copyright']."', extent = '". $_POST['extent']."', size = '". $_POST['size']."', place = '". $_POST['place']."'
//         WHERE accession_number = '". $accession_number ."';";

//     if (mysqli_query($link, $query)) {
//         echo '<script type="text/javascript">
//                   window.location="../admin_inventory.php?Update=success";
//               </script>';
//     } else {
//         echo "Error updating record: " . mysqli_error($link);
//     }
// }

?>
