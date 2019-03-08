<?php

class MultiSelect
{
	public $title = "Multi Select Title";
	public $data = [
		'1'=>"arjun",
		'2'=>'adhikari',
		'3'=>'shyam'
	];
	public $chosen = [] ;
	private $id = 'ms';
	public $max = NULL ;
	public $min = NULL ;
	public static $defaultMs = [
		'title'=>"Multi Select Title",
		'data'=>[
				'1'=>"arjun",
				'2'=>'adhikari',
				'3'=>'shyam'
			],
		'chosen'=>[],
		'id'=>'ms1',
		'max'=>NULL,
		'min'=>NULL	
	]; 
	public function construct($id, $data = [], $title = 'Multi Select Title', $chosen = []){
		if( ! ctype_alpha($id)){
			throw new Exception("ID must have letters");
		}
		$this->id = $id ;
		if(count($data) > 0) $this->data = $data ;
		$this->title = $title ;
		if(count($chosen) > 0) $this->chosen = $chosen ;
	}
	public function toArray(){
		$arr = [] ;
		$arr['title'] = $this->title ;
		$arr['data'] = $this->data ;
		$arr['chosen']= $this->chosen ;
		$arr['id'] = $this->id ;
		$arr['max'] = $this->max ;
		$arr['min'] = $this->min ;
		return $arr ;
	}
	public function render(){
		$mst = array_merge( Self::$defaultMs , $this->toArray() );
		require __DIR__."/ms_template.php" ;
	}

}