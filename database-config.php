<?

// This file opens a MySQL connection to the database you created in cPanel

// define database values
$databaseServer = "161.35.127.119"; // IP number of database, may be on the same server
$databaseName = "jakewste_477finalproject"; // database name
$databaseUser = "jakewste_jakewste_KingJek"; // user name
$databasePassword = "%mc^2(QrKR@_";  // user password

$databaseTable = "asmnt_schedule";  // main table name

/*
Available columns in this table:
- id [integer] — auto-incremented unique identifier
- appt [timestamp] — the appointment date and time of 
- patient_name [varchar(200)] — the patient’s name
- patient_complaint [varchar(1000)] — summarizing the patient’s reason for visit
- physician_name [varchar(200)] — of the assigned physician’s name
*/

// attempt DB connection and die() if it fails
$db = new mysqli($databaseServer, $databaseUser, $databasePassword, $databaseName);
if ($db->connect_error) die("Database connection failed: " . $db->connect_error);

/*

Now you can set strings of SQL and submit them like this:

$sql = "SELECT * FROM $databaseTable"; 
$result = $db->query($sql);
if (!$result) die("Error: " . $sql . "<br>" . $db->error);

*/