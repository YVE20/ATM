<?php

class PengadaanAcuan extends App
{


	public static function addPengadaanAcuan($data)
		{
			global $database;
			$lastid = $database->insert("pengadaanacuan", [
				"pengadaanid" => $data['pengadaanid'],
				"name" => $data['name']
			]);
			if ($lastid == "0") {
				return "11";
			} else {
				logSystem("Pengadaan Added - Name: " . $data['name']);
				return "10";
			}
		}
	


	public static function editPengadaanAcuan($data)
	{
		global $database;
		//print_r($data['id']); die();
		$database->update("pengadaanacuan", [
			"name" => $data['name']
		], ["id" => $data['id']]);
		logSystem("Pengadaan Edited - ID: " . $data['id']);
		return "20";
	}


	public static function deletePengadaanAcuan($data) {
    	global $database;
			
        $database->delete("pengadaanacuan", [ "id" => $data['id']]);
    	logSystem("Pengadaan Deleted - Name: " . $data['name']);
    	return "30";
    }
}
