<?php

// base class everything extends
require('./base.php');



// replace with ur session id
// they dont even check this honestly :P Slack!
$session = 'd26cb8b15d1f8e62ea16943b70294b15';

class Wangsta extends Wangsta_Base {

        protected $_gangs = array();
        public $_troops = '';

        /**
         * Go forth and cheat!
         * @param string $session Session ID
         */
        public function __construct( $session = '' )
        {
                parent::__construct( $session );
                $this->set_user();
        }

        /**
         * Does nothing yet all the values are hard coded!
         *
         * @return Wangsta
         */
        public function set_user( $hood = 3, $user = array() )
        {

				if ($_GET['hood'] < 1)
					die("Wrong hood number");
					
                $this->_city = $this->_get_city( $_GET['hood'] );
                $this->_user_id = 8345592; // replace with yours
                $this->_wangsta = '66336beec317891c64bfc7eb62cf1ecffc282928'; // same
                return $this;
        }

        // ------------------------------------------------------------------------

        /**
         * Sets the City IDs sorry I manually set mine, takes a two letter acroymn for the city and returns the id.
         * @access private
         * @param string $hood two letter acronym or array key
         * @return integer
         */
        private function _get_city( $hood = 3 ) {

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


		public function get_coord( $hood = 1 ) {
		
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
		
		
        /**
         * Fetchs Gangs and CityScapes near the cords provided
         * @param array $cords Array of ['x'] and ['y'] cords.
         * @param array $level Level of Gang your hunting for.
         * @return not sure yet lol builds a array of available gangs to hit, not sure if should return them or maybe save them to a file or what.
         */
        public function get_map( $cords = array(), $level = 2 )
        {
                $url = "http://realm184.c2.godfather.wonderhill.com/api/map.json?";
                $data = array(
                        'x' => $cords['x'],
                        'gangster' => $this->_wangsta,
                        'y' => $cords['y'],
                        '_session_id' => $this->_session,
                        'user_id' => $this->_user_id,
                        'city_id' => $this->_city,
                );

                $url = $url . array_implode( '=', '&', $data );

                $this->_connection = curl_init();

                // set user agent
                curl_setopt( $this->_connection, CURLOPT_USERAGENT, $this->user_agent );

                // set the target url
                curl_setopt( $this->_connection, CURLOPT_URL, $url );
                curl_setopt( $this->_connection, CURLOPT_RETURNTRANSFER, true );

                // execute curl,fetch the result and close curl connection
                $this->_result = curl_exec ( $this->_connection );
                $this->_info = curl_getinfo( $this->_connection );

                if ( is_string( $this->_result ) )
                {
                        $this->_result = json_decode( $this->_result );
                }
                $terrain = $this->_result->terrain;
                //$useful = array( 'Gang', 'CityScape' );
                $useful = array( 'Gang' );
                
                $gangs = array();
                $total = count($terrain);
                $i = 0;
                foreach( $terrain as $citys )
                {
                        foreach ($citys as $map)
                        {
                        //$map = array_shift( $map );
                                // Check for Gang/CS
                                if ( $level != $map[1] OR ! in_array( $map[0], $useful ) ) continue;
                                $gangs['x'] = $map[2];
                                $gangs['y'] = $map[3];
                                $this->_gangs[$i] = $gangs;
                                ++$i;
                        }
                }
                return $this->_gangs;
        }


        public function set_troops( $units = null )
        {
                if ( is_array( $units ) )
                {
                        $units = json_encode( $units );
                } else if ( ! $units ) {
                        $units = '{"Demolitionist":35}';
                }
                $this->_troops = $units;
                return $this;
        }

        /**
         * Handles attacks
         * @param int $x
         * @param int $y
         * @return void
         */
        function attack($x, $y)
        {
                if ( ! is_numeric($x) OR ! is_numeric($y) ) return;
                if ( 0 == $this->_aos_left ) return;

                $url = "http://realm184.c2.godfather.wonderhill.com/api/cities/{$this->_city}/marches.json";

                $data = array(
                        "march[y]" => $y,
                        '_method' =>'post',
                        'gangster' => $this->_wangsta,
                        'city_id' => $this->_city,
                        'march[x]' => $x,
                        'user_id' => $this->_user_id,
                        'march[units]' => $this->_troops,
                        'march[floor]' => 1,
                        '_session_id' => $this->_session,
                );

                $r = $this->_do_beer_curls( $url, $data );
                
        }

        /**
         * Handles my 22oz curls, ok it sends the data via post atm.
         * @param string $url
         * @param mixed $data
         * @return Wangsta
         */
        public function _do_beer_curls( $url = '', $data = '' )
        {

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

                // Request failed
                if ( false === $this->_result )
                {
                        $this->_error_code = curl_errno( $this->_connection );
                        $this->_error_msg = curl_error( $this->_connection );
                        echo cli_message( " SAY WHAT ONE MORE TIME I DARE YA!\n\n Error Code = {$this->_error_code}\n Error MSG = {$this->_error_msg}\n");
                } else {
                        $this->_parse_result();
                        echo cli_message( "ATTACK RESULTS \n\t\tAO's Left = {$this->_aos_left}\n");
                }
                curl_close ( $this->_connection );
                $this->debug();
                die();
                return $this;
        }

        private function _parse_result()
        {
                if ( is_string( $this->_result ) )
                {
                        $this->_result = json_decode( $this->_result );
                }


                 $this->_aos_left = isset( $this->_result->energy) ? $this->_result->energy : $this->_aos_left;
        }



        private function debug()
        {
                if ( false === $this->_debug_mode ) return $this;
                $this->_info = is_array( $this->_info ) ? implode("\n", $this->_info ) : $this->_info;

                dump( $this->_result, $this->_info, $this->_error_code, $this->_error_msg );
                return $this;
                echo cli_message( "
                        DEBUG DUMP\n
                        \t\t----------------------
                        \t\t\t Result = {$this->_result} \n
                        \t\t\t Result Info = {$this->_info} \n
                        \t\t\t Error Code = {$this->_error_code} \n
                        \t\t\t Error Message = {$this->_error_msg} \n

                        " );
                return $this;
        }

}

$gangsta = new Wangsta ( $session );

$units = array(

        "Demolitionist" => 35
);


$gangsta->set_troops( $units );
$seed1 = $seed2 = 1;

if (rand(1, 999) % 2 == 0) $seed1 = -1;
if (rand(1, 999) % 2 == 0) $seed2 = -1;

if ($_GET['hood'] < 1)
	die("Wrong hood number");
	
$coord = $gangsta->get_coord( $_GET['hood']);


$x = $coord[0] + ( rand(1, 99) * $seed1 );
$y = $coord[1] + ( rand(1, 99) * $seed2 );

$gangs = $gangsta->get_map( array('x' => $x, 'y' => $y) );


$gang_hit = $wave = 0;
$max_waves = 4;
$sleep_time = 90;
$total_gangs = count( $gangs );


//$total_gangs = 30;
$gangs = array_reverse( $gangs );



credits();
$start_time = time_start();

foreach ($gangs as $g) {
        $gangsta->attack($g['x'], $g['y']);
        // Check match waves and sleep
        ++$wave;
        ++$gang_hit;
		die();
}


time_end();
echo cli_message( "Total gangs in array = {$total_gangs}\nTotal gangs hit = {$gang_hit}" );

// display result
print json_decode( $result );