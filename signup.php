<?php

include_once("connection.php");
$result = 0;
$user = $_POST['username'];
$pass1 = $_POST['password1'];
$pass2 = $_POST['password2'];

if ($pass1 != $pass2)
{ 
  // Zijn de wachtwoorden gelijk?
  $melding = "Beide wachtwoorden zijn niet identiek";
  header("Location: signupForm.php?melding=$melding");
} 
else {
  // Bestaat de gebruiker al?
  $result = $conn->query("SELECT * FROM users WHERE gebruikersnaam='$user'");

  if ($result->num_rows == 0) {
      $sql = "INSERT INTO users (gebruikersnaam, password) VALUES ('$user', '$pass1')";

      if ($conn->query($sql) === TRUE) {
          $melding = "Account is toegevoegd";
          session_start();
          $_SESSION["user"] = $user;
      } 
      else {
          $melding = "Error: " . $sql . "<br>" . $conn->error;
      }
      } 
    else 
    {
      $melding = "De gebruikersnaam bestaat al";
    }

    header("Location: signupForm.php?melding=$melding");
    $conn->close();
}





if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $naam = isset($_POST["naam"])? $_POST["naam"] :"";
    print "Naam: ".htmlspecialchars($naam)."<br>";

    $voornaam = isset($_POST["voornaam"])? $_POST["voornaam"] :"";
    print "Voornaam: ".htmlspecialchars($voornaam)."<br>";

    $gebruikersnaam = isset($_POST["gebruikersnaam"])? $_POST["gebruikersnaam"] :"";
    print "Gebruikersnaam: ".htmlspecialchars($gebruikersnaam)."<br>";

    $email = isset($_POST["email"])? $_POST["email"] :"";
    print "E-mailadres: ".htmlspecialchars($email)."<br>";

    $passwoord = isset($_POST["passwoord"])? $_POST["passwoord"] :"";
    print "passwoord: ".htmlspecialchars($passwoord)."<br>";
}
print "<a href='signupForm.php'><button>Terug</button></a>";
print "<button onclick='window.history.go(-1)'>Terug</button>";

$vorige=$_SERVER["HTTP_REFERER"];
print $vorige;


$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";


include_once("connect.php");
$sql = "INSERT INTO tblgebruiker (naam, voornaam, gebruikersnaam, email, passwoord)
VALUES ('$naam', '$voornaam', '$gebruikersnaam', '$email', '$passwoord')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>