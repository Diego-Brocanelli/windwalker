<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Filesystem\Comparator;


interface FileComparatorInterface
{
	public function compare($current, $key, $iterator);
}

