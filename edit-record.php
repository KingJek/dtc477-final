<?

// This page lists all the current records in the database

// require the database initialization and functions
require 'database-config.php';
require 'functions.php';

// select all columns (*) in the database
$sql = "SELECT * FROM $databaseTable
				ORDER BY class"; 
$result = $db->query($sql);
if (!$result) die("Select Error: " . $sql . "<br>" . $db->error);

if (isset($_POST["asmnt"])) {
  $class_update = $_POST["className"];
  $asmnt_update = $_POST["asmntName"];
  $due_date_update = $_POST["dueDate"];
  $teacher_name_update = $_POST["teacherName"];
  $time_commitment_update = $_POST["timeCommitment"];
  
  $asmntList = $_POST["asmnt"];
	foreach ($asmntList as $asmntID) {
		$sql = "UPDATE asmnt_schedule 
    SET class = '$class_update', asmnt = '$asmnt_update', due_date = '$due_date_update', teacher_name = '$teacher_name_update', time_commitment = '$time_commitment_update'
    WHERE id=$asmntID";
		$result = $db->query($sql);
		if (!$result) die("Update Error: " . $sql . "<br>" . $db->error);
	}
  
}
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Assignments</title>

    <!-- external and internal CSS -->
    <link rel="stylesheet" href="stylesheet-final.css" media="all">

  </head>

  <body>

    <h1>Assignment Tracker</h1>
    <h2>Edit Assignments</h2>

    <form method='POST'>
      <?= outputAsmntResults($result, true); // call the function that returns HTML for a table
?>
      <table>
        <tr class="inputForm">
          <td>Class:</td>
          <td><input id="className" name="className" type="text"></td>
        </tr>
        <tr class="inputForm">
          <td>Assignment:</td>
          <td><input id="asmntName" name="asmntName" type="text"></td>
        </tr>
        <tr class="inputForm">
          <td>Due Date:</td>
          <td><input id="dueDate" name="dueDate" type="datetime-local">(YYYY-MM-DD HH:MM:SS)</td>
        </tr>
        <tr class="inputForm">
          <td>Professor:</td>
          <td><input id="teacherName" name="teacherName" type="text"></td>
        </tr>
        <tr class="inputForm">
          <td>Time Commitment:</td>
          <td><input id="timeCommitment" name="timeCommitment" type="text"></td>
        </tr>
      </table>
      <input type="submit" name='saveChanges' value="Save Changes">
    </form>

    <ul>
      <li><a href="index.php">Assignment List</a></li>
      <li><a href="add-record.php">Add Assignments</a></li>
      <li><a href="search-schedule.php">Search Assignments</a></li>
    </ul>

  </body>

  </html>

<?
if (isset($_POST['saveChanges'])) {
  echo "<script type='text/javascript'>
        window.location=document.location.href;
        </script>";
}
?>