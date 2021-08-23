<?php


// Veritabanı bağlantısı için gerekli değişkenlerin oluşturulması ve yapıcı fonksiyon.
// PDO sınıfı hata yakalama setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// getRow fonksiyonu (Tek bir satır çekmek için )
// getRows fonksiyonu (Tüm satırları çekmek için )
// query fonksiyonu (Bir array ile tüm işlemleri yapmak için)

class db
{
    private $host = "localhost";
    private $dbname = "oop";
    private $user = "root";
    private $password = "";
    private $db;

    public function __construct()
    {
        $connectionString = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        try {

            $this->db = new PDO($connectionString, $this->user, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->query("SET NAMES UTF8");
        } catch (PDOException $ex) {
            echo 'Bir hata ile karşılaşıldı , hata : ' . $ex->getMessage();
        }
    }
    public function getRow($query)
    {
        return  $this->db->query($query)->fetch(PDO::FETCH_ASSOC);
    }
    public function getRows($query)
    {
        return  $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function query($query,$parameters = null){
        if($parameters)
        {
            $sonuc = $this->db->prepare($query)->execute($parameters);
        }
        else{
            $sonuc =  $this->db->prepare($query)->execute();
        }
        if($sonuc){
            return true;
        }
        else{
            return false;
        }
    }
}
