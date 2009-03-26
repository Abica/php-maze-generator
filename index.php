<?php
if (!isset($submit)) {
    header("Content-Type: text/html");
    echo "<form action=\"index.php\" method=\"post\">";
    echo "<center>Create a randomly generated maze with your specified dimensions.<hr width=\"50%\" /></center>";
    echo "<table align=\"center\" width=\"25%\">";
    echo "<tr><td>Width</td><td><input type=\"text\" size=\"3\" maxlength=\"3\" name=\"maze_width\" />(10 min, 60 max)</td></tr>";
    echo "<tr><td>Height</td><td><input type=\"text\" size=\"3\" maxlength=\"3\" name=\"maze_height\" />(10 min, 200 max)</td></tr>";
    echo "<tr><td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"submit\" value=\"Create Maze!\" /></td></tr>";
    echo "</table></form>";
} elseif (isset($submit)) {
    header("Content-Type: text/plain");
    $maze_width = $_POST['maze_width'];
    $maze_height = $_POST['maze_height'];
    if ((!is_numeric($maze_width)) || (!is_numeric($maze_height))) {
        echo "Dimensions must be numerical.";
        exit;
    }
    if ($maze_width < 10) {
        echo "Width dimensions must be at least 10 cells.";
        exit;
    } elseif ($maze_width > 60) {
        echo "Width dimensions can be no more than 60 cells.";
        exit;
    }
    if ($maze_height < 10) {
        echo "Height dimensions must be at least 10 cells.";
        exit;
    } elseif ($maze_height > 200) {
        echo "Height dimensions can be no more than 200 cells.";
        exit;
    }

    $left = array();
    $right = array();

    $left[0] = $maze_height;
    $height = $maze_height;
    echo "Start\n";
    for ($temp_pointer = $maze_width, $i = 0; $temp_pointer--; $left[$temp_pointer] = $right[$temp_pointer] = $temp_pointer, $i++) {
        echo ($i != 0) ? "._" : ". ";
    }

    echo ".\n|";
    for (; $height > 0; $height--) {
        for ($cell = $maze_width; $cell--;  printf($maze[0].$maze[1])) {
            if (($cell != ($temp_pointer = $left[$cell-1])) && (6 << 26 < rand())) {
                $right[$temp_pointer] = $right[$cell];
                $left[$right[$cell]] = $temp_pointer;	
                $right[$cell] = $cell-1;
                $left[$cell-1] = $cell;
                $maze[1] = ".";
            } else {
                $maze[1] = "|";
            }
            if (($cell != ($temp_pointer = $left[$cell])) && (6 << 26 < rand())) { 
                $right[$temp_pointer] = $right[$cell];
                $left[$right[$cell]] = $temp_pointer;
                $left[$cell] = $cell;		
                $right[$cell] = $cell;
                $maze[0] = "_";	
            } else {
                $maze[0] = " ";
            }
        }
        echo "\n|";// right wall
    }
 
    $maze[0] = "_";
    for ($cell = $maze_width; $cell--; printf($maze[0].$maze[1])) {
        if (($cell != ($temp_pointer = $left[$cell-1])) && (($cell == $right[$cell]) || (6 << 26 < rand()))) {
            $left[$right[$temp_pointer] = $right[$cell]] = $temp_pointer;
            $left[$right[$cell] = $cell-1] = $cell;
            $maze[1] = ".";
        } else {
            //$maze[1] = "|";
            $maze[0] = ($cell == 0) ? " " : "_";
            $maze[1] = ($cell == 0) ? "|" : ".";
        }
        $temp_pointer = $left[cell];
        $right[$temp_pointer] = $right[$cell];
        $left[$right[$cell]] = $temp_pointer;
        $left[$cell] = $cell;
        $right[$cell] = $cell;
    }
    echo "\n";
    for ($cell = $maze_width; $cell--;){
        echo ($cell == 0) ? "End" : "  ";
    }
}
?>
