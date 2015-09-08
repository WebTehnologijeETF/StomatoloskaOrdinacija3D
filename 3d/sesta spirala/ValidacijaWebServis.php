<?php

$Err = $prezimeErr = $subjErr=$emailErr=$email2Err= "";
$ime = $prezime= $email=$forma = $email2=$mjesto=$opcina=$poruka= "";



	

$validacija = true;
   if (empty($_GET["ime"])) {
     $Err = "Polje 'Ime i Prezime' ne smije biti prazno!";
     $validacija = false;

   } else {
   	 
     $ime = test_input($_GET["ime"]);
     // da li sadrži samo slova i razmake
     if (!preg_match("/^[a-zA-Z ]*$/",$ime)) {
       $Err = "Samo slova i razmaci su dozvoljeni!"; 
            $validacija = false;

     }
   }
   if (empty($_GET["prezime"]) && isset($_GET["prezime"])) {
     $Err = "Prezime ne smije biti prazno!";
     $validacija = false;

   } else {
   	 
     $prezime = test_input($_GET["prezime"]);
     // da li sadrži samo slova i razmake
     if (!preg_match("/^[a-zA-Z ]*$/",$prezime)) {
       $Err = "Samo slova i razmaci su dozvoljeni!"; 
            $validacija = false;

     }
   }
   
   if (empty($_GET["email"]) && isset($_GET["email"]) ) {
     $Err = "Email je potreban!";
                 $validacija = false;


   } else {
     $email = test_input($_GET["email"]);
     if (!preg_match("/^.+@[^\.].*\.[a-z]{2,}$/",$email))  {
       $Err = "Netačan email format!"; 
                   $validacija = false;

     }
   }
   
    if (empty($_GET["email2"] && isset($_GET["email2"]))) {
     $Err = "Email je potreban!";
                 $validacija = false;

   } else {
     $email2 = test_input($_GET["email2"]);
  if($email2 != $email)
  	{ $Err = "Email-ovi moraju biti isti!"; 
                   $validacija = false;}
     
   }
   
   
   
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if($validacija==true){
	print '{"ok":"Validacija prolazi"}';
}

else {
	print '{"greska":"'.$Err.'"}';
}