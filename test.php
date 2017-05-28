<?php

try {

    $dbhost = "127.0.0.1";
    $dbname = "";
    $dbusername = "";
    $dbpass = "";


    $myid = 2;

//Connect to the database
    $dbh = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbusername, $dbpass);

//the sql query using a named placeholder
    $sql = "SELECT * FROM users WHERE id = :id ";

//statment handle
    $sth = $dbh->prepare($sql);

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); // <-- filter your data first (see [Data Filtering](#data_filtering)), especially important for INSERT, UPDATE, etc.

    $sth->bindParam(':id', $myid, PDO::PARAM_INT); // <-- Automatically sanitized for SQL by PDO

    $sth->execute(array(":id" => $myid));

    while($row = $sth->fetchObject()) {
        echo $row->name, '<br>';
        echo $row->email, '<br>';
    }

    $dbh = null;

}  catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>


