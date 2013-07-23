<?php

class MainController extends Controller {

    const row = 12;
    const column = 12;

    public function index() {

        $g = GroundTypes::grass;
        $l = GroundTypes::lava;
        $w = GroundTypes::water;
        $m = GroundTypes::mountain;
        $s = GroundTypes::sand;

        /*
         * Get item using x and y where x start right
         * and y starts at the top:
         * 
         * (y * self::column) + x
         */

        //                       x 0   1   2   3   4   5   6   7   8   9  10  11  //  y
        $viewModel['map'] = array($l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, //   0
                                  $l, $g, $g, $g, $m, $m, $m, $m, $g, $g, $g, $l, //   1
                                  $l, $g, $g, $g, $m, $m, $m, $m, $g, $g, $g, $l, //   2
                                  $l, $g, $g, $g, $m, $m, $l, $l, $s, $s, $g, $l, //   3
                                  $l, $w, $s, $m, $m, $m, $m, $l, $s, $s, $g, $l, //   4
                                  $l, $w, $s, $m, $m, $m, $m, $s, $s, $s, $g, $l, //   5
                                  $l, $w, $s, $m, $m, $m, $s, $s, $s, $s, $g, $l, //   6
                                  $l, $w, $s, $s, $w, $w, $w, $w, $s, $s, $g, $l, //   7
                                  $l, $w, $w, $s, $w, $w, $w, $w, $s, $g, $g, $l, //   8
                                  $l, $w, $w, $s, $s, $s, $s, $s, $s, $g, $g, $l, //   9
                                  $l, $w, $w, $g, $g, $g, $g, $g, $g, $g, $g, $l, //  10
                                  $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l, $l); // 11

        $viewModel['size'] = self::row + self::column;
        $viewModel['row'] = self::row;
        $viewModel['column'] = self::column;

        $colummn = self::column;
        $viewModel['getObjectId'] = function($x, $y) use ($colummn) {
                    return ($y * $colummn) + $x;
                };

        $viewModel['getObject'] = function($x, $y) use (&$viewModel) {
                    return $viewModel['map'][($viewModel['getObjectId']($x, $y))];
                };

        $viewModel['isSand'] = function ($object) {
                    if ($object == GroundTypes::sand) {
                        return 'checked="checked"';
                    }
                };

        $viewModel['isGrass'] = function ($object) {
                    if ($object == GroundTypes::grass) {
                        return 'checked="checked"';
                    }
                };
                
        $viewModel['isWater'] = function ($object) {
                    if ($object == GroundTypes::water) {
                        return 'checked="checked"';
                    }
                };
        $viewModel['isMountain'] = function ($object) {
                    if ($object == GroundTypes::mountain) {
                        return 'checked="checked"';
                    }
                };
        $viewModel['isLava'] = function ($object) {
                    if ($object == GroundTypes::lava) {
                        return 'checked="checked"';
                    }
                };

        return array('view' => 'select', 'model' => $viewModel);
    }

    public function draw(HttpRequest $httpRequest, HttpResponse $httpResponse) {
        
        $viewModel = $httpRequest->getPostElements();
        if(!$viewModel || empty($viewModel)){
            $httpResponse->setRedirect('.');
        }

        $viewModel['size'] = self::row + self::column;
        $viewModel['row'] = self::row;
        $viewModel['column'] = self::column;

        return array('view' => 'draw', 'model' => $viewModel);
    }

}