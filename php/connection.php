<?php 

    $user = 'root';
    $passwd1 = 'qqq123';

    try{
        $conn = new PDO("mysql:host=localhost;dbname=serwis;charset=utf8mb4",$user,$passwd1);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if($conn){
           // echo "success";
        }
    }catch(PDOException $e){
        echo "Połączenie sie nie powiodło ".$e->getMessage();
    }
?>