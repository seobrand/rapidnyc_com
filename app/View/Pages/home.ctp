<? 
//Dynamic JS and CSS content
//load the jquery accordion files
$options = array();
$options['cssFiles'] = array('bigCheckboxes/bigCheckboxes.css');
$options['jsFiles'] = array('bigCheckboxes','jquery.ui/jquery.ui.tabs.min.js');
$this->element('scripts_for_layout',$options);
?>


<h1>Search New York Apartments</h1>	



<?php
echo $this->Form->create('Listing');
?>


<div id="homeSearch">

<?=$this->Html->image('grassSky/homesearch-arrow.png',array('id'=>'homesearchArrow', 'alt'=>'New York Apartments', 'url'=>array('controller'=>'listings', 'action'=>'search'))); ?>	

<div id="homeSearchError" class="round_large red border"></div>

<div id="homeSearchTabs">

	<!-- navigation -->
    
	<ul class="nav" >
		<li><a href="#tab1">Region</a></li>
		<li><a href="#tab2">Neighborhood</a></li>
		<li><a href="#tab3">Features</a></li>
		<li><a href="#tab4">Results</a></li>
	</ul>

	<!-- tab1 -->
	<div id="tab1" class="search_tab">
       <div class="tab-inner">
			
		<?=$this->Html->image('rapid/map-boroughs.png', array('usemap'=>'#boroughMap','id'=>'boroughMapImg')); ?>
		<map name="boroughMap" id="boroughMap">
			<!-- bronx -->
			<area shape="poly" coords="237,5,333,37,324,62,331,93,315,76,306,84,304,92,313,116,283,125,263,118,263,130,243,120,225,137,215,109,229,83,233,64,223,56" href="#5" alt="bx">
			<!-- brooklyn -->
			<area shape="poly" coords="199,197,194,216,184,224,165,236,150,243,155,265,134,293,136,316,161,330,169,339,150,349,156,354,184,355,212,352,239,340,249,346,256,333,246,308,265,284,274,264,260,239,240,242" href="#1" alt="bk">
			<!-- long island -->
			<area shape="poly" coords="397,71,369,61,359,87,384,95,382,121,358,97,341,102,345,136,346,149,360,169,368,185,368,254,360,273,358,333,353,350,397,350" href="#7" alt="li">
			<!-- manhattan -->
			<area shape="poly" coords="220,57,202,104,189,120,163,170,158,198,154,231,173,219,183,218,189,201,198,166,222,140,212,110,218,92,226,75,229,67" href="#2" alt="ma">
			<!-- new jersey -->
			<area shape="poly" coords="2,361,11,353,13,322,16,293,32,278,55,268,65,256,55,249,73,238,88,203,105,179,112,181,95,208,86,239,65,266,58,276,68,284,80,277,92,280,101,271,101,263,113,263,104,253,121,233,132,232,149,198,148,169,157,147,189,99,187,85,208,56,222,3,-9,2" href="#4" alt="nj">
			<!-- queens -->
			<area shape="poly" coords="234,139,197,190,227,225,242,240,263,238,274,254,280,266,269,289,293,282,326,297,338,301,331,317,218,368,216,380,230,379,265,360,355,331,357,276,368,238,367,186,342,151,323,128,285,141,277,163,260,156" href="#3" alt="qu"> 
			<!-- staten island -->
			<area shape="poly" coords="49,398,70,390,131,327,113,310,117,287,109,279,57,291,35,285,21,297,17,336,20,348,14,360,3,371,2,396" href="#8" alt="si"> 
			<!-- westchester -->
			<area shape="poly" coords="238,4,335,35,359,4" href="#6" alt="wc">
		</map>
		
<!--		<div id="homeSearchAccordion"> -->

		<div class="region_div">
		<h2><a href="#" class="tab1_link">Choose Regions</a></h2>
		<div>
			<div class="region_list">
			
				<? echo $this->Form->select('region_id',$regions,array('multiple'=>'checkbox', 'hiddenField'=>false, 'wrap'=>'li', 'class'=>'bigCheckbox regionCheckbox')); ?>
			
			</div>
			<a href="#tab2" class="button small tabLink" id="regionContinueButton">Continue &gt;&gt;</a>
		</div> 
		</div> </div>
	</div> <!-- end tab1 -->
	
	
	
	
	<!-- tab2 -->
	<div id="tab2" class="search_tab">
    <div class="tab-inner">
    
   		<a href="#tab3" class="button small tabLink topRight" >Continue &gt;&gt;</a>
    	<h2><a href="#" class="tab2_link">Select Neighborhoods</a></h2>
	    <div id="neighborhoodDiv" class="x3">
			<? foreach ($regions as $region_id=>$region) { ?>
			<div id="neighborhoods_<? echo $region_id; ?>" class="neighborhood_list_div">
		    <h3><? echo $region; ?></h3>		    
		    <?
			foreach ($neighborhoods_by_region_chunked[$region_id] as $chunk) {
			?>
				<div class="col neighborhood_list">
				<? echo $this->Form->select('neighborhood_id',$chunk,array('multiple'=>'checkbox','hiddenField'=>false)); ?>
				</div>	
			<? } ?>
    	    <div class="clear"></div>
		    </div>
		    <? } ?>
	    </div>
	    <!-- empty message div -->
	    <div id="neighborhoodEmptyDiv">
			<h3>Region Missing</h3>
			<p>Select a region, before selecting neighborhoods.</p>
			<p><a href="#tab1" class="button small tabLink">&lt;&lt; Go Back</a></p>
		</div>
        
        </div>
	</div> <!-- end tab2 -->
	
	
	
	
	<!-- tab3 -->
	<div id="tab3" class="search_tab">
		
        <div class="tab-inner">
		<h2>Bedrooms & Building Types</h2>
				
		<div class="x3" id="featureDiv">
		
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
			
		</div> <!-- end .x3 -->
        <p><a href="#tab4" class="button small tabLink">Continue &gt;&gt;</a></p>
		</div>
		
        <div class="inner-ads">
        <a href="http://insr.me/rapid" target="_blank" >
        <?php echo $this->Html->image('banner_rapid.jpg'); ?>	
        </a>
        </div>
	</div> <!-- end tab3 -->
	
	
	
	
	
	<!-- tab4 -->
	<div id="tab4" class="search_tab">
    <div class="tab-inner">
	    <h2><a href="#" class="tab4_link">Run Search</a></h2>
		<p>We're ready to find your next apartment. Just use this button to get started:</p>
		<p><input class="prettyButton large" type="submit" value="Search Now!"></p>
        </div>
        <div class="inner-ads">
        <a href="http://insr.me/rapid" target="_blank" >
        <?php echo $this->Html->image('banner_rapid.jpg'); ?>	
        </a>
        </div>
	</div> <!-- end tab4 -->


</div> <!-- end tabs -->
</div><!-- end homeSearch -->
<div class="clear"></div>


<? echo $this->Form->end(); ?>
        
