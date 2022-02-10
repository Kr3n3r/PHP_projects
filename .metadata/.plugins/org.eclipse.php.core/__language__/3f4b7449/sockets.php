<?php

// Start of sockets v.7.3.0

/**
 * Runs the select() system call on the given arrays of sockets with a specified timeout
 * @link http://www.php.net/manual/en/function.socket-select.php
 * @param array $read The sockets listed in the read array will be
 * watched to see if characters become available for reading (more
 * precisely, to see if a read will not block - in particular, a socket
 * resource is also ready on end-of-file, in which case a
 * socket_read will return a zero length string).
 * @param array $write The sockets listed in the write array will be
 * watched to see if a write will not block.
 * @param array $except The sockets listed in the except array will be
 * watched for exceptions.
 * @param int $tv_sec The tv_sec and tv_usec
 * together form the timeout parameter. The
 * timeout is an upper bound on the amount of time
 * elapsed before socket_select return.
 * tv_sec may be zero , causing
 * socket_select to return immediately. This is useful
 * for polling. If tv_sec is null (no timeout),
 * socket_select can block indefinitely.
 * @param int $tv_usec [optional] 
 * @return int On success socket_select returns the number of
 * socket resources contained in the modified arrays, which may be zero if
 * the timeout expires before anything interesting happens. On error false
 * is returned. The error code can be retrieved with
 * socket_last_error.
 * <p>
 * Be sure to use the === operator when checking for an
 * error. Since the socket_select may return 0 the
 * comparison with == would evaluate to true:
 * Understanding socket_select's result
 * <pre>
 * <code>&lt;?php
 * $e = NULL;
 * if (false === socket_select($r, $w, $e, 0)) {
 * echo &quot;socket_select() failed, reason: &quot; .
 * socket_strerror(socket_last_error()) . &quot;\n&quot;;
 * }
 * ?&gt;</code>
 * </pre>
 * </p>
 */
function socket_select (array &$read, array &$write, array &$except, int $tv_sec, int $tv_usec = null) {}

/**
 * Create a socket (endpoint for communication)
 * @link http://www.php.net/manual/en/function.socket-create.php
 * @param int $domain <p>
 * The domain parameter specifies the protocol
 * family to be used by the socket.
 * </p>
 * <table>
 * Available address/protocol families
 * <table>
 * <tr valign="top">
 * <td>Domain</td>
 * <td>Description</td>
 * </tr>
 * <tr valign="top">
 * <td>AF_INET</td>
 * <td>
 * IPv4 Internet based protocols. TCP and UDP are common protocols of
 * this protocol family.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>AF_INET6</td>
 * <td>
 * IPv6 Internet based protocols. TCP and UDP are common protocols of
 * this protocol family.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>AF_UNIX</td>
 * <td>
 * Local communication protocol family. High efficiency and low
 * overhead make it a great form of IPC (Interprocess Communication).
 * </td>
 * </tr>
 * </table>
 * </table>
 * @param int $type <p>
 * The type parameter selects the type of communication
 * to be used by the socket.
 * </p>
 * <table>
 * Available socket types
 * <table>
 * <tr valign="top">
 * <td>Type</td>
 * <td>Description</td>
 * </tr>
 * <tr valign="top">
 * <td>SOCK_STREAM</td>
 * <td>
 * Provides sequenced, reliable, full-duplex, connection-based byte streams.
 * An out-of-band data transmission mechanism may be supported.
 * The TCP protocol is based on this socket type.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SOCK_DGRAM</td>
 * <td>
 * Supports datagrams (connectionless, unreliable messages of a fixed maximum length).
 * The UDP protocol is based on this socket type.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SOCK_SEQPACKET</td>
 * <td>
 * Provides a sequenced, reliable, two-way connection-based data transmission path for
 * datagrams of fixed maximum length; a consumer is required to read an
 * entire packet with each read call.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SOCK_RAW</td>
 * <td>
 * Provides raw network protocol access. This special type of socket
 * can be used to manually construct any type of protocol. A common use
 * for this socket type is to perform ICMP requests (like ping).
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SOCK_RDM</td>
 * <td>
 * Provides a reliable datagram layer that does not guarantee ordering.
 * This is most likely not implemented on your operating system.
 * </td>
 * </tr>
 * </table>
 * </table>
 * @param int $protocol <p>
 * The protocol parameter sets the specific
 * protocol within the specified domain to be used
 * when communicating on the returned socket. The proper value can be
 * retrieved by name by using getprotobyname. If
 * the desired protocol is TCP, or UDP the corresponding constants
 * SOL_TCP, and SOL_UDP
 * can also be used.
 * </p>
 * <table>
 * Common protocols
 * <table>
 * <tr valign="top">
 * <td>Name</td>
 * <td>Description</td>
 * </tr>
 * <tr valign="top">
 * <td>icmp</td>
 * <td>
 * The Internet Control Message Protocol is used primarily by gateways
 * and hosts to report errors in datagram communication. The "ping"
 * command (present in most modern operating systems) is an example
 * application of ICMP.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>udp</td>
 * <td>
 * The User Datagram Protocol is a connectionless, unreliable,
 * protocol with fixed record lengths. Due to these aspects, UDP
 * requires a minimum amount of protocol overhead.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>tcp</td>
 * <td>
 * The Transmission Control Protocol is a reliable, connection based,
 * stream oriented, full duplex protocol. TCP guarantees that all data packets
 * will be received in the order in which they were sent. If any packet is somehow
 * lost during communication, TCP will automatically retransmit the packet until
 * the destination host acknowledges that packet. For reliability and performance
 * reasons, the TCP implementation itself decides the appropriate octet boundaries
 * of the underlying datagram communication layer. Therefore, TCP applications must
 * allow for the possibility of partial record transmission.
 * </td>
 * </tr>
 * </table>
 * </table>
 * @return resource socket_create returns a socket resource on success,
 * or false on error. The actual error code can be retrieved by calling
 * socket_last_error. This error code may be passed to
 * socket_strerror to get a textual explanation of the
 * error.
 */
