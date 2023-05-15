<?php

class VendorPerson extends App {

    public static function addVendorPerson($data) {
    	global $database;
    $lastid = $database->insert("vendorperson", [
            "id_vendor" => $data['id_vendor'],
            "id_job" => $data['id_job'],
            "nama" => $data['nama'],
			"telp" => $data['telp'],
			"email" => $data['email'],
            "timestamp" => date("Y-m-d H:i:s")
        ]);
        if ($lastid == "0") { return "11"; } else { logSystem("Vendor Person Added - Name: " . $data['nama']); return "10"; }
    }

    public static function editVendorPerson($data) {
    	global $database;
        $database->update("vendorperson", [            
					"id_job" => $data['id_job'],
					"nama" => $data['nama'],
					"telp" => $data['telp'],
					"email" => $data['email']
        ], [ "id" => $data['id'] ]);
        logSystem("Vendor Person Edited - ID: " . $data['id']);
        return "20";
    }

    public static function deleteVendorPerson($data) {
    	global $database;
        $database->delete("vendorperson", [ "id" => $data['id']]);
        logSystem("Person Vendor Deleted - Name: " . $data['nama']);
        return "30";
    }
    
}
