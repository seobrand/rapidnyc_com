<?php
/**

	CUSTOMIZED ERROR-HANDLING CONTROLLER
	- this will override the core controller, so I've just copied and pasted the data from /lib/Cake/Controller/CakeErrorController.php, and then I tweaked it
	- this is only in use so I can check if rejected pages are actually trying to access custom agent pages


	here are the customizations that I made:
	1. Add "Agent" to $uses
	2. Check URL params against agent website_alias in beforeRender()

 */

class CakeErrorController extends AppController {

	public $name = 'CakeError';
	
	public $uses = array('Agent'); //load model

/**
 * __construct
 *
 * @param CakeRequest $request
 * @param CakeResponse $response
 */
	public function __construct($request = null, $response = null) {
		parent::__construct($request, $response);
		$this->constructClasses();
		$this->Components->trigger('initialize', array(&$this));
		$this->_set(array('cacheAction' => false, 'viewPath' => 'Errors'));
	}

/**
 * Escapes the viewVars.
 *
 * @return void
 */
	public function beforeRender() {
		parent::beforeRender();
		foreach ($this->viewVars as $key => $value) {
			if (!is_object($value)){
				$this->viewVars[$key] = h($value);
			}
		}
		
		
		/*************** BEGIN CUSTOMIZATION *****************/
		
		//CHECK IF URL IS SPECIFYING AN AGENT WEBSITE ALIAS
		
		//pull website_alias from the URL, and create a new URL that doesn't include the website_alias
		$testAlias = $this->request->params['controller'];
		$originalURL = $_SERVER['REQUEST_URI']; 
		$newURL = substr($originalURL,strlen($testAlias)+1); // +1 because $_SERVER[REQUEST_URI] includes a starting "/"

		//if $testAlias is an asterisk, then it's a request to reset the saved Agent information
		if ($testAlias=="*") {
			$this->Session->delete('Agents.id');
			$this->redirect($newURL, 301);
		
		//test the website_alias for a matching agent record
		} elseif ($testAlias) {
		
			if (!$newURL) { $newURL = "/"; } //if no newURL left, they are probably looking for homepage (http://www.rapidnyc.com/website_alias)
		
			$params = array(
				'conditions' => array('website_alias'=>$testAlias)
			);
			$agent = $this->Agent->find('first',$params);
			
			//if we have an agent, then save the ID, and redirect the page to the new url 
			if ($agent['Agent']['id']) {
				$this->Session->write('Agents.id',$agent['Agent']['id']);
				$this->redirect($newURL, 301);
				
			} else {
				//redirect other traffic to the homepage, in case they are looking for an inactive agent record
				//first, be sure that this controller doesn't exist - if the controller exists, it may be a legit error, not a website_alias attempt
				//we'll test against $this->viewVars['controller'] -- that won't populate for a missing controller
				if (!$this->viewVars['controller']) {
					$this->redirect("/");
				}
			}

			
		}
		
		/*************** END CUSTOMIZATION *****************/
		
		
	}
}
