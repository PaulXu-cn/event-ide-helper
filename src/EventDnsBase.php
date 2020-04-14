<?php

/**
 * Class EventDnsBase
 * Represents Libevent's DNS base structure. Used to resolve DNS asyncronously,
 * parse configuration files like resolv.conf etc.
 * @link https://www.php.net/manual/en/class.eventdnsbase.php
 */
final class EventDnsBase {
    
    /* Constants */
    /**
     * @var integer
     */
    const OPTION_SEARCH = 1 ;

    /**
     * @var integer
     */
    const OPTION_NAMESERVERS = 2 ;

    /**
     * @var integer
     */
    const OPTION_MISC = 4 ;

    /**
     * @var integer
     */
    const OPTION_HOSTSFILE = 8 ;

    /**
     * @var integer
     */
    const OPTIONS_ALL = 15 ;
    /* Methods */
    public function addNameserverIp ( string $ip ) : bool
    public function addSearch ( string $domain ) {}
    public function clearSearch ( void ) {}
    public function __construct ( EventBase $base , bool $initialize )
    public function countNameservers ( void ) : int
    public function loadHosts ( string $hosts ) : bool
    public function parseResolvConf ( int $flags , string $filename ) : bool
    public function setOption ( string $option , string $value ) : bool
    public function setSearchNdots ( int $ndots ) : bool
}