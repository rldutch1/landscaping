<?php
include_once("connect_db.php");
$DB = new Connection();

//Retrieve multiple rows of data from the database using the All method.
$DB->myQuery("select date_srvc, paid, recorder, comments from landscaping1 where active_ind =:active_ind order by date_srvc desc, id desc;");
$DB->bind(':active_ind',1);
$rows = $DB->All();

echo $json = json_encode($rows);
?>
