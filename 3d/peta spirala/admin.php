<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="Stil.css">  
	<title> Stomatološka ordinacija 3D </title>

</head>

<body>

<div id="zaglavlje">
	<img class="logo" src="logo.jpg" alt="logo">


	<div id="meni">
		<ul class="meni">
			<li><a onclick="return ucitaj('Naslovna.php')">Novosti</a></li>
			<li><a id="o_nama" onclick="prikaziPodMeni()">O nama</a>
				<ul id="podmeni">
                    <li><a onclick="return ucitaj('Onama.html')">Informacije</a></li>
                    <li><a onclick="return ucitaj2('Proizvodi.html')">Proizvodi</a></li>
                </ul>
			</li>
			
			<li><a onclick="return ucitaj('Kontakt.html')">Kontakt</a></li>
			<li><a onclick="return ucitaj('Linkovi.html')">Linkovi</a></li>
		</ul>
	</div>
	
</div>

<div id="lijevo">


<img class="SlikaLocation" alt="a" src="Pictures/location.png">
 &nbsp; Branislava Đurđeva br.18
<p> 033 665-718 </p>
<p> Radno vrijeme: 08:00 - 18:00 </p>
<p> Posjetite našu fb stranicu:</p>

<a id="SlikaFb" target="a "href="https://www.facebook.com/pages/Stomatolo%C5%A1ka-ordinacija-3D/535914919867455?fref=ts">
<img alt="Facebook" src="https://beeinformed.org/wp-content/plugins/social-media-feather/synved-social/image/social/regular/96x96/facebook.png">
</a>
<div id="lokacija">
<p> Naša lokacija: </p>
<img src="http://imageprocessor.websimages.com/width/539/crop/42,0,462x346/stomatoloskaordinacija3d.webs.com/10456820_535923326533281_2923626144820835315_n.jpg" alt="slika">
</div>

</div>
<div id="LogInDio">
<p> Prijavljeni ste kao: <?php session_start(); print $_SESSION['login_user']?> <br>
<form class="LogIn" method="post" action="admin.php">
<input type="submit" value="Log out" name="submitLogout">
</form>

<?php if (isset($_POST['submitLogout'])) {
	session_destroy();
	header("Location: Naslovna.php");
}
?>

