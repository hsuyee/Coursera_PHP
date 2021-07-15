
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hsuyee</title>
</head>
<body>
    <form method='POST'>
        <label>Email</label>
        <input type="text" name='email'>
        <br>
        <label>Password</label>
        <input type="password" name='password'>
        <input type="submit" name='submit'>
    </form>

    <?php
        @$email=$_POST['email'];
        @$pwd=$_POST['password'];
        
        $logemail='user@gmail.com';
        $logpwd='php123';

        $hash=password_hash($logpwd, PASSWORD_DEFAULT );
        // echo "userpwd: ".$pwd;
        // echo "<br>".password_hash($logpwd,PASSWORD_DEFAULT);
        // echo "<br>".password_hash($pwd,PASSWORD_DEFAULT);
        //echo "<br>logpwd: ".$hash."<br>";

        echo "Email Encoded; ".htmlentities($email);
        if (isset($_POST['submit'])){
            if ($_POST['email'] && $_POST['password']){
                if(password_verify($pwd,$hash)!=1){
                    error_log('Login Failed '.$email.' '.$hash);
                    echo 'Incorrect password';
                }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo 'Email must have an at-sign (@)';
                }else if($email== $logemail && $pwd==$logpwd){
                    error_log("login success ".$email);
                    header ('Location: autos.php?email='.urlencode($email));
                }else{
                    echo 'Login Failed of both';    
                }
            }else{
                echo 'Email and Password are required';
            }
        }



    ?>
</body>
</html>