<?php

require ("db.class.php");

$veritabaniNesnesi = new db();

// Tüm veritabanı CRUD işlemleri için fonksiyon 
// $veritabaniNesnesi->query("Update  veriler set veri_isim = 'Cafer' , veri_soyisim = 'elibol' , veri_yas = 20");

// Tek satır select komutu
// $veritabaniNesnesi->getRow("Select  * from veriler");
// Çoklu satır select komutu
// $veritabaniNesnesi->getRows("Select  * from veriler");
// echo '<pre>';
