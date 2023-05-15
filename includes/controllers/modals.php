<?php

##################################
###           MODALS           ###
##################################

switch ($_GET['modal']) {


   //JOB
case "job/add":
    $job = getTable("job");
    break;
case "job/edit":
    $job = getRowById("job", $_GET['id']);
    break;
case "job/delete":
    $job = getRowById("job", $_GET['id']);
    break;

//Generate Key
case "generatekey/add":
    $generateKey = getTable("vendorgeneratekey");
    break;

//Sign Up Vendor
case "signup/add":
    $signup = getTable("people");
    $signup = getRowById("vendor", $_GET['key']);
    break;

//PO
case "po/add":
    $po = getTable("po");
    $provinces = getTable("provinces");
    break;
case "po/edit":
    $po = getRowById("po", $_GET['id']);
    $provinces = getTable("provinces");
    $regencies = getTableFiltered("regencies", "province_id", $po['province']);
    $districts = getTableFiltered("districts", "regency_id", $po['regency']);
    break;
case "po/delete":
    $po = getRowById("po", $_GET['id']);
    break;


//Vendor
case "vendor/add":
    $vr = getTable("vendor");
    $provinces = getTable("provinces");
    break;
case "vendor/edit":
    $items = getTable("vendor");
    $vr = getRowById("vendor", $_GET['id']);
    $provinces = getTable("provinces");
    $regencies = getTableFiltered("regencies", "province_id", $vr['province']);
    break;
case "vendor/delete":
    $vr = getRowById("vendor", $_GET['id']);
    break;
    
    
//Vendor Person
case "vendorperson/add":
    $jb = $database->select("job", "*", ["ORDER" => "name ASC"]);
    break;
case "vendorperson/edit":
    $jb = $database->select("job", "*", ["ORDER" => "name asc"]);
    $vp = getRowById("vendorperson", $_GET['id']);
    break;
case "vendorperson/delete":
    $vp = getRowById("vendorperson", $_GET['id']);
    break;

//Vendor Bank
case "vendorbank/add":
    $bk = $database->select("bank", "*", ["ORDER" => "name ASC"]);
    break;
case "vendorbank/edit":
    $bk = $database->select("bank", "*", ["ORDER" => "name ASC"]);
    $vb = getRowById("vendorbank", $_GET['id']);
    break;
case "vendorbank/delete":
    $vb = getRowById("vendorbank", $_GET['id']);
    break;
    
    
//Bank
case "bank/add":
    $bank = getTable("bank");
    break;
case "bank/edit":
    $bank = getRowById("bank", $_GET['id']);
    break;
case "bank/delete":
    $bank = getRowById("bank", $_GET['id']);
    break;

//Vendor Services
case "vendorservices/add":
    $vs = getTable("vendorservices");
    break;
case "vendorservices/edit":
    $vs = getRowById("Vendorservices", $_GET['id']);
    break;
case "vendorservices/update":
    $vs = getRowById("Vendorservices", $_GET['id']);
    break;
    
//Kategori
case "kategori/add":
    $kategori = getTable("kategori");
    break;
case "kategori/edit":
    $kategori = getRowById("kategori", $_GET['id']);
    break;
case "kategori/delete":
    $kategori = getRowById("kategori", $_GET['id']);
    break;

//SubKategori
case "SubKategori/add":
    $SubKategori = getTable("subkategori");
    break;
case "SubKategori/edit":
    $SubKategori = getRowById("subkategori", $_GET['id']);
    break;
case "SubKategori/delete":
    $SubKategori = getRowById("subkategori", $_GET['id']);
    break;

//Pengadaan
case "pengadaan/add":
    $pengadaan = getTable("pengadaan");
    break;
case "pengadaan/edit":
    $pengadaan = getRowById("pengadaan", $_GET['id']);
    break;
case "pengadaan/delete":
    $pengadaan = getRowById("pengadaan", $_GET['id']);
    break;

//PengadaanAcuan
case "PengadaanAcuan/add":
    $PengadaanAcuan = getTable("pengadaanacuan");
    break;
case "PengadaanAcuan/edit":
    $PengadaanAcuan = getRowById("pengadaanacuan", $_GET['id']);
    break;
case "PengadaanAcuan/delete":
    $PengadaanAcuan = getRowById("pengadaanacuan", $_GET['id']);
    break;

//Department
case "department/add":
    $department = getTable("department");
    break;
case "department/edit":
    $department = getRowById("department", $_GET['id']);
    break;
case "department/delete":
    $department = getRowById("department", $_GET['id']);
    break;

// size
case "size/add":
    $cat = $database->select("sizecat", "*", ["ORDER" => "name ASC"]);
    break;
case "size/edit":
    $cat = $database->select("sizecat", "*", ["ORDER" => "name ASC"]);
    $size = getRowById("size", $_GET['id']);
    break;
case "size/delete":
    $size = getRowById("size", $_GET['id']);
    break;
 // sizecat
case "sizecat/edit":
    $size = getRowById("sizecat", $_GET['id']);
    break;
case "sizecat/delete":
    $size = getRowById("sizecat", $_GET['id']);
    break;

//Tender
case "tender/add":
    $dp = $database->select("department", "*", ["ORDER" => "name ASC"]);
    $pg = $database->select("pengadaan", "*", ["ORDER" => "name ASC"]);
    $sc = $database->select("size", "*", ["ORDER" => "name ASC"]);
    break;
case "tender/edit":
    $dp = $database->select("department", "*", ["ORDER" => "name ASC"]);
    $pg = $database->select("pengadaan", "*", ["ORDER" => "name ASC"]);
    $sc = $database->select("size", "*", ["ORDER" => "name ASC"]);
    $tdr = getRowById("tender", $_GET['id']);
    //print_r ($vb['vendorbank']); die();
    break;
case "tender/delete":
    $tdr = getRowById("tender", $_GET['id']);
    break;
case "tender/statustender":
    $status =  $database->select("tender", "*", ["ORDER" => "name ASC"]);
case "detailStatus":
    $tdr1 = getRowById("tender", $_GET['id']);
    $tdr = getRowById("tenderstatus", $_GET['id']);
    //print_r ($vb['vendorbank']); die();
    break;
// case "tender/detailStatus":
//     $tdr = getRowById("tender", $_GET['id']);
//     $detail =  getRowById("tenderstatus", $_GET['id']);

//TenderItems
case "tender/addItems":
    $sc = $database->select("size", "*", ["ORDER" => "name ASC"]);
    break;
case "tender/editItems":
    $sc = $database->select("size", "*", ["ORDER" => "name ASC"]);
    $td = getRowById("tenderitems", $_GET['id']);
    break;
case "tenderitems/deleteItems":
    $td = getRowById("tenderitems", $_GET['id']);
    break;

//TenderVendor
case "tendervendor/addtender":
    $vendor = $database->select("vendor", "*", ["ORDER" => "name ASC"]);
    $tv = getTable("tendervendor");
    $tdr = getTable("vendor");
    break;
case "tendervendor/addVendorTender":
    $vendorr = $database->select("vendor", "*", ["ORDER" => "name ASC"]);
    $tenderr = $database->select("tendervendor", "*", ["ORDER" => "name ASC"]);
    break;
case "tenderVendor/deleteVendorTender":
    $tv = getRowById("tendervendor", $_GET['id']);
    break;  

//Send Wa
case "tender/sendwa":
    $tv = getRowById("tendervendor", $_GET['id']);
    break;
//Send Wa 1
case "tender/sendwa1":
    $tv = getTable("tendervendor");
    break;
//Send Email
case "tender/sendemail":
    $tv = getRowById("tendervendor", $_GET['id']);
    break;
//Send Email 1
case "tender/sendemail1":
    $tv = $database->select("tendervendor", "*", ["ORDER" => "name ASC"]);
    $tdr = getTable("vendor");
    break;
//Tenderpenawaran
case "tender/addpenawaran":
    $vendorr = $database->select("vendor", "*", ["ORDER" => "name ASC"]);
    $tenderr = $database->select("tendervendor", "*", ["ORDER" => "name ASC"]);
    $sc = $database->select("size", "*", ["ORDER" => "name ASC"]);
    break;
//Tenderpenawaran
case "tender/addPenawaran1":
    $vendorr = $database->select("vendor", "*", ["ORDER" => "name ASC"]);
    $tenderr = $database->select("tendervendor", "*", ["ORDER" => "name ASC"]);
    $sc = $database->select("size", "*", ["ORDER" => "name ASC"]);
    break;
case "tender/deletepenawaran":
    $tdr = getRowById("tenderpenawaran", $_GET['id']);
    break;
        // system

        // people
    case "users/add":
        $used_niks = $database->query('SELECT DISTINCT nik FROM people')->fetchAll(PDO::FETCH_COLUMN);
        $employees = $sbp_pdo->query('SELECT nik, nama_lkp FROM finance.pribadi')->fetchAll(PDO::FETCH_ASSOC);

        $employees = array_filter($employees, function ($employee) use ($used_niks) {
            return !in_array($employee['NIK'], $used_niks);
        });

        $clients = getTable("clients");
        $roles = getTableFiltered("roles", "type", "user");
        break;

    case "staff/add":
        $roles = getTableFiltered("roles", "type", "admin");
        break;

        // clients
    case "clients/edit":
        $client = getRowById("clients", $_GET['id']);
        break;

    case "clients/assignAdmin":
        $admins = getTableFiltered("people", "type", "admin");
        break;

        // escalation rules
    case "escalationrules/add":
        $admins = getTableFiltered("people", "type", "admin");
        break;

    case "escalationrules/edit":
        $rule = getRowById("tickets_rules", $_GET['id']);
        $statuses = array();
        $priorities = array();
        if ($rule['cond_status'] != "")
            $statuses = unserialize($rule['cond_status']);
        if ($rule['cond_priority'] != "")
            $priorities = unserialize($rule['cond_priority']);
        $admins = getTableFiltered("people", "type", "admin");
        break;
        // contacts
    case "contacts/edit":
        $contact = getRowById("contacts", $_GET['id']);
        break;

        // notifications
    case "notifications/edit":
        $template = getRowById("notificationtemplates", $_GET['id']);
        break;

        // support departments
    case "supportdepartments/edit":
        $department = getRowById("tickets_departments", $_GET['id']);
        break;

        // predefined replies
    case "preplies/edit":
        $preply = getRowById("tickets_pr", $_GET['id']);
        break;

    case "preplies/editReply":
        $reply = getRowById("tickets_replies", $_GET['replyid']);
        break;

    case "preplies/insert":
        $preplies = getTable("tickets_pr");
        break;

    case "preplies/addComponentReply":
        $components = getTable("components");
        break;

    case "preplies/editComponentReply":
        $components = getTable("components");
        $history = $database->select("components_history", "id", ["ticketreplyid" => $_GET['replyid'], "ORDER" => "id" . " " . "ASC"]);
        $componentid = $database->select("components_history", "componentid", ["ticketreplyid" => $_GET['replyid'], "ORDER" => "id" . " " . "ASC"]);
        $series = $database->select("components_history", "series", ["ticketreplyid" => $_GET['replyid'], "ORDER" => "id" . " " . "ASC"]);
        break;
}
