<?php

class VendorServices extends App {

    // ----------------------------------------------------------------------------------------------
    // Services

    public static function addService($data) {
    	global $database;
        
        $database->update("vendorservices", [
            "perms" => serialize($data['perms'])
        ], [ "id_vendor" => $data['id_vendor'] ]);

    	if ($lastid == "0") { return "11"; } else { logSystem("Services Added - ID: " . $lastid); return "10"; }
    	}

}

?>
