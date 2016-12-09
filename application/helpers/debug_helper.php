<?php
/*
 * Print any information
 */
function debug($something)
{
    echo '<pre>';
    var_dump($something);
    echo '</pre>';
}