function socket_create (int $domain, int $type, int $protocol) {}

/**
 * Opens a socket on port to accept connections
 * @link http://www.php.net/manual/en/function.socket-create-listen.php
 * @param int $port The port on which to listen on all interfaces.
 * @param int $backlog [optional] The backlog parameter defines the maximum length
 * the queue of pending connections may grow to.
 * SOMAXCONN may be passed as
 * backlog parameter, see
 * socket_listen for more information.
 * @return resource socket_create_listen returns a new socket resource
 * on success or false on error. The error code can be retrieved with
 * socket_last_error. This code may be passed to
 * socket_strerror to get a textual explanation of the
 * error.
 */
function socket_create_listen (int $port, int $backlog = null) {}

/**
 * Creates a pair of indistinguishable sockets and stores them in an array
 * @link http://www.php.net/manual/en/function.socket-create-pair.php
 * @param int $domain The domain parameter specifies the protocol
 * family to be used by the socket. See socket_create
 * for the full list.
 * @param int $type The type parameter selects the type of communication
 * to be used by the socket. See socket_create for the 
 * full list.
 * @param int $protocol <p>
 * The protocol parameter sets the specific
 * protocol within the specified domain to be used
 * when communicating on the returned socket. The proper value can be retrieved by
 * name by using getprotobyname. If
 * the desired protocol is TCP, or UDP the corresponding constants
 * SOL_TCP, and SOL_UDP
 * can also be used.
 * </p>
 * <p>
 * See socket_create for the full list of supported 
 * protocols.
 * </p>
 * @param array $fd Reference to an array in which the two socket resources will be inserted.
 * @return bool true on success or false on failure
 */
function socket_create_pair (int $domain, int $type, int $protocol, array &$fd) {}

/**
 * Accepts a connection on a socket
 * @link http://www.php.net/manual/en/function.socket-accept.php
 * @param resource $socket A valid socket resource created with socket_create.
 * @return resource a new socket resource on success, or false on error. The actual
 * error code can be retrieved by calling
 * socket_last_error. This error code may be passed to
 * socket_strerror to get a textual explanation of the
 * error.
 */
function socket_accept ($socket) {}

/**
 * Sets nonblocking mode for file descriptor fd
 * @link http://www.php.net/manual/en/function.socket-set-nonblock.php
 * @param resource $socket A valid socket resource created with socket_create
 * or socket_accept.
 * @return bool true on success or false on failure
 */
function socket_set_nonblock ($socket) {}

/**
 * Sets blocking mode on a socket resource
 * @link http://www.php.net/manual/en/function.socket-set-block.php
 * @param resource $socket A valid socket resource created with socket_create
 * or socket_accept.
 * @return bool true on success or false on failure
 */
function socket_set_block ($socket) {}

/**
 * Listens for a connection on a socket
 * @link http://www.php.net/manual/en/function.socket-listen.php
 * @param resource $socket A valid socket resource created with socket_create
 * or socket_addrinfo_bind
 * @param int $backlog [optional] <p>
 * A maximum of backlog incoming connections will be
 * queued for processing. If a connection request arrives with the queue
 * full the client may receive an error with an indication of
 * ECONNREFUSED, or, if the underlying protocol supports
 * retransmission, the request may be ignored so that retries may succeed.
 * </p>
 * <p>
 * The maximum number passed to the backlog
 * parameter highly depends on the underlying platform. On Linux, it is
 * silently truncated to SOMAXCONN. On win32, if
 * passed SOMAXCONN, the underlying service provider
 * responsible for the socket will set the backlog to a maximum
 * reasonable value. There is no standard provision to
 * find out the actual backlog value on this platform.
 * </p>
 * @return bool true on success or false on failure The error code can be retrieved with
 * socket_last_error. This code may be passed to
 * socket_strerror to get a textual explanation of the
 * error.
 */
function socket_listen ($socket, int $backlog = null) {}

/**
 * Closes a socket resource
 * @link http://www.php.net/manual/en/function.socket-close.php
 * @param resource $socket A valid socket resource created with socket_create
 * or socket_accept.
 * @return void 
 */
function socket_close ($socket) {}

/**
 * Write to a socket
 * @link http://www.php.net/manual/en/function.socket-write.php
 * @param resource $socket 
 * @param string $buffer The buffer to be written.
 * @param int $length [optional] The optional parameter length can specify an
 * alternate length of bytes written to the socket. If this length is
 * greater than the buffer length, it is silently truncated to the length
 * of the buffer.
 * @return int the number of bytes successfully written to the socket or false on failure.
 * The error code can be retrieved with
 * socket_last_error. This code may be passed to
 * socket_strerror to get a textual explanation of the
 * error.
 * <p>
 * It is perfectly valid for socket_write to
 * return zero which means no bytes have been written. Be sure to use the
 * === operator to check for false in case of an
 * error.
 * </p>
 */
