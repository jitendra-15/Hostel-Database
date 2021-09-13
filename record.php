<html>

<head>
    <link rel="shortcut icon" href="images/head.svg">
    <title>Hostel database</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .table{
            width: 75%;
            border: #fff solid 1px;
            border-radius: 5px;
            border-collapse: collapse;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size:1em;
        }
        td{  
            text-align: center; 
            color: black;
            height: 30px; 
        }
        th{
            border-bottom: #fff solid 1px;
            background-color: #009688;
            height: 40px;
        }
        table tr:nth-child(even){ background-color:  #fff; }
        table tr:nth-child(odd){ background-color: rgb(204, 249, 255); }
        table tr:hover{ background-color: rgb(199,199,199); }
        #log_form{
            width:30%;
            margin: auto;
            text-align: center;
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
                <li><a href="update.php">UPDATE RECORDS</a></li>
                <li><a href="login.html">LOGOUT</a></li>
            </ul>
        </nav>
        <br>
        <form id="log_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2>See Student Records </h2><br>
                <hr><br>
                <h3>Branch :</h3>
                <select class="in" id="bh" name="Branch"> 
                    <option value="" disabled selected hidden>Select Branch</option>
                    <option value="All">All</option>
                    <option value="B.Arch">B.Arch</option>
                    <option value="B.Plan">B.Plan</option>
                    <option value="B.Tech">B.Tech</option>
                    <option value="M.Tech">M.Tech</option>
                    <option value="MCA">MCA</option>
                    <option value="M.Arch">M.Arch</option>
                    <option value="M.Plan">M.Plan</option>
                    <option value="M.Sc">M.Sc</option>
                </select><br><br>
                <input type="hidden" name="val" val=0>
                <h3> Batch Year :</h3>
                <input class="in" id="year" name="year" type="number" min="2016" max="9999" placeholder="Addmission Year"><br>
                <button class="in btn" value="submit" style="background-color: #009688;width: 75%;"> Submit </button>
        </form>
        <br><br>
        <?php
            session_start();
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
            
            $Branch = "";
            $year = "";
            if(isset($_POST["Branch"])){
                $Branch = $_POST["Branch"];
                $year = $_POST["year"];
            }
            $sql = "SELECT * FROM student WHERE Branch = '".$Branch."' AND AYear = '".$year."' AND Hostel = '".$_SESSION["host"]."'";
            if($Branch == "All"){
                $sql = "SELECT * FROM student WHERE AYear = '".$year."' AND Hostel = '".$_SESSION["host"]."'";
            }
            $result = $conn->query($sql);

            if($result->num_rows == 0){
                echo" ";
            }
            else if ($result->num_rows > 0) {
                // output data of each row
                    echo '<center><table class="table">';
                    echo "<tr><th colspan=10>".$_SESSION["HName"]." Student Record</th></tr>";
                    echo "<tr><th>Reg. No.</th><th>Name</th><th>Mobile</th><th>Branch</th><th>Email</th><th>Father's Name</th><th>Category</th>
                    <th>Room No.</th><th>Date of Birth</th><th>Photo</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["reg_No"]."</td><td>".$row["Name"]."</td><td>".$row["Mob"]."</td><td>".$row["Branch"]."</td>
                        <td>".$row["Email"]."</td><td>".$row["FName"]."</td><td>".$row["Cat"]."</td>
                        <td>".$row["R_No"]."</td><td>".$row["DOB"].'</td>
                        <td><img src="'.$row["Photo"].'" alt="menu" class="menu-img" height=100 width=75></td></tr>';
                    }
                    echo "<tr><td colspan=10>Total No. of Records : ".$result->num_rows."</td></tr></table><center><br><br><br>";
                } 
            else{
                echo "Error :". $conn->error;
            }   
        ?>
    </div>
</body>
</html>