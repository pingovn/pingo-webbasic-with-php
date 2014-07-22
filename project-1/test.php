<?php
for ($index = 0; $index <= 10; ++$index) {
    if ($index == 2) {
        continue;
    }
    echo "Current index is $index <br />";
}
?>