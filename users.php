<?php

$conn = new mysqli(
    "localhost",
    "vso25bulava_aksel",
    "}K_{ODs%HN{,Gbfj",
    "vso25bulava_haaletus"
);

$sql = "
SELECT Eesnimi, Perenimi, Otsus
FROM HAALETUS
WHERE Otsus IS NOT NULL
ORDER BY Aeg DESC
";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

    echo "
    <div class='user'>
        <b>
        ".$row['Eesnimi']." ".$row['Perenimi']."
        </b>
        : ".$row['Otsus']."
    </div>
    ";

}

?>