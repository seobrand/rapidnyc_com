<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <? /*
    <meta name="keywords" content="<? echo $_meta['keywords']; ?>">
    <meta name="description" content="<? echo $_meta['description']; ?>">
    */ ?>
    <title>RapidNYC | <?=$title_for_layout?></title>
		
	<!-- facebook meta -->
	<?
	echo $this->Html->meta(NULL,NULL,array('property'=>'og:type', 'content'=>'company')) . "\n\t";
	echo $this->Html->meta(NULL,NULL,array('property'=>'og:site_name', 'content'=>'Rapid Realty NYC')) . "\n\t";
	echo $this->Html->meta(NULL,NULL,array('property'=>'fb:admins', 'content'=>'503649082')) . "\n\t";
	
	if (isset($fb_meta)) { 
		echo $fb_meta; 
	} else {
		echo $this->Html->meta(NULL,NULL,array('property'=>'og:title', 'content'=>'Rapid Realty: New York Apartments for Rent')) . "\n\t";
		echo $this->Html->meta(NULL,NULL,array('property'=>'og:description', 'content'=>'New York apartments for rent. Hundreds of no-fee listings. Thousands of low-fee listings.')) . "\n\t";
		echo $this->Html->meta(NULL,NULL,array('property'=>'og:image', 'content'=>'http://www.rapidnyc.com/img/rapid/logo-cloud-square-small.jpg')) . "\n\t";
		echo $this->Html->meta(NULL,NULL,array('property'=>'og:url', 'content'=>'http://www.rapidnyc.com/')) . "\n\t";
	}   
	?>
        
   	
   	
	<!-- CSS -->
	<!-- reset -->
	<? echo $this->Html->css(array('grid/reset')); ?>

	<!-- jquery -->
	<? echo $this->Html->css(array(
		'jquery.ui/base/jquery.ui.all',
		'fancyBox/jquery.fancybox',
		'fancyBox/helpers/jquery.fancybox-buttons',
		'fancyBox/helpers/jquery.fancybox-thumbs'
	)); 
	?>
	
	<!-- template -->
	<? echo $this->Html->css(array(
		'agentCard',
		'form',
		'grassSky',
		'modal'
	)); 
	?>
    
    
    <!-- JAVASCRIPT -->
	<!-- jquery -->
	<? 
	echo $this->Html->script(array(
		'jquery-1.7.1.min',
		'jquery.ui/jquery.ui.core.min',
		'jquery.ui/jquery.ui.widget.min',
		'jquery.detectmobilebrowser',
		'jquery.preloadCssImages',
		'jquery.imageFade',
		'jquery.mousewheel-3.0.6.pack',
		'fancyBox/jquery.fancybox.pack',
		'fancyBox/helpers/jquery.fancybox-buttons',
		'fancyBox/helpers/jquery.fancybox-thumbs'
	)); 
	?>
	
	
	<!-- addThis -->
	<script type="text/javascript">
	var addthis_config = {"data_track_clickback":true};
	</script>
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f067d1531c643f3"></script>
	<!-- end addThis -->
	
	<!-- template -->
	<? 
	echo $this->Html->script(array(
		'grassSky'
	)); 
	?>
	
	<?php echo $scripts_for_layout ?>   	
   	
</head>





<body>


<?= $this->Session->flash(); ?>






<div id="contents">

	<?=$content_for_layout?>

</div><!-- end #contents -->









<!-- Google Analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-6653342-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>




</body>
</html>


