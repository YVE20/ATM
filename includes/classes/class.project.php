<?php

class Project extends App
{


    public static function addProject($data)
    {
        global $database;
        $check = $database->count("projects", ["code" => strtoupper($data['code'])]);
        if ($check > 0) return 11;
        $pcatid = $database->get("projectcat", "id", ["name" => $data['pcatid']]);
        if ($pcatid == "") $pcatid = $database->insert("projectcat", ["name" => $data['pcatid'], "color" => rand_color()]);
        if (isset($data['issuesprogress'])) $progress = -1;
        else $progress = $data['pslider'];
        if ($data['status'] == "Complete") {
            $is_done = 1;
            $progress == 100;
        } else if ($progress == 100) {
            $data['status'] = "Complete";
            $is_done = 1;
        } else {
            $is_done = 0;
        }
        $lastid = $database->insert("projects", [
            "pcatid" => $pcatid,
            "codesakti" => strtoupper($data['codesakti']),
            "code" => strtoupper($data['code']),
            "name" => $data['name'],
            "link_loc" => $data['link_loc'],
            "province" => $data['province'],
            "regency" => $data['regency'],
            "district" => $data['district'],
            "status" => $data['status'],
            "finishdate" => $data['finishdate'],
            "notes" => "",
            "description" => $data['description'],
            "startdate" => $data['startdate'],
            "contract_price" => str_replace('.', '', $data['contract_price']),
            "is_ppn" => $data['is_ppn'],
            "is_done" => $is_done,
            "progress" => $progress,
            "timestamp" => date("Y-m-d H:i:s")
        ]);
        $tempvspro = $database->insert("vspro", [
            "projectid" => $lastid
        ]);
        if ($lastid == "0") {
            return "11";
        } else {
            $zxc = -1;
            $pos = $database->select("projectposition", "id", ["ORDER" => "ID ASC"]);
            for ($i = 0; $i < count($pos); $i++) {
                $lastidz = $database->insert("projects_admins", [
                    "projectid" => $lastid,
                    "adminid" => $zxc,
                    "pposition" => $pos[$i],
                ]);
            }
            logSystem("Project Added - ID: " . $data['name']);
            return "10";
        }
    }

    public static function editProject($data)
    {
        global $database;
        $zxc = $database->get("projects", "code", ["id" => $data['id']]);
        if (strtoupper($data['code']) != $zxc) {
            $check = $database->count("projects", ["code" => strtoupper($data['code'])]);
            if ($check > 0) return 11;
        }
        $pcatid = $database->get("projectcat", "id", ["name" => $data['pcatid']]);
        if ($pcatid == "") $pcatid = $database->insert("projectcat", ["name" => $data['pcatid'], "color" => rand_color()]);
        if (isset($data['issuesprogress'])) $progress = -1;
        else $progress = $data['pslider'];
        if ($data['status'] == "Complete") {
            $is_done = 1;
            $progress == 100;
        } else if ($progress == 100) {
            $data['status'] = "Complete";
            $is_done = 1;
        } else {
            $is_done = 0;
        }
        $database->update("projects", [
            "pcatid" => $pcatid,
            "code" => strtoupper($data['code']),
            "codesakti" => strtoupper($data['codesakti']),
            "name" => $data['name'],
            "link_loc" => $data['link_loc'],
            "province" => $data['province'],
            "regency" => $data['regency'],
            "district" => $data['district'],
            "status" => $data['status'],
            "finishdate" => $data['finishdate'],
            "notes" => "",
            "description" => $data['description'],
            "startdate" => $data['startdate'],
            "contract_price" => str_replace('.', '', $data['contract_price']),
            "is_ppn" => $data['is_ppn'],
            "is_done" => $is_done,
            "progress" => $progress,
            "updated" => date("Y-m-d H:i:s")
        ], ["id" => $data['id']]);
        logSystem("Project Edited - ID: " . $data['id']);
        return "20";
    }

