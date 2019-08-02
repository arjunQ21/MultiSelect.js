<?php 
/*  
Sample Usage of MultiSelect.js Plugin
Written By: Arjun AdhiQari
Github Repo: https://github.com/arjunadhikari789/MultiSelect.js
Written Date: 3-8-2019
License: Free for Everyone
:)
NOTE: This Plugin requires HTML, css and js files too.
*/
require_once "MultiSelect.php" ;
$districts = array_column(json_decode(file_get_contents("districts.json"), true ), 'district');
$interests = array_column(json_decode(file_get_contents("interests.json"), true ), 'interest');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Multiselect</title>
	<link rel="stylesheet" type="text/css" href="multi-select.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<meta name = 'viewport' content="width=device-width">
	<script src='MultiSelect.js'></script>
</head>
<body >
	<style>
	body{
		font-family: Tahoma ;
		margin: auto ;
	}
		p{
			padding: 20px;
			font-size: 150%;
		}
		div.multi-select{
			margin: auto !important ;
		}
		h2, p{
			color: #666;
			padding: 10px;
		}
		h2{
			margin: 10px 0 20px 0;
		}
	</style>
<h2>Demo of "MulitSelect.js" plugin by Arjun Adhikari.<br>Github Repo: <a href='https://github.com/arjunadhikari789/MultiSelect.js'>github.com/arjunadhikari789/MultiSelect.js</a></h2>
<p>Simple Use, Has some already chosen items, and color is changed too.</p>

<?php 
$ms = new ArjunAdhiQari\MultiSelect( "ms" );
$ms->title = "Select Districts" ;
$ms->data = $districts ;
$ms->color = ['selected'=>'#f05', 'background'=>'pink'];
$ms->chosen = [ 2, 5, 'arjun'];
$ms->render() ;
?>


<p>Another Sample, has maximum limit and changed color.</p>

<?php
$int = new ArjunAdhiQari\MultiSelect( 'int' );
$int->title = "Select Interests: ";
$int->data = $interests ;
$int->color = ['background'=>'#E4AD4A','selected'=>'#A06B0B'] ;
$int->max = 2 ;
$int->render() ;

?>

</body>
</html>