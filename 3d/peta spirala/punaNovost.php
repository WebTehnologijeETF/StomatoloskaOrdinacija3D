

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

	<div id="glavni_dio">
	
		
	<?php
		
		$datum = $_POST['datum'];
		$naslov = $_POST['naslov'];
		$autor = $_POST['autor'];
		$slika = $_POST['slika'];
		$sadrzajNovosti = $_POST['sadrzajNovosti'];
		$detaljnijeNovosti = $_POST['detaljnijeNovosti'];

		$naslov = ucfirst(strtolower($naslov));
?>

<div class="novost">
		<h1 class="naslov"><?php echo htmlspecialchars(trim($naslov), ENT_QUOTES, 'UTF-8');  ?></h1>
		<p class="tekst_novosti"> <?php echo trim($sadrzajNovosti); 
		echo htmlspecialchars(trim($detaljnijeNovosti), ENT_QUOTES, 'UTF-8'); ?></p>
		<br>
		<?php if(trim($slika)!="") { ?> 
		<img class="novosti_slika" src=<?php echo '"'.htmlspecialchars(trim($slika), ENT_QUOTES, 'UTF-8').'"'; ?> width="500" height="300" alt="slika"> <?php } ?>
		<p class="datum"><?php echo htmlspecialchars(trim($autor), ENT_QUOTES, 'UTF-8').' , '. htmlspecialchars(trim($datum), ENT_QUOTES, 'UTF-8') ?> </p>
</div>

		
	</div>


<div id="podnozje"><p>Copyright &copy; Valjevčić Elvin 2015.</p></div>

<script src="Validacija2.js"></script>

</body>

</html>