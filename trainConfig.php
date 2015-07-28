<?

function getQtyAttack( $hood, $troop ) {
	switch ( $troop ) {
		case 1: //thug
			$qty = 475;
			if ($hood == 1) { $qty = 1450; }
			if ($hood == 2) { $qty = 1040;
			}
			if ($hood == 3) { $qty = 1550;
			}
			if ($hood == 4) { $qty = 1400;
			}
			if ($hood == 5) { $qty = 1220;
			}
			if ($hood == 6) {
				$qty = 1140;
			}
			if ($hood == 7) { $qty = 1240; }
			if ($hood == 8) {
				$qty = 1255;
			}
			break;
		case 2: // arsonist
			$qty = 350;
			if ($hood == 1) {
				$qty = 890;
			}
			if ($hood == 2) {
				$qty = 770;
			}
			if ($hood == 3) {
				$qty = 900;
			}
			if ($hood == 4) {
				$qty = 950;
			}
			if ($hood == 5) {
				$qty = 794;
			}
			if ($hood == 6) {
				$qty = 460;
			}
			if ($hood == 7) {
				$qty = 844;
			}
			if ($hood == 8) {
				$qty = 895;
			}
			break;
		case 3: // demo
		$qty = 345;
				if ($hood == 1) {
					$qty = 640;
				}
				if ($hood == 2) {
					$qty = 450;
				}
				if ($hood == 3) {
					$qty = 690;
				}
				if ($hood == 4) {
					$qty = 611;
				}
				if ($hood == 5) {
					$qty = 514;
				}
				if ($hood == 7) {
					$qty = 547;
				}
				if ($hood == 8) {
					$qty = 542;
				}
			
			break;
		case 4: // hitman
			$qty = 110;
				if ($hood == 1) {
					$qty = 232;
				}
				if ($hood == 2) {
					$qty = 180;
				}
				if ($hood == 3) {
					$qty = 241;
				}
				if ($hood == 4) {
					$qty = 235;
				}
				if ($hood == 5) {
					$qty = 196;
				}
				
				if ($hood == 6) {
					$qty = 200;
				}
				if ($hood == 7) { $qty = 208; }
				if ($hood == 8) {
					$qty = 215;
				}
			break;
		case 5: // Gunner
			$qty = 33;
				if ($hood == 1) {
					$qty = 74;
				}
				if ($hood == 2) {
					$qty = 62;
				}
				if ($hood == 3) {
					$qty = 75;
				}
				if ($hood == 4) {
					$qty = 79;
				}
				if ($hood == 5) {
					$qty = 65;
				}
				if ($hood == 6) {
					$qty = 67;
				}
				if ($hood == 7) {
					$qty = 70;
				}
				if ($hood == 8) {
					$qty = 75;
				}
			break;
		case 6: // Sniper
			$qty = 13;
				if ($hood == 1) {
					$qty = 27;
				}
				if ($hood == 3) {
					$qty = 28;
				}
				if ($hood == 4) {
					$qty = 27;
				}
				if ($hood == 5) {
					$qty = 24;
				}
				if ($hood == 6) {
					$qty = 21;
				}
				
				if ($hood == 7) { $qty = 24; }
				
				if ($hood == 8) {
					$qty = 25;
				}
			break;
		case 7: // Black
			$qty = 6;
				if ($hood == 1) {
					$qty = 12;
				}
				if ($hood == 2) {
					$qty = 10;
				}
				if ($hood == 3) {
					$qty = 12;
				}
				if ($hood == 4) {
					$qty = 13;
				}
				if ($hood == 5) {
					$qty = 10;
				}
				if ($hood == 6) {
					$qty = 11;
				}
				if ($hood == 7) { $qty = 11; }
				if ($hood == 8) {
					$qty = 12;
				}
			break;
		case 8: // Butcher
			$qty = 9;
				if ($hood == 1) {
					$qty = 17;
				}
				if ($hood == 2) {
					$qty = 14;
				}
				if ($hood == 3) {
					$qty = 17;
				}
				if ($hood == 4) {
					$qty = 18;
				}
				if ($hood == 5) {
					$qty = 16;
				}
				if ($hood == 6) {
					$qty = 15;
				}
				if ($hood == 7) { $qty = 16; }
				if ($hood == 8) {
					$qty = 17;
				}
		break;
		
		default:
			// Assassin
			$qty = 6;
				if ($hood == 1) {
					$qty = 13;
				}
				if ($hood == 2) {
					$qty = 9;
				}
				if ($hood == 3) {
					$qty = 14;
				}
				if ($hood == 4) {
					$qty = 13;
				}
				if ($hood == 5) {
					$qty = 10;
				}
				if ($hood == 6) {
					$qty = 11;
				}
				if ($hood == 7) { $qty = 11; }
				if ($hood == 8) {
					$qty = 11;
				}
			break;
	
		}	
	return $qty;
	
}

function getQtyDefense( $hood, $troop ) {

	switch ( $troop ) {
		case 1:
			$qty = 500;
				if ($hood == 1) $qty = 992;
				if ($hood == 2)
					$qty = 830;
				if ($hood == 3)
					$qty = 912;
				if ($hood == 4) $qty = 955;
				if ($hood == 5)
					$qty = 988;
				if ($hood == 6)
					$qty = 912;
				if ($hood == 8)
					$qty = 910;
		break;
		
		case 2:
			$qty = 320;
				if ($hood == 1) $qty = 640;
				if ($hood == 2)
					$qty = 535;
				if ($hood == 3)
					$qty = 682;
				if ($hood == 4) $qty = 616;
				if ($hood == 5)
					$qty = 606;
				if ($hood == 6)
					$qty = 590;
				if ($hood == 8)
					$qty = 755;
		break;
		
		case 3:
			$qty = 225;
			if ($hood == 1) $qty = 402;
			if ($hood == 2)
				$qty = 335;
			if ($hood == 3)
				$qty = 428;
			if ($hood == 4) $qty = 389;
			if ($hood == 5)
				$qty = 382;
			if ($hood == 8)
				$qty = 470;
		break;
		
		case 4:
			$qty = 200;
				if ($hood == 1) $qty = 245;
				if ($hood == 2)
					$qty = 205;
				if ($hood == 3)
					$qty = 260;
				if ($hood == 4) $qty = 235;
				if ($hood == 5)
					$qty = 245;
				if ($hood == 6)
					$qty = 225;
				if ($hood == 8)
					$qty = 290;
					
		break;
		
		default:
			$qty = 7;
				if ($hood == 1) $qty = 13;
				if ($hood == 2)
					$qty = 11;
				if ($hood == 3)
					$qty = 14;
				if ($hood == 4) $qty = 13;
				if ($hood == 5)
					$qty = 13;
				if ($hood == 6)
					$qty = 12;
				if ($hood == 8)
					$qty = 15;
		break;
		
		
	}
	
	return $qty;
}