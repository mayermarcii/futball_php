<?php
 include 'includes/db.inc.php' ;


?>


<div class="middle">
<form action="index.php?page=registration" method="post" >
	
<?php
	
	
	echo $registrationError;
	echo "<h2>Regisztráció</h2>"
?>
							Felhasználó:<br><input type="text" pattern="[A-Za-z0-9\_\ ]{1,20}" name="username" required>
							<br>
							Jelszó: <br><input type="password" name="password" id="password" required>
							<br>
							Jelszó ismét: <br><input type="password" name="password1" id="password1" required>
							<br>
							E-mail: <br><input type="email" name="email" required>
							<br>
							<br>
						<input type="submit">
</form>
</div>

	