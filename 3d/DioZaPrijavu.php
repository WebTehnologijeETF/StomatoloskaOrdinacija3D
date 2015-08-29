<?php session_start(); 
if (isset($_SESSION['login_user'])) { ?>
<div id="LogInDio">
<p> Prijavljeni ste kao: <?php print $_SESSION['login_user']?> <br>
<form class="LogIn" method="post" action="logout.php">
<input type="submit" value="Log out" name="submitLogout">
</form>
<br>
</div>
<?php } else { ?>
<div id="LogInDio">
<form class="LogIn" method="post" action="login.php">
<input type="text" placeholder="Korisničko ime:" name="korisnickoime">
<input type="text" placeholder="Šifra:" name="sifra">
<input type="submit" value="Log in" name="submitLogin">
</form>
<br>
</div>
<?php } ?>