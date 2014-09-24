<? 
//load the slider files
$options = array();
$options['cssFiles'] = array('sweetThumbnails/style.css','grassSky.css'); //i've re-included the template css file after the jquery file, so we can override any of the jquery styles that we don't like
$options['jsFiles'] = array('sweetThumbnails.js', 'http://maps.google.com/maps/api/js?sensor=false', 'googleMaps.boundsbox.js');
//Dynamic JS and CSS content
$this->element('scripts_for_layout', $options);
?>


<div class="inner-ads" style="text-align:center !important;margin-bottom:10px !important;">
        <a href="http://insr.me/rapid" target="_blank" >
        <?php echo $this->Html->image('banner_rapid.jpg'); ?>	
        </a>
        </div>
        
        <? 
//back to search results 
if ($backUrl) { echo $this->Html->tag('div',$this->Html->link('<< Back to Search',$backUrl),array('class'=>'backToSearch')); } 
?>


<h1><?=$this->Number->currency($listing['Listing']['rent']);?> - <? if ($bedrooms[$listing['Listing']['bedrooms']]!=="N/A") { echo $bedrooms[$listing['Listing']['bedrooms']]; }?> <?=$listing['ListingType']['name']; ?> in <?=$listing['Neighborhood']['name']; ?>, <?=$regions[$listing['Neighborhood']['region_id']]; ?></h1>

<hr />

<div class="viewDiv">
<?php //pr($listing);die; ?>
<div class="imageDiv grid_8">

	<!-- photo loader -->
	<div class="photoDiv">
	<div id="ps_loader" class="ps_loader"></div>
		<div id="ps_container" class="ps_container">
			<div class="ps_image_wrapper">
				<!-- First initial image -->
                <img src="<?=$listing['ListingPhoto'][0]['url'];?>" alt="" />
			</div>
			<!-- Navigation items -->
			<div class="ps_next"></div>
			<div class="ps_prev"></div>
			<!-- Dot list with thumbnail preview -->
			<div class="ps_nav_wrapper">
			<ul class="ps_nav">
				<? foreach ($listing['ListingPhoto'] as $k=>$photo) {  ?>
				<li class="<?=$k==0 ? 'selected' : ''; ?>"><a href="<?=$photo['url'];?>" rel="<?=$photo['thumbnail_url']; ?>">Photo <?=($k+1);?></a></li>
				<? } ?>
				<li class="ps_preview">
					<div class="ps_preview_wrapper">
						<!-- Thumbnail comes here -->
					</div>
					<!-- Little triangle -->
					<span></span>
				</li>
			</ul>
			</div>
	</div>
	</div> <!-- end .photoDiv -->
	
	
	<!-- lead gen -->
	 
	
	
	<!-- google map -->
	<div class="mapDiv">
	<!-- map -->	
	<div id="view_map"></div>
	<script>
	$(document).ready(function() {
		initialize('view_map','<? echo $listing['Listing']['latitude']; ?>', '<? echo $listing['Listing']['longitude']; ?>');
	});
	</script>
	</div> <!-- end .mapDiv -->
	
	
	
	<!-- agent card -->
	<div class="agentCardDiv">
	<? echo $this->element('agent_card'); ?>
	</div>
	
	
		
	<!-- lead gen -->
	<div class="searchActionDiv">
	<?= $this->Html->link('Have an Agent Contact Me', array('controller'=>'leads', 'action'=>'add','listing'=>$listing['Listing']['id']),	array('class'=>'button large leadsLink fancybox.iframe')); ?>
	</div>
	  <div class="backto_search"> 
        <?= $this->Html->link('<< BACK TO SEARCH', array('controller'=>'listings', 'action'=>'search','listing'=>$listing['search']['id']), array('class'=>' ')); ?>
        </div>
	
	
</div> <!-- end .imageDiv -->
	
				


