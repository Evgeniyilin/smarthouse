<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="apple-touch-icon" href="style/img/apple-touch-icon.png" />

	<link rel="stylesheet" href="style/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

    <script src="style/js/highcharts.js"></script>
    <script src="style/js/modules/exporting.js"></script>
    <script src="style/js/readsensor.js"></script>
	<script src="style/js/changebox.js"></script>
	<title>Ардуино</title>
</head>
<body>
	<div class="wapper">
		<div class="header">
			<h1>Arduino Home Server</h1>
			<h2>Высокие технологии в каждый дом</h2>			
		</div>
	</div>
	<div class="sensor">
		<div id="paramBlock1">Температура: <span></span> </div>
		<div id="paramBlock2">Влажность: <span></span> </div>		
	</div>
	
	<!-- Квадратный переключатель
	<label class="switch">
		<input type="checkbox">
		<span class="slider"></span>
	</label>
	 -->
	 
	<!-- Круглый переключатель -->
	<label class="switch">
		<input type="checkbox" id="ch1p" cp1="false">
		<span class="slider round"></span>
	</label>
	

	<script type="text/javascript">
    $(function(){
		$("input[type=checkbox]").on("click", function(){
			if (! $("#ch1p").is(':checked')) {
				$.post("check_off.php");
			} else {
				$.post("check_on.php");
			}
		});      
    });
    </script>
	
	


	
	<div class="content">
		<div class="text center"><small>Умный дом на базе Arduino &copy; Евгений Ильин</small></div>
	</div>
</body>
</html>