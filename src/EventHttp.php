<?php

/**
 * Class EventHttp
 */
final class EventHttp {
    /* Methods */
    /**
     * @param mixed $socket
     * @return bool
     */
    public function accept ( mixed $socket ) {}

    /**
     * @param string $alias
     * @return bool
     */
    public function addServerAlias ( string $alias ) : bool
    public function bind ( string $address , int $port ) : void
    public function __construct ( EventBase $base [, EventSslContext $ctx = NULL ] )
    public function removeServerAlias ( string $alias ) : bool
    public function setAllowedMethods ( int $methods ) : void
    public function setCallback ( string $path , string $cb [, string $arg ] ) : void
    public function setDefaultCallback ( string $cb [, string $arg ] ) : void
    public function setMaxBodySize ( int $value ) : void
    public function setMaxHeadersSize ( int $value ) : void
    public function setTimeout ( int $value ) : void
}