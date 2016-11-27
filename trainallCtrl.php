 <?php
 require_once 'config.php';
 require_once 'trainConfig-90m.php';
 $strategy = 'power';

 if ((round(date("H")) > 6) && (round(date("H")) < 12))
	$strategy = 'boxing';

 if (round(date("H")) > 12)
	$strategy = 'respect';

 $current = $_GET['hood'];
 $next = $_GET['hood'] + 1;

 if ($next == 9)
 	$next = 1; // hood number

$refresh = round(680); // 90 minus

 ?>
 <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Training Controller</title>
    <meta http-equiv="refresh" content="<? echo $refresh; ?>;URL='http://127.0.0.1/godfather-rockrobot/trainallCtrl.php?hood=<?php echo $next; ?>'" />
  </head>
  <body>
<?php
if ( ($_GET['hood'] != 1)  )
	echo '<iframe src="http://127.0.0.1/godfather-rockrobot/RIall.php?hood='.$current.'" width="200" height="200"></iframe>';

$aQty = 1;
$dQty = 1;
$atroop = 'null';
$dtroop = 'null';

if ( 1 ) {
	$troop = getDefenseTroop( $strategy, $_GET['hood'] );

	$qty = getQtyDefense( $_GET['hood'], $troop );
	$dQty = $qty;
	$dtroop = $troop;

  $iframe = '<iframe src="http://127.0.0.1/godfather-rockrobot/trainDefenseTroop.php';
  $iframe .= '?dTroopName='.$dTroopName[$troop];
  $iframe .= '&hood='.$current;
  $iframe .= '&qty='.$qty;
  $iframe .= '" width="10" height="10"></iframe>';

  echo $iframe;
}

if  ( 1 ) {
	  $troop = getAttackTroop( $strategy, $_GET['hood'] );
	  $qty = getQtyAttack( $_GET['hood'], $troop );

	  $aQty = $qty;
	  $atroop = $troop;

	  $iframe = '<iframe src="http://127.0.0.1/godfather-rockrobot/trainAttackTroop.php';
    $iframe .= '?aTroopName='.$aTroopName[$troop];
    $iframe .= '&hood='.$current;
    $iframe .= '&qty='.$qty;
    $iframe .= '" width="10" height="10"></iframe>';

    echo $iframe;
}

if  ( ($_GET['hood'] != 1) )
echo '<iframe src="http://127.0.0.1/godfather-rockrobot/troopCacheWrite.php?hood='.$current.'&atroop='.$atroop.'&aQty='.$aQty.'&dtroop='.$dtroop.'&dQty='.$dQty.'" width="10" height="10"></iframe>';


function getAttackTroop( $strategy, $hood ) {
	$troop = 1;
	switch ($strategy) {
		case 'respect':
			if 		($hood == 1) { if (rand(1, 3) == 2) $troop = 10; else $troop = 5; }
			else if ($hood == 2) { if (rand(1, 3) == 2) $troop = 28; else $troop = 21; }
			else if ($hood == 3) {  if (rand(1, 3) == 2) $troop = 29; else $troop = 22; }
			else if ($hood == 4) {  if (rand(1, 3) == 2) $troop = 30; else $troop = 23; }
			else if ($hood == 5) { if (rand(1, 3) == 2) $troop = 24; else $troop = 17; }
			else if ($hood == 6) { $troop = 18; }
			else if ($hood == 7) { $troop = 26; }
			else if ($hood == 8) { $troop = 27; }
		break;

		case 'power':
			if 		($hood == 1) { if (rand(1, 3) == 2) $troop = 1; else $troop = 5; }
			else if ($hood == 2) { if (rand(1, 3) == 2) $troop = 4; else $troop = 7; }
			else if ($hood == 3) { $troop = 8; }
			else if ($hood == 4) { if (rand(1, 3) == 2) $troop = 1; else $troop = 3; }
			else if ($hood == 5) { if (rand(1, 3) == 2) $troop = 7; else $troop = 8; }
			else if ($hood == 6) { if (rand(1, 3) == 2) $troop = 7; else $troop = 8; }
			else if ($hood == 7) { $troop = 1; }
			else if ($hood == 8) { if (rand(1, 3) == 2) $troop = 6; else $troop = 8; }
		break;

		case 'boxing':
			if 		($hood == 1) { if (rand(1, 3) == 2) $troop = 13; else $troop = 11; }
			else if ($hood == 2) { if (rand(1, 3) == 2) $troop = 14; else $troop = 10; }
			else if ($hood == 3) { if (rand(1, 3) == 2) $troop = 15; else $troop = 12; }
			else if ($hood == 4) { if (rand(1, 3) == 2) $troop = 16; else $troop = 12; }
			else if ($hood == 5) { if (rand(1, 3) == 2) $troop = 11; else $troop = 9; }
			else if ($hood == 6) { if (rand(1, 3) == 2) $troop = 18; else $troop = 4; }
			else if ($hood == 7) { if (rand(1, 3) == 2) $troop = 26; else $troop = 19; }
			else if ($hood == 8) { $troop = 10; }
		break;

	}

	return $troop;
}


function getDefenseTroop( $strategy, $hood ) {
	$troop = 1;
	switch ($strategy) {
		case 'respect': case 'boxing':
			if 		($hood == 1) { $troop = 1; }
			else if ($hood == 2) { $troop = 5; }
			else if ($hood == 3) { $troop = 5; }
			else if ($hood == 4) { $troop = 5; }
			else if ($hood == 5) { $troop = 5; }
			else if ($hood == 6) { $troop = 5; }
			else if ($hood == 7) { $troop = 5; }
			else if ($hood == 8) { $troop = 5; }
		break;

		case 'power':
			if 		($hood == 1) { $troop = 1; }
			else if ($hood == 2) { $troop = 1; }
			else if ($hood == 3) { $troop = 5; }
			else if ($hood == 4) { $troop = 3; }
			else if ($hood == 5) { $troop = 5; }
			else if ($hood == 6) { $troop = 5; }
			else if ($hood == 7) { $troop = 4; }
			else if ($hood == 8) { $troop = 5; }
		break;
	}

	return $troop;
}
?>

  </body>
</html>
