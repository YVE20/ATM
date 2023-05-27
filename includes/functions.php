<?php

// ----------------------------------------------------------------------------------------------

//UMUR
// GENERAL FUNCTIONS




function file_upload_max_size()
{
    static $max_size = -1;

    if ($max_size < 0) {
        // Start with post_max_size.
        $post_max_size = parse_size(ini_get('post_max_size'));
        if ($post_max_size > 0) {
            $max_size = $post_max_size;
        }

        // If upload_max_size is less, then reduce. Except if upload_max_size is
        // zero, which indicates no limit.
        $upload_max = parse_size(ini_get('upload_max_filesize'));
        if ($upload_max > 0 && $upload_max < $max_size) {
            $max_size = $upload_max;
        }
    }
    return $max_size;
}

function parse_size($size)
{
    $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
    $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
    if ($unit) {
        // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
        return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
    } else {
        return round($size);
    }
}

function getRomawi($bln)
{
    switch ($bln) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
}

function get_url()
{
    // $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    // $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/") . $s;
    // $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":" . $_SERVER["SERVER_PORT"]);
    // return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
}
function get_uri(){
    return $_SERVER['REQUEST_URI'];
}

function strleft($s1, $s2)
{
    return substr($s1, 0, strpos($s1, $s2));
}

function add_nol($number, $add_nol)
{
    while (strlen($number) < $add_nol) {
        $number = "0" . $number;
    }
    return $number;
}

function cubication($length, $width, $high, $plus)
{
    $temp = $length * $width * ($high + $plus) / 1000000;
    $result = substr($temp, 0, strpos($temp, ".") + 3);
    return $result;
}

function cubicationgeo($length, $width, $high, $plus)
{
    $temp = $length * $width * ($high + $plus) / 1000000;
    //$result = round($temp, 2);
    $result = substr($temp, 0, strpos($temp, ".") + 3);
    return $result;
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    // variabel pecahkan 0 = tanggal// variabel pecahkan 1 = bulan// variabel pecahkan 2 = tahun 
    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

function warehouseCount($warehouseid, $columncount)
{
    global $database;
    $today = date('Y-m-d');
    $date = getSingleValue("warehouses", "date_count", $warehouseid);
    $value = getSingleValue("warehouses", $columncount, $warehouseid);
    if ($date != $today) {
        $value = 0;
        $database->update("warehouses", [
            "date_count" => $today,
            $columncount => 1
        ], ["id" => $warehouseid]);
    } else {
        $database->update("warehouses", [
            $columncount => $value + 1
        ], ["id" => $warehouseid]);
    }
    return getSingleValue("warehouses", $columncount, $warehouseid);
}

function randomString($chars = 10)
{ //generate random string
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $chars; $i++) {
        $randstring .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randstring;
}

function currentFileName()
{ //return current file name
    return basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
}

function baseURL($sub = 0)
{ //return base url for cron jobs
    $requesturi = explode("?", $_SERVER["REQUEST_URI"]);
    $subdir = $requesturi[0];
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"])) {
        if ($_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $subdir;
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $subdir;
    }
    return $pageURL;
}

function getGravatar($email, $size)
{ //get gravatar image for the given email address
    global $database;

    /* 	$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=mm" . "&s=" . $size; */
    $grav_url = "https://www.puragroup.com/datas/mega_menu.png";
    $avatar = $database->get("people", "avatar", ["email" => strtolower($email)]);

    if ($avatar != "") {
        return "data:image/jpeg;base64," . base64_encode($avatar);
    } else
        return $grav_url;
}

function curlReturn($url)
{ //get url with curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function rand_color()
{ //generate random color
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

function ttruncat($text, $numb = 30)
{ //truncate text
    if (strlen($text) > $numb) {
        $text = substr($text, 0, $numb);
        $text = substr($text, 0, strrpos($text, " "));
        $etc = " ...";
        $text = $text . $etc;
    }
    return $text;
}

function keyBy(array $array, $key)
{
    $new_arr = [];
    foreach ($array as $elem) {
        $new_arr[$elem[$key]] = $elem;
    }
    return $new_arr;
}

function smartDate($timestamp)
{
    $diff = time() - $timestamp;

    if ($diff <= 0) {
        return __('Now');
    } else if ($diff < 60) {
        return _x("%d second ago", "%d seconds ago", floor($diff));
    } else if ($diff < 60 * 60) {
        return _x("%d minute ago", "%d minutes ago", floor($diff / 60));
    } else if ($diff < 60 * 60 * 24) {
        return _x("%d hour ago", "%d hours ago", floor($diff / (60 * 60)));
    } else if ($diff < 60 * 60 * 24 * 30) {
        return _x("%d day ago", "%d days ago", floor($diff / (60 * 60 * 24)));
    } else if ($diff < 60 * 60 * 24 * 30 * 12) {
        return _x("%d month ago", "%d months ago", floor($diff / (60 * 60 * 24 * 30)));
    } else {
        return _x("%d year ago", "%d years ago", floor($diff / (60 * 60 * 24 * 30 * 12)));
    }
}

function formatDateInterval(DateTime $startDate, DateTime $endDate)
{
    // kalau tanggalnya sama
    if ($startDate->format('Y-m-d') === $endDate->format('Y-m-d')) {
        return $startDate->format('d M Y');
    }

    // kalau bulan & tahun sama
    if ($startDate->format('Y-m') === $endDate->format('Y-m')) {
        return "{$startDate->format('d')} - {$endDate->format('d M Y')}";
    }

    // kalau tahun sama
    if ($startDate->format('Y') === $endDate->format('Y')) {
        return "{$startDate->format('d M')} - {$endDate->format('d M Y')}";
    }

    // kalau beda tahun
    return "{$startDate->format('d M Y')} - {$endDate->format('d M Y')}";
}

function formatDateIntervalMonth($startDate, $endDate)
{
    // kalau bulan & tahun sama
    if ($startDate->format('Y-m') === $endDate->format('Y-m')) {
        return "{$startDate->format('F Y')}";
    }

    // kalau tahun sama
    if ($startDate->format('Y') === $endDate->format('Y')) {
        return "{$startDate->format('F')} - {$endDate->format('F Y')}";
    }

    // kalau beda tahun
    return "{$startDate->format('F Y')} - {$endDate->format('F Y')}";
}

function dateDiff($date1, $date2)
{
    $diff = abs(strtotime($date1) - strtotime($date2)) / 86400;
    return round($diff);
}

function escapeJavaScriptText($string)
{
    return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string) $string), "\0..\37'\\")));
}

