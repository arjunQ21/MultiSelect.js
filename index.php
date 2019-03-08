<?php 
require_once "MultiSelect.php" ;
$districts = json_decode(file_get_contents("districts.json"), true );
$dis = array_column($districts, "district");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Multiselect</title>
	<link rel="stylesheet" type="text/css" href="multi-select.css">
	<link rel='stylesheet' href='/gyansarowar/fonts/fontawesome/css/all.min.css'>
	<meta name = 'viewport' content="width=device-width">
	<script src='MultiSelect.js'></script>
</head>
<body>

<?php 

$ms = new MultiSelect( "ms" );
$ms->data = [
	'1'=>'arjun',
	'arj'=>'adhikari'
];
$ms->chosen = [1, 2, 5, 0];
print_r($ms->chosen);
var_dump(in_array('arj', $ms->chosen));
$ms->render() ;

?>


<!-- <div class="multi-select" data-sn = "1" id = '1se'>
	<div class="ms-title">
		<div class="ms-title-text">
			<span>Choose Districts</span>
		</div>
		<div class="ms-title-right">
			<div class="ms-select-all">
				<i class="fas fa-check"></i>
			</div>
			<div class="ms-reset">
				<i class="fas fa-redo"></i>
			</div>
			
		</div>
	</div>
	<div class="ms-items">
		 <?php $i = 1 ; ?> 
		<?php foreach($dis as $ds) : ?>
			<div class="ms-option" data-chosen = '0' data-value = '<?= $i ?>'>
				<div class="ms-option-text">
					<?= $ds ?>
				</div>
				<div class="ms-option-icon">
					<i class="fas fa-check"></i>
				</div>
			</div>
			 <?php $i ++ ?> 
		<?php  endforeach ?>
	</div>
</div> -->

<script type="text/javascript" src = 'jquery-3.2.1.js'></script>

</body>
</html>