<?php

/**
 * Class EventConfig
 * Represents configuration structure which could be used in construction of
 * the EventBase .
 * @link https://www.php.net/manual/en/class.eventconfig.php
 */
final class EventConfig {

    /* Constants */
    /**
     * Requires a backend method that supports edge-triggered I/O.
     *
     * @var integer FEATURE_ET
     */
    const FEATURE_ET = 1 ;

    /**
     * Requires a backend method where adding or deleting a single event,
     * or having a single event become active, is an O(1) operation.
     *
     * @var integer FEATURE_O1
     */
    const FEATURE_O1 = 2 ;

    /**
     * Requires a backend method that can support arbitrary file descriptor
     * types, and not just sockets.
     *
     * @var integer FEATURE_FDS
     */
    const FEATURE_FDS = 4 ;

    /* Methods */
    /**
     * Tells libevent to avoid specific event method(backend). See » Creating
     * an event base .
     * @link https://www.php.net/manual/en/eventconfig.avoidmethod.php
     *
     * @param string    $method The backend method to avoid. See EventConfig constants .
     */
    public function avoidMethod ( string $method ) {}

    /**
     * Constructs EventConfig object which could be passed to
     * EventBase::__construct() constructor.
     * @link https://www.php.net/manual/en/eventconfig.construct.php
     *
     * @return EventConfig Returns EventConfig object.
     */
    public function __construct () {}

    /**
     * Enters a required event method feature that the application demands
     * @link https://www.php.net/manual/en/eventconfig.requirefeatures.php
     *
     * @param int $feature Bitmask of required features. See
     *                     EventConfig::FEATURE_* constants
     *
     * @return bool
     */
    public function requireFeatures ( int $feature ) {}

    /**
     * Prevents priority inversion by limiting how many low-priority event
     * callbacks can be invoked before checking for more high-priority events.
     * Note:
     * Available since libevent 2.1.0-alpha .
     *
     * @link https://www.php.net/manual/en/eventconfig.setmaxdispatchinterval.php
     *
     * @param int $max_interval An interval after which Libevent should stop
     *                          running callbacks and check for more events,
     *                          or 0 , if there should be no such interval.
     * @param int $max_callbacks A number of callbacks after which Libevent
     *                          should stop running callbacks and check for
     *                          more events, or -1 , if there should be no such
     *                          limit.
     * @param int $min_priority A priority below which max_interval and
     *                          max_callbacks should not be enforced.
     *                          If this is set to 0 , they are enforced for
     *                          events of every priority; if it's set to 1 ,
     *                          they're enforced for events of priority 1 and
     *                          above, and so on.
     */
    public function setMaxDispatchInterval ( int $max_interval , int $max_callbacks , int $min_priority ) {}
    
}
