<?php
/**
* @package   com_zoo
* @author    YOOtheme http://www.herdboy.com
* @copyright Copyright (C) HerdBoy Web Design cc
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<div>
    <?php echo $this->app->html->_('select.booleanlist', $this->getControlName('value'), '', $this->get('value', $this->config->get('default'))); ?>
 			<div class="nrow"><div class="compat15" title="Show Joomla 1.5 Badge"></div> 
    <?php echo $this->app->html->_('select.booleanlist', $this->getControlName('j15'), '', $this->get('j15', $this->config->get('j15'))); ?>
 			</div>   
 			<div class="nrow"><div class="compat25" title="Show Joomla 2.5 Badge"></div>
    <?php echo $this->app->html->_('select.booleanlist', $this->getControlName('j25'), '', $this->get('j25', $this->config->get('j25'))); ?>
 			</div>
 			<div class="nrow"><div class="compat30" title="Show Joomla 3.0 Badge"></div>
    <?php echo $this->app->html->_('select.booleanlist', $this->getControlName('j30'), '', $this->get('j30', $this->config->get('j30'))); ?>
 			</div>
  			<div class="nrow"><div class="compat31" title="Show Joomla 3.1 Badge"></div>
    <?php echo $this->app->html->_('select.booleanlist', $this->getControlName('j31'), '', $this->get('j31', $this->config->get('j31'))); ?>
 			</div>			
 			<div class="nrow"><div class="compatzoo3" title="Show ZOO Badge"></div>
    <?php echo $this->app->html->_('select.booleanlist', $this->getControlName('zoob'), '', $this->get('zoob', $this->config->get('zoob'))); ?>
 			</div>			
</div>	