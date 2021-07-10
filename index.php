<?php

include('/var/www/html/demo_qr/libs/phpqrcode/qrlib.php'); 

function getUsernameFromEmail($email) {
	$find = '@';
	$pos = strpos($email, $find); 
	$username = substr($email, 0, $pos);   
	return $username;
}

if(isset($_POST['submit']) ) {
	$tempDir = 'temp/'; 
	$name = $_POST['name'];
	$field1 =  $_POST['field1'];
	$filename = $name;
	//getUsernameFromEmail($name);
	$body =  $_POST['msg'];
	$codeContents = 'ProductName:'.$name.';Field1='.urlencode($field1).';Message='.urlencode($body);
   
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
}
?>
<!DOCTYPE html>
<html>
	<head>
	<script src="libs/paho-mqtt.js" type="text/javascript"></script>
	<title>Quick Response (QR) Code Generator</title>
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
	<link rel="stylesheet" href="libs/style.css">
    </head>
	<body>
	

			<h3><strong>Quick Response (QR) Code Generator</strong></h3>
			<div class="input-field">
				<h3>Please Fill-out All Fields</h3>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
					<div class="form-group">
						<label>Product name</label>
						<input type="text" class="form-control" name="name" style="width:20em;" placeholder="Enter Name" value="<?php echo @$name; ?>" required autocomplete="off" />
					</div>
					<div class="form-group">
						<label>Field 1</label>
						<input type="text" class="form-control" name="field1" style="width:20em;" placeholder="Enter details" value="<?php echo @$field1; ?>" required />
					</div>
					<div class="form-group">
						<label>Message</label>
						<textarea rows="15" cols="30" type="text" class="form-control" name="msg" style="width:20em;" value="<?php echo @$body; ?>" required pattern="[a-zA-Z0-9 .]+" placeholder="Enter your message"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-danger submitBtn" style="width:20em; margin:0;" />
					</div>
				</form>
			</div>
			<?php
			if(!isset($filename)){
				$filename = "MaybeShah";
			}
			?>
			<div class="qr-field">
				<h2 style="text-align:center">QR Code Result: </h2>
				<center>
					<input id="filename" type="hidden" value="<?php echo @$filename ?>" />
					<div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
							<?php echo '<img src="temp/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
					</div>
					<a class="btn btn-default submitBtn" style="width:210px; margin:5px 0;" id="script" onclick="printBit()">Print QR Code</a>
				</center>
			</div>
			<script src="libs/jquery.js"></script>
	
	<script src="libs/script.js"></script>
	</body>

</html>