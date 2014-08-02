<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Console\Prompter;

/**
 * Prompter Interface.
 *
 * Help us show dialog to ask use questions.
 *
 * @since  1.0
 */
interface PrompterInterface
{
	/**
	 * Show prompt to ask user.
	 *
	 * @param   string  $msg      Question.
	 * @param   string  $default  Default value.
	 *
	 * @return  string  The value that use input.
	 *
	 * @since   1.0
	 */
	public function ask($msg = '', $default = '');

	/**
	 * Proxy to ask method.
	 *
	 * @param   string  $default  Default value.
	 *
	 * @return  string  The value that use input.
	 *
	 * @since   1.0
	 */
	public function __invoke($default = '');
}

