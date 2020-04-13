<?php

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
     *
     */
    public function addTimer ([ float $timeout ] ) : bool
    public function __construct ( EventBase $base , mixed $fd , int $what , callable $cb [, mixed $arg = NULL ] )
    public function del ( void ) : bool
    public function delSignal ( void ) : bool
    public function delTimer ( void ) : bool
    public function free ( void ) : void
    public function static getSupportedMethods ( void ) : array
    public function pending ( int $flags ) : bool
    public function set ( EventBase $base , mixed $fd [, int $what [, callable $cb [, mixed $arg ]]] ) : bool
    public function setPriority ( int $priority ) : bool
    public function setTimer ( EventBase $base , callable $cb [, mixed $arg ] ) : bool
    public function static signal ( EventBase $base , int $signum , callable $cb [, mixed $arg ] ) : Event
    public function static timer ( EventBase $base , callable $cb [, mixed $arg ] ) : Event
}