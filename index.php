<?php
    require "config.php";
    require 'vendor/autoload.php';

    use iuctoConnect\BaseInitilalize;
    use iuctoConnect\IuctoConnectLib;

    $init = new BaseInitilalize();

    if ($environment == 'dev') {
        $init->error_initialization();
    }
    $list= "payment_type";
    //code
    $connector = new IuctoConnectLib("b1469856e2e628f8ca054e35690156ae", "1.2", $list);
    var_dump($connector->makeConnect());

