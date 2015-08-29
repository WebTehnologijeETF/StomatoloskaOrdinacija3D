<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="Stil.css">  
	<title> Stomatološka ordinacija 3D </title>

</head>



<body onload="prikaziProizvode()">



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

<form id="formaUnosProizvoda">
<p>Unesite podatke od proizvoda:</p><br>
	<p>*ID:&nbsp;
	<input id="idP" name="idP" type="text">  
	<p>*Naziv:&nbsp;
	<input id="nazivP" name="nazivP" type="text">
	<p>*URL Slike:&nbsp;
	<input id="urlSlike" name="urlSlike" type="text">	
	<p>Opis: 
	<textarea id="opis" name="opis"></textarea> <br><br><br><br>
	<p> *obavezna polja </p>
	<input id="Dodaj" type="submit" value="Dodaj proizvod" onclick="return dodajProizvod()">
	<input id="Izmjeni" type="submit" value="Izmjeni proizvod" onclick="return izmijeniProizvod()">
	<input id="Obrisi" type="submit" value="Obriši proizvod" onclick="return obrisiProizvod()">
</form>

<div id="proizvodi">



</div>
</div>
<div id="podnozje"><p>Copyright &copy; Valjevčić Elvin 2015.</p></div>

<script src="Proizvodi.js"></script>
<script src="Validacija2.js"></script>



</body>

</html>