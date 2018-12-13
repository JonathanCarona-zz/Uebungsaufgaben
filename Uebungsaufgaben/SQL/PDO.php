<?php

$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '1234');


//// SELECT
//$sql = "Select * FROM testTable";
//foreach ($pdo->query($sql) as $row) {
//    echo $row['Name']."<br />";
//    echo $row['Lastname']."<br />";
//}


// Prepare and Execute
//$statement = $pdo->prepare("SELECT * FROM testTable WHERE Name = ?");
//$statement->execute(array('Rene'));
//while ($row = $statement->fetch()) {
//    echo $row['Name'] . "<br />";
//    echo $row['Lastname'] . "<br />";
//}


// Count rows
//$statement = $pdo->prepare("SELECT * FROM testTable WHERE Lastname = ?");
//$statement->execute(array('Carona'));
//$anzahl_user = $statement->rowCount();
//echo "Es wurden $anzahl_user gefunden";

// Last insert ID

//$statement = $pdo->prepare("INSERT INTO testTable (Name, Lastname) VALUES (?, ?)");
//$statement->execute(array('Izabela', 'Carona'));
//
//$neue_id = $pdo->lastInsertId();
//echo 'Last Id is: ' . $neue_id;

// With error

//$statement = $pdo->prepare("SELECT * FROM testTable");
//if($statement->execute()) {
//    while($row = $statement->fetch()) {
//        echo $row['Name']."<br />";
//    }
//} else {
//    echo "SQL Error <br />";
//    echo $statement->queryString."<br />";
//    echo $statement->errorInfo()[2];
//}

// FetchAll

//$data = $pdo->query('SELECT * FROM testTable')->fetchAll(PDO::FETCH_GROUP);
//
//var_dump($data);

// FETCH KEY PAIR

//
//$data = $pdo->query('SELECT ID, Name FROM testTable')->fetchAll(PDO::FETCH_KEY_PAIR);
//
//var_dump($data);

// Fetch

//$data = $pdo->query('SELECT * FROM testTable')->fetchAll(PDO::FETCH_UNIQUE);
//var_dump($data);

// Fetch Column

//$data = $pdo->query('SELECT Name FROM testTable')->fetchAll(PDO::FETCH_COLUMN);
//var_dump($data);

// Exception handling

//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//intentional wrong table
//$result = $pdo->query("SELECT * FROM testTablee");

//
