<?php

// Define the grid dimensions
$rows = 10;
$columns = 10;

// Create an empty grid with clear paths (.) initially
$grid = array_fill(0, $rows, str_repeat(".", $columns));

// Set the player's starting position (X)
$playerRow = rand(0, $rows - 1);
$playerCol = rand(0, $columns - 1);
$grid[$playerRow][$playerCol] = "X";

// Place obstacles (#) on the grid
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        if (rand(1, 5) == 1 && $grid[$i][$j] == ".") {
            $grid[$i][$j] = "#";
        }
    }
}

// Set the item's location within clear paths (.)
$itemRow = rand(0, $rows - 1);
$itemCol = rand(0, $columns - 1);

// Make sure the item location is not on the player's starting position
while ($itemRow === $playerRow && $itemCol === $playerCol) {
    $itemRow = rand(0, $rows - 1);
    $itemCol = rand(0, $columns - 1);
}

$grid[$itemRow][$itemCol] = "$";

// Output the grid with the player's starting position and the item location
foreach ($grid as $row) {
    echo $row . PHP_EOL;
}

// Calculate the steps to navigate to the item while avoiding obstacles
$upSteps = $itemRow - $playerRow;
$rightSteps = $itemCol - $playerCol;
$downSteps = $rows - 1 - $itemRow;

// Output the player's starting position and item location
echo "Player's starting position: Row $playerRow, Column $playerCol" . PHP_EOL;
echo "Item location: Row $itemRow, Column $itemCol" . PHP_EOL;

// Output the navigation steps and check for obstacles
echo "Navigate in the specific order: Up $upSteps step(s), Right $rightSteps step(s), Down $downSteps step(s)." . PHP_EOL;

if ($upSteps < 0 || $rightSteps < 0 || $downSteps < 0) {
    echo "The path is blocked by obstacles (#). The item cannot be reached." . PHP_EOL;
} else {
    echo "The item is accessible!" . PHP_EOL;
}

?>
