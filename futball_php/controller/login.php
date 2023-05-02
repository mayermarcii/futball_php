
<?php
$loginError = ' ';
if(isset($_POST['username']) and isset($_POST['password'])) {
	$loginError = '';
	if(strlen($_POST['username']) == 0) $loginError .= "Nem írtál be felhasználónevet<br>";
	if(strlen($_POST['password']) == 0) $loginError .= "Nem írtál be jelszót<br>";
	if($loginError == '') {
		
		$sql = "SELECT user_id FROM user WHERE username = '".htmlspecialchars(mysqli_real_escape_string($conn,$_POST['username']))."' ";
		if(!$result = $conn->query($sql)) echo $conn->error;
		if ($result->num_rows > 0) {
			if($row = $result->fetch_assoc()) {
				$tanulo -> set_user($row['user_id'], $conn);
				if(($_POST['password']) == $tanulo->get_pw()) {
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['username'] = $tanulo->get_username();
					$_SESSION['password'];
					$_SESSION['admin']=$row['user_id'];
					$sql = "SELECT user_id FROM admin WHERE user_id = '".htmlspecialchars(mysqli_real_escape_string($conn,$_POST['user_id']))."' ";
					if(!$result = $conn->query($sql)) echo $conn->error;
					if ($result->num_rows > 0) {
						if($row = $result->fetch_assoc()) {
					
                   
						}}
						header('Location: index.php');
						exit();
				}
				else $loginError .= 'Érvénytelen jelszó<br>';
			}
		}
		else $loginError .= 'Érvénytelen felhasználónév<br>';
	}
}


include 'view/login.php';



?>