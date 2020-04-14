<?php

/**
 * Class EventBase
 * EventBase class represents libevent's event base structure. It holds a set of
 * events and can poll to determine which events are active.
 * Each event base has a method , or a backend that it uses to determine which
 * events are ready. The recognized methods are: select , poll , epoll , kqueue,
 * devpoll , evport and win32 .
 * To configure event base to use, or avoid specific backend EventConfig class
 * can be used.
 * Warning: Do NOT destroy the EventBase object as long as resources of the
 * associated Event objects are not released. Otherwise, it will lead to
 * unpredictable results!
 *
 * @link https://www.php.net/manual/en/class.eventbase.php
 */
final class EventBase {
    /* Constants */

    /**
     * @var integer Flag used with EventBase::loop() method which means: "block
     * until libevent has an active event, then exit once all active events have
     * had their callbacks run".
     */
    const LOOP_ONCE = 1 ;

    /**
     * Flag used with EventBase::loop() method which means: "do not block: see
     * which events are ready now, run the callbacks of the highest-priority
     * ones, then exit".
     *
     * @var integer
     */
    const LOOP_NONBLOCK = 2 ;

    /**
     * Configuration flag. Do not allocate a lock for the event base, even if we
     * have locking set up".
     *
     * @var integer
     */
    const NOLOCK = 1 ;

    /**
     * Windows-only configuration flag. Enables the IOCP dispatcher at startup.
     *
     * @var integer
     */
    const STARTUP_IOCP = 4 ;

    /**
     * Configuration flag. Instead of checking the current time every time the
     * event loop is ready to run timeout callbacks, check after each timeout
     * callback.
     *
     * @var integer
     */
    const NO_CACHE_TIME = 8 ;

    /**
     * If we are using the epoll backend, this flag says that it is safe to use
     * Libevent's internal change-list code to batch up adds and deletes in
     * order to try to do as few syscalls as possible.
     * Setting this flag can make code run faster, but it may trigger a Linux
     * bug: it is not safe to use this flag if one has any fds cloned by dup(),
     * or its variants. Doing so will produce strange and hard-to-diagnose bugs.
     * This flag can also be activated by settnig the EVENT_EPOLL_USE_CHANGELIST
     * environment variable.
     * This flag has no effect if one winds up using a backend other than epoll.
     *
     * @var integer
     */
    const EPOLL_USE_CHANGELIST = 16 ;

    /* Methods */
    /**
     * EventBase constructor.
     * @link https://www.php.net/manual/en/eventbase.construct.php
     *
     * @param EventConfig|NULL $cfg [optional] Optional EventConfig object.
     * @return EventBase
     */
    public function __construct ( EventConfig $cfg = NULL ) {}

    /**
     * Wait for events to become active, and run their callbacks. The same as
     * EventBase::loop() with no flags set.
     * Warning: Do NOT destroy the EventBase object as long as resources of the
     * associated Event objects are not released. Otherwise, it will lead to
     * unpredictable results!
     * @link https://www.php.net/manual/en/eventbase.dispatch.php
     */
    public function dispatch () {}

    /**
     * Tells event base to stop optionally after given number of seconds.
     * @link https://www.php.net/manual/en/eventbase.free.php
     *
     * @param float $timeout [optional] Optional number of seconds after which
     *                       the event base should stop dispatching events.
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function exit ( float $timeout = NULL ) {}

    /**
     * Deallocates resources allocated by libevent for the EventBase object.
     * Warning :The EventBase::free() method doesn't destruct the object itself.
     * To destruct the object completely call unset() , or assign NULL.
     * This method does not deallocate or detach any of the events that are
     * currently associated with the EventBase object, or close any of their
     * sockets - beware.
     * @link https://www.php.net/manual/en/eventbase.free.php
     */
    public function free () {}

    /**
     * Returns bitmask of features supported.
     *
     * @link https://www.php.net/manual/en/eventbase.getfeatures.php
     *
     * @return int Returns integer representing a bitmask of supported features.
     *             See EventConfig::FEATURE_* constants .
     */
    public function getFeatures () {}

    /**
     * Returns event method in use
     *
     * @return string String representing used event method(backend).
     */
    public function getMethod () {}

    /**
     * On success returns the current time(as returned by gettimeofday() ),
     * looking at the cached value in base if possible, and calling
     * gettimeofday() or clock_gettime() as appropriate if there is no cached
     * time.
     * @link https://www.php.net/manual/en/eventbase.gettimeofdaycached.php
     *
     * @return float Returns the current event base time. On failure returns NULL.
     */
    public function getTimeOfDayCached () {}

    /**
     * Checks if the event loop was told to exit by EventBase::exit() .
     *
     * @link https://www.php.net/manual/en/eventbase.gotexit.php
     *
     * @return bool Returns TRUE, event loop was told to exit by
     *              EventBase::exit() . Otherwise FALSE.
     */
    public function gotExit () {}

    /**
     * Checks if the event loop was told to exit by EventBase::stop() .
     *
     * @link https://www.php.net/manual/en/eventbase.gotstop.php
     *
     * @return bool Returns TRUE, event loop was told to stop by
     *              EventBase::stop() . Otherwise FALSE.
     */
    public function gotStop () {}

    /**
     * Wait for events to become active, and run their callbacks.
     * Warning : Do NOT destroy the EventBase object as long as resources of the
     * associated Event objects are not released. Otherwise, it will lead to
     * unpredictable results!
     *
     * @link https://www.php.net/manual/en/eventbase.loop.php
     *
     * @param int|NULL $flags [optional] Optional flags. One of
     *                        EventBase::LOOP_* constants. See EventBase
     *                        constants
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function loop ( int $flags = NULL ) {}

    /**
     * Sets number of priorities per event base.
     *
     * @link https://www.php.net/manual/en/eventbase.priorityinit.php
     *
     * @param int $n_priorities The number of priorities per event base.
     * @return bool Returns TRUE on success, otherwise FALSE.
     */
    public function priorityInit ( int $n_priorities ) {}

    /**
     * Re-initialize event base. Should be called after a fork.
     * @link https://www.php.net/manual/en/eventbase.reinit.php
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function reInit () {}

    /**
     * Tells event_base to stop dispatching events
     * @link https://www.php.net/manual/en/eventbase.stop.php
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function stop () {}

}
