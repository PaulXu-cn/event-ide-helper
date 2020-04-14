<?php

/**
 * Class EventBufferEvent
 * Represents Libevent's buffer event.
 * Usually an application wants to perform some amount of data buffering in
 * addition to just responding to events. When we want to write data,
 * for example, the usual pattern looks like:
 * Decide that we want to write some data to a connection; put that data in a
 * buffer.
 * Wait for the connection to become writable
 * Write as much of the data as we can
 * Remember how much we wrote, and if we still have more data to write,
 * wait for the connection to become writable again.
 * This buffered I/O pattern is common enough that Libevent provides a generic
 * mechanism for it. A "buffer event" consists of an underlying transport
 * (like a socket), a read buffer, and a write buffer. Instead of
 * regular events, which give callbacks when the underlying transport is ready
 * to be read or written, a buffer event invokes its user-supplied callbacks
 * when it has read or written enough data.
 * @link https://www.php.net/manual/en/class.eventbufferevent.php
 */
final class EventBufferEvent {

    /* Constants */
    /**
     * An event occurred during a read operation on the bufferevent. See the
     * other flags for which event it was.
     *
     * @var integer READING
     */
    const READING = 1 ;

    /**
     * An event occurred during a write operation on the bufferevent.
     * See the other flags for which event it was.
     *
     * @var integer WRITING
     */
    const WRITING = 2 ;

    /**
     * Got an end-of-file indication on the buffer event.
     *
     * @var integer EOF
     */
    const EOF = 16 ;

    /**
     * An error occurred during a bufferevent operation. For more information
     * on what the error was, call EventUtil::getLastSocketErrno() and/or
     * EventUtil::getLastSocketError() .
     *
     * @var integer ERROR
     */
    const ERROR = 32 ;

    /**
     * @var integer TIMEOUT
     */
    const TIMEOUT = 64 ;

    /**
     * Finished a requested connection on the bufferevent.
     *
     * @var integer CONNECTED
     */
    const CONNECTED = 128 ;

    /**
     * When the buffer event is freed, close the underlying transport. This
     * will close an underlying socket, free an underlying buffer event, etc.
     *
     * @var integer OPT_CLOSE_ON_FREE
     */
    const OPT_CLOSE_ON_FREE = 1 ;

    /**
     * Automatically allocate locks for the bufferevent, so that it’s safe to
     * use from multiple threads.
     *
     * @var integer OPT_THREADSAFE
     */
    const OPT_THREADSAFE = 2 ;

    /**
     * When this flag is set, the bufferevent defers all of its callbacks.
     * See » Fast portable non-blocking network programming with Libevent,
     * Deferred callbacks .
     *
     * @var integer OPT_DEFER_CALLBACKS
     */
    const OPT_DEFER_CALLBACKS = 4 ;

    /**
     * By default, when the bufferevent is set up to be threadsafe,
     * the buffer event’s locks are held whenever the any user-provided
     * callback is invoked. Setting this option makes Libevent release
     * the buffer event’s lock when it’s invoking the callbacks.
     *
     * @var integer OPT_UNLOCK_CALLBACKS
     */
    const OPT_UNLOCK_CALLBACKS = 8 ;

    /**
     * The SSL handshake is done
     *
     * @var integer SSL_OPEN
     */
    const SSL_OPEN = 0 ;

    /**
     * SSL is currently performing negotiation as a client
     *
     * @var integer SSL_CONNECTING
     */
    const SSL_CONNECTING = 1 ;

    /**
     * SSL is currently performing negotiation as a server
     *
     * @var integer SSL_ACCEPTING
     */
    const SSL_ACCEPTING = 2 ;

    /* Properties */
    /**
     * Numeric file descriptor associated with the buffer event. Normally
     * represents a bound socket. Equals to NULL, if there is no file
     * descriptor(socket) associated with the buffer event.
     *
     * @var int $fd
     */
    public integer $fd ;

    /**
     * The priority of the events used to implement the buffer event.
     *
     * @var int $priority
     */
    public integer $priority ;

    /**
     * Underlying input buffer object( EventBuffer )
     *
     * @var EventBuffer $input
     */
    public EventBuffer $input ;

    /**
     * Underlying output buffer object( EventBuffer )
     *
     * @var EventBuffer $output
     */
    public EventBuffer $output ;

    /* Methods */
    /**
     * Closes file descriptor associated with the current buffer event.
     *
     * This method may be used in cases when the
     * EventBufferEvent::OPT_CLOSE_ON_FREE option is not appropriate.
     * @link https://www.php.net/manual/en/eventbufferevent.close.php
     */
    public function close () {}

