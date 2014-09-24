<?php
	$options = array();
	$options['jsFiles'] = array('jquery.ui/jquery.ui.mouse.min.js','jquery.ui/jquery.ui.slider.min.js');
	//Dynamic JS and CSS content
	$this->element('scripts_for_layout', $options);
?>

<!--start about_content_left -->
      <div class="search_heading"><span>SEARCH <strong>RAPID</strong> TO rent</span></div>
      
		<?php echo $this->Form->create('Listing'); ?>
      <div id="about_indent_wrap"> 
        <!--start about_indent_wrap -->
        <div id="search_wrapper" class="search_rent">
          <div id="neighborhoodDiv" class="search_text_collm">
            <div class="about_text_title">NEIGHBORHOODS</div>
            <div class="search_title">Which regions do you want to search?</div>
            <div class="neighbor_box clearfix">
				<?php  foreach ($regions_chunked as $chunk) { ?>
				<ul>
				<li>
					<?php echo $this->Form->select('region_id',$chunk,array('multiple'=>'checkbox','hiddenField'=>false, 'div' => false)); ?>
				</li>
				</ul>
				<?php } ?>
            </div>
             <!-- Neighborhoods -->
			<?php foreach ($regions as $region_id=>$region_name) { ?>
			<div class="neighborhood_list_div round_large gray border pad10" id="neighborhoods_<?php echo $region_id; ?>">
				<h3><?php echo $region_name; ?></h3>
				<div class="x4" >
				<?php foreach ($neighborhoods_by_region_chunked[$region_id] as $chunk) { ?>
				<div class="col">
					<?php echo $this->Form->select('neighborhood_id',$chunk,array('multiple'=>'checkbox','hiddenField'=>false)); ?>
				</div>	
				<?php } ?>
				<div class="clear"></div>
				</div> <!-- end .x4 -->
			</div> <!-- end .neighborhood_list_div -->
			<?php } ?>
		</div> <!-- end #neighborhoodDiv -->
		
		
		
          <div id="rentDiv" class="search_text_collm">
            <div class="about_text_title">rent RANGE</div>
            <div class="search_title">Adjust to your rent budget</div>
            <div class="rent_range_box clearfix">
              <div class="rent_range_left">
				  <!-- mobile backup for slider -->
					<?php // backup rent method, for mobile devices that can't handle the slider (must go before the slider, so the slider's rent_min and rent_max fields can override these, if the slider is present ?>
					<div id="rentSliderWrap_mobile">
						<?php
							$options = array(); 
							$i=0; 
							while ($i<12000) { $options[$i]="$".$i; $i=$i+250; } 
						?>
						<?php echo $this->Form->select('rent_min', $options, array('id'=>'ListingRentMin_mobile')); ?> 
						to 
						<?php echo $this->Form->select('rent_max', $options, array('id'=>'ListingRentMax_mobile')); ?>
					</div>
					<!-- slider -->
					
					<div id="rentSliderWrap">
						<!-- <input type="text" id="rentSliderAmount" class="slider_input rent_range_right" /> -->
						<div id="rentSlider"></div>
						<?php 
							echo $this->Form->hidden('rent_min',array("hidden"=>true,"label"=>false,"id"=>"ListingRentMin"));
							echo $this->Form->hidden('rent_max',array("hidden"=>true,"label"=>false,"id"=>"ListingRentMax")); 
						?>
						<p>Move slider to the right set rental range</p>
					</div>
            </div>
            <div id="rentSliderAmount" class="rent_range_right"><p>$1,000 - $5,000</p></div>
          </div>
          </div>
          
          
          <div class="search_text_collm">
            <div class="about_text_title">BEDROOMS &amp; BUILDING TYPES</div>
            <div class="bedroom_box clearfix">
              <ul>
                <li><span class="bed_title">Bedrooms</span></li>
                <li><?php echo $this->Form->select('bedrooms',$bedrooms,array('multiple'=>'checkbox','hiddenField'=>false)); ?></li>
			  </ul>
			  
              <ul>
                <li><span class="bed_title">Residential (optional)</span></li>
                <li><?php echo $this->Form->select('listing_type_id',$listing_types_residential,array('multiple'=>'checkbox','hiddenField'=>false)); ?></li>
              </ul>
              <ul>
                <li><span class="bed_title">Commercial (optional)</span></li>
                <li><?php echo $this->Form->select('listing_type_id',$listing_types_commercial,array('multiple'=>'checkbox','hiddenField'=>false)); ?></li>
              </ul>
            </div>
          </div>
          <div class="search_bottom_collm clearfix">
			<div class="search_bt_left">
				<?php echo $this->Form->end(array('label'=>'Search Apartments', 'class'=>'search_rent_bt')); ?>
            </div>
            <div class="search_bt_right">
              <!-- <label>Reference ID: </label> -->
              <?php echo $this->Form->input('listing_id',array('type'=>'text','label'=>'Reference ID: ', 'class'=>'searchId')); ?>
            </div>
          </div>
        </div>
        
        
       
        
        <!--end about_indent_wrap --> 
      </div>
      <!--end of about_content_left -->
