<?php
session_start();
if(isset($_REQUEST['session_management'])){
    if($_REQUEST['session_management'] == 'logout'){
        sleep(1);
        session_destroy();
        echo "ok";
    }
}