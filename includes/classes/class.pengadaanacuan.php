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
	public static function calculationGuardrailReffDetail($data){
		global $database;

		$dataPengaadanAcuan = $database->query("SELECT *FROM pengadaanacuan WHERE pengadaanid ='".$data['routeid']."'")->fetchAll();

		//Membuat ID 
		$arrayDataPengadaanAcuanDetail = array();
		$idPengadaanAcuan = array();
		foreach($dataPengaadanAcuan as $dPA){
			$splitNamePengadaanAcuan = explode(' ',$dPA['name']);
			$namaPengadaan = "";
			array_push($idPengadaanAcuan,$dPA['id']);
			foreach($splitNamePengadaanAcuan as $namePengadaanAcuan){
				$namaPengadaan .= $namePengadaanAcuan."_";
			}
			$idItem = 'beamp|'.substr($namaPengadaan,0,-1)."|";

			array_push($arrayDataPengadaanAcuanDetail,$idItem);
		}

		$pengadaanAcuanDetailInsert = array();
		$pengadaanAcuanDetailUpdate = array();
		$row = 0;
		$indexUpdate = 0;
		$indexInsert = 0;
		
		foreach($arrayDataPengadaanAcuanDetail as $aDPAD){
			$pengadaan = $database->query("SELECT *FROM pengadaanacuandetail WHERE id_pengadaanacuan='".$dataPengaadanAcuan[$row++]['id']."'")->fetchAll();

			if($pengadaan){					
				//UPDATE
				$string = array();
				for($i=1;$i<=4;$i++){
					$dataIDItem = $aDPAD.$i;
					$dataPengadaanAcuanDetail = $data[$dataIDItem]."|".$pengadaan[$row]['id_pengadaanacuan']."|".$pengadaan[$i-1]['id_pengadaanacuandetail'];
					$kolomArray = str_split($dataPengadaanAcuanDetail,4);
					array_push($string,$dataPengadaanAcuanDetail);
				}	
				$pengadaanAcuanDetailUpdate[$indexUpdate++] = $string;
			}else{
				//INSERT
				$string = array();
				for($i=1;$i<=4;$i++){
					$dataIDItem = $aDPAD.$i;
					$dataPengadaanAcuanDetail = $data[$dataIDItem]."|".$dataPengaadanAcuan[$row-1]['id'];
					$kolomArray = str_split($dataPengadaanAcuanDetail,4);
					array_push($string,$dataPengadaanAcuanDetail);
				}	
				$pengadaanAcuanDetailInsert[$indexInsert++] = $string;
			}
		}

		//INSERT
		foreach($pengadaanAcuanDetailInsert as $PADI){
			foreach($PADI as $insertData){
				$split = explode('|',$insertData);
				$database->insert("pengadaanacuandetail",[
					"detailpengadaan" => $split[0],
					"id_pengadaanacuan" => $split[1]
				]);
			}
		}

		//UPDATE
		foreach($pengadaanAcuanDetailUpdate as $PADU){
			foreach($PADU as $updateData){
				$split = explode("|",$updateData);
				$database->update("pengadaanacuandetail",[
					'detailpengadaan' => $split[0]
				],[
					"id_pengadaanacuandetail" => $split[2]
				]);
			}
		}
		return "20";
	}
}
