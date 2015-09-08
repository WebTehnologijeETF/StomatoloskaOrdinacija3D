<?php
	$idnovosti=$_GET['id'];
	$veza = new PDO("mysql:dbname=novosti;host=localhost;charset=utf8", "NovostiUser", "novostipass");
	$veza->exec("set names utf8");
    $rezultat = $veza->prepare("SELECT tekst,autor,vrijeme,email FROM komentar WHERE novost=? order by vrijeme desc");
	$rezultat->bindValue(1,$idnovosti,PDO::PARAM_INT);
	$rezultat->execute();
	  if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 foreach ($rezultat->fetchAll() as $komentar) {
		 print $komentar['tekst']." , ".$komentar['autor']." , ".$komentar['vrijeme']." , ".$komentar['email']."<br>";
	 } 
?>