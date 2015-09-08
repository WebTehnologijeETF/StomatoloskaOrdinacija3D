 <?php
ini_set("SMTP", "webmail.etf.unsa.ba");
ini_set("smtp_port", 25);
ini_set("sendmail_from","evaljevcic1@etf.unsa.ba");
   $ime = $_GET["ime"];
   $Email = $_GET["email"];
   $poruka = $_GET["poruka"];
   $sub = "Proba";

$Ime =  $ime; //senders name 
$email = $Email; //senders e-mail adress 
$recipient = "evaljevcic1@etf.unsa.ba"; //recipient 
$mail_body = $poruka; //mail body 
$subject = $sub; //subject 
$header = "From: ". $Ime . " <" . $email . ">\r\n"; //optional headerfields 

if (mail($recipient, $subject, $mail_body))
echo "Zahvaljujemo se što ste nas kontaktirali";
else
echo "Poruka nije poslana!"  
?> 