function socket_write ($socket, string $buffer, int $length = null) {}

/**
 * Reads a maximum of length bytes from a socket
 * @link http://www.php.net/manual/en/function.socket-read.php
 * @param resource $socket A valid socket resource created with socket_create
 * or socket_accept.
 * @param int $length The maximum number of bytes read is specified by the
 * length parameter. Otherwise you can use
 * &#92;r, &#92;n,
 * or &#92;0 to end reading (depending on the type
 * parameter, see below).
 * @param int $type [optional] <p>
 * Optional type parameter is a named constant:
 * <p>
 * <br>
 * PHP_BINARY_READ (Default) - use the system
 * recv() function. Safe for reading binary data.
 * <br>
 * PHP_NORMAL_READ - reading stops at
 * \n or \r.
 * </p>
 * </p>
 * @return string socket_read returns the data as a string on success,
 * or false on error (including if the remote host has closed the
 * connection). The error code can be retrieved with
 * socket_last_error. This code may be passed to
 * socket_strerror to get a textual representation of
 * the error.
 * <p>
 * socket_read returns a zero length string ("")
 * when there is no more data to read.
 * </p>
 */
function socket_read ($socket, int $length, int $type = null) {}

/**
 * Queries the local side of the given socket which may either result in host/port or in a Unix filesystem path, dependent on its type
 * @link http://www.php.net/manual/en/function.socket-getsockname.php
 * @param resource $socket A valid socket resource created with socket_create 
 * or socket_accept.
 * @param string $addr <p>
 * If the given socket is of type AF_INET
 * or AF_INET6, socket_getsockname
 * will return the local IP address in appropriate notation (e.g.
 * 127.0.0.1 or fe80::1) in the
 * address parameter and, if the optional
 * port parameter is present, also the associated port.
 * </p>
 * <p>
 * If the given socket is of type AF_UNIX,
 * socket_getsockname will return the Unix filesystem
 * path (e.g. /var/run/daemon.sock) in the
 * address parameter.
 * </p>
 * @param int $port [optional] If provided, this will hold the associated port.
 * @return bool true on success or false on failure socket_getsockname may also return
 * false if the socket type is not any of AF_INET,
 * AF_INET6, or AF_UNIX, in which
 * case the last socket error code is not updated.
 */
function socket_getsockname ($socket, string &$addr, int &$port = null) {}

/**
 * Queries the remote side of the given socket which may either result in host/port or in a Unix filesystem path, dependent on its type
 * @link http://www.php.net/manual/en/function.socket-getpeername.php
 * @param resource $socket A valid socket resource created with socket_create
 * or socket_accept.
 * @param string $address <p>
 * If the given socket is of type AF_INET or
 * AF_INET6, socket_getpeername
 * will return the peers (remote) IP address in
 * appropriate notation (e.g. 127.0.0.1 or
 * fe80::1) in the address
 * parameter and, if the optional port parameter is
 * present, also the associated port.
 * </p>
 * <p>
 * If the given socket is of type AF_UNIX,
 * socket_getpeername will return the Unix filesystem
 * path (e.g. /var/run/daemon.sock) in the
 * address parameter.
 * </p>
 * @param int $port [optional] If given, this will hold the port associated to
 * address.
 * @return bool true on success or false on failure socket_getpeername may also return
 * false if the socket type is not any of AF_INET,
 * AF_INET6, or AF_UNIX, in which
 * case the last socket error code is not updated.
 */
function socket_getpeername ($socket, string &$address, int &$port = null) {}

/**
 * Initiates a connection on a socket
 * @link http://www.php.net/manual/en/function.socket-connect.php
 * @param resource $socket 
 * @param string $address The address parameter is either an IPv4 address
 * in dotted-quad notation (e.g. 127.0.0.1) if 
 * socket is AF_INET, a valid 
 * IPv6 address (e.g. ::1) if IPv6 support is enabled and 
 * socket is AF_INET6
 * or the pathname of a Unix domain socket, if the socket family is
 * AF_UNIX.
 * @param int $port [optional] The port parameter is only used and is mandatory
 * when connecting to an AF_INET or an 
 * AF_INET6 socket, and designates
 * the port on the remote host to which a connection should be made.
 * @return bool true on success or false on failure The error code can be retrieved with
 * socket_last_error. This code may be passed to
 * socket_strerror to get a textual explanation of the
 * error.
 * <p>
 * If the socket is non-blocking then this function returns false with an
 * error Operation now in progress.
 * </p>
 */
function socket_connect ($socket, string $address, int $port = null) {}

/**
 * Return a string describing a socket error
 * @link http://www.php.net/manual/en/function.socket-strerror.php
 * @param int $errno A valid socket error number, likely produced by 
 * socket_last_error.
 * @return string the error message associated with the errno
 * parameter.
 */
function socket_strerror (int $errno) {}

/**
 * Binds a name to a socket
 * @link http://www.php.net/manual/en/function.socket-bind.php
 * @param resource $socket A valid socket resource created with socket_create.
 * @param string $address <p>
 * If the socket is of the AF_INET family, the
 * address is an IP in dotted-quad notation
 * (e.g. 127.0.0.1).
 * </p>
 * <p>
 * If the socket is of the AF_UNIX family, the
 * address is the path of a
 * Unix-domain socket (e.g. /tmp/my.sock).
 * </p>
 * @param int $port [optional] The port parameter is only used when
 * binding an AF_INET socket, and designates
 * the port on which to listen for connections.
 * @return bool true on success or false on failure
 * <p>
 * The error code can be retrieved with socket_last_error.
 * This code may be passed to socket_strerror to get a
 * textual explanation of the error.
 * </p>
 */
