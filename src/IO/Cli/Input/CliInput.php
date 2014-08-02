<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\IO\Cli\Input;

use Windwalker\Filter\Filter;
use Windwalker\IO\Input;

/**
 * Windwalker Input CLI Class
 *
 * @since  1.0
 */
class CliInput extends Input implements CliInputInterface
{
	/**
	 * The executable that was called to run the CLI script.
	 *
	 * @var    string
	 * @since  1.0
	 */
	public $calledScript;

	/**
	 * The additional arguments passed to the script that are not associated
	 * with a specific argument name.
	 *
	 * @var    array
	 * @since  1.0
	 */
	public $args = array();

	/**
	 * Property inputStream.
	 *
	 * @var  resource
	 */
	protected $inputStream = STDIN;

	/**
	 * Constructor.
	 *
	 * @param   array  $source Optional source data.
	 * @param   Filter $filter The input filter object.
	 *
	 * @since   1.0
	 */
	public function __construct($source = null, Filter $filter = null)
	{
		$this->filter = $filter ? : new Filter;

		// Get the command line options
		$this->parseArguments();
	}

	/**
	 * Method to serialize the input.
	 *
	 * @return  string  The serialized input.
	 *
	 * @since   1.0
	 */
	public function serialize()
	{
		// Load all of the inputs.
		$this->loadAllInputs();

		// Remove $_ENV and $_SERVER from the inputs.
		$inputs = $this->inputs;
		unset($inputs['env']);
		unset($inputs['server']);

		// Serialize the executable, args, options, data, and inputs.
		return serialize(array($this->calledScript, $this->args, $this->options, $this->data, $inputs));
	}

	/**
	 * Gets a value from the input data.
	 *
	 * @param   string  $name     Name of the value to get.
	 * @param   mixed   $default  Default value to return if variable does not exist.
	 * @param   string  $filter   Filter to apply to the value.
	 *
	 * @return  mixed  The filtered input value.
	 *
	 * @since   1.0
	 */
	public function get($name, $default = null, $filter = 'string')
	{
		return parent::get($name, $default, $filter);
	}

	/**
	 * Gets an array of values from the request.
	 *
	 * @return  mixed  The filtered input data.
	 *
	 * @since   1.0
	 */
	public function all()
	{
		return $this->getArray();
	}

	/**
	 * Method to unserialize the input.
	 *
	 * @param   string  $input  The serialized input.
	 *
	 * @return  Input  The input object.
	 *
	 * @since   1.0
	 */
	public function unserialize($input)
	{
		// Unserialize the executable, args, options, data, and inputs.
		list($this->calledScript, $this->args, $this->options, $this->data, $this->inputs) = unserialize($input);

		// Load the filter.
		if (isset($this->options['filter']))
		{
			$this->filter = $this->options['filter'];
		}
		else
		{
			$this->filter = new Filter;
		}
	}

	/**
	 * getArgument
	 *
	 * @param integer $offset
	 * @param mixed   $default
	 *
	 * @return  mixed
	 */
	public function getArgument($offset, $default = null)
	{
		return isset($this->args[$offset]) ? $this->args[$offset] : $default;
	}

	/**
	 * setArgument
	 *
	 * @param integer $offset
	 * @param mixed   $value
	 *
	 * @return  CliInput
	 */
	public function setArgument($offset, $value)
	{
		$this->args[$offset] = $value;

		return $this;
	}

	/**
	 * Initialise the options and arguments
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function parseArguments()
	{
		// Get the list of argument values from the environment.
		$args = $_SERVER['argv'];

		// Set the path used for program execution and remove it form the program arguments.
		$this->calledScript = array_shift($args);

		// We use a for loop because in some cases we need to look ahead.
		for ($i = 0; $i < count($args); $i++)
		{
			// Get the current argument to analyze.
			$arg = $args[$i];

			// First let's tackle the long argument case.  eg. --foo
			if (strlen($arg) > 2 && substr($arg, 0, 2) == '--')
			{
				// Attempt to split the thing over equals so we can get the key/value pair if an = was used.
				$arg = substr($arg, 2);
				$parts = explode('=', $arg);
				$this->data[$parts[0]] = true;

				// Does not have an =, so let's look ahead to the next argument for the value.
				if (count($parts) == 1 && isset($args[$i + 1]) && preg_match('/^--?.+/', $args[$i + 1]) == 0)
				{
					$this->data[$parts[0]] = $args[$i + 1];

					// Since we used the next argument, increment the counter so we don't use it again.
					$i++;
				}
				elseif (count($parts) == 2)
				// We have an equals sign so take the second "part" of the argument as the value.
				{
					$this->data[$parts[0]] = $parts[1];
				}
			}

			// Next let's see if we are dealing with a "bunch" of short arguments.  eg. -abc
			elseif (strlen($arg) > 2 && $arg[0] == '-')
			{
				// For each of these arguments set the value to TRUE since the flag has been set.
				for ($j = 1; $j < strlen($arg); $j++)
				{
					$this->data[$arg[$j]] = true;
				}
			}

			// OK, so it isn't a long argument or bunch of short ones, so let's look and see if it is a single
			// short argument.  eg. -h
			elseif (strlen($arg) == 2 && $arg[0] == '-')
			{
				// Go ahead and set the value to TRUE and if we find a value later we'll overwrite it.
				$this->data[$arg[1]] = true;

				// Let's look ahead to see if the next argument is a "value".  If it is, use it for this value.
				if (isset($args[$i + 1]) && preg_match('/^--?.+/', $args[$i + 1]) == 0)
				{
					$this->data[$arg[1]] = $args[$i + 1];

					// Since we used the next argument, increment the counter so we don't use it again.
					$i++;
				}
			}

			// Last but not least, we don't have a key/value based argument so just add it to the arguments list.
			else
			{
				$this->args[] = $arg;
			}
		}
	}

	/**
	 * Get a value from standard input.
	 *
	 * @return  string  The input string from standard input.
	 */
	public function in()
	{
		return rtrim(fread($this->inputStream, 8192), "\n\r");
	}

	/**
	 * getInputStream
	 *
	 * @return  resource
	 */
	public function getInputStream()
	{
		return $this->inputStream;
	}

	/**
	 * setInputStream
	 *
	 * @param   resource $inputStream
	 *
	 * @return  CliInput  Return self to support chaining.
	 */
	public function setInputStream($inputStream)
	{
		$this->inputStream = $inputStream;

		return $this;
	}

	/**
	 * getCalledScript
	 *
	 * @return  string
	 */
	public function getCalledScript()
	{
		return $this->calledScript;
	}

	/**
	 * setCalledScript
	 *
	 * @param   string $calledScript
	 *
	 * @return  CliInput  Return self to support chaining.
	 */
	public function setCalledScript($calledScript)
	{
		$this->calledScript = $calledScript;

		return $this;
	}

	/**
	 * setOutStream
	 *
	 * @param   resource $outStream
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setOutputStream($outStream)
	{

	}

	/**
	 * Method to set property errorStream
	 *
	 * @param   resource $errorStream
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setErrorStream($errorStream)
	{

	}
}
