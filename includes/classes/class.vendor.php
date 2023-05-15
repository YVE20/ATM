<?php

class Vendor extends App
{


	public static function addVendor($data)
	{
		global $database;
		$email = strtolower($data['email']);
		$count = $database->count("people",["email" => $email]);
		if ($count == "1") { return "11"; }
		$password = sha1($data['password']);
		$idpeople = $database->insert("people", [
				"type" => "user",
				"roleid" => "2",
				"clientid" => "0",
				"name" => $data['name'],
				"email" => $data['email'],
        "mobile" => $data['mobile'],
				"password" => $password,
				"theme" => "skin-blue",
				"sidebar" => "opened",
				"layout" => "",
				"notes" => "",
				"signature" => "",
				"sessionid" => "",
				"resetkey" => "",
				"autorefresh" => 0,
				"lang" => "en",
				"ticketsnotification" => 0
		]);
		$idvendor = $database->insert("vendor", [
				"key" => "-",
				"id_people" => $idpeople,
				"name" => $data['name'],
				"alamat" => "",
				"kode_pos" => "",
				"mobile" => $data['mobile'],
				"email" => $data['email'],
				"fax" => "",
				"nomor_npwp" => "",
				"nama_npwp" => "",
				"alamat_npwp" => "",
				"nama_pemilik" => "",
				"province" => "",
				"regency" => ""
		]);
				$perms = serialize($data['perms']);
        $lastid = $database->insert("vendorservices", [
            "id_vendor" => $idvendor,
            "perms" => 'a:1:{i:0;s:4:"Null";}'
        ]);

		if ($idpeople == "0" || $idvendor == "0" || $lastid == "0") {
			return "11";
		} else {
			logSystem("Vendor Added - Nama: " . $data['name']);
			return "10";
		}
	}


	public static function editVendor($data)
	{
		global $database;
		$database->update("vendor", [
				"key" => "-",
				"name" => $data['name'],
				"alamat" => $data['alamat'],
				"kode_pos" => $data['kode_pos'],
				"mobile" => $data['mobile'],
				"email" => $data['email'],
				"fax" => $data['fax'],
				"nomor_npwp" => $data['nomor_npwp'],
				"nama_npwp" => $data['nama_npwp'],
				"alamat_npwp" => $data['alamat_npwp'],
				"nama_pemilik" => $data['nama_pemilik'],
				"province" => $data['province'],
				"regency" => $data['regency']
		], ["id" => $data['id']]);
		logSystem("Vendor Edited - ID: " . $data['id']);
		return "20";
	}


	public static function deleteVendor($data) {
    	global $database;
        $database->delete("vendor", [ "id" => $data['id']]);
    	logSystem("Vendor Deleted - Nama: " . $data['nama_vendor']);
    	return "30";
    }

	
}
?>