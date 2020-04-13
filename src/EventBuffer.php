<?php

/**
 * EventBuffer represents Libevent's "evbuffer", an utility functionality for
 * buffered I/O.
 * Event buffers are meant to be generally useful for doing the "buffer" part
 * of buffered network I/O.
 *
 * @link https://www.php.net/manual/en/class.eventbuffer.php
 * Class EventBuffer
 */
final class EventBuffer {

    /* Constants */
    /**
     * The end of line is any sequence of any number of carriage return and
     * linefeed characters. This format is not very useful; it exists mainly
     * for backward compatibility.
     *
     * @var integer EOL_ANY
     */
    const EOL_ANY = 0 ;

    /**
     * The end of the line is an optional carriage return, followed by a
     * linefeed. (In other words, it is either a "\r\n" or a "\n" .) This
     * format is useful in parsing text-based Internet protocols, since the
     * standards generally prescribe a "\r\n" line-terminator, but nonconformant
     * clients sometimes say just "\n" .
     *
     * @var integer EOL_CRLF
     */
    const EOL_CRLF = 1 ;

    /**
     * The end of a line is a single carriage return, followed by a single
     * linefeed. (This is also known as "\r\n" . The ASCII values are 0x0D
     * 0x0A ).
     *
     * @var integer EOL_CRLF_STRICT
     */
    const EOL_CRLF_STRICT = 2 ;

    /**
     * The end of a line is a single linefeed character. (This is also known
     * as "\n" . It is ASCII value is 0x0A .)
     *
     * @var integer EOL_CRLF_STRICT
     */
    const EOL_LF = 3 ;

    /**
     * Flag used as argument of EventBuffer::setPosition() method. If this flag
     * specified, the position pointer is moved to an absolute position within
     * the buffer.
     *
     * @var integer PTR_SET
     */
    const PTR_SET = 0 ;
    
    /**
     * The same as EventBuffer::PTR_SET , except this flag causes
     * EventBuffer::setPosition() method to move position forward up to the
     * specified number of bytes(instead of setting absolute position).
     *
     * @var integer PTR_ADD
     */
    const PTR_ADD = 1 ;

    /* Properties */
    /**
     * The number of bytes stored in an event buffer.
     *
     * @var integer $length
     */
    public $length ;

    /**
     * The number of bytes stored contiguously at the front of the buffer.
     * The bytes in a buffer may be stored in multiple separate chunks of
     * memory; the property returns the number of bytes currently stored in the
     * first chunk.
     *
     * @var integer $contiguous_space
     */
    public $contiguous_space ;

    /* Methods */
    /**
     * Append data to the end of an event buffer.
     * @link https://www.php.net/manual/en/eventbuffer.add.php
     *
     * @param string $data  String to be appended to the end of the buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function add ( string $data ) {}

    /**
     * Move all data from the buffer provided in buf parameter to the end of
     * current EventBuffer . This is a destructive add. The data from one
     * buffer moves into the other buffer. However, no unnecessary memory
     * copies occur.
     * @link https://www.php.net/manual/en/eventbuffer.addbuffer.php
     *
     * @param EventBuffer $buf  The source EventBuffer object.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function addBuffer ( EventBuffer $buf ) {}

    /**
     * Moves the specified number of bytes from a source buffer to the end of
     * the current buffer. If there are fewer number of bytes, it moves all
     * the bytes available from the source buffer.
     * @link    https://www.php.net/manual/en/eventbuffer.appendfrom.php
     *
     * @param EventBuffer $buf  Source buffer.
     * @param int         $len
     *
     * @return int  Returns the number of bytes read.
     */
    public function appendFrom ( EventBuffer $buf , int $len ) {}

    /**
     * EventBuffer constructor.
     * This function has no parameters.
     * @link https://www.php.net/manual/en/eventbuffer.construct.php
     *
     * @return  EventBuffer Returns EventBuffer object.
     */
	public function __construct () {}

