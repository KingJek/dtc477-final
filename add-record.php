<?

// This page offers a form that submits back to itself to insert new records into the database

// require the database initialization and functions
require 'database-config.php';
require 'functions.php';

// read submitted data from the $_POST array
$asmntClass = mysqli_real_escape_string($db, $_POST["className"]); 
$asmntName = mysqli_real_escape_string($db, $_POST["asmntName"]);
$asmntDate = mysqli_real_escape_string($db, $_POST["dueDate"]); // YYYY-MM-DD HH:MM:SS
$asmntProfessor = mysqli_real_escape_string($db, $_POST["teacherName"]);
$asmntCommitment = mysqli_real_escape_string($db, $_POST["timeCommitment"]);


if ( ($asmntClass != "") && ($asmntName != "") && ($asmntDate != "") && ($asmntProfessor != "") && ($asmntCommitment != "") ) {

	// insert submitted information into the database
	$sql = "INSERT INTO $databaseTable (class, asmnt, due_date, teacher_name, time_commitment)
					VALUES ( '$asmntClass', '$asmntName', '$asmntDate', '$asmntProfessor', '$asmntCommitment')";
	
	$result = $db->query($sql); // process the SQL logic above, and get a result back
	
	if (!$result) die("Insert Error: " . $sql . "<br>" . $db->error);
	
}

// onward to the HTML!

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Assignments</title>

    <!-- external and internal CSS -->
    <link rel="stylesheet" href="stylesheet-final.css" media="all">

  </head>

  <body>

    <h1>Assignment Tracker</h1>
    <h2>Add Assignments</h2>
    
    <form method="POST">
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
        <tr class="inputForm">
          <td colspan="2"><button type="submit">Add Assignment</button></td>
        </tr>
      </table>
    </form>

    <ul>
      <li><a href="index.php">Assignment List</a></li>
      <li><a href="search-schedule.php">Search Assignments</a></li>
      <li><a href="edit-record.php">Edit Assignments</a></li>
    </ul>

  </body>

  </html>