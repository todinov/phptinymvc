<?php

function forminput($name, $value, $id, $class){
	echo '<input type="text" name="'.$name.'" value="'.$value.'" id="'.$id.'" class="'.$class.'"/>';
}

function formpassword($name, $id, $class){
	echo '<input type="password" name="'.$name.'" id="'.$id.'" class="'.$class.'"/>';
}

function formselect($name, $values, $selected, $id, $class){
	$out = '<select name="'.$name.'" id="'.$id.'">';
	foreach($values as $key => $val){
		$out .= '<option value="'.$key.'"';
		if($val == $selected) $out .= 'selected="selected"';
		$out .= '>'.$val.'</option>';
	}
	$out .= '</select>';
	echo $out;
}