<?php
/**
* @package   ZOO Compatability Element
* @file      compatability.php
* @version   3.0
* @author    Mustaq Sheikh http://herdboy.com
* @copyright Copyright (C) 2006 - 2013 HerdBoy Web Design cc
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// register ElementRepeatable class
App::getInstance('zoo')->loader->register('ElementRepeatable', 'elements:repeatable/repeatable.php');

/*
   Class: ElementCompatability
*/
class ElementCompatability  extends ElementRepeatable implements iRepeatSubmittable {

	/*
		Function: _hasValue
			Checks if the repeatables element's value is set.

	   Parameters:
			$params - render parameter

		Returns:
			Boolean - true, on success
	*/
	public function _hasValue($params = array()) {
		return $this->get('value', $this->config->get('default'));
	}	

	/*
		Function: getJ15
			Gets the J15 value.

		Returns:
			String - j15
	*/
	public function getJ15($params = array()) {
		return $this->get('j15', $this->config->get('j15'));
	}

	/*
		Function: getJ25
			Gets the J25 value.

		Returns:
			String - j25
	*/
	public function getJ25($params = array()) {
		return $this->get('j25', $this->config->get('j25'));
	}

	/*
		Function: getJ30
			Gets the J30.

		Returns:
			String - j30
	*/
	public function getJ30() {
		return $this->get('j30', $this->config->get('j30'));
	}

	/*
		Function: getJ31
			Gets the J31.

		Returns:
			String - j31
	*/
	public function getJ31() {
		return $this->get('j31', $this->config->get('j31'));
	}	

	/*
		Function: getZoob
			Gets the Zoob value.

		Returns:
			String - title
	*/
	public function getZoob() {
		return $this->get('zoob', $this->config->get('zoob'));
	}		

	/*
		Function: render
			Override. Renders the element.

	   Parameters:
            $params - render parameter

		Returns:
			String - html
	*/
	protected function _render($params = array()) {

		// render html
		if ($this->get('value', $this->config->get('default'))) { 

			//init vars    			
			$params = $this->app->data->create($params);
			$html = array();

			// Set Badge Style
			$badge_size = $this->config->get('badge_size');

			switch($badge_size) {

	        case '0':
		    $badge_size = $this->app->document->addStylesheet('elements:compatability/assets/css/style_mini.css');
	        break;

	        case '1':
		    $badge_size = $this->app->document->addStylesheet('elements:compatability/assets/css/style.css');
	        break;

	        case '2':
		    $badge_size = $this->app->document->addStylesheet('elements:compatability/assets/css/style.css.css');
	        break;	        

	    	}

            $html[] = '<div class="compat">';

            if ($this->getJ15()) {
            $html[] = '<div class="compat15">Joomla 1.5</div>';
            }           

            if ($this->getJ25()) {
            $html[] = '<div class="compat25">Joomla 2.5</div>';
            }

            if ($this->getJ30()) {
            $html[] = '<div class="compat30">Joomla 3.0</div>';
            }

            if ($this->getJ31()) {
            $html[] = '<div class="compat31">Joomla 3.1</div>';
            }            

            if ($this->getZoob()) {
            $html[] = '<div class="compatzoo3">ZOO 3.X</div>';
            }

            $html[] = '</div>';

			return implode("\n", $html);
		}

		return null;
	}		

	/*
	   Function: edit
	       Renders the edit form field.

	   Returns:
	       String - html
	*/
	protected function _edit(){
	          $this->app->document->addStylesheet('elements:compatability/assets/css/style_mini.css');
		return $this->_editForm();
	}

	/*
		Function: _renderSubmission
			Renders the element in submission.

	   Parameters:
            $params - AppData submission parameters

		Returns:
			String - html
	*/
	public function _renderSubmission($params = array()) {
        return $this->_editForm($params->get('trusted_mode'));
	}

	protected function _editForm($trusted_mode = true) {
        if ($layout = $this->getLayout('edit.php')) {
            return $this->renderLayout($layout,
                compact('trusted_mode')
            );
        }
	}

	/*
		Function: validateSubmission
			Validates the submitted element

	   Parameters:
            $value  - AppData value
            $params - AppData submission parameters

		Returns:
			Array - cleaned value
	*/
	public function validateSubmission($value, $params) {
		return array('value' => (bool) $value->get('value'));
	}

}