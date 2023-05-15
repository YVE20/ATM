<?php

class Kategori extends App
{


	public static function addKategori($data)
		{
			global $database;
			$lastid = $database->insert("kategori", [
				"name" => $data['name']
			]);
			if ($lastid == "0") {
				return "11";
			} else {
				logSystem("Kategori Added - Name: " . $data['name']);
				return "10";
			}
		}
	


	public static function editKategori($data)
	{
		global $database;
		$database->update("kategori", [
				"name" => $data['name']
		], ["id" => $data['id']]);
		logSystem("Kategori Edited - ID: " . $data['id']);
		return "20";
	}


	public static function deleteKategori($data) {
    	global $database;
        $database->delete("kategori", [ "id" => $data['id']]);
    	logSystem("Kategori Deleted - Name: " . $data['name']);
    	return "30";
    }
}
