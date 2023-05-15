<?php
  
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
        $mail->Username = "stefanusdorotheoputra@gmail.com"; //user email
        $mail->Password = "irviktvquoeqctwm"; //password email 
        $mail->SetFrom("stefanusdorotheoputra@gmail.com","Stefanus Dorotheoputra"); //set email pengirim
        $mail->Subject = $subjek; //subyek email
        $mail->AddAddress($tujuan);  // email tujuan
        $mail->MsgHTML($pesan); //pesan


        if($mail->Send()){
          echo "<script>alert('Kirim Pesan Sukses')</script>";
          echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }else
          echo "<script>alert('GAGAL')</script>";
          echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    ?>

<!-- Elseif Channel -->