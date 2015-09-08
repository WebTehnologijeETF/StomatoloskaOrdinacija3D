<?php   
session_start();

if (isset($_SESSION['login_user'])) {
	$korisnik= $_SESSION['login_user'];
	header("location: Admin.php"); 
}
else
{
	if(empty($_POST['korisnickoime']) || empty($_POST['sifra']))
    {
        echo "Neispravno korisnicko ime ili sifra";
    }
    else
    {
        $korisnik=$_POST['korisnickoime'];
        $sifra= $_POST['sifra'];
		$veza = new PDO("mysql:dbname=novosti;host=localhost;charset=utf8", "NovostiUser", "novostipass");
		$veza->exec("set names utf8");
		$rezultat = $veza->prepare("SELECT * FROM korisnici WHERE username=? and password=?");
		$rezultat->execute(array($korisnik,$sifra));
		$rezultat=$rezultat->fetchColumn();
		if ($rezultat!="") {
			 $_SESSION['login_user']=$korisnik;
            header("location: Admin.php"); 
		}
		else {
			print "Neispravno korisnicko ime ili sifra";
		}
	}
}	
?>