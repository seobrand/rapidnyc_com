<? 
$options = array();
$options['jsFiles'] = array('jquery.ui/jquery.ui.mouse.min.js','jquery.ui/jquery.ui.slider.min.js');
//Dynamic JS and CSS content
$this->element('scripts_for_layout', $options);
?>



<h1>Search Apartments</h1>


<?php
echo $this->Form->create('Listing');
?>



<div class="grid_1">&nbsp;</div>
<div class="grid_14">




<!-- Regions and Neighborhoods -->
<div id="neighborhoodDiv">
	<h2>Neighborhoods</h2>
	
	<!-- Regions -->
	<h3>Which regions do you want to search?</h3>
	<div class="x6">
	<? foreach ($regions_chunked as $chunk) { ?>
		<div class="col">
		<? echo $this->Form->select('region_id',$chunk,array('multiple'=>'checkbox','hiddenField'=>false)); ?>
		</div>	
	<? } ?>
	<div class="clear"></div> 
	</div> <!-- end .x6 -->
	
	
	<!-- Neighborhoods -->
	<? 
	foreach ($regions as $region_id=>$region_name) { 
	?>
	<div class="neighborhood_list_div round_large gray border pad10" id="neighborhoods_<? echo $region_id; ?>">
	<h3><? echo $region_name; ?></h3>
	<div class="x4" >
	<?
	foreach ($neighborhoods_by_region_chunked[$region_id] as $chunk) {
	?>
		<div class="col">
		<? echo $this->Form->select('neighborhood_id',$chunk,array('multiple'=>'checkbox','hiddenField'=>false)); ?>
		</div>	
	<? } ?>
	<div class="clear"></div>
	</div> <!-- end .x4 -->
	</div> <!-- end .neighborhood_list_div -->
	<? } ?>
</div> <!-- end #neighborhoodDiv -->







<!-- rent -->
<hr />
<div id="rentDiv">
<h2>Rent Range</h2>
<h3>Adjust to your rent budget</h3>

<!-- mobile backup for slider -->
<? // backup rent method, for mobile devices that can't handle the slider (must go before the slider, so the slider's rent_min and rent_max fields can override these, if the slider is present ?>
<div id="rentSliderWrap_mobile">
<? $options = array(); $i=0; while ($i<12000) { $options[$i]="$".$i; $i=$i+250; } ?>
<?= $this->Form->select('rent_min', $options, array('id'=>'ListingRentMin_mobile')); ?> to <?= $this->Form->select('rent_max', $options, array('id'=>'ListingRentMax_mobile')); ?>
</div>

<!-- slider -->
<div id="rentSliderWrap">
<input type="text" id="rentSliderAmount" class="slider_input" /><div id="rentSlider"></div>
<?
echo $this->Form->input('rent_min',array("hidden"=>true,"label"=>false,"id"=>"ListingRentMin"));
echo $this->Form->input('rent_max',array("hidden"=>true,"label"=>false,"id"=>"ListingRentMax")); 
?>
</div>

</div> <!-- end #rentDiv -->






<!-- features -->
<hr />
<div id="featuresDiv">

	<h2>Bedrooms & Building Types</h2>

	<div class="x4">
	
		<!-- Bedrooms -->
		<div class="col">
			<h3>Bedrooms</h3>
			<? echo $this->Form->select('bedrooms',$bedrooms,array('multiple'=>'checkbox','hiddenField'=>false)); ?>
		</div>
	
		<!-- Residential Types -->
		<div class="col">
			<h3>Residential (optional)</h3>
			<? echo $this->Form->select('listing_type_id',$listing_types_residential,array('multiple'=>'checkbox','hiddenField'=>false)); ?>
		</div>

		<!-- Commercial Types -->		
		<div class="col">
			<h3>Commercial (optional)</h3>
			<? echo $this->Form->select('listing_type_id',$listing_types_commercial,array('multiple'=>'checkbox','hiddenField'=>false)); ?>
		</div>
		<div class="clear"></div>
		
	</div> <!-- end .x4 -->
	
</div> <!-- end #featuresDiv -->



<!-- listing id -->
<div id="idDiv">
	<hr />

	<?= $this->Form->input('listing_id',array('type'=>'text','label'=>'Reference ID: ', 'class'=>'searchId')); ?>
	
</div> <!-- end #featuresDiv -->








<? /* DISABLE AMENTIES ON THIS SEARCH 
<hr />
<div id="amenityDiv">
	<h2>Amenities</h2>
	<?
echo $this->Form->input('ListingAmenity.listing_amenity_id',array('multiple'=>'checkbox','hiddenField'=>false,'label'=>false));
?>
</div>
*/
?>

<p>
<?
echo $this->Form->end(array(
	'label'=>'Search Apartments',
	'class'=>'prettyButton large'
));
?>
</p>


<p><?=$this->Html->Link('Start New Search',array('controller'=>'listings','action'=>'search','new'), array('rel'=>'nofollow')); ?></p>

</div> <!-- end .grid_14 -->
<div class="grid_1">&nbsp;</div>
<div class="clear"></div>




