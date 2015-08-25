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

<div id="novosti">
    <h3>Provjerite da li ste ispravno popunili kontakt formu</h3>
    <br>
    <?php print "Ime: " .$ime ?>
    <br><br>
    <?php print "Prezime: " .$prezime ?>
    <br><br>
    <?php print "Mjesto: " .$mjesto ?>
    <br><br>
	<?php print "Opcina: " .$opcina ?>
    <br><br>
    <?php print "Email: " .$email ?>
    <br><br>
    <?php print "Email2: " .$email2 ?>
    <br><br>
    <?php print "Poruka: " .$poruka ?>
    <br><br>

    <h3>Da li ste sigurni da želite poslati ove podatke?</h3>
    <form method="get" name = "mail" action="posalji_mail.php">
        <input type="submit" name="send" value="Siguran sam">

        <input type="hidden" name="ime" value="<?php echo $ime;?>">

        <input type="hidden" name="email" value="<?php echo $email;?>">

        <input type="hidden" name="poruka" value="<?php echo $poruka;?>">
    </form>


    <h3>Ako ste pogrešno popunili formu, možete ispod prepraviti unesene podatke</h3>

<form id="kontakt_forma2" action="php_validacija.php" method="get">
<div id="greska" style="color:red; font-weight:bold"></div>
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
	<input id="posalji" type="submit" value="Pošalji" onclick=" return provjeriFormu()">
</form>

</div>

<div id="podnozje"><p>Copyright &copy; Valjevčić Elvin 2015.</p></div>


<script src="Validacija2.js"></script>



</body>
</html>