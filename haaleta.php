<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "haaletus"
);

$nimi = $_POST['nimi'];
$otsus = $_POST['otsus'];

$check = $conn->query("
SELECT *
FROM HAALETUS
WHERE Eesnimi='$nimi'
");

if($check->num_rows > 0){

    $sql = "
    UPDATE HAALETUS
    SET
        Otsus='$otsus',
        Aeg=NOW()
    WHERE Eesnimi='$nimi'
    ";

}else{

    $sql = "
    INSERT INTO HAALETUS(
        Eesnimi,
        Perenimi,
        Aeg,
        Otsus
    )
    VALUES(
        '$nimi',
        '',
        NOW(),
        '$otsus'
    )
    ";

}

$conn->query($sql);

$conn->query("CALL uuenda_tulemused()");

header("Location: index.php");

?>