<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Application\Test\Stub;

use Windwalker\Application\AbstractCliApplication;

/**
 * The AtubApplication class.
 *
 * @since  {DEPLOY_VERSION}
 */
class StubCli extends AbstractCliApplication
{
	/**
	 * Property executed.
	 *
	 * @var string
	 */
	public $executed;

	/**
	 * Method to run the application routines.  Most likely you will want to instantiate a controller
	 * and execute it, or perform some sort of task directly.
	 *
	 * @return  string
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	protected function doExecute()
	{
		return 'Hello World';
	}

	/**
	 * Method to close the application.
	 *
	 * @param   integer|string  $message  The exit code (optional; default is 0).
	 *
	 * @return  string
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function close($message = 0)
	{
		return $message;
	}
}