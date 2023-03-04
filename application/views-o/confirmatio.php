<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/assets/js/bootstrap.min.js" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</head>
<body>
	<div class="wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="shadow"></div>
        <div class="shadow"></div>
        <div class="shadow"></div>
        <span>Redirecting To Payment Gateway...</span>
    </div>





	<!-- <div>
	  <span>↓</span>
	  <span style="--delay: 0.1s">↓</span>
	  <span style="--delay: 0.3s">↓</span>
	  <span style="--delay: 0.4s">↓</span>
	  <span style="--delay: 0.5s">↓</span>
	</div> -->

<!-- Bootstrap 4 Navbar  -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="display:none">
	<a href="#" class="navbar-brand">PayUMoney Gateway</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

	<div class="collapse navbar-collapse" id="navbarsExampleDefault">

		<ul class="navbar-nav ml-auto">

			<li class="nav-item ">
				<a href="https://facebook.com/anburocky3" class="nav-link" target="_blank">#Developer</a>
			</li>

			<li class="nav-item">
				<a href="<?php echo base_url(); ?>Welcome/help" class="nav-link">Help Article</a>
			</li>

			<li class="nav-item">
				<a href="https://facebook.com/cdudenetworks" class="nav-link" target="_blank">Support</a>
			</li>

		</ul>

	</div>
	
</nav>
<!-- End Bootstrap 4 Navbar -->

	

<div class="container mt-5" style="display:none;">
	<div class="row">
        <div class="col-md-2"></div>  
        <div class="col-md-8">
        	<div class="card">
        		<h5 class="card-header bg-success text-white">Checkout Confirmation</h5>
        		<div class="card-body">
        			<form action="<?php echo $action; ?>/_payment" method="post" id="payuForm" name="payuForm">
		                <input type="hidden" name="key" value="<?php echo $mkey; ?>" />
		                <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
		                <input type="hidden" name="txnid" value="<?php echo $tid; ?>" />
		                <div class="form-group">
		                    <label class="control-label">Total Payable Amount</label>
		                    <input class="form-control" name="amount" value="<?php echo $amount; ?>"  readonly/>
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Your Name</label>
		                    <input class="form-control" name="firstname" id="firstname" value="<?php echo $name; ?>" readonly/>
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Email</label>
		                    <input class="form-control" name="email" id="email" value="<?php echo $mailid; ?>" readonly/>
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Phone</label>
		                    <input class="form-control" name="phone" value="<?php echo $phoneno; ?>" readonly />
		                </div>
		                <div class="form-group">
		                    <label class="control-label"> Booking Info</label>
		                    <textarea class="form-control" name="productinfo" readonly><?php echo $productinfo; ?></textarea>
		                </div>
		                <div class="form-group">
		                    <label class="control-label">Address</label>
		                    <input class="form-control" name="address1" value="<?php echo $address; ?>" readonly/>     
		                </div>
		                <div class="form-group">
		                    <input name="surl" value="<?php echo $sucess; ?>" size="64" type="hidden" />
		                    <input name="furl" value="<?php echo $failure; ?>" size="64" type="hidden" />  
		                    <!--for test environment comment  service provider   -->
		                    <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
		                    <input name="curl" value="<?php echo $cancel; ?> " type="hidden" />
		                </div>
		                <div class="form-group float-right">
		                	<input type="submit" value="Pay Now" class="btn btn-success" />
		                </div>
		            </form> 
        		</div>
        	</div>
        	                                   
        </div>
        <div class="col-md-2"></div>
    </div>
	<!-- Footer -->
	
	<footer>
		<hr>
		<p>Copyright &copy; <?php echo date('Y'); ?>  
			<span class="float-right">Coded with Love &hearts;	: <a href="https://facebook.com/anburocky3" target="_blank">Anbuselvan Rocky</a></span></p>
	</footer>
</div> 
<style type="text/css">
	body{
    padding:0;
    margin:0;
    width:100%;
    height:100vh;
    background:#fff;
    /*background:radial-gradient(#9b59b6, #8e44ad);*/
}
.wrapper{
    width:200px;
    height:60px;
    position: absolute;
    left:50%;
    top:50%;
    transform: translate(-50%, -50%);
}
.circle{
    width:20px;
    height:20px;
    position: absolute;
    border-radius: 50%;
    background-color: black;
    left:15%;
    transform-origin: 50%;
    animation: circle .5s alternate infinite ease;
}

@keyframes circle{
    0%{
        top:60px;
        height:5px;
        border-radius: 50px 50px 25px 25px;
        transform: scaleX(1.7);
    }
    40%{
        height:20px;
        border-radius: 50%;
        transform: scaleX(1);
    }
    100%{
        top:0%;
    }
}
.circle:nth-child(2){
    left:45%;
    animation-delay: .2s;
}
.circle:nth-child(3){
    left:auto;
    right:15%;
    animation-delay: .3s;
}
.shadow{
    width:20px;
    height:4px;
    border-radius: 50%;
    background-color: rgba(0,0,0,.5);
    position: absolute;
    top:62px;
    transform-origin: 50%;
    z-index: -1;
    left:15%;
    filter: blur(1px);
    animation: shadow .5s alternate infinite ease;
}

@keyframes shadow{
    0%{
        transform: scaleX(1.5);
    }
    40%{
        transform: scaleX(1);
        opacity: .7;
    }
    100%{
        transform: scaleX(.2);
        opacity: .4;
    }
}
.shadow:nth-child(4){
    left: 45%;
    animation-delay: .2s
}
.shadow:nth-child(5){
    left:auto;
    right:15%;
    animation-delay: .3s;
}
.wrapper span{
    position: absolute;
    top:75px;
    font-family: 'Lato';
    font-size: 12px;
    color: black;
}
@keyframes youtubeAnim{
  0%,100%{
    color:#c9110f;
  }
  50%{
    color:#ff0000;
  }
}
/* footer  */
</style>
<script type="text/javascript">
	$(document).ready(function(){
		setTimeout( function () { 
        $('#payuForm').submit();
    }, 5000);
	})
</script>

</body>
</html>