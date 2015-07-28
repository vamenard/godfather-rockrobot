<?

function getQtyAttack( $hood, $troop ) {
	switch ( $troop ) {
		case 1: //thug
			$qty = 475;
			if ($hood == 1) { $qty = 2050; }
			if ($hood == 2) { $qty = 2130; }
			if ($hood == 3) { $qty = 1825; }
			if ($hood == 4) { $qty = 1400; }
			if ($hood == 5) { $qty = 2190; }
			if ($hood == 6) {
				$qty = 1140;
			}
			if ($hood == 7) { $qty = 2520; }
			if ($hood == 8) { $qty = 1825; }
			break;
		case 2: // arsonist
			$qty = 350;
			if ($hood == 1) { $qty = 1780; }
			if ($hood == 2) { $qty = 1580; }
			if ($hood == 3) {
				$qty = 900;
			}
			if ($hood == 4) {
				$qty = 1905;
			}
			if ($hood == 5) { $qty = 1750; }
			if ($hood == 6) { $qty = 1645; }
			if ($hood == 7) { $qty = 1740; }
			if ($hood == 8) { $qty = 1825; } ///
			break;
		case 3: // demo
		$qty = 345;
				if ($hood == 1) { $qty = 1280; }
				if ($hood == 2) { $qty = 940; }
				if ($hood == 3) {
					$qty = 690;
				}
				if ($hood == 4) { $qty = 1222; }
				if ($hood == 5) { $qty = 1090; }
				if ($hood == 6) { $qty = 912; }
				if ($hood == 7) { $qty = 1120; }
				if ($hood == 8) { $qty = 912; }
			
			break;
		case 4: // bruiser
			$qty = 110;
				if ($hood == 1) { $qty = 725; }
				if ($hood == 2) { $qty = 650; }
				if ($hood == 3) { $qty = 735; } // inactive for me
				if ($hood == 4) { $qty = 470; } // todo
				if ($hood == 5) { $qty = 380; } // todo
				if ($hood == 6) { $qty = 630; }
				if ($hood == 7) { $qty = 430; } // todo
				if ($hood == 8) { $qty = 757; }
				
			break;
		case 5: // hitman
			$qty = 110;
				if ($hood == 1) { $qty = 464; }
				if ($hood == 2) { $qty = 370; }
				if ($hood == 3) { $qty = 482; }
				if ($hood == 4) { $qty = 470; }
				if ($hood == 5) { $qty = 380; } 
				if ($hood == 6) { $qty = 400; }
				if ($hood == 7) { $qty = 430; } 
				if ($hood == 8) { $qty = 430;
				}
			break;
		case 6: // Gunner
				$qty = 124;
				if ($hood == 1) { $qty = 148; }
				if ($hood == 2) { $qty = 131; }
				if ($hood == 3) { $qty = 150; }
				if ($hood == 4) { $qty = 158; }
				if ($hood == 5) { $qty = 130; }
				if ($hood == 6) { $qty = 135; }
				if ($hood == 7) { $qty = 145; }
				if ($hood == 8) { $qty = 150; }
			break;
		case 7: // Sniper
			$qty = 13;
				if ($hood == 1) { $qty = 54; }
				if ($hood == 2) { $qty = 43; }
				if ($hood == 3) { $qty = 56; }
				if ($hood == 4) { $qty = 54; }
				if ($hood == 5) { $qty = 48; }
				if ($hood == 6) { $qty = 42; }
				if ($hood == 7) { $qty = 50; }
				if ($hood == 8) { $qty = 50; }
			break;
		case 8: // Black
			$qty = 6;
				if ($hood == 1) { $qty = 24; }
				if ($hood == 2) { $qty = 21; }
				if ($hood == 3) { $qty = 24; }
				if ($hood == 4) { $qty = 26; }
				if ($hood == 5) { $qty = 20; }
				if ($hood == 6) { $qty = 22; }
				if ($hood == 7) { $qty = 24; }
				if ($hood == 8) { $qty = 24; }
			break;
		case 9: // Butcher
			$qty = 9;
				if ($hood == 1) { $qty = 34; }
				if ($hood == 2) { $qty = 30; }
				if ($hood == 3) { $qty = 34; }
				if ($hood == 4) { $qty = 36; }
				if ($hood == 5) { $qty = 32; }
				if ($hood == 6) { $qty = 30; }
				if ($hood == 7) { $qty = 33; }
				if ($hood == 8) { $qty = 34; }
		break;
		
		default:
			// Assassin
			$qty = 6;
				if ($hood == 1) { $qty = 26; }
				if ($hood == 2) { $qty = 20; }
				if ($hood == 3) { $qty = 29; }
				if ($hood == 4) { $qty = 26; }
				if ($hood == 5) { $qty = 20; }
				if ($hood == 6) { $qty = 22; }
				if ($hood == 7) { $qty = 24; }
				if ($hood == 8) { $qty = 22; }
			break;
	
		}	
	return $qty;
	
}

function getQtyDefense( $hood, $troop ) {

	switch ( $troop ) {
		case 1: // Wires
			$qty = 500;
				if ($hood == 1) $qty = 1950;
				if ($hood == 2) $qty = 1720;
				if ($hood == 3) $qty = 912;
				if ($hood == 4) $qty = 1850;
				if ($hood == 5) $qty = 1095;
				if ($hood == 6) $qty = 912;
				if ($hood == 7) $qty = 1932;
				if ($hood == 8) $qty = 912;
		break;
		
		case 2: // Traps
			$qty = 320;
				if ($hood == 1) $qty = 1227;
				if ($hood == 2) $qty = 1110;
				if ($hood == 3) $qty = 912;
				if ($hood == 4) $qty = 616;
				if ($hood == 5) $qty = 1095;
				if ($hood == 6) $qty = 912;
				if ($hood == 7) $qty = 1225;
				if ($hood == 8)
					$qty = 755;
		break;
		
		case 3:
			$qty = 225;
			if ($hood == 1) $qty = 802;
			if ($hood == 2) $qty = 700;
			if ($hood == 3) $qty = 608;
			if ($hood == 4) $qty = 775;
			if ($hood == 5) $qty = 730;
			if ($hood == 6) $qty = 608;
			if ($hood == 7) $qty = 770;
			if ($hood == 8) $qty = 608;
		break;
		
		case 4:
			$qty = 400;
				if ($hood == 1) $qty = 480;
				if ($hood == 2) $qty = 420;
				if ($hood == 3) $qty = 520;
				if ($hood == 4) $qty = 470;
				if ($hood == 5) $qty = 500;
				if ($hood == 6) $qty = 478;
				if ($hood == 7) $qty = 470;
				if ($hood == 8) $qty = 592;
					
		break;
		
		default:
				$qty = 7;
				if ($hood == 1) $qty = 26;
				if ($hood == 2) $qty = 22;
				if ($hood == 3) $qty = 28;
				if ($hood == 4) $qty = 26;
				if ($hood == 5) $qty = 28;
				if ($hood == 6) $qty = 26;
				if ($hood == 7) $qty = 26;
				if ($hood == 8) $qty = 30;
		break;
		
		
	}
	
	return $qty;
}