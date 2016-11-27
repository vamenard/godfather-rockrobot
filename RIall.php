<?php

require('./config.php');
require('./base.php');

class Wangsta extends Wangsta_Base {

    protected $_gangs = array();
    public $_troops = '';
    public $mi = array();
    public $hoods = array();
    public $realm;

    /**
     * Go forth and cheat!
     * @param string $session Session ID
     */
    public function __construct( $realm_id, $realm, $riCoords, $uid, $wgangsta, $hoods )
    {
        $session = 'f4dac66bd853443ff43b164bfa046d6b';
        parent::__construct( $session, $realm_id );
        $this->hoods = $hoods;
        $this->realm = $realm;

				//sleep(rand(10, 20));
        $this->set_user( $_GET['hood'], $uid, $wgangsta);
        $this->mi = $riCoords;
    }

    public function set_user( $hood = 1, $uid, $wgangsta )
    {
        $this->_city = $this->_get_city( $_GET['hood'] );
        $this->_user_id = $uid; // replace with yours
        $this->_wangsta = $wgangsta; // same

    }


    /**
     * Sets the City IDs sorry I manually set mine, takes a two letter acroymn for the city and returns the id.
     * @access private
     * @param string $hood two letter acronym or array key
     * @return integer
    */
    private function _get_city( $hood = 1 )
    {
        $hoods = $this->hoods;
        if ( ! array_key_exists( $hood, $hoods ) )
            die('No hood named ' . $hood . '<br> Pity the fool without a hood!');
        return $this->hoods[$hood];
    }

    /**
     * Fetchs Gangs and CityScapes near the cords provided
     * @param array $cords Array of ['x'] and ['y'] cords.
     * @param array $level Level of Gang your hunting for.
     * @return not sure yet lol builds a array of available gangs to hit, not sure if should return them or maybe save them to a file or what.
     */
    public function get_map( $cords = array(), $level = 10 )
    {
        return $this->_gangs;
    }


    public function set_troops( $units = null )
    {
        if ( is_array( $units ) )
        {
            $units = json_encode( $units );
        } else if ( ! $units ) {
						$units = '{"FreightTrain":1}';
				}
        $this->_troops = $units;
        return $this;
    }

    /**
     * Handles attacks
     * @return void
     */
    function attack()
    {
        $mi = $this->mi;
        $x = $mi[1]['x'];
        $y = $mi[1]['y'];
        if ( ! is_numeric($x) OR ! is_numeric($y) ) return;
        //if ( 0 == $this->_aos_left ) return;

        $url = $this->realm . "/api/cities/{$this->_city}/marches.json";

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

$gangsta = new Wangsta ( $realm_id, $realm, $riCoords, $uid, $wgangsta, $hoods );
// ma troops sent

$file = file_get_contents('cache-hood'.$_GET['hood'].'.txt');
echo $file."--";

$file = str_replace('"null":1,', '', $file);
$file = str_replace(',"null":1', '', $file);
$file = str_replace('"null":1', '', $file);

$units = $file;

if ($units == '{}')
	die('No troop to RI');

$gangsta->set_troops( $units );

$seed1 = $seed2 = 1;

if (rand(1, 999) % 2 == 0) $seed1 = -1;
if (rand(1, 999) % 2 == 0) $seed2 = -1;

if ($_GET['hood'] < 1)
	die("Wrong hood number");

$max_waves = 4;
$sleep_time = 90;

$gangsta->attack();

time_end();
echo cli_message( "Done" );

// display result
print json_decode( $result );
