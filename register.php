<html>

<head>
    <link rel="shortcut icon" href="images/head.svg">
    <title>Hostel database</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            width: 100%;
            height: 100vh;

        }
        .form{
            width: 82%;
            margin-left: 8%;
            border-radius: 20px;
            border: 1px solid #fff;
            padding: 20px 20px;
        }
        td{
            color: navajowhite;
        }
        input,select,option{
            padding: 10px 10px;
            width: 100%;
            border-radius: 10px;
            border: none;
            color: #000;
        }
        input:hover , select:hover {
            background: rgb(204, 249, 255);
        }
        .circle{
            background-image: url(images/registerbg.png);
            background-repeat: no-repeat;
            background-position: center;
            border-radius: 50px;
            color: black;
            height: 86vh;
            width: 61.5%;
            text-align:center;
            margin: auto;
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
            </ul>
        </nav>
        <div class="circle">
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
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
            
            $Fname = explode('.',$_FILES["pic"]["name"]);
            $fExt = strtolower(end($Fname));
            
            if ($_FILES["pic"]["size"] > 1048576) {
                echo"File Size Must be less or equal to 1mb";
            }
            else if(in_array($fExt,$valid)){
                $upload = "student/". $_POST["rehNo"] . $_FILES["pic"]["name"];

                $sql = "INSERT INTO  student VALUES ('". $_POST["rehNo"] ."','". $_POST["name"] ."','". $_POST["Mob"] ."',
                    '". $_POST["Branch"] ."','". $_POST["email"] ."','". $_POST["fname"] ."','". $_POST["lname"] ."',
                    '". $_POST["Host"] ."','". $_POST["cat"] ."','". $_POST["gen"] ."','". $_POST["rno"] ."','". $_POST["year"] ."',
                    '". $_POST["dob"] ."','". $upload ."','Full')";
            
                $result = $conn->query($sql);

                if($result === TRUE){
                    echo '<h1 style="color: black;">Thank You!</h1><br><b style="color: black;">'.$_POST["name"].'</b>,<br><br>
                        Your information is successfully stored<br> into our Database.';    
                    move_uploaded_file($_FILES["pic"]["tmp_name"],$upload); 
                }
                else{
                    echo "Error :". $conn->error;
                }
            }
            else{
                echo "Your Image not have Valid extension.";
            }
        ?>
        </div>
    </div>
</body>
</html>