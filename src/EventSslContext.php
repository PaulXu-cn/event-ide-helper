<?php

/**
 * Class EventSslContext
 * Represents SSL_CTX structure. Provides methods and properties to configure
 * the SSL context.
 * @link https://www.php.net/manual/en/class.eventsslcontext.php
 */
final class EventSslContext {


    /* Constants */
    /**
     * SSLv2 client method. See SSL_CTX_new(3) man page.
     *
     * @var integer SSLv2_CLIENT_METHOD
     */
    const SSLv2_CLIENT_METHOD = 1 ;

    /**
     * SSLv2 client method. See SSL_CTX_new(3) man page.
     *
     * @var integer SSLv3_CLIENT_METHOD
     */
    const  SSLv3_CLIENT_METHOD = 2 ;

    /**
     * SSLv2 client method. See SSL_CTX_new(3) man page.
     *
     * @var integer SSLv23_CLIENT_METHOD
     */
    const SSLv23_CLIENT_METHOD = 3 ;

    /**
     * SSLv2 client method. See SSL_CTX_new(3) man page.
     *
     * @var integer TLS_CLIENT_METHOD
     */
    const TLS_CLIENT_METHOD = 4 ;

    /**
     * TLS server method. See SSL_CTX_new(3) man page.
     *
     * @var integer SSLv2_SERVER_METHOD
     */
    const SSLv2_SERVER_METHOD = 5 ;

    /**
     * TLS server method. See SSL_CTX_new(3) man page.
     *
     * @var integer SSLv3_SERVER_METHOD
     */
    const SSLv3_SERVER_METHOD = 6 ;

    /**
     * TLS server method. See SSL_CTX_new(3) man page.
     *
     * @var integer SSLv23_SERVER_METHOD
     */
    const SSLv23_SERVER_METHOD = 7 ;

    /**
     * TLS server method. See SSL_CTX_new(3) man page.
     *
     * @var integer TLS_SERVER_METHOD
     */
    const TLS_SERVER_METHOD = 8 ;

    /**
     * Key for an item of the options' array used in
     * EventSslContext::__construct() . The option points to path of local
     * certificate.
     *
     * @var integer OPT_LOCAL_CERT
     */
    const OPT_LOCAL_CERT = 1 ;

    /**
     * Key for an item of the options' array used in
     * EventSslContext::__construct() . The option points to path of the
     * private key.
     *
     * @var integer OPT_LOCAL_PK
     */
    const OPT_LOCAL_PK = 2 ;

    /**
     * Key for an item of the options' array used in
     * EventSslContext::__construct() . Represents passphrase of the
     * certificate.
     *
     * @var integer OPT_PASSPHRASE
     */
    const OPT_PASSPHRASE = 3 ;

    /**
     * Key for an item of the options' array used in
     * EventSslContext::__construct() . Represents path of the
     * certificate authority file.
     *
     * @var integer OPT_CA_FILE
     */
    const OPT_CA_FILE = 4 ;

    /**
     * Key for an item of the options' array used in
     * EventSslContext::__construct() . Represents path where the
     * certificate authority file should be searched for.
     *
     * @var integer OPT_CA_PATH
     */
    const OPT_CA_PATH = 5 ;

    /**
     * Key for an item of the options' array used in
     * EventSslContext::__construct() . Represents option that allows
     * self-signed certificates.
     *
     * @var integer OPT_ALLOW_SELF_SIGNED
     */
    const OPT_ALLOW_SELF_SIGNED = 6 ;

    /**
     * Key for an item of the options' array used in
     * EventSslContext::__construct() . Represents option that tells Event to
     * verify peer.
     *
     * @var integer OPT_VERIFY_PEER
     */
    const OPT_VERIFY_PEER = 7 ;

    /**
     * Key for an item of the options' array used in
     * EventSslContext::__construct() . Represents maximum depth for the
     * certificate chain verification that shall be allowed for the SSL context.
     *
     * @var integer OPT_VERIFY_DEPTH
     */
    const OPT_VERIFY_DEPTH = 8 ;

    /**
     * Key for an item of the options' array used in
     * EventSslContext::__construct() . Represents the cipher list for the
     * SSL context.
     *
     * @var integer OPT_CIPHERS
     */
    const OPT_CIPHERS = 9 ;

    /* Properties */
    /**
     * Path to local certificate file on filesystem. It must be a PEM-encoded
     * file which contains certificate. It can optionally contain the
     * certificate chain of issuers.
     *
     * @var string $local_cert
     */
    public $local_cert ;

    /**
     * Path to local private key file
     *
     * @var string $local_pk
     */
    public $local_pk ;

    /* Methods */
    /**
     * EventSslContext constructor.
     * Creates SSL context holding pointer to SSL_CTX (see the system manual).
     *
     * @param string $method One of EventSslContext::*_METHOD constants .
     * @param string $options Associative array of SSL context options One of
     *                        EventSslContext::OPT_* constants .
     */
    public function __construct ( string $method , string $options ) {}

}
