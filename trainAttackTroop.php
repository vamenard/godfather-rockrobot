<?php

require('./config.php');
require('./base.php');

class trainAttackTroop extends Wangsta_Base {

        var $hoods = array();
        var $realm = '';
        /**
         * @param string $session Session ID
         */
        public function __construct( $realm_id, $realm, $uid, $wgangsta, $hoods )
        {
                $session = '85612efce0196cf5ee95987abbd88d46';

                parent::__construct( $session, $realm_id );
                $this->hoods = $hoods;
                $this->realm = $realm;
				        $this->set_user( $hoods, $uid, $wgangsta );
				        sleep(3);
				        $this->_do_attacktroop();
        }

        public function set_user( $hood = 1, $uid, $wgangsta )
        {
            $this->_city = $this->_get_city( $_GET['hood'] );
            $this->_user_id = $uid; // replace with yours
            $this->_wangsta = $wgangsta; // same
        }

        /**
         * @access private
         * @param string $hood two letter acronym or array key
         * @return integer
         */
        private function _get_city( $hood = 1 )
        {

            if ( ! array_key_exists( $hood, $this->hoods ) )
                die('No hood named ' . $hood . '<br> Pity the fool without a hood!');
            return $this->hoods[$hood];
        }

		    function _do_attacktroop() {

    			  $qty = $_GET['qty'];
    			  if ($qty < 1 )
    				    $qty = 1;

    				$url = $this->realm . "/api/cities/".$this->_city."/units.json";
            $data = array(
                            'gangster' => $this->_wangsta,
                            '_method' => 'post',
                            '_session_id' => $this->_session,
                            'user_id' => $this->_user_id,
                            'city_id' => $this->_city,
    						            'units[quantity]' => $qty,
    						            'units[unit_type]' => $_GET['aTroopName'],
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

$s = new trainAttackTroop( $realm_id, $realm, $uid, $wgangsta, $hoods);
