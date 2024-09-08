<?php
//How to write prepare and execute statements in OOP PDO?
//https://stackoverflow.com/questions/42551050/how-to-write-prepare-and-execute-statements-in-oop-pdo

include_once("connect_db.php");

$date_srvc = htmlentities($_POST['datepicker']);
$paid = htmlentities($_POST['paid']);
$recorder = htmlentities($_POST['recorderlist']);
$comments = htmlentities($_POST['comments']);

$DB2 = new Connection();
$DB2->myQuery("insert into landscaping1 (date_srvc, paid, recorder, comments) values (:date_srvc, :paid, :recorder, :comments);");
$DB2->bind(':date_srvc',$date_srvc);
$DB2->bind(':paid',$paid);
$DB2->bind(':recorder',$recorder);
$DB2->bind(':comments',$comments);

//Execute the query.
if($DB2->run()){
//echo "record inserted";
//$lastid = $DB2->lastInsertId(); //Getting the last inserted ID
//echo "Last ID = " . $lastid . "\r\n";
header ("location: ../index.php");
}
?>
