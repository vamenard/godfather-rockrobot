<?

function getQtyAttack( $hood, $troop ) {
	switch ( $troop ) {
		case 1: //thug
			$qty = 475;
			if ($hood == 1) { $qty = 21275; }
			if ($hood == 2) { $qty = 6150; }
			if ($hood == 3) { $qty = 1825; }
			if ($hood == 4) { $qty = 6610; }
			if ($hood == 5) { $qty = 2190; }
			if ($hood == 6) { $qty = 1825; }
			if ($hood == 7) { $qty = 5360; }
			if ($hood == 8) { $qty = 1825; }
			break;
		case 2: // arsonist
			$qty = 350;
			if ($hood == 1) { $qty = 17140; }
			if ($hood == 2) { $qty = 4175; }
			if ($hood == 3) { $qty = 900; }
			if ($hood == 4) { $qty = 3550; }
			if ($hood == 5) { $qty = 1750; }
			if ($hood == 6) { $qty = 1645; }
			if ($hood == 7) { $qty = 2627; }
			if ($hood == 8) { $qty = 1825; } ///
			break;
		case 3: // demo
			$qty = 345;
			if ($hood == 1) { $qty = 1760; }
				if ($hood == 2) { $qty = 970; }
				if ($hood == 3) {
					$qty = 690;
				}
				if ($hood == 4) { $qty = 2920; }
				if ($hood == 5) { $qty = 1090; }
				if ($hood == 6) { $qty = 912; }
				if ($hood == 7) { $qty = 1730; }
				if ($hood == 8) { $qty = 912; }
			
			break;
		case 4: // bruiser
			$qty = 110;
			if ($hood == 1) { $qty = 1290; }
			if ($hood == 2) { $qty = 1700; }
			if ($hood == 3) { $qty = 735; } // inactive for me
			if ($hood == 4) { $qty = 470; }
			if ($hood == 5) { $qty = 380; } 
			if ($hood == 6) { $qty = 844; }
			if ($hood == 7) { $qty = 1280; }
			if ($hood == 8) { $qty = 912; }
				
			break;
		case 5: // hitman
			$qty = 110;
			if ($hood == 1) { $qty = 4250; }
			if ($hood == 2) { $qty = 385; }
			if ($hood == 3) { $qty = 482; }
			if ($hood == 4) { $qty = 470; }
			if ($hood == 5) { $qty = 608; } 
			if ($hood == 6) { $qty = 400; }
			if ($hood == 7) { $qty = 500; } 
			if ($hood == 8) { $qty = 527; }
			break;
			
		case 6: // Enforcers
			$qty = 110;
			if ($hood == 1) { $qty = 395; }
			if ($hood == 2) { $qty = 219; }
			if ($hood == 3) { $qty = 545; }
			if ($hood == 4) { $qty = 315; }
			if ($hood == 5) { $qty = 365; }
			if ($hood == 6) { $qty = 490; }
			if ($hood == 7) { $qty = 301; }
			if ($hood == 8) { $qty = 668; }
			break;
		case 7: // Gunner
			$qty = 124;
			if ($hood == 1) { $qty = 1420; }
			if ($hood == 2) { $qty = 348; }
			if ($hood == 3) { $qty = 292; }
			if ($hood == 4) { $qty = 158; }
			if ($hood == 5) { $qty = 339; }
			if ($hood == 6) { $qty = 325; }
			if ($hood == 7) { $qty = 240; }
			if ($hood == 8) { $qty = 375; }
			break;
		case 8: // Pro
			$qty = 1;
			if ($hood == 1) { $qty = 125; }
			if ($hood == 2) { $qty = 69; }
			if ($hood == 3) { $qty = 241; }
			if ($hood == 4) { $qty = 158; }
			if ($hood == 5) { $qty = 209; }
			if ($hood == 6) { $qty = 201; }
			if ($hood == 7) { $qty = 165; }
			if ($hood == 8) { $qty = 216; }
			break;
		case 9: // Sniper
			$qty = 13;
				if ($hood == 1) { $qty = 253; }
				if ($hood == 2) { $qty = 45; }
				if ($hood == 3) { $qty = 57; }
				if ($hood == 4) { $qty = 54; }
				if ($hood == 5) { $qty = 100; }
				if ($hood == 6) { $qty = 100; }
				if ($hood == 7) { $qty = 58; }
				if ($hood == 8) { $qty = 61; }
			break;
		case 10: // Butcher
			$qty = 9;
				if ($hood == 1) { $qty = 365; }
				if ($hood == 2) { $qty = 42; }
				if ($hood == 3) { $qty = 35; }
				if ($hood == 4) { $qty = 36; }
				if ($hood == 5) { $qty = 32; }
				if ($hood == 6) { $qty = 30; }
				if ($hood == 7) { $qty = 38; }
				if ($hood == 8) { $qty = 47; }
		break;
		case 11: // Black
			$qty = 6;
				if ($hood == 1) { $qty = 235; }
				if ($hood == 2) { $qty = 22; }
				if ($hood == 3) { $qty = 25; }
				if ($hood == 4) { $qty = 26; }
				if ($hood == 5) { $qty = 54; }
				if ($hood == 6) { $qty = 22; }
				if ($hood == 7) { $qty = 27; }
				if ($hood == 8) { $qty = 24; }
			break;
		
		
		case 12:
			// Assassin
			$qty = 6;
				if ($hood == 1) { $qty = 37; }
				if ($hood == 2) { $qty = 20; }
				if ($hood == 3) { $qty = 69; }
				if ($hood == 4) { $qty = 61; }
				if ($hood == 5) { $qty = 20; }
				if ($hood == 6) { $qty = 22; }
				if ($hood == 7) { $qty = 27; }
				if ($hood == 8) { $qty = 62; }
			break;
		
		case 13: // TriggerMan
			$qty = 1;
			if ($hood == 1) { $qty = 143; }
			else { die(); }
		break;
		
		case 14: // Smuggler
			$qty = 1;
			if ($hood == 2) { $qty = 40; }
			else { die(); }
		break;
		
		case 15: // Undertaker
			$qty = 1;
			if ($hood == 3) { $qty = 49; }
			else { die(); }
		break;
		
		case 16: // Doctor
			$qty = 1;
			if ($hood == 4) { $qty = 38; }
			else { die(); }
		break;
		
		case 17: // Loanshark
			$qty = 1;
			if ($hood == 5) { $qty = 42; }
			else { die(); }
		break;
		
		case 18: // Bartender
			$qty = 1;
			if ($hood == 6) { $qty = 38; }
			else { die(); }
		break;
		
		case 19: // HatchetMan
			$qty = 1;
			if ($hood == 7) { $qty = 25; }
			else { die(); }
		break;
		
		case 20: // Heavyweight
			$qty = 1;
			if ($hood == 8) { $qty = 18; }
			else { die(); }
		break;
		
		case 21: // CrookedCop
			$qty = 1;
			if ($hood == 2) { $qty = 34; }
			else { die(); }
		break;
		
		case 22: // DRC
			$qty = 1;
			if ($hood == 3) { $qty = 42; }
			else { die(); }
		break;
		
		case 23: // PIG
			$qty = 1;
			if ($hood == 4) { $qty = 34; }
			else { die(); }
		break;
		
		case 24: // GMan
			$qty = 1;
			if ($hood == 5) { $qty = 35; }
			else { die(); }
		break;
		
		case 26: // Highbinder
			$qty = 1;
			if ($hood == 7) { $qty = 28; }
			else { die(); }
		break;
		
		case 27: // Captain
			$qty = 1;
			if ($hood == 8) { $qty = 37; }
			else { die(); }
		break;
		
		case 28: // Snip
			$qty = 1;
			if ($hood == 2) { $qty = 31; }
			else { die(); }
		break;
		
		case 29: // Haul
			$qty = 1;
			if ($hood == 3) { $qty = 39; }
			else { die(); }
		break;
		
		case 30: // Split
			$qty = 1;
			if ($hood == 4) { $qty = 32; }
			else { die(); }
		break;
		
		}
	return $qty;
	
}