function socket_bind ($socket, string $address, int $port = null) {}

/**
 * Receives data from a connected socket
 * @link http://www.php.net/manual/en/function.socket-recv.php
 * @param resource $socket The socket must be a socket resource previously
 * created by socket_create().
 * @param string $buf The data received will be fetched to the variable specified with
 * buf. If an error occurs, if the
 * connection is reset, or if no data is
 * available, buf will be set to null.
 * @param int $len Up to len bytes will be fetched from remote host.
 * @param int $flags <p>
 * The value of flags can be any combination of 
 * the following flags, joined with the binary OR (|)
 * operator.
 * </p>
 * <table>
 * Possible values for flags
 * <table>
 * <tr valign="top">
 * <td>Flag</td>
 * <td>Description</td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_OOB</td>
 * <td>
 * Process out-of-band data.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_PEEK</td>
 * <td>
 * Receive data from the beginning of the receive queue without
 * removing it from the queue.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_WAITALL</td>
 * <td>
 * Block until at least len are received.
 * However, if a signal is caught or the remote host disconnects, the
 * function may return less data.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_DONTWAIT</td>
 * <td>
 * With this flag set, the function returns even if it would normally
 * have blocked.
 * </td>
 * </tr>
 * </table>
 * </table>
 * @return int socket_recv returns the number of bytes received,
 * or false if there was an error. The actual error code can be retrieved by 
 * calling socket_last_error. This error code may be
 * passed to socket_strerror to get a textual explanation
 * of the error.
 */
function socket_recv ($socket, string &$buf, int $len, int $flags) {}

/**
 * Sends data to a connected socket
 * @link http://www.php.net/manual/en/function.socket-send.php
 * @param resource $socket A valid socket resource created with socket_create
 * or socket_accept.
 * @param string $buf A buffer containing the data that will be sent to the remote host.
 * @param int $len The number of bytes that will be sent to the remote host from 
 * buf.
 * @param int $flags The value of flags can be any combination of 
 * the following flags, joined with the binary OR (|)
 * operator.
 * <table>
 * Possible values for flags
 * <table>
 * <tr valign="top">
 * <td>MSG_OOB</td>
 * <td>
 * Send OOB (out-of-band) data.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_EOR</td>
 * <td>
 * Indicate a record mark. The sent data completes the record.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_EOF</td>
 * <td>
 * Close the sender side of the socket and include an appropriate
 * notification of this at the end of the sent data. The sent data
 * completes the transaction.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_DONTROUTE</td>
 * <td>
 * Bypass routing, use direct interface.
 * </td>
 * </tr>
 * </table>
 * </table>
 * @return int socket_send returns the number of bytes sent, or false on error.
 */
function socket_send ($socket, string $buf, int $len, int $flags) {}

/**
 * Receives data from a socket whether or not it is connection-oriented
 * @link http://www.php.net/manual/en/function.socket-recvfrom.php
 * @param resource $socket The socket must be a socket resource previously
 * created by socket_create().
 * @param string $buf The data received will be fetched to the variable specified with
 * buf.
 * @param int $len Up to len bytes will be fetched from remote host.
 * @param int $flags <p>
 * The value of flags can be any combination of 
 * the following flags, joined with the binary OR (|)
 * operator.
 * </p>
 * <table>
 * Possible values for flags
 * <table>
 * <tr valign="top">
 * <td>Flag</td>
 * <td>Description</td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_OOB</td>
 * <td>
 * Process out-of-band data.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_PEEK</td>
 * <td>
 * Receive data from the beginning of the receive queue without
 * removing it from the queue.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_WAITALL</td>
 * <td>
 * Block until at least len are received.
 * However, if a signal is caught or the remote host disconnects, the
 * function may return less data.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_DONTWAIT</td>
 * <td>
 * With this flag set, the function returns even if it would normally
 * have blocked.
 * </td>
 * </tr>
 * </table>
 * </table>
 * @param string $name If the socket is of the type AF_UNIX type,
 * name is the path to the file. Else, for
 * unconnected sockets, name is the IP address of,
 * the remote host, or null if the socket is connection-oriented.
 * @param int $port [optional] This argument only applies to AF_INET and
 * AF_INET6 sockets, and specifies the remote port
 * from which the data is received. If the socket is connection-oriented,
 * port will be null.
 * @return int socket_recvfrom returns the number of bytes received,
 * or false if there was an error. The actual error code can be retrieved by 
 * calling socket_last_error. This error code may be
 * passed to socket_strerror to get a textual explanation
 * of the error.
 */
function socket_recvfrom ($socket, string &$buf, int $len, int $flags, string &$name, int &$port = null) {}

