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
     * Tells to read the domain and search fields from the resolv.conf file and
     * the ndots option, and use them to decide which domains(if any) to search
     * for hostnames that aren’t fully-qualified.
     *
     * @var integer OPTION_SEARCH
     */
    const OPTION_SEARCH = 1 ;

    /**
     * Tells to learn the nameservers from the resolv.conf file.
     *
     * @var integer OPTION_NAMESERVERS
     */
    const OPTION_NAMESERVERS = 2 ;

    /**
     * @var integer OPTION_MISC
     */
    const OPTION_MISC = 4 ;

    /**
     * Tells to read a list of hosts from /etc/hosts as part of loading the
     * resolv.conf file.
     *
     * @var integer OPTION_HOSTSFILE
     */
    const OPTION_HOSTSFILE = 8 ;

    /**
     * Tells to learn as much as it can from the resolv.conf file.
     *
     * @var integer OPTIONS_ALL
     */
    const OPTIONS_ALL = 15 ;

    /* Methods */
    /**
     * Adds a nameserver to the evdns_base.
     * @link https://www.php.net/manual/en/eventdnsbase.addnameserverip.php
     *
     * @param string $ip The nameserver string, either as an IPv4 address,
     *                   an IPv6 address, an IPv4 address with a port
     *                   ( IPv4:Port ), or an IPv6 address with a port
     *                   ( [IPv6]:Port ).
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function addNameserverIp ( string $ip ) {}

    /**
     * Adds a domain to the list of search domains
     * @link https://www.php.net/manual/en/eventdnsbase.addsearch.php
     *
     * @param string $domain Search domain.
     */
    public function addSearch ( string $domain ) {}

    /**
     * Removes all current search suffixes from the DNS base; the
     * EventDnsBase::addSearch() function adds a suffix.
     * @link https://www.php.net/manual/en/eventdnsbase.clearsearch.php
     */
    public function clearSearch () {}

    /**
     * EventDnsBase constructor.
     * @link https://www.php.net/manual/en/eventdnsbase.construct.php
     *
     * @param EventBase $base Event base.
     * @param bool $initialize If the initialize argument is TRUE, it tries
     *                         to configure the DNS base sensibly given your
     *                         operating system’s default. Otherwise, it leaves
     *                         the event DNS base empty, with no nameservers or
     *                         options configured. In the latter case DNS base
     *                         should be configured manually, e.g. with
     *                         EventDnsBase::parseResolvConf() .
     * @return EventDnsBase Returns EventDnsBase object.
     */
    public function __construct ( EventBase $base , bool $initialize ) {}

    /**
     * Gets the number of configured nameservers
     *
     * @link https://www.php.net/manual/en/eventdnsbase.countnameservers.php
     *
     * @return int Returns the number of configured nameservers(not necessarily
     * the number of running nameservers). This is useful for double-checking
     * whether our calls to the various nameserver configuration functions have
     * been successful.
     */
    public function countNameservers () {}

    /**
     * Loads a hosts file (in the same format as /etc/hosts ) from hosts file.
     * @link https://www.php.net/manual/en/eventdnsbase.loadhosts.php
     * @param string $hosts Path to the hosts' file.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function loadHosts ( string $hosts ) {}

    /**
     * Scans the resolv.conf-formatted file stored in filename, and read in all
     * the options from it that are listed in flags
     *
     * @link https://www.php.net/manual/en/eventdnsbase.parseresolvconf.php
     * @param int $flags Determines what information is parsed from the
     *                   resolv.conf file. See the man page for resolv.conf for
     *                   the format of this file.
     *                   The following directives are not parsed from the file:
     *                   sortlist, rotate, no-check-names, inet6, debug .
     *                   If this function encounters an error, the possible
     *                   return values are:
     *                   1 = failed to open file
     *                   2 = failed to stat file
     *                   3 = file too large
     *                   4 = out of memory
     *                   5 = short read from file
     *                   6 = no nameservers listed in the file
     * @param string $filename Path to resolv.conf file.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function parseResolvConf ( int $flags , string $filename ) {}

    /**
     * Set the value of a configuration option.
     * @link https://www.php.net/manual/en/eventdnsbase.setoption.php
     *
     * @param string $option The currently available configuration options are:
     *                       "ndots" , "timeout" , "max-timeouts" ,
     *                       "max-inflight" , and "attempts" .
     * @param string $value Option value.
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function setOption ( string $option , string $value ) {}

    /**
     * Set the 'ndots' parameter for searches. Sets the number of dots which,
     * when found in a name, causes the first query to be without any search
     * domain.
     * @link https://www.php.net/manual/en/eventdnsbase.setsearchndots.php
     *
     * @param int $ndots The number of dots.
     * @return bool Returns TRUE on success. Otherwise FALSE.
     */
    public function setSearchNdots ( int $ndots ) {}

}