<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customer where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customer where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if(($amount) > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
                echo '<script>alert("Are you sure you want to transfer?")</script>';
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE customer set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE customer set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
               

                
                $sender = $sql1['Customer_name'];
                $receiver = $sql2['Customer_name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transactionhistory.php';
                           </script>";
                                    
                           
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    


    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}

    </style>
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
      Trasfer from another account
  </a>
</nav>
</header>

	<div class="container">
        <h2 class="text-center pt-4" style="color : white;">Transaction</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customer where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr style="color : white;">
                    <th class="text-center" style="border: 3px solid black;">Id</th>
                    <th class="text-center" style="border: 3px solid black;">Name</th>
                    <th class="text-center" style="border: 3px solid black;">Email</th>
                    <th class="text-center" style="border: 3px solid black;">Balance</th>
                </tr>
                <tr style="color : white;">
                    <td class="py-2" style="border: 3px solid black;"><?php echo $rows['id'] ?></td>
                    <td class="py-2" style="border: 3px solid black;"><?php echo $rows['Customer_name'] ?></td>
                    <td class="py-2" style="border: 3px solid black;"><?php echo $rows['email_id'] ?></td>
                    <td class="py-2" style="border: 3px solid black;"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label style="color : white;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customer where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['Customer_name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : white;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn" style="margin-bottom: 85px;">Transfer</button>
            </div>
        </form>
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