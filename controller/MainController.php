<?php
class MainController {
    
    private static $row = 12;
    private static $column = 12;
    
    public function index() {
        $viewModel['row'] = self::$row;
        $viewModel['column'] = self::$column;
        
        return array('view' => 'select', 'model' => $viewModel);
    }
    
    public function draw($post = array()) {
        
        
        
        return array('view' => 'draw', 'model' => $post);
    }
}