<?php

require('dbconn.php');

$sql1 = "SELECT * FROM record, book where book.BookId=record.BookId and book.Availability!=0 Group BY record.RollNo";
$result1 = $mysqli -> query($sql1);
if ($result1->num_rows > 0) {
    $data = array();
    while($row1 = $result1->fetch_assoc()) {
        $RollNo=$row1['RollNo'];
        $sql = "SELECT * FROM record, book where book.BookId=record.BookId and book.Availability!=0 and record.RollNo='$RollNo' ORDER BY record.BookId ";
        $result = $mysqli -> query($sql);
        if ($result->num_rows > 0) {
        $data_array = array();
        while($row = $result->fetch_assoc()) {
          $data_array[$row['Title']] = $row['BookId'];
        }
        // print_r($data_array);
        $data[$row1['RollNo']] = $data_array;
        }
}
$data;
}
?>