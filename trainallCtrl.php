 <?php
 // Vincent Menard - thabob@gmail.com
 // Rock Robot
 require_once 'trainConfig-90m.php';

 $current = $_GET['hood'];
 $next = $_GET['hood'] + 1;
 
 if ($next == 9)
 	$next = 1; // hood number

$refresh = round(675); // 90 minus


	
 ?>
 <html xmlns="http://www.w3.org/1999/xhtml">    
  <head>      
    <title>Lvl 10 gangs</title>      
    <meta http-equiv="refresh" content="<? echo $refresh; ?>;URL='http://127.0.0.1/trainallCtrl.php?hood=<?php echo $next; ?>'" />    
  </head>    
  <body> 
<?php

if ($_GET['hood'] > 1) {
	//do not RI your own FN
	echo '
		<iframe src="http://127.0.0.1/RIall.php?hood='.$current.'" width="200" height="200"></iframe>';
}

$aQty = 1;
$dQty = 1;
$atroop = 'null';
$dtroop = 'null';

if ( 1 ) { // Exclude hoods here, like ($_GET['hood'] != 1 )
	$troop = round(rand(0, 6));
	
	// Overwrite the troop type here
	// $troop = 1; // only barbed wires.
	
	if ($troop == 2)
		$troop = 4;
	if (($_GET['hood'] == 6) && ($troop == 1))
		$troop = 5;
		
	$qty = getQtyDefense( $_GET['hood'], $troop );
	$dQty = $qty;
	$dtroop = $troop;
	
	
	if ($troop == 1) 
		echo '
		<iframe src="http://127.0.0.1/trainBarbed.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';
	else if ($troop == 2) 
		echo '
		<iframe src="http://127.0.0.1/trainBooby.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';
	else if ($troop == 3)
		echo '
		<iframe src="http://127.0.0.1/trainDogs.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';
	else if ($troop == 4)
		echo '
		<iframe src="http://127.0.0.1/trainArmed.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';
	else
		echo '
		<iframe src="http://127.0.0.1/trainDoe.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';
}
		
		
if (  ($_GET['hood'] == 1 ) || ($_GET['hood'] == 2 ) || ($_GET['hood'] == 6 ) || ($_GET['hood'] == 8 ) ) { 
	$troop = round(rand(1, 11));
	
	if (($troop > 9) && ($_GET['hood'] == 8))
		$troop = 8; // Cannot train Assasin in my italy
	if (($troop < 1) && ($_GET['hood'] == 8))
		$troop = 8; // Cannot train Assasin in my italy

	$qty = getQtyAttack( $_GET['hood'], $troop );
	$aQty = $qty;
	$atroop = $troop;
	
	if ($troop == 1)
		echo '
			<iframe src="http://127.0.0.1/trainThugs.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 2)
		echo '
			<iframe src="http://127.0.0.1/trainArs.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 3)
		echo '
			<iframe src="http://127.0.0.1/trainDemo.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 4)
		echo '
			<iframe src="http://127.0.0.1/trainBruiser.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 5)
		echo '
			<iframe src="http://127.0.0.1/trainHit.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 6)
		echo '
			<iframe src="http://127.0.0.1/trainGunner.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 7)
		echo '
			<iframe src="http://127.0.0.1/trainSniper.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 8)
		echo '
			<iframe src="http://127.0.0.1/trainBlack.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 9)
		echo '
			<iframe src="http://127.0.0.1/trainButcher.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else 
		echo '
			<iframe src="http://127.0.0.1/trainAss.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';		
}
echo '<iframe src="http://127.0.0.1/troopCacheWrite.php?hood='.$current.'&atroop='.$atroop.'&aQty='.$aQty.'&dtroop='.$dtroop.'&dQty='.$dQty.'" width="10" height="10"></iframe>';
		
?>
	
  </body>  
</html>   