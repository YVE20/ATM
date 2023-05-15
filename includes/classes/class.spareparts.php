<?php

class Spareparts extends App {

    public static function addSpareparts($data) {
    	global $database;
        $lastid = $database->insert("spareparts", [
            "typevid" => $data['typevid'],
            "name" => $data['name'],
            "serial" => strtoupper($data['serial']),
            "timestamp" => date("Y-m-d H:i:s")
        ]);
        if ($lastid == "0") { return "11"; } else { logSystem("Spareparts Added - Serial: " . strtoupper($data['serial'])); return "10"; }
    }

    public static function editSpareparts($data) {
    	global $database;
        $database->update("spareparts", [
            "name" => $data['name'],
            "serial" => strtoupper($data['serial'])
        ], [ "id" => $data['id'] ]);
        logSystem("Spareparts Edited - ID: " . $data['id']);
        return "20";
    }
}
?>
