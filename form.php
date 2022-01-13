<?php 

//variables inicialization

$name = $_POST['name'] ;
$email = $_POST['email'];
$findUs = $_POST['findUs']; 


//connection between MySQL and HTML

$connection = new mysql('localhost', 'root', '', 'gym');

//conditional if/else for checking the connection
if ($connection -> connect_error) {
    die ("Unsuccessfully connection: " . $connection -> connect_error);  //when the connection fails
}

else {
    $query = $connection -> prepare("INSERT INTO form (name, email, findUs) VALUES (?, ?, ?)");  //statement for inserting values in the table
    $query -> bind_param("sss", $name, $email, $findUs); //binding the parameters with the corresponding PHP datatype
    $query -> execute();   //query execution
    echo "Form completed sucessfully"; //printing a positive result message
    $query -> close();  //closing the statement
    $connection -> close(); //closing the connection between MySQL and PHP
}

?>