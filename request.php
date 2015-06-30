<?php
// Remove blow comments from header If  you are making calls from another server
/*
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
*/

$hostname = "localhost";
$username = "root";
$password = "root";
$dbname = "location";
$q = $_GET['q'];
if(isset($q) || !empty($q)) {
	$con = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "SELECT id, name FROM countries WHERE name LIKE '$q%'";
    $result = mysqli_query($con, $query);
    $res = array();
    while($resultSet = mysqli_fetch_assoc($result)) {
	 $res[$resultSet['id']] = $resultSet['name'];
    }
    if(!$res) {
    	$res[0] = 'Not found!';
    }
    echo json_encode($res);
}

?>