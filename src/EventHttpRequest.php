<?php

/**
 * Class EventHttpRequest
 * @link https://www.php.net/manual/en/class.eventhttprequest.php
 */
class EventHttpRequest {

    /* Constants */

    /**
     * GET method(command)
     *
     * @var integer CMD_GET
     */
    const CMD_GET = 1 ;

    /**
     * POST method(command)
     *
     * @var integer CMD_POST
     */
    const CMD_POST = 2 ;

    /**
     * HEAD method(command)
     *
     * @var integer CMD_HEAD
     */
    const CMD_HEAD = 4 ;

    /**
     * PUT method(command)
     *
     * @var integer CMD_PUT
     */
    const CMD_PUT = 8 ;

    /**
     * DELETE command(method)
     *
     * @var integer CMD_DELETE
     */
    const CMD_DELETE = 16 ;

    /**
     * OPTIONS method(command)
     *
     * @var integer CMD_OPTIONS
     */
    const CMD_OPTIONS = 32 ;

    /**
     * TRACE method(command)
     *
     * @var integer CMD_TRACE
     */
    const CMD_TRACE = 64 ;

    /**
     * CONNECT method(command)
     *
     * @var integer CMD_CONNECT
     */
    const CMD_CONNECT = 128 ;

    /**
     * PATCH method(command)
     *
     * @var integer CMD_PATCH
     */
    const CMD_PATCH = 256 ;

    /**
     * Request input header type.
     *
     * @var integer INPUT_HEADER
     */
    const INPUT_HEADER = 1 ;

    /**
     * Request output header type.
     *
     * @var integer OUTPUT_HEADER
     */
    const OUTPUT_HEADER = 2 ;

    /* Methods */
    /**
     * Adds an HTTP header to the headers of the request.
     * @link https://www.php.net/manual/en/eventhttprequest.addheader.php
     *
     * @param string $key Header name.
     * @param string $value Header value.
     * @param int    $type One of EventHttpRequest::*_HEADER constants .
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function addHeader ( string $key , string $value , int $type ) {}

    /**
     * Cancels a pending HTTP request.
     * Cancels an ongoing HTTP request. The callback associated with this
     * request is not executed and the request object is freed. If the request
     * is currently being processed, e.g. it is ongoing, the corresponding
     * EventHttpConnection object is going to get reset.
     *
     * A request cannot be canceled if its callback has executed already.
     * A request may be canceled reentrantly from its chunked callback.
     * @link https://www.php.net/manual/en/eventhttprequest.cancel.php
     */
    public function cancel() {}

    /**
     * Removes all output headers from the header list of the request.
     * @link https://www.php.net/manual/en/eventhttprequest.clearheaders.php
     */
    public function clearHeaders() {}

    /**
     * Closes HTTP connection associated with the request.
     * @link https://www.php.net/manual/en/eventhttprequest.closeconnection.php
     */
    public function closeConnection() {}

    /**
     * EventHttpRequest constructor.
     * @link https://www.php.net/manual/en/eventhttprequest.construct.php
     *
     * @param callable $callback Gets invoked on requesting path. Should match
     *                           the following prototype:
     *                           callback ([ EventHttpRequest $req = NULL
     *                           [, mixed $arg = NULL ]] ) : void
     * @param mixed|NULL $data User custom data passed to the callback.
     *
     * @return EventHttpRequest
     */
    public function __construct ( callable $callback , mixed $data = NULL ) {}

    /**
     * Finds the value belonging a header.
     * @link https://www.php.net/manual/en/eventhttprequest.findheader.php
     *
     * @param string $key The header name.
     * @param string $type One of EventHttpRequest::*_HEADER constants .
     */
    public function findHeader ( string $key , string $type ) {}

    /**
     * Frees the object and removes associated events.
     * @link https://www.php.net/manual/en/eventhttprequest.free.php
     */
    public function free() {}

    /**
     * Returns EventBufferEvent object which represents buffer event that the
     * connection is using.
     * Warning : The reference counter of the returned object will be
     * incremented by one to protect internal structures against premature
     * destruction when the method is called from a user callback. So the
     * EventBufferEvent object should be freed explicitly with
     * EventBufferEvent::free() method. Otherwise memory will leak.
     * @link https://www.php.net/manual/en/eventhttprequest.getbufferevent.php
     *
     * @return EventBufferEvent
     */
    public function getBufferEvent() {}

