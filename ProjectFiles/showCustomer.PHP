<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMER DETAILS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    

    <style type="text/css">
      button{
        transition: 1.5s;
      }
      button:hover{
        background-color:#616C6F;
        color: white;
      }

      .py-2:hover{
        box-shadow: 0 1px 5px 1px #cccccc;
      }
    </style>
</head>

<body style="background-color : #61122f;">
<?php
    include 'config.PHP';
    $sql = "SELECT * FROM customer";
    $result = mysqli_query($conn,$sql);
?>
<header>
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="Banking.html" style="color: white;"><img class="brand-logo" src="Bank.png" height="40px;" width="40px;">BANKING MADE EASY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <a href="Banking.html" class="nav-link btn btn-info" role="button" style="margin-right: 30px;">
      HOME
  </a>

   <a href="CUSTOMER.php" class="nav-link btn btn-info" role="button" >
      Tansfer Money
  </a>
</nav>
</header>

<div class="container">
        <h2 class="text-center pt-4" style="color : white;">Customers</h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered" style="border: 3px solid black; margin-bottom: 85px;">
                        <thead style="color : white;">
                            <tr>
                            <th scope="col" class="text-center py-2" style="border: 3px solid black;">ID</th>
                            <th scope="col" class="text-center py-2" style="border: 3px solid black;">Name</th>
                            <th scope="col" class="text-center py-2" style="border: 3px solid black;">E-Mail</th>
                            <th scope="col" class="text-center py-2" style="border: 3px solid black;">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr style="color : white; border: 3px solid black;">
                        <td class="py-2" style="border: 3px solid black;"><?php echo $rows['id']?></td>
                        <td class="py-2" style="border: 3px solid black;"><?php echo $rows['Customer_name']?></td>
                        <td class="py-2" style="border: 3px solid black;"><?php echo $rows['email_id']?></td>
                        <td class="py-2" style="border: 3px solid black;"><?php echo $rows['balance']?></td>
                    </tr>
                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
        <footer class="panel-footer" style="margin-top: 30px; padding-top: 35px; padding-bottom: 30px; background-color: #222; border-top: 0;">
      <div class="container" style="color: white;">
        <div class="row">
          <section id="hours" class="col-sm-4">
            <span>Hours:</span><br>
            Mon-Fri: 11:15am - 10:00pm<br>
            Sat: 11:15am - 2:30pm<br>
            Sunday Closed
            <hr class="visible-xs">
          </section>
          <section id="address" class="col-sm-4">
            <span>Address:</span><br>
            Gokuldham Society, Powder Gulli<br>
            Goregaon (E), Filmcity road, Mumbai.
            <hr class="visible-xs">   
          </section>
          <section id="testimonials" class="col-sm-4"><p>The most trusted bank of India</p>
            <p>Amazing service & Great policies!</p>
          </section>
        </div>
        <div class="text-center">&copy; Copyright New site</div>
      </div>
    </footer>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>