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
<div id="onama">
<p>Stomatološka ordinacija 3D, na renomiranoj lokaciji, u Centru grada, nudi Vam sve usluge polivalentne stomatologije:</p> 
<ul>
	<li>Popravke zuba, sa helio i amalgamskim plombama</li>
	<li>Vađenje zuba</li>
	<li>Ultrazvucno skidanje kamenca i poliranje zuba</li>
	<li>Izradu svih vrsta mobilnih i fiksnih protetskih radova; (keramickih i cirkonijum solo navlaka, nadogradnji, mostova, totalnih i parcijalnih proteza, kombinovanih radova itd.)</li>
	<li>Izbjeljivanje zuba LED sistemom</li>
	<li>Ugradnju estetskih detalja na zube ( ukrasni cirkon )</li>
</ul>

<p>Redovnim stomatoloskim pregledima, upotpunjenim dijagnostikom uz pomoc digitalnog snimka stanja cijelih usta i zuba:</p> 
<ul>
	<li>unapređujete svoje kompletno zdravlje</li>
	<li>prevenirate nastanak, i kasno otkrivanje bilo kakvih promijena u kosti</li>
	<li>imate uvid u stanje maksilarnog sinusa</li>
	<li>imate uvid u stanje svih zuba, stanje starih plombi(postojanje karijesa ispod starih plombi)</li>
	<li>imate uvid u mogucnost postojanja tzv.aproksimalnog karijesa,koji nije vidljiv klinickim pregledom u ustima</li>
	<li>prevenirate nastanak „iznenadnog bola“, na zubima za koje ste mislili da nisu pokvareni, ili da su sanirani</li>
	<li>smanjujete vrijeme provedeno kod stomatologa, koje inace zahtjevaju slozenije procedure</li>
	<li>smanjujete svoje troskove</li>
</ul>

<table id="tabela" border="1">
<caption>CJENOVNIK USLUGA</caption>
<tr>
     <th>Usluga</th>
	 <th>Cijena</th>
	 <th>Popust</th>
</tr>
<tr>
     <td>Stomatološki pregled</td>
     <td class="sredina">20KM</td> 
	 <td class="popust">-</td>
</tr>
<tr>
     <td>Prva pomoć kod dentalgija</td>
     <td class="sredina">20KM</td> 
	 <td class="popust">-</td>
</tr>
<tr>
     <td>Pečaćenje fisura (po zubu)</td>
     <td class="sredina">30KM</td> 
	 <td class="popust">-</td>
</tr>
<tr>
     <td>Topikalna fluoridacija</td>
     <td class="sredina">20KM</td> 
	 <td class="popust">-</td>
</tr>
<tr>
     <td>Lokalna i sprovoda anestezija</td>
     <td class="sredina">10KM</td> 
	 <td class="popust">-</td>
</tr>
</table>
<br>

</div>
</div>
<div id="podnozje"><p>Copyright &copy; Valjevčić Elvin 2015.</p></div>

<script src="Validacija2.js"></script>

</body>

</html>