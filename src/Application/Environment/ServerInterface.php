<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Application\Environment;

/**
 * The ServerInterface class.
 * 
 * @since  {DEPLOY_VERSION}
 */
interface ServerInterface
{
	/**
	 * isWin
	 *
	 * @return  bool
	 */
	public function isWin();

	/**
	 * isMac
	 *
	 * @return  bool
	 */
	public function isMac();

	/**
	 * isUnix
	 *
	 * @see  https://gist.github.com/asika32764/90e49a82c124858c9e1a
	 *
	 * @return  bool
	 */
	public function isUnix();

	/**
	 * isLinux
	 *
	 * @return  bool
	 */
	public function isLinux();
}
