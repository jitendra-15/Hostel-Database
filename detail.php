<html>

<head>
    <link rel="shortcut icon" href="images/head.svg">
    <title>Hostel database</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .details{
            margin:auto;
            width:40%;
            height:50vh;
            border:1px #fff solid;
            display: flex;
            padding: 30px 30px;
            justify-content: center;
            align-items: center;
            border-radius:20px;
            font-size:20px;
            background:rgb(204, 249, 255);
        }
        .divas, .ddvas{
            color:black; 
            padding-left: 30px;
        }
        .details b{
            color:black;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="img">
                <img src="images/menu.png" alt="menu" class="menu-img">
                <b>HOSTEL DATA</b>
            </div>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="Register.html">Register</a></li>
            </ul>
        </nav><br><br>
        <h1 style="text-align:center;">Your Information</h1><br><hr><br><br>
        <div class="details">
        <?php
            session_start();
            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "hosteldatabase";
            $valid = array('png','jpg','jpeg');
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM student WHERE reg_No ='".$_POST["rno"]."' AND DOB = '".$_POST["dob"]."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
  // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo'<div class="ddvas"><img src="'.$row["Photo"].'" alt="menu" class="menu-img" height=160px width=120px><br><br>'.
                    "<b>Mobile:</b><br>".$row["Mob"]."<br><br>
                    <b>Email:</b><br>".$row["Email"].'</div>
                    <div class="divas"><h2 style="color:black;">'.$row["Name"]."</h2><br>
                    <b>Registeration Number:</b> ".$row["reg_No"]."<br><br>
                    <b>Branch:</b> ".$row["Branch"]."<br><br>
                    <b>Father's Name:</b> ".$row["FName"]."<br><br>
                    <b>Local Gaurdian:</b> ".$row["LName"]."<br><br>
                    <b>Hostel:</b> ".$row["Hostel"]."<br><br>
                    <b>Category:</b> ".$row["Cat"]."<br><br>
                    <b>Room Number:</b> ".$row["R_No"]."<br><br>
                    <b>Date Of Birth:</b> ".$row["DOB"]."</div>";
                } 
            } 
            else {
                echo "You are not registered.<br>So, Please Register first.";
            }   
        ?>
        </div>
    </div>
</body>
</html>