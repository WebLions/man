<?php
/*
 * Print any information
 */
function debug($something)
{
    echo '<pre>';
    print_r($something);
    echo '</pre>';
}