/**
 * Sends a message to a socket, whether it is connected or not
 * @link http://www.php.net/manual/en/function.socket-sendto.php
 * @param resource $socket A valid socket resource created using socket_create.
 * @param string $buf The sent data will be taken from buffer buf.
 * @param int $len len bytes from buf will be
 * sent.
 * @param int $flags The value of flags can be any combination of 
 * the following flags, joined with the binary OR (|)
 * operator.
 * <table>
 * Possible values for flags
 * <table>
 * <tr valign="top">
 * <td>MSG_OOB</td>
 * <td>
 * Send OOB (out-of-band) data.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_EOR</td>
 * <td>
 * Indicate a record mark. The sent data completes the record.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_EOF</td>
 * <td>
 * Close the sender side of the socket and include an appropriate
 * notification of this at the end of the sent data. The sent data
 * completes the transaction.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MSG_DONTROUTE</td>
 * <td>
 * Bypass routing, use direct interface.
 * </td>
 * </tr>
 * </table>
 * </table>
 * @param string $addr IP address of the remote host.
 * @param int $port [optional] port is the remote port number at which the data
 * will be sent.
 * @return int socket_sendto returns the number of bytes sent to the
 * remote host, or false if an error occurred.
 */
function socket_sendto ($socket, string $buf, int $len, int $flags, string $addr, int $port = null) {}

/**
 * Gets socket options for the socket
 * @link http://www.php.net/manual/en/function.socket-get-option.php
 * @param resource $socket A valid socket resource created with socket_create
 * or socket_accept.
 * @param int $level The level parameter specifies the protocol
 * level at which the option resides. For example, to retrieve options at
 * the socket level, a level parameter of
 * SOL_SOCKET would be used. Other levels, such as
 * TCP, can be used by
 * specifying the protocol number of that level. Protocol numbers can be
 * found by using the getprotobyname function.
 * @param int $optname <table>
 * Available Socket Options
 * <table>
 * <tr valign="top">
 * <td>Option</td>
 * <td>Description</td>
 * <td>Type</td>
 * </tr>
 * <tr valign="top">
 * <td>SO_DEBUG</td>
 * <td>
 * Reports whether debugging information is being recorded.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_BROADCAST</td>
 * <td>
 * Reports whether transmission of broadcast messages is supported.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_REUSEADDR</td>
 * <td>
 * Reports whether local addresses can be reused.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_REUSEPORT</td>
 * <td>
 * Reports whether local ports can be reused.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_KEEPALIVE</td>
 * <td>
 * Reports whether connections are kept active with periodic transmission
 * of messages. If the connected socket fails to respond to these messages,
 * the connection is broken and processes writing to that socket are notified
 * with a SIGPIPE signal.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_LINGER</td>
 * <td>
 * <p>
 * Reports whether the socket lingers on 
 * socket_close if data is present. By default, 
 * when the socket is closed, it attempts to send all unsent data.
 * In the case of a connection-oriented socket, 
 * socket_close will wait for its peer to
 * acknowledge the data. 
 * </p>
 * <p>
 * If l_onoff is non-zero and 
 * l_linger is zero, all the 
 * unsent data will be discarded and RST (reset) is sent to the 
 * peer in the case of a connection-oriented socket. 
 * </p>
 * <p>
 * On the other hand, if l_onoff is 
 * non-zero and l_linger is non-zero,
 * socket_close will block until all the data 
 * is sent or the time specified in l_linger
 * elapses. If the socket is non-blocking, 
 * socket_close will fail and return an error.
 * </p>
 * </td>
 * <td>
 * array. The array will contain two keys:
 * l_onoff and 
 * l_linger. 
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_OOBINLINE</td>
 * <td>
 * Reports whether the socket leaves out-of-band data inline.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_SNDBUF</td>
 * <td>
 * Reports the size of the send buffer.
 * </td>
 * <td>
 * int
 * </td> 
 * </tr>
 * <tr valign="top">
 * <td>SO_RCVBUF</td>
 * <td>
 * Reports the size of the receive buffer.
 * </td>
 * <td>
 * int
 * </td> 
 * </tr>
 * <tr valign="top">
 * <td>SO_ERROR</td>
 * <td>
 * Reports information about error status and clears it.
 * </td>
 * <td>
 * int (cannot be set by socket_set_option)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_TYPE</td>
 * <td>
 * Reports the socket type (e.g. 
 * SOCK_STREAM).
 * </td>
 * <td>
 * int (cannot be set by socket_set_option)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_DONTROUTE</td>
 * <td>
 * Reports whether outgoing messages bypass the standard routing facilities.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_RCVLOWAT</td>
 * <td>
 * Reports the minimum number of bytes to process for socket 
 * input operations.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_RCVTIMEO</td>
 * <td>
 * Reports the timeout value for input operations.
 * </td>
 * <td>
 * array. The array will contain two keys:
 * sec which is the seconds part on the timeout
 * value and usec which is the microsecond part 
 * of the timeout value. 
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_SNDTIMEO</td>
 * <td>
 * Reports the timeout value specifying the amount of time that an output
 * function blocks because flow control prevents data from being sent.
 * </td>
 * <td>
 * array. The array will contain two keys:
 * sec which is the seconds part on the timeout
 * value and usec which is the microsecond part 
 * of the timeout value. 
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>SO_SNDLOWAT</td>
 * <td>
 * Reports the minimum number of bytes to process for socket output operations.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>TCP_NODELAY</td>
 * <td>
 * Reports whether the Nagle TCP algorithm is disabled.
 * </td>
 * <td>
 * int
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MCAST_JOIN_GROUP</td>
 * <td>
 * Joins a multicast group. (added in PHP 5.4)
 * </td>
 * <td>
 * array with keys "group", specifying
 * a string with an IPv4 or IPv6 multicast address and
 * "interface", specifying either an interface
 * number (type int) or a string with
 * the interface name, like "eth0".
 * 0 can be specified to indicate the interface
 * should be selected using routing rules. (can only be used in
 * socket_set_option)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MCAST_LEAVE_GROUP</td>
 * <td>
 * Leaves a multicast group. (added in PHP 5.4)
 * </td>
 * <td>
 * array. See MCAST_JOIN_GROUP for
 * more information. (can only be used in
 * socket_set_option)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MCAST_BLOCK_SOURCE</td>
 * <td>
 * Blocks packets arriving from a specific source to a specific
 * multicast group, which must have been previously joined.
 * (added in PHP 5.4)
 * </td>
 * <td>
 * array with the same keys as
 * MCAST_JOIN_GROUP, plus one extra key,
 * source, which maps to a string
 * specifying an IPv4 or IPv6 address of the source to be blocked.
 * (can only be used in socket_set_option)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MCAST_UNBLOCK_SOURCE</td>
 * <td>
 * Unblocks (start receiving again) packets arriving from a specific
 * source address to a specific multicast group, which must have been
 * previously joined. (added in PHP 5.4)
 * </td>
 * <td>
 * array with the same format as
 * MCAST_BLOCK_SOURCE.
 * (can only be used in socket_set_option)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MCAST_JOIN_SOURCE_GROUP</td>
 * <td>
 * Receive packets destined to a specific multicast group whose source
 * address matches a specific value. (added in PHP 5.4)
 * </td>
 * <td>
 * array with the same format as
 * MCAST_BLOCK_SOURCE.
 * (can only be used in socket_set_option)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>MCAST_LEAVE_SOURCE_GROUP</td>
 * <td>
 * Stop receiving packets destined to a specific multicast group whose
 * soure address matches a specific value. (added in PHP 5.4)
 * </td>
 * <td>
 * array with the same format as
 * MCAST_BLOCK_SOURCE.
 * (can only be used in socket_set_option)
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>IP_MULTICAST_IF</td>
 * <td>
 * The outgoing interface for IPv4 multicast packets.
 * (added in PHP 5.4)
 * </td>
 * <td>
 * Either int specifying the interface number or a
 * string with an interface name, like
 * eth0. The value 0 can be used to
 * indicate the routing table is to used in the interface selection.
 * The function socket_get_option returns an
 * interface index.
 * Note that, unlike the C API, this option does NOT take an IP
 * address. This eliminates the interface difference between
 * IP_MULTICAST_IF and
 * IPV6_MULTICAST_IF.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>IPV6_MULTICAST_IF</td>
 * <td>
 * The outgoing interface for IPv6 multicast packets.
 * (added in PHP 5.4)
 * </td>
 * <td>
 * The same as IP_MULTICAST_IF.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>IP_MULTICAST_LOOP</td>
 * <td>
 * The multicast loopback policy for IPv4 packets, which
 * determines whether multicast packets sent by this socket also reach
 * receivers in the same host that have joined the same multicast group
 * on the outgoing interface used by this socket. This is the case by
 * default.
 * (added in PHP 5.4)
 * </td>
 * <td>
 * int (either 0 or
 * 1). For socket_set_option
 * any value will be accepted and will be converted to a boolean
 * following the usual PHP rules.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>IPV6_MULTICAST_LOOP</td>
 * <td>
 * Analogous to IP_MULTICAST_LOOP, but for IPv6.
 * (added in PHP 5.4)
 * </td>
 * <td>
 * int. See IP_MULTICAST_LOOP.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>IP_MULTICAST_TTL</td>
 * <td>
 * The time-to-live of outgoing IPv4 multicast packets. This should be
 * a value between 0 (don't leave the interface) and 255. The default
 * value is 1 (only the local network is reached).
 * (added in PHP 5.4)
 * </td>
 * <td>
 * int between 0 and 255.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>IPV6_MULTICAST_HOPS</td>
 * <td>
 * Analogous to IP_MULTICAST_TTL, but for IPv6
 * packets. The value -1 is also accepted, meaning the route default
 * should be used.
 * (added in PHP 5.4)
 * </td>
 * <td>
 * int between -1 and 255.
 * </td>
 * </tr>
 * </table>
 * </table>
 * @return mixed the value of the given option, or false on errors.
 */
