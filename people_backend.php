<?php

$_people_list = file("people_list/alexander.list.txt");


			for ($i=0; $i < count($_people_list); $i++) { 
				echo trim($_people_list[$i]) . 'rn';
			}

?>