<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helper\Graph;
class TestController extends Controller
{
    public function test(){
        $graph = array(
            'A' => array('B', 'F'),
            'B' => array('A', 'D', 'E'),
            'C' => array('F'),
            'D' => array('B', 'E'),
            'E' => array('B', 'D', 'F'),
            'F' => array('A', 'E', 'C'),
          );
        $result = new Graph($graph);

        // least number of hops between D and C
        $result->breadthFirstSearch('D', 'C');
        // outputs:
        // D to C in 3 hops
        // D->E->F->C
        echo "<br/>";
        // least number of hops between B and F
        $result->breadthFirstSearch('B', 'F');
        // outputs:
        // B to F in 2 hops
        // B->A->F
        echo "<br/>";

        // least number of hops between A and C
        $result->breadthFirstSearch('A', 'C');
        // outputs:
        // A to C in 2 hops
        // A->F->C
        echo "<br/>";

        // least number of hops between A and G
        $result->breadthFirstSearch('A', 'G');
        // outputs:
        // No route from A to G
        echo "<br/>";

        // least number of hops between A and G
        $result->breadthFirstSearch('A', 'F');
        // outputs:
        // No route from A to G
        echo "<br/>";
    }
}
