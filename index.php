<html>
<head>
	<title>Платформа "Сирена"</title>

	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link href="css/jquery-ui.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link href='css/comfortaa.font.css' rel='stylesheet' type='text/css'>
	

	<script src="js/external/jquery/jquery.js"></script>
	<script src="js/jquery.datetimepicker.js"></script>
	<script src="js/jquery-ui.min.js"></script>

</head>

<body>


<center>

	<section id="content">

		<div class="header">
			<div>Сирена <span>платформа</span></div>
			
			<a href="" class="tryme">
				<a class="a1">)</a>
				<a class="a2">)</a>
				<a class="a3">)</a>
			</a>

			<section>
				
				<div>Справка-доклад по ЦСО</div>
				<div>Журнал ЦСО</div>
				<div class="selected">Протоколы</div>

			</section>
		</div>


	<section id="subpanel">
		<h1>Справка-доклад</h1>
		<h2>по централизованному сервисному обслуживанию</h2>

		<div id="subpanel_menu">
			<button>Список документов</button>
			|
			<button id="csoReportCreateDoc">Создать документ</button>
		</div>
	</section>


	<br><br><br><br><br>

	<section id="mainContent">
		<?php
			include('core/cso.report.php')
		?>
	</section>

</center>




</body>

<script type="text/javascript">
$(function() {



    $("#csoReportCreateDoc").click(function() {
    	$("#mainContent").load("core/cso.report.php");
    })


});


    
</script>

</html>