<html>

  <head>
    <title> Customer Signup | Pet Adoption </title>
  </head>
  <?php session_start(); ?>
  <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">

    <link rel="stylesheet" href="assets/w3css/w3.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                <a class="navbar-brand page-scroll" href="index.php">
                   Pet Adoption </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <?php
                if(isset($_SESSION['login_client'])){
            ?> 
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_client']; ?></a>
                    </li>
                    <li>
                    <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Control Panel <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="entercar.php">Add Pet</a></li>
              <li> <a href="enterdriver.php"> Add Trainer</a></li>
              <li> <a href="clientview.php">View</a></li>

            </ul>
            </li>
          </ul>
                    </li>
                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>
            
            <?php
                }
                else if (isset($_SESSION['login_customer'])){
            ?>
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_customer']; ?></a>
                    </li>
                    <li>
                        <a href="#">History</a>
                    </li>
                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>

            <?php
            }
                else {
            ?>

            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="clientlogin.php">Employee</a>
                    </li>
                    <li>
                        <a href="customerlogin.php">Customer</a>
                    </li>
                    <li>
                        <a href="#"> FAQ </a>
                    </li>
                </ul>
            </div>
                <?php   }
                ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<?php

require 'connection.php';
$conn = Connect();

function GetImageExtension($imagetype) {
    if(empty($imagetype)) return false;
    
    switch($imagetype) {
        case 'assets/img/pets/bmp': return '.bmp';
        case 'assets/img/pets/gif': return '.gif';
        case 'assets/img/pets/jpeg': return '.jpg';
        case 'assets/img/pets/png': return '.png';
        default: return false;
    }
}

$pet_name = $conn->real_escape_string($_POST['pet_name']);
$pet_age = $conn->real_escape_string($_POST['pet_age']);
$pet_breed = $conn->real_escape_string($_POST['pet_breed']);
$pet_nameplate = $conn->real_escape_string($_POST['pet_nameplate']);
$with_food_price = $conn->real_escape_string($_POST['with_food_price']);
$without_food_price = $conn->real_escape_string($_POST['without_food_price']);
$with_food_per_day = $conn->real_escape_string($_POST['with_food_per_day']);
$pet_availability = "yes";

//$query = "INSERT into pets(pet_name,pet_nameplate,with_food_price,without_food_price,pet_availability) VALUES('" . $pet_name . "','" . $pet_nameplate . "','" . $with_food_price . "','" . $without_food_price . "','" . $pet_availability ."')";
//$success = $conn->query($query);


if (!empty($_FILES["uploadedimage"]["name"])) {
    $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
    $imgtype=$_FILES["uploadedimage"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=$_FILES["uploadedimage"]["name"];
    $target_path = "assets/img/pets/".$imagename;

    if(move_uploaded_file($temp_name, $target_path)) {
        //$query0="INSERT into pets (pet_img) VALUES ('".$target_path."')";
      //  $query0 = "UPDATE pets SET pet_img = '$target_path' WHERE ";
        //$success0 = $conn->query($query0);

        $query = "INSERT into pets(pet_name,pet_age,pet_breed,pet_nameplate,pet_img,with_food_price,without_food_price,with_food_per_day,pet_availability) VALUES('" . $pet_name . "','" . $pet_age . "', '" . $pet_breed . "', '" . $pet_nameplate . "','".$target_path."','" . $with_food_price . "','" . $without_food_price . "','" . $with_food_per_day . "', '" . $pet_availability ."')";
        $success = $conn->query($query);

        
    } 

}


// Taking pet_id from pets

$query1 = "SELECT pet_id from pets where pet_nameplate = '$pet_nameplate'";

$result = mysqli_query($conn, $query1);
$rs = mysqli_fetch_array($result, MYSQLI_BOTH);
$pet_id = $rs['pet_id'];
 

$query2 = "INSERT into clientpets(pet_id,client_username) values('" . $pet_id ."','" . $_SESSION['login_client'] . "')";
$success2 = $conn->query($query2);

if (!$success){ ?>
    <div class="container">
	<div class="jumbotron" style="text-align: center;">
        Pet with the same number already exists!
        <?php echo $conn->error; ?>
        <br><br>
        <a href="entercar.php" class="btn btn-default"> Go Back </a>
</div>
<?php	
}
else {
    header("location: entercar.php"); //Redirecting 
}

$conn->close();

?>

    </body>
    <footer class="site-footer">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <h5>© <?php echo date("Y"); ?> Pet Adoption</h5>
                </div>
            </div>
        </div>
    </footer>
</html>