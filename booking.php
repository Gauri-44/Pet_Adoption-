<!DOCTYPE html>
<html>
<?php 
 include('session_customer.php');
if(!isset($_SESSION['login_customer'])){
    session_destroy();
    header("location: customerlogin.php");
}
?> 
<title>Adopt Pets </title>
<head>
    <script type="text/javascript" src="assets/ajs/angular.min.js"> </script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>  
  <script type="text/javascript" src="assets/js/custom.js"></script> 
 <link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
</head>
<body ng-app=""> 


      <!-- Navigation -->
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
                    <ul class="nav navbar-nav">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Garagge <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="mybookings.php"> My Bookings</a></li>
            </ul>
            </li>
          </ul>
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
    
<div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" action="bookingconfirm.php" method="POST">
        <br style="clear: both">
          <br>

        <?php
        $pet_id = $_GET["id"];
        $sql1 = "SELECT * FROM pets WHERE pet_id = '$pet_id'";
        $result1 = mysqli_query($conn, $sql1);

        if(mysqli_num_rows($result1)){
            while($row1 = mysqli_fetch_assoc($result1)){
                $pet_name = $row1["pet_name"];
                $pet_age = $row1["pet_age"];
                $pet_breed = $row1["pet_breed"];
                $pet_nameplate = $row1["pet_nameplate"];
                $with_food_price = $row1["with_food_price"];
                $without_food_price = $row1["without_food_price"];
                $with_food_per_day = $row1["with_food_per_day"];
            }
        }

        ?>

          <!-- <div class="form-group"> -->
              <h5> Selected Pet: &nbsp;  <b><?php echo($pet_name);?></b></h5>
         <!-- </div> -->
         
          <!-- <div class="form-group"> -->
            <h5> Pet's Number Plate:&nbsp;<b> <?php echo($pet_nameplate);?></b></h5>
          <!-- </div>      -->
        <!-- <div class="form-group"> -->
        <?php $today = date("Y-m-d") ?>
          <label><h5>Booking Date:</h5></label>
            <input type="date" name="booking_date" min="<?php echo($today);?>" required="">
            &nbsp; 
          <label><h5>Adopt Date:</h5></label>
          <input type="date" name="adopt_date" min="<?php echo($today);?>" required="">
        <!-- </div>      -->
        
        <h5> Choose your pet's food type:  &nbsp;
            <input onclick="reveal()" type="radio" name="radio" value="with_food" ng-model="myVar"> <b>With Food</b>&nbsp;
            <input onclick="reveal()" type="radio" name="radio" value="without_food" ng-model="myVar"><b>With-Out Food </b>
                
        
        <div ng-switch="myVar"> 
        <div ng-switch-default>
                    <!-- <div class="form-group"> -->
                <h5>Charges: <h5>    
                <!-- </div>    -->
                     </div>
                    <div ng-switch-when="with_food">
                    <!-- <div class="form-group"> -->
                <h5>Charges: <b><?php echo("Rs. " . $with_food_price . " Rs. " . $with_food_per_day . "/day");?></b><h5>    
                <!-- </div>    -->
                     </div>
                     <div ng-switch-when="without_food">
                     <!-- <div class="form-group"> -->
                <h5>Charge: <b><?php echo("Rs. " . $without_food_price );?></b><h5>    
                <!-- </div>   -->
                     </div>
        </div>

         <h5> Charge type:  &nbsp;
            <input onclick="reveal()" type="radio" name="radio1" value="days"><b> per day</b>

            <br><br>
                <!-- <form class="form-group"> -->
                Select a trainer: &nbsp;
                <select name="owner_id_from_dropdown" ng-model="myVar1">
                        <?php
                        $sql2 = "SELECT * FROM owner d WHERE d.owner_availability = 'yes' AND d.client_username IN (SELECT cc.client_username FROM clientpets cc WHERE cc.pet_id = '$pet_id')";
                        $result2 = mysqli_query($conn, $sql2);

                        if(mysqli_num_rows($result2) > 0){
                            while($row2 = mysqli_fetch_assoc($result2)){
                                $owner_id = $row2["owner_id"];
                                $owner_name = $row2["owner_name"];
                                $owner_gender = $row2["owner_gender"];
                                $owner_phone = $row2["owner_phone"];
                    ?>
  

                    <option value="<?php echo($owner_id); ?>"><?php echo($owner_name); ?>
                   

                    <?php }} 
                    else{
                        ?>
                    Sorry! No Trainers are currently available, try again later...
                        <?php
                    }
                    ?>
                </select>
                <!-- </form> -->
                <div ng-switch="myVar1">
                

                <?php
                        $sql3 = "SELECT * FROM owner d WHERE d.owner_availability = 'yes' AND d.client_username IN (SELECT cc.client_username FROM clientpets cc WHERE cc.pet_id = '$pet_id')";
                        $result3 = mysqli_query($conn, $sql3);

                        if(mysqli_num_rows($result3) > 0){
                            while($row3 = mysqli_fetch_assoc($result3)){
                                $owner_id = $row3["owner_id"];
                                $owner_name = $row3["owner_name"];
                                $owner_gender = $row3["owner_gender"];
                                $owner_phone = $row3["owner_phone"];

                ?>

                <div ng-switch-when="<?php echo($owner_id); ?>">
                    <h5>Trainer Name:&nbsp; <b><?php echo($owner_name); ?></b></h5>
                    <p>Gender:&nbsp; <b><?php echo($owner_gender); ?></b> </p>
                    <p>Contact:&nbsp; <b><?php echo($owner_phone); ?></b> </p>
                </div>
                <?php }} ?>
                </div>
                <input type="hidden" name="hidden_petid" value="<?php echo $pet_id; ?>">
                
         
           <input type="submit"name="submit" value="Adopt Now" class="btn btn-warning pull-right">     
        </form>
        
      </div>

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