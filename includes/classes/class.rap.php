<?php

class rap extends App
{

    public static function addman($data)
    {
        global $database;
        $check = $database->count("rap_man", ["AND" => ["budgetcodeid" => $data['budgetcodeid'], "projectid" => $data['projectid']]]);
        if ($check > 0) {
            return "11";
        }
        $checkSize = $database->count("size", ["id" => $data['sizeid']]);
        if ($checkSize == 0) {
            $sizeid = $database->insert("size", ["categoryid" => 0, "name" => $data['sizeid']]);
        } else {
            $sizeid = $data['sizeid'];
        }
        $lastid = $database->insert("rap_man", [
            "projectid" => $data['projectid'],
            "budgetcodeid" => $data['budgetcodeid'],
            "sizeid" => $sizeid,
            "volume" => str_replace(',', '.', str_replace('.', '', $data['volume'])),
            "unit_price" => str_replace(',', '.', str_replace('.', '', $data['unit_price'])),
            "desc" => $data['desc'],
            "created_by" => $data['created_by'],
            "timestamp" => date("Y-m-d H:i:s")
        ]);

        if ($lastid == "0") {
            return "11";
        } else {
            return "10";
        }
    }

    public static function editman($data)
    {
        global $database;
        $check = $database->count("rap_man", ["AND" => ["id[!]" => $data['id'], "budgetcodeid" => $data['budgetcodeid'], "projectid" => $data['projectid']]]);
        if ($check > 0) {
            return "11";
        }
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
        $database->update("rap_man", [
            "budgetcodeid" => $data['budgetcodeid'],
            "sizeid" => $sizeid,
            "volume" => str_replace(',', '.', str_replace('.', '', $data['volume'])),
            "unit_price" => str_replace(',', '.', str_replace('.', '', $data['unit_price'])),
            "desc" => $data['desc'],
            "updated" => date("Y-m-d H:i:s")
        ], ["id" => $data['id']]);
        return "20";
    }

    public static function deleteman($data)
    {
        global $database;
        $database->delete("rap_man", ["id" => $data['id']]);
        return "30";
    }

    public static function addpro($data)
    {
        global $database;
        $check = $database->count("rap_pro", ["AND" => ["budgetcodeid" => $data['budgetcodeid'], "projectid" => $data['projectid']]]);
        if ($check > 0) {
            return "11";
        }
        $checkSize = $database->count("size", ["id" => $data['sizeid']]);
        if ($checkSize == 0) {
            $sizeid = $database->insert("size", ["categoryid" => 0, "name" => $data['sizeid']]);
        } else {
            $sizeid = $data['sizeid'];
        }
        $lastid = $database->insert("rap_pro", [
            "projectid" => $data['projectid'],
            "budgetcodeid" => $data['budgetcodeid'],
            "sizeid" => $sizeid,
            "volume" => str_replace(',', '.', str_replace('.', '', $data['volume'])),
            "unit_price" => str_replace(',', '.', str_replace('.', '', $data['unit_price'])),
            "desc" => $data['desc'],
            "created_by" => $data['created_by'],
            "timestamp" => date("Y-m-d H:i:s")
        ]);

        if ($lastid == "0") {
            return "11";
        } else {
            return "10";
        }
    }

    public static function editpro($data)
    {
        global $database;
        $check = $database->count("rap_pro", ["AND" => ["id[!]" => $data['id'], "budgetcodeid" => $data['budgetcodeid'], "projectid" => $data['projectid']]]);
        if ($check > 0) {
            return "11";
        }
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
        $database->update("rap_pro", [
            "budgetcodeid" => $data['budgetcodeid'],
            "sizeid" => $sizeid,
            "volume" => str_replace(',', '.', str_replace('.', '', $data['volume'])),
            "unit_price" => str_replace(',', '.', str_replace('.', '', $data['unit_price'])),
            "desc" => $data['desc'],
            "updated" => date("Y-m-d H:i:s")
        ], ["id" => $data['id']]);
        return "20";
    }

    public static function deletepro($data)
    {
        global $database;
        $database->delete("rap_pro", ["id" => $data['id']]);
        return "30";
    }
}
