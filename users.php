<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "haaletus"
);

$sql = "
SELECT Eesnimi, Otsus
FROM HAALETUS
WHERE Otsus IS NOT NULL
ORDER BY Aeg DESC
";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

    echo "
    <div class='user'>
        <b>".$row['Eesnimi']."</b>
        : ".$row['Otsus']."
    </div>
    ";
}

?>