<?
// hood, troop, qty
sleep(5);

$file = 'cache-hood'.$_GET['hood'].'.txt';

$troop = $_GET['atroop'];

// forming troop string;
$jsonStr  = '{"';
	if ($troop == 1)
		$jsonStr .= 'Thug":';
	else if ($troop == 2)
		$jsonStr .= 'Arsonist":';
	else if ($troop == 3)
		$jsonStr .= 'Demolitionist":';
	else if ($troop == 4)
		$jsonStr .= 'Bruiser":';
	else if ($troop == 5)
		$jsonStr .= 'Hitman":';
	else if ($troop == 6)
		$jsonStr .= 'TommyGunner":';
	else if ($troop == 7)
		$jsonStr .= 'Sniper":';
	else if ($troop == 8)
		$jsonStr .= 'BlackWidow":';
	else if ($troop == 9)
		$jsonStr .= 'Butcher":';
	else if ($troop == 'null') 
		$jsonStr .= 'null":';
	else 
		$jsonStr .= 'Assassin":';
	
$jsonStr .= $_GET['aQty'].',';
$jsonStr  .= '"';

$troop = $_GET['dtroop'];
// forming def troops

	if ($troop == 1)
		$jsonStr .= 'BarbedWire":';
	else if ($troop == 2)
		$jsonStr .= 'BoobyTrap":';
	else if ($troop == 3)
		$jsonStr .= 'GuardDog":';
	else if ($troop == 4)
		$jsonStr .= 'ArmedGuard":';
	else if ($troop == 'null') 
		$jsonStr .= 'null":';
	else 
		$jsonStr .= 'UnnamedDefender":';
	

$jsonStr .= $_GET['dQty'].'}';
file_put_contents($file, $jsonStr );
