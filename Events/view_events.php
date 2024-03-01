<?php
    session_start();
    if (!isset($_SESSION['username'])){
        echo "You are logged out";
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>

    <style>
        .blue-button {
            background-color:#89CFF0;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s;
        }   

        .blue-button:hover {
            background-color: #F0FFFF;
        }

        .red-button{
            background-color:#FF5733 ;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .red-button:hover {
            background-color: #F0FFFF;
        }
    </style>
    <link href="../links/events.css" rel="stylesheet">


</head>
<body>
    <a href="../Events/create_event.php"><button class="blue-button">Create Event +</button></a>
    <a href="../User/logout.php"><button class="red-button">Log Out</button></a>
    <div class="main-div">
    
    <h4>Hello <?php echo $_SESSION['username'];?> (<?php echo $_SESSION['usertype'];?>), Welcome!!! </h4>

    <h2> Upcoming Events </h2>
    <table>
        <thead>
               <tr>
                <th>Event Name</th>
                <th>Description</th>
                <th>Venue</th>
                <th>Time</th>
                <th>RSVP</th>
                <th>Organized by</th>
               </tr>  
        </thead>
        <tbody>
            <?php
                include '../connection.php';
                $selectevent = 'SELECT * FROM events';
                
                $query = mysqli_query($con,$selectevent);

                while ($res = mysqli_fetch_array($query)){
            ?>     
                
                <tr>
                    <td><?php echo $res['event_name'] ?></td>
                    <td><?php echo $res['event_description'] ?></td>
                    <td><?php echo $res['venue'] ?></td>
                    <td><?php echo $res['venue_time'] ?></td>
                    <td><?php echo $res['rsvp'] ?></td>
                    <td><?php echo $res['organizer_name'] ?></td>
                </tr>
            <?php
                }
            ?>      
        </tbody>
    </table>
    </div>
</body>
</html>