// ----------------------------------------------------------------------------------------------
// GENERAL DATABASE FUNCTIONS

function getRowById($table, $id)
{ //return associative array from one row by id
    global $database;
    $row = $database->get($table, "*", ["id" => $id]);
    return $row;
}

function getSingleValue($table, $column, $id)
{ //returns single value from table row by id
    global $database;
    $value = $database->get($table, $column, ["id" => $id]);
    return $value;
}

function getTable($table, $columns = "*", $sortby = "id", $sortway = "ASC")
{ //get entire table
    global $database;
    $table = $database->select($table, $columns, ["ORDER" => $sortby . " " . $sortway]);
    return $table;
}

function getTableFiltered($table, $filterColumn1, $filterValue1, $filterColumn2 = "", $filterValue2 = "", $columns = "*", $sortby = "id", $sortway = "ASC")
{ //get entire table filtered
    global $database;
    if ($filterColumn2 == "") {
        $table = $database->select($table, $columns, [$filterColumn1 => $filterValue1, "ORDER" => $sortby . " " . $sortway]);
    } else {
        $table = $database->select($table, $columns, ["AND" => [$filterColumn1 => $filterValue1, $filterColumn2 => $filterValue2], "ORDER" => $sortby . " " . $sortway]);
    }
    return $table;
}

function countTable($table)
{ //count table rows
    global $database;
    $count = $database->count($table);
    return $count;
}

function countTableFiltered($table, $filterColumn1, $filterValue1, $filterColumn2 = "", $filterValue2 = "")
{
    //count table rows with filter
    global $database;
    if ($filterColumn2 == "") {
        $count = $database->count($table, [$filterColumn1 => $filterValue1]);
    } else {
        $count = $database->count($table, ["AND" => [$filterColumn1 => $filterValue1, $filterColumn2 => $filterValue2]]);
    }
    return $count;
}

