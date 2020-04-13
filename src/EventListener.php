<?php

/**
 * Class EventListener
 * Represents a connection listener.
 * @link https://www.php.net/manual/en/class.eventlistener.php
 */
final class EventListener {

    /* Constants */
    /**
     * By default Libevent turns underlying file descriptors, or sockets,
     * to non-blocking mode. This flag tells Libevent to leave them in
     * blocking mode.
     *
     * @var integer OPT_LEAVE_SOCKETS_BLOCKING
     */
    const OPT_LEAVE_SOCKETS_BLOCKING = 1 ;

    /**
     * If this option is set, the connection listener closes its underlying
     * socket when the EventListener object is freed.
     *
     * @var integer OPT_CLOSE_ON_FREE
     */
    const OPT_CLOSE_ON_FREE = 2 ;

    /**
     * If this option is set, the connection listener sets the close-on-exec
     * flag on the underlying listener socket. See platform documentation for
     * fcntl and FD_CLOEXEC for more information.
     *
     * @var integer OPT_CLOSE_ON_EXEC
     */
    const OPT_CLOSE_ON_EXEC = 4 ;

    /**
     * By default on some platforms, once a listener socket is closed,
     * no other socket can bind to the same port until a while has passed.
     * Setting this option makes Libevent mark the socket as reusable, so that
     * once it is closed,another socket can be opened to listen on the same port
     *
     * @var integer OPT_REUSEABLE
     */
    const OPT_REUSEABLE = 8 ;

    /**
     * Allocate locks for the listener, so that it’s safe to use it from
     * multiple threads.
     *
     * @var integer OPT_THREADSAFE
     */
    const OPT_THREADSAFE = 16 ;

    /* Properties */
    /**
     * Numeric file descriptor of the underlying socket. (Added in event-1.6.0.)
     *
     * @var integer $fd
     */
    public  $fd ;

    /* Methods */
    /**
     * EventListener constructor.
     * Creates new connection listener associated with an event base.
     *
     * @link https://www.php.net/manual/en/eventlistener.construct.php
     *
     * @param EventBase $base Associated event base.
     * @param callable $cb     A callable that will be invoked when new
     *                         connection received.
     * @param mixed     $data Custom user data attached to cb .
     * @param int       $flags Bit mask of EventListener::OPT_* constants.
     *                         See EventListener constants .
     * @param int $backlog     Controls the maximum number of pending
     *                         connections that the network stack should allow
     *                         to wait in a not-yet-accepted state at any time;
     *                         see documentation for your system’s listen
     *                         function for more details. If backlog is negative,
     *                         Libevent tries to pick a good value for the
     *                         backlog ; if it is zero, Event assumes that
     *                         listen is already called on the socket( target )
     * @param mixed $target    May be string, socket resource, or a stream
     *                         associated with a socket. In case if target is a
     *                         string, the string will be parsed as network
     *                         address. It will be interpreted as a UNIX domain
     *                         socket path, if prefixed with 'unix:' ,
     *                         e.g. 'unix:/tmp/my.sock' .
     *
     * @return EventListener Returns EventListener object representing the event
     *                       connection listener.
     */
    public function __construct ( EventBase $base , callable $cb , mixed $data , int $flags , int $backlog , mixed $target ) {}

    /**
     * Disables an event connect listener object
     * @link https://www.php.net/manual/en/eventlistener.disable.php
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function disable () {}

    /**
     * Enables an event connect listener object
     * @link https://www.php.net/manual/en/eventlistener.enable.php
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function enable () {}

    /**
     * Returns event base associated with the event listener.
     * @link https://www.php.net/manual/en/eventlistener.getbase.php
     *
     * @return EventBase Returns event base associated with the event listener.
     */
    public function getBase () {}

    /**
     * Retreives the current address to which the listener's socket is bound.
     * @link https://www.php.net/manual/en/eventlistener.getsocketname.php
     *
     * @param string $address Output parameter. IP-address depending on the
     *                        socket address family.
     * @param mixed  $port Output parameter. The port the socket is bound to.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public static function getSocketName ( string &$address , mixed &$port = null ) {}

    /**
     * Adjust event connect listener's callback and optionally the callback
     * argument.
     *
     * @link https://www.php.net/manual/en/eventlistener.setcallback.php
     *
     * @param callable $cb The new callback for new connections. Ignored if NULL.
     *                     Should match the following prototype:
     *                     callback ([ EventListener $listener = NULL
     *                     [, mixed $fd = NULL [, array $address = NULL
     *                     [, mixed $arg = NULL ]]]] ) : void
     * @param mixed|NULL $arg Custom user data attached to the callback.
     *                        Ignored if NULL.
     */
    public function setCallback ( callable $cb , mixed $arg = NULL ) {}

    /**
     * Set event listener's error callback
     *
     * @link https://www.php.net/manual/en/eventlistener.seterrorcallback.php
     *
     * @param string $cb The error callback. Should match the following
     *                   prototype:
     *                   callback ([ EventListener $listener = NULL
     *                   [, mixed $data = NULL ]] ) : void
     */
    public function setErrorCallback ( string $cb ) {}
    
}
