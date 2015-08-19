function provjeriFormu() {
	var greska = document.getElementById('greska');
                   // ili document.body.children[0]
	greska.innerHTML=""; // ocistimo prethodne greske
	for(var i=0;i<5;i++)
	document.getElementsByClassName('upozorenje')[i].style.display="none";
	
	var forma=document.getElementById('kontakt_forma');	
	if (forma.ime.value.length>10 || forma.ime.value.length<3) {
            greska.innerHTML+="Predugo/prekratko ime<br>";
			document.getElementById('slika_ime').style.display="block";
            return false; 
      }
	  
	if (forma.prezime.value.length>16 || forma.prezime.value.length<3) {
            greska.innerHTML+="Predugo/prekratko prezime<br>";
			document.getElementById('slika_prezime').style.display="block";
            return false; 
      }
	 
	 if (forma.email.value.length==0) {		
		greska.innerHTML+="Molimo unesite E-mail";  
		document.getElementById('slika_email').style.display="block";
		return false;}
	 
	var mailRegEx = /^.+@[^\.].*\.[a-z]{2,}$/; 
	if (!mailRegEx.test(forma.email.value)) {
		greska.innerHTML+="Neispravan format E-maila"; 
	document.getElementById('slika_email').style.display="block";		
		return false;
	}
	
	if (forma.email.value != forma.email2.value) {
		 greska.innerHTML+="E-malovi se ne podudaraju";
		 document.getElementById('slika_email').style.display="block";
		 document.getElementById('slika_email2').style.display="block";
          return false; 
	}  
	 return true;
	  
}

/*document.getElementById("kontakt_forma").addEventListener( "submit", 
provjeriFormu, false );*/

function prikaziPodMeni() {
	
	var podmeni = document.getElementById('podmeni');
	var o_nama = document.getElementById('o_nama');
	
	if(podmeni.style.visibility == "visible")
    {
        podmeni.style.visibility = "hidden"; 
		o_nama.style.backgroundColor="white";
    }
    else
    {
        podmeni.style.visibility = "visible";
		o_nama.style.backgroundColor="silver";
    }
}

