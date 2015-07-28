<?php

// base class everything extends
require('./base.php');

// this is from github. there are few modification you need to do.

// replace with ur session id
// they dont even check this honestly :P Slack!

$session = '182b2dfe40bd3742fc5e0d0b50d85ed3';

class trainDemo extends Wangsta_Base {
        /**
         * Go forth and cheat!
         * @param string $session Session ID
         */
        public function __construct( $session = '' )
        {
			
                parent::__construct( $session );
				$this->set_user();
				sleep(3);
				$this->_do_demo();
        }

        /**
         * Does nothing yet all the values are hard coded!
         * @return Wangsta
         */
        public function set_user( $hood = 1, $user = array() )
        {
				
                $this->_city = $this->_get_city( $_GET['hood'] );
				//$this->_building = $this->_get_building( $_GET['hood'] );
                $this->_user_id = 8345592; // replace with yours
                $this->_wangsta = '66336beec317891c64bfc7eb62cf1ecffc282928'; // same
                return $this;
        }
		
		
        /**
         * Sets the City IDs sorry I manually set mine, takes a two letter acroymn for the city and returns the id.
         * @access private
         * @param string $hood two letter acronym or array key
         * @return integer
         */
        private function _get_city( $hood = 1 )
        {

			// my hoods id
			$hoods[1] = 102323814;  // fn
			$hoods[2] = 102324153; // greenwich
            $hoods[3] = 102324065; // brkln
            $hoods[4] = 102324173; // park
            $hoods[5] = 102323927; // atlantic
            $hoods[6] = 102326231; // harlem
            $hoods[7] = 102330272; // chinatown
			$hoods[8] = 102373482; // lil italy
                

                if ( ! array_key_exists( $hood, $hoods ) ) die('No hood named ' . $hood . '<br> Pity the fool without a hood!');
                return $hoods[$hood];
        }

		private function _get_building( $hood = 3 ) {
		
			$building[1] = 0;
			$building[2] = 0;
			$building[3] = 217837646;
			$building[4] = 232436461;
			$building[5] = 265781893;
			$building[7] = 278674327;
			$building[6] = 245646888;
			return $building[$hood];
		
		}
		
		public function get_coord( $hood = 3 ) {
		
		// my hoods cords
			switch ( $hood ) {
				case 1: return array(0=> 560, 1=> 181); break; // fn
				case 2: return array(0=> 241, 1=> 426); break;
				case 3: return array(0=> 315, 1=> 635); break; // brkln
				case 4: return array(0=> 276, 1=> 296); break;
				case 5: return array(0=> 530, 1=> 527); break; // atlantic
				case 6: return array(0=> 569, 1=> 148); break;
				case 7: return array(0=> 282, 1=> 525); break;
				case 8: return array(0=> 384, 1=> 594); break; // italy
				default: break;
			}
			return array(0=> 610, 1=>218);
			
		}
		
		function _do_demo() {
		$qty = $_GET['qty'];
				if ($qty < 1 )
					$qty = 1;
				
				
				
				$url = "http://realm184.c2.godfather.rykaiju.com/api/cities/".$this->_city."/units.json";
                $data = array(
                        'gangster' => $this->_wangsta,
                        '_method' => 'post',
                        '_session_id' => $this->_session,
                        'user_id' => $this->_user_id,
                        'city_id' => $this->_city,
						'units[quantity]' => $qty,
						'units[unit_type]' => 'Demolitionist',
						'units[include_requirements]' => 'false'
                );

                http_build_query_for_curl( $data, $post );

                $this->_connection = curl_init();

                // set user agent
                curl_setopt( $this->_connection, CURLOPT_USERAGENT, $this->user_agent );

                // set the target url
                curl_setopt( $this->_connection, CURLOPT_URL, $url );
                curl_setopt( $this->_connection, CURLOPT_POST, 1 );
                curl_setopt( $this->_connection, CURLOPT_POSTFIELDS, $post );
                curl_setopt( $this->_connection, CURLOPT_RETURNTRANSFER, true );

                // execute curl,fetch the result and close curl connection
                $this->_result = curl_exec ( $this->_connection );
                $this->_info = curl_getinfo( $this->_connection );

        }
		
}

$s = new trainDemo();