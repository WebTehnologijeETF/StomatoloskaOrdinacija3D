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
                    <li><a onclick="return ucitaj('Onama.php')">Informacije</a></li>
                    <li><a onclick="return ucitaj2('Proizvodi.php')">Proizvodi</a></li>
                </ul>
			</li>
			
			<li><a onclick="return ucitaj('Kontakt.php')">Kontakt</a></li>
			<li><a onclick="return ucitaj('Linkovi.php')">Linkovi</a></li>
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

<?php include "DioZaPrijavu.php"; ?>

<div id="novosti">

<div id="partneri">
<h1>Partneri:</h1>

<ul class="linkovi">
	<li><a href="http://www.citydeal.ba/">City deal</a></li>
	<li><a href="http://www.3m.com">3M</a></li>
	<li><a href="http://www.sirona.com/en/">Sirona</a></li>

</ul>

</div>
</div>
<div id="podnozje"><p>Copyright &copy; Valjevčić Elvin 2015.</p></div>

<script src="Validacija2.js"></script>

</body>

</html>