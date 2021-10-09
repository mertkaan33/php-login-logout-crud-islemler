<?php
 $conn = mysqli_connect("localhost", "root", "","musteri");
 $id = $_GET['id'];
 $sil=mysqli_query($conn,"DELETE from musteriler  where id=".$id);      
 // Sorun Oluştu mu diye test edelim. Eğer sorun yoksa hata vermeyecektir
 if($sil){
    header('Location: musteriListele.php');
 }else{
     echo "Bir Sorun Oluştu";
 }
 
?>