    /**
     * Connect buffer event's file descriptor to given address(optionally with
     * port), or a UNIX domain socket.
     *
     * If socket is not assigned to the buffer event, this function allocates
     * a new socket and makes it non-blocking internally.
     *
     * To resolve DNS names(asyncronously), use EventBufferEvent::connectHost()
     * method.
     *
     * @link https://www.php.net/manual/en/eventbufferevent.connect.php
     *
     * @param string $addr Should contain an IP address with optional port
     *                     number, or a path to UNIX domain socket. Recognized
     *                     formats are:
     *                     [IPv6Address]:port
     *                     [IPv6Address]
     *                     IPv6Address
     *                     IPv4Address:port
     *                     IPv4Address
     *                     unix:path
     *                     Note, 'unix:' prefix is currently not case sensitive.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function connect ( string $addr ) {}

    /**
     * Resolves the DNS name hostname, looking for addresses of type family
     * ( EventUtil::AF_* constants). If the name resolution fails, it invokes
     * the event callback with an error event. If it succeeds, it launches a
     * connection attempt just as EventBufferEvent::connect() would.
     *
     * dns_base is optional. May be NULL, or an object created with
     * EventDnsBase::__construct().For asyncronous hostname resolving pass a
     * valid event dns base resource.Otherwise the hostname resolving will block
     * EventBufferEvent constructor.
     *
     * @param EventDnsBase $dns_base Object of EventDnsBase in case if DNS is to
     *                               be resolved asyncronously. Otherwise NULL.
     * @param string $hostname Hostname to connect to. Recognized formats are:
     *                              www.example.com (hostname)
     *                              1.2.3.4 (ipv4address)
     *                              ::1 (ipv6address)
     *                              [::1] ([ipv6address])
     * @param int           $port Port number
     * @param int $family            Address family. EventUtil::AF_UNSPEC ,
     *                               EventUtil::AF_INET , or EventUtil::AF_INET6
     *                               See EventUtil constants .
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function connectHost ( EventDnsBase $dns_base , string $hostname , int $port , int $family = EventUtil::AF_UNSPEC ) {}

    /**
     * EventBufferEvent constructor.
     * Create a buffer event on a socket, stream or a file descriptor. Passing
     * NULL to socket means that the socket should be created later, e.g.
     * by means of EventBufferEvent::connect() .
     *
     * @link https://www.php.net/manual/en/eventbufferevent.construct.php
     *
     * @param EventBase $base Event base that should be associated with
     *                        the new buffer event.
     * @param mixed|NULL $socket May be created as a stream(not necessarily
     *                           by means of sockets extension)
     * @param int $options One of EventBufferEvent::OPT_* constants, or 0 .
     * @param callable|NULL $readcb Read event callback.
     *                              See About buffer event callbacks .
     * @param callable|NULL $writecb Write event callback.
     *                               See About buffer event callbacks .
     * @param callable|NULL $eventcb Status-change event callback.
     *                               See About buffer event callbacks .
     */
    public function __construct ( EventBase $base , mixed $socket = NULL , int $options = 0 , callable $readcb = NULL , callable $writecb = NULL , callable $eventcb = NULL  ) {}

    /**
     * Returns array of two EventBufferEvent objects connected to each other.
     * All the usual options are supported, except for
     * EventBufferEvent::OPT_CLOSE_ON_FREE , which has no effect, and
     * EventBufferEvent::OPT_DEFER_CALLBACKS , which is always on.
     *
     * @link https://www.php.net/manual/en/eventbufferevent.createpair.php
     *
     * @param EventBase $base   Associated event base
     * @param int       $options EventBufferEvent::OPT_* constants combined
     *                           with bitwise OR operator.
     *
     * @return array Returns array of two EventBufferEvent objects connected
     *               to each other.
     */
    public static function  createPair ( EventBase $base , int $options = 0  ) {}

    /**
     * Disable events Event::READ , Event::WRITE , or Event::READ | Event::WRITE
     * on a buffer event.
     * @link https://www.php.net/manual/en/eventbufferevent.disable.php
     *
     * @param int $events
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function disable ( int $events ) {}

    /**
     * Enable events Event::READ , Event::WRITE , or Event::READ | Event::WRITE
     * on a buffer event.
     *
     * @link https://www.php.net/manual/en/eventbufferevent.enable.php
     *
     * @param int $events Event::READ , Event::WRITE , or Event::READ |
     *                    Event::WRITE on a buffer event.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function enable ( int $events ) {}

    /**
     * Free resources allocated by buffer event.
     *
     * Usually there is no need to call this method, since normally it is done
     * within internal object destructors. However, sometimes we have a
     * long-time script allocating lots of instances, or a script with a
     * heavy memory usage, where we need to free resources as soon as possible.
     * In such cases EventBufferEvent::free() may be used to protect the script
     * against running up to the memory_limit .
     *
     */
    public function free () {}

