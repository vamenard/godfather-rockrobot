 <?php
 
 //require_once 'trainConfig.php';
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
    <meta http-equiv="refresh" content="<? echo $refresh; ?>;URL='http://127.0.0.1/godfather-hack/trainallCtrl.php?hood=<?php echo $next; ?>'" />    
  </head>    
  <body> 
<?php

if ($_GET['hood'] > 1) {
	//do not RI your own FN
	echo '
		<iframe src="http://127.0.0.1/godfather-hack/RIall.php?hood='.$current.'" width="200" height="200"></iframe>';
}

$aQty = 1;
$dQty = 1;
$atroop = 'null';
$dtroop = 'null';

if (  $_GET['hood'] != 1 ) {
	$troop = round(rand(0, 6));

	if ($troop == 2)
		$troop = 4;
	if (($_GET['hood'] == 6) && ($troop == 1))
		$troop = 5;
		
	$qty = getQtyDefense( $_GET['hood'], $troop );
	$dQty = $qty;
	$dtroop = $troop;
	
	
	if ($troop == 1) 
		echo '
		<iframe src="http://127.0.0.1/godfather-hack/trainBarbed.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';
	else if ($troop == 2) 
		echo '
		<iframe src="http://127.0.0.1/godfather-hack/trainBooby.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';
	else if ($troop == 3)
		echo '
		<iframe src="http://127.0.0.1/godfather-hack/trainDogs.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';
	else if ($troop == 4)
		echo '
		<iframe src="http://127.0.0.1/godfather-hack/trainArmed.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';
	else
		echo '
		<iframe src="http://127.0.0.1/godfather-hack/trainDoe.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';
}
		
		
if (  ($_GET['hood'] == 1 ) || ($_GET['hood'] == 2 ) || ($_GET['hood'] == 6 ) || ($_GET['hood'] == 8 ) ) { 
	$troop = round(rand(1, 11));
	
	if (($troop > 9) && ($_GET['hood'] == 8))
		$troop = 8; // Cannot train Assasin in italy
	if (($troop < 1) && ($_GET['hood'] == 8))
		$troop = 8; // Cannot train Assasin in italy

	$qty = getQtyAttack( $_GET['hood'], $troop );
	$aQty = $qty;
	$atroop = $troop;
	
	if ($troop == 1)
		echo '
			<iframe src="http://127.0.0.1/godfather-hack/trainThugs.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 2)
		echo '
			<iframe src="http://127.0.0.1/godfather-hack/trainArs.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 3)
		echo '
			<iframe src="http://127.0.0.1/godfather-hack/trainDemo.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 4)
		echo '
			<iframe src="http://127.0.0.1/godfather-hack/trainBruiser.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 5)
		echo '
			<iframe src="http://127.0.0.1/godfather-hack/trainHit.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 6)
		echo '
			<iframe src="http://127.0.0.1/godfather-hack/trainGunner.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 7)
		echo '
			<iframe src="http://127.0.0.1/godfather-hack/trainSniper.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 8)
		echo '
			<iframe src="http://127.0.0.1/godfather-hack/trainBlack.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else if ($troop == 9)
		echo '
			<iframe src="http://127.0.0.1/godfather-hack/trainButcher.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';	
	else 
		echo '
			<iframe src="http://127.0.0.1/godfather-hack/trainAss.php?hood='.$current.'&qty='.$qty.'" width="10" height="10"></iframe>';		
}
echo '<iframe src="http://127.0.0.1/godfather-hack/troopCacheWrite.php?hood='.$current.'&atroop='.$atroop.'&aQty='.$aQty.'&dtroop='.$dtroop.'&dQty='.$dQty.'" width="10" height="10"></iframe>';
		
?>
	
  </body>  
</html>   