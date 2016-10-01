<?php

// label class string
$s1 = ' class="label"';

// entry class string
$s2 = ' class="entry"';

// Set up table and first label row 
$prefix = '<table><caption>Multiplication Table</caption><tr><td></td>';
for($i = 1; $i<=10; $i++){
	$prefix = $prefix.'<td'
		         .$s1
                         .'>'
                         .$i
                         .'</td>';
}

$prefix = $prefix.'</tr>';

$payload = "";

for($i = 1; $i <= 10; $i++){

	// open row and label it
	$row = '<tr><td'.$s1
                        .'>'
		        .$i
		        .'</td>';

	for($j=1; $j<=10; $j++){

		// create column entry
		$col = '<td'.$s2
                            .'>'
                            .($i*$j)
                            .'</td>' ;

		// add column entry to row
		$row = $row.$col;

	}

	// close row
	$row = $row.'</tr>>';

	// add to table
	$payload = $payload.$row;
}

// close table
$payload = $payload.'</table>';

// return resulting string of generated html

//echo ltrim('>>>test>>>', '>');

echo ltrim($prefix.$payload, '>');

?>
