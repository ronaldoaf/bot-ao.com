<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'Requests.php';

class TC_API{
	static $token='b24fbaf7959b3b07';	
	static $base_URL="https://api.totalcorner.com/v1/";
	
	static function Req(){
	    return (new SimpleHTTPClient());
	}
	
	static public function TodayListInplay(){
	    return static::Req()->makeRequest( (static::$base_URL) . 'match/today'. '?' .'token=' . (static::$token) . '&type=inplay&columns=odds,asian,cornerLine,cornerLineHalf,goalLine,goalLineHalf,asianCorner,attacks,dangerousAttacks,shotOn,shotOff,possession','GET')->json();
	}


	static public function TodayListUpcoming(){
	    return static::Req()->makeRequest( (static::$base_URL) . 'match/today'. '?' .'token=' . (static::$token) . '&type=','GET')->json();
	}
	
	static public function TodayListEnded(){
	    return static::Req()->makeRequest( (static::$base_URL) . 'match/today'. '?' .'token=' . (static::$token) . '&type=ended','GET')->json();
	}

}






