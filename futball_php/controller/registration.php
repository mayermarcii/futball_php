<?php


$registrationError = '';
if(isset($_POST['username']) and isset($_POST['password'])and isset($_POST['email'])) {
	if(strlen($_POST['username']) == 0) $registrationError .= "Nem írtál be felhasználónevet<br>";
	if(strlen($_POST['password']) == 0) $registrationError .= "Nem írtál be jelszót<br>";
  if(strlen($_POST['email']) == 0) $registrationError .= "Nem írtál be emailt<br>";
  if($_POST['password']!=$_POST['password1'])$registrationError .= "Nem egyeznek a jelszavak<br>";
  if(strlen($_POST['username']) >= 20)$registrationError .= "Túl hosszú a név";

	if($registrationError == '') {
    $un = mysqli_query($conn, "SELECT username FROM user WHERE username = '".$_POST['username']."'");
    $em = mysqli_query($conn, "SELECT email FROM user WHERE email = '".$_POST['email']."'");

    if(mysqli_num_rows($un)) {
        echo'Ez a felhasználónév már létezik.';
    }elseif(mysqli_num_rows($em)){
      echo'Ez az email már regisztrálva van.';
    }else{
        $sql = "INSERT INTO user (username,pw,email)
        VALUES ('".htmlspecialchars(mysqli_real_escape_string($conn,$_POST['username']))."','".($_POST['password'])."','".htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email']))."')";
        if ($conn->query($sql) === TRUE) {
            echo "Sikeres regisztráció ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }    
  }
}
  
include 'view/registration.php';

?>