<?php


namespace iuctoConnect;

use Whoops\Run;
use Whoops\Handler;

class BaseInitilalize
{

    public function error_initialization() {
        $whoops = new Run();
        $whoops->pushHandler(new Handler\PrettyPageHandler());
        $whoops->register();
    }

}