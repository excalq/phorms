<?php if(!defined('PHORMS_ROOT')) { die('Phorms not loaded properly'); }
/**
 * @package Phorms
 * @subpackage Fields
 */
/**
 * Phorm_Field_Description
 *
 * A plain text description item in a set of forms
 * @author Arthur N Ketcham <dev@ArthurK.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @package Phorms
 * @subpackage Fields
 */
class Phorm_Field_Description extends Phorm_Field
{
	
	/**
	 * @param array $validators a list of callbacks to validate the field data
	 * @param array $attributes a list of key/value pairs representing HTML attributes
	 */
	public function __construct($description)
	{
		parent::__construct(''); // Has no label, so pass empty string
		parent::set_value($description);
	}
	
	/**
	 * Imports the value by decoding HTML entities.
	 *
	 * @param string $value
	 * @return string the decoded value
	 */
	public function import_value($value)
	{
		return html_entity_decode((string) $value);
	}
	
	/**
	 * Returns a new DescriptionWidget.
	 *
	 * @return DescriptionWidget
	 */
	protected function get_widget()
	{
		return new Phorm_Widget_Description();
	}

}