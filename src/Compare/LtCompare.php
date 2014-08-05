<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2008 - 2014 Asikart.com. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Compare;

/**
 * Class LtCompare
 *
 * @since {DEPLOY_VERSION}
 */
class LtCompare extends Compare
{
	/**
	 * Operator symbol.
	 *
	 * @var  string
	 */
	protected $operator = '<';

	/**
	 * Do compare.
	 *
	 * @return  boolean  The result of compare.
	 */
	public function compare()
	{
		return ($this->compare1 < $this->compare2);
	}
}
