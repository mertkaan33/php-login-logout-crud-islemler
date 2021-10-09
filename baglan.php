<?php 

try {
	$db = new PDO('mysql:host=localhost; dbname=login', 'root', '');
} catch (PDOException $e) {
	echo $e->getMessage();
}


 ?>