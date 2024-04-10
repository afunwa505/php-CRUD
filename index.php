<?php
session_start();
    include "connect.php";
    $Error_user = "";
    $Error_pass = "";
    if(isset($_POST['submit'])) {
        
        $name = $_POST['firstName'];
        $pass = $_POST['password'];
        $sql = "SELECT * from registertable where username='$name'";
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $password = $row['password'];
            $decrypt = password_verify($pass, $password);

            if($decrypt){
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header("location:about.php");
            }else{
                $Error_pass = "Wrong password";
            }
        }else{
            $Error_user = "Wrong username";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            width: 100%;
            background-color: black;
            color: white;
        }
    .login{
        width: 50%;
        height: 300px;
        background-color: wheat;
        color: black;
        margin: 90px auto;
        }
        input{
            width: 80%;
            height: 30px;
            margin: 40px 0 0 60px;
        }
        a{
            text-decoration: none;
            margin: 0 0 0 60px;
        }
    </style>
</head>
<body>
 
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="login">
        <input type="text" name="firstName" placeholder="Enter username"><br>   
        <div style="color: red; text-align:center;"><?php echo $Error_user ?></div>   
        <input type="password" name="password" placeholder="Enter password"><br>
        <div style="color: red; text-align:center;"><?php echo $Error_pass ?></div>
        <input type="submit" name="submit" value="submit"> <br>
        <a href="register.php">register</a>
</form>
</body>
</html>