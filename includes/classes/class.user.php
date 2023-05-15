<?php

class User extends App
{


	public static function add($data)
	{
		global $database;
		$email = strtolower($data['email']);
		$email_count = $database->count("people", ["email" => $email]);
		if ($email_count > 0) {
			return "11";
		}
		if ($data['nik'] == "-") {
			$data['nik'] = null;
		} else {
			$nik_count = $database->count("people", ["nik" => $data['nik']]);
			if ($nik_count > 0) {
				return "11";
			}
		}


		$password = sha1($data['password']);
		$lastid = $database->insert("people", [
			"name" => $data['name'],
			'nik' => $data['nik'] ?: null,
			"type" => "user",
			"roleid" => $data['roleid'],
			"clientid" => $data['clientid'],
			"email" => $email,
			"title" => $data['title'],
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
			"lang" => getConfigValue("default_lang"),
			"ticketsnotification" => 0
		]);
		if ($lastid == "0") {
			return "11";
		} else {
			if (isset($data['notification'])) {
				if ($data['notification'] == true) Notification::newUser($lastid, $data['password']);
			}
			logSystem("User Added - ID: " . $lastid);
			return "10";
		}
	}

	public static function edit($data)
	{
		global $database;
		$email = strtolower($data['email']);
		if ($data['password'] == "") {
			$password = getSingleValue('people', 'password', $data['id']);
		} else {
			$password = sha1($data['password']);
		}

		$database->update("people", [
			"roleid" => $data['roleid'],
			"clientid" => $data['clientid'],
			'nik' => $data['nik'],
			"name" => $data['name'],
			"email" => $email,
			"title" => $data['title'],
			"mobile" => $data['mobile'],
			"password" => $password,
			"theme" => $data['theme'],
			"sidebar" => $data['sidebar'],
			"layout" => $data['layout'],
			"notes" => $data['notes'],
			"lang" => $data['lang']
		], ["id" => $data['id']]);
		logSystem("User Edited - ID: " . $data['id']);
		return "20";
	}

	public static function delete($id)
	{
		global $database;
		$database->delete("people", ["id" => $id]);
		logSystem("User Deleted - ID: " . $id);
		return "30";
	}
}
