<?php

class UUID
{
    public function getNewUUID($count) {
        $guids = array("uuids" => array());
        for($i = 0; $i<$count; $i++) {
            $guid = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X',
                    mt_rand(0, 65535),
                    mt_rand(0, 65535),
                    mt_rand(0, 65535),
                    mt_rand(16384, 20479),
                    mt_rand(32768, 49151),
                    mt_rand(0, 65535),
                    mt_rand(0, 65535),
                    mt_rand(0, 65535));
            array_push($guids["uuids"], $guid);
        }
        return $guids;
    }
}