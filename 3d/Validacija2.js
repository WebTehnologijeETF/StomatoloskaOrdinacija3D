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
	
	if (forma.mjesto.value.length!=0) {
		return ProvjeriOpcinuMjesto();
	}

	//ajax za mjesto i opcinu
	
	
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

function ProvjeriOpcinuMjesto()
{
	var x=0;
  var mjesto = document.getElementById("mjesto").value;

    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var greska2 = JSON.parse(xmlhttp.responseText);
			if (greska2.greska!=undefined) {
				x=1;
				document.getElementById('greska').innerHTML=greska2.greska;
				 }
			
			
        }
	}
    
		 
		mjesto = encodeURIComponent(mjesto);

        var opcina = document.getElementById("opcina").value;
		opcina = encodeURIComponent(opcina);

    xmlhttp.open("GET","http://zamger.etf.unsa.ba/wt/mjesto_opcina.php?opcina="+opcina+"&mjesto="+mjesto,true);
    xmlhttp.send();
	
	
	//alert("fds");
	
	if (x==1) { 
		return false;}
	return true;
}

function ucitaj(adresa)
{
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function () {
	    if (ajax.readyState == 4 && ajax.status == 200) {
	        document.body.innerHTML = ajax.responseText;
	    }
	    if (ajax.readyState == 4 && ajax.status == 404)
	        document.getElementById("GlavniDio").innerHTML = "Greska: nepoznat URL";
	}
	    ajax.open("GET", adresa, true);
	    ajax.send();
	    return false;
} 