    /**
     * Returns string describing the last failed DNS lookup attempt made by
     * EventBufferEvent::connectHost() , or an empty string, if there is no
     * DNS error detected.
     *
     * @link https://www.php.net/manual/en/eventbufferevent.getdnserrorstring.php
     *
     * @return string Returns a string describing DNS lookup error, or an empty
     *                string for no error.
     */
    public function getDnsErrorString () {}

    /**
     * Returns bitmask of events currently enabled on the buffer event
     * @link https://www.php.net/manual/en/eventbufferevent.getenabled.php
     *
     * @return int Returns integer representing a bitmask of events currently
     *             enabled on the buffer event
     */
    public function getEnabled () {}

    /**
     * Returns underlying input buffer associated with current buffer event.
     * An input buffer is a storage for data to read.
     * Note, there is also input property of EventBufferEvent class.
     * @link https://www.php.net/manual/en/eventbufferevent.getinput.php
     *
     * @return EventBuffer Returns instance of EventBuffer input buffer
     *                     associated with current buffer event.
     */
    public function getInput ( ) {}

    /**
     * Returns underlying output buffer associated with current buffer event.
     * An output buffer is a storage for data to be written.
     * Note, there is also output property of EventBufferEvent class.
     *
     * @link https://www.php.net/manual/en/eventbufferevent.getoutput.php
     *
     * @return EventBuffer  Returns instance of EventBuffer output buffer
     *                      associated with current buffer event.
     */
    public function getOutput () {}

    /**
     * Removes up to size bytes from the input buffer. Returns a string of data
     * read from the input buffer.
     * @link https://www.php.net/manual/en/eventbufferevent.read.php
     *
     * @param int $size Maximum number of bytes to read
     *
     * @return string   Returns string of data read from the input buffer.
     */
    public function read ( int $size ) {}

    /**
     * Drains the entire contents of the input buffer and places them into buf .
     * @link https://www.php.net/manual/en/eventbufferevent.readbuffer.php
     *
     * @param EventBuffer $buf  Target buffer
     *
     * @return bool Returns TRUE on success; Otherwise FALSE.
     */
    public function readBuffer ( EventBuffer $buf ) {}

    /**
     * Assigns read, write and event(status) callbacks.
     * @link https://www.php.net/manual/en/eventbufferevent.setcallbacks.php
     *
     * @param callable|NULL $readcb Read event callback.
     *                              See About buffer event callbacks .
     * @param callable|NULL $writecb Write event callback.
     *                               See About buffer event callbacks .
     * @param callable|NULL $eventcb Status-change event callback.
     *                               See About buffer event callbacks .
     * @param string   $arg A variable that will be passed to all the callbacks.
     */
    public function setCallbacks ( callable $readcb , callable $writecb , callable $eventcb , string $arg  ) {}

    /**
     * Assign a priority to a bufferevent
     * Warning: Only supported for socket buffer events
     * @link https://www.php.net/manual/en/eventbufferevent.setpriority.php
     *
     * @param int $priority Priority value.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function setPriority ( int $priority ) {}

    /**
     * Set the read and write timeout for a buffer event
     * @link https://www.php.net/manual/en/eventbufferevent.settimeouts.php
     *
     * @param float $timeout_read Read timeout
     * @param float $timeout_write Write timeout
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function setTimeouts ( float $timeout_read , float $timeout_write ) {}

    /**
     * Adjusts the read watermarks, the write watermarks , or both, of a single
     * buffer event.
     * A buffer event watermark is an edge, a value specifying number of bytes
     * to be read or written before callback is invoked. By default every
     * read/write event triggers a callback invokation. See » Fast portable
     * non-blocking network programming with Libevent: Callbacks and watermarks
     * @link https://www.php.net/manual/en/eventbufferevent.setwatermark.php
     *
     * @param int $events   Bitmask of Event::READ , Event::WRITE , or both.
     * @param int $lowmark  Minimum watermark value.
     * @param int $highmark Maximum watermark value. 0 means "unlimited".
     */
    public function setWatermark ( int $events , int $lowmark , int $highmark ) {}

    /**
     * Returns most recent OpenSSL error reported on the buffer event.
     * Note:
     * This function is available only if Event is compiled with OpenSSL support.
     * @link https://www.php.net/manual/en/eventbufferevent.sslerror.php
     *
     * @return string Returns OpenSSL error string reported on the buffer event,
     *                or FALSE, if there is no more error to return.
     */
    public function sslError () {}

