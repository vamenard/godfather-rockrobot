<?php
/**
* Random collection of helpers I use for debugging, and query string masterbation.
*/

if (!function_exists('http_build_query_for_curl'))
{

        /**
         * Builds query string from array
         * @param mixed Array of Query params
         * @param array Name of Output Array
         * @param string Prefix
         * @return void
         */
        function http_build_query_for_curl( $arrays, &$new = array(), $prefix = null ) {

         if ( is_object( $arrays ) ) {
         $arrays = get_object_vars( $arrays );
         }

         foreach ( $arrays AS $key => $value ) {
         $k = isset( $prefix ) ? $prefix . '[' . $key . ']' : $key;
         if ( is_array( $value ) OR is_object( $value ) ) {
         http_build_query_for_curl( $value, $new, $k );
         } else {
         $new[$k] = $value;
         }
         }
        }
}

// ------------------------------------------------------------------------

if (!function_exists('array_implode'))
{
        /**
         * Implode an array with the key and value pair giving a glue,
         * a separator between pairs and the array to implode.
         *
         * Encode Query Strings
         * @example $query = urlencode( array_implode( '=', '&', $array ) );
         *
         * @param string $glue The glue between key and value.
         * @param string $separator Separator between pairs.
         * @param array $array The array to implode.
         *
         * @return string A string with the combined elements.
         */
        function array_implode($glue, $separator, $array)
        {
                if ( ! is_array( $array ) )
                {
                        return $array;
                }

                $string = array();

                foreach ( $array as $key => $val )
                {
                        if ( is_array( $val ) )
                        {
                                $val = implode( ',', $val );
                        }

                        $string[] = "{$key}{$glue}{$val}";
                }

                return implode( $separator, $string );

        }//end array_implode()
}

// ------------------------------------------------------------------------

if ( ! function_exists('dump'))
{
        /**
        * Outputs the given variables with formatting and location. Huge props
        * out to Phil Sturgeon for this one (http://philsturgeon.co.uk/blog/2010/09/power-dump-php-applications).
        * To use, pass in any number of variables as arguments.
        *
        * @return void
        */

        function dump()
        {
                list($callee) = debug_backtrace();
                $arguments = func_get_args();
                $total_arguments = count($arguments);

                echo '<fieldset style="background: #fefefe !important; border:2px red solid; padding:5px">';
                echo '<legend style="background:lightgrey; padding:5px;">'.$callee['file'].' @ line: '.$callee['line'].'</legend><pre>';

                $i = 0;
                foreach ($arguments as $argument)
                {
                        echo '<br/><strong>Debug #'.(++$i).' of '.$total_arguments.'</strong>: ';
                        if ( (is_array($argument) || is_object($argument)) && count($argument))
                        {
                                print_r($argument);
                        } else {
                                var_dump($argument);
                        }
                }

                echo '</pre>' . PHP_EOL;
                echo '</fieldset>' . PHP_EOL;
        }
}


function cli_message( $msg = '' )
{
        echo "\n\n// ------------------------------------------------------------------------\n";
        echo "// ! {$msg}\n";
        echo "// ------------------------------------------------------------------------\n\n";
}

function credits()
{

        echo <<<ENDOFEGO

// ---------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------


ENDOFEGO;


}


function write_file($path, $data, $mode = 'wb' )
{
        if ( ! $fp = @fopen($path, $mode))
        {
                die('cannot open');
                return FALSE;
        }

        flock($fp, LOCK_EX);
        fwrite($fp, $data);
        flock($fp, LOCK_UN);
        fclose($fp);

        return TRUE;
}


/**
* Quick sleep timer that resumes if signal to stop has been passed. Kinda like sleeping on pot.
*/
function deep_sleep($seconds)
{

        echo cli_message( "SLEEPING FOR {$seconds} before next waves" );
    $start = microtime( true );
    for ($i = 1; $i <= $seconds; $i ++) {
        @time_sleep_until($start + $i);
    }
}

function time_start()
{
        $mtime = microtime();
        $mtime = explode(" ",$mtime);
        $mtime = $mtime[1] + $mtime[0];
        return $mtime;
}

function time_end( $start_time = null )
{
        $mtime = microtime();
        $mtime = explode(" ",$mtime);
        $mtime = $mtime[1] + $mtime[0];
        $endtime = $mtime;
        $totaltime = ( $endtime - $start_time );
        echo cli_message( "This script has run for {$totaltime} seconds.\nAll Hail your overlord and master teh great 1337 Dankness(or I'll show u my pimphand biatch!)" );
}