function socket_get_option ($socket, int $level, int $optname) {}

/**
 * Sets socket options for the socket
 * @link http://www.php.net/manual/en/function.socket-set-option.php
 * @param resource $socket A valid socket resource created with socket_create
 * or socket_accept.
 * @param int $level The level parameter specifies the protocol
 * level at which the option resides. For example, to retrieve options at
 * the socket level, a level parameter of
 * SOL_SOCKET would be used. Other levels, such as
 * TCP, can be used by specifying the protocol number of that level. 
 * Protocol numbers can be found by using the 
 * getprotobyname function.
 * @param int $optname The available socket options are the same as those for the
 * socket_get_option function.
 * @param mixed $optval The option value.
 * @return bool true on success or false on failure
 */
function socket_set_option ($socket, int $level, int $optname, $optval) {}

/**
 * Shuts down a socket for receiving, sending, or both
 * @link http://www.php.net/manual/en/function.socket-shutdown.php
 * @param resource $socket A valid socket resource created with socket_create.
 * @param int $how [optional] The value of how can be one of the following:
 * <table>
 * possible values for how
 * <table>
 * <tr valign="top">
 * <td>0</td>
 * <td>
 * Shutdown socket reading
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>1</td>
 * <td>
 * Shutdown socket writing
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>2</td>
 * <td>
 * Shutdown socket reading and writing
 * </td>
 * </tr>
 * </table>
 * </table>
 * @return bool true on success or false on failure
 */
