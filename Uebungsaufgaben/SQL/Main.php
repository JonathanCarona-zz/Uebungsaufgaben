<?php
$serverName = 'localhost';
$username = 'root';
$password = '1234';

$conn = mysqli_connect($serverName, $username, $password);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

echo 'Connected successfully' . PHP_EOL;


$useDB = 'USE test';

if ($conn->query($useDB)) {
    echo "Success" . PHP_EOL;
} else {
    echo "Error: " . $conn->error;
}


//
//  CREATING testTable
//
//$sql = '
//CREATE TABLE testTable (
//ID INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
//Name VARCHAR(25) NOT NULL,
//Lastname VARCHAR(25) NOT NULL
//)';
//
//if ($conn->query($sql) === TRUE) {
//    echo "Table created successfully";
//} else {
//    echo "Error creating table: " . $conn->error;
//}

// Insert INTOs
//$counter = 1;
//$sql = "INSERT INTO testTable  (Name, Lastname) VALUES ('myname$counter', 'lastname$counter'); ";
//
//
//if ($conn->query($sql) === TRUE) {
//    echo "Table created successfully";
//} else {
//    echo "Error creating table: " . $conn->error;
//}

// Insert into loop

//for ($i = 10; $i < 100; $i++) {
//    $sql = "INSERT INTO testTable  (Name, Lastname) VALUES ('myname$i', 'lastname$i'); ";
//
//    if ($conn->query($sql) === TRUE) {
//        echo "Table created successfully";
//    } else {
//        echo "Error creating table: " . $conn->error;
//    }
//
//}

// Last ID
//
//$sql = "INSERT INTO testTable  (Name, Lastname) VALUES ('myname', 'lastname'); ";
//
//if ($conn->query($sql) === TRUE) {
//    $lastID = mysqli_insert_id($conn);
//    echo "Last Id: " . $lastID;
//} else {
//    echo "Error creating table: " . $conn->error;
//}


// STMT
//
//$stmt = $conn->prepare("INSERT INTO testTable (Name, Lastname) VALUES (?,?)");
//$stmt->bind_param("ss", $Name, $Lastname);
//
//$Name = "Jonathan";
//$Lastname = "Carona";
//$stmt->execute();
//
//$Name = "Wijaya";
//$Lastname = "Sudarta";
//$stmt->execute();
//

// SELECT
//
//$sql = "SELECT Name FROM testTable";
//$result = $conn->query($sql);
//
//if ($result->num_rows > 0) {
//    while ($row = $result->fetch_assoc()) {
//        echo "name: " . $row['Name'];
//    }
//} else {
//    echo "0 Results";
//}


// DELETE
//
//$sql = "DELETE FROM testTable WHERE NAME LIKE '%myname%'";
//
//    if ($conn->query($sql) === TRUE) {
//        echo "Table created successfully";
//    } else {
//        echo "Error creating table: " . $conn->error;
//    }

// UPDATE
//
//$sql = "UPDATE testTable SET Name = 'Rene' WHERE Name = 'Jonathan'";
//
//    if ($conn->query($sql) === TRUE) {
//        echo "Table created successfully";
//    } else {
//        echo "Error creating table: " . $conn->error;
//    }


// LIMIT


$sql = "SELECT Name FROM testTable LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "name: " . $row['Name'];
    }
} else {
    echo "0 Results";
}




$conn->close();
