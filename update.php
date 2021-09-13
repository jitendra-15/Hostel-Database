<?php
    session_start();
?>
<html>
<head>
    <link rel="shortcut icon" href="images/head.svg">
    <title>Hostel database</title>
    <link rel="stylesheet" href="style.css">
    <style>
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
                <li><a href="record.php">See Record</a></li>
                <li><a href="login.html">LOGOUT</a></li>
            </ul>
        </nav>
        <form id="log_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2>Update Student Records </h2><br><hr><br>
                <h3> What do you want update :</h3>
                <select class="in" name="att"> 
                    <option value="" disabled selected hidden>Select</option>
                    <option value="Name">NAME</option>
                    <option value="Mob">MOBILE NO.</option>
                    <option value="Email">EMAIL</option>
                    <option value="FName">FATHER'S NAME</option>
                    <option value="LName">LOCAL GUARDIAN NAME</option>
                    <option value="Cat">CATEGORY</option>
                    <option value="R_No">ROOM NO.</option>
                    <option value="DOB">DATE OF BIRTH</option>
                </select>
                <input class="in" name="rno" type="text" placeholder="Registeration No."><br>
                <button class="in btn" value="submit" style="background-color: #009688;width: 75%;"> Submit </button>
        </form>
    </div>
    <?php
            $att = "";
            $rno = "";
            if(isset($_POST["att"])){
                $att = $_POST["att"];
                $rno = $_POST["rno"];
            }
            $_SESSION["att"] = $att;
            $_SESSION["rno"] = $rno; 
            
            if( $att != ""){
                echo '<br><br><br><br><form method="POST" action="update1.php" style="width:30%;text-align:center;margin-left:35%;"><b> Enter Your data here</b>
                <input type="hidden" name="rno" value="'.$rno.'"><input type="hidden" name="att" value="'.$att.'">';
                if($att == "Email")
                    echo'<input class="in" id="email" name="up" type="email" placeholder="Email">';
                elseif ($att == "Cat"){
                    echo'<select class="in" id="cat" name="up"> <option value="" disabled selected hidden>Catagory</option>
                        <option value="SC">Scheduled Caste</option><option value="ST">Scheduled Tribe</option>
                        <option value="OBC">Other Backward Class</option><option value="GC">General </option>
                        <option value="EBC">Economically Backward Class</option></select>';
                }
                elseif ($att == "R_No")
                    echo'<input class="in" name="up" type="number" placeholder="Room No.">';
                elseif ($att == "DOB") 
                    echo'<input class="in" name="up" type="date" placeholder="Date Of Birth">';
                else 
                    echo'<input class="in" name="up" type="text" placeholder="Name">';
                echo'<button class="in btn" value="submit" style="background-color: #009688; width:85%"> Submit </button>';
            }
            else{
                echo ""; 
            }
            echo"</form>";
    ?>
</body>
</html>