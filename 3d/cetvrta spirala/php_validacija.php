<?php

$imeErr="";
$ime = $prezime= $email=$forma = $email2=$mjesto=$opcina=$poruka= "";
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if(isset($_GET["slanje"])) {
$validacija = true;
   if (empty($_GET["ime"])) {
     $imeErr = "Ime ne smije biti prazno!";
     $validacija = false;

   } else {
   	 
     $ime = test_input($_GET["ime"]);
     // da li sadrži samo slova i razmake
     if (!preg_match("/^[a-zA-Z ]*$/",$ime)) {
       $imeErr = "Samo slova i razmaci su dozvoljeni!"; 
            $validacija = false;

     }
   }
   if (empty($_GET["prezime"])) {
     $imeErr = "Prezime ne smije biti prazno!";
     $validacija = false;

   } else {
   	 
     $prezime = test_input($_GET["prezime"]);
     // da li sadrži samo slova i razmake
     if (!preg_match("/^[a-zA-Z ]*$/",$prezime)) {
       $imeErr = "Samo slova i razmaci su dozvoljeni!"; 
            $validacija = false;

     }
   }
   
   if (empty($_GET["email"])) {
     $imeErr = "Email je potreban!";
                 $validacija = false;


   } else {
     $email = test_input($_GET["email"]);
     // check if e-mail address is well-formed
     if (!preg_match("/^.+@[^\.].*\.[a-z]{2,}$/",$email))  {
       $imeErr = "Netačan email format!"; 
                   $validacija = false;

     }
   }
   
    if (empty($_GET["email2"])) {
     $imeErr = "Email je potreban!";
                 $validacija = false;

   } else {
     $email2 = test_input($_GET["email2"]);
  if($email2 != $email)
  	{ $imeErr = "Email-ovi moraju biti isti!"; 
                   $validacija = false;}
     
   }
   
    $mjesto = test_input($_GET["mjesto"]);
	$opcina = test_input($_GET["opcina"]);
	$poruka = test_input($_GET["poruka"]);
   
   


if($validacija==true){
	include 'potvrda.php';
}

else { ?>
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
<form id="kontakt_forma" action="php_validacija.php" method="get">
<div id="greska">greska: <?php print $imeErr;  ?></div>
	<p>*Ime:&nbsp;
	<input id="ime" name="ime" type="text" value="<?php echo $ime; ?>"> 
	<img class="upozorenje" id="slika_ime" src="Pictures/warning.png" alt="slika_ime">
	<p>*Prezime:&nbsp;
	<input id="prezime" name="prezime" type="text" value="<?php echo $prezime; ?>">
	<img class="upozorenje" id="slika_prezime" src="Pictures/warning.png" alt="slika_prezime">	
	<p>Mjesto:&nbsp;
	<input id="mjesto" name="mjesto" type="text" onblur="return ProvjeriOpcinuMjesto()" value="<?php echo $mjesto; ?>"> 
	<img class="upozorenje" id="slika_mjesto" src="Pictures/warning.png" alt="slika_mjesto">
	<p>Općina:&nbsp; 
	<input id="opcina" list="opcine" name="opcina" onblur="return ProvjeriOpcinuMjesto()" value="<?php echo $opcina; ?>"> 
	<img class="upozorenje" id="slika_opcina" src="Pictures/warning.png" alt="slika_opcina">
	<datalist id="opcine">
    <option value="Novi Grad">
    <option value="Novo Sarajevo">
    <option value="Centar">
    <option value="Stari Grad">
  </datalist>
	<p>*E-mail: &nbsp;
	<input id="email" name="email" type="text" value="<?php echo $email; ?>"> 
	<img class="upozorenje" id="slika_email" src="Pictures/warning.png" alt="slika_email">
	<p>*Potvrdite E-mail: &nbsp;
	<input id="email2" name="email2" type="text" value="<?php echo $email2; ?>"> 
	<img class="upozorenje" id="slika_email2" src="Pictures/warning.png" alt="slika_email2">
	<p>Poruka: 
	<textarea id="poruka" name="poruka"><?php echo $poruka; ?></textarea> <br><br><br><br>
	<p> *obavezna polja </p>
	<input id="posalji" type="submit" value="Pošalji">
	<input id="posalji" name="slanje" type="submit" value="Pošalji">
	Progres:<progress id="progres"form="kontakt_forma" max=6 value=0></progress>

<video width="400" height="250" controls="controls" autoplay>
	<source src="izbjeljivanje.mp4" type="video/mp4">
	Vas browser ne podrzava video
</form>


</div>

<div id="podnozje"><p>Copyright &copy; Valjevčić Elvin 2015.</p></div>

<script src="Validacija2.js"></script>
<script src="Proizvodi.js"></script>


</body>
</html>

<?php
}

}
   
   
?>