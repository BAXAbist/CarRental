<?php
include_once 'db_php/db2.php';
$db = new DB_requests();
$data = $_POST;


    $errors = array();
    if( trim($data['login']) == ''){
        $errors[] = 'Введите логин!';
    }
    if( $data['password'] == ''){
        $errors[] = 'Введите пароль!';
    }
    if( $data['password'] != $data['password2']){
        $errors[] = 'Подтвердите пароль!';
    }
    if( $data['first_name'] == ''){
        $errors[] = 'Введите имя!';
    }
    if( $data['second_name'] == ''){
        $errors[] = 'Введите фамилию!';
    }
    if( $data['middle_name'] == ''){
        $errors[] = 'Введите отчество!';
    }
    if( $data['address'] == ''){
        $errors[] = 'Введите адрес!';
    }
    if( $data['phone'] == ''){
        $errors[] = 'Введите телефон!';
    }
    if( empty($errors))
    {
        $result = $db->addClient($data['login'],$data['password'],
        $data['first_name'],$data['second_name'],$data['middle_name'],
        $data['address'],$data['phone']);
        if ($result == 'ok'){
            $db = new DB_requests();
            $client = $db->authClient($_POST['login'],$_POST['password']);
            session_start();
            $_SESSION['client_info'] = $client;
            $_SESSION['logo'] = 'yes';
            echo 'ok';
        }
        else {
            $errors[] = 'Такой логин уже занят!';
            echo 'Wrong login';
        }
          
        
    } else
    {
        echo $errors[0];
    }


?>

  
  
  
 