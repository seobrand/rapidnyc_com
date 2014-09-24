<?php
/* 
This Element will help dynamically setup content to be included in the $scripts_for_layout variable on our Layouts.

It will automatically look for CSS and JS files that match this particular view.
It will also accept CSS filenames, JS filenames, or JS codeblocks passed with the following vars
	$cssFiles : array of filenames (including path from /css root)
	$jsFiles : array of filenames (include path from /js root)
	$jsBlocks : array of strings
*/


//SETUP CONTENT VARIABLES (MAY HAVE DATA ALREADY PASSED TO THEM)
$cssFiles = $cssFiles ? $cssFiles : array();
$jsFiles = $jsFiles ? $jsFiles : array();
$jsBlocks = $jsBlocks ? $jsBlocks : array();




//DYNAMICALLY GENERATE FILENAMES FOR THIS CONTROLLER AND VIEW

//build an array of files to look for - filenames structured like this viewPath.action (or viewPath.page, if it's a page)
$filenames = array();

//is this a Controller View or a Page?
$viewPath = $this->viewPath;

//save the controller name as a possible filename (a global filename for all views in this controller)
$filenames[] = $viewPath;

//if we're dealing with a page, then we need to get the page name
if ($viewPath=="Pages") {
	$pageName = $this->viewVars['page'];
	//store the file, if we have one
	if ($pageName) {
		$filenames[] = "Pages." . $pageName;
	}

//if we're not dealing with a page, then get the view name and the action name	 
} elseif ($viewPath) {
	$filenames[] = $viewPath;
	if ($this->action) {
		$filenames[] = $viewPath . "." . $this->action;
	}
}

//add filenames to the variables
foreach ($filenames as $filename) {
	//css
	$cssPath = env("DOCUMENT_ROOT") . $this->webroot . "app/webroot/css/View/" . $filename . ".css";
	if (file_exists($cssPath)) {
		$cssFiles[] = "View/" . $filename . ".css";
	}
	//js
	$jsPath = env("DOCUMENT_ROOT") . $this->webroot . "app/webroot/js/View/" . $filename . ".js";
	if (file_exists($jsPath)) {
		$jsFiles[] = "View/" . $filename . ".js";	
	}
}

//remove duplicates
array_unique($cssFiles);
array_unique($jsFiles);
array_unique($jsBlocks);




//INCLUDE THE FILES WITH THE HTML HELPER

//css
echo $this->Html->css(
		$cssFiles, //css links
		NULL, //rel attribute - NULL defaults to 'stylesheet'
		array('inline' => false) //options
	);
//javascript links
echo $this->Html->script(
		$jsFiles, //js links
		array('inline' => false) //options
	);
//javascript blocks
foreach ($jsBlocks as $block) { 
	echo $this->Html->scriptBlock(
			$block, //js string
			array('inline' => false) //options
		);
}


?>
