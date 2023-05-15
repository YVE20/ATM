<?php

class Job extends App
{


	public static function addJob($data)
		{
			global $database;
			$lastid = $database->insert("job", [
				"name" => $data['name'],
				"color" => $data['color']
			]);
			if ($lastid == "0") {
				return "11";
			} else {
				logSystem("Job Added - Name: " . $data['type']);
				return "10";
			}
		}
	


	public static function editJob($data)
	{
		global $database;
		$database->update("job", [
			"name" => $data['name'],
			"color" => $data['color']
		], ["id" => $data['id']]);
		logSystem("Job Edited - ID: " . $data['id']);
		return "20";
	}


	public static function deleteJob($data) {
    	global $database;
        $database->delete("job", [ "id" => $data['id']]);
    	logSystem("Job Deleted - Name: " . $data['type']);
    	return "30";
    }
}
