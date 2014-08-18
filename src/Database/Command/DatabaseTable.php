<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2008 - 2014 Asikart.com. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Database\Command;

use Windwalker\Database\Driver\DatabaseDriver;
use Windwalker\Database\Driver\DatabaseAwareTrait;

/**
 * Class DatabaseTable
 *
 * @since {DEPLOY_VERSION}
 */
abstract class DatabaseTable
{
	use DatabaseAwareTrait
	{
		DatabaseAwareTrait::__construct as doConstruct;
	}

	protected $table = null;

	/**
	 * Constructor.
	 *
	 * @param string         $table
	 * @param DatabaseDriver $db
	 */
	public function __construct($table, DatabaseDriver $db)
	{
		$this->table = $table;

		$this->doConstruct($db);
	}

	/**
	 * create
	 *
	 * @param string $columns
	 * @param array  $pks
	 * @param array  $keys
	 * @param int    $autoIncrement
	 * @param bool   $ifNotExists
	 * @param string $engine
	 * @param string $defaultCharset
	 *
	 * @return  $this
	 */
	abstract public function create($columns, $pks = array(), $keys = array(), $autoIncrement = null,
		$ifNotExists = true, $engine = 'InnoDB', $defaultCharset = 'utf8');

	/**
	 * rename
	 *
	 * @param string $newName
	 *
	 * @return  $this
	 */
	abstract public function rename($newName);

	/**
	 * Locks a table in the database.
	 *
	 * @return  static  Returns this object to support chaining.
	 *
	 * @since   {DEPLOY_VERSION}
	 * @throws  \RuntimeException
	 */
	abstract public function lock();

	/**
	 * unlock
	 *
	 * @return  static  Returns this object to support chaining.
	 *
	 * @throws  \RuntimeException
	 */
	abstract public function unlock();

	/**
	 * Method to truncate a table.
	 *
	 * @return  static
	 *
	 * @since   {DEPLOY_VERSION}
	 * @throws  \RuntimeException
	 */
	abstract public function truncate();

	/**
	 * Get table columns.
	 *
	 * @param bool $refresh
	 *
	 * @return  array Table columns with type.
	 */
	abstract public function getColumns($refresh = false);

	/**
	 * getColumnDetails
	 *
	 * @param bool $full
	 *
	 * @return  mixed
	 */
	abstract public function getColumnDetails($full = true);

	/**
	 * getColumnDetail
	 *
	 * @param string $column
	 * @param bool   $full
	 *
	 * @return  mixed
	 */
	abstract public function getColumnDetail($column, $full = true);

	/**
	 * addColumn
	 *
	 * @param string $name
	 * @param string $type
	 * @param bool   $unsigned
	 * @param bool   $notNull
	 * @param string $default
	 * @param null   $position
	 * @param string $comment
	 *
	 * @return  mixed
	 */
	abstract public function addColumn($name, $type = 'text', $unsigned = false, $notNull = false, $default = '', $position = null, $comment = '');

	/**
	 * dropColumn
	 *
	 * @param string $name
	 *
	 * @return  mixed
	 */
	abstract public function dropColumn($name);

	/**
	 * addIndex
	 *
	 * @param string  $type
	 * @param string  $name
	 * @param array   $columns
	 * @param string  $comment
	 *
	 * @return  mixed
	 */
	abstract public function addIndex($type, $name = null, $columns = array(), $comment = null);

	/**
	 * dropIndex
	 *
	 * @param string  $type
	 * @param string  $name
	 *
	 * @return  mixed
	 */
	abstract public function dropIndex($type, $name);

	/**
	 * getIndexes
	 *
	 * @return  mixed
	 */
	abstract public function getIndexes();
}