    /**
     * Create a new SSL buffer event to send its data over another buffer event
     * Note:
     * This function is available only if Event is compiled with OpenSSL support.
     *
     * @link https://www.php.net/manual/en/eventbufferevent.sslfilter.php
     *
     * @param EventBase        $base    Associated event base.
     * @param EventBufferEvent $underlying A socket buffer event to use for
     *                                      this SSL.
     * @param EventSslContext  $ctx Object of EventSslContext class.
     * @param int $state The current state of SSL connection:
     *                   EventBufferEvent::SSL_OPEN ,
     *                   EventBufferEvent::SSL_ACCEPTING or
     *                   EventBufferEvent::SSL_CONNECTING .
     * @param int              $options One or more buffer event options.
     *
     * @return EventBufferEvent Returns a new SSL EventBufferEvent object.
     */
    public static function sslFilter ( EventBase $base , EventBufferEvent $underlying , EventSslContext $ctx , int $state , int $options = 0  ) {}

    /**
     * Retrieves description of the current cipher by means of the
     * SSL_CIPHER_description SSL API function (see SSL_CIPHER_get_name(3)
     * man page).
     * Note:
     * This function is available only if Event is compiled with OpenSSL support.
     *
     * @link https://www.php.net/manual/en/eventbufferevent.sslgetcipherinfo.php
     *
     * @return string Returns a textual description of the cipher on success,
     *                or FALSE on error.
     */
    public function sslGetCipherInfo () {}

    /**
     * Retrieves name of cipher used by current SSL connection.
     * Note: This function is available only if Event is compiled with OpenSSL
     * support.
     *
     * @link https://www.php.net/manual/en/eventbufferevent.sslgetciphername.php
     *
     * @return string Returns the current cipher name of the SSL connection,
     *                or FALSE on error.
     */
    public function sslGetCipherName () {}

    /**
     * Retrieves version of cipher used by current SSL connection.
     * Note:
     * This function is available only if Event is compiled with OpenSSL support
     *
     * @link https://www.php.net/manual/en/eventbufferevent.sslgetcipherversion.php
     *
     * @return string Returns the current cipher version of the SSL connection,
     *                or FALSE on error.
     */
    public function sslGetCipherVersion () {}

    /**
     * Returns the name of the protocol used for current SSL connection.
     * Note:
     * This function is available only if Event is compiled with OpenSSL support
     *
     * @link https://www.php.net/manual/en/eventbufferevent.sslgetprotocol.php
     *
     * @return string Returns the name of the protocol used for current SSL
     *                connection.
     */
    public function sslGetProtocol () {}

    /**
     * Tells a bufferevent to begin SSL renegotiation.
     * Warning: Calling this function tells the SSL to renegotiate, and the
     * buffer event to invoke appropriate callbacks. This is an advanced topic;
     * this should be generally avoided unless one really knows what he/she does,
     * especially since many SSL versions have had known security issues related
     * to renegotiation.
     * @link https://www.php.net/manual/en/eventbufferevent.sslrenegotiate.php
     */
    public function sslRenegotiate () {}

    /**
     * Creates a new SSL buffer event to send its data over an SSL on a socket.
     * @link https://www.php.net/manual/en/eventbufferevent.sslsocket.php
     *
     * @param EventBase       $base Associated event base.
     * @param mixed           $socket Socket to use for this SSL. Can be stream
     *                                or socket resource, numeric file
     *                                descriptor,  or NULL. If socket is NULL,
     *                                it is assumed that the file descriptor for
     *                                the socket will be assigned later, for
     *                                instance, by means of
     *                                EventBufferEvent::connectHost() method.
     * @param EventSslContext $ctx Object of EventSslContext class.
     * @param int $state              The current state of SSL connection:
     *                                EventBufferEvent::SSL_OPEN ,
     *                                EventBufferEvent::SSL_ACCEPTING or
     *                                EventBufferEvent::SSL_CONNECTING .
     * @param int             $options The buffer event options.
     *
     * @return EventBufferEvent Returns EventBufferEvent object.
     */
    public static function  sslSocket ( EventBase $base , mixed $socket , EventSslContext $ctx , int $state , int $options  ) {}

    /**
     * Adds data to a buffer event's output buffer
     * @link https://www.php.net/manual/en/eventbufferevent.write.php
     *
     * @param string $data Data to be added to the underlying buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function write ( string $data ) {}

    /**
     * Adds contents of the entire buffer to a buffer event's output buffer
     * @link https://www.php.net/manual/en/eventbufferevent.writebuffer.php
     *       
     * @param EventBuffer $buf Source EventBuffer object.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function writeBuffer ( EventBuffer $buf ) {}
    
}
