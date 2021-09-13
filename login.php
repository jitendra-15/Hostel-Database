<?php
    session_start();
?>
<html>
<head>
    <link rel="shortcut icon" href="images/head.svg">
    <title>Hostel database</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            border-bottom: #009688 solid 5px;
        }
        .btn-round {
            border-radius: 5px;
            height: 60px;
            background: #009896;
            border: white 2px solid;
        }
        .btn:hover {
            border: #009688 1px solid;
            background: #1d2026;
        }
        a{
            text-decoration: none;
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
                <li><a href="login.html">LOGOUT</a></li>
            </ul>
        </nav>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "hosteldatabase";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM Superitendent WHERE Uname='" . $_POST["Uname"]. "' AND Pass='". $_POST["Pass"] ."'";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION["host"] = $row["H_Code"];
                    $_SESSION["HName"] = $row["HName"];
                    echo ' 
                    <h1 style="text-align: center;">'.$row["HName"].'</h1><br><hr><br>
                    
                        <br><br><center>
                            <svg xmlns="http://www.w3.org/2000/svg" width="170" height="170" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                            </svg>
                            <br><br><br>
                            <h1>Welcome</h1><br><br>
                            It nice to you again, Sir.<br><br><br>
                            <button class="btn btn-round" style="width:20%;"><a href="record.php">See Records</a></button>
                            <button class="btn btn-round" style="width:20%;"><a href="update.php">Update Records</a></button><br></center>
                    ';
                }
            } 
            else {
                echo "Sorry!<br>Username or Password is Wrong";
            }   
            $conn->close();
        ?>
       
    </div>
</body>
</html> 