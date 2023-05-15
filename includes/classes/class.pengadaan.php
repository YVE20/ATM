<?php

class Pengadaan extends App {

    public static function addPengadaan($data) {
    	global $database;
    $lastid = $database->insert("pengadaan", [
            "name" => $data['name'],
        ]);
        if ($lastid == "0") { return "11"; } else { logSystem("Pengadaan Added - Name: " . $data['name']); return "10"; }
    }

    public static function editPengadaan($data) {
    	global $database;
        $database->update("pengadaan", [            
					"name" => $data['name']
        ], [ "id" => $data['id'] ]);
        logSystem("Pengadaan Edited - ID: " . $data['id']);
        return "20";
    }

    public static function deletePengadaan($data) {
    	global $database;
        $database->delete("pengadaan", [ "id" => $data['id']]);
        logSystem("Pengadaan Deleted - Name: " . $data['name']);
        return "30";
    }
    
}
