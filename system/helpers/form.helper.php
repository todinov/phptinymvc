<?php

class HForm{
	private $action;
	private $method;
	private $wrap_top;
	private $wrap_bot;
	protected $fields = array();

	public function __construct($action, $method = 'post'){
		$this->action = $action;
		$this->method = $method;
		$this->wrap_top = '<div>';
		$this->wrap_bot = '</div>';
	}

	public function setWrap($top, $bot){
		if(!empty($top) && !empty($bot)){
			$this->wrap_top = $top;
			$this->wrap_bot = $bot;
		}
	}

	public function input($name, $description, $id, $value, $class, $info){
		$this->fields[] = $description.': <div class="input"><input type="text" name="'.$name.'" value="'.$value.'" id="'.$id.'" class="'.$class.'"/></div><div class="info" id="info_'.$name.'">'.$info.'</div>';
	}
	public function password($name, $description, $id, $class, $info){
		$this->fields[] = $description.': <div class="input"><input type="password" name="'.$name.'" id="'.$id.'" class="'.$class.'"/></div><div class="info" id="info_'.$name.'">'.$info.'</div>';
	}
	public function select($name, $description, $id, $values, $selected, $info){
		$out = $description.': <div class="input"><select name="'.$name.'" id="'.$id.'">';
		foreach($values as $key => $val){
			$out .= '<option value="'.$key.'"';
			if($val == $selected) $out .= 'selected="selected"';
			$out .= '>'.$val.'</option>';
		}
		$out .= '</select></div><div class="info" id="info_'.$name.'">'.$info.'</div>';
		$this->fields[] = $out;
	}
	public function locked($description, $value, $info){
		$this->fields[] = $description.': <div class="input"><span>'.$value.'</span></div><div class="info">'.$info.'</div>';
	}
	public function upload($name, $description, $info){
		$this->fields[] = $description.': <div class="input"><input type="file" name="'.$name.'" accept="image/*" class="file"/></div><div class="info">'.$info.'</div>';
	}
	public function fetch(){
		$out = '<form action="'.BASEPATH.$this->action.'" method="'.$this->method.'">';
		foreach($this->fields as $field){
			$out .= $this->wrap_top.$field.$this->wrap_bot;
		}
		$out .= '<div id="familyHolder"></div>';
		$out .= '<div class="submitholder"><input type="submit" class="submit" value="следващо"/></div>';
		$out .= '</form>';

		return $out;
	}
}