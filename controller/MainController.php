<?php
class MainController extends Controller {
    
    const row = 12;
    const column = 12;
    
    public function index() {
        
        $l = GroundTypes::lava;
        $e = GroundTypes::earth;
        $w = GroundTypes::water;
        $m = GroundTypes::mountain;
        /*
         * Get item using x and y where x start right
         * and y starts at the top:
         * 
         * (y * self::column) + x
         */
        
        //                       x 0   1   2   3   4   5   6   7   8   9  10  11  //  y
        $viewModel['map'] = array($w, $m, $e, $l, $l, $l, $l, $l, $l, $l, $l, $l, //   0
                                  $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, //   1
                                  $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, //   2
                                  $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, //   3
                                  $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, //   4
                                  $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, //   5
                                  $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, //   6
                                  $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, //   7
                                  $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, //   8
                                  $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, //   9
                                  $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, //  10
                                  $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l );// 11
        
        $viewModel['size'] = self::row + self::column;
        $viewModel['row'] = self::row;
        $viewModel['column'] = self::column;
        
        $colummn = self::column;        
        $viewModel['getObjectId'] = function($x, $y) use ($colummn)
        {
            return ($y * $colummn) + $x;
        };   
        
        $viewModel['getObject'] = function($x, $y) use (&$viewModel)
        {
            return $viewModel['map'][($viewModel['getObjectId']($x, $y))];
        };
        
        $viewModel['isEarth'] = function ($object) {
            if($object == GroundTypes::earth){
                return 'checked="checked"';
            }
        };
        $viewModel['isWater'] = function ($object) {
            if($object == GroundTypes::water){
                return 'checked="checked"';
            }
        };
        $viewModel['isMountain'] = function ($object) {
            if($object == GroundTypes::mountain){
                return 'checked="checked"';
            }
        };
        $viewModel['isLava'] = function ($object) {
            if($object == GroundTypes::lava){
                return 'checked="checked"';
            }
        };
        
        return array('view' => 'select', 'model' => $viewModel);
    }
    
    public function draw() {
        
        return array('view' => 'draw', 'model' => $post);
    }
}