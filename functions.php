<?php 
$conn = mysqli_connect("localhost:8111", "root", "", "endorsement_db"); 

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;

}

?>