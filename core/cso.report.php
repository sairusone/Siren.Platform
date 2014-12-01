<section>
		<table id="tableChanged">
			<tr style="text-align: left">

				<td>
					<b>Организация:</b><br><br>
					<select id="workCompany">
						<option>ООО "Александр"</option>
						<option>Экострой</option>
						<option>Титул-Эксперт</option>
						<option>212 УНР</option>
						<option>26 ЦНИИ</option>
						<option>Славянка</option>
						<option>ЗАО "Центр-Инвест"</option>
					</select><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<b>Место работ:</b><br><br>
					<select id="workPlaceBuildName">
						<option></option>
						<option>Сооружения:</option>
						<option>Учебные классы:</option>
						<option>Блоки:</option>
					</select><br>
					<input type="text" id="workPlaceBuildValue"/>

					<br>

					<select id="workPlaceEquipName">
						<option></option>
						<option>Вентагрегаты:</option>
						<option>Гермоклапаны:</option>
						<option>Насосные агрегаты:</option>
						<option>Системы автоматики:</option>
						<option>Баллоны:</option>
					</select><br>
					<input type="text" id="workPlaceEquipValue"/>
					<br><br>
				</td>
			</tr>
			<tr>
				<td>
					<b>Вид работ:</b><br><br>

					<input type="text" id="workType" /><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<b>Состав бригады:</b><br><br>
					
					<input type="text" id="workPeople" />
					<br><br>
					<div id="workPeopleList"></div><br>
				</td>
			</tr>
			<tr>
				<td>
					<b>Время работы:</b><br><br>

					<select id="time_left_first" style="width: 40px;">
						<option></option>
						<?php
							for ($i=0; $i < 24; $i++) { 
								if (strlen($i) == 1) {
									echo "<option>0$i</option>";
								} else {
									echo "<option>$i</option>";
								}
							}
						?>
					</select>
					:
					<select id="time_left_last" style="width: 40px;">
						<option></option>
						<?php
							for ($i=0; $i < 60; $i++) { 
								if ($i % 5 == 0) {
									if (strlen($i) == 1) {
										echo "<option>0$i</option>";
									} else {
										echo "<option>$i</option>";
									}
								}
								
							}
						?>
					</select>
					-
					<select id="time_right_first" style="width: 40px;">
						<option></option>
						<?php
							for ($i=23; $i >= 0; $i--) { 
								if (strlen($i) == 1) {
									echo "<option>0$i</option>";
								} else {
									echo "<option>$i</option>";
								}
							}
						?>
					</select>
					:
					<select id="time_right_last" style="width: 40px;">
						<option></option>
						<?php
							for ($i=55; $i >= 0; $i--) { 
								if ($i % 5 == 0) {
									if (strlen($i) == 1) {
										echo "<option>0$i</option>";
									} else {
										echo "<option>$i</option>";
									}
								}
								
							}
						?>
					</select>
				</td>
			</tr>
		</table>

		<br><br>

		<button id="addWork" style="width: 250px">Добавить работу</button><br>
		<button id="clearWork" style="width: 250px">Очистить данные</button>

	</section>

	<hr>
	<br><br>
	<section id="finallyDoc">
		<table style="color: black;" id="tableFinally">
			<tr>
				<th width="25" style="background: gray; color: white;">№ п/п</th>
				<th width="125" style="background: gray; color: white;">Организация</th>
				<th width="185" style="background: gray; color: white;">Место работ</th>
				<th width="185" style="background: gray; color: white;">Вид работ</th>
				<th width="205" style="background: gray; color: white;">Состав бригады</th>
				<th width="105" style="background: gray; color: white;">Время работы</th>
			</tr>
		</table>

		
	</section>
	<div class="menu_works">
			<a href="#" id="tableClean">Очистить таблицу</a> |
			<a href="#" id="tableExport">Экспорт в Excel</a>
		</div>
</section>



