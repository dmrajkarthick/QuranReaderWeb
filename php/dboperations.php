<?php

function db_connection()
{
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "quranapp_new";
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    return $conn;
    }
	catch(PDOException $e){
    	echo "Connection failed: " . $e->getMessage();
    }

}


function getAllBookDetails($conn){
	$stmt = $conn->prepare('SELECT * FROM books_table');
    $stmt->execute();

    //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result = $stmt->fetchAll();
    return $result;
    /*
    foreach ($result as $key => $value) {
   		echo nl2br("\n");
		print_r($value['BookName']);
		echo nl2br("\n");
		print_r($value['DispTamil']);
		echo nl2br("\n");
		print_r($value['DispEnglish']);
    }*/
    
}

function getAllSubmenuItems($conn, $table_name){
	$sql= "SELECT distinct MainTitle, MainTitleTamil FROM $table_name";
	$stmt = $conn->prepare($sql); 
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;
}

function getAllMainPageContent($conn, $table_name, $submenu_key){
	$sql = "SELECT * FROM $table_name where MainTitle = ?";
	$stmt = $conn->prepare($sql);
    $stmt->execute(array($submenu_key));
    $result = $stmt->fetchAll();
    return $result;
}

?>