<?php

/**
 * Class Event
 * Event class represents and event firing on a file descriptor being ready to
 * read from or write to; a file descriptor becoming ready to read from or write
 * to(edge-triggered I/O only); a timeout expiring; a signal occuring; a
 * user-triggered event.
 *
 * Every event is associated with EventBase . However, event will never fire
 * until it is added (via Event::add() ). An added event remains in pending
 * state until the registered event occurs, thus turning it to active state.
 * To handle events user may register a callback which is called when event
 * becomes active. If event is configured persistent , it remains pending. If it
 * is not persistent, it stops being pending when it's callback runs.
 * Event::del() method deletes event, thus making it non-pending. By means of
 * Event::add() method it could be added again.
 * @link https://www.php.net/manual/en/class.event.php
 */
final class Event {

    /* Constants */
    /**
     * Indicates that the event should be edge-triggered, if the underlying
     * event base backend supports edge-triggered events. This affects the
     * semantics of Event::READ and Event::WRITE .
     *
     * @var integer ET
     */
    const ET = 32 ;

    /**
     * Indicates that the event is persistent. See About event persistence .
     * About event persistence https://www.php.net/manual/en/event.persistence.php
     *
     * @var integer PERSIST
     */
    const PERSIST = 16 ;

    /**
     * This flag indicates an event that becomes active when the provided file
     * descriptor(usually a stream resource, or socket) is ready for reading.
     *
     * @var integer READ
     */
    const READ = 2 ;

    /**
     * This flag indicates an event that becomes active when the provided file
     * descriptor(usually a stream resource, or socket) is ready for reading.
     *
     * @var integer WRITE
     */
    const WRITE = 4 ;

    /**
     * Used to implement signal detection. See "Constructing signal events" below.
     *
     * @var integer SIGNAL
     */
    const SIGNAL = 8 ;

    /**
     * This flag indicates an event that becomes active after a timeout elapses.
     *
     * The Event::TIMEOUT flag is ignored when constructing an event: one can
     * either set a timeout when event is added , or not. It is set in the
     * $what argument to the callback function when a timeout has occurred.
     *
     * @var integer TIMEOUT
     */
    const TIMEOUT = 1 ;

    /* Properties */
    /**
     * Whether event is pending. See About event persistence .
     * About event persistence https://www.php.net/manual/en/event.persistence.php
     *
     * @readonly
     * @var bool    $pending
     */
    public $pending ;

    /* Methods */
    /**
     * Marks event pending. Non-pending event will never occur, and the event
     * callback will never be called. In conjuction with Event::del() an event
     * could be re-scheduled by user at any time.
     *
     * If Event::add() is called on an already pending event, libevent will
     * leave it pending and re-schedule it with the given timeout(if specified).
     * If in this case timeout is not specified, Event::add() has no effect.
     * @link https://www.php.net/manual/en/event.add.php
     *
     * @param float $timeout    [optional] Timeout in seconds.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE
     */
    public function add ($timeout) {}

    /**
     * Event::addSignal() is an alias of Event::add()
     * @link https://www.php.net/manual/en/event.addsignal.php
     *
     * @param float $timeout    Timeout in seconds.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE
     */
    public function addSignal ($timeout) {}

    /**
     * Event::addTimer() is an alias of Event::add()
     * @link https://www.php.net/manual/en/event.addtimer.php
     *
     * @param float|NULL $timeout [optional]
     * @return bool
     */
    public function addTimer (float $timeout = NULL ) {}

    /**
     * Event constructor.
     *
     * @param EventBase  $base The event base to associate with.
     * @param mixed $fd stream resource, socket resource, or numeric file
     *                  descriptor. For timer events pass -1 . For signal events
     *                  pass the signal number, e.g. SIGHUP .
     * @param int        $what Event flags. See Event flags .
     * @param callable   $cb The event callback. See Event callbacks .
     * @param mixed|NULL $arg [optional] Custom data. If specified, it will be
     *                         passed to the callback when event triggers.
     * @return Event
     */
    public function __construct ( EventBase $base , mixed $fd , int $what , callable $cb , mixed $arg = NULL ) {}

    /**
     * Removes an event from the set of monitored events, i.e. makes it
     * non-pending.
     * @link https://www.php.net/manual/en/event.del.php
     *
     * @return bool Returns TRUE on success. Otherwise FALSE
     */
    public function del () {}

