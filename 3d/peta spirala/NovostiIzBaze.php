<?php
    $veza = new PDO("mysql:dbname=novosti;host=localhost;charset=utf8", "NovostiUser", "novostipass");
	$veza->exec("set names utf8");
    $rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor, slika, detaljantekst from novost order by vrijeme desc");
	  if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
     foreach ($rezultat as $novost) { ?>
	 <div class="novost">
		<h1 class="naslov"><?php echo $novost['naslov'];  ?></h1>
		<p class="tekst_novosti"> <?php echo $novost['tekst']; ?></p>
		<?php if($novost['detaljantekst']!="") { ?>
		<a onclick="return PrikaziPunuNovost('<?php echo date("d.m.Y. (h:i)", $novost['vrijeme2']);?>','<?php echo $novost['naslov'];?>','<?php echo $novost['autor'];?>','<?php echo $novost['slika'];?>','<?php echo $novost['tekst'];?>','<?php echo $novost['detaljantekst'];?>')" >Detaljnije...</a>
		<?php } ?>
		<br>
		<?php if(trim($novost['slika']!="")) { ?> 
		<img class="novosti_slika" src=<?php echo '"'.$novost['slika'].'"'; ?> width="500" height="300" alt="slika"> <?php } ?>
		<p class="datum"><?php echo $novost['autor'].' , '. date("d.m.Y. (h:i)", $novost['vrijeme2']); ?> </p>
		


	<?php 
	 $broj=$veza->prepare("select count(*) from komentar where novost=?");
	 $broj->bindValue(1,$novost['id'],PDO::PARAM_INT);
	 $broj->execute();
	 $broj=$broj->fetchColumn();
	 if ($broj==0) print "<small> Nema komentara </small>";
		   else print "<a href='komentari.php?id=".$novost['id']."'>" ."<small>".$broj." komentara </small> </a>"; 
		   
	print "<br><br>";
	print '<form id="komentar_forma" action="Naslovna.php" method="post">';
	print '<p>Komentar: <textarea id="tekstkomentara" name="tekstkomentara"></textarea>';
	print '	<p>autor: &nbsp;
	<input id="autorkomentara" name="autorkomentara" type="text"> ';
	print '	<p>e-mail: &nbsp;
	<input id="emailkomentara" name="emailkomentara" type="text"> ';
	print ' <input id="novost" name="novost" type="hidden" value="'.$novost["id"].'"> ';
	print '<input id="posalji" type="submit" value="Pošalji">';
	print '</form>';
	print "</div>";
	}
	if (isset($_REQUEST['tekstkomentara'])) {
        $novi_komentar=$_REQUEST['tekstkomentara'];
		$novi_autor=$_REQUEST['autorkomentara'];
		$novi_email=$_REQUEST['emailkomentara'];
		$veza->exec("INSERT INTO komentar SET novost=".$_POST['novost'].",tekst='$novi_komentar', autor='$novi_autor', email='$novi_email'"); 
      }	 
?>