<script type="text/javascript">
$(function() {

	var globalWorksCount = 0;

	var arrayWorks = [
		"Текущий ремонт",
		"Техническое обслуживание",
		"Диагностика",
		"Инвентаризация",
		"Пневмоиспытания",
		"Пневмоиспытания баллонов",
		"Аварийно-восстановительные работы",
		"Аварийно-восстановительные работы, замена подшипника",
		"Аварийно-восстановительные работы, замена электродвигателя",
		"Контроль работ",
		"Ремонтно-восстановительные работы"
	];


	var arrayPeoples = [

		<?php
			$_people_list = file("people_list/alexander.list.txt");

			for ($i=0; $i < count($_people_list); $i++) { 
				echo '"' . trim($_people_list[$i]) . '",';
			}
		?>
	]

	$("#workType").autocomplete({
		source: arrayWorks
	})

	$("#workPeople").autocomplete({
		source: arrayPeoples
	})

	function peopleAdd() {
		$("#workPeopleList").append( $("#workPeople").val() + "<br>" );
		$("#workPeople").val("");
	}


	$('#menu_bottom').followTo(125);


	$("#tableClean").click(function() {
		$("#tableFinally").html('<tr><th width="25" style="background: gray; color: white;">№ п/п</th><th width="125" style="background: gray; color: white;">Организация</th><th width="185" style="background: gray; color: white;">Место работ</th><th width="185" style="background: gray; color: white;">Вид работ</th><th width="205" style="background: gray; color: white;">Состав бригады</th><th width="105" style="background: gray; color: white;">Время работы</th></tr>')
	})


	$('#tableExport').click(function(){
        var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#finallyDoc').html()) 
        location.href=url
        return false
    })

    $("#workPeople").keyup(function(event) {

		if(event.keyCode==13 && $("#workPeople").val() != "") {
			peopleAdd();
		}

	});

    $("#csoReportCreateDoc").click(function() {
    	$("#mainContent").load("core/cso.report.php");
    })


	$("#addWork").click(function() {
		var workCompany				= $("#workCompany").val();

		var workPlaceBuildName		= $("#workPlaceBuildName").val();
		var workPlaceBuildValue		= $("#workPlaceBuildValue").val();
		var workPlaceEquipName		= $("#workPlaceEquipName").val();
		var workPlaceEquipValue		= $("#workPlaceEquipValue").val();

		var workType				= $("#workType").val();

		var workPeoples 			= $("#workPeopleList").html();

		var workTimeLeftFirst		= $("#time_left_first").val();
		var workTimeLeftLast		= $("#time_left_last").val();
		var workTimeRightFirst		= $("#time_right_first").val();
		var workTimeRightLast		= $("#time_right_last").val();


		$("#workCompany").val("ООО \"Александр\"");
		
		$("#workPlaceBuildName").val("");
		$("#workPlaceBuildValue").val("");
		$("#workPlaceEquipName").val("");
		$("#workPlaceEquipValue").val("");

		$("#workType").val("");

		$("#workPeopleList").html("");

		$("#time_left_first").val("");
		$("#time_left_last").val("");
		$("#time_right_first").val("");
		$("#time_right_last").val("");

		globalWorksCount++;

		var workStr = "";

		workStr += '<tr>';

		workStr += '<td>' + globalWorksCount + '</td>';
		workStr += '<td>' + workCompany + '</td>';

		workStr += '<td>';
		if (workPlaceBuildName != "" || workPlaceBuildValue != "")
		{
			workStr += workPlaceBuildName + " " + workPlaceBuildValue + '<br>';
		}

		if (workPlaceEquipName != "" || workPlaceEquipValue != "")
		{
			workStr += workPlaceEquipName + " " + workPlaceEquipValue;
		}
		workStr += '</td>';

		workStr += '<td>' + workType + '</td>';

		workStr += '<td>' + workPeoples + '</td>';

		workStr += '<td>';
		if (workTimeLeftFirst != "" && workTimeLeftLast != "")
		{
			workStr += workTimeLeftFirst + ":" + workTimeLeftLast + ' - ';
			workStr += workTimeRightFirst + ":" + workTimeRightLast;
		}
		workStr += '</td>';

		$("#tableFinally").append(workStr);

		$("#workCompany").focus();

	})

	$("#tableChanged input").on('keyup',function() {
		var thisID = $(this).attr('id');

		if ( thisID != 'workPeople')
		{

			if ( localStorage.getItem(thisID) == null )
			{
				localStorage.setItem(thisID, $(this).val());
			}
			else
			{
				localStorage[thisID] = $(this).val();
			}
		}

	});

	$("#tableChanged select").on('change',function() {
		var thisID = $(this).attr('id');

		if ( localStorage.getItem(thisID) == null )
		{
			localStorage.setItem(thisID, $(this).val());
		}
		else
		{
			localStorage[thisID] = $(this).val();
		}

	});

	$("#tableChanged input#workPeople").on('keyup',function(e) {
		var thisID = $(this).attr('id');

		if ( e.keyCode == 13 )
		{
			if ( localStorage.getItem(thisID) == null )
			{
				localStorage.setItem(thisID, $("#workPeopleList").html());
			}
			else
			{
				localStorage[thisID] = $("#workPeopleList").html();
			}
		};
		/*
		
		*/
	});


	$("#clearWork").click(function() {
		//localStorage.clear();

		if (  localStorage.getItem('workCompany') != null )
			localStorage.removeItem('workCompany')			= null;

		if (  localStorage.getItem('workPlaceBuildName') != null )
			localStorage.removeItem('workPlaceBuildName')	= null;
		if (  localStorage.getItem('workPlaceBuildValue') != null )
			localStorage.removeItem('workPlaceBuildValue')	= null;
		if (  localStorage.getItem('workPlaceEquipName') != null )
			localStorage.removeItem('workPlaceEquipName')	= null;
		if (  localStorage.getItem('workPlaceEquipValue') != null )
			localStorage.removeItem('workPlaceEquipValue')	= null;

		if (  localStorage.getItem('workType') != null )
			localStorage.removeItem('workType')			= null;

		if (  localStorage.getItem('workPeople') != null )
			localStorage.removeItem('workPeople')			= null;

		if (  localStorage.getItem('time_left_first') != null )
			localStorage.removeItem('time_left_first')		= null;
		if (  localStorage.getItem('time_left_last') != null )
			localStorage.removeItem('time_left_last')		= null;
		if (  localStorage.getItem('time_right_first') != null )
			localStorage.removeItem('time_right_first')	= null;
		if (  localStorage.getItem('time_right_last') != null )
			localStorage.removeItem('time_right_last')		= null;

		$("#workCompany").val("ООО \"Александр\"");
		
		$("#workPlaceBuildName").val("");
		$("#workPlaceBuildValue").val("");
		$("#workPlaceEquipName").val("");
		$("#workPlaceEquipValue").val("");

		$("#workType").val("");

		$("#workPeopleList").html("");

		$("#time_left_first").val("");
		$("#time_left_last").val("");
		$("#time_right_first").val("");
		$("#time_right_last").val("");
	})
});

