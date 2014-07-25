<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Loader\Loader;

/**
 * Class FileMappingLoader
 *
 * @since 1.0
 */
class FileMappingLoader extends AbstractLoader
{
	/**
	 * Property maps.
	 *
	 * @var  array
	 */
	protected $maps = array();

	/**
	 * addMap
	 *
	 * @param string $class
	 * @param string $path
	 *
	 * @return  FileMappingLoader
	 */
	public function addMap($class, $path)
	{
		$class = static::normalizeClass($class);

		$path = static::normalizePath($path);

		$this->maps[$class] = $path;

		return $this;
	}

	/**
	 * Loads the given class or interface.
	 *
	 * @param string $className The name of the class to load.
	 *
	 * @return FileMappingLoader
	 */
	public function loadClass($className)
	{
		if (in_array($className, $this->maps))
		{
			require $this->maps[$className];
		}

		return $this;
	}
}
 