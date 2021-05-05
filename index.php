<?

// This page lists all the current records in the database

// require the database initialization and functions
require 'database-config.php';
require 'functions.php';


// did one or more checked boxes get submitted? let's delete them
if (isset($_POST["asmnt"])) {
	$asmntList = $_POST["asmnt"];
	foreach ($asmntList as $asmntID) {
		$sql = "DELETE FROM $databaseTable
						WHERE id=$asmntID";
		$result = $db->query($sql);
		if (!$result) die("Delete Error: " . $sql . "<br>" . $db->error);
	}
}

// select all columns (*) in the database
$sql = "SELECT * FROM $databaseTable
				ORDER BY class"; 
$result = $db->query($sql);
if (!$result) die("Select Error: " . $sql . "<br>" . $db->error);

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment List</title>

    <!-- external and internal CSS -->
    <link rel="stylesheet" href="stylesheet-final.css" media="all">

  </head>

  <body>

    <h1>Assignment Tracker</h1>
    <h2>Assignments</h2>

    <form method='POST'>

      <div>
        <table>
        <tr class="dataHeaders"></tr>
        <td>
          <h3 id="classHeader" class="dataHeaders">
            Class
          </h3>
        </td>
        <td>
          <h3 id="asmntHeader" class="dataHeaders">
            Assignment
          </h3>
        </td>
        <td>
          <h3 id="dueHeader" class="dataHeaders">
            Due Date
          </h3>
        </td>
        <td>
          <h3 id="profHeader" class="dataHeaders">
            Professor     
          </h3>
        </td>
        <td>
          <h3 id="timeHeader" class="dataHeaders">
            Investment     
          </h3>
        </td>
        </tr>
        </table>
      </div>

      <?= outputAsmntResults($result, true); // call the function that returns HTML for a table
?>
        <button type="submit">Delete Checked Records</button>
    </form>

    <ul>
      <li><a href="add-record.php">Add Assignments</a></li>
      <li><a href="search-schedule.php">Search Assignments</a></li>
      <li><a href="edit-record.php">Edit Assignments</a></li>
 

  </body>

  </html>