    /**
     * Returns the request command, one of EventHttpRequest::CMD_* constants.
     * @link https://www.php.net/manual/en/eventhttprequest.getcommand.php
     */
    public function getCommand() {}

    /**
     * Returns EventHttpConnection object which represents HTTP connection
     * associated with the request.
     * Warning : Libevent API allows HTTP request objects to be not bound to
     * any HTTP connection. Therefore we can't unambiguously associate
     * EventHttpRequest with EventHttpConnection . Thus, we construct
     * EventHttpConnection object on-the-fly. Having no information about the
     * event base, DNS base and connection-close callback, we just leave
     * these fields unset.
     * EventHttpRequest::getConnection() method is usually useful when we need
     * to set up a callback on connection close. See
     * EventHttpConnection::setCloseCallback() .
     * @link https://www.php.net/manual/en/eventhttprequest.getconnection.php
     *
     * @return EventHttpConnection
     */
    public function getConnection() {}

    /**
     * Returns the request host.
     * @link https://www.php.net/manual/en/eventhttprequest.gethost.php
     *
     * @return string
     */
    public function getHost() {}

    /**
     * Returns the input buffer.
     * @link https://www.php.net/manual/en/eventhttprequest.getinputbuffer.php
     *
     * @return EventBuffer
     */
    public function getInputBuffer() {}

    /**
     * Returns associative array of the input headers.
     * @link https://www.php.net/manual/en/eventhttprequest.getinputheaders.php
     *
     * @return array
     */
    public function getInputHeaders() {}

    /**
     * Returns the output buffer of the request.
     * @link https://www.php.net/manual/en/eventhttprequest.getoutputbuffer.php
     *
     * @return EventBuffer
     */
    public function getOutputBuffer() {}

    /**
     * Returns associative array of the output headers.
     * @link https://www.php.net/manual/en/eventhttprequest.getoutputheaders.php
     */
    public function getOutputHeaders() {}

    /**
     * Returns the response code.
     * @link https://www.php.net/manual/en/eventhttprequest.getresponsecode.php
     *
     * @return integer
     */
    public function getResponseCode() {}

    /**
     * Returns the request URI
     * @link https://www.php.net/manual/en/eventhttprequest.geturi.php
     *
     * @return string
     */
    public function getUri() {}

    /**
     * Removes an HTTP header from the headers of the request.
     * @link https://www.php.net/manual/en/eventhttprequest.removeheader.php
     *
     * @param string $key The header name.
     * @param string $type type is one of EventHttpRequest::*_HEADER constants.
     */
    public function removeHeader ( string $key , string $type ) {}

    /**
     * Send an HTML error message to the client.
     *
     * @param integer   $error The HTTP error code.
     * @param string $reason A brief explanation ofthe error. If NULL, the
     *                       standard meaning of the error code will be used.
     */
    public function sendError ( int $error , string $reason = NULL ) {}

    /**
     * Send an HTML reply to the client. The body of the reply consists of data
     * in optional buf parameter.
     * @link https://www.php.net/manual/en/eventhttprequest.sendreply.php
     *
     * @param int         $code The HTTP response code to send.
     * @param string      $reason A brief message to send with the response code
     * @param EventBuffer $buf The body of the response.
     */
    public function sendReply ( int $code , string $reason , EventBuffer $buf ) {}

    /**
     * Send another data chunk as part of an ongoing chunked reply. After
     * calling this method buf will be empty.
     * @link https://www.php.net/manual/en/eventhttprequest.sendreplychunk.php
     *
     * @param EventBuffer $buf The data chunk to send as part of the reply.
     */
    public function sendReplyChunk ( EventBuffer $buf ) {}

    /**
     * Complete a chunked reply, freeing the request as appropriate.
     * @link https://www.php.net/manual/en/eventhttprequest.sendreplyend.php
     */
    public function sendReplyEnd() {}

    /**
     * Initiate a reply that uses Transfer-Encoding chunked .
     * This allows the caller to stream the reply back to the client and is
     * useful when either not all of the reply data is immediately available or
     * when sending very large replies.
     * The caller needs to supply data chunks with
     * EventHttpRequest::sendReplyChunk() and complete the reply by calling
     * EventHttpRequest::sendReplyEnd() .
     * @link https://www.php.net/manual/en/eventhttprequest.sendreplystart.php
     *
     * @param int    $code
     * @param string $reason
     */
    public function sendReplyStart ( int $code , string $reason ) {}

}
