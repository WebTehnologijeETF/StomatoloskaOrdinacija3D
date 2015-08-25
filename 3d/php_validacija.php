<?php

$imeErr = $prezimeErr = $subjErr=$emailErr=$email2Err= "";
$ime = $prezime= $email=$forma = $email2=$mjesto=$opcina=$poruka= "";

$validacija = true;
   if (empty($_GET["ime"])) {
     $nameErr = "Polje 'Ime i Prezime' ne smije biti prazno!";
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
     $prezimeErr = "Prezime ne smije biti prazno!";
     $validacija = false;

   } else {
   	 
     $prezime = test_input($_GET["prezime"]);
     // da li sadrži samo slova i razmake
     if (!preg_match("/^[a-zA-Z ]*$/",$prezime)) {
       $prezimeErr = "Samo slova i razmaci su dozvoljeni!"; 
            $validacija = false;

     }
   }
   
   if (empty($_GET["email"])) {
     $emailErr = "Email je potreban!";
                 $validacija = false;


   } else {
     $email = test_input($_GET["email"]);
     // check if e-mail address is well-formed
     if (!preg_match("/^.+@[^\.].*\.[a-z]{2,}$/",$email))  {
       $emailErr = "Netačan email format!"; 
                   $validacija = false;

     }
   }
   
    if (empty($_GET["email2"])) {
     $email2Err = "Email je potreban!";
                 $validacija = false;

   } else {
     $email2 = test_input($_GET["email2"]);
  if($email2 != $email)
  	{ $email2Err = "Email-ovi moraju biti isti!"; 
                   $validacija = false;}
     
   }
   
    $mjesto = test_input($_GET["mjesto"]);
	$opcina = test_input($_GET["opcina"]);
	$poruka = test_input($_GET["poruka"]);
   
   
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if($validacija==true){
	include 'potvrda.php';
}

else {
	include 'Kontakt.html';
}
   
   
   
?>