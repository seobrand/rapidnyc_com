<? 
//Dynamic JS and CSS content
$this->element('scripts_for_layout');
?>


<h1>New York Real Estate Jobs</h1>


<?
$options = array(
	'menu' => 'careers'
);
echo $this->element('nav_subMenu', $options); 
?>



<div class="grid_2">&nbsp;</div>
<div class="grid_12">
		
	<div class="round_large orange careerVideoWrapper">
	
		<? 
		foreach ($videos as $key=>$video) { 
			if (!$first) { $activeClass='active'; $first=true; } else { $activeClass=''; } //earmark first video
			?>
			<div class="careerVideo <?= $activeClass; ?>" id="careerVideoWrapper_<?= $video['video_id']; ?>" video_id="<?= $video['video_id']; ?>">
			<?= $this->Youtube->video($video['link'][0]['@href'], array('playerapiid'=>'careerVideo_'.$video['video_id']), array('width'=>680, 'height'=>455, 'id'=>'careerVideo_'.$video['video_id'])); ?>
			</div>
		<? } ?>
		
	</div>


	<div class="round_large blue">
	<? foreach ($videos as $video) { ?>
		<div class="round_medium careerVideoThumb">
		<?= $this->Html->link($this->Html->image($video['media:group']['media:thumbnail'][2]['@url']), '#', array('escape'=>false, 'title'=>$video['media:group']['media:title']['@'], 'video_id'=>$video['video_id'])); ?>
		</div>
			
	<? } ?>
	</div>
	
	<h2>Join Rapid Realty - The Best Real Estate Jobs in Brooklyn</h2>
	
	<p>Rapid Realty is the country's fastest growing real estate company, as well as one of the largest! We specialize in no-fee apartment rentals and commercial leases.</p>
	
	<p>Our team of committed agents are constantly working to match qualified applicants with great property vacancies. We're always searching for self-motivated and career-minded individuals looking for a lucrative career in real estate.</p>
	
	<p>Through our on-the-job training program, Rapid Realty agents become experts in the local real estate market. Agents keep their skills sharp through our bi-weekly training workshops and are given constant support from our staff community. Our qualified, experienced staff and extensive database keep Rapid Realty at the top of the real estate game and make it easier for our agents to be successful.</p>
	
	<p>It's never too late to get started in real estate. So, why not <?= $this->Html->link('START YOUR CAREER NOW', array('controller'=>'careers', 'action'=>'apply')); ?>?</p>
	
	<div class="signupButton">
	<?= $this->Html->link('Learn How to Apply for a Job at Rapid Realty', array('controller'=>'careers', 'action'=>'apply'), array('class'=>'button huge')); ?>
	</div>
		
</div>	
<div class="grid_2">&nbsp;</div>
<div class="clear"></div>
