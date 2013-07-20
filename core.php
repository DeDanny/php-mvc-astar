<?php


function myAutoLoader($className) {
    include_once './controller/' . $className . '.php';
    //include_once './model/' . $className . 'Model.php';
}
spl_autoload_register('myAutoLoader');

class BootStrapper {

    public function parseGetArray($getString) {
        
    
        
    }
    public function __call($method, $args) {
        echo '<!-- this method ' . $method . ' does not exist -->'. "\n";
    }
    
    public function createClass() {
        return new MainController();
    }

    public function callFunction() {
        return 'index';
    }

}

?>
