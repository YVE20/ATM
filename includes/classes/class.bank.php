<?php

class Bank extends App {

    public static function addBank($data) {
    	global $database;
    $lastid = $database->insert("bank", [
            "name" => $data['name'],
        ]);
        if ($lastid == "0") { return "11"; } else { logSystem("Bank Added - Name: " . $data['name']); return "10"; }
    }

    public static function editBank($data) {
    	global $database;
        $database->update("bank", [            
					"name" => $data['name']
        ], [ "id" => $data['id'] ]);
        logSystem("Vendor Person Edited - ID: " . $data['id']);
        return "20";
    }

    public static function deleteBank($data) {
    	global $database;
        $database->delete("bank", [ "id" => $data['id']]);
        logSystem("Bank Deleted - Name: " . $data['name']);
        return "30";
    }
    
}
