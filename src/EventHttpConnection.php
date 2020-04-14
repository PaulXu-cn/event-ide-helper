<?php

/**
 * Class EventHttpConnection
 * @link https://www.php.net/manual/en/class.eventhttpconnection.php
 */
class EventHttpConnection {

    /* Methods */
    /**
     * EventHttpConnection constructor.
     *
     * @param EventBase            $base Associated event base.
     * @param EventDnsBase $dns_base If dns_base is NULL, hostname
     *                               resolution will block.
     * @param string               $address The address to connect to.
     * @param int                  $port The port to connect to.
     * @param EventSslContext|NULL $ctx EventSslContext class object. Enables
     *                                  OpenSSL.
     */
    public function __construct ( EventBase $base , EventDnsBase $dns_base , string $address , int $port , EventSslContext $ctx = NULL ) {}

    /**
     * Returns event base associated with the connection.
     *
     * @return EventBase On success returns EventBase object associated with the connection. Otherwise FALSE.
     */
    public function getBase () {}

    /**
     * Gets the remote address and port associated with the connection
     * @link https://www.php.net/manual/en/eventhttpconnection.getpeer.php
     *
     * @param string $address Address of the peer.
     * @param int    $port Port of the peer.
     */
    public function getPeer ( string &$address , int &$port ) {}

    /**
     * Makes an HTTP request over the specified connection. type is one of EventHttpRequest::CMD_* constants.
     *
     * @link https://www.php.net/manual/en/eventhttpconnection.makerequest.php
     *
     * @param EventHttpRequest $req The connection object over which to send
     *                              the request.
     * @param int              $type One of EventHttpRequest::CMD_* constants .
     * @param string           $uri The URI associated with the request.
     * @return bool
     */
    public function makeRequest ( EventHttpRequest $req , int $type , string $uri ) {}

    /**
     * Sets callback for connection close.
     *
     * @link https://www.php.net/manual/en/eventhttpconnection.setclosecallback.php
     *
     * @param callable $callback Callback which is called when connection is
     *                           closed. Should match the following prototype:
     *                           callback ([ EventHttpConnection $conn = NULL
     *                           [, mixed $arg = NULL ]] ) : void
     * @param mixed|NULL $data [optional]
     */
    public function setCloseCallback ( callable $callback , mixed $data = NULL ) {}

    /**
     * Sets the IP address from which http connections are made.
     *
     * @link https://www.php.net/manual/en/eventhttpconnection.setlocaladdress.php
     *
     * @param string $address The IP address from which HTTP connections
     *                        are made.
     */
    public function setLocalAddress ( string $address ) {}

    /**
     * Sets the local port from which connections are made.
     * @link https://www.php.net/manual/en/eventhttpconnection.setlocalport.php
     *
     * @param int $port The port number.
     */
    public function setLocalPort ( int $port ) {}

    /**
     * Sets maximum body size for the connection.
     * @link https://www.php.net/manual/en/eventhttpconnection.setmaxbodysize.php
     *
     * @param string $max_size The maximum body size in bytes.
     */
    public function setMaxBodySize ( string $max_size ) {}

    /**
     * Sets maximum header size for the connection.
     * @link https://www.php.net/manual/en/eventhttpconnection.setmaxheaderssize.php
     *
     * @param string $max_size The maximum header size in bytes.
     */
    public function setMaxHeadersSize ( string $max_size ) {}

    /**
     * Sets the retry limit for the connection
     * @link https://www.php.net/manual/en/eventhttpconnection.setretries.php
     *
     * @param int $retries The retry limit. -1 means infinity.
     */
    public function setRetries ( int $retries ) {}

    /**
     * Sets the timeout for the connection
     * @link https://www.php.net/manual/en/eventhttpconnection.settimeout.php
     *
     * @param int $timeout Timeout in seconds.
     */
    public function setTimeout ( int $timeout ) {}

}
