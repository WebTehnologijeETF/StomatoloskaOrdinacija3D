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
	
	/*if (forma.mjesto.value.length!=0) {
		return ProvjeriOpcinuMjesto();
	}*/

	//ajax za mjesto i opcinu
	if (x==1) {
		greska.innerHTML+="Unesite odgovarajuće mjesto i općinu";
		document.getElementById('slika_mjesto').style.display="block";
		document.getElementById('slika_opcina').style.display="block";
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

var x=0;
function ProvjeriOpcinuMjesto()
{
	
	var mjesto = document.getElementById("mjesto").value;
	var opcina = document.getElementById("opcina").value;
	if (mjesto=="" || opcina=="") {return false;}
	else {

    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var greska2 = JSON.parse(xmlhttp.responseText);
			if (greska2.greska!=undefined) {
				x=1;
				document.getElementById('greska').innerHTML=greska2.greska;
				 }
				 else {document.getElementById('greska').innerHTML=greska2.ok;}
			
			
        }
	}
    
		 
		mjesto = encodeURIComponent(mjesto);
		opcina = encodeURIComponent(opcina);

    xmlhttp.open("GET","http://zamger.etf.unsa.ba/wt/mjesto_opcina.php?opcina="+opcina+"&mjesto="+mjesto,true);
    xmlhttp.send();
	
	
	return false;
	}
}

function ucitaj(adresa)
{
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function () {
	    if (ajax.readyState == 4 && ajax.status == 200) {
	        document.body.innerHTML = ajax.responseText;
	    }
	    if (ajax.readyState == 4 && ajax.status == 404)
	        document.body.innerHTML = "Greska: nepoznat URL";
	}
	    ajax.open("GET", adresa, true);
	    ajax.send();
	    return false;
} 

function ucitaj2(adresa)
{
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function () {
	    if (ajax.readyState == 4 && ajax.status == 200) {
	        document.body.innerHTML = ajax.responseText;
			prikaziProizvode();
	    }
	    if (ajax.readyState == 4 && ajax.status == 404)
	        document.body.innerHTML = "Greska: nepoznat URL";
	}
	    ajax.open("GET", adresa, true);
	    ajax.send();
	    return false;
} 

function PrikaziPunuNovost(datum,naslov,autor,slika,sadrzajNovosti,detaljnijeNovosti) {
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function () {
	    if (ajax.readyState == 4 && ajax.status == 200) {
	        document.body.innerHTML = ajax.responseText;
			prikaziProizvode();
	    }
	    if (ajax.readyState == 4 && ajax.status == 404)
	        document.body.innerHTML = "Greska: nepoznat URL";
	}
		slika=encodeURIComponent(slika);
	    ajax.open("POST","punaNovost.php", true);
	    ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.send("datum="+datum+"&naslov="+naslov+"&autor="+autor+"&slika="+slika+"&sadrzajNovosti="+sadrzajNovosti+"&detaljnijeNovosti="+detaljnijeNovosti);
	    return false;
	
}

function prikaziProizvode() {
	var ajax;
	ajax=new XMLHttpRequest();
    ajax.onreadystatechange = function()
	{                                     
		if (ajax.readyState == 4 && ajax.status == 200 ){
			preuzmi(ajax.responseText);						
		} 						
   }
    ajax.open("POST","http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=15561", true);
	ajax.send();
}

function preuzmi(response)
{
		var niz= JSON.parse(response);
		var izlaz='<table id="tabela" border="1"> <caption>Proizvodi</caption>';
		izlaz=izlaz+ "<tr><th>ID</th><th>Naziv</th><th>Opis</th><th>Slika</th><tr>";		
		for(var i=0; i < niz.length; i++)
		{
			var id=niz[i].id;
			var naziv=niz[i].naziv;
			var slika=niz[i].slika;
			var opis=niz[i].opis;
		
			izlaz=izlaz+ "<tr><td>"+id + "</td>"+"<td>"+naziv + "</td><td>";
			izlaz= izlaz + opis +"</td><td><img src=" + slika + " alt='' height='150px' weight='230px'></td></tr>";
		}
		izlaz= izlaz +'</table><br>';
		document.getElementById("proizvodi").innerHTML = izlaz;
}

function Validiraj() {
	var ime = document.getElementById("ime").value;
	var prezime = document.getElementById("prezime").value;
	var email = document.getElementById("email").value;
	var email2 = document.getElementById("email2").value;
	if (ime=="" && prezime=="" && email=="" && email2=="") {return false;}
	else {

    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var greska2 = JSON.parse(xmlhttp.responseText);
			if (greska2.greska!=undefined) {
				x=1;
				document.getElementById('greska').innerHTML=greska2.greska;
				 }
				 else {document.getElementById('greska').innerHTML=greska2.ok;}
			
			
        }
	}
    
		 
    xmlhttp.open("GET","ValidacijaWebServis.php?ime="+ime+"&prezime="+prezime+"&email="+email+"&email2="+email2,true);
    xmlhttp.send();
	
	return false;
	}
}
	

			



