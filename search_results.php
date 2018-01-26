<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1> Search Results </h1>

<h4><a href="home.php">Home </a> | <a href="about.php">About</a> | <a href="register.php">Register</a> |<a href="search.php"> Search </a>| <a href="contact.php"> Contact Us! </a> </h4>
<hr>
<?php
//create form variable for the search term 
$search_term = $_GET['fname'];

//prepare our DB connection
$host = "localhost";
$username = "alex";
$password="Fall2017$";
$db = "db_it225";

//Create DB connection
$dbConn = mysqli_connect($host, $username, $password, $db);

//prepare SQL statement for retrieving from the DB
$sql = "SELECT * FROM student WHERE s_fname='$search_term'";

//process and pass the records to the server's memory as a result-set

$resultset = mysqli_query($dbConn, $sql);

//obtain from the resultset as pass them to an associative array

while ($rows = mysqli_fetch_assoc($resultset))
{
	printf("<p> %s %s %s %s", $rows['s_id'], $rows['s_fname'], $rows['s_lname'], $rows['s_addr']);
	echo "<br>";
}

//free the server memory of the result set
mysqli_free_result($resultset);

//close the opened DB connection
mysqli_close($dbConn);



?>
	END
</body>
<html>
