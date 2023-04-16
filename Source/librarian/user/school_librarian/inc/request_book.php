<?php

include 'connection.php';

//session_start();

if(isset($_GET['accession_number'])) {   
    $an = $_GET['accession_number'];
    header("location: ../catalogue.php?accession_number= $an &modalDisplay=true");
}
?>
