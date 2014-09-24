<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <? /*
    <meta name="keywords" content="<? echo $_meta['keywords']; ?>">
    <meta name="description" content="<? echo $_meta['description']; ?>">
    */ ?>
    <title>RapidNYC | <?=$title_for_layout?></title>
        
        <? /*
        <? if ($_meta['tweetme_title']) { ?>
        <meta name="tweetmeme-title" content="<? echo $_meta['tweetme_title']; ?>" />
        <? } ?>
        */
		?>
		
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
    <!-- grid -->
	<? echo $this->Html->css(array('grid/reset','grid/960_16_col')); ?>

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
		'floatMenu',
		'agentCard',
		'form',
		'grassSky'
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
		'jquery.imageFade',
		'jquery.mousewheel-3.0.6.pack',
		'fancyBox/jquery.fancybox.pack',
		'fancyBox/helpers/jquery.fancybox-buttons',
		'fancyBox/helpers/jquery.fancybox-thumbs',
		'time-counter'
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
		'floatMenu',
		'grassSky'
	)); 
	?>
	
	<?php echo $scripts_for_layout;  ?>

</head>




<!-- begin olark code --><script type='text/javascript'>/*{literal}<![CDATA[*/window.olark||(function(i){var e=window,h=document,a=e.location.protocol=="https:"?"https:":"http:",g=i.name,b="load";(function(){e[g]=function(){(c.s=c.s||[]).push(arguments)};var c=e[g]._={},f=i.methods.length; while(f--){(function(j){e[g][j]=function(){e[g]("call",j,arguments)}})(i.methods[f])} c.l=i.loader;c.i=arguments.callee;c.f=setTimeout(function(){if(c.f){(new Image).src=a+"//"+c.l.replace(".js",".png")+"&"+escape(e.location.href)}c.f=null},20000);c.p={0:+new Date};c.P=function(j){c.p[j]=new Date-c.p[0]};function d(){c.P(b);e[g](b)}e.addEventListener?e.addEventListener(b,d,false):e.attachEvent("on"+b,d); (function(){function l(j){j="head";return["<",j,"></",j,"><",z,' onl'+'oad="var d=',B,";d.getElementsByTagName('head')[0].",y,"(d.",A,"('script')).",u,"='",a,"//",c.l,"'",'"',"></",z,">"].join("")}var z="body",s=h[z];if(!s){return setTimeout(arguments.callee,100)}c.P(1);var y="appendChild",A="createElement",u="src",r=h[A]("div"),G=r[y](h[A](g)),D=h[A]("iframe"),B="document",C="domain",q;r.style.display="none";s.insertBefore(r,s.firstChild).id=g;D.frameBorder="0";D.id=g+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){D.src="javascript:false"} D.allowTransparency="true";G[y](D);try{D.contentWindow[B].open()}catch(F){i[C]=h[C];q="javascript:var d="+B+".open();d.domain='"+h.domain+"';";D[u]=q+"void(0);"}try{var H=D.contentWindow[B];H.write(l());H.close()}catch(E){D[u]=q+'d.write("'+l().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}c.P(2)})()})()})({loader:(function(a){return "static.olark.com/jsclient/loader0.js?ts="+(a?a[1]:(+new Date))})(document.cookie.match(/olarkld=([0-9]+)/)),name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('5373-881-10-7279');/*]]>{/literal}*/</script>
<!-- end olark code -->

<body>
<div id="bodyWrap"><? //essential to making footer stay at bottom ?>






<!-- nav menu -->
<? echo $this->element('nav_floatMenu'); ?>




<!-- == Sky area with logo == -->
<div class="sky" id="header">
      <div class="masthead">
      <?= $this->Html->link(
      	'RAPID REALTY NYC' . $this->Html->image('grassSky/logo.png', array('alt' => 'Rapid Realty NYC')), 
		array('controller' => 'pages', 'action' => 'display', 'home'), 
		array('title'=>'Rapid Realty NYC', 'escape'=>false)
	  );
      ?>
      </div>
</div>
  



  
  
<? /*
<!-- == Second main header - short catchy string == -->
<div class="grid">
    <h2 class="col3">TAKING OFF SOON!</h2>
</div>
  
  <!-- == Buildings with third main header and subscribe form == -->
    <div class="grid">
      <h3 class="col2 middle">Our website is currently under development. Fill in your e-mail below and we will let you know when we are ready to take off.</h3>
      <div class="clear"></div>
      <div class="col2 middle subscribe">
        <form id="subscribe" action="scripts/ajax.php" method="POST">
          <input type="email" name="email" placeholder="Enter your email address" class="email">
          <input type="submit" name="send" value="Subscribe" class="submit">
        </form>
       </div>                                                     
     <div class="clear"></div>
     <div class="col3 paper-plane"></div>
    </div>
*/
?>




<?= $this->Session->flash(); ?>



<div id="contentsWrap">
<div id="contents" class="container_16"><!-- start grid container -->


<?php echo $content_for_layout; ?>



</div><!-- end grid container -->
</div> <!-- end #contentsWrap -->




<div id="footer">
	
	<!-- buildings and skyline -->
	<div class="buildings"></div>
    <div class="grass"></div>
    
    <!-- == Metal area with sharing and footer == -->
    <div id="subFooter" class="metal">
		<div class="sharing">
			<a href="http://www.facebook.com/rapidrealty" target="_blank" class="share_fb"></a>
			<a href="http://www.twitter.com/rapidrealtynyc" target="_blank" class="share_tw"></a>
			<a href="http://www.anthonylolli.com/" target="_blank" class="share_lolli"></a>
			<? if ($show_jetways) { ?>
			<a href="http://www.usjetways.com/" target="_blank" class="share_jetways" title="Private Jet Charter"></a>
			<? } ?>
		</div>  
		<div class="copyrightText">
			<p>COPYRIGHT <? echo date("Y"); ?> RAPID REALTY FRANCHISE LLC, ALL RIGHTS RESERVED</p>
			<p>Rapid Realty Franchise LLC, 681 4th Avenue, Brooklyn, NY 11232. (888) 439-4999</p>
		</div>
		<div class="disclaimerText round_small brown">
			<p>Information on this website is as accurate as our most current records, and we make every attempt to keep
it up-to-date.</p>
			<p>Unfortunately, the market moves quickly and we cannot guarantee that it will always be error-free.</p>			
		</div>
		
    </div> <!-- end #subFooter -->
</div> <!-- end #footer -->
    
    
    
    
    




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



</div> <!-- end #bodyWrap -->


</body>
</html>


