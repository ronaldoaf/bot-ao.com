<?php
include '../bot/TC_API.php';

$TodayListInplay=TC_API::TodayListInplay();

if ( $TodayListInplay->success != 1){
    echo "======================================================================\n";
    echo "ERRO ao utilizar API Totalcorner\n\n";
    print_r($TodayListInplay);
    echo "======================================================================\n\n\n";
}
