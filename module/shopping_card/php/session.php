<?php
    session_start();
    if(!isset($_SESSION['username']))header("location:../index.php");
    $users= include "../db/user.php";
    $check_flag=false;
    foreach ($users as $user_tmp){
        if($_SESSION['username']==$user_tmp['username'])$check_flag=true;
    }
    if($check_flag==false){
        session_destroy();
        header("location:../index.php");
    }
?>