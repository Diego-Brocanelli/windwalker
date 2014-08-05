<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2008 - 2014 Asikart.com. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Dom;

/**
 * Html Elements collection.
 *
 * @since {DEPLOY_VERSION}
 */
class DomElements extends \ArrayObject
{
	/**
	 * Convert all elements to string.
	 *
	 * @return  string
	 */
	public function __toString()
	{
		$return = '';

		foreach ($this as $element)
		{
			$return .= (string) $element;
		}

		return $return;
	}
}