    /**
     * Behaves just like EventBuffer::read() , but does not drain any data from
     * the buffer. I.e. it copies the first max_bytes bytes from the front of
     * the buffer into data . If there are fewer than max_bytes bytes available,
     * the function copies all the bytes there are.
     * @link https://www.php.net/manual/en/eventbuffer.copyout.php
     *
     * @param string $data      Output string.
     * @param int    $max_bytes The number of bytes to copy.
     *
     * @return int  Returns the number of bytes copied, or -1 on failure.
     */
	public function copyout ( string &$data , int $max_bytes ) {}

    /**
     * Behaves as EventBuffer::read() , except that it does not copy the data:
     * it just removes it from the front of the buffer.
     * @link    https://www.php.net/manual/en/eventbuffer.drain.php
     *
     * @param int $len  The number of bytes to remove from the buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
	public function drain ( int $len ) {}

    /**
     * Enable locking on an EventBuffer so that it can safely be used by
     * multiple threads at the same time. When locking is enabled, the lock
     * will be held when callbacks are invoked. This could result in deadlock
     * if you aren't careful. Plan accordingly!
     * @link https://www.php.net/manual/en/eventbuffer.enablelocking.php
     */
	public function enableLocking () {}

    /**
     * Alters the last chunk of memory in the buffer, or adds a new chunk,
     * such that the buffer is now large enough to contain len bytes without
     * any further allocations.
     *
     * @param int $len  The number of bytes to reserve for the buffer
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
	public function expand ( int $len ) {}

    /**
     * Prevent calls that modify an event buffer from succeeding
     *
     * @link https://www.php.net/manual/en/eventbuffer.freeze.php
     *
     * @param bool $at_front Whether to disable changes to the front or end
     *                       of the buffer.
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
	public function freeze ( bool $at_front ) {}

    /**
     * Acquires a lock on buffer. Can be used in pair with EventBuffer::unlock()
     * to make a set of operations atomic, i.e. thread-safe. Note, it is
     * not needed to lock buffers for individual operations. When locking is
     * enabled(see EventBuffer::enableLocking() ), individual operations on
     * event buffers are already atomic.
     * @link https://www.php.net/manual/en/eventbuffer.lock.php
     */
	public function lock () {}

    /**
     * Prepend data to the front of the buffer.
     * @link https://www.php.net/manual/en/eventbuffer.prepend.php
     *
     * @param string $data  String to be prepended to the front of the buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
	public function prepend ( string $data ) {}

    /**
     * Moves all data from source buffer to the front of current buffer
     * Behaves as EventBuffer::addBuffer() , except that it moves data to the
     * front of the buffer.
     * @link https://www.php.net/manual/en/eventbuffer.prependbuffer.php
     *
     * @param EventBuffer $buf  Source buffer
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
	public function prependBuffer ( EventBuffer $buf ) {}

    /**
     * Linearizes data within buffer and returns it's contents as a string
     * "Linearizes" the first size bytes of the buffer, copying or moving them
     * as needed to ensure that they are all contiguous and occupying the same
     * chunk of memory. If size is negative, the function linearizes the
     * entire buffer.
     *
     * Warning: Calling EventBuffer::pullup() with a large size can be quite
     * slow, since it potentially needs to copy the entire buffer's contents.
     * @link https://www.php.net/manual/en/eventbuffer.pullup.php
     *
     * @param int $size The number of bytes required to be contiguous within
     *                  the buffer.
     *
     * @return string   If size is greater than the number of bytes in the
     *                  buffer, the function returns NULL. Otherwise,
     *                  EventBuffer::pullup() returns string.
     */
	public function pullup ( int $size ) {}

    /**
     * Read data from an evbuffer and drain the bytes read
     * Read the first max_bytes from the buffer and drain the bytes read.
     * If more max_bytes are requested than are available in the buffer,
     * it only extracts as many bytes as available.
     * @link https://www.php.net/manual/en/eventbuffer.read.php
     *
     * @param int $max_bytes   Maxmimum number of bytes to read from the buffer.
     *
     * @return string   Returns string read, or FALSE on failure.
     */
	public function read ( int $max_bytes ) {}

