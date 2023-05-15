<?php

class Master extends App
{
    // ----------------------------------------------------------------------------------------------
    // Size Cat

    public static function addSizeCat($data)
    {
        global $database;
        if (empty($data['color'])) $data['color'] = "#000000";
        $lastid = $database->insert("sizecat", ["name" => $data['name'], "color" => $data['color']]);
        if ($lastid == "0") {
            return "11";
        } else {
            logSystem("Size Category Added - Name: " . $data['name']);
            return "10";
        }
    }

    public static function editSizeCat($data)
    {
        global $database;
        if (empty($data['color'])) $data['color'] = "#000000";
        $database->update("sizecat", ["name" => $data['name'], "color" => $data['color']], ["id" => $data['id']]);
        logSystem("Size Category Edited - ID: " . $data['id']);
        return "20";
    }

    public static function deleteSizeCat($data)
    {
        global $database;
        $database->delete("sizecat", ["id" => $data['id']]);
        logSystem("Size Category Deleted - Name: " . $data['name']);
        return "30";
    }

    // ----------------------------------------------------------------------------------------------
    // Size

    public static function addSize($data)
    {
        global $database;
        $lastid = $database->insert("size", ["categoryid" => $data['cat'], "name" => $data['name']]);
        if ($lastid == "0") {
            return "11";
        } else {
            logSystem("Size Added - Name: " . $data['name']);
            return "10";
        }
    }

    public static function editSize($data)
    {
        global $database;
        $database->update("size", ["name" => $data['name'], "categoryid" => $data['cat']], ["id" => $data['id']]);
        logSystem("Size Edited - ID: " . $data['id']);
        return "20";
    }

    public static function deleteSize($data)
    {
        global $database;
        $database->delete("size", ["id" => $data['id']]);
        logSystem("Size Deleted - Name: " . $data['name']);
        return "30";
    }
}
