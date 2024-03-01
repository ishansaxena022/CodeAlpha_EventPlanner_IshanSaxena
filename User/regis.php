<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <?php include '../links/links.php';?>
    <?php //include 'links/style.css';?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--Custom CSS-->
    <link href="../links/regis-form.css" rel="stylesheet">
    <style>
                html,body{
            height: 100%;
        }
        
        .form-regis {
            max-width: 330px;
            padding: 1rem;
        }
        
        .form-regis .form-floating:focus-within {
            z-index: 2;
        }
        
        .form-regis input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        
        .form-regis input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .container{
            width: 100%;
        }
    </style>

</head>
<body>
    <?php
        include '../connection.php';

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $confpass = $_POST['confpass'];
            $type = $_POST['account_type'];

            $insertquery = "INSERT into users(Name,Email,Password,ConfirmPass,AccType) 
                            values('$name', '$email','$pass','$confpass','$type')";
                            
            $res = mysqli_query($con,$insertquery); 
            
            if($res){
    ?> <script>alert("Data inserted"); </script>
    <?php
        }
        else{
    ?> <script>alert("Not inserted!!");</script>
    <?php
        }
    }
    ?>

    <!--Form body-->
    <main class="form-regis w-100 m-auto">  
        <h1 class="h1 mb-3 fw-normal">Create Account</h1>
        <h5 class="h5 mb-3 fw-normal">Get started with creating account</h5>
        <form action=" " method = "POST">

            <!--Name-->
            <div class="form-floating">
                <input name="name"type="name" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Name</label>
            </div> <br>
        
            <!--Email-->
            <div class="form-floating">
                <input name="email"type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">E-mail address</label>
            </div> <br>
            <!--Password-->
            <div class="form-floating">
                <input name="pass"type="name" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Password</label>
            </div><br>
            
            <!--Confirm Password-->
            <div class="form-floating">
                <input name="confpass"type="name" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Confirm Pass</label>
            </div> <br>

            <!--Radio buttons-->
            <div class="container">
                <label>Account Type:</label><br>
                <input type="radio" id="guest" name="account_type" value="guest">
                <label for="guest">Guest</label><br>
                
                <input type="radio" id="organizer" name="account_type" value="organizer">
                <label for="organizer">Organizer</label><br><br>
            </div>
            <button name ="submit" type ="submit" class="btn btn-primary w-100 py-2">Sign Up</button>
        </form>
        Already have account , <a href="../index.php">Login here</a>
    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>