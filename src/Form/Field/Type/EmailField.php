<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Form\Field\Type;

/**
 * The EmailField class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class EmailField extends TextField
{
	/**
	 * prepareAttributes
	 *
	 * @param array $attrs
	 *
	 * @return  array|void
	 */
	public function prepareAttributes(&$attrs)
	{
		parent::prepareAttributes($attrs);

		$attrs['class'] = 'validate-email ' . $attrs['class'];
	}
}
 