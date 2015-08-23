function dodajProizvod() {
		var forma = document.getElementById('formaUnosProizvoda');
		var naziv = forma.nazivP.value;
		var opis = forma.opis.value;
		var slika = forma.urlSlike.value;
		var proizvod = {
			naziv: naziv,
			opis: opis,
			slika: slika,
		};
		var ajax=new XMLHttpRequest();
			ajax.onreadystatechange=function(){
				if(ajax.status === 200 & ajax.readyState === 4)
					{
					alert("Dodali ste proizvod!");
				}
			}
		ajax.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=15561", true);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("akcija=dodavanje" + "&brindexa=15561&proizvod=" + JSON.stringify(proizvod));
		//alert(JSON.stringify(proizvod));
		prikaziProizvode();
		return false;

}


function izmijeniProizvod(){
	var forma = document.getElementById('formaUnosProizvoda');
	var id= forma.idP.value;
	var naziv = forma.nazivP.value;
	var opis = forma.opis.value;
	var slika = forma.urlSlike.value;
	var proizvod = {
		id:id,
		naziv: naziv,
		opis: opis,
		slika: slika,
	};
    var ajax;
	ajax=new XMLHttpRequest();
	ajax.onreadystatechange = function()
	{                              
		if (ajax.readyState == 4 && ajax.status == 200 )
		{
			alert("Izmjenili ste proizvod!");    								
		} 					
   }
    ajax.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=15561", true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send("akcija=promjena" + "&brindexa=15561&proizvod=" + JSON.stringify(proizvod));
	prikaziProizvode();
	return false;
	
}


function obrisiProizvod(){
		var forma = document.getElementById('formaUnosProizvoda');
		var id = forma.idP.value;
		var proizvod={
			id:id
		};
		var ajax;
		ajax=new XMLHttpRequest();
	    ajax.onreadystatechange = function() 
		{
											
			if (ajax.readyState == 4 && ajax.status == 200 )
			{
				alert("Obrisali ste proizvod!");						
			} 
	   }
		ajax.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=15561", true);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("akcija=brisanje" + "&brindexa=15561&proizvod=" + JSON.stringify(proizvod));
		prikaziProizvode();
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
			
