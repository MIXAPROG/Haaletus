<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "haaletus"
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