<?php

//check if form is submitted
if (isset($_GET['findme'])) 
{
	//Get form data
	$searchterm = $_GET['sterm'];
	# execute the function
	ajaxsearch($searchterm);
}

function ajaxsearch($shterm)
{
	//database connection variables
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "world";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 

	//write sql
	$sql = "SELECT code, name, continent FROM country WHERE Name LIKE '%$shterm%'";

	//execute sql
	$result = $conn->query($sql);

	//check if any result was returned
	if ($result->num_rows > 0) 
	{
    	//looping - output data of each row
    	while($row = $result->fetch_assoc()) 
    	{
        	echo "<b>code:</b> ". $row["code"]." | <b>Country-Name:</b> <span style='color:green;'>". $row["name"]."</span> | <b>Continent: </b>" . $row["continent"]. "<br>";
    	}
	} 
	else 
	{
    	echo "0 results";
	}
	$conn->close();
}




?>