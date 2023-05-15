<?php

class VendorGenerateKey extends App
{


	public static function addVendorgeneratekey($data)
	{
		global $database;
		$lastid = $database->insert("vendorgeneratekey", [
				"key" => $data['key'],
				"link" => $data['link']
		]);
		global $database;
		$lastid = $database->insert("vendor", [
				"key" => $idkey
		]);

		if ($lastid == "0") {
			return "11";
		} else {
			logSystem("Vendor Generate Key Added : " . $data['key']);
			return "10";
		}
	}
	
}
