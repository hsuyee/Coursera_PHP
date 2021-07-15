<?php

try{
    $pdo=new PDO('mysql:host=localhost;port=3307;dbname=courseraDB','daisy','daisy@2021');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    error_log('Connection Failed: ').$e->getMessage();
}
