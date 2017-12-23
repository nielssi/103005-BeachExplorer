<?php 
function updateVisits(){
	//Check, ob counter.txt bereits existiert. Sonst: neu
	if(!file_exists("counter.txt")) 
		{$counter=fopen("counter.txt", "a");} 
		else 
			{$counter=fopen("counter.txt", "r+");} 
	$userOpens=fgets($counter,100); 
	$userOpens=$userOpens+1;
	//†berschreibt den vorigen Wert. 
	rewind($counter); 
	fputs($counter,$userOpens); 
	fclose($counter); 
}
?>