<?

// This page offers a form that submits back to itself to search for records in the database

// require the database initialization and functions
require 'database-config.php';
require 'functions.php';

// get search value from the submitted POST array
$search = $_POST["searchText"];

// onward to the HTML!

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Assignments</title>

    <!-- external and internal CSS -->
    <link rel="stylesheet" href="stylesheet-final.css" media="all">

  </head>

  <body>

    <h1>Assignment Tracker</h1>
    <h2>Search Assignments</h2>
    
 <?    
 if ($search != "") {

	// select all columns (*) in rows where the $search appears in 
	// class OR asmnt OR due_date OR teacher_name
	$sql = "SELECT * FROM $databaseTable
					WHERE class LIKE '%$search%'
					OR asmnt LIKE '%$search%' 
					OR due_date LIKE '%$search%'
          OR teacher_name LIKE '%$search%'
					ORDER BY class"; 
	$result = $db->query($sql);
	if (!$result) die("Select Error: " . $sql . "<br>" . $db->error);

  echo "<div id='searchHeaders'>
        <table>
        <tr class='dataHeaders'></tr>
        <td>
          <h3 id='searchClass' class='dataHeaders'>
            Class
          </h3>
        </td>
        <td>
          <h3 id='asmntHeader' class='dataHeaders'>
            Assignment
          </h3>
        </td>
        <td>
          <h3 id='dueHeader' class='dataHeaders'>
            Due Date
          </h3>
        </td>
        <td>
          <h3 id='profHeader' class='dataHeaders'>
            Professor     
          </h3>
        </td>
        <td>
          <h3 id='timeHeader' class='dataHeaders'>
            Investment     
          </h3>
        </td>
        </tr>
        </table>
      </div>"; 
	echo outputAsmntResults($result); // call the function that outputs a table
	
}?>
    
    <form method="POST">
      <table>
        <tr class="inputForm">
          <td>Search for:</td>
          <td><input id="searchText" name="searchText" type="text"></td>
        </tr>
        <tr>
          <td colspan="2"><button type="submit">Search</button></td>
        </tr>
      </table>
    </form>
    <ul>
      <li><a href="add-record.php">Add Assignments</a></li>
      <li><a href="edit-record.php">Edit Assignments</a></li>
      <li><a href="index.php">Assignment List</a></li>
    </ul>


  </body>

  </html>