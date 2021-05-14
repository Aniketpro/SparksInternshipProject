  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    
</head>

<body style="background-color : #61122f;">
<header>
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="Banking.html" style="color: white;"><img class="brand-logo" src="Bank.png" height="40px;" width="40px;">BANKING MADE EASY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <a href="Banking.html" class="nav-link btn btn-info" role="button" style="margin-right: 30px;" >
      HOME
  </a>

   <a href="showCustomer.php" class="nav-link btn btn-info" role="button" style="margin-right: 30px;" >
      Show Details
  </a>

  <a href="CUSTOMER.php" class="nav-link btn btn-info" role="button" >
      Trasfer Money
  </a>
</nav>
</header>


	<div class="container">
        <h2 class="text-center pt-4" style="color : white;">Transaction History</h2>
        
       <br>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead style="color : white;">
            <tr>
                <th class="text-center">S.No.</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
                <th class="text-center">VIEW</th>   
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr style="color : white;">
            <td class="py-2"><?php echo $rows['sno']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['balance']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
            <td><a href="print.php?sno= <?php echo $rows['sno'] ;?>"> <button type="button" class="btn" style="background-color : #A569BD;">VIEW</button></a></td>       
                
        <?php
            }

        ?>
        </tbody>
    </table>

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