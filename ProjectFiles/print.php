

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
        .recipt{
            box-shadow: 0 0 50px 0 #3F0C1F;
            border: 2px solid #3F0C1F;
            background-color:white;
            width: 600px;
        }

      .recipt div{
        height: 60px;
        vertical-align: center;
      }

      .recipt div div p{
        vertical-align: center;
        margin-top: 20px;
      }
    </style>
    <script>

function myFunction() {

window.print();

}

</script>
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

<div class="container recipt" style="margin-bottom: 30px; margin-top: 30px;">
<h1 align="center">
    <img src="Bank.png" width="60" height="60" class="d-inline-block align-center" alt="">
     <span>TRANSACTION RECIEPT</span>
</h1>
        <?php
            include 'config.php';
            $sno=$_GET['sno'];
            $sql = "SELECT * FROM  transaction where sno=$sno";
            $result=mysqli_query($conn,$sql);
            if(!$result)
            {
                echo "Error : ".$sql."<br>".mysqli_error($conn);
            }
            $rows=mysqli_fetch_assoc($result);
        ?>
    <div class="row">
		<div class="col-lg-6 col-md-6"style="text-align:center;border: 0.1px solid black;"><p class="p1"><b>DATE AND TIME:</b></p></div>
<div class="col-lg-6 col-md-6" style="text-align:center;border: 0.1px solid black;"><p class="p1"> <?php echo $rows['datetime']; ?></p></div>
</div>
<div class="row">
		<div class="col-lg-6 col-md-6"style="text-align:center;border:0.1px solid black;"><p class="p1"><b>SENDER:</b></p></div>
<div class="col-lg-6 col-md-6"style="text-align:center;border: 0.1px solid black;"><p class="p1"><?php echo $rows['sender']; ?></p></div>
</div>
<div class="row">
		<div class="col-lg-6 col-md-6"style="text-align:center;border:0.1px  solid black;"><p class="p1"><b>RECEIVER:</b></p></div>
<div class="col-lg-6 col-md-6"style="text-align:center;border: 0.1px solid black;"><p class="p1"><?php echo $rows['receiver'];?></p></div>
</div>
<div class="row">
		<div class="col-lg-6 col-md-6"style="text-align:center;border: 0.1px solid black;"><p class="p1"><b>AMOUNT:</b></p></div>
<div class="col-lg-6 col-md-6"style="text-align:center;border: 0.1px solid black;"><p class="p1"><?php echo $rows['balance']; ?></p></div>
 </div>
</div>
 <div align="center" style="margin-top: 10px; padding-bottom: 30px;"><button onclick="myFunction()" class="nav-link btn btn-info navbar">PRINT</button></div>
 </div>
 <br><br><br><br><br><br><br><br><br>
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
</body>

</html>
    