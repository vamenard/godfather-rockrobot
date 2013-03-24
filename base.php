<?php
/**
 * Base class and Helpers for Cheating in Godfather Five Familys
 * @author  Shawn Crigger
 *
 * All rights reserved, any use for profit will get u run over by the Karma bus!
 */
// require my helpers
require('./misc_helpers.php');

class Wangsta_Base {

	protected $_realm = 93;

	/**
	 * @access protected
	 * @var integer current city id
	 */
	protected $_city;

	/**
	 * @access protected
	 * @var integer current user id
	 */
	protected $_user_id;

	/**
	 * @access protected
	 * @var string current gangster id ( no clue wdf they need this for )
	 */
	protected $_wangsta;

	/**
	 * @access protected
	 * @var string current session id
	 */
	protected $_session;

	/**
	 * @access protected
	 * @var string user agent ur pretending to be
	 */
	protected $_user_agent;

	/**
	 * @access protected
	 * @var object curl connection handle
	 */
	protected $_connection;

	/**
	 * @access protected
	 * @var mixed curl results
	 */
	protected $_result;

	/**
	 * @access protected
	 * @var string curl result info
	 */
	protected $_info;

	/**
	 * @access protected
	 * @var string curl error code
	 */
	protected $_error_code;

	/**
	 * @access protected
	 * @var string curl error message
	 */
	protected $_error_msg;

	/**
	 * @access protected
	 * @var boolean
	 */
	protected $_debug_mode = false;

	/**
	 * @access protected
	 * @var integer number of attack orders left
	 * @todo  manage this per city.
	 */
	protected $_aos_left = 30;

	// ------------------------------------------------------------------------

	/**
	 * Go forth and cheat!
	 * @param string $session  Session ID
	 */
	public function __construct( $session = '' )
	{
		$this->_session = $session;
		$this->user_agent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11";
		if ( ! function_exists( 'curl_init' ) ) die('CURL Extension not compiled with PHP. Research more.');
	}

	// ------------------------------------------------------------------------

	/**
	 * Builds URL string to send commands to
	 * @param string  $task  defaults to marching
	 * @param integer $city  city id your doing task in.
	 */
	protected function _build_url( $task = 'marches.json', $city = null )
	{
		if ( ! is_numeric( $city ) ) die('city id is not correct.');
		return "http://realm{$this->_realm}.c2.godfather.wonderhill.com/api/cities/{$city}/{$task}";
	}

	// ------------------------------------------------------------------------

	/**
	 * Handles my 22oz curls, ok it sends the data via post atm.
	 * @param string $url
	 * @param mixed  $post
	 * @return void
	 */
	protected function _do_post( $url = '', $post = '' )
	{
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
	}

}