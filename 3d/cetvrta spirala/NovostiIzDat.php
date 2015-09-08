<?php
	$counter=0;
	$novosti = array();
	foreach(glob("novosti/*.txt") as $imeFajla)
	{
		$novosti[$counter] = file($imeFajla);
		$counter++;
	}
	$kolicinaNovosti=count($novosti);

	for ($i=0; $i<$kolicinaNovosti; $i++)
	{
		for ($j=0; $j<$kolicinaNovosti-1-$i; $j++) {
			$time1 = strtotime($novosti[$j][0]); $newformat1 = date('d-m-Y h:i:s',$time1);
			$time2 = strtotime($novosti[$j+1][0]); $newformat2 = date('d-m-Y h:i:s',$time2);
            if ($time2 > $time1) {
                $tmp=$novosti[$j];
                $novosti[$j]=$novosti[$j+1];
                $novosti[$j+1]=$tmp;
            }
        }	
	}
		for ($i=0; $i<$kolicinaNovosti; $i++)
	{
		$novostLength=count($novosti[$i]);
		$sadrzajNovosti=$detaljnijeNovosti="";
		$datum=$novosti[$i][0]; $autor=$novosti[$i][1]; $naslov=$novosti[$i][2]; $slika=$novosti[$i][3];

		$j=4;
		while ($j<$novostLength){
			if (trim($novosti[$i][$j])=="--"){
				for ($k=$j+1; $k<$novostLength; $k++){
					$detaljnijeNovosti.=$novosti[$i][$k];
				}
				break;	
			} 
			$sadrzajNovosti.=$novosti[$i][$j];
			$j++;
		}
		$sadrzajNovosti = trim(preg_replace('/\s+/', ' ', $sadrzajNovosti));
		$detaljnijeNovosti = trim(preg_replace('/\s+/', ' ', $detaljnijeNovosti));
		$naslov = ucfirst(strtolower($naslov));
		?>
		<div class="novost">
		<h1 class="naslov"><?php echo htmlspecialchars(trim($naslov), ENT_QUOTES, 'UTF-8');  ?></h1>
		<p class="tekst_novosti"> <?php echo trim($sadrzajNovosti); ?></p>
		<?php if($detaljnijeNovosti!="") { ?>
		<a onclick="return PrikaziPunuNovost('<?php echo htmlspecialchars(trim($datum), ENT_QUOTES, 'UTF-8');?>','<?php echo htmlspecialchars(trim($naslov), ENT_QUOTES, 'UTF-8');?>','<?php echo htmlspecialchars(trim($autor), ENT_QUOTES, 'UTF-8');?>','<?php echo htmlspecialchars(trim($slika), ENT_QUOTES, 'UTF-8');?>','<?php echo htmlspecialchars(trim($sadrzajNovosti), ENT_QUOTES, 'UTF-8');?>','<?php echo htmlspecialchars(trim($detaljnijeNovosti), ENT_QUOTES, 'UTF-8');?>')" >Detaljnije...</a>
		<?php } ?>
		<br>
		<?php if(trim($slika)!="") { ?> 
		<img class="novosti_slika" src=<?php echo '"'.htmlspecialchars(trim($slika), ENT_QUOTES, 'UTF-8').'"'; ?> width="500" height="300" alt="slika"> <?php } ?>
		<p class="datum"><?php echo htmlspecialchars(trim($autor), ENT_QUOTES, 'UTF-8').' , '. htmlspecialchars(trim($datum), ENT_QUOTES, 'UTF-8') ?> </p>
		</div>


	<?php } ?>
