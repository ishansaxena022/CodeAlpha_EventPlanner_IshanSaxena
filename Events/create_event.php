<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>

    <?php include '../links/links.php';?>
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--Custom CSS-->
    <link href="../links/sign-in.css" rel="stylesheet">

</head>
<body>

    <?php
        include '../connection.php';

        if(isset($_POST['submit'])){
            $eventname = $_POST['eventname'];
            $desc = $_POST['eventdesc'];
            $venue = $_POST['venue'];
            $date = $_POST['date'];
            $rsvp = $_POST['rsvp'];
            $organizer = $_SESSION['username'];
            
            $sql1 = "INSERT into events(organizer_name,event_name,event_description,venue,venue_time,rsvp) 
                                values('$organizer','$eventname','$desc','$venue','$date','$rsvp')";

            // $rsvp_names = explode(',',$rsvp);
            // foreach ($rsvp_names as $name) {
            //     $name = trim($name);
            //     if (!empty($name)) {
            //         $sql = "INSERT INTO rsvp (names) VALUES ('$name')";
            //         if (!mysqli_query($con, $sql)) {
            //             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            //         }
            //     }
            // }
            $res1 = mysqli_query($con,$sql1);
           // $res2 = mysqli_query($con,$sql);

            if($res1){
                ?> <script>alert("Event created successfully");</script>
                <?php
                header('location:view_events.php');
            }
            else{
                ?> <script>alert("Event not created");</script>
                <?php
            }
        }

    ?>

    <main class="form-signin w-100 m-auto">
    <h1 class="h1 mb-3 fw-normal">Create Event</h1>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">

     
     <div class="form-floating">
            <input name="eventname" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Event Name</label>
    </div>

     <!-- <label for="">Event Description:</label><br>
     <input name="eventdesc" type="text"><br><br> -->
     <div class="form-floating">
            <input name="eventdesc" type="textarea" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Event Description</label>
     </div>

     <!-- <label for="">Venue:</label><br>
     <input name= "venue" type="text"><br><br> -->
     <div class="form-floating">
            <input name="venue" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Venue</label>
     </div>
     
     <label for="">Time:</label><br>
     <input name="date" type="date"><br><br>
     
    <div class="form-floating">
     <label for="names">Enter Names for RSVP:</label><br>
     <textarea class="form-control" id="floatingInput" name="rsvp" rows="4" cols="50"></textarea><br><br>
    </div>
     <button class="btn btn-primary w-100 py-2" name="submit" value="submit" type="submit">Create Event</button>

    </form>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>