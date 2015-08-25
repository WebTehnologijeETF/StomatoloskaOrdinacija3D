/*function dodajProizvod() {
		var forma = document.getElementById('formaUnosProizvoda');
		var naziv = forma.nazivP.value;
		var opis = forma.opis.value;
		var slika = forma.urlSlike.value;
		
		alert(naziv);
		alert(opis);
		alert(slika);
		
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
		//prikaziProizvode();
		return false;

}*/