<?php

class Projects_Job_Detail extends App
{

    public static function add($data)
    {
        global $database;
        $checkSize = $database->count("size", ["id" => $data['sizeid']]);
        if ($checkSize == 0) {
            $sizeid = $database->insert("size", ["categoryid" => 0, "name" => $data['sizeid']]);
        } else {
            $sizeid = $data['sizeid'];
        }
        $lastid = $database->insert("projects_job_detail", [
            "name" => $data['name'],
            "sizeid" => $sizeid,
            "projectid" => $data['projectid'],
            "volume_contract" => str_replace(',', '.', str_replace('.', '', $data['volume_contract'])),
            "price" => str_replace('.', '', $data['price'])
        ]);

        if ($lastid == "0") {
            return "11";
        } else {
            logSystem("Job Detail " . getSingleValue("projects", "name", $data['projectid']) . " Added : " . $data['name']);
            return "10";
        }
    }

    public static function edit($data)
    {
        global $database;
        $sizeid = 0;
        $checkSizebyID = $database->count("size", ["id" => $data['sizeid']]);

        if ($checkSizebyID == 0) {
            $checkSizebyName = $database->count("size", ["name" => $data['sizeid']]);
            if ($checkSizebyName == 0) {
                $sizeid = $database->insert("size", ["categoryid" => 0, "name" => $data['sizeid']]);
            } else {
                $sizeid = $database->get("size", "id", ["name" => $data['sizeid']]);
            }
        } else {
            $sizeid = $data['sizeid'];
        }
        $database->update("projects_job_detail", [
            "name" => $data['name'],
            "sizeid" => $sizeid,
            "volume_contract" => str_replace(',', '.', str_replace('.', '', $data['volume_contract'])),
            "price" => str_replace('.', '', $data['price'])
        ], ["id" => $data['id']]);
        logSystem("Job Detail Edited - ID: " . $data['id']);
        return "20";
    }

    public static function delete($data)
    {
        global $database;
        $database->delete("projects_job_detail", ["id" => $data['id']]);
        logSystem("Job Detail " . getSingleValue("projects", "name", $data['projectid']) . " Deleted : " . $data['name']);
        return "30";
    }
}
