<?php
include_once("connect.php");
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    if (isset($_POST['gebruikersnaam']) && isset($_POST['paswoord'])){
        $gebruikersnaam = isset($_POST['gebruikersnaam']);
        $paswoord = isset($_POST['paswoord']);

        require_once('connect.php');
        
        $sql = "SELECT id, firstname, lastname FROM MyGuests";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
        } else {
        echo "0 results";
        }


    }


}

$conn->close();

?>