<?php

class VendorSignUp extends App
{


	public static function addVendorSignUp($data)
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
			global $database;
			$lastid = $database->insert("vendor", [
				"key" => "-",
				"id_people" => $idpeople,
				"name" => $data['name'],
				"email" => $data['email'],
				"mobile" => $data['mobile']
			]);

			if ($lastid == "0" || $idpeople == "0") {
				return "11";
			} else {
				logSystem("Vendor Account Added - Name: " . $data['name']);
				return "10";
			}

}}

