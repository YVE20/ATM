<?php

class realpro extends App
{

    // ----------------------------------------------------------------------------------------------
    // Realpro

    public static function addnew($data)
    {
        global $database;
        for ($i = 0; $i <= count($data['name']) - 1; $i++) {
            $checkSize = $database->count("size", ["id" => strtolower($data['sizeid'][$i])]);
            if ($checkSize == 0) {
                $sizeid = $database->insert("size", ["categoryid" => 0, "name" => strtolower($data['sizeid'][$i])]);
            } else {
                $sizeid = strtolower($data['sizeid'][$i]);
            }
            $lastid = $database->insert("realpro", [
                "projectid" => $data['projectid'],
                "reff" => $data['reff'][$i],
                "noreff" => $data['noreff'][$i],
                "budgetcodeid" => $data['budgetcodeid'][$i],
                "name" => $data['name'][$i],
                "volume" => $data['volume'][$i],
                "sizeid" => $sizeid,
                "unit_price" => str_replace('.', '', $data['unit_price'][$i]),
                "desc" => $data['desc'][$i],
                "date" => $data['date'],
                "created_by" => $data['liu'],
                "timestamp" => date("Y-m-d H:i:s")
            ]);
            logSystem("Real " . getSingleValue("projects", "code", $data['projectid']) . " Added - ID: " . $lastid);
        }
    }

    public static function add($data)
    {
        global $database;
        $size = strtolower(str_replace(" ", "", $data['sizeid']));
        $checkSize = $database->count("size", ["id" => $size]);
        if ($checkSize == 0) {
            $checkName = $database->count("size", ["name" => $size]);
            if ($checkName == 0) {
                $sizeid = $database->insert("size", ["categoryid" => 0, "name" => strtolower($data['sizeid'])]);                
            } else {
                $sizeid = $database->get("size", "id", ["name" => strtolower($data['sizeid'])]);
            }            
        } else {
            $sizeid = $data['sizeid'];
        }
        $lastid = $database->insert("realpro", [
            "kasid" => $data['kasid'],
            "reff" => $data['reff'],
            "noreff" => $data['noreff'],
            "budgetcodeid" => $data['budgetcodeid'],
            "name" => $data['name'],
            "volume" => $data['volume'],
            "sizeid" => $sizeid,
            "unit_price" => str_replace('.', '', $data['unit_price']),
            "desc" => $data['desc'],
            "date" => $data['date'],
            "created_by" => $data['liu'],
            "timestamp" => date("Y-m-d H:i:s")
        ]);
        if ($lastid == "0") {
            return "11";
        } else {
            logSystem("Real " . getSingleValue("kas", "name", $data['kasid']) . " Added - ID: " . $lastid);
            return "10";
        }
    }

    public static function addTR($data)
    {
        global $database;
        $size = strtolower(str_replace(" ", "", $data['sizeid']));
        $checkSize = $database->count("size", ["id" => $size]);
        if ($checkSize == 0) {
            $checkName = $database->count("size", ["name" => $size]);
            if ($checkName == 0) {
                $sizeid = $database->insert("size", ["categoryid" => 0, "name" => strtolower($data['sizeid'])]);                
            } else {
                $sizeid = $database->get("size", "id", ["name" => strtolower($data['sizeid'])]);
            }            
        } else {
            $sizeid = $data['sizeid'];
        }
        $lastid = $database->insert("realpro", [
            "projectid" => $data['projectid'],
            "reff" => $data['reff'],
            "noreff" => $data['noreff'],
            "budgetcodeid" => $data['budgetcodeid'],
            "name" => $data['name'],
            "volume" => $data['volume'],
            "sizeid" => $sizeid,
            "unit_price" => str_replace('.', '', $data['unit_price']),
            "desc" => $data['desc'],
            "date" => $data['date'],
            "created_by" => $data['liu'],
            "timestamp" => date("Y-m-d H:i:s")
        ]);
        if ($lastid == "0") {
            return "11";
        } else {
            logSystem("Real " . getSingleValue("projects", "code", $data['projectid']) . " Added - ID: " . $lastid);
            return "10";
        }
    }

    public static function edit($data)
    {
        global $database;
        $size = strtolower(str_replace(" ", "", $data['sizeid']));
        $checkSize = $database->count("size", ["id" => $size]);
        if ($checkSize == 0) {
            $checkName = $database->count("size", ["name" => $size]);
            if ($checkName == 0) {
                $sizeid = $database->insert("size", ["categoryid" => 0, "name" => strtolower($data['sizeid'])]);                
            } else {
                $sizeid = $database->get("size", "id", ["name" => strtolower($data['sizeid'])]);
            }            
        } else {
            $sizeid = $data['sizeid'];
        }
        $database->update("realpro", [
            "budgetcodeid" => $data['budgetcodeid'],
            "reff" => $data['reff'],
            "noreff" => $data['noreff'],
            "name" => $data['name'],
            "volume" => $data['volume'],
            "sizeid" => $sizeid,
            "unit_price" => str_replace('.', '', $data['unit_price']),
            "desc" => $data['desc'],
            "date" => $data['date'],
            "updated" => date("Y-m-d H:i:s")
        ], ["id" => $data['id']]);
        logSystem("Real " . getSingleValue("projects", "code", $data['projectid']) . " Edited - ID: " . $data['id']);
        return "20";
    }

    public static function valid($data)
    {
        global $database;
        $checkSize = $database->count("size", ["id" => $data['sizeid']]);
        if ($checkSize == 0) {
            $sizeid = $database->insert("size", ["categoryid" => 0, "name" => $data['sizeid']]);
        } else {
            $sizeid = $data['sizeid'];
        }
        $database->update("realpro", [
            "budgetcodeid" => $data['budgetcodeid'],
            "reff" => $data['reff'],
            "noreff" => $data['noreff'],
            "name" => $data['name'],
            "volume" => $data['volume'],
            "sizeid" => $sizeid,
            "unit_price" => str_replace('.', '', $data['unit_price']),
            "desc" => $data['desc'],
            "date" => $data['date'],
            "is_valid" => 1,
            "updated" => date("Y-m-d H:i:s")
        ], ["id" => $data['id']]);
        logSystem("Real " . getSingleValue("kas", "name", $data['kasid']) . " Valid - ID: " . $data['id']);
        return "20";
    }

    public static function delete($data)
    {
        global $database;
        $database->delete("realpro", ["id" => $data['id']]);
        logSystem("Real Deleted - ID: " . $data['id']);
        return "30";
    }
}