function getQtyDefense( $hood, $troop ) {

	switch ( $troop ) {
		case 1: // Wires
			$qty = 500;
				if ($hood == 1) $qty = 4520;
				if ($hood == 2) $qty = 3410;
				if ($hood == 3) $qty = 912;
				if ($hood == 4) $qty = 2890;
				if ($hood == 5) $qty = 1095;
				if ($hood == 6) $qty = 912;
				if ($hood == 7) $qty = 2580;
				if ($hood == 8) $qty = 912;
		break;
		
		case 2: // Traps
			$qty = 320;
				if ($hood == 1) $qty = 1570;
				if ($hood == 2) $qty = 1200;
				if ($hood == 3) $qty = 912;
				if ($hood == 4) $qty = 1550;
				if ($hood == 5) $qty = 1095;
				if ($hood == 6) $qty = 912;
				if ($hood == 7) $qty = 1650;
				if ($hood == 8)
					$qty = 755;
		break;
		
		case 3:
			$qty = 225;
			if ($hood == 1) $qty = 1000;
			if ($hood == 2) $qty = 750;
			if ($hood == 3) $qty = 608;
			if ($hood == 4) $qty = 1630;
			if ($hood == 5) $qty = 730;
			if ($hood == 6) $qty = 608;
			if ($hood == 7) $qty = 1216;
			if ($hood == 8) $qty = 608;
		break;
		
		case 4:
			$qty = 400;
			if ($hood == 1) $qty = 607;
			if ($hood == 2) $qty = 810;
			if ($hood == 3) $qty = 547;
			if ($hood == 4) $qty = 855;
			if ($hood == 5) $qty = 608;
			if ($hood == 6) $qty = 608;
			if ($hood == 7) $qty = 860;
			if ($hood == 8) $qty = 608;
					
		break;
		
		case 9:
			if ($hood == 1) $qty = 14;
			else die();
		break;
		
		default:
				$qty = 7;
				if ($hood == 1) $qty = 48;
				if ($hood == 2) $qty = 46;
				if ($hood == 3) $qty = 57;
				if ($hood == 4) $qty = 55;
				if ($hood == 5) $qty = 56;
				if ($hood == 6) $qty = 52;
				if ($hood == 7) $qty = 48;
				if ($hood == 8) $qty = 57;
		break;
		
		
	}
	
	return $qty;
}