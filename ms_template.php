<?php
echo "<pre>";

print_r($mst['chosen']);

echo "Chosen: ";
var_dump(in_array("arju", $mst['chosen']));
// var_dump(in_array("arju", [1,23,'arju']));
echo "</pre>";
?>
<div class="multi-select" data-sn = "1" id = '<?=$mst['id']?>' <?php 
	if( ! is_null($mst['max'])) echo " data-max = '".$mst['max']."'";
	if( ! is_null($mst['min'])) echo " data-min = '".$mst['min']."'";
?>>
	<div class="ms-title">
		<div class="ms-title-text">
			<span><?=$mst['title']?></span>
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
		<?php foreach($mst['data'] as $key => $value ) : ?>
			<?php
				$isChosen = 0 ;
				if(in_array($key, $mst['chosen'])){
					$isChosen = 1 ;
				}
			?>
			<div class="ms-option" data-chosen = '<?=$isChosen?>' data-value = '<?= $key ?>'>
				<div class="ms-option-text">
					<?= $value ?>
				</div>
				<div class="ms-option-icon">
					<i class="fas fa-check"></i>
				</div>
			</div>
		<?php  endforeach ?>
	</div>
</div>
<input type='hidden' name='<?=$mst['id']?>' value = ''>
<script>
	var <?=$mst['id']?> = new MultiSelect( '<?=$mst['id']?>' );
</script>