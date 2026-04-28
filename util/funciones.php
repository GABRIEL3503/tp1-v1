<?php 
function data_submitted() {
    $data = array();

    if (!empty($_POST)) {
        $data = $_POST;
    } elseif (!empty($_GET)) {
        $data = $_GET;
    }
    
    return $data;
}
?>