function getConfigValue($name)
{ //return config value from database
    global $database;
    return $database->get("config", "value", ["name" => $name]);
}

function deleteRowById($table, $id)
{ //detete row(s) by id
    global $database;
    $database->delete($table, ["id" => $id]);
    return "delOK";
}

// ----------------------------------------------------------------------------------------------
// NAVIGATION

function reroute($data, $status = 0)
{
    $location = "Location:?route=" . $data['route'];
    if (isset($data['routeid']))
        $location .= "&id=" . $data['routeid'];
    if (isset($data['section']))
        $location .= "&section=" . $data['section'];
    if (isset($data['ver']))
        $location .= "&ver=" . $data['ver'];
    if (isset($data['ppo']))
        $location .= "&ppo=" . $data['ppo'];
    setStatus($status);
    header($location);
}

function setStatus($status)
{
    if ($status != 0 && $status != "")
        $_SESSION["statuscode"] = $status;
}

function clearStatus()
{
    $_SESSION["statuscode"] = "";
}

// ----------------------------------------------------------------------------------------------
// CLASS LOADERS

function vendorClassAutoload($classname)
{
    global $scriptpath;
    $file = $scriptpath . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'class.' . strtolower($classname) . '.php';
    if (file_exists($file))
        require($file);
}

function appClassAutoload($classname)
{
    global $scriptpath;
    $file = $scriptpath . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'class.' . strtolower($classname) . '.php';
    if (file_exists($file))
        require($file);
}

// ----------------------------------------------------------------------------------------------
// TEXT OUTPUT

function __($text)
{
    global $t;
    if (isset($t))
        return $t->translate($text);
    else
        return $text;
}

function _e($text)
{
    echo __($text);
}

function _x($sg, $pl, $count)
{
    global $t;
    if (isset($t))
        return sprintf($t->ngettext($sg, $pl, intval($count)), $count);
    else {
        if ($count == "1")
            return sprintf($sg, $count);
        elseif ($count > 1)
            return sprintf($pl, $count);
    }
}

// ----------------------------------------------------------------------------------------------
// AUTHENTICATION FUNCTIONS

function signIn($email, $password)
{ //login and set session
    global $database;
    $email = strtolower($email);
    $people = $database->count("people", ["AND" => ["email" => $email, "password" => sha1($password)]]);

    if ($people == "1") {
        $sessionid = session_id();
        $_SESSION['email'] = $email;
        $database->update("people", ["sessionid" => $sessionid], ["email" => $email]);
        $people = $database->get("people", "*", ["email" => $email]);
        logSystem("User/Admin Logged In - ID: " . $people['id']);
        header("Location:?route=dashboard");
        exit;
    } else {
        logSystem("User/Admin Login Failure - EMAIL: " . $email);
        setStatus(1200);
        header("Location:?route=signin");
        exit;
    }
}


