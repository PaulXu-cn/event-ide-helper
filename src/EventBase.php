<?php

final EventBase {
    /* Constants */

    /**
     * @var integer
     */
    const LOOP_ONCE = 1 ;

    /**
     * @var integer
     */
    const LOOP_NONBLOCK = 2 ;

    /**
     * @var integer
     */
    const NOLOCK = 1 ;

    /**
     * @var integer
     */
    const STARTUP_IOCP = 4 ;

    /**
     * @var integer
     */
    const NO_CACHE_TIME = 8 ;

    /**
     * @var integer
     */
    const EPOLL_USE_CHANGELIST = 16 ;
    /* Methods */
    public function __construct ([ EventConfig $cfg ] )
    public function dispatch ( void ) {}
    public function exit ([ float $timeout ] ) : bool
    public function free ( void ) {}
    public function getFeatures ( void ) : int
    public function getMethod ( void ) : string
    public function getTimeOfDayCached ( void ) : float
    public function gotExit ( void ) : bool
    public function gotStop ( void ) : bool
    public function loop ([ int $flags ] ) : bool
    public function priorityInit ( int $n_priorities ) : bool
    public function reInit ( void ) : bool
    public function stop ( void ) : bool
}