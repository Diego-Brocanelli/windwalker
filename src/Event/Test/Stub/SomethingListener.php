<?php
/**
 * @copyright  Copyright (C) 2005 - 2013 Open Source Matters. All rights reserved.
 * @license    GNU Lesser General Public License version 2.1 or later..txt
 */

namespace Windwalker\Event\Test\Stub;

use Windwalker\Event\Event;

/**
 * A listener listening to some events.
 *
 * @since  1.0
 */
class SomethingListener
{
	/**
	 * Listen to onBeforeSomething.
	 *
	 * @param   Event  $event  The event.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onBeforeSomething(Event $event)
	{
	}

	/**
	 * Listen to onSomething.
	 *
	 * @param   Event  $event  The event.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onSomething(Event $event)
	{
	}

	/**
	 * Listen to onAfterSomething.
	 *
	 * @param   Event  $event  The event.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onAfterSomething(Event $event)
	{
	}
}
