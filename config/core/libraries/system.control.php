    <?php 
    class SystemControl {
        public function setPageError(){
            return require_once('../error/error.page.php');
        }
        public function returnError($Campo){
            return 'Campo Vacio: '.$Campo.'';
        }
        
    }