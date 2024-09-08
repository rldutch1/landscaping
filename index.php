<!DOCTYPE php>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Template HTML Document">
  <meta name="keywords" content="comma,separated,keywords">
  <meta name="author" content="Robert Holland">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landscaping Record</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>

<?php
include_once("php/connect_db.php");
?>

$(document).ready(function() {
    var baseurl = './php/data.php'
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET",baseurl,true);
    xmlhttp.onreadystatechange = function(){
    	if(xmlhttp.readyState==4 && xmlhttp.status ==200){
    		var dataSet = JSON.parse(xmlhttp.responseText);
    		$("#example").DataTable({
    	 "order": [[ 0, "desc" ]],
        data: dataSet,
        	"columns": [
            { "data": "date_srvc", "defaultContent": "" },//Datatables will show error if data is null (See https://datatables.net/manual/tech-notes/4).
            { "data": "paid", "defaultContent": "" },
            { "data": "recorder", "defaultContent": "" },
            { "data": "comments", "defaultContent": "" }
        	]
    		});
    	}
    }
    xmlhttp.send();
} );

$( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val;
} );
</script>
</head>
<style>
table, th, td {border-collapse:collapse; border: 1px solid black;}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=radio] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.iptitle {
	font-weight:bold;
}
		@media only screen and (max-width: 768px) {
	  /* For mobile phones: */
	  [class*="col-"] {width: 100%;}
		}
</style>
<body>

<?php
//echo "Source: https://www.youtube.com/watch?v=oYJqUuxNCF8 <br />";
$DB1 = new Connection();
$DB1->myQuery("select id, firstname from landscaping_recorder where active_ind = :active_ind order by firstname;");
$DB1->bind(':active_ind', 1);
$rows = $DB1->All();

echo "<br /><br /><form id='F1234' name='F1234' method='POST' action='php/oop.php'>
<table id='T1234' name='T1234' width='100%'>
<th>
<td><label for='I1'><span class='iptitle'>Date:</span></label><br><hr /> <input type='text' id='datepicker' name='datepicker' width='100%'/ required></td>
<td>
<label for='I2'><span class='iptitle'>Paid:</span></label><br><hr /> 
<select id'paid' name='paid' required><option value=''>Choose</option><option id='P_No' name='P_No'>No</option><option id='P_Part' name='P_Part'>Partial</option><option id='P_Yes' name='P_Yes'>Yes</option></selected>
</td>
<td><label for='I3'><span class='iptitle'>Recorder:</span></label><br><hr /> 
<select id='recorderlist' name='recorderlist' required><option value=''>Choose</option>";
  	foreach($rows as $position => $value) {
	echo "<option id='" . $value["id"] . "' value='" . $value["firstname"] . "'>" . $value["firstname"] . "</option>";
  	}
echo "</select>

</td>
<td><label for='I4'><span class='iptitle'>Comment:</span></label><br><hr /> <input type='text' id='comments' name='comments' width='100%'/></td>
<td><input type='submit' value='Submit'></td>
</th>
</table>
</form><br /><br /><hr />";

echo "<table id='example' class='display example' width='100%'>
<caption><h3>Landscape Payment/Activity Log</h3></caption>
<thead>
<th>Date of Service</th><th>Paid</th><th>Recorder</th><th>Comment</th>
</thead>
<tfoot>
<th>Date of Service</th><th>Paid</th><th>Recorder</th><th>Comment</th>
</tfoot>
</table>
</body>
</html>";
?>
