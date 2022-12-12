<?php
require_once('../model/model.counter.main.php');
$modelCounter = new ModelCounter;
if(isset($_REQUEST['get-count'])){
    switch($_REQUEST['get-count']){
        case 'pre-register': 
            $c = $modelCounter->getPreregistries();
            echo $c;
        break;
    }
}