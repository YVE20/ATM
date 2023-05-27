<?php

##################################
###     GET DATA FOR PAGES     ###
##################################

// GENERAL
// JOB
if ($route == "master-data/vendor/job") {
    //isAuthorized("manageData");
    $jobs = getTable("job");
    $pageTitle = __("Job");
}
// bank
if ($route == "master-data/vendor/bank") {
    //isAuthorized("manageData");
    $banks = getTable("bank");
    $pageTitle = __("Bank");
}
//PO
if ($route == "master-data/po"){
    //isAuthorized("manageData");
    if ($isAdmin){
        $poo = $database->SELECT("po", "*");
    }else{
        $poo = getTableFiltered("po", "id", $po['id'], "", "", "*", "nama_barang", "ASC");
    }
    $pageTitle = __("Po");
}
if ($route == "master-data/po/manage") {
    //isAuthorized("manageAsset");
    $curdate = date("Y-m-d");
    $onecurdate = date('Y-m-01', strtotime($curdate));
    $lastcurdate = date('Y-m-t', strtotime($curdate));
    $poo = getRowById("po", $_GET['id']);

    $pageTitle = __("Po");
}


//VENDOR
if ($route == "vendor/vendor") {
    //isAuthorized("manageData");
    $vendorr = $database->select("vendor", "*", ["ORDER" => "id ASC"]);
    $pageTitle = __("Vendor");
}
if ($route == "vendor/manage/manage") {
    //isAuthorized("manageAsset");
    $cek =  $database->get("vendor", "id_people", ["id" =>  $_GET['id']]);
    if ($liu['id']==1 || $cek == $liu['id']) {
        
    } else {
        header("Location:?route=dashboard");
    }
    $vendorr = getRowById("vendor", addslashes(trim($_GET['id'])));
    $kategori = $database->select("kategori", "*", ["ORDER" => "id ASC"]);
    $subkategoris = $database->select("subkategori", "*", ["ORDER" => "id ASC"]);
    $jb = getTable("job");
    $bk = getTable("bank");
    $sbk = getTable("subkategori");
    $vendorperson = $database->query("select * FROM vendorperson where id_vendor=" . $_GET['id'] . "  order by id_job asc, nama desc")->fetchAll();
    $vendorbank = $database->query("select * FROM vendorbank where id_vendor=" . $_GET['id'] . " order by no_rek desc, id asc")->fetchAll();   
    
//     $vendorservices  = $database->query("select * FROM vendorservices where id_vendor=" . $_GET['id'] . " order by id desc")->fetchAll();
//     foreach ($vendorservices as $dor) {
// $servicesperms = unserialize ($dor['perms']);

// print_r($servicesperms); die();
//     }
    $pageTitle = __($vendorr['name']);
    
}

//Generate Key
if ($route == "master-data/vendor/generatekey") {
    //isAuthorized("viewGenerateKey");
    $genkeyactive =  $database->query("select * FROM vendorgeneratekey where status != 0")->fetchAll();
    $genkeynonacctive =  $database->query("select * FROM vendorgeneratekey where status = 0")->fetchAll();
    $genkey = $database->select("vendorgeneratekey", "*", ["ORDER" => "id ASC"]);
    $pageTitle = __("Generate Key");
}

//kategori
if ($route == "master-data/vendor/kategori") {
    //isAuthorized("manageData");
    $kategoris = $database->select("kategori", "*", ["ORDER" => "id ASC"]);
    $pageTitle = __("Kategori");
}
if ($route == "master-data/vendor/vendor/managekategori") {
     //isAuthorized("manageAsset");
    $kategoris = getRowById("kategori", addslashes(trim($_GET['id'])));
    $subkategori = $database->query("select * FROM subkategori where kategoriid=" . $_GET['id'] . " order by id, kategoriid desc")->fetchAll();
    $pageTitle = __($kategoris['name']);
    
}
// Pengadaan
if ($route == "master-data/tender/pengadaan") {
    //isAuthorized("manageData");
    $pengadaans = $database->select("pengadaan", "*", ["ORDER" => "id ASC"]);
    $pageTitle = __("Jenis Pengadaan");
}
if ($route == "master-data/tender/tender/managepengadaan") {
    //isAuthorized("manageAsset");
    $pengadaans = getRowById("pengadaan", addslashes(trim($_GET['id'])));
    $acuan = $database->query("select * FROM pengadaanacuan where pengadaanid=" . $_GET['id'] . " order by id, pengadaanid desc")->fetchAll();
    $pageTitle = __($pengadaans['name']);

}

