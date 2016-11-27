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
		$jsonStr .= 'Enforcer":';
	else if ($troop == 7)
		$jsonStr .= 'TommyGunner":';
	else if ($troop == 8)
		$jsonStr .= 'Professional":';
	else if ($troop == 9)
		$jsonStr .= 'Sniper":';
	else if ($troop == 10)
		$jsonStr .= 'Butcher":';
	else if ($troop == 11)
		$jsonStr .= 'BlackWidow":';
	else if ($troop == 12)
		$jsonStr .= 'Assassin":';
	else if ($troop == 13)
		$jsonStr .= 'TriggerMan":';
	else if ($troop == 14)
		$jsonStr .= 'Smuggler":';
	else if ($troop == 15)
		$jsonStr .= 'Undertaker":';
	else if ($troop == 16)
		$jsonStr .= 'Doctor":';
	else if ($troop == 17)
		$jsonStr .= 'Loanshark":';
	else if ($troop == 18)
		$jsonStr .= 'Bartender":';
	else if ($troop == 19)
		$jsonStr .= 'HatchetMan":';
	else if ($troop == 20)
		$jsonStr .= 'Heavyweight":';
	else if ($troop == 21)
		$jsonStr .= 'CrookedCop":';
	else if ($troop == 22)
		$jsonStr .= 'DRC":';
	else if ($troop == 23)
		$jsonStr .= 'PIG":';
	else if ($troop == 26)
		$jsonStr .= 'Highbinder":';
	else if ($troop == 27)
		$jsonStr .= 'Captain":';
	else if ($troop == 30)
		$jsonStr .= 'MisterSplit":';
	else if ($troop == 'null') 
		$jsonStr .= 'null":';


if ($_GET['hood'] == 5) 
	$jsonStr .= round(round($_GET['aQty']) + (round($_GET['aQty']) * 0.09) - 1) .',';	
else if ($_GET['hood'] == 7) 
	$jsonStr .= round(round($_GET['aQty']) + (round($_GET['aQty']) * 0.09) - 1) .',';
else if ($_GET['hood'] == 8) 
	$jsonStr .= round(round($_GET['aQty']) + (round($_GET['aQty']) * 0.05) - 1) .',';
else
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
	else if ($troop == 9)
		$jsonStr .= 'MoneyMan":';
	
	else if ($troop == 'null') 
		$jsonStr .= 'null":';
	else 
		$jsonStr .= 'UnnamedDefender":';
	

if ($_GET['hood'] == 5) 
	$jsonStr .= round(round($_GET['dQty']) + (round($_GET['dQty']) * 0.09) - 1) .'}';	
else if ($_GET['hood'] == 7) 
	$jsonStr .= round(round($_GET['dQty']) + (round($_GET['dQty']) * 0.09) - 1) .'}';
else if ($_GET['hood'] == 8) 
	$jsonStr .= round(round($_GET['dQty']) + (round($_GET['dQty']) * 0.05) - 1) .'}';
else
	$jsonStr .= $_GET['dQty'].'}';

file_put_contents($file, $jsonStr );
