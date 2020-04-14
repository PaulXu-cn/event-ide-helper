<?php

/**
 * Class EventHttp
 * Represents HTTP server.
 * @link https://www.php.net/manual/en/class.eventhttp.php
 */
final class EventHttp {

    /* Methods */
    /**
     * Makes an HTTP server accept connections on the specified socket stream or
     * resource. The socket should be ready to accept connections.
     * Can be called multiple times to accept connections on different sockets.
     * Note:
     * To bind a socket, listen , and accept connections on the socket in s
     * single call use EventHttp::bind() . EventHttp::accept() is needed only if
     * one already has a socket ready to accept connections.
     * @link https://www.php.net/manual/en/eventhttp.accept.php
     *
     * @param mixed $socket Socket resource, stream or numeric file descriptor
     *                      representing a socket ready to accept connections.
     * @return bool
     */
    public function accept ( mixed $socket ) {}

    /**
     * Adds a server alias to the HTTP server object.
     * @link https://www.php.net/manual/en/eventhttp.addserveralias.php
     *
     * @param string $alias The alias to add.
     * @return bool
     */
    public function addServerAlias ( string $alias ) {}

    /**
     * Binds an HTTP server on the specified address and port.
     * Can be called multiple times to bind the same HTTP server to multiple
     * different ports.
     * @link https://www.php.net/manual/en/eventhttp.bind.php
     *
     * @param string $address A string containing the IP address to listen(2) on
     * @param int    $port The port number to listen on.
     */
    public function bind ( string $address , int $port ) {}

    /**
     * EventHttp constructor.
     *
     * @link https://www.php.net/manual/en/eventhttp.construct.php
     *
     * @param EventBase            $base Associated event base.
     * @param EventSslContext|NULL $ctx [optional] EventSslContext class object.
     *                                  Turns plain HTTP server into HTTPS
     *                                  server. It means that if ctx is
     *                                  configured correctly, then the
     *                                  underlying buffer events will be based
     *                                  on OpenSSL sockets. Thus, all traffic
     *                                  will pass through the SSL or TLS.
     *                                  Note: This parameter is available only
     *                                  if Event is compiled with OpenSSL
     *                                  support and only with Libevent
     *                                  2.1.0-alpha and higher.
     *
     * @return EventHttp Returns EventHttp object.
     */
    public function __construct ( EventBase $base , EventSslContext $ctx = NULL ) {}

    /**
     * Removes server alias added with EventHttp::addServerAlias()
     * @link https://www.php.net/manual/en/eventhttp.removeserveralias.php
     * @param string $alias The alias to remove.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function removeServerAlias ( string $alias ) {}

    /**
     * Sets the what HTTP methods are supported in requests accepted by this
     * server, and passed to user callbacks
     * If not supported they will generate a "405 Method not allowed" response.
     *
     * By default this includes the following methods: GET , POST , HEAD , PUT ,
     * DELETE . See EventHttpRequest::CMD_* constants.
     * @link https://www.php.net/manual/en/eventhttp.setallowedmethods.php
     *
     * @param int $methods A bit mask of EventHttpRequest::CMD_* constants .
     */
    public function setAllowedMethods ( int $methods ) {}

    /**
     * Sets a callback for specified URI.
     *
     * @link https://www.php.net/manual/en/eventhttp.setcallback.php
     *
     * @param string $path The path for which to invoke the callback.
     * @param string $cb   The callback callable that gets invoked on requested
     *                     path . It should match the following prototype:
     *                     callback ([ EventHttpRequest $req = NULL
     *                     [, mixed $arg = NULL ]] ) : void
     * @param string $arg [optional] Custom data.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function setCallback ( string $path , string $cb , string $arg = '' ) {}

    /**
     * Sets default callback to handle requests that are not caught by specific
     * callbacks
     *
     * @link https://www.php.net/manual/en/eventhttp.setdefaultcallback.php
     *
     * @param string $cb The callback callable . It should match the following
     *                   prototype:
     *                   callback ([ EventHttpRequest $req = NULL
     *                   [, mixed $arg = NULL ]] ) : void
     * @param string $arg User custom data passed to the callback.
     *                    
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function setDefaultCallback ( string $cb , string $arg = '' ) {}

    /**
     * Sets maximum request body size.
     * @link https://www.php.net/manual/en/eventhttp.setmaxbodysize.php
     *
     * @param int $value The body size in bytes.
     */
    public function setMaxBodySize ( int $value ) {}

    /**
     * Sets maximum HTTP header size.
     * @link https://www.php.net/manual/en/eventhttp.setmaxheaderssize.php
     *       
     * @param int $value The header size in bytes.
     */
    public function setMaxHeadersSize ( int $value ) {}

    /** 
     * Sets the timeout for an HTTP request.
     * @link https://www.php.net/manual/en/eventhttp.settimeout.php
     *
     * @param int $value The timeout in seconds.
     */
    public function setTimeout ( int $value ) {}

}