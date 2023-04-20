<?php
session_start();
$data = $_POST;
$logout_reg = $data['logout_reg'];

if(!empty($logout_reg)){
    session_destroy();
    echo 'logout_reg';
}
?>