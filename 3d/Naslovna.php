<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="stil.css">  
	<title> Stomatološka ordinacija 3D </title>

</head>

<body>
<img class="logo" src="logo.jpg" alt="logo">

<ul class="meni">
	<li><a href="Naslovna.html">Novosti</a></li>
	<li><a href="Onama.html">O nama</a></li>
	<li><a href="Kontakt.html">Kontakt</a></li>
	<li><a href="Linkovi.html">Linkovi</a></li>
</ul>

<?php
    $veza = new PDO("mysql:dbname=novosti;host=localhost;charset=utf8", "NovostiUser", "novostipass");
	$veza->exec("set names utf8");
    $rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor from novost order by vrijeme desc");
	  if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
     foreach ($rezultat as $novost) {
          print "<h1>".$novost['naslov']."</h1> "."<small> Autor: ".$novost['autor']."</small>"."<p>".$novost['tekst']."</p>"."<small>".date("d.m.Y. (h:i)", $novost['vrijeme2'])."</small>"."<br>";
     }
	 $broj=$veza->query("select count(*) from komentar where novost=".$novost['id']);
	 $broj=$broj->fetchColumn();
	 if ($broj===0) print "<small> nema komentara </small>";
		   else print "<a href='vijesti.php?id=".$novost['id']."'>" ."<small>".$broj." komentara </small> </a>";  
	 
	 
?>


















</body>

</html>