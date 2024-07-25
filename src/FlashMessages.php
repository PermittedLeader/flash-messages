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
    protected static function message($level = 'info', $message = null, $title = false, $dismissable = false, $actions = false, $bag = 'messages')
    {
        if (session()->has($bag)) {
            $messages = session()->pull($bag);
        }

        $messages[] = $message = ['level' => $level, 'message' => $message, 'dismissable' => $dismissable, 'title' => $title, 'actions' => $actions];

        session()->flash($bag, $messages);

        return $message;
    }

    /**
     * Get messages
     *
     * @return array
     */
    public static function messages($bag = 'messages')
    {
        return self::hasMessages($bag) ? session()->pull($bag) : [];
    }

    /**
     * hasMessages()
     *
     * @return bool
     */
    public static function hasMessages($bag = 'messages')
    {
        return session()->has($bag);
    }

    /**
     * Flash a success message to the session
     *
     * @param  string  $message
     * @param  string  $title
     * @param  bool  $dismissable
     * @return void
     */
    public static function success($message, $title = false, $dismissable = false, $actions = false, $bag = 'messages')
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
    public static function info($message, $title = false, $dismissable = false, $actions = false, $bag = 'messages')
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
    public static function warning($message, $title = false, $dismissable = false, $actions = false, $bag = 'messages')
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
    public static function danger($message, $title = false, $dismissable = false, $actions = false, $bag = 'messages')
    {
        return self::message('danger', $message, $title, $dismissable, $actions, $bag);
    }
}