<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner</title>
    
    <?php include 'links/links.php';?>
    <?php //include 'links/style.css';?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--Custom CSS-->
    <link href="links/sign-in.css" rel="stylesheet">
</head>
<body>
    
    <?php
        include 'connection.php';
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            $sql1 = "SELECT * from users where Email = '$email' ";

            $q1 = mysqli_query($con,$sql1);
            $rowdat = mysqli_fetch_assoc($q1);

            $_SESSION['username'] = $rowdat['Name'];
            $_SESSION['usertype'] = $rowdat['AccType'];

            if($rowdat['Password'] == $pass){
    ?>      <script>alert("Login successfull!");
                    location.replace("Events/view_events.php");
            </script>
            <?php
            }
            else{
            ?>
            <script>alert("Failed attempt, Password error");</script>
            <?php
            }
        }
    ?>

    <!--Form body starts here-->
    <main class="form-signin w-100 m-auto">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method= "POST">
        <h2 class="h3 mb-3 fw-normal">CodeAlpha Event Planner</h2>
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <!--Input Email-->
        <div class="form-floating">
            <input name="email"type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>

        <!--Input Password-->
        <div class="form-floating">
            <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <!-- <button name="submit" type="submit">Login</button> -->
        <!--Sign In button-->
        <button name="submit" class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    </form>
    <p>Don't have an account <a href="User/regis.php">Click here!!</a></p>
    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>