<br>
</div>

	<div id="glavni_dio">
	
		
	<?php //include "NovostiIzDat.php"; ?>
	<?php //include "NovostiIzBaze.php"; ?>
	<h2> Unesite novost: </h2>	
	<form id="forma_novosti" action="Admin.php" method="post">
	<p>Naslov: &nbsp
	<input id="naslovnovosti" name="naslovnovosti" type="text">
	<p>Tekst: <textarea id="tekstnovosti" name="tekstnovosti"></textarea>
	<p>Detalajn tekst: <textarea id="detaljantekstnovosti" name="detaljantekstnovosti"></textarea>
	<p>Autor: &nbsp 
	<input id="autornovosti" name="autornovosti" type="text">
	<p>URL Slike: &nbsp 
	<input id="slikanovosti" name="slikanovosti" type="text">
	<p>ID novosti koju želite obrisati ili izmjeniti: &nbsp
	<input id="idnovosti" name="idnovosti" type="input"> <br>
	<input name="dodaj" type="submit" value="Dodaj">
	<input name="izmjeni" type="submit" value="Izmjeni">
	<input name="obrisi" type="submit" value="Obriši">
	</form>
	
	
	<?php //dodavanje,brisanje i izmjena novosti
	if(isset($_POST['dodaj'])) {
	$veza = new PDO("mysql:dbname=novosti;host=localhost;charset=utf8", "NovostiUser", "novostipass");
	$veza->exec("set names utf8");
	$veza->exec("INSERT INTO novost SET naslov='".$_POST['naslovnovosti']."',tekst='".$_POST['tekstnovosti']."',autor='".$_POST['autornovosti']."',slika='".$_POST['slikanovosti']."',detaljantekst='".$_POST['detaljantekstnovosti']."'");
	
	}
	if(isset($_POST['obrisi'])) {
	$veza = new PDO("mysql:dbname=novosti;host=localhost;charset=utf8", "NovostiUser", "novostipass");
	$veza->exec("delete from novost where id='".$_POST['idnovosti']."'");
	$veza->exec("delete from komentar where novost='".$_POST['idnovosti']."'");
	}
	
	if(isset($_POST['izmjeni'])) {
	$veza = new PDO("mysql:dbname=novosti;host=localhost;charset=utf8", "NovostiUser", "novostipass");
	$ps=$veza->prepare("UPDATE novost SET naslov='".$_POST['naslovnovosti']."',tekst='".$_POST['tekstnovosti']."',autor='".$_POST['autornovosti']."',slika='".$_POST['slikanovosti']."',detaljantekst='".$_POST['detaljantekstnovosti']."'"."WHERE id='".$_POST['idnovosti']."'");
	$ps->execute();
	}
	
	//Prikaz svih komentara i brisanje
	$veza = new PDO("mysql:dbname=novosti;host=localhost;charset=utf8", "NovostiUser", "novostipass");
	$veza->exec("set names utf8");
    $rezultat = $veza->query("SELECT novost,tekst,autor,vrijeme,id  FROM komentar order by vrijeme desc");
	  if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 print "<h2>Komentari:</h2>";
	 foreach ($rezultat->fetchAll() as $komentar) {
		 print $komentar['tekst']." , ".$komentar['autor']." , ".$komentar['vrijeme']."<form id='forma_komentara' action='Admin.php' method='post'> <input name='obrisikomentar' type='submit' value='Obriši komentar'> <input name='idkomentara' type='hidden' value='".$komentar['id']."'></form> <br>";
	 }
	 
	 if(isset($_POST['obrisikomentar'])) {
	$veza = new PDO("mysql:dbname=novosti;host=localhost;charset=utf8", "NovostiUser", "novostipass");
	$veza->exec("delete from komentar where id='".$_POST['idkomentara']."'");

	 }
	
	//dodavanje,promjena brisanje korisnika	
	?>
	<h2>Unesite korisnika:</h2>
	<form class="Korisnici" method="post" action="admin.php">
	<input type="text" placeholder="Korisničko ime:" name="korisnickoime">
	<input type="text" placeholder="Šifra:" name="sifra"><br>
	<input type="submit" name="dodajkorisnika" value="Dodaj">
	<input type="submit" name="izmjenikorisnika" value="Izmjeni">
	<input type="submit" name="obrisikorisnika" value="Obriši">
	</form>
	<?php
	
	if(isset($_POST['dodajkorisnika'])) {
	$veza = new PDO("mysql:dbname=novosti;host=localhost;charset=utf8", "NovostiUser", "novostipass");
	$veza->exec("set names utf8");
	$veza->exec("INSERT INTO korisnici SET username='".$_POST['korisnickoime']."',password='".$_POST['sifra']."'");
	}
	if(isset($_POST['izmjenikorisnika'])) {
	$veza = new PDO("mysql:dbname=novosti;host=localhost;charset=utf8", "NovostiUser", "novostipass");
	$ps=$veza->prepare("UPDATE korisnici SET  username='".$_POST['korisnickoime']."',password='".$_POST['sifra']."'");
	$ps->execute();
	}
	if(isset($_POST['obrisikorisnika'])) {
	$veza = new PDO("mysql:dbname=novosti;host=localhost;charset=utf8", "NovostiUser", "novostipass");
	$veza->exec("delete from korisnici where username='".$_POST['korisnickoime']."'");
	}
	
	?>
	
	
	</div>

<div id="podnozje"><p>Copyright &copy; Valjevčić Elvin 2015.</p></div>

<script src="Validacija2.js"></script>

</body>

</html>