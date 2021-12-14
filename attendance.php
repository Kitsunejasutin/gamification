<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
	<link rel="stylesheet" href="styles/header.css">
	<title><?php echo fetchcompanyname($connection); ?></title>
</head>
<body onload="startTime()">
<?php
    include_once 'includes/bars.php';
?>

<div class="info">
	<form autocomplete="off"" action="includes/timeclock.php" method="post">
		<fieldset>
			<br /><br />
			<br /><br />
				
			<div id="txt" align="center" style="font-size:50pt; margin-top:-50px; margin-bottom:50px;"></div>
				
			<script>
				function startTime() {
					var today = new Date();
					var h = today.getHours();
					var m = today.getMinutes();
					var s = today.getSeconds();
					m = checkTime(m);
					s = checkTime(s);
					document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
					var t = setTimeout(startTime, 500);
				}
			
				function checkTime(i) {
					if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
					return i;
				}
			</script>
			<!-- Employee ID Input -->
	  		<div align="center">
	  			<input style="font-size: 40pt; height:100px; width:400px;" name="EmployeeIDinput" type="tel" placeholder="Employee ID #" class="form-control input-md" required=""/></br>
	  			<span class="help-block">Enter ID # Above</span>
  			</div>
		
			<!-- Button -->
			<div align = "center">
				<div align="center">
					<button id='TimeIN-btn' style='width:100px; height:100px; margin:20px; font-size:16pt; <?php if ($_SESSION['status'] == "timeIn") echo "background-color:yellowgreen;" ?>' name='TimeIN-btn' class='btn btn-success' value='-IN'>Time<br />IN</button>
					<button id='TimeOUT-btn' style='width:100px; height:100px; margin:20px; font-size:16pt; <?php if ($_SESSION['status'] == "timeOut") echo "background-color:yellowgreen;" ?>' name='TimeOUT-btn' class='btn btn-danger' value='-OUT'>Time<br />OUT</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>
<?php 
	include_once 'includes/footer.php';
?>
