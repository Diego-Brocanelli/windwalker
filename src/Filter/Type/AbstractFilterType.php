<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2008 - 2014 Asikart.com. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Filter\Type;

/**
 * Class AbstractFilterType
 *
 * @since {DEPLOY_VERSION}
 */
abstract class AbstractFilterType
{
	/**
	 * filter
	 *
	 * @param string $source
	 *
	 * @return  mixed
	 */
	abstract public function filter($source);

	/**
	 * __invoke
	 *
	 * @param string $source
	 *
	 * @return  mixed
	 */
	public function __invoke($source)
	{
		return $this->filter($source);
	}
}

