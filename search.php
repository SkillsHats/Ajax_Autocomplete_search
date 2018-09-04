<?php

$con = new mysqli('localhost', 'root', '', 'ajax');
if($con->mysqli_errno){
	echo $con->mysqli_error;
}

if (isset($_POST["query"])) {
	$output = '';

	$query = "SELECT * FROM country WHERE country_name LIKE '%".$_POST["query"]."%'";
	$result = $con->query($query);

	$output = '<ul class="list-unstyled">';

	if($result->num_rows){
		while ($rows = $result->fetch_array()) {
			$output .= '<li>'. $rows['country_name'] .'</li>';
		}
	} else {
		$output .= '<li> Country not found</li>';
	}

	$output .= '</ul>';
	echo $output;
}