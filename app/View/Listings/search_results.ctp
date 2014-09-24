<? 
//Dynamic JS and CSS content
$this->element('scripts_for_layout');
?>

<div class="inner-ads" style="text-align:center !important;margin-bottom:10px !important;">
        <a href="http://insr.me/rapid" target="_blank" >
        <?php echo $this->Html->image('banner_rapid.jpg'); ?>	
        </a>
        </div>

<h1>Search Results</h1>


<div class="grid_1">&nbsp;</div>
<div class="grid_14">


<!-- sort links -->
<div class="sortDiv">
<select class="sortResults">
	<option value="">Sort by…</option>
	<option value="fee_type">Sort by… Fee type</option>
	<option value="rent_asc">Sort by… Rent (low to high)</option>
	<option value="rent_desc">Sort by… Rent (high to low)</option>
	<option value="neighborhood">Sort by… Neighborhood</option>
	<option value="bedrooms">Sort by… Bedrooms</option>
	<option value="listing_type">Sort by… Type of listing</option>
</select>
<?
//get the links that will power the selector
$activeSort = $this->Paginator->sortKey();
$activeSortDir = $this->Paginator->sortDir();
echo $this->Paginator->sort('ListingFee.rank','Fee type',array('class'=>'sortResultsLink fee_type' . ($activeSort=='ListingFee.rank' ? ' active' : '')));
echo $this->Paginator->sort('address_street','Address',array('class'=>'sortResultsLink address_street' . ($activeSort=='address_street' ? ' active' : '')));
echo $this->Paginator->sort('rent','Rent (low to high)',array('class'=>'sortResultsLink rent_asc' . ($activeSort=='rent' && $activeSortDir=='asc' ? ' active' : ''), 'direction'=>'asc'));
echo $this->Paginator->sort('rent','Rent (high to low)',array('class'=>'sortResultsLink rent_desc' . ($activeSort=='rent' && $activeSortDir=='desc' ? ' active' : ''), 'direction'=>'desc'));
echo $this->Paginator->sort('Neighborhood.name','Neighborhood',array('class'=>'sortResultsLink neighborhood' . ($activeSort=='Neighborhood.name' ? ' active' : '')));
echo $this->Paginator->sort('bedrooms','Bedrooms',array('class'=>'sortResultsLink bedrooms' . ($activeSort=='bedrooms' ? ' active' : '')));
echo $this->Paginator->sort('ListingType.name','Type of listing',array('class'=>'sortResultsLink listing_type' . ($activeSort=='ListingType.name' ? ' active' : '')));
?>


<?=$this->Html->link('Change Search Criteria',array('controller'=>'listings', 'action'=>'search'),array('class'=>'newSearch'));?>
</div>




<!-- pages -->
<div class="pageDiv round_small yellow">

	<div class="resultsNumbers">
	<?
	//results count
	echo $this->Paginator->counter('Showing {:start}-{:end} of {:count} results');
	?>
	</div>

	<div class="pageNumbers">
	<? 
	//pages of data
	$numPg = $this->Paginator->counter('{:pages}');
	if ($numPg>1) { 
		echo "Pages: " . $this->Paginator->numbers(array('first' => '1 …','last' => '… '.$numPg));
	}
	?>
	</div>
</div>


<!-- results rows -->
<div class="resultsDiv">


<? 
if ($listings[0]['Listing']) { 
	foreach ($listings as $listing) { ?>

<div class="resultRow round_large gray border">

	<?= 
	$this->Html->image(
		$listing['ListingPhoto'][0]['thumbnail_url'], 
		array(
			'class'=>'resultThumb',
			'onError' => "this.onerror=null;this.src='/img/rapid/no-photo_web.png';",
			'url'=>array('controller'=>'listings','action'=>'view',$listing['Listing']['id'])
		)
	);
	?>
		
	<h3>
	<?= 
	$this->Html->link(
		$this->Number->currency($listing['Listing']['rent']) . " - " . $bedrooms[$listing['Listing']['bedrooms']] . " " . $listing['ListingType']['name'] . " in " . $listing['Neighborhood']['name'] . ", " . $regions[$listing['Neighborhood']['region_id']],
		array('controller'=>'listings','action'=>'view',$listing['Listing']['id'])
	);
	?>
	</h3>
	
	<div class="description">
	<?
	echo $this->Text->truncate(
	    str_replace(array("<br>","<br />"," - ","- "),array(" "," ",", ",""),$listing['Listing']['description']),
	    180,
	    array(
	        'ending' => '...',
	        'exact' => false
	    )
	);
	?>
	</div>
	
	<?= $listing['ListingFee']['id']=="2" ? $this->Html->image('rapid/no-fee.png',array('alt'=>'No Broker Fee', 'class'=>'no_fee_seal')) : ""; ?>
	
	<div class="actions">
	<?=
	$this->Html->link(
		'More Information',
		array('controller'=>'listings','action'=>'view',$listing['Listing']['id']),
		array('class'=>'button tiny soft')
	);
	?> 
	<?=
	$this->Html->link(
		'Contact Information',
		array('controller'=>'listings','action'=>'agent_card','listing'=>$listing['Listing']['id']),
		array('class'=>'button tiny soft agentCardLink fancybox.ajax')
	);
	?>
	<?=
	$this->Html->link(
		'Make an Appointment',
		array('controller'=>'leads','action'=>'add','listing'=>$listing['Listing']['id']),
		array('class'=>'button tiny soft leadsLink fancybox.iframe')
	);
	?>
	</div>
	
</div>
<? }

//no results?
} else { ?>
<?= $this->Html->link('No Results. Change Search Criteria', array('controller'=>'listings', 'action'=>'search'), array('class'=>'button large noResults')); ?>
<? } ?>



<!-- pages -->
<div class="pageDiv round_small yellow">

	<div class="resultsNumbers">
	<?
	//results count
	echo $this->Paginator->counter('Showing {:start}-{:end} of {:count} results');
	?>
	</div>

	<div class="pageNumbers">
	<? 
	//pages of data
	$numPg = $this->Paginator->counter('{:pages}');
	if ($numPg>1) {
		echo "Pages: " . $this->Paginator->numbers(array('first' => '1 …','last' => '… '.$numPg));
	}
	?>
	</div>
</div>





</div><!-- end .grid_14 -->
<div class="grid_1">&nbsp;</div>