document.ready = function() {
	var workCompanyStorage			= localStorage.getItem('workCompany');

	var workPlaceBuildNameStorage	= localStorage.getItem('workPlaceBuildName');
	var workPlaceBuildValueStorage	= localStorage.getItem('workPlaceBuildValue');
	var workPlaceEquipNameStorage	= localStorage.getItem('workPlaceEquipName');
	var workPlaceEquipValueStorage	= localStorage.getItem('workPlaceEquipValue');

	var workTypeStorage				= localStorage.getItem('workType');

	var workPeopleStorage			= localStorage.getItem('workPeople');

	var time_left_firstStorage		= localStorage.getItem('time_left_first');
	var time_left_lastStorage		= localStorage.getItem('time_left_last');
	var time_right_firstStorage		= localStorage.getItem('time_right_first');
	var time_right_lastStorage		= localStorage.getItem('time_right_last');



	if ( workCompanyStorage != null )
	{
		$("#workCompany").val(workCompanyStorage).focus();
	};

	if ( workPlaceBuildNameStorage != null )
	{
		$("#workPlaceBuildName").val(workPlaceBuildNameStorage);
	};
	if ( workPlaceBuildValueStorage != null )
	{
		$("#workPlaceBuildValue").val(workPlaceBuildValueStorage);
	};
	if ( workPlaceEquipNameStorage != null )
	{
		$("#workPlaceEquipName").val(workPlaceEquipNameStorage);
	};
	if ( workPlaceEquipValueStorage != null )
	{
		$("#workPlaceEquipValue").val(workPlaceEquipValueStorage);
	};

	if ( workTypeStorage != null )
	{
		$("#workType").val(workTypeStorage);
	};

	if ( workPeopleStorage != null )
	{
		$("#workPeopleList").html(workPeopleStorage);
	};


	if ( time_left_firstStorage != null )
	{
		$("#time_left_first").val(time_left_firstStorage);
	};
	if ( time_left_lastStorage != null )
	{
		$("#time_left_last").val(time_left_lastStorage);
	};
	if ( time_right_firstStorage != null )
	{
		$("#time_right_first").val(time_right_firstStorage);
	};
	if ( time_right_lastStorage != null )
	{
		$("#time_right_last").val(time_right_lastStorage);
	};



		
};


    

$.fn.followTo = function (pos) {
    var $this = this,
        $window = $(window);

    $window.scroll(function (e) {

        if ($window.scrollTop() > pos) {
            $this.css({
                position: 'fixed',
                top: '20px',
                'margin-left': '-144px'
            });
        } else {
        	 $this.css({
                position: 'absolute',
                top: '150px',
                'margin-left': '0px'
         	});
        }
    });
};

</script>