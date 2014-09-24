<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Rapid Realty NYC | <?php echo $title_for_layout; ?></title>
<?php
	echo $this->Html->meta(NULL,NULL,array('property'=>'og:type', 'content'=>'company')) . "\n\t";
	echo $this->Html->meta(NULL,NULL,array('property'=>'og:site_name', 'content'=>'Rapid Realty NYC')) . "\n\t";
	echo $this->Html->meta(NULL,NULL,array('property'=>'fb:admins', 'content'=>'503649082')) . "\n\t";

	if (isset($fb_meta)) 
	{ 
		echo $fb_meta; 
	}
	else 
	{
		echo $this->Html->meta(NULL,NULL,array('property'=>'og:title', 'content'=>'Rapid Realty: New York Apartments for Rent')) . "\n\t";
		echo $this->Html->meta(NULL,NULL,array('property'=>'og:description', 'content'=>'New York apartments for rent. Hundreds of no-fee listings. Thousands of low-fee listings.')) . "\n\t";
		echo $this->Html->meta(NULL,NULL,array('property'=>'og:image', 'content'=>'http://www.rapidnyc.com/img/rapid/logo-cloud-square-small.jpg')) . "\n\t";
		echo $this->Html->meta(NULL,NULL,array('property'=>'og:url', 'content'=>'http://www.rapidnyc.com/')) . "\n\t";
	}   
?>

<link href="../img/new_img/favicon.ico" rel="shortcut icon" type="image/x-icon" >

<!-- layout css  -->

<?php echo $this->Html->css(array(
		'new_css/reset',
		'new_css/styles',
		'jquery.ui/base/jquery.ui.all',
		'new_css/collapsible',
		'new_css/jquery.bxslider',		
		'new_css/jquery.fancybox',		
		'new_css/jquery.gridster.min',		
		//'new_css/checkbox',
		'grassSky'	
	)); 
	
	echo $this->Html->script(array(
		//'new_js/jquery-1.8.0.min',
		'jquery-1.7.1.min',
		'jquery.ui/jquery.ui.core.min',
		'jquery.ui/jquery.ui.widget.min',
		//'new_js/icheck',
		//'new_js/custom.min',
		//'new_js/jquery.horizontalNav',
		'jquery.detectmobilebrowser',
		'new_js/masonry.pkgd.min',		
		'new_js/jquery.bxslider',
		'new_js/highlight.pack',
		'new_js/jquery.collapsible',
		'new_js/jquery.pajinate',
		'new_js/jquery.fancybox',
		'new_js/script',
		'new_js/pie_class'		
	)); 
	?>  
<!--[if (IE 7)|(IE 8)]>
<script src="js/html5.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 10]>
<script type="text/javascript" src="js/PIE.js"></script>
<![endif]-->
	<!-- addThis -->
	<!-- template -->
	<?php //echo $this->Html->script(array('floatMenu', 'grassSky')); ?>
	<?php echo $scripts_for_layout;  ?>
	
	
<!-- begin olark code -->
<script type='text/javascript'>/*{literal}<![CDATA[*/window.olark||(function(i){var e=window,h=document,a=e.location.protocol=="https:"?"https:":"http:",g=i.name,b="load";(function(){e[g]=function(){(c.s=c.s||[]).push(arguments)};var c=e[g]._={},f=i.methods.length; while(f--){(function(j){e[g][j]=function(){e[g]("call",j,arguments)}})(i.methods[f])} c.l=i.loader;c.i=arguments.callee;c.f=setTimeout(function(){if(c.f){(new Image).src=a+"//"+c.l.replace(".js",".png")+"&"+escape(e.location.href)}c.f=null},20000);c.p={0:+new Date};c.P=function(j){c.p[j]=new Date-c.p[0]};function d(){c.P(b);e[g](b)}e.addEventListener?e.addEventListener(b,d,false):e.attachEvent("on"+b,d); (function(){function l(j){j="head";return["<",j,"></",j,"><",z,' onl'+'oad="var d=',B,";d.getElementsByTagName('head')[0].",y,"(d.",A,"('script')).",u,"='",a,"//",c.l,"'",'"',"></",z,">"].join("")}var z="body",s=h[z];if(!s){return setTimeout(arguments.callee,100)}c.P(1);var y="appendChild",A="createElement",u="src",r=h[A]("div"),G=r[y](h[A](g)),D=h[A]("iframe"),B="document",C="domain",q;r.style.display="none";s.insertBefore(r,s.firstChild).id=g;D.frameBorder="0";D.id=g+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){D.src="javascript:false"} D.allowTransparency="true";G[y](D);try{D.contentWindow[B].open()}catch(F){i[C]=h[C];q="javascript:var d="+B+".open();d.domain='"+h.domain+"';";D[u]=q+"void(0);"}try{var H=D.contentWindow[B];H.write(l());H.close()}catch(E){D[u]=q+'d.write("'+l().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}c.P(2)})()})()})({loader:(function(a){return "static.olark.com/jsclient/loader0.js?ts="+(a?a[1]:(+new Date))})(document.cookie.match(/olarkld=([0-9]+)/)),name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('5373-881-10-7279');/*]]>{/literal}*/</script>
<!-- end olark code -->
</head>
<body>
	
	<header id="header_main"> 
	  <?php echo $this->element('new_header' ); ?>
	</header>

	<section id="main_container_about"> 
	<!--start main_container_about -->
		<aside id="partners_box_hm" > 
			<?php echo $this->element('new_aside' ); ?>
		</aside>
		<section id="about_container" class="clearfix"> 
			<!--start about_container -->
			<section id="about_content_left"> 
				<?php echo $content_for_layout; ?>
			</section>
			
			<aside id="about_sidebar_right"> 
				<?php echo $this->element('new_right' ); ?>
			</aside>
			<!--end  about_container --> 
		</section>
		<!--end main_container_about --> 
	</section>
	
	<footer id="footer_outer">
		<?php echo $this->element('new_footer' ); ?>
	</footer>

</body>
</html>