function socket_shutdown ($socket, int $how = null) {}

/**
 * Returns the last error on the socket
 * @link http://www.php.net/manual/en/function.socket-last-error.php
 * @param resource $socket [optional] A valid socket resource created with socket_create.
 * @return int This function returns a socket error code.
 */
function socket_last_error ($socket = null) {}

/**
 * Clears the error on the socket or the last error code
 * @link http://www.php.net/manual/en/function.socket-clear-error.php
 * @param resource $socket [optional] A valid socket resource created with socket_create.
 * @return void 
 */
function socket_clear_error ($socket = null) {}

/**
 * Import a stream
 * @link http://www.php.net/manual/en/function.socket-import-stream.php
 * @param resource $stream The stream resource to import.
 * @return resource false or null on failure.
 */
function socket_import_stream ($stream) {}

/**
 * Export a socket extension resource into a stream that encapsulates a socket
 * @link http://www.php.net/manual/en/function.socket-export-stream.php
 * @param resource $socket 
 * @return resource Return resource or false on failure.
 */
function socket_export_stream ($socket) {}

/**
 * Send a message
 * @link http://www.php.net/manual/en/function.socket-sendmsg.php
 * @param resource $socket 
 * @param array $message 
 * @param int $flags [optional] 
 * @return int the number of bytes sent, or false on failure.
 */
function socket_sendmsg ($socket, array $message, int $flags = null) {}

/**
 * Read a message
 * @link http://www.php.net/manual/en/function.socket-recvmsg.php
 * @param resource $socket 
 * @param array $message 
 * @param int $flags [optional] 
 * @return int 
 */
function socket_recvmsg ($socket, array &$message, int $flags = null) {}

/**
 * Calculate message buffer size
 * @link http://www.php.net/manual/en/function.socket-cmsg-space.php
 * @param int $level 
 * @param int $type 
 * @param int $n [optional] 
 * @return int 
 */
function socket_cmsg_space (int $level, int $type, int $n = null) {}

/**
 * Get array with contents of getaddrinfo about the given hostname
 * @link http://www.php.net/manual/en/function.socket-addrinfo-lookup.php
 * @param string $host Hostname to search.
 * @param string $service [optional] The service to connect to. If service is a name, it is translated to the corresponding
 * port number.
 * @param array $hints [optional] Hints provide criteria for selecting addresses returned. You may specify the
 * hints as defined by getadrinfo.
 * @return array an array of AddrInfo resource handles that can be used with the other socket_addrinfo functions.
 */
function socket_addrinfo_lookup (string $host, string $service = null, array $hints = null) {}

/**
 * Create and connect to a socket from a given addrinfo
 * @link http://www.php.net/manual/en/function.socket-addrinfo-connect.php
 * @param resource $addr Resource created from socket_addrinfo_lookup()
 * @return resource a Socket resource on success or null on failure.
 */
function socket_addrinfo_connect ($addr) {}

/**
 * Create and bind to a socket from a given addrinfo
 * @link http://www.php.net/manual/en/function.socket-addrinfo-bind.php
 * @param resource $addr Resource created from socket_addrinfo_lookup().
 * @return resource a Socket resource on success or null on failure.
 */
function socket_addrinfo_bind ($addr) {}

/**
 * Get information about addrinfo
 * @link http://www.php.net/manual/en/function.socket-addrinfo-explain.php
 * @param resource $addr Resource created from socket_addrinfo_lookup()
 * @return array an array containing the fields in the addrinfo structure.
 */
function socket_addrinfo_explain ($addr) {}

/**
 * Alias: socket_get_option
 * @link http://www.php.net/manual/en/function.socket-getopt.php
 * @param mixed $socket
 * @param mixed $level
 * @param mixed $optname
 */
function socket_getopt ($socket, $level, $optname) {}

/**
 * Alias: socket_set_option
 * @link http://www.php.net/manual/en/function.socket-setopt.php
 * @param mixed $socket
 * @param mixed $level
 * @param mixed $optname
 * @param mixed $optval
 */
function socket_setopt ($socket, $level, $optname, $optval) {}

/**
 * @param mixed $socket
 * @param mixed $target_pid
 */
function socket_wsaprotocol_info_export ($socket, $target_pid) {}

/**
 * @param mixed $info_id
 */
function socket_wsaprotocol_info_import ($info_id) {}

/**
 * @param mixed $info_id
 */
function socket_wsaprotocol_info_release ($info_id) {}


/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('AF_UNIX', 1);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('AF_INET', 2);

