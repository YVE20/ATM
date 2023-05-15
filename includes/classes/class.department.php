<?php

class Department extends App {

    public static function addDepartment($data) {
    	global $database;
    $lastid = $database->insert("department", [
            "name" => $data['name'],
        ]);
        if ($lastid == "0") { return "11"; } else { logSystem("Department Added - Name: " . $data['name']); return "10"; }
    }

    public static function editDepartment($data) {
    	global $database;
        $database->update("department", [            
					"name" => $data['name']
        ], [ "id" => $data['id'] ]);
        logSystem("Department Edited - ID: " . $data['id']);
        return "20";
    }

    public static function deleteDepartment($data) {
    	global $database;
        $database->delete("department", [ "id" => $data['id']]);
        logSystem("Department Deleted - Name: " . $data['name']);
        return "30";
    }
    
}
