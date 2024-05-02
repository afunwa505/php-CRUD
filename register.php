<?php 
session_start();
$usernameErr="";$passwordErr="";$emailErr="";$numberErr="";$nationalityErr="";$genderErr="";
$username="";$password="";$email="";$number="";$nationality="";$date="";$gender=""; 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registerdb";
    $conn = mysqli_connect("localhost","root","","registerdb");
    if($conn === false){
        die("ERROR: Could not connect." .mysqli_connect_error());
    }
   

    if(isset($_POST['submit'])){
        $id="";
        $username = strtolower($_POST["username"]) ;
        $password = $_POST["password"];
        $hash = password_hash($password ,PASSWORD_DEFAULT );
        $email = $_POST["email"];
        $number = $_POST["number"];
        $nationality = $_POST["nationality"];
        $date = $_POST["date"];
        $gender = $_POST["gender"];
       
        $sql = "INSERT INTO registertable VALUES
        ('$id','$username','$hash','$email','$number','$nationality','$date','$gender')";

        if(empty($username)){
            $usernameErr = "Please enter your username";
        }elseif(empty($password)){
            $passwordErr = "Please choose a password";
        }elseif(strlen($password)<=4){
            $passwordErr = "Password must be up to 5 characters";
        }elseif(empty($email)){
            $emailErr = "Please enter your email address";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $usernameErr = "The email address is not correct";
        }elseif(empty($number)){
            $numberErr = "Please enter your phone number";
        }elseif(empty($nationality)){
            $nationalityErr = "Please enter your country";
        }elseif(empty($gender)){
            $genderErr = "Please choose your gender";
        }
        elseif(mysqli_query($conn, $sql)){
            $_SESSION['username'] = $username;
            header('location:index.php');
        }else{
            echo "ERROR: something went wrong!!!"
            .mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" > 

        <input type="text" name="username" placeholder="username" ><br>
        <div style="color: red; text-align:center;"><?php echo $usernameErr ?></div>
        <input type="password" name="password" placeholder="password" ><br>
        <div style="color: red; text-align:center;"><?php echo $passwordErr ?></div>
        <input type="email" name="email" placeholder="email" ><br>
        <div style="color: red; text-align:center;"><?php echo $emailErr ?></div>
        <input type="number" name="number" placeholder="+234" ><br>
        <div style="color: red; text-align:center;"><?php echo $numberErr ?></div>
        <input type="text" name="nationality" placeholder="country" ><br>
        <div style="color: red; text-align:center;"><?php echo $nationalityErr ?></div>
        <input type="date" name="date"  class="input"><br>
        <label>Male:<input type="radio" name="gender" value="male" class="gender"></label><br>
        <label>Female:<input type="radio" name="gender" value="female" class="gender"></label><br>     
        <div style="color: red; text-align:center;"><?php echo $genderErr ?></div>
       
        <input type="submit" name="submit" value="submit"> <br>
        <a href="index.php" style="text-decoration: none; margin:0 0 0 60px;">Login</a>
    </form>
     
</body>
</html>