<?php
	include('tpl/header.php');
?>

<section id="main">
	<b><h2>Добавление организации:</h2></b><br>
	Наименование:<br>
	<input type="text" id="organization_name"><br>
	<button>Добавить</button>

	<br><br><br>

	<b><h2>Добавление работника:</h2></b><br>
	Организация:<br>
	<select></select><br>
	ФИО:<br>
	<input type="text"><br>
	Должность:<br>
	<input type="text"><br><br>
	<button>Добавить</button>
</section>

<style type="text/css">
	#main {
		display: block;
		width: 250px;
		text-align: left;
	}

	select, input, button {
		width: 250px;
	}
</style>


<script>

$(function(){

    $('#organization_name').autocomplete('core/data.php?mode=sql', {
        width: 200,
        max: 5
    });

});

</script>