/**
 * Only available if compiled with IPv6 support.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('AF_INET6', 23);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCK_STREAM', 1);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCK_DGRAM', 2);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCK_RAW', 3);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCK_SEQPACKET', 5);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCK_RDM', 4);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('MSG_OOB', 1);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('MSG_WAITALL', 8);
define ('MSG_CTRUNC', 512);
define ('MSG_TRUNC', 256);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('MSG_PEEK', 2);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('MSG_DONTROUTE', 4);
define ('MSG_ERRQUEUE', 4096);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_DEBUG', 1);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_REUSEADDR', 4);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_KEEPALIVE', 8);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_DONTROUTE', 16);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_LINGER', 128);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_BROADCAST', 32);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_OOBINLINE', 256);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_SNDBUF', 4097);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_RCVBUF', 4098);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_SNDLOWAT', 4099);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_RCVLOWAT', 4100);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_SNDTIMEO', 4101);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_RCVTIMEO', 4102);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_TYPE', 4104);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SO_ERROR', 4103);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOL_SOCKET', 65535);
define ('SOMAXCONN', 2147483647);

/**
 * Used to disable Nagle TCP algorithm.
 * Added in PHP 5.2.7.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('TCP_NODELAY', 1);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('PHP_NORMAL_READ', 1);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('PHP_BINARY_READ', 2);
define ('MCAST_JOIN_GROUP', 41);
define ('MCAST_LEAVE_GROUP', 42);
define ('MCAST_BLOCK_SOURCE', 43);
define ('MCAST_UNBLOCK_SOURCE', 44);
define ('MCAST_JOIN_SOURCE_GROUP', 45);
define ('MCAST_LEAVE_SOURCE_GROUP', 46);
define ('IP_MULTICAST_IF', 9);
define ('IP_MULTICAST_TTL', 10);
define ('IP_MULTICAST_LOOP', 11);
define ('IPV6_MULTICAST_IF', 9);
define ('IPV6_MULTICAST_HOPS', 10);
define ('IPV6_MULTICAST_LOOP', 11);
define ('IPV6_V6ONLY', 27);

/**
 * Interrupted system call.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EINTR', 10004);

/**
 * Bad file number.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EBADF', 10009);

/**
 * Permission denied.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EACCES', 10013);

/**
 * Bad address.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EFAULT', 10014);

/**
 * Invalid argument.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EINVAL', 10022);

/**
 * Too many open files.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EMFILE', 10024);

/**
 * Operation would block.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EWOULDBLOCK', 10035);

/**
 * Operation now in progress.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EINPROGRESS', 10036);

/**
 * Operation already in progress.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EALREADY', 10037);

/**
 * Socket operation on non-socket.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOTSOCK', 10038);

/**
 * Destination address required.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EDESTADDRREQ', 10039);

/**
 * Message too long.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EMSGSIZE', 10040);

/**
 * Protocol wrong type for socket.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EPROTOTYPE', 10041);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOPROTOOPT', 10042);

/**
 * Protocol not supported.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EPROTONOSUPPORT', 10043);

/**
 * Socket type not supported.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ESOCKTNOSUPPORT', 10044);

/**
 * Operation not supported on transport endpoint.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EOPNOTSUPP', 10045);

/**
 * Protocol family not supported.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EPFNOSUPPORT', 10046);

/**
 * Address family not supported by protocol.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EAFNOSUPPORT', 10047);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EADDRINUSE', 10048);

/**
 * Cannot assign requested address.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EADDRNOTAVAIL', 10049);

/**
 * Network is down.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENETDOWN', 10050);

/**
 * Network is unreachable.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENETUNREACH', 10051);

/**
 * Network dropped connection because of reset.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENETRESET', 10052);

/**
 * Software caused connection abort.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ECONNABORTED', 10053);

/**
 * Connection reset by peer.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ECONNRESET', 10054);

/**
 * No buffer space available.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOBUFS', 10055);

/**
 * Transport endpoint is already connected.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EISCONN', 10056);

/**
 * Transport endpoint is not connected.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOTCONN', 10057);

/**
 * Cannot send after transport endpoint shutdown.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ESHUTDOWN', 10058);

/**
 * Too many references: cannot splice.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ETOOMANYREFS', 10059);

/**
 * Connection timed out.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ETIMEDOUT', 10060);

/**
 * Connection refused.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ECONNREFUSED', 10061);

/**
 * Too many symbolic links encountered.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ELOOP', 10062);

/**
 * File name too long.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENAMETOOLONG', 10063);

/**
 * Host is down.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EHOSTDOWN', 10064);

/**
 * No route to host.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EHOSTUNREACH', 10065);

/**
 * Directory not empty.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ENOTEMPTY', 10066);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EPROCLIM', 10067);

/**
 * Too many users.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EUSERS', 10068);

/**
 * Quota exceeded.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EDQUOT', 10069);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_ESTALE', 10070);

/**
 * Object is remote.
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EREMOTE', 10071);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_EDISCON', 10101);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_SYSNOTREADY', 10091);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_VERNOTSUPPORTED', 10092);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_NOTINITIALISED', 10093);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_HOST_NOT_FOUND', 11001);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_TRY_AGAIN', 11002);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_NO_RECOVERY', 11003);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_NO_DATA', 11004);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOCKET_NO_ADDRESS', 11004);
define ('IPPROTO_IP', 0);
define ('IPPROTO_IPV6', 41);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOL_TCP', 6);

/**
 * 
 * @link http://www.php.net/manual/en/sockets.constants.php
 */
define ('SOL_UDP', 17);
define ('IPV6_UNICAST_HOPS', 4);
define ('AI_PASSIVE', 1);
define ('AI_CANONNAME', 2);
define ('AI_NUMERICHOST', 4);
define ('AI_ADDRCONFIG', 1024);
define ('AI_NUMERICSERV', 8);
define ('IPV6_RECVPKTINFO', 19);
define ('IPV6_PKTINFO', 19);
define ('IPV6_RECVHOPLIMIT', 21);
define ('IPV6_HOPLIMIT', 21);
define ('IPV6_RECVTCLASS', 40);
define ('IPV6_TCLASS', 39);

// End of sockets v.7.3.0