// Department
if ($route == "master-data/tender/department") {
    //isAuthorized("manageData");
    $departments = getTable("department");
    $pageTitle = __("Department");
}

// DATA SIZECAT
if ($route == "master-data/size-data/sizecat") {
    //isAuthorized("manageData");
    $sizecat = getTable("sizecat");
    $pageTitle = __("Size Categories");
}

// DATA SIZE
if ($route == "master-data/size-data/size") {
    //isAuthorized("manageData");
    $sizee = $database->select("size", "*", ["ORDER" => "categoryid ASC"]);
    $pageTitle = __("Data Size");
}



//TENDER
if ($route == "tender/tender") {
    //isAuthorized("manageData");
    //$tenderr = $database->query("select * FROM tender where status =  'Open' UNION select * FROM tender where status =  'In Progress' ")->fetchAll();

    //Get People  By Email
    $people = $database->query("SELECT id,name,type,title FROM people WHERE email='".$_SESSION['email']."'")->fetchAll();
    
    if($people[0]['type'] == "admin" && $people[0]['title'] == "SUPERADMIN")
    {
        $tenderr = $database->query("SELECT *FROM tender WHERE (status = 'Open' OR status = 'In Progress')")->fetchAll();
        $complete =  $database->query("SELECT * FROM tender where status = 'Complete'")->fetchAll();
        $cancelled =  $database->query("SELECT * FROM tender where status = 'Cancelled'")->fetchAll();
    }
    else if($people[0]['type'] != "admin" )
    {
        $tenderr = $database->query("SELECT *FROM tender t INNER JOIN people p on t.id_people = p.id  WHERE (t.status = 'Open' OR t.status = 'In Progress')")->fetchAll();

        $complete =  $database->query("SELECT * FROM tender t INNER JOIN  people p on t.id_people = p.id WHERE t.status = 'Complete'");
        $cancelled =  $database->query("SELECT * FROM tender t INNER JOIN  people p on t.id_people = p.id  WHERE t.status = 'Cancelled'")->fetchAll();
    }
    $kategori = $database->select("kategori", "*", ["ORDER" => "id ASC"]);
    $subkategoris = $database->select("subkategori", "*", ["ORDER" => "id ASC"]);
    $pg = getTable("pengadaan");
    $dp = getTable("department");
    $sc = getTable("sizecat");
    $pageTitle = __("Tender");
}
if ($route == "tender/tender/manage") {
    //isAuthorized("manageAsset");
    $tenderr = getRowById("tender", addslashes(trim($_GET['id'])));

    $systemLog = getTable("systemlog");
    $vendorr = $database->select("vendor", "*", ["ORDER" => "id ASC"]);
    $tendervendorr = $database->query("select * FROM tendervendor where id_tender=" . $_GET['id'] . " order by id, id_tender desc")->fetchAll();

    $penawaran = $database->query("select * FROM tenderpenawaran where id_tender=" . $_GET['id'] . " group by id_tendervendor order by id_tendervendor desc")->fetchAll();


    $sendtender = $database->query("select * FROM tendervendor where id_tender=" . $_GET['id'] . " order by id_tender desc")->fetchAll();
    $statustender =$database->query("select * FROM tenderstatus where id_tender=" . $_GET['id'] . " order by id asc")->fetchAll();

    $pen = getRowById("tenderstatus", addslashes(trim($_GET['id'])));
    $vendorpenawaran = $database->query("select * FROM tenderpenawaran where id_tendervendor=". $_GET['id'] ." order by id desc")->fetchAll();

    $hai = getRowById("tenderitems", $_GET['id']);
    $kategori = $database->select("kategori", "*", ["ORDER" => "id ASC"]);
    $subkategoris = $database->select("subkategori", "*", ["ORDER" => "id ASC"]);

    // $items = $database->query("Select * from tender t inner join tenderitems ti on t.id = ti.id_tender inner join 
    // tenderpenawaran tp on tp.id_itemtender = ti.id inner join tendervendor tv on tv.id_vendor = tp.id_tendervendor
    // inner join tenderstatus ts on t.id = ts.id_tender where ts.status = 'Open' and ti.id_tender = ".$_GET['id']." ORDER BY harga DESC limit 3;")->fetchAll();

    $items = $database->query("SELECT DISTINCT(tv.id_vendor), tv.name, tp.tgl, tp.harga, tp.info, ti.nameitems, ti.qty, ti.id AS 'id_ti', ti.id_sizecat FROM tendervendor tv 
    INNER JOIN tenderpenawaran tp ON tv.id_vendor = tp.id_tendervendor 
    INNER JOIN tenderitems ti ON ti.id_tender = tp.id_tender
    WHERE tv.id_tender='".$_GET['id']."' GROUP BY tv.id_vendor  ORDER BY tp.harga ASC LIMIT 3")->fetchAll();
    

    $tenderItems = $database->query("SELECT *FROM tenderitems WHERE id_tender ='".$_GET['id']."'")->fetchAll();

    //Get Pengadaan from Tender
    $pengadaan = $database->query("SELECT *FROM tender WHERE id ='".$_GET['id']."'")->fetchAll();
    $acuan = $database->query("select * FROM pengadaanacuan where pengadaanid=" . $pengadaan[0]['id_pengadaan'] . " order by id, pengadaanid desc")->fetchAll();
    $pg = getTable("pengadaan");
    $dp = getTable("department");
    $sc = getTable("sizecat"); 
    $vdr = getTable("vendor");

    

    if(isset($_GET['id'])){
        $cek = $database->get("tender", "kategori", ["id" => $_GET['id']]);
    }
    $servicesperms = unserialize ($cek);
    $pageTitle = __($tenderr['kode']);
    
}
if ($route == "tender/tender/add") {
    //isAuthorized("manageData");
    $tenderr = $database->select("tender", "*", ["ORDER" => "name ASC"]);
    $kategori = $database->select("kategori", "*", ["ORDER" => "id ASC"]);
    $subkategoris = $database->select("subkategori", "*", ["ORDER" => "id ASC"]);
    $pg = getTable("pengadaan");
    $dp = getTable("department");
    $sc = getTable("size");
    $pageTitle = __("Add Tender");
}
if ($route == "tender/tender/edit") {
    //isAuthorized("manageData");
    $tenderr = getRowById("tender", addslashes(trim($_GET['id'])));
    $kategori = $database->select("kategori", "*", ["ORDER" => "id ASC"]);
    $subkategoris = $database->select("subkategori", "*", ["ORDER" => "id ASC"]);
    $pg = getTable("pengadaan");
    $dp = getTable("department");
    $sc = getTable("size");
    if(isset($_GET['id'])){
        $cek = $database->get("tender", "kategori", ["id" => $_GET['id']]);
    }
    $tenderkategori = unserialize ($cek);
    

    $pageTitle = __("Edit Tender");
}
if ($route == "tender/tender/addvendor") {
    //isAuthorized("manageData");
    
    $addvendorr = $database->select("vendor", "*", ["ORDER" => "name ASC"]);

    $tenderr = getRowById("tender", addslashes(trim($_GET['id'])));
    $pageTitle = __("Add Vendor");
}
//Penawaran
if ($route == "tender/tender/addpenawaran") {
    //isAuthorized("manageData");
    $pengadaan = $database->select("pengadaan", "*", ["ORDER" => "id ASC"]);
    $pengadaanacuan = $database->select("pengadaanacuan", "*", ["ORDER" => "id ASC"]);

    $tenderr = getRowById("tender", addslashes(trim($_GET['id'])));
    $vendorpenawar = $database->select("vendor", "*", ["ORDER" => "id ASC"]);
    $tendervendorr = $database->query("select * FROM tendervendor where id_tender=" . $_GET['id'] . " order by id, id_tender desc")->fetchAll();

    $items = $database->query("select * FROM tenderitems where id_tender=" . $_GET['id'] . " order by id, id_tender desc")->fetchAll();

    //$pengadaans = $database->query("select * FROM tender where id_pengadaan=" . $_GET['id'] . " order by id, id_tender desc")->fetchAll();
    foreach ($vendorpenawar as $tendervendor ) {
        
    }
    $sc = getTable("size");
    $pageTitle = __("Add Tender");
}
if($route == "tender/tender/editpenawaran"){
    //isAuthorized("manageData");
    $pengadaan = $database->select("pengadaan", "*", ["ORDER" => "id ASC"]);
    $pengadaanacuan = $database->select("pengadaanacuan", "*", ["ORDER" => "id ASC"]);

    $tenderr = getRowById("tender", addslashes(trim($_GET['id'])));
    $vendorpenawar = $database->select("vendor", "*", ["ORDER" => "id ASC"]);
    $tendervendorr = $database->query("select * FROM tendervendor where id_vendor=" . $_GET['idtendervendor'] . " order by id, id_tender desc")->fetchAll();

    $items = $database->query("select * FROM tenderitems where id_tender=" . $_GET['id'] . " order by id, id_tender desc")->fetchAll();

    //$pengadaans = $database->query("select * FROM tender where id_pengadaan=" . $_GET['id'] . " order by id, id_tender desc")->fetchAll();
    foreach ($vendorpenawar as $tendervendor ) {
        
    }
    $sc = getTable("size");
    $pageTitle = __("Edit Penawaran Tender");
}
//Penawaran
if ($route == "tender/tender/addpenawaran1") {
    //isAuthorized("manageData");
 //isAuthorized("manageData");
        $vendorpenawar = $database->select("vendor", "*", ["ORDER" => "id ASC"]);
        foreach ($vendorpenawar as $tendervendor ) {
            
        }
        $tenderr = getRowById("tender", addslashes(trim($_GET['id'])));
    $pageTitle = __("Add Tender");
}

if ($route == "reports/view") {
    if ($_GET['report'] == "offer") {
        // $hai = getRowById("tender", $_GET['id']);
        // $items = getTableFiltered("tenderpenawaran", "id_vendor", $hai['id']);

        $tenderr = getRowById("tenderpenawaran", addslashes(trim($_GET['id'])));
        $penawaran = $database->query("select * FROM tenderpenawaran where id_tender=" . $_GET['id'] . " order by id_tendervendor desc")->fetchAll();
        $items = $database->query("select * FROM tenderitems where id=" . $_GET['id'] . " order by id desc")->fetchAll();
        $pageTitle = __("Offer Tender - " . $tenderr['kode_penawaran_vendor']);
    } else if ($_GET['report'] == "ppd") {
        $hai = getRowById("ppd", $_GET['id']);
        $pageTitle = __("PPD " . add_nol($hai['id'], 5));
    } else if ($_GET['report'] == "calc_marka") {
        $id = addslashes(trim($_GET['id']));
        $head = $database->get("calculation_marka_head", "*", ["id" => $id]);
        $detail = $database->select("calculation_marka_detail", "*", ["headid" => $head['id'], "ORDER" => "raw_materialid ASC"]);
        $assumption = $database->get("calculation_marka_assumption", "*", ["id" => $head['assumptionid']]);
        $pageTitle = __("Calculation Guardrail ");
    } else if ($_GET['report'] == "ppdreal") {
        $hai = getRowById("ppd", $_GET['id']);
        $ppdreal = getTableFiltered("ppd_real", "ppdid", $hai['id'], "", "", "*", "timestamp", "ASC");
        $pageTitle = __("PPD " . add_nol($hai['id'], 5));
    }
}

//ATM


// DASHBOARD
if ($route == "dashboard") {
}


if ($route == "clients/manage") {
    $client = getRowById("clients", $_GET['id']);
    $assets = getTableFiltered("assets", "clientid", $_GET['id']);
    $licenses = getTableFiltered("licenses", "clientid", $_GET['id']);
    $credentials = getTableFiltered("credentials", "clientid", $_GET['id']);
    $issues = getTableFiltered("issues", "clientid", $_GET['id']);
    $tickets = getTableFiltered("tickets", "clientid", $_GET['id'], "", "", "*", "id", "DESC");
    $users = getTableFiltered("people", "clientid", $_GET['id']);
    $admins = getTableFiltered("people", "type", "admin");
    $maintenances = getTableFiltered("maintenances", "clientid", $_GET['id'], "", "", "*", "id", "DESC");
    $assignedadmins = getTableFiltered("clients_admins", "clientid", $_GET['id']);

    $sumAssets = countTableFiltered("assets", "clientid", $_GET['id']);
    $sumLicenses = countTableFiltered("licenses", "clientid", $_GET['id']);
    $sumCredentials = countTableFiltered("credentials", "clientid", $_GET['id']);
    $sumProjects = countTableFiltered("projects", "clientid", $_GET['id']);
    $sumUsers = countTableFiltered("people", "clientid", $_GET['id']);

    $categories = getTable("assetcategories");
    $files = getTableFiltered("files", "clientid", $_GET['id']);
    $projects = getTableFiltered("projects", "clientid", $_GET['id']);
    $pageTitle = $client['name'];
}

// SEARCH
if ($route == "search") {

    $assets = $database->select("assets", "*", ["OR" => [
        "purchase_date[~]" => $_GET['q'],
        "tag[~]" => $_GET['q'],
        "name[~]" => $_GET['q'],
        "serial[~]" => $_GET['q'],
        "notes[~]" => $_GET['q']
    ]]);
    $licenses = $database->select("licenses", "*", ["OR" => [
        "tag[~]" => $_GET['q'],
        "name[~]" => $_GET['q'],
        "serial[~]" => $_GET['q'],
        "notes[~]" => $_GET['q']
    ]]);
    $clients = $database->select("clients", "*", ["OR" => [
        "name[~]" => $_GET['q']
    ]]);
    $tickets = $database->select("tickets", "*", ["OR" => [
        "ticket[~]" => $_GET['q'],
        "subject[~]" => $_GET['q']
    ]]);
    $issues = $database->select("issues", "*", ["OR" => [
        "name[~]" => $_GET['q'],
        "description[~]" => $_GET['q']
    ]]);
    $projects = $database->select("projects", "*", ["OR" => [
        "tag[~]" => $_GET['q'],
        "name[~]" => $_GET['q'],
        "notes[~]" => $_GET['q'],
        "description[~]" => $_GET['q']
    ]]);

    if ($isAdmin) {
        $articles = $database->select("kb_articles", "*", ["OR" => [
            "name[~]" => $_GET['q']
        ]]);
    } else {
        $articles = $database->select("kb_articles", "*", ["OR" => [
            "name[~]" => $_GET['q']
        ]]);

        foreach ($articles as $key => $article) {
            if ($article['clients'] == "")
                unset($articles[$key]);
            else {
                $clients = unserialize($article['clients']);
                if (in_array(0, $clients))
                    continue;
                else if (!in_array($liu['clientid'], $clients))
                    unset($articles[$key]);
            }
        }
    }
}


// CLIENTS
if ($route == "clients") {
    $clients = getTable("clients");
    $pageTitle = __("Clients");
}

if ($route == "clients/manage") {
    $client = getRowById("clients", $_GET['id']);
    $assets = getTableFiltered("assets", "clientid", $_GET['id']);
    $licenses = getTableFiltered("licenses", "clientid", $_GET['id']);
    $credentials = getTableFiltered("credentials", "clientid", $_GET['id']);
    $issues = getTableFiltered("issues", "clientid", $_GET['id']);
    $tickets = getTableFiltered("tickets", "clientid", $_GET['id'], "", "", "*", "id", "DESC");
    $users = getTableFiltered("people", "clientid", $_GET['id']);
    $admins = getTableFiltered("people", "type", "admin");
    $maintenances = getTableFiltered("maintenances", "clientid", $_GET['id'], "", "", "*", "id", "DESC");
    $assignedadmins = getTableFiltered("clients_admins", "clientid", $_GET['id']);

    $sumAssets = countTableFiltered("assets", "clientid", $_GET['id']);
    $sumLicenses = countTableFiltered("licenses", "clientid", $_GET['id']);
    $sumCredentials = countTableFiltered("credentials", "clientid", $_GET['id']);
    $sumProjects = countTableFiltered("projects", "clientid", $_GET['id']);
    $sumUsers = countTableFiltered("people", "clientid", $_GET['id']);

    $categories = getTable("assetcategories");
    $files = getTableFiltered("files", "clientid", $_GET['id']);
    $projects = getTableFiltered("projects", "clientid", $_GET['id']);
    $pageTitle = $client['name'];
}


// STAFF
if ($route == "people/staff") {
    isAuthorized("viewStaff");
    $admins = getTableFiltered("people", "type", "admin");
    $pageTitle = __("Staff");
}
if ($route == "people/staff/edit") {
    isAuthorized("editStaff");
    $admin = getRowById("people", $_GET['id']);
    $languages = getTable("languages");
    $roles = getTableFiltered("roles", "type", "admin");
    $pageTitle = __("Edit Staff");
}


// USERS
if ($route == "people/users") {
    isAuthorized("viewUsers");
    if ($isAdmin)
        $users = getTableFiltered("people", "type", "user");
    else
        $users = getTableFiltered("people", "type", "user", "clientid", $liu['clientid']);
    $pageTitle = __("Users");
}

if ($route == "people/users/edit") {
    isAuthorized("editUser");
    $used_niks = $database->query('SELECT DISTINCT nik FROM people')->fetchAll(PDO::FETCH_COLUMN);
    $employees = $sbp_pdo->query('SELECT nik, nama_lkp FROM finance.pribadi')->fetchAll(PDO::FETCH_ASSOC);

    $employees = array_filter($employees, function ($employee) use ($used_niks) {
        return !in_array($employee['NIK'], $used_niks);
        print_r($employees); die();
    });

    $user = getRowById("people", $_GET['id']);
    $clients = getTable("clients");
    $languages = getTable("languages");
    $roles = getTableFiltered("roles", "type", "user");
    $pageTitle = __("Edit User");
}

// PROFILE
if ($route == "profile") {
    $languages = getTable("languages");
    $pageTitle = __("Profile");
}

// CONTACTS
if ($route == "people/contacts") {
    isAuthorized("viewContacts");
    $contacts = getTable("contacts");
    $pageTitle = __("Contacts");
}

// ROLES
if ($route == "people/roles") {
    isAuthorized("viewRoles");
    $roles = getTable("roles");
    $pageTitle = __("Roles");
}
if ($route == "people/roles/edit") {
    isAuthorized("editRole");
    $role = getRowById("roles", $_GET['id']);
    $roleperms = unserialize($role['perms']);
    $pageTitle = __("Edit Role");
}

// LABELS
if ($route == "inventory/attributes/labels") {
    isAuthorized("manageData");
    $labels = getTable("labels");
    $pageTitle = __("Labels");
}

// LOGS
if ($route == "system/logs") {
    isAuthorized("viewLogs");
    $systemLog = getTable("systemlog");
    $emailLog = getTable("emaillog");
    $SMSLog = getTable("smslog");
    $pageTitle = __("Logs");
}

// SYSTEM SETTINGS
# predefined replies
if ($route == "system/preplies") {
    isAuthorized("viewPReplies");
    $preplies = getTable("tickets_pr");
    $pageTitle = __("Predefined Replies");
}

if ($route == "system/settings") {
    isAuthorized("manageSettings");
    $emailtemplates = getTable("emailTemplates");
    $languages = getTable("languages");
    $sdepartments = getTable("tickets_departments");
    $rules = getTableFiltered("tickets_rules", "ticketid", "0");
    $pageTitle = __("Settings");

    $tzlist = array(
        '(UTC-11:00) Midway Island' => 'Pacific/Midway',
        '(UTC-11:00) Samoa' => 'Pacific/Samoa',
        '(UTC-10:00) Hawaii' => 'Pacific/Honolulu',
        '(UTC-09:00) Alaska' => 'US/Alaska',
        '(UTC-08:00) Pacific Time (US &amp; Canada)' => 'America/Los_Angeles',
        '(UTC-08:00) Tijuana' => 'America/Tijuana',
        '(UTC-07:00) Arizona' => 'US/Arizona',
        '(UTC-07:00) Chihuahua' => 'America/Chihuahua',
        '(UTC-07:00) La Paz' => 'America/Chihuahua',
        '(UTC-07:00) Mazatlan' => 'America/Mazatlan',
        '(UTC-07:00) Mountain Time (US &amp; Canada)' => 'US/Mountain',
        '(UTC-06:00) Central America' => 'America/Managua',
        '(UTC-06:00) Central Time (US &amp; Canada)' => 'US/Central',
        '(UTC-06:00) Guadalajara' => 'America/Mexico_City',
        '(UTC-06:00) Mexico City' => 'America/Mexico_City',
        '(UTC-06:00) Monterrey' => 'America/Monterrey',
        '(UTC-06:00) Saskatchewan' => 'Canada/Saskatchewan',
        '(UTC-05:00) Bogota' => 'America/Bogota',
        '(UTC-05:00) Eastern Time (US &amp; Canada)' => 'US/Eastern',
        '(UTC-05:00) Indiana (East)' => 'US/East-Indiana',
        '(UTC-05:00) Lima' => 'America/Lima',
        '(UTC-05:00) Quito' => 'America/Bogota',
        '(UTC-04:00) Atlantic Time (Canada)' => 'Canada/Atlantic',
        '(UTC-04:30) Caracas' => 'America/Caracas',
        '(UTC-04:00) La Paz' => 'America/La_Paz',
        '(UTC-04:00) Santiago' => 'America/Santiago',
        '(UTC-03:30) Newfoundland' => 'Canada/Newfoundland',
        '(UTC-03:00) Brasilia' => 'America/Sao_Paulo',
        '(UTC-03:00) Buenos Aires' => 'America/Argentina/Buenos_Aires',
        '(UTC-03:00) Georgetown' => 'America/Argentina/Buenos_Aires',
        '(UTC-03:00) Greenland' => 'America/Godthab',
        '(UTC-02:00) Mid-Atlantic' => 'America/Noronha',
        '(UTC-01:00) Azores' => 'Atlantic/Azores',
        '(UTC-01:00) Cape Verde Is.' => 'Atlantic/Cape_Verde',
        '(UTC+00:00) Casablanca' => 'Africa/Casablanca',
        '(UTC+00:00) Edinburgh' => 'Europe/London',
        '(UTC+00:00) Greenwich Mean Time : Dublin' => 'Etc/Greenwich',
        '(UTC+00:00) Lisbon' => 'Europe/Lisbon',
        '(UTC+00:00) London' => 'Europe/London',
        '(UTC+00:00) Monrovia' => 'Africa/Monrovia',
        '(UTC+00:00) UTC' => 'UTC',
        '(UTC+01:00) Amsterdam' => 'Europe/Amsterdam',
        '(UTC+01:00) Belgrade' => 'Europe/Belgrade',
        '(UTC+01:00) Berlin' => 'Europe/Berlin',
        '(UTC+01:00) Bern' => 'Europe/Berlin',
        '(UTC+01:00) Bratislava' => 'Europe/Bratislava',
        '(UTC+01:00) Brussels' => 'Europe/Brussels',
        '(UTC+01:00) Budapest' => 'Europe/Budapest',
        '(UTC+01:00) Copenhagen' => 'Europe/Copenhagen',
        '(UTC+01:00) Ljubljana' => 'Europe/Ljubljana',
        '(UTC+01:00) Madrid' => 'Europe/Madrid',
        '(UTC+01:00) Paris' => 'Europe/Paris',
        '(UTC+01:00) Prague' => 'Europe/Prague',
        '(UTC+01:00) Rome' => 'Europe/Rome',
        '(UTC+01:00) Sarajevo' => 'Europe/Sarajevo',
        '(UTC+01:00) Skopje' => 'Europe/Skopje',
        '(UTC+01:00) Stockholm' => 'Europe/Stockholm',
        '(UTC+01:00) Vienna' => 'Europe/Vienna',
        '(UTC+01:00) Warsaw' => 'Europe/Warsaw',
        '(UTC+01:00) West Central Africa' => 'Africa/Lagos',
        '(UTC+01:00) Zagreb' => 'Europe/Zagreb',
        '(UTC+02:00) Athens' => 'Europe/Athens',
        '(UTC+02:00) Bucharest' => 'Europe/Bucharest',
        '(UTC+02:00) Cairo' => 'Africa/Cairo',
        '(UTC+02:00) Harare' => 'Africa/Harare',
        '(UTC+02:00) Helsinki' => 'Europe/Helsinki',
        '(UTC+02:00) Istanbul' => 'Europe/Istanbul',
        '(UTC+02:00) Jerusalem' => 'Asia/Jerusalem',
        '(UTC+02:00) Kyiv' => 'Europe/Helsinki',
        '(UTC+02:00) Pretoria' => 'Africa/Johannesburg',
        '(UTC+02:00) Riga' => 'Europe/Riga',
        '(UTC+02:00) Sofia' => 'Europe/Sofia',
        '(UTC+02:00) Tallinn' => 'Europe/Tallinn',
        '(UTC+02:00) Vilnius' => 'Europe/Vilnius',
        '(UTC+03:00) Baghdad' => 'Asia/Baghdad',
        '(UTC+03:00) Kuwait' => 'Asia/Kuwait',
        '(UTC+03:00) Minsk' => 'Europe/Minsk',
        '(UTC+03:00) Nairobi' => 'Africa/Nairobi',
        '(UTC+03:00) Riyadh' => 'Asia/Riyadh',
        '(UTC+03:00) Volgograd' => 'Europe/Volgograd',
        '(UTC+03:30) Tehran' => 'Asia/Tehran',
        '(UTC+04:00) Abu Dhabi' => 'Asia/Muscat',
        '(UTC+04:00) Baku' => 'Asia/Baku',
        '(UTC+04:00) Moscow' => 'Europe/Moscow',
        '(UTC+04:00) Muscat' => 'Asia/Muscat',
        '(UTC+04:00) St. Petersburg' => 'Europe/Moscow',
        '(UTC+04:00) Tbilisi' => 'Asia/Tbilisi',
        '(UTC+04:00) Yerevan' => 'Asia/Yerevan',
        '(UTC+04:30) Kabul' => 'Asia/Kabul',
        '(UTC+05:00) Islamabad' => 'Asia/Karachi',
        '(UTC+05:00) Karachi' => 'Asia/Karachi',
        '(UTC+05:00) Tashkent' => 'Asia/Tashkent',
        '(UTC+05:30) Chennai' => 'Asia/Calcutta',
        '(UTC+05:30) Kolkata' => 'Asia/Kolkata',
        '(UTC+05:30) Mumbai' => 'Asia/Calcutta',
        '(UTC+05:30) New Delhi' => 'Asia/Calcutta',
        '(UTC+05:30) Sri Jayawardenepura' => 'Asia/Calcutta',
        '(UTC+05:45) Kathmandu' => 'Asia/Katmandu',
        '(UTC+06:00) Almaty' => 'Asia/Almaty',
        '(UTC+06:00) Astana' => 'Asia/Dhaka',
        '(UTC+06:00) Dhaka' => 'Asia/Dhaka',
        '(UTC+06:00) Ekaterinburg' => 'Asia/Yekaterinburg',
        '(UTC+06:30) Rangoon' => 'Asia/Rangoon',
        '(UTC+07:00) Bangkok' => 'Asia/Bangkok',
        '(UTC+07:00) Hanoi' => 'Asia/Bangkok',
        '(UTC+07:00) Jakarta' => 'Asia/Jakarta',
        '(UTC+07:00) Novosibirsk' => 'Asia/Novosibirsk',
        '(UTC+08:00) Beijing' => 'Asia/Hong_Kong',
        '(UTC+08:00) Chongqing' => 'Asia/Chongqing',
        '(UTC+08:00) Hong Kong' => 'Asia/Hong_Kong',
        '(UTC+08:00) Krasnoyarsk' => 'Asia/Krasnoyarsk',
        '(UTC+08:00) Kuala Lumpur' => 'Asia/Kuala_Lumpur',
        '(UTC+08:00) Perth' => 'Australia/Perth',
        '(UTC+08:00) Singapore' => 'Asia/Singapore',
        '(UTC+08:00) Taipei' => 'Asia/Taipei',
        '(UTC+08:00) Ulaan Bataar' => 'Asia/Ulan_Bator',
        '(UTC+08:00) Urumqi' => 'Asia/Urumqi',
        '(UTC+09:00) Irkutsk' => 'Asia/Irkutsk',
        '(UTC+09:00) Osaka' => 'Asia/Tokyo',
        '(UTC+09:00) Sapporo' => 'Asia/Tokyo',
        '(UTC+09:00) Seoul' => 'Asia/Seoul',
        '(UTC+09:00) Tokyo' => 'Asia/Tokyo',
        '(UTC+09:30) Adelaide' => 'Australia/Adelaide',
        '(UTC+09:30) Darwin' => 'Australia/Darwin',
        '(UTC+10:00) Brisbane' => 'Australia/Brisbane',
        '(UTC+10:00) Canberra' => 'Australia/Canberra',
        '(UTC+10:00) Guam' => 'Pacific/Guam',
        '(UTC+10:00) Hobart' => 'Australia/Hobart',
        '(UTC+10:00) Melbourne' => 'Australia/Melbourne',
        '(UTC+10:00) Port Moresby' => 'Pacific/Port_Moresby',
        '(UTC+10:00) Sydney' => 'Australia/Sydney',
        '(UTC+10:00) Yakutsk' => 'Asia/Yakutsk',
        '(UTC+11:00) Vladivostok' => 'Asia/Vladivostok',
        '(UTC+12:00) Auckland' => 'Pacific/Auckland',
        '(UTC+12:00) Fiji' => 'Pacific/Fiji',
        '(UTC+12:00) International Date Line West' => 'Pacific/Kwajalein',
        '(UTC+12:00) Kamchatka' => 'Asia/Kamchatka',
        '(UTC+12:00) Magadan' => 'Asia/Magadan',
        '(UTC+12:00) Marshall Is.' => 'Pacific/Fiji',
        '(UTC+12:00) New Caledonia' => 'Asia/Magadan',
        '(UTC+12:00) Solomon Is.' => 'Asia/Magadan',
        '(UTC+12:00) Wellington' => 'Pacific/Auckland',
        '(UTC+13:00) Nuku\'alofa' => 'Pacific/Tongatapu'
    );
}
