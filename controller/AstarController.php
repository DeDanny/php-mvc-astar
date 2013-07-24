<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AstarController
 *
 * @author Danny
 */
class AstarController {

    private $food;
    private $map;

    public function calculateSteps(HttpRequest $httpRequest) {

        $post = $httpRequest->getPostElements();
        //$post = $httpRequest->getGetElements();

        $mapData = json_decode($post['map'], true);
        $user = new Node(0, $post['user']);
        $this->food = $post['food'];

        $this->map = new Map($mapData);

        $nodes = $this->step($user, array());


        //print_r(array('2:1', '2:2', '2:3', '2:4', '2:5', '2:6', '2:7', '3:7', '3:8', '3:9', '4:9', '5:9', '6:9', '7:9', '8:9', '8:8', '8:7', '8:6', '7:6', '6:6'));
        //return array('model' => array('2:1', '2:2', '2:3', '2:4', '2:5', '2:6', '2:7', '3:7', '3:8', '3:9', '4:9', '5:9', '6:9', '7:9', '8:9', '8:8', '8:7', '8:6', '7:6', '6:6'));
        return array('model' => $this->getPathFromNodes($nodes, array()));
    }

    private function getPathFromNodes($nodes, $array) {
        if ($nodes->getPreviousNode() != null) {
            $array = $this->getPathFromNodes($nodes->getPreviousNode(), $array);
        }
        $array[] = $nodes->getLocation();
        return $array;
    }

    private function step(Node $smallest, $frontier) {
        $sides = $this->map->getSides($smallest->getLocation());

        foreach ($sides as $key => $tile) {
            $node = new Node($tile, $key, $smallest);

            $mCost = $this->manhattanDistance($this->parseLocation($key), $this->food) + "\n";

            $node->setLineCost($mCost);
            $node->setCost($node->getTile()->getCost() + $smallest->getCost());

            $frontier[] = $node;
        }
        $newSmallest = $this->getSmallestFrom($frontier);

        $frontier = $this->removeNode($newSmallest, $frontier);
        if ($newSmallest->getLocation() !== $this->food) {
            return $this->step($newSmallest, $frontier);
        }
        return $newSmallest;
    }

    private function removeNode($object, $array) {
        if (($key = array_search($object, $array)) !== false) {
            unset($array[$key]);
        }
        return $array;
    }

    private function parseLocation($location) {

        return explode(':', $location);
    }

    private function getSmallestFrom($frontier) {
        $smallest = null;
        $length = count($frontier);
        foreach ($frontier as $node) {
            if ($smallest == null) {
                $smallest = $node;
            } else if ($smallest->getCost() + $smallest->getLineCost()  > $node->getCost() + $node->getLineCost()) {
                $smallest = $node;
            }
        }
        return $smallest;
    }

    private function manhattanDistance($start, $end) {
        return abs($start[0] - $end[0]) + abs($start[1] - $end[2]);
    }

}

?>
