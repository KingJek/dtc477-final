<?

// This file contains one function to generate a table of information of data

// output a table of results, including a checkbox if $includeCheckbox is true
// receive the assignments as a database object into $allAsmnts
function outputAsmntResults($allAsmnts, $includeCheckbox = false) {
	
	$counter = 0;
	$output = "";
	$output .= "<table cellpadding='10'>\n ";
	
	// loop through $allAsmnts with each $row available as $asmnt
	foreach ($allAsmnts as $asmnt) {
		
		$counter++;
		
		$output .= "\t<tr style='background-color: #fff;'>\n";
		
		if ($includeCheckbox) {
			$checkboxID = "asmnt[" . $counter . "]";
			$checkboxValue = $asmnt["id"];
			$output .= "\t\t<td><input type='checkbox' id='$checkboxID' name='$checkboxID' value='$checkboxValue'></td>\n";
		}
		$output .= "\t\t<td>" . $asmnt["class"] . "</td>\n";
		$output .= "\t\t<td>" . $asmnt["asmnt"] . "</td>\n";
		$output .= "\t\t<td>" . $asmnt["due_date"] . "</td>\n";
		$output .= "\t\t<td>" . $asmnt["teacher_name"] . "</td>\n";
    $output .= "\t\t<td>" . $asmnt["time_commitment"] . "</td>\n";
		
		$output .= "\t</tr>\n";
	}
	$output .= "</table>";
	
	return $output; 
}