<div class="summaryDiv grid_8">

	<!-- right hand options menu -->
	<div class="rightMenu">
		<!-- AddThis -->
		<div class="addthis_toolbox">   
		    <div class="custom_images">
		        <a class="addthis_button_facebook" addthis:title="<? echo $addThis['title']; ?>" addthis:description="<? echo $addThis['description']; ?>">
                <?=$this->Html->image('AddThis/facebook32.png', array('alt'=>'Share to Facebook', 'class'=>' ')); ?>
                
                
                
             </a>
		        <a class="addthis_button_twitter" addthis:title="<? echo $addThis['title']; ?>" addthis:description="<? echo $addThis['description']; ?>">
                 <?=$this->Html->image('AddThis/twitter32.png', array('alt'=>'Share to Twitter', 'class'=>' ')); ?>
             </a>
		        <a class="addthis_button_more" addthis:title="<? echo $addThis['title']; ?>" addthis:description="<? echo $addThis['description']; ?>">
                <?=$this->Html->image('AddThis/addthis32.png', array('alt'=>'More...', 'class'=>' ')); ?>
               </a>
		    </div>
		</div> <!-- end .addthis_toolbox -->
	</div> <!-- end .rightMenu -->
	

	<div class="viewDetailsWrapper">
	<h2>Listing Summary</h2>
	<table class="viewDetails">
	<?
	echo $this->Html->tableCells(array(
		array(array($this->Html->tag('span','Rent:',array('class'=>'heavy')), array('width'=>140)), $this->Number->currency($listing['Listing']['rent'])),
		array($this->Html->tag('span','Bedrooms:',array('class'=>'heavy')), $bedrooms[$listing['Listing']['bedrooms']]),
		array($this->Html->tag('span','Listing Type:',array('class'=>'heavy')), $listing['ListingType']['name']),
		array($this->Html->tag('span','Neighborhood:',array('class'=>'heavy')), $listing['Neighborhood']['name']),
		array($this->Html->tag('span','Available On:',array('class'=>'heavy')), $this->Time->format('F j, Y',$listing['Listing']['date_available'])),
		array($this->Html->tag('span','Fee Type:',array('class'=>'heavy')), $listing['ListingFee']['id']=="2" ? $this->Html->tag('span',$listing['ListingFee']['public_name'],array('class'=>'redText heavy')) : $listing['ListingFee']['public_name']),
		array($this->Html->tag('span','Nearby Subways:',array('class'=>'heavy')), $listing['Listing']['subways']),
		array($this->Html->tag('span','Reference ID:',array('class'=>'heavy')), $listing['Listing']['id']),
		array(array($this->Html->tag('span','Contact:',array('class'=>'heavy')), array('class'=>'last')), array($_phone . '&nbsp;&nbsp;' . $this->Html->link('(Contact)', array('controller'=>'listings','action'=>'agent_card','listing'=>$listing['Listing']['id']), array('class'=>'agentCardLink fancybox.ajax')), array('class'=>'last')))
	));
	?>
	</table>
	
	<?
	//if we don't have any search results, give option for new search
	if (!$backUrl) {
		echo $this->Html->image('grassSky/viewsearch-arrow.png',array('id'=>'viewSearchArrow', 'url'=>array('controller'=>'listings', 'action'=>'search')));
	}
	?>
	</div> <!-- end .viewDetailsWrapper -->
	
	<hr />
	
	<div class="viewDescriptionWrapper">
	<h2>Listing Description</h2>
	<? 
	//video teaser link
	if ($listing['ListingVideo']) { ?><p class="blueText"><em><a href="#listingVideo">Watch video below!</a></em></p><? } 
	?>
	<?=	nl2br($listing['Listing']['description']); //description ?>
	
	<? 
	//videos
	if ($listing['ListingVideo']) {
		foreach ($listing['ListingVideo'] as $video) {
	?>
		<div class="viewVideo" id="listingVideo">
		<?= $this->Youtube->video($video['url'], array(), array('width'=>450, 'height'=>300)); ?> 
		</div>
	<? }} ?>
	</div>

	
	<? if ($listing['Neighborhood']['description']) { ?>
	<hr />
	
	<h2 class="neighborhoodHeader"><a href="<?php if($listing['Neighborhood']['neighborhood_link']) echo $listing['Neighborhood']['neighborhood_link']; else echo 'javascript:void(0);' ;   ?>"  "<?php if($listing['Neighborhood']['neighborhood_link']) {  ?> target="_blank" <?php } ?> class="nabewise_link" >Neighborhood description by AirBnB <!--<img src="http://nabewise.com/images/widget/nabewise_corner_logo_transparent.png"/>--></a></h2>
	<div class="neighborhoodDescription"></div>
		
	<div class="nabewise_widget" style="display:none;">
	<?=$listing['Neighborhood']['description']; ?>	
	</div>
	<? } ?>


	<hr />
	<h2>Search For More Apartments</h2>
	<select onfocus="window.location='<?php echo Router::url('/',true);?>listings/search'" style="width: 250px; margin-bottom: 7px;">
		<option value="">Select Neighborhoods</option>
		<option value="">Please wait... loading... </option>
	</select>
	<select onfocus="window.location='<?php echo Router::url('/',true);?>listings/search'" style="width: 250px; margin-bottom: 7px;">
		<option value="">Select Apartment Types</option>
		<option value="">Please wait... loading... </option>
	</select>
	<input type="button" value="Search" onClick="window.location='<?php echo Router::url('/',true);?>listings/search'" />


	


</div> <!-- end .summaryDiv -->
<div class="clear"></div>


</div> <!-- end viewDiv -->




	
	