function VendorSignup($email, $name, $mobile, $password, $key, $perms)
{ //set Vendor Account Signup
    global $database;
    $email = strtolower($email);
    $mobile = $mobile;
    $count = $database->count("people",["email" => $email]);
    if ($count == "1") { return "11"; }
    $password = sha1($password);
    $idpeople = $database->insert("people", [
            "type" => "user",
            "roleid" => "2",
            "clientid" => "0",
            "name" => $name,
            "email" => $email,
            "mobile" => $mobile,
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
        $name = $name;
        $email = strtolower($email);
        $mobile = $mobile;
        $vendorid = $database->insert("vendor", [
            "key" => "-",
            "id_people" => $idpeople,
            "name" => $name,
            "email" => $email,
            "mobile" => $mobile
        ]);
        $perms = serialize($perms);
        $lastid = $database->insert("vendorservices", [
            "id_vendor" => $vendorid,
            "perms" => 'a:1:{i:0;s:4:"Null";}'
        ]);
        $database->update("vendorgeneratekey", [            
            "status" => 1
        ], [ "key" => $key ]);

        if ($lastid == "0" || $idpeople == "0" || $vendorid == "0") {
            header("Location:?route=signin");
            exit;
        } else {
            logSystem("Vendor Account Added - Name: " . $data['name']);
            header("Location:?route=signin");
            exit;
        }
        
}

function resetConfirmation($email)
{ //set password resetkey and send confirmation email for password reset
    global $database;
    $email = strtolower($email);
    $count = $database->count("people", ["email" => $email]);

    if ($count == "1") {
        $people = $database->get("people", "*", ["email" => $email]);
        $resetkey = randomString(32);
        $database->update("people", ["resetkey" => $resetkey], ["email" => $email]);
        $resetlink = baseURL(-14) . "/?route=forgot&resetkey=" . $resetkey;
        Notification::passwordReset($people['id'], $resetlink);
        setStatus(1300);
        header("Location:?route=forgot");
        exit;
    } else {
        setStatus(1400);
        header("Location:?route=forgot");
        exit;
    }
}

function resetPassword($resetkey, $password)
{ //reset password
    global $database;
    $count = $database->count("people", ["resetkey" => $resetkey]);

    if ($count == "1") {
        $people = $database->get("people", "*", ["resetkey" => $resetkey]);
        $database->update("people", ["password" => sha1($password), "resetkey" => ""], ["resetkey" => $resetkey]);
        logSystem("User/Admin Password Reset - ID: " . $people['id']);
        setStatus(1600);
        header("Location:?route=login");
        exit;
    } else {
        setStatus(1500);
        header("Location:?route=forgot");
        exit;
    }
}

function signOut($id)
{ //unset user/admin session
    global $database;
    $database->update("people", ["sessionid" => ""], ["id" => $id]);
    logSystem("User/Staff Logged Out - ID: " . $id);
    header("Location:?route=signin");
    exit;
}

function isSignedIn()
{ //check if someone is logged in, if not redirect to login page
    global $database;
    //session_start();
    $sessionid = session_id();
    $people = $database->count("people", ["sessionid" => $sessionid]);
    if ($people != 1) {
        header("Location:?route=signin");
        exit;
    }
}

function isAuthorized($action)
{
    global $perms;

    if (!in_array($action, $perms)) {
        setStatus("1");
        header("Location:?route=dashboard");
        exit;
    }
}

// ----------------------------------------------------------------------------------------------
// APP LOGGING FUNCTIONS

function logSystem($description)
{ //add to system log
    global $liu;
    if (isset($liu['id']))
        $peopleid = $liu['id'];
    else
        $peopleid = -1;
    global $database;
    $database->insert("systemlog", [
        "peopleid" => $peopleid,
        "ipaddress" => $_SERVER['REMOTE_ADDR'],
        "description" => $description,
        "timestamp" => date('Y-m-d H:i:s')
    ]);
}

function logEmail($clientid, $peopleid, $to, $subject, $message)
{ //add to email log
    global $database;
    $database->insert("emaillog", [
        "peopleid" => $peopleid,
        "clientid" => $clientid,
        "to" => $to,
        "subject" => $subject,
        "message" => $message,
        "timestamp" => date('Y-m-d H:i:s')
    ]);
}

function logSMS($clientid, $peopleid, $mobile, $sms)
{ //add to sms log
    global $database;
    $database->insert("smslog", [
        "peopleid" => $peopleid,
        "clientid" => $clientid,
        "mobile" => $mobile,
        "sms" => $sms,
        "timestamp" => date('Y-m-d H:i:s')
    ]);
}

// ----------------------------------------------------------------------------------------------
// COMMUNICATIONS FUNCTIONS

function sendEmail($to, $subject, $message, $clientid = "0", $peopleid = "0", $ccs = array())
{ //send email
    $mail = new PHPMailer;
    $mail->CharSet = "UTF-8";
    if (getConfigValue("email_smtp_enable") == "true") {
        $mail->isSMTP();
        $mail->Host = getConfigValue("email_smtp_host");
        $mail->SMTPAuth = getConfigValue("email_smtp_auth");
        $mail->Username = getConfigValue("email_smtp_username");
        $mail->Password = getConfigValue("email_smtp_password");
        $mail->SMTPSecure = getConfigValue("email_smtp_security");
        $mail->Port = getConfigValue("email_smtp_port");

        if (getConfigValue("email_smtp_domain") != "") {
            $mail->AuthType = 'NTLM';
            $mail->Realm = getConfigValue("email_smtp_domain");
        }

        //$mail->SMTPDebug = 2;
    }

    $mail->From = getConfigValue("email_from_address");
    $mail->FromName = getConfigValue("email_from_name");
    $mail->addAddress($to);
    foreach ($ccs as $cc) {
        $mail->AddCC($cc);
    }
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->IsHTML(true);

    if (!$mail->send()) {
        logEmail($clientid, $peopleid, $to, $subject, $mail->ErrorInfo);
        return 0; //error
    } else {
        logEmail($clientid, $peopleid, $to, $subject, $message);
        return 1; //success
    }
}

function sendSMS($mobile, $sms, $clientid = "0", $peopleid = "0")
{ //send sms
    $provider = getConfigValue("sms_provider");
    $user = getConfigValue("sms_user");
    $password = getConfigValue("sms_password");
    $api_id = getConfigValue("sms_api_id");
    $from = getConfigValue("sms_from");

    if ($provider == "smsglobal") {
        $url = 'http://www.smsglobal.com/http-api.php' . '?action=sendsms' . '&user=' . $user . '&password=' . $password . '&from=' . $from . '&to=' . $mobile . '&text=' . substr(rawurlencode($sms), 0, 153);
        $returnedData = file_get_contents($url);
    }
    if ($provider == "clickatell") {
        $url = 'http://api.clickatell.com/http/sendmsg?user=' . $user . '&password=' . $password . '&api_id=' . $api_id . '&to=' . $mobile . '&text=' . $sms;
        $returnedData = file_get_contents($url);
    }

    logSMS($clientid, $peopleid, $mobile, $sms);
}

// ----------------------------------------------------------------------------------------------
// DATA ENCRYPTION FUNCTIONS
// Encrypt Function
function mc_encrypt($encrypt)
{
    global $config;
    $key = $config['encryption_key'];
    $encrypt = serialize($encrypt);
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
    $key = pack('H*', $key);
    $mac = hash_hmac('sha256', $encrypt, substr(bin2hex($key), -32));
    $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $encrypt . $mac, MCRYPT_MODE_CBC, $iv);
    $encoded = base64_encode($passcrypt) . '|' . base64_encode($iv);
    return $encoded;
}

// Decrypt Function
function mc_decrypt($decrypt)
{
    global $config;
    $key = $config['encryption_key'];
    $decrypt = explode('|', $decrypt . '|');
    $decoded = base64_decode($decrypt[0]);
    $iv = base64_decode($decrypt[1]);
    if (strlen($iv) !== mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)) {
        return false;
    }
    $key = pack('H*', $key);
    $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_CBC, $iv));
    $mac = substr($decrypted, -64);
    $decrypted = substr($decrypted, 0, -64);
    $calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($key), -32));
    if ($calcmac !== $mac) {
        return false;
    }
    $decrypted = unserialize($decrypted);
    return $decrypted;
}

