<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="backend/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="backend/css/style.css" rel='stylesheet' type='text/css' />
<link href="backend/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="backend/css/font.css" type="text/css"/>
<link href="backend/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="backend/js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="reg-w3">
<div class="w3layouts-main">
	<h2>Register Now</h2>
		<form action="{{URL::to('save-register')}}" method="post">
            {{ csrf_field() }}
			<input type="text" class="ggg" name="acc_name" placeholder="HO va ten" required="">
			<input type="email" class="ggg" name="acc_email" placeholder="Email" required="">
			<input type="text" class="ggg" name="acc_phone" placeholder="So Dien Thoai" required="">
			<input type="password" class="ggg" name="acc_password" placeholder="Mat Khau" required="">
			<div class="form-group">
                <label for="exampleInputPassword1">Danh phan cua ban?</label>
                <select name="acc_permission" class="ggg">
                    <option value="1">tac gia</option>
                    <option value="2">Nguoi Doc</option>
                    
                </select>
            </div> 

			<h4><input type="checkbox" />I agree to the Terms of Service and Privacy Policy</h4>
			
				<div class="clearfix"></div>
                <input type="submit" value="Sign In" name="login">
		</form>
		<p>Already Registered.<a href="/login">Login</a></p>
</div>
</div>
<script src="backend/js/bootstrap.js"></script>
<script src="backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="backend/js/scripts.js"></script>
<script src="backend/js/jquery.slimscroll.js"></script>
<script src="backend/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="backend/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="backend/js/jquery.scrollTo.js"></script>
</body>
</html>