    public static function editProjectdesc($data)
    {
        global $database;
        $database->update("projects", [
            "no_rap" => $data['no_rap'],
            "revisi_rap" => $data['revisi_rap'],
            "pemberi_kerja" => $data['pemberi_kerja'],
            "tgl_kontrak" => $data['tgl_kontrak'],
            "nama_proyek" => $data['nama_proyek'],
            "waktu_pelaksanaan" => $data['waktu_pelaksanaan'],
            "addendum_kontrak" => $data['addendum_kontrak'],
            "pelaksana_proyek" => $data['pelaksana_proyek'],
            "pemegang_proyek" => $data['pemegang_proyek'],
            "lokasi_proyek" => $data['lokasi_proyek'],
            "method" => $data['method'],
            "description" => $data['description']
        ], ["id" => $data['id']]);
        return "20";
    }

    public static function deleteProject($data)
    {
        global $database;
        $database->delete("projects", ["id" => $data['id']]);
        logSystem("Project Deleted - Name: " . $data['name']);
        return "30";
    }

    public static function saveNotes($data)
    {
        global $database;
        $database->update("projects", [
            "notes" => $data['notes']
        ], ["id" => $data['id']]);
        logSystem("ProjectNotes Update - ID: " . $data['id']);
        return "20";
    }

    public static function assignStaff($data)
    { //assign admin to project
        global $database;
        $database->update("projects_admins", [
            "adminid" => $data['adminid'],
        ], ["id" => $data['id']]);
        return "20";
    }

    public static function unassignStaff($data)
    { //assign admin to project
        global $database;
        $database->update("projects_admins", [
            "adminid" => -1,
        ], ["id" => $data['id']]);
        return "20";
    }

    public static function plafonProject($data)
    {
        global $database;
        $database->update("projects", [
            "plafon" => str_replace('.', '', $data['plafon']),
        ], ["id" => $data['projectid']]);
        return "20";
    }

    public static function addChargePlafon($data)
    {
        global $database;
        $account_code = $database->get("saving_account", "accountcode", ["projectid" => $data['projectid']]);

        $lastid = $database->insert("projects_chargeplafon", [
            "projectid" => $data['projectid'],
            "accountcode" => $account_code,
            "date" => $data['date'],
            "plafon" => str_replace('.', '', $data['plafon']),
            "remaining_in_bank" => str_replace('.', '', $data['remaining_in_bank']),
            "remaining_cash" => str_replace('.', '', $data['remaining_cash']),
            "charging_cash" => str_replace('.', '', $data['charging_cash']),
            "transfer" => str_replace('.', '', $data['transfer']),
            "timestamp" => date("Y-m-d H:i:s")
        ]);
        if ($lastid == "0") {
            return "11";
        } else {
            logSystem("Charge Plafon Project Added : " . $data['projectid'] . " - Rp " . $data['transfer']);
            return "10";
        }
    }

    public static function editChargePlafon($data)
    {
        global $database;
        $database->update("projects_chargeplafon", [
            "date" => $data['date'],
            "plafon" => str_replace('.', '', $data['plafon']),
            "remaining_in_bank" => str_replace('.', '', $data['remaining_in_bank']),
            "remaining_cash" => str_replace('.', '', $data['remaining_cash']),
            "charging_cash" => str_replace('.', '', $data['charging_cash']),
            "transfer" => str_replace('.', '', $data['transfer']),
            "updated" => date("Y-m-d H:i:s")
        ], ["id" => $data['id']]);
        return "20";
    }

    public static function deleteChargePlafon($data)
    {
        global $database;
        $database->delete("projects_chargeplafon", ["id" => $data['id']]);
        logSystem("Charge Plafon Project Deleted : " . $data['projectid'] . " - Rp " . $data['transfer']);
        return "30";
    }

    public static function nextTag()
    {
        global $database;
        $max = $database->max("projects", "id");
        return $max + 1;
    }


    public static function progress($id)
    {
        global $database;
        $progress = 0;
        $project = getRowById("projects", $id);
        if ($project['progress'] != -1) $progress = $project['progress'];
        else {
            $lpb = $database->sum("lpb_temp", "qty", ["projectid" => $id]);
            $countdo = $database->count("mutationprodo", ["projectid" => $id]);
            if ($lpb == 0) $progress = 0;
            else $progress = round(($countdo / $lpb) * 100, 3);
        }
        return $progress;
    }
}