// ----------------------------------------------------------------------------------------------
// GRAPHS

function workHoursByMonth($month, $clientid = 0)
{ //calculate how many hours were worked in a month
    global $database;
    $minutes = 0;
    $startDate = $month . "-01 00:00:00";
    $endDate = $month . "-31 00:00:00";;

    if ($clientid == 0) {
        $items = $database->select("issues", "*", [
            "dateadded[<>]" => [$startDate, $endDate]
        ]);
    } else {
        $items = $database->select("issues", "*", ["AND" => [
            "dateadded[<>]" => [$startDate, $endDate],
            "clientid" => $clientid
        ]]);
    }

    foreach ($items as $item) {
        $minutes = $minutes + $item['timespent'];
    }

    //$hours = round($minutes/60,2);

    $hours = floor($minutes / 60);
    $minutes = ($minutes % 60);
    //return sprintf("%02d:%02d", $hours, $minutes);

    return $hours . "." . $minutes;
}

function countHeavyVehicleByType($type, $vs = 0)
{
    global $database;
    $items = 0;
    $items = $database->count("heavyequipment", "*", [
        "typevid" => $type
    ]);

    return $items;
}

function countVehicleByType($type, $vs = 0)
{
    global $database;
    $items = 0;
    if ($vs == 0) {
        $items = $database->count("vehicles", "*", [
            "typevid" => $type
        ]);
    } else {
        $items = $database->count("vehicles", "*", ["AND" => [
            "typevid" => $type,
            "vsuppid" => $vs
        ]]);
    }

    return $items;
}
