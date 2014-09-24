<?
//Dynamic JS and CSS content
$this->element('scripts_for_layout');
?>



<h1>Why Use Rapid Realty?</h1>

<?
$options = array(
	'menu' => 'services'
);
echo $this->element('nav_subMenu', $options); 
?>



<div class="grid_1">&nbsp;</div>
<div class="grid_14">
	<? 
	$perRow = 2;
	$i = 1;
	foreach ($reasons as $reason=>$description) { 
	?>
		<div class="round_large orange border thick reasonDiv <? if ($i==1) { echo "first"; $i++; } elseif ($i==$perRow) { echo "last"; $i=1; } else { $i++; } ?>">
			<h3><?= $reason; ?></h3>
			<p><?= $description; ?></p>
		</div>
	<? } ?>
	<div class="clear"></div>

	
	<p><?= $this->Html->link('Find an Apartment Now', array('controller'=>'listings', 'action'=>'search')); ?></p>
	<p><?= $this->Html->link('How Do Our Fees Work?', array('controller'=>'services', 'action'=>'fees')); ?></p>

</div>
<div class="grid_1">&nbsp;</div>
<div class="clear"></div>	

