<?php
/**
 * Attacks MI 1 and Gangs in Godfather,  Im not docing it anymore,  if you can't understnd u don't need to script. FizzBubble biatch.
 *
 * @author Shawn Crigger
 *
 * All rights reserved.
 */
// base class everything extends
require('./base.php');



// replace with ur session id
// they dont even check this honestly :P Slack!
$session = 'c5ef8acdffdd9ea2348585e96e533a8c';

class Wangsta extends Wangsta_Base {

	protected $_gangs  = array();
	public    $_troops = '';

	/**
	 * Go forth and cheat!
	 * @param string $session  Session ID
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
	public function set_user( $hood = 'gw', $user = array() )
	{

		$this->_city    = $this->_get_city( $hood );
		$this->_user_id = 4798701; // replace with yours
		$this->_wangsta = 'bd16db768b938ada3fd4c6d1ba5d51d6771679d5'; // same
		return $this;
	}

	// ------------------------------------------------------------------------

	/**
	 * Sets the City IDs sorry I manually set mine, takes a two letter acroymn for the city and returns the id.
	 * @access private
	 * @param string $hood two letter acronym or array key
	 * @return  integer
	 */
	private function _get_city( $hood = '' )
	{
		$hoods['ac']  = 101964162;
		$hoods['gw']  = 101972720;
		$hoods['pa']  = 101996000;
		$hoods['fn']  = 101855309;
		/* These are my hoods, replace with you hood locations.
		 */
		if ( ! array_key_exists( $hood, $hoods ) ) die('No hood named ' . $hood . '<br> Pity the fool without a hood!');
		return $hoods[$hood];
	}

	/**
	 * Fetchs Gangs and CityScapes near the cords provided
	 * @param array $cords  Array of ['x'] and ['y'] cords.
	 * @param array $level  Level of Gang your hunting for.
	 * @return not sure yet lol builds a array of available gangs to hit, not sure if should return them or maybe save them to a file or what.
	 */
	public function get_map( $cords = array(), $level = 9 )
	{
		$url  = "http://realm93.c2.godfather.wonderhill.com/api/map.json?";

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
		$this->_result = curl_exec   ( $this->_connection );
		$this->_info   = curl_getinfo( $this->_connection );

		if ( is_string( $this->_result ) )
		{
			$this->_result = json_decode( $this->_result );
		}
		$terrain = $this->_result->terrain;
		$useful = array( 'Gang', 'CityScape' );
		$gangs  = array();
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
			$units = '{"Smuggler":50,"Doctor":50,"DeliveryTruck":50}';
		}
		$this->_troops = $units;
		return $this;
	}

	/**
	 * Handles attacks
	 * @param   int $x
	 * @param   int $y
	 * @return  void
	 */
	function attack($x, $y)
	{
		if ( ! is_numeric($x) OR ! is_numeric($y) ) return;
		if ( 0 == $this->_aos_left ) return;

		$url = "http://realm93.c2.godfather.wonderhill.com/api/cities/{$this->_city}/marches.json";

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

		$this->_do_beer_curls( $url, $data );
	}

	/**
	 * Handles my 22oz curls, ok it sends the data via post atm.
	 * @param string $url
	 * @param mixed  $data
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
		$this->_result = curl_exec   ( $this->_connection );
		$this->_info   = curl_getinfo( $this->_connection );

		// Request failed
		if ( false === $this->_result )
		{
			$this->_error_code = curl_errno( $this->_connection );
			$this->_error_msg  = curl_error( $this->_connection );
			echo cli_message( " SAY WHAT ONE MORE TIME I DARE YA!\n\n Error Code = {$this->_error_code}\n Error MSG = {$this->_error_msg}\n");
		} else {
			$this->_parse_result();
			echo cli_message( "ATTACK RESULTS \n\t\tAO's Left = {$this->_aos_left}\n");
		}
		curl_close ( $this->_connection );
		$this->debug();
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
			\t\t\t Result        = {$this->_result} \n
			\t\t\t Result Info   = {$this->_info} \n
			\t\t\t Error Code    = {$this->_error_code} \n
			\t\t\t Error Message = {$this->_error_msg} \n

			" );
		return $this;
	}

}

$gangsta = new Wangsta ( $session );

// Closest to my place, but it can decode the map for gangs.
$mi = array(
	'x' => 278,
	'y' => 474,
);

// This is what I was sending.
$units = array(
	"Smuggler"   => 280,
	'Undertaker' => 286,
	"Doctor"     => 240,
	"Loanshark"  => 228,
	"DRC"        => 160,
	"Hitman"      => 38,
//	"TommyGunner" => 35,
//	"Bruiser"    => 38,
	"DeliveryTruck" => 100,
);


$gangsta->set_troops( $units );

/*

	"Smuggler"   => 2283,
	"Doctor"     => 1932,
	'Undertaker' => 2300,
	"Loanshark"  => 1828,
	"DRC"        => 1354,

	"Bruiser"    => 2000,
	"DeliveryTruck" => 300,
	"Thug"       => 650,
	"Thug"       => 1,
	"TommyGunner" => 1,
//	"Bruiser"    => 55,
	"DeliveryTruck" => 50,

*/


// attack MI 1 over and over.

for ($i=0; $i < 8; $i++) {
	$gangsta->attack($mi['x'], $mi['y']);
	$r = rand( 0, 3 );
	deep_sleep( $r );
}
die;
deep_sleep( 120 );

for ($i=0; $i < 4; $i++) {
	$gangsta->attack($mi['x'], $mi['y']);
	$r = rand( 0, 52 );
	deep_sleep( $r );
}


die;


//$gangs = $gangsta->get_map( array('x' => 384, 'y' => 450) );
//279 , 474
$gangs = $gangsta->get_map( array('x' => 439, 'y' => 596) );


$gang_hit = $wave = 0;
$max_waves   = 10;
$sleep_time  = 90;
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
	// Break the loop if you hit more gangs then are in the array, altho thats impossible with this loop, but this wont always be the loop.
//	if ( $gang_hit >= $total_gangs ) break;
	if ( $wave % $max_waves === 0 ) deep_sleep( $sleep_time );
}


time_end();
echo cli_message( "Total gangs in array = {$total_gangs}\nTotal gangs hit = {$gang_hit}" );

// display result
//print json_decode( $result );
