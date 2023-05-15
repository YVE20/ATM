<?php

class SubKategori extends App
{


	public static function addSubKategori($data)
		{
			global $database;
			$lastid = $database->insert("subkategori", [
				"kategoriid" => $data['kategoriid'],
				"name" => $data['name']
			]);
			if ($lastid == "0") {
				return "11";
			} else {
				logSystem("Sub Kategori Added - Name: " . $data['name']);
				return "10";
			}
		}
	


	public static function editSubKategori($data)
	{
		global $database;
		$database->update("subkategori", [
			"name" => $data['name']
		], ["id" => $data['id']]);
		logSystem("Sub Kategori Edited - ID: " . $data['id']);
		return "20";
	}


	public static function deleteSubKategori($data) {
    	global $database;
        $database->delete("SubKategori", [ "id" => $data['id']]);
    	logSystem("Sub Kategori Deleted - Name: " . $data['name']);
    	return "30";
    }
}
