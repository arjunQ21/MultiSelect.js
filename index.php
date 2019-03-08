<?php 
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
<body>

<?php 

$ms = new MultiSelect( "ms" );
$ms->title = "Select Districts" ;
$ms->data = $districts ;
$ms->color = ['selected'=>'#f05', 'background'=>'pink'];
$ms->chosen = [ 2, 5, 'arjun'];
$ms->render() ;

$int = new MultiSelect( 'int' );
$int->title = "Select Interests: ";
$int->data = $interests ;
$int->color = ['background'=>'#E4AD4A','selected'=>'#A06B0B'] ;
$int->max = 2 ;
$int->render() ;

?>

</body>
</html>