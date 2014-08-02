<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Query\Mysql;

use Windwalker\Query\Query;

/**
 * Class MysqlQuery
 *
 * @since 1.0
 */
class MysqlQuery extends Query
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'mysql';

	/**
	 * The character(s) used to quote SQL statement names such as table names or field names,
	 * etc. The child classes should define this as necessary.  If a single character string the
	 * same character is used for both sides of the quoted name, else the first character will be
	 * used for the opening quote and the second for the closing quote.
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $nameQuote = '`';

	/**
	 * The null or zero representation of a timestamp for the database driver.  This should be
	 * defined in child classes to hold the appropriate value for the engine.
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $nullDate = '0000-00-00 00:00:00';

	/**
	 * If no connection set, we escape it with default function.
	 *
	 * @param string $text
	 *
	 * @return  string
	 */
	protected function escapeWithNoConnection($text)
	{
		return mysql_real_escape_string($text);
	}
}

