<?php
require_once 'pdo.php';

@$email=$_GET['email'];

if(!$email){
    die('Email Parameter is missing');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hsuyee</title>
</head>
<body>
    <h1>Tracking Autos for <?= $email ?></h1>
    <form method='POST'>
        <label>Make: </label>
        <input type='text' name='make'><br>

        <label>Year: </label>
        <input type="text" name='year'><br>

        <label>Mileage: </label>
        <input type="text" name='mileage'><br>

        <input type="submit" name='add' value='Add'>
        <input type="submit" name='logout' value='Logout'>
    </form>

    <?php 
        @$make=$_POST['make'];
        @$year=$_POST['year'];
        @$mileage=$_POST['mileage'];

        if(isset($_POST['logout'])){
            header('Location: index.php');
        }
        if(isset($_POST['add'])){
            if(!is_numeric($mileage) || !is_numeric($year)){
                echo 'Mileage and year must be numeric'; 
                
            }else if (strlen($make) <1){
                echo 'Make is required';
            }
            $stmt=$pdo->prepare('INSERT INTO autos (make,year,mileage) VALUES (:mk,:yr,:mi)');
            $stmt->execute([
                ':mk'=>$make,
                ':yr'=>$year,
                ':mi'=>$mileage
            ]);
            ?>
            
            <h1>AutoMoiles:</h1>
            
            <?php 
                echo $year." ".$make." ".$mileage;
            
        }

            
    ?>
</body>
</html>