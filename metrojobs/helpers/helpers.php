<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/9/2019
 * Time: 5:29 PM
 */
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>