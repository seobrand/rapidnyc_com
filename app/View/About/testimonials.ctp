<?
//Dynamic JS and CSS content
$this->element('scripts_for_layout');
?>


<h1>Rapid Realty Customer Reviews</h1>


<?
$options = array(
	'menu' => 'about'
);
echo $this->element('nav_subMenu', $options); 
?>



<div class="grid_1">&nbsp;</div>
<div class="grid_14">
	<div class="testimonialRows">
	<? 
	$perRow = 2;
	$i=1;
	foreach ($testimonials as $id=>$quote) { 
	?>
		<div class="round_large orange border thick testimonial <? if ($i==1) { echo "first"; $i++; } elseif ($i==$perRow) { echo "last"; $i=1; } else { $i++; } ?>">
			<?= $this->Html->image('rapid/testimonials/'.$id.'.png', array('alt'=>'Rapid Realty reviews', 'class'=>'round_large testimonialPhoto')); ?>
			<div class="tetimonialQuote"><?= $quote; ?>"</div>
		</div>
	<? } ?>
	</div>
	<div class="clear"></div>
</div>
<div class="grid_1">&nbsp;</div>
<div class="clear"></div>




