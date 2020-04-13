<?php

/**
 * Class EventHttpConnection
 */
class EventHttpConnection {
    /* Methods */

    /**
     * EventHttpConnection constructor.
     *
     * @param EventBase            $base
     * @param EventDnsBase         $dns_base
     * @param string               $address
     * @param int                  $port
     * @param EventSslContext|NULL $ctx
     */
    public function __construct ( EventBase $base , EventDnsBase $dns_base , string $address , int $port , EventSslContext $ctx = NULL ) {}

    /**
     * @param void $
     * @return EventBase
     */
    public function getBase () {}

    /**
     * @param string $address
     * @param int    $port
     */
    public function getPeer ( string &$address , int &$port ) {}

    /**
     * @param EventHttpRequest $req
     * @param int              $type
     * @param string           $uri
     * @return bool
     */
    public function makeRequest ( EventHttpRequest $req , int $type , string $uri ) {}

    /**
     * @param callable   $callback
     * @param mixed|NULL $data
     */
    public function setCloseCallback ( callable $callback , mixed $data = NULL ) {}

    /**
     * @param string $address
     */
    public function setLocalAddress ( string $address ) {}

    /**
     * @param int $port
     */
    public function setLocalPort ( int $port ) {}

    /**
     * @param string $max_size
     */
    public function setMaxBodySize ( string $max_size ) {}

    /**
     * @param string $max_size
     */
    public function setMaxHeadersSize ( string $max_size ) {}

    /**
     * @param int $retries
     */
    public function setRetries ( int $retries ) {}

    /**
     * @param int $timeout
     */
    public function setTimeout ( int $timeout ) {}
}