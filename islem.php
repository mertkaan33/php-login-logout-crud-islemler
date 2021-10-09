<?php 

require_once 'baglan.php';
session_start();
ob_start();

 ?>

 <?php 
if (isset($_POST['kayit'])) {

	 $kullanici_ad=$_POST['kullanici_ad'];
	 $kullanici_mail=$_POST['kullanici_mail'];
	 $kullanici_password=$_POST['kullanici_password'];


		//başlangıç

			$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
			));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();
			if ($say==0) {

				//kullanıcı kayıt işlemi:
				$kaydet=$db->prepare("INSERT INTO kullanici SET
					kullanici_ad=:kullanici_ad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password
					");

				$insert=$kaydet->execute(array(
					'kullanici_ad' => $kullanici_ad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $kullanici_password
					));
				if ($insert) {

					header("location:giris.php");

				} else {
					header("location:giris.php");
				}

			}
}


if (isset($_POST['giris']))
{
$kullanici_mail = $_POST['kullanici_mail'];
$kullanici_password = $_POST['kullanici_password'];

$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail and kullanici_password=:password");
$kullanicisor->execute(array(
	'mail' => $kullanici_mail,
	'password' => $kullanici_password

	));

	echo $say = $kullanicisor->rowCount();

	if ($say==1)
	{
		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("location: home.php");
		exit;

	}

	else
	{
		header("location: giris.php?durum=no");
		exit;
	}

}

     if(isset($_POST['kullanicikaydet'])) {

        $musteri_ad = isset($_POST['musteri_ad']) ? $_POST['musteri_ad'] : null;
        $musteri_soyad = isset($_POST['musteri_soyad']) ? $_POST['musteri_soyad'] : null;
        $musteri_tel = isset($_POST['musteri_tel']) ? $_POST['musteri_tel'] : null;
    
        //veritabanı ekleme İşlemi
        $sorgu = $db->prepare('INSERT INTO musteri SET
            musteri_ad = ?,
            musteri_soyad = ?,
            musteri_tel = ?');
    
            $ekle = $sorgu->execute([
                $musteri_ad, $musteri_soyad, $musteri_tel
            ]);
            if($ekle) {
                header('location: home.php?durum=basarili');
            } else{
               $hata = $sorgu->errorInfo();
               echo 'mysql hatası' .$hata[2];
            }
    }



    if ($_GET['musterisil']=="ok") {
	$sil=$db->prepare("DELETE FROM musteri WHERE musteri_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['musteri_id']
	));
	if ($kontrol)
	{
		header("location:musteriListele.php?sil=ok");
	}
	else
	{
		header("location:musteriListele.php?sil=no");
	}
}

if (isset($_POST['musteriduzenlekaydet']))
{
	$musteri_id=$_POST['musteri_id'];
	$ayarkaydet=$db->prepare("UPDATE musteri SET
		musteri_ad=:ad,
		musteri_soyad=:soyad,
		musteri_tel=:tel
		WHERE musteri_id={$_POST['musteri_id']}");

	$update=$ayarkaydet->execute(array(
		'ad' => $_POST['musteri_ad'],
		'soyad' => $_POST['musteri_soyad'],
		'tel' => $_POST['musteri_tel']
		));

	if ($update)
	{
		header("Location:musteriListele.php?musteri_id=$musteri_id&durum=ok");
	}
	else
	{
		header("Location:musteriListele.php?musteri_id=$kullanici_id&durum=no");
	}
}





  ?>

