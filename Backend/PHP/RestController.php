<?php

require_once('UUIDRestHandler.php');

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_DEFAULT);
switch ($method) {
    case 'GET':
        getUUID();
        break;
    default:
        header('HTTP/1.1 501 Not implemented');
        header('Content-Type: application/json');
        header('Status: 501');
}

function getUUID() {
    $page_key = filter_input(INPUT_GET, 'page_key', FILTER_DEFAULT);
    $count = filter_input(INPUT_GET, 'count', FILTER_DEFAULT);
    $contentType = 'application/json';
    $uuidRestHandler = new UUIDRestHandler();
    switch($page_key) {
        case 'create':
            if (!is_numeric($count)) {
                $uuidRestHandler->setHttpHeaders($contentType, $uuidRestHandler::HTTP_BAD_REQUEST);
            } else {
                $uuidRestHandler->add($count);
            }
            break;
        default:
            $uuidRestHandler->setHttpHeaders($contentType, $uuidRestHandler::HTTP_BAD_REQUEST);
    }
}
