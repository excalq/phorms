<?php if(!defined('PHORMS_ROOT')) { die('Phorms not loaded properly'); }
/**
 * @package Phorms
 * @subpackage Widgets
 */
/**
 * Phorm_Field_Description
 *
 * A plain text description item in a set of forms
 * @author Arthur N Ketcham <dev@ArthurK.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @package Phorms
 * @subpackage Widgets
 */
class Phorm_Widget_Description extends Phorm_Widget
{

	/**
	 * Returns the description field's HTML
	 *
	 * @param mixed $value the form widget's value attribute
	 * @param array $attributes This is unused for this class, but is here for API compatibilty
	 * @return string the HTML of the description item
	 */
	public function html($value, array $attributes=array())
	{
		$value = $this->clean_string($value);
		
		if ($value) {
			return '<span class="phorm_descr">'.$value.'</span>';
		} else {
			return '';
		}
	}

}