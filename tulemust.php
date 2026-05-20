<?php

$conn = new mysqli(
    "localhost",
    "vso25bulava_aksel",
    "}K_{ODs%HN{,Gbfj",
    "vso25bulava_haaletus"
);

$result = $conn->query("
SELECT *
FROM TULEMUSED
ORDER BY T_ID DESC
LIMIT 1
");

$row = $result->fetch_assoc();

echo "Poolt: " . $row['Poolt'];
echo "<br>";

echo "Vastu: " . $row['Vastu'];
echo "<br>";

echo "Hääletanuid: " . $row['Haaletanuid'];

?>