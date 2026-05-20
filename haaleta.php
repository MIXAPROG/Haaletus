<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli(
    "localhost",
    "vso25bulava_aksel",
    "}K_{ODs%HN{,Gbfj",
    "vso25bulava_haaletus"
);

$eesnimi = $_POST['eesnimi'];
$perenimi = $_POST['perenimi'];
$otsus = $_POST['otsus'];

$result = $conn->query("
SELECT *
FROM TULEMUSED
ORDER BY T_ID DESC
LIMIT 1
");

$tulemus = $result->fetch_assoc();

$lopp = strtotime($tulemus['Lopp']);

$poolt = $tulemus['Poolt'];
$vastu = $tulemus['Vastu'];

$haaletanud = $poolt + $vastu;

if(time() > $lopp || $haaletanud >= 11){

    echo "
    <h1>Hääletamine on lõppenud</h1>
    ";

    exit();

}

$check = $conn->query("
SELECT *
FROM HAALETUS
WHERE Eesnimi='$eesnimi'
AND Perenimi='$perenimi'
");

if($check->num_rows > 0){

    $sql = "
    UPDATE HAALETUS
    SET
        Otsus='$otsus',
        Aeg=NOW()
    WHERE
        Eesnimi='$eesnimi'
    AND
        Perenimi='$perenimi'
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
        '$eesnimi',
        '$perenimi',
        NOW(),
        '$otsus'
    )
    ";

}

$conn->query($sql);

$conn->query("CALL uuenda_tulemused()");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header("Location: index.html");
exit();

?>