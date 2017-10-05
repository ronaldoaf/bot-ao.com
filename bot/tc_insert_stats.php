<?php

include 'TC_API.php';
include 'db.php';



$VALUES_tc_stats='';


foreach( TC_API::TodayListInplay()->data as $j ){
	 $VALUES_tc_stats.='(' .join(',', [$j->id, $j->h_id, $j->a_id, $j->l_id, "'".$j->start."'"] ) . '),';
};

$VALUES_tc_stats =   rtrim($VALUES_tc_stats,',');


if ($VALUES_tc_stats != ''){
	//$res=$db->query("INSERT IGNORE INTO tc_jogos (id, h_id, a_id,  l_id, start) VALUES $VALUES_tc_jogos"); erro($res,__LINE__);
}


print_r($j);