<?php

include 'TC_API.php';
include 'db.php';



$VALUES_tc_jogos='';
$VALUES_tc_ligas='';
$VALUES_tc_equipes='';

foreach( TC_API::TodayListInplay()->data as $j ){
	 $VALUES_tc_jogos.='(' .join(',', [$j->id, $j->h_id, $j->a_id, $j->l_id, "'".$j->start."'"] ) . '),';
	 $VALUES_tc_ligas.='(' .join(',', [$j->l_id, "'".$j->l."'"] ) . '),';
	 $VALUES_tc_equipes.='(' .join(',', [$j->h_id, "'".$j->h."'"] ) . '),'  . '(' .join(',', [$j->a_id, "'".$j->a."'"] ) . '),';
	 
};

$VALUES_tc_jogos =   rtrim($VALUES_tc_jogos,',');
$VALUES_tc_ligas =   rtrim($VALUES_tc_ligas,',');
$VALUES_tc_equipes = rtrim($VALUES_tc_equipes,',');

if ($VALUES_tc_jogos != ''){
	$res=$db->query("INSERT IGNORE INTO tc_jogos (id, h_id, a_id,  l_id, start) VALUES $VALUES_tc_jogos"); erro($res,__LINE__);
	$res=$db->query("INSERT IGNORE INTO tc_ligas (id, nome) VALUES $VALUES_tc_ligas"); erro($res,__LINE__);		
	$res=$db->query("INSERT IGNORE INTO tc_equipes (id, nome) VALUES $VALUES_tc_equipes"); erro($res,__LINE__);	
}

