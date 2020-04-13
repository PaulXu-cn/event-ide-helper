<?php

/**
 * Class EventUtil
 * EventUtil is a singleton with supplimentary methods and constants.
 * @link https://www.php.net/manual/en/class.eventutil.php
 */
final class EventUtil {

    /* Constants */
    /**
     * IPv4 address family
     *
     * @var integer AF_INET
     */
    const AF_INET = 2 ;

    /**
     * IPv6 address family
     *
     * @var integer AF_INET6
     */
    const AF_INET6 = 10 ;

    /**
     * Unspecified IP address family
     *
     * @var integer AF_UNSPEC
     */
    const AF_UNSPEC = 0 ;

    /**
     * Libevent' version number at the time when Event extension had been
     * compiled with the library.
     *
     * @var integer LIBEVENT_VERSION_NUMBER
     */
    const LIBEVENT_VERSION_NUMBER = 33559808 ;

    /**
     * Socket option. Enable socket debugging. Only allowed for processes with
     * the CAP_NET_ADMIN capability or an effective user ID of 0 . (Added in
     * event-1.6.0.)
     *
     * @var integer SO_DEBUG
     */
    const SO_DEBUG = 1 ;

    /**
     * Socket option. Indicates that the rules used in validating addresses
     * supplied in a bind(2) call should allow reuse of local addresses. See the
     * socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_REUSEADDR
     */
    const SO_REUSEADDR = 2 ;

    /**
     * Socket option. Enable sending of keep-alive messages on
     * connection-oriented sockets. Expects an integer boolean flag. See the
     * socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_KEEPALIVE
     */
    const SO_KEEPALIVE = 9 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_DONTROUTE
     */
    const SO_DONTROUTE = 5 ;

    /**
     * Socket option. When enabled, a close(2) or shutdown(2) will not return
     * until all queued messages for the socket have been successfully sent or
     * the linger timeout has been reached. Otherwise, the call returns
     * immediately and the closing is done in the background. See the socket(7)
     * manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_LINGER
     */
    const SO_LINGER = 13 ;

    /**
     * Socket option. Reports whether transmission of broadcast messages is
     * supported. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_BROADCAST
     */
    const SO_BROADCAST = 6 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_OOBINLINE
     */
    const SO_OOBINLINE = 10 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_SNDBUF
     */
    const SO_SNDBUF = 7 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_RCVBUF
     */
    const SO_RCVBUF = 8 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_SNDLOWAT
     */
    const SO_SNDLOWAT = 19 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_RCVLOWAT
     */
    const SO_RCVLOWAT = 18 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_SNDTIMEO
     */
    const SO_SNDTIMEO = 21 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_RCVTIMEO
     */
    const SO_RCVTIMEO = 20 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_TYPE
     */
    const SO_TYPE = 3 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SO_ERROR
     */
    const SO_ERROR = 4 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SOL_SOCKET
     */
    const SOL_SOCKET = 1 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SOL_TCP
     */
    const SOL_TCP = 6 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer SOL_UDP
     */
    const SOL_UDP = 17 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer IPPROTO_IP
     */
    const IPPROTO_IP = 0 ;

    /**
     * Socket option. See the socket(7) manual page. (Added in event-1.6.0.)
     *
     * @var integer IPPROTO_IPV6
     */
    const IPPROTO_IPV6 = 41 ;

    /**
     * EventUtil constructor.
     * EventUtil is a singleton. Therefore the constructor is abstract, and it
     * is impossible to create objects based on this class.
     * @link https://www.php.net/manual/en/eventutil.construct.php
     */
    public abstract function __construct ();

    /**
     * Returns the most recent socket error number( errno ).
     * @link https://www.php.net/manual/en/eventutil.getlastsocketerrno.php
     *
     * @param mixed|NULL $socket Socket resource, stream or a file descriptor
     *                           of a socket.
     *
     * @return int Returns the most recent socket error number( errno ).
     */
    public static function getLastSocketErrno ( mixed $socket = NULL ) {}

    /**
     * Returns the most recent socket error.
     *
     * @link https://www.php.net/manual/en/eventutil.getlastsocketerror.php
     *
     * @param mixed $socket Socket resource, stream or a file descriptor of
     *                      a socket.
     * @return string Returns the most recent socket error.
     */
    public static function getLastSocketError ( mixed $socket ) {}

    /**
     * Returns numeric file descriptor of a socket or stream specified by
     * socket argument just like the Event extension does it internally for
     * all methods accepting socket resource or stream.
     * @link https://www.php.net/manual/en/eventutil.getsocketfd.php
     *
     * @param mixed $socket Socket resource or stream.
     *
     * @return int Returns numeric file descriptor of a socket, or stream.
     *              EventUtil::getSocketFd() returns FALSE in case if it is
     *              whether failed to recognize the type of the underlying file,
     *              or detected that the file descriptor associated with socket
     *              is not valid.
     */
    public static function getSocketFd ( mixed $socket ) {}

    /**
     * Retreives the current address to which the socket is bound.
     * @link https://www.php.net/manual/en/eventutil.getsocketname.php
     *
     * @param mixed $socket Socket resource, stream or a file descriptor of
     *                      a socket.
     * @param string $address Output parameter. IP-address, or the UNIX domain
     *                        socket path depending on the socket address family
     * @param mixed $port Output parameter. The port the socket is bound to.
     *                    Has no meaning for UNIX domain sockets.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public static function getSocketName ( mixed $socket , string &$address , mixed &$port ) {}

    /**
     * Sets socket options.
     * @link https://www.php.net/manual/en/eventutil.setsocketoption.php
     *
     * @param mixed $socket Socket resource, stream, or numeric file descriptor
     *                      associated with the socket.
     * @param int $level    One of EventUtil::SOL_* constants. Specifies
     *                      the protocol level at which the option resides.
     *                      For example, to retrieve options at the socket level,
     *                      a level parameter of EventUtil::SOL_SOCKET would
     *                      be used. Other levels, such as TCP, can be used by
     *                      specifying the protocol number of that level.
     *                      Protocol numbers can be found by using the
     *                      getprotobyname() function. See EventUtil constants.
     * @param int $optname  Option name(type). Has the same meaning as
     *                      corresponding parameter of socket_get_option()
     *                      function. See EventUtil constants
     * @param mixed $optval Accepts the same values as optval parameter of the
     *                      socket_get_option() function.
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public static function setSocketOption ( mixed $socket , int $level , int $optname , mixed $optval ) {}

    /**
     * Generates entropy by means of OpenSSL's RAND_poll() (see the system
     * manual).
     * @link https://www.php.net/manual/en/eventutil.sslrandpoll.php
     */
    public static function sslRandPoll () {}
}
