<?php 
require_once('../model/model.notices.page.php');
require_once('../libraries/system.control.php');
$modelNotices = new modelNoticesClass;
$systemControl = new systemControl;
if(isset($_REQUEST['rq-notices'])){
    switch($_REQUEST['rq-notices']){
        case 'getNotices':
                sleep(0.5);
                $rq = $modelNotices->getNotices();
                echo $rq;
            break;
        case 'post-new-notice':
                sleep(1);
                if(isset($_POST['i-title']) && isset($_POST['i-importancia'])&&isset($_POST['i-body']) && isset($_POST['i-author'])&&isset($_POST['i-fecha'])){
                    
                }else{
                    echo $systemControl->setPageError();
                }
            break;
    }
    
}