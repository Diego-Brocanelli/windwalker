<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Query\Cubrid;

use Windwalker\Query\QueryExpression;

/**
 * Class CubridExpression
 *
 * @since 1.0
 */
class CubridExpression extends QueryExpression
{
	/**
	 * Concatenates an array of column names or values.
	 *
	 * @param   array   $values     An array of values to concatenate.
	 * @param   string  $separator  As separator to place between each value.
	 *
	 * @return  string  The concatenated values.
	 *
	 * @since   1.0
	 */
	public function concatenate($values, $separator = null)
	{
		if ($separator)
		{
			return implode(' || ' . $this->query->quote($separator) . ' || ', $values);
		}
		else
		{
			return 'CONCAT(' . implode(',', $values) . ')';
		}
	}

	/**
	 * Casts a value to a char.
	 *
	 * Ensure that the value is properly quoted before passing to the method.
	 *
	 * @param   string  $value  The value to cast as a char.
	 *
	 * @return  string  Returns the cast value.
	 *
	 * @since   1.0
	 */
	public function cast_as_char($value)
	{
		return "CAST(" . $value . " AS CHAR)";
	}
}
 