    /**
     * Read data from the file specified by fd onto the end of the buffer.
     * @link https://www.php.net/manual/en/eventbuffer.readfrom.php
     *
     * @param mixed $fd Socket resource, stream, or numeric file descriptor.
     * @param int   $howmuch    Maxmimum number of bytes to read.
     *
     * @return int  Returns the number of bytes read, or FALSE on failure.
     */
	public function readFrom ( mixed $fd , int $howmuch ) {}

    /**
     * Extracts a line from the front of the buffer and returns it in a newly
     * allocated string. If there is not a whole line to read, the function
     * returns NULL. The line terminator is not included in the copied string.
     * @link https://www.php.net/manual/en/eventbuffer.readline.php
     *
     * @param int $eol_style    One of EventBuffer:EOL_* constants .
     *
     * @return string   On success returns the line read from the buffer,
     *                  otherwise NULL.
     */
	public function readLine ( int $eol_style ) {}

    /**
     * Scans the buffer for an occurrence of the string what . It returns
     * numeric position of the string, or FALSE if the string was not found.
     *
     * If the start argument is provided, it points to the position at which
     * the search should begin; otherwise, the search is performed from the
     * start of the string. If end argument provided, the search is performed
     * between start and end buffer positions.
     * @link https://www.php.net/manual/en/eventbuffer.search.php
     *
     * @param string $what  String to search.
     * @param int    $start [optional] Start search position.
     * @param int    $end   [optional] End search position.
     *
     * @return mixed    Returns numeric position of the first occurance of the
     *                  string in the buffer, or FALSE if string is not found.
     *                  Warning: This function may return Boolean FALSE, but
     *                  may also return a non-Boolean value which evaluates to
     *                  FALSE. Please read the section on Booleans for more
     *                  information. Use the === operator for testing the return
     *                  value of this function.
     */
	public function search ( string $what , int $start = -1 , int $end = -1 ) {}

    /**
     * Scans the buffer for an occurrence of an end of line specified by
     * eol_style parameter . It returns numeric position of the string,
     * or FALSE if the string was not found.
     *
     * If the start argument is provided, it represents the position at which
     * the search should begin; otherwise, the search is performed from
     * the start of the string. If end argument provided, the search is
     * performed between start and end buffer positions.
     *
     * @link https://www.php.net/manual/en/eventbuffer.searcheol.php
     *
     * @param int $start        Start search position.
     * @param int $eol_style    One of EventBuffer:EOL_* constants .
     *
     * @return mixed    Returns numeric position of the first occurance of
     *                  end-of-line symbol in the buffer, or FALSE if not found.
     *                  Warning: This function may return Boolean FALSE,
     *                  but may also return a non-Boolean value which evaluates
     *                  to FALSE. Please read the section on Booleans for more
     *                  information. Use the === operator for testing
     *                  the return value of this function.
     */
	public function searchEol ( int $start = -1 , int $eol_style = EventBuffer::EOL_ANY  ) {}

    /**
     * Substracts up to length bytes of the buffer data beginning at
     * start position.
     * @link https://www.php.net/manual/en/eventbuffer.substr.php
     *
     * @param int $start    The start position of data to be substracted.
     * @param int $length   [optional] Maximum number of bytes to substract.
     *
     * @return string   Returns the data substracted as a string on success,
     *                  or FALSE on failure.
     */
	public function substr ( int $start , int $length = null) {}

    /**
     * Re-enable calls that modify an event buffer.
     * @link https://www.php.net/manual/en/eventbuffer.unfreeze.php
     *
     * @param bool $at_front Whether to enable events at the front or at the
     *                       end of the buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
	public function unfreeze ( bool $at_front ) {}

    /**
     * Releases lock acquired by EventBuffer::lock() .
     * @link https://www.php.net/manual/en/eventbuffer.unlock.php
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
	public function unlock () {}

    /**
     * Write contents of the buffer to a file descriptor. The buffer will be
     * drained after the bytes have been successfully written.
     * @link https://www.php.net/manual/en/eventbuffer.write.php
     *
     * @param mixed $fd Socket resource, stream or numeric file
     *                  descriptor associated normally associated with a socket.
     * @param int   $howmuch    The maximum number of bytes to write.
     *
     * @return int  Returns the number of bytes written, or FALSE on error.
     */
	public function write ( mixed $fd , int $howmuch ) {}
	
}
