<?php

namespace Permittedleader\FlashMessages;

/**
 * FlashMessages Trait
 *
 * You can flash an alert of various levels using the below trait
 * The correct syntax is to use self::message('level','message','title','dismissable'), but shorthand alternatives are available
 */
trait FlashMessages
{
    /**
     * Flash message to session
     *
     * @param  string  $level
     * @param  string|null  $message
     * @param  string|null  $title
     * @param  bool  $dismissable
     * @return void
     */
    protected static function message($level = 'info', $message = null, $title = false, $dismissable = false, $actions = false, $bag = 'default')
    {
        if (session()->has('messages.'.$bag)) {
            $messages = session()->pull('messages.'.$bag);
        }

        $messages[] = $message = ['level' => $level, 'message' => $message, 'dismissable' => $dismissable, 'title' => $title, 'actions' => $actions];

        session()->flash('messages.'.$bag, $messages);

        return $message;
    }

    /**
     * Get messages
     *
     * @return array
     */
    protected static function messages($bag = 'default')
    {
        return self::hasMessages() ? session()->pull('messages.'.$bag) : [];
    }

    /**
     * hasMessages()
     *
     * @return bool
     */
    protected static function hasMessages($bag = 'default')
    {
        return session()->has('messages.'.$bag);
    }

    /**
     * Flash a success message to the session
     *
     * @param  string  $message
     * @param  string  $title
     * @param  bool  $dismissable
     * @return void
     */
    protected static function success($message, $title = false, $dismissable = false, $actions = false, $bag = 'default')
    {
        return self::message('success', $message, $title, $dismissable, $actions, $bag);
    }

    /**
     * Flash an info message to the session
     *
     * @param  string  $message
     * @param  string  $title
     * @param  bool  $dismissable
     * @return void
     */
    protected static function info($message, $title = false, $dismissable = false, $actions = false, $bag = 'default')
    {
        return self::message('info', $message, $title, $dismissable, $actions, $bag);
    }

    /**
     * Flash a warning message to the session
     *
     * @param  string  $message
     * @param  string  $title
     * @param  bool  $dismissable
     * @return void
     */
    protected static function warning($message, $title = false, $dismissable = false, $actions = false, $bag = 'default')
    {
        return self::message('warning', $message, $title, $dismissable, $actions, $bag);
    }

    /**
     * Flash a danger message to the session
     *
     * @param  string  $message
     * @param  string  $title
     * @param  bool  $dismissable
     * @return void
     */
    protected static function danger($message, $title = false, $dismissable = false, $actions = false, $bag = 'default')
    {
        return self::message('danger', $message, $title, $dismissable, $actions, $bag);
    }
}
