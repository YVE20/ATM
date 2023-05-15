<?php

class Po extends App
{


	public static function addPo($data)
	{
		global $database;
		$lastid = $database->insert("po", [
			"nama_barang" => $data['nama_barang'],
			"customer" => $data['customer'],
			"jml_satuan" => $data['jml_satuan'],
			"province" => $data['province'],
			"regency" => $data['regency'],
			"district" => $data['district'],
			"harga"  => $data['harga'],
			"tgl_pengiriman" => $data['tgl_pengiriman'],
			"keterangan" => $data['keterangan']
		]);
		if ($lastid == "0") {
			return "11";
		} else {
			logSystem("po Added - Nama: " . $data['nama_barang']);
			return "10";
		}
	}


	public static function editPo($data)
	{
		global $database;
		$database->update("po", [
                "nama_barang" => $data['nama_barang'],
				"customer" => $data['customer'],
                "jml_satuan" => $data['jml_satuan'],
				"province" => $data['province'],
				"regency" => $data['regency'],
				"district" => $data['district'],
                "harga"  => $data['harga'],
                "tgl_pengiriman" => $data['tgl_pengiriman'],
                "keterangan" => $data['keterangan']
		], ["id" => $data['id']]);
		logSystem("Po Edited - ID: " . $data['id']);
		return "20";
	}


	public static function deletePo($data) {
    	global $database;
        $database->delete("po", [ "id" => $data['id']]);
    	logSystem("Po Deleted - Nama: " . $data['nama_barang']);
    	return "30";
    }
}
