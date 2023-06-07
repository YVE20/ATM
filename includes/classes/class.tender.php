<?php

class Tender extends App {

    public static function addTender($data) {
    global $database;

    $nama = $data['id_pengadaan'];
    $arr = explode(' ', $nama);
    $singkatan ='';
    foreach($arr as $kata){
    $singkatan .= substr($kata, 0, 1);
    }
    $codemut = $database->count("tender", [
      "AND" => ["tgl_tender" => $data['tgl_tender'] ,"tgl_kebutuhan" => $data['tgl_kebutuhan'] ]
    ]);
    $next = $codemut + 1;
    $num = add_nol($next , 4);
    $thn = date_create($data['date']);

    $dataDepartment = $database->query("SELECT *FROM department WHERE id = ".$data['id_department']."")->fetchAll();
    $splitWords = explode(" ",$dataDepartment[0]['name']);
    $firstChar = "";
    foreach($splitWords as $word){
      $firstChar .= strtoupper(substr($word,0,1));
    }

    $dataPengadaan = $database->query("SELECT *FROM pengadaan WHERE id = ".$data['id_pengadaan']."")->fetchAll();
    $thirdChar = strtoupper(substr($dataPengadaan[0]['name'],0,3));

    $code = "TEN/".$firstChar."/".$thirdChar."/".date_format($thn, "Y").add_nol($next , 4);

    $fileName = $_FILES["imageFile"]["name"];
    $tempName = $_FILES["imageFile"]["tmp_name"];
    $folder = "./upload/img/tenderImage/" . $fileName;
    
    $idtender = $database->insert("tender", [
            "id_pengadaan" => $data['id_pengadaan'],
            "id_department" => $data['id_department'],
						"kategori" => serialize($data['kategori']),
            "name" => strtoupper($data['name']),
						"kode" => $code,
            "tgl_tender" => $data['tgl_tender'],
            "tgl_kebutuhan" => $data['tgl_kebutuhan'],
            "deadline_offer" => $data['deadline_offer'],
						"alamat_gudang" => $data['alamat_gudang'],
						"alamat_kirim" => $data['alamat_kirim'],
						"keterangan" => $data['keterangan'],
            "status" => "Open",
            "timestamp" => date('Y-m-d H:i:s'),
            "gambar" => $fileName
        ]);

        if (move_uploaded_file($tempName, $folder))
        
        // echo $idtender; die();
        logSystem("Tender Added - Name: " . $data['name']);
        // for ($i = 0; $i <= count($data['nameitems']) - 1; $i++) {
          $lastid = $database->insert("tenderitems", [
              "id_tender" => $idtender,
              "id_sizecat" => $data['id_sizecat'],
              "nameitems" => strtoupper($data['nameitems']),
              "qty" => abs($data['qty']),
              "info" => $data['info']
          ]);
        //}
        $lastidtender = $database->insert("tenderstatus", [
          "id_tender" => $idtender,
          "status" => "Open",
          "pesan" => " ",
          "timestamp" => date('Y-m-d H:i:s')
      ]);
        if ($idtender == "0" || $lastid == "0" || $lastidtender == "0") { return "11"; } 
        else {  return "10"; } 
        
    }

    public static function editTender($data) {
    global $database;

    $nama = $data['id_pengadaan'];
    $arr = explode(' ', $nama);
    $singkatan ='';
    foreach($arr as $kata){
    $singkatan .= substr($kata, 0, 1);
    }
    $codemut = $database->count("tender", [
      "AND" => ["tgl_tender" => $data['tgl_tender'] ,"tgl_kebutuhan" => $data['tgl_kebutuhan']]
    ]);
    $next = $codemut;
    $thn = date_create($data['date']);
    $code = "TEN". strtoupper(substr(str_replace(' ', '', $data['id_department']), 0, 2))."/".strtoupper($singkatan)."/".date_format($thn, "Y").add_nol($next,4);
      $database->update("tender", [            
          "id_pengadaan" => $data['id_pengadaan'],
          "id_department" => $data['id_department'],
          "kategori" => $data['kategori'],
          "name" => $data['name'],
          "kode" => $code,
          "tgl_tender" => $data['tgl_tender'],
          "tgl_kebutuhan" => $data['tgl_kebutuhan'],
          "alamat_gudang" => $data['alamat_gudang'],
          "alamat_kirim" => $data['alamat_kirim'],
          "keterangan" => $data['keterangan'],
                
        "status" =>  $data['status'],
          "updated" => date('Y-m-d H:i:s')
        ], [ "id" => $data['id'] ]);
        logSystem("Tender Edited - ID: " . $data['id']);
        return "20";
    }

