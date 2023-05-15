<?php

class VendorBank extends App {

    public static function addVendorBank($data) {
    global $database;
    $lastid = $database->insert("vendorbank", [
            "id_vendor" => $data['id_vendor'],
            "id_bank" => $data['id_bank'],
						"no_rek" => $data['no_rek'],
						"cabang" => $data['cabang'],
            "nama_pemilik" => $data['nama_pemilik'],
						"mata_uang" => $data['mata_uang']
        ]);
        if ($lastid == "0") { return "11"; } else { logSystem("Vendor Bank Added - Name: " . $data['nama_pemilik']); return "10"; }
    }

    public static function editVendorBank($data) {
    global $database;
        $database->update("vendorbank", [            
					"id_bank" => $data['id_bank'],
						"no_rek" => $data['no_rek'],
						"cabang" => $data['cabang'],
            "nama_pemilik" => $data['nama_pemilik'],
						"mata_uang" => $data['mata_uang']
        ], [ "id" => $data['id'] ]);
        logSystem("Vendor Bank Edited - ID: " . $data['id']);
        return "20";
    }

    public static function deleteVendorBank($data) {
    global $database;
        $database->delete("vendorbank", [ "id" => $data['id']]);
        logSystem("Bank Vendor Deleted - Name: " . $data['nama_pemilik']);
        return "30";
    }
}
