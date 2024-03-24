<?php
        $insert=false;
        if(isset($_POST['Name'])){
        $submit=true;
        define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
    
        $connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD);
        if(!$connect){
             die("Connection to this database failed due to" . mysqli_connect_error());
         }
         //echo "Success connecting to the DB";
         $name=$_POST['Name'] ;
         $gender=$_POST['Gender'];
         $age=$_POST['Age'] ;
         $phone=$_POST['Phone'] ;
         $email=$_POST['Email'] ;
         $other=$_POST['Desc'] ;
         $sql="INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
        // echo $sql; 
        if($connect->query($sql)==true){
            // echo "Successfully inserted";
            $insert=true;
        }
        else{
            echo "ERROR :$sql <br> $connect->error";
        }
        $connect->close();
    }
?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<img src="cgc.jpeg" alt="cgc" class="cgc">
        <div class="container">
        <h1>Welcome to CGC Landran Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the Trip</p>
        <?php
        if($insert==true){
        echo "<p class='submitmsg'>Thanks for submitting the form!! We are happy to see you joining for the trip!!</p>";
        }
        ?>
        <form action="index.php" method="post">
        <input type="text" id="Name" name="Name" placeholder="Enter your name">
        <input type="text" id="Age" name="Age" placeholder="Enter your Age">
        <input type="text" id="Gender" name="Gender" placeholder="Enter your Gender">
        <input type="email" id="Email" name="Email" placeholder="Enter your email">
        <input type="phone" id="Phone" name="Phone" placeholder="Enter your phone number">
        <textarea name="Desc" id="Desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
        <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.php"></script>
</body>
</html>