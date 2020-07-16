<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 13.12.2016
 * Time: 11:56
 */

if(count($_POST) > 1){
    $arr = [];
    if($_POST['v_login'] == 'admin'){
        $arr[] = ['status' => 1, 'item' => 'v_login'];
    }
    else {
        $arr[] = ['status' => 0, 'item' => 'v_login', 'error_msg' => 'Неверный логин'];
    }
    if($_POST['v_name'] == 'кирилл'){
        $arr[] = ['status' => 1, 'item' => 'v_name'];
    }
    else {
        $arr[] = ['status' => 0, 'item' => 'v_name', 'error_msg' => 'Неверное имя'];
    }
    if($_POST['v_phone'] == '123'){
        $arr[] = ['status' => 1, 'item' => 'v_phone'];
    }
    else {
        $arr[] = ['status' => 0, 'item' => 'v_phone', 'error_msg' => 'Неверный телефон'];
    }
    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
}
else {
    if(isset($_POST['v_login'])){
        if($_POST['v_login'] == 'admin'){
            echo json_encode(['status'=>1]);
        }
        else{
            echo json_encode(['status'=>0,'error_msg'=>'Неверный логин 444'], JSON_UNESCAPED_UNICODE);
        }
    }
    if(isset($_POST['v_name'])){
        if($_POST['v_name'] == 'кирилл'){
            echo json_encode(['status'=>1]);
        }
        else{
            echo json_encode(['status'=>0,'error_msg'=>'Неверный логин 111'], JSON_UNESCAPED_UNICODE);
        }
    }
}

//var_dump($_POST);