    public static function editStatusTender($data) {
      global $database;
      
      //Update Tender
      $database->update("tender",[
        "status" => $data['status']
      ],[
        "id"=>$data['id_tender'
        ]
      ]);

      //Insert Tender Status
      $database->insert("tenderstatus", [
         "id_tender" =>  $data['id_tender'],
         "status" =>  $data['status'],
         "pesan" => "-",
         "timestamp" => date('Y-m-d H:i:s')
      ]);
      
      logSystem("Tender Edited - ID: " . $data['id']);

        if ($lastidtender == "0") { return "11"; } 
        else {  return "10"; } 
      }

    public static function deleteTender($data) {
    global $database;
        $database->delete("tender", [ "id" => $data['id']]);
        logSystem("Tender Deleted - Name: " . $data['name']);
        return "30";
    }

    public static function addItemTender($data)
    {
        global $database;
        for ($i = 0; $i <= count($data['nameitems']) - 1; $i++) {
          $lastid = $database->insert("tenderitems", [
              "id_tender" => $data['id_tender'],
              "id_sizecat" => $data['id_sizecat'][$i],
              "nameitems" => strtoupper($data['nameitems'][$i]),
              "qty" => abs($data['qty'][$i]),
              "info" => $data['info'][$i]
              
          ]);
        }
        logSystem("Item Tender Added - ID :" . $data['id']);
        return "10";
    }
    public static function editItemTender($data)
    {
        global $database;
        $database->update("tenderitems", [
          "id_sizecat" => $data['id_sizecat'],
          "nameitems" => strtoupper($data['nameitems']),
          "qty" => abs($data['qty']),
          "info" => $data['info']
        ], ["id" => $data['id']]);

        logSystem("Item Tender Edited - ID :" . $data['id']);
        return "20";
    }
    public static function deleteItemsTender($data)
    {
        global $database;
        $database->delete("tenderitems", ["id" => $data['id']]);
        print_r($data['id']); die();
        logSystem("Item Tender Deleted");
        return "30";
    }


    public static function addVendorTender($data)
    {
        global $database;
        
      
        //Jagaan jika table vendor sudah ada ID tender dan ID Vendor serupa
        $vendorByTenderIDandVendorID = $database->query("SELECT *FROM tendervendor WHERE id_tender=".$data['id_tender']." AND id_vendor=".$data['id_vendor']." ")->fetchAll();

        if(!count($vendorByTenderIDandVendorID)){
            $lastid = $database->insert("tendervendor", [
              "id_tender" => $data['id_tender'],
              "id_vendor" => $data['id_vendor'],
              "email" => $data['email'],
              "contact" => $data['contact'],
              "kode" => $data['kode'],
              "name" => $data['name']
          ]);
        }
        
        // $database->update("tender", [
        //   "id_vendor" => $data['id_vendor']
        // ], 
        //   [ 
        //   "id" => $data['id'] 
        // ]);

    if ($lastid == "0") { return "11"; } else { logSystem("Vendor Added - ID: " . $lastid); return "10"; 
      }
    
    }

    public static function deleteVendorTender($data)
    {
        global $database;
        $database->delete("tendervendor", ["id" => $data['id']]);
        // print_r($data['id']); die();
        logSystem("Vendor Tender Deleted");
        return "30";
    }

    public static function sendWa($data)
    {
      //print_r($data); die();
      // Send Message 
      $tujuan=$_POST['tujuan'];
      $pesan=$_POST['pesan'];
//Rapiwha
      // $my_apikey = "ZZXH6TQXC70KK6AHAPLX"; 
      // $destination = $tujuan;
      // $message = $pesan;
      // $api_url = "http://panel.apiwha.com/send_message.php"; 
      // $api_url .= "?apikey=". urlencode ($my_apikey); 
      // $api_url .= "&number=". urlencode ($destination); 
      // $api_url .= "&text=". urlencode ($message); 
      // $my_result_object = json_decode(file_get_contents($api_url, false)); 
      // echo "<br>Result: ". $my_result_object->success; 
      // echo "<br>Description: ". $my_result_object->description;
      // echo "<br>Code: ". $my_result_object->result_code; 

//Wablas
$curl = curl_init();
$token = "fB81g5NsOm2QGDgS6FJfelZvs0E8H4gWoxltWrzA5t9YG3j1yeNyI9LTYIXc0QLw";
$data = [
'phone' => $tujuan,
'message' => $pesan,
];
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        "Authorization: $token",
    )
);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_URL,  "https://jogja.wablas.com/api/send-message");
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($curl);
curl_close($curl);

//UltraMSG

