<?php
namespace ArjunAdhiQari ;
/*
JavaScript Plugin 
Written By: Arjun AdhiQari
Github Repo: https://github.com/arjunadhikari789/MultiSelect.js
Written Date: 3-8-2019
License: Free for Everyone
:)
NOTE: This Plugin requires HTML, css and Js files too.
*/

class MultiSelect
{
	public $title = "Multi Select Title";
	public $data = [
		'1'=>"arjun",
		'2'=>'adhikari',
		'3'=>'shyam'
	];
	public $chosen = [] ;
	public $color = [
		'background'=>'lightgreen',
		'selected'=>'green'
	];
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
		'max'=>99999,
		'min'=> 0,
		'color'=> [
				'background'=>'green',
				'selected'=>'lightgreen'
			]	
	]; 
	public function __construct($id, $data = [], $title = 'Multi Select Title', $chosen = []){
		if( ! ctype_alpha($id) ){
			throw new Exception("ID must have letters.");
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
		$arr['color'] = $this->color ;
		return $arr ;
	}
	public function render(){
		$mst = array_merge( \ArjunAdhiQari\MultiSelect::$defaultMs , $this->toArray() );
		require __DIR__."/ms_template.php" ;
	}

}