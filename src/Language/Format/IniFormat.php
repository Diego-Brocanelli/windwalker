<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Language\Format;

/**
 * Class IniFormat
 *
 * @since 1.0
 */
class IniFormat extends AbstractFormat
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'ini';

	/**
	 * parse
	 *
	 * @param string $string
	 *
	 * @return  array
	 */
	public function parse($string)
	{
		return parse_ini_string($string);
	}
}