// $curl = curl_init();
// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://api.ultramsg.com/instance23600/messages/chat",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_SSL_VERIFYHOST => 0,
//   CURLOPT_SSL_VERIFYPEER => 0,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => "token=2voyj9hhgy2075e4&to=$tujuan&body=$pesan&priority=1&referenceId=",
//   CURLOPT_HTTPHEADER => array(
//     "content-type: application/x-www-form-urlencoded"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo $response;
// }

    }

    public static function sendWa1($data)
    {
      //print_r($data); die();
      // Send Message 
      $tujuan=explode(',',$_POST['tujuan']);
      $pesan=$_POST['pesan'];

      $my_apikey = "ZZXH6TQXC70KK6AHAPLX"; 
  foreach ($tujuan as $address) {
      $destination = $address; 
    }
      $message = $pesan; 
      $api_url = "http://panel.apiwha.com/send_message.php"; 
      $api_url .= "?apikey=". urlencode ($my_apikey); 
      $api_url .= "&number=". urlencode ($destination); 
      $api_url .= "&text=". urlencode ($message); 
      $my_result_object = json_decode(file_get_contents($api_url, false)); 
      echo "<br>Result: ". $my_result_object->success; 
      echo "<br>Description: ". $my_result_object->description;
      echo "<br>Code: ". $my_result_object->result_code; 
    }

    public static function sendEmail($data)
    {
        
      $tujuan=$_POST['tujuan'];
      $subjek=$_POST['subjek'];
      $pesan=$_POST['pesan'];

      include "classes/class.phpmailer.php";
      $mail = new PHPMailer; 
      $mail->IsSMTP();
      $mail->SMTPSecure = 'ssl'; 
      $mail->Host = "smtp.gmail.com"; //host email
      $mail->SMTPDebug = 2;
      $mail->Port = 465;
      $mail->SMTPAuth = true;
      $mail->Username = "sbpone1@gmail.com"; //user email
      $mail->Password = "ozykvkgxqqnocvbu"; //password email 
      $mail->SetFrom("sbpone1@gmail.com","PT. Sarana Bangun Pusaka"); //set email pengirim
      $mail->Subject = $subjek; //subyek email
      $mail->AddAddress($tujuan);  // email tujuan
      $mail->MsgHTML($pesan); //pesan


      if($mail->Send()){
        logSystem("Sukses");
        echo "<meta http-equiv='refresh' content='0';>";
        return "10";
      }else
      logSystem("Gagal");
      return "30";
    }
    public static function sendEmail1($data)
    {
        
      $tujuan=explode(',',$_POST['tujuan']);
      $subjek=$_POST['subjek'];
      $pesan=$_POST['pesan'];

      include "classes/class.phpmailer.php";
      $mail = new PHPMailer; 
      $mail->IsSMTP();
      $mail->SMTPSecure = 'ssl'; 
      $mail->Host = "smtp.gmail.com"; //host email
      $mail->SMTPDebug = 2;
      $mail->Port = 465;
      $mail->SMTPAuth = true;
      $mail->Username = "sbpone1@gmail.com"; //user email
      $mail->Password = "ozykvkgxqqnocvbu"; //password email 
      $mail->SetFrom("sbpone1@gmail.com","PT. Sarana Bangun Pusaka"); //set email pengirim
      $mail->Subject = $subjek; //subyek email
      
foreach ($tujuan as $address) {
      $mail->AddAddress($address);  // email tujuan
    }
      $mail->MsgHTML($pesan); //pesan


      if($mail->Send()){
        logSystem("Sukses");
        echo "<meta http-equiv='refresh' content='0';>";
        return "10";
      }else
      logSystem("Gagal");
      return "30";
    }
    public static function editEvaluationResult($data){
      global $database;

      $priceEvaluation = 0; $administrationEvaluation = 0; $technicalEvaluation = 0; $winnerEvaluation = 0; $contractEvaluation = 0;
      if($data['priceEvaluation']){
        $priceEvaluation = 1;
      }
      if($data['administrationEvaluation']){
        $administrationEvaluation = 1;
      }
      if($data['technicalEvaluation']){
        $technicalEvaluation = 1;
      }
      if($data['winnerEvaluation']){
        $winnerEvaluation = 1;
      }
      if($data['contractEvaluation']){
        $contractEvaluation = 1;
      }

      $database->update("statustenderpenawaran",[
          "price" => $priceEvaluation,
          "administration" => $administrationEvaluation,
          "technical" => $technicalEvaluation,
          "winner" => $winnerEvaluation,
          "contract_winner" => $contractEvaluation,
          "information" => $data['information']
      ],[
        'id_vendortenderpenawaran' => $data['id_vendor']
      ]);

      return "10";
    }
    public static function addPenawaran($data)
    {
        global $database;

        //For image
        $fileName = $_FILES["dokumen"]["name"];
        $tempName = $_FILES["dokumen"]["tmp_name"];
        $folder = "./upload/img/tenderPenawaran/" . $fileName;

        $lastid = $database->insert("tenderpenawaran", [
            "id_tender" => $data['id_tender'],
            "id_itemtender" => $data['id_itemtender'],
            "id_tendervendor" => $data['id_tendervendor'],
            "kode_tender" => $data['kode_tender'],
            "kode_penawaran_vendor" => $data['kode_penawaran_vendor'] != null ? $data['kode_penawaran_vendor'] : "0",
            "tgl" => $data['tgl'],
            "harga" => $data['harga'] != null ? $data['harga'] : "0",
            "info" => $data['info'],
            "dokumen" => $fileName,
            "timestamp" => date("Y-m-d H:i:s"),
            "kriteria" => implode("",$data['kriteria'])
        ]);

        $database->insert("statustenderpenawaran",[
          "id_vendortenderpenawaran" => $data['id_tendervendor'],
        ]);

        if (move_uploaded_file($tempName, $folder))
        
        logSystem("Penawaran Tender Added - ID :" . $data['id']);
        //print_r($data['id']); die();
        return "10";
    }
    public static function deletePenawaran($data)
    {
        global $database;
        $database->delete("tenderpenawaran", ["id" => $data['id']]);
        // print_r($data['id']); die();
        logSystem("Penawaran Tender Deleted");
        return "30";
    }
    public static function deleteOffer($data){
      global $database;
      
      $database->delete("tenderpenawaran", ["id" => $data['id']]);
      logSystem("Penawaran Tender Deleted");
      return "30";
    }
    public static function deleteEvaluationResult($data){
      global $database;

      //Delete Tender Vendor
      $database->delete("tendervendor",[
        "id_vendor" => $data['idvendor']
      ]);

      //Delete Tender Penawaran
      $database->delete("tenderpenawaran",[
        "id_tendervendor" => $data['idvendor']
      ]);

      //Delete Status Tender Penawaran
      $database->delete("statustenderpenawaran",[
        "id_vendortenderpenawaran" => $data['idvendor']
      ]);

      logSystem("Evaluation Result Tender Deleted");
      return "30";
    }
    public static function editPenawaran($data){
      global $database;

      //For image
      $imageFromDB = $database->query("SELECT dokumen from tenderpenawaran WHERE id='".$_GET['idtenderpenawaran']."'")->fetchAll();
      
      $imageChange = false;
      $fileName = $_FILES["dokumen"]["name"] != null ? $_FILES["dokumen"]["name"] : $imageFromDB[0]['dokumen'];
      $tempName = $_FILES["dokumen"]["tmp_name"];
      $folder = "./upload/img/tenderPenawaran/" . $fileName;
      
      if($_FILES["dokumen"]["name"] != null){
        $imageChange = true;
      }
      
      if($imageChange == true){
        move_uploaded_file($tempName, $folder);
      }

      try{
        $database->update("tenderpenawaran", 
          [            
            "kode_penawaran_vendor" => $data['kode_penawaran_vendor'],
            "tgl" => $data['tgl'],
            "harga" => $data['harga'],
            "dokumen" => $fileName,
            "timestamp" => date("Y-m-d H:i:s"),
            "kriteria" => implode("",$data['kriteria'])
          ], 
          [ 
            "id" => $_GET['idtenderpenawaran'] 
          ]
        );

        logSystem("Penawaran Tender Updated");

        return "20";
      }
      catch(Exception $ex){
        return $ex;
      }
    }
    public static function editInstruction($data){
      global $database;

      //Edit Tender
      $database->update("tender",[
        "alamat_gudang" => $data['tempatSuffing']."_".$data['alamat'],
        "alamat_kirim" => $data['namaTujuan']."_".$data['alamatTujuan'],
        "keterangan" => $data['keterangan']
      ],[
        "id" => $data['routeid']
      ]);

      //Edit Tender Penawaran
      $database->update("tenderpenawaran",[
        "tgl" => $data['tglSuffing']
      ],[
        "id" => $data['idtenderpenawaran']
      ]);

      logSystem("Instruction Tender Updated");

      return "20";
    }
    public static function editCriteria($data){
      global $database;
      
      //Edit Pengadaan Acuan
      $database->update("pengadaanacuan",[
        "name" => $data['namaPengadaan']
      ],[
        "id" => $data['idpengadaanacuan']
      ]);

      logSystem("Criteria Tender Updated");

      return "20";
    }
    public static function deleteCriteria($data){
      global $database;

      //Delete Pengadaan Acuan
      $database->delete("pengadaanacuan", ["id" =>  $data['idpengadaanacuan']]);

      //Delete Pengadaan Acuan Detail
      $database->delete("pengadaanacuandetail", ["id_pengadaanacuan" =>  $data['idpengadaanacuan']]);

      logSystem("Criteria Tender Deleted");
      return "30";
    }
    public static function checkExpedisi($data){
      global $database;

      $dataTenderPenawaran = $database->query("SELECT *FROM tenderpenawaran WHERE id='".$data['id_tenderpenawaran']."'")->fetchAll(); 
      $tenderPenawaran = $dataTenderPenawaran[0]['kriteria']; 
      $kriteria = explode("_",substr($tenderPenawaran,0,-1)); 
      
      foreach($kriteria as $dataKriteria)
      { 
          $isiKriteria = explode("|",$dataKriteria); 
          $query = $database->query("SELECT *FROM pengadaanacuandetail WHERE id_pengadaanacuandetail='".$isiKriteria[1]."' ")->fetchAll(); 

          if($query != null){
              echo $query[0][0]."|";
          }
      }
      die();
    }
}