    /**
     * Event::delSignal() is an alias of Event::del()
     * @link https://www.php.net/manual/en/event.delsignal.php
     *
     * @return bool Returns TRUE on success. Otherwise FALSE
     */
    public function delSignal () {}

    /**
     * Event::delTimer() is an alias of Event::del() .
     * @link https://www.php.net/manual/en/event.deltimer.php
     *
     * @return bool Returns TRUE on success. Otherwise FALSE
     */
    public function delTimer () {}

    /**
     * Removes event from the list of events monitored by libevent, and free
     * resources allocated for the event.
     * Warning : The Event::free() method currently doesn't destruct the object
     * itself. To destruct the object completely call unset() , or assign NULL.
     * @link https://www.php.net/manual/en/event.free.php
     */
    public function free () {}

    /**
     * Returns array with of the names of the methods(backends) supported in
     * this version of Libevent.
     * @link https://www.php.net/manual/en/event.getsupportedmethods.php
     *
     * @return array Returns array.
     */
    public static function getSupportedMethods () {}

    /**
     * Detects whether event is pending or scheduled
     * @link https://www.php.net/manual/en/event.pending.php
     *
     * @param int $flags One of, or a composition of the following constants:
     *                   Event::READ , Event::WRITE , Event::TIMEOUT ,
     *                   Event::SIGNAL .
     * @return bool Returns TRUE if event is pending or scheduled. Otherwise FALSE.
     */
    public function pending ( int $flags ) {}

    /**
     * Re-configures event. Note, this function doesn't invoke obsolete
     * libevent's event_set. It calls event_assign instead.
     * @link https://www.php.net/manual/en/event.set.php
     *
     * @param EventBase     $base The event base to associate the event with.
     * @param mixed $fd Stream resource, socket resource, or numeric
     *                  file descriptor. For timer events pass -1 . For signal
     *                  events pass the signal number, e.g. SIGHUP .
     * @param int|NULL      $what [optional] See Event flags .
     * @param callable|NULL $cb [optional] The event callback. See Event callbacks .
     * @param mixed|NULL $arg [optional] Custom data associated with the
     *                        event. It will be passed to the callback when the
     *                        event becomes active.
     *
     * @return bool Returns TRUE if event is pending or scheduled. Otherwise FALSE.
     */
    public function set ( EventBase $base , mixed $fd , int $what = NULL , callable $cb = NULL , mixed $arg = NULL ) {}

    /**
     * Set event priority.
     * @link https://www.php.net/manual/en/event.setpriority.php
     *
     * @param int $priority The event priority.
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function setPriority ( int $priority ) {}

    /**
     * Re-configures timer event. Note, this function doesn't invoke obsolete
     * libevent's event_set . It calls event_assign instead.
     *
     * @link https://www.php.net/manual/en/event.settimer.php
     *
     * @param EventBase  $base The event base to associate with.
     * @param callable   $cb The timer event callback. See Event callbacks .
     * @param mixed|NULL $arg [optional] Custom data. If specified, it will be
     *                        passed to the callback when event triggers.
     *
     * @return bool Returns TRUE if event is pending or scheduled. Otherwise FALSE.
     */
    public function setTimer ( EventBase $base , callable $cb , mixed $arg = NULL ) {}

    /**
     * Constructs signal event object. This is a straightforward method to
     * create a signal event. Note, the generic Event::__construct() method can
     * contruct signal event objects too.
     *
     * @link https://www.php.net/manual/en/event.signal.php
     *
     * @param EventBase  $base The associated event base object.
     * @param int        $signum The signal number.
     * @param callable   $cb The signal event callback. See Event callbacks .
     * @param mixed|NULL $arg [optional] Custom data. If specified, it will be
     *                        passed to the callback when event triggers.
     *
     * @return Event Returns Event object on success. Otherwise FALSE.
     */
    public static function signal ( EventBase $base , int $signum , callable $cb , mixed $arg = NULL) {}

    /**
     * Constructs timer event object. This is a straightforward method to create
     * a timer event. Note, the generic Event::__construct() method can contruct
     * signal event objects too.
     *
     * @param EventBase  $base The associated event base object.
     * @param callable   $cb The signal event callback. See Event callbacks .
     * @param mixed|NULL $arg [optional] Custom data. If specified, it will be
     *                        passed to the callback when event triggers.
     *
     * @return Event Returns Event object on success. Otherwise FALSE.
     */
    public static function timer ( EventBase $base , callable $cb , mixed $arg = NULL ) {}

}
