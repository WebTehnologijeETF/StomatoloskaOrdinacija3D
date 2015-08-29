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
<form id="kontakt_forma" action="php_validacija.php" method="get">
<p>Ako se želite naručiti za pregled, postaviti neko pitanje ili dati neki svoj komentar to možete učiniti na formularu ispod:</p><br>
<div id="greska" style="color:red; font-weight:bold"></div>
	<p>*Ime:&nbsp;
	<input id="ime" name="ime" type="text" onblur="return Validiraj()">  
	<img class="upozorenje" id="slika_ime" src="Pictures/warning.png" alt="slika_ime">
	<p>*Prezime:&nbsp;
	<input id="prezime" name="prezime" type="text" onblur="return Validiraj()">
	<img class="upozorenje" id="slika_prezime" src="Pictures/warning.png" alt="slika_prezime">	
	<p>Mjesto:&nbsp;
	<input id="mjesto" name="mjesto" type="text" onblur="return ProvjeriOpcinuMjesto()"> 
	<img class="upozorenje" id="slika_mjesto" src="Pictures/warning.png" alt="slika_mjesto">
	<p>Općina:&nbsp; 
	<input id="opcina" list="opcine" name="opcina" onblur="return ProvjeriOpcinuMjesto()"> 
	<img class="upozorenje" id="slika_opcina" src="Pictures/warning.png" alt="slika_opcina">
	<datalist id="opcine">
    <option value="Novi Grad">
    <option value="Novo Sarajevo">
    <option value="Centar">
    <option value="Stari Grad">
  </datalist>
	<p>*E-mail: &nbsp;
	<input id="email" name="email" type="text" onblur="return Validiraj()"> 
	<img class="upozorenje" id="slika_email" src="Pictures/warning.png" alt="slika_email">
	<p>*Potvrdite E-mail: &nbsp;
	<input id="email2" name="email2" type="text" onblur="return Validiraj()"> 
	<img class="upozorenje" id="slika_email2" src="Pictures/warning.png" alt="slika_email2">
	<p>Poruka: 
	<textarea id="poruka" name="poruka"></textarea> <br><br><br><br>
	<p> *obavezna polja </p>
	<input id="posalji" type="submit" value="Pošalji" onclick=" return provjeriFormu()">
	Progres:<progress id="progres"form="kontakt_forma" max=6 value=0></progress>

<video width="400" height="250" controls="controls" autoplay>
	<source src="izbjeljivanje.mp4" type="video/mp4">
	Vas browser ne podrzava video
</video>
</form>

</div>

<div id="podnozje"><p>Copyright &copy; Valjevčić Elvin 2015.</p></div>


<script src="Validacija2.js"></script>
<!-- <script>

  function Provjeri()
{
var opcina=document.getElementById('opcina').value;
var mjesto=document.getElementById('mjesto').value;
if (opcina.length==0 && mjesto.length==0) { 
    document.getElementById("upozorenje").innerHTML="";
    return;
} else {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("upozorenje").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","http://zamger.etf.unsa.ba/wt/mjesto_opcina.php?opcina="+opcina+"&mjesto="+mjesto,true);
    xmlhttp.send();
}    
}
</script> -->


</body>
</html>