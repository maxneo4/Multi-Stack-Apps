<?php

require_once('BasicRestServer.php');
require_once('UUID.php');

class UUIDRestHandler extends BasicRestServer {

    function __construct() {
        parent::__construct();
    }

    private function encodeJson($responseData) {
        return json_encode($responseData);
    }
    
    public function add($count) {
        $uuid = new UUID();
        $rawData = $uuid->getNewUUID($count);
        if (count($rawData['uuids']) === 0) {
            $statusCode = self::HTTP_NOT_FOUND;
            $rawData = array('success' => 0);
        } else {
            $statusCode = self::HTTP_OK;
        }
        $this->setHttpHeaders('application/json', $statusCode);
        echo $this->encodeJson($rawData);
    }
}