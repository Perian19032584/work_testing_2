<?php


class WorkTable {

    protected $pdo;
    protected static $instance;

    public function __construct(){
        if(empty($this->pdo)){
            $this->pdo = new PDO("mysql:host=localhost;dbname=test2;", 'root', 'root');
        }
    }

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function InnerJoin(){ //Получаем данные где  есть номера
        $data = $this->pdo->query("SELECT f.name, p.phone FROM phones p INNER JOIN firms f ON p.FirmID = f.id");
        return $data->fetchAll();
    }

    public function getNoPhone(){
        $data = $this->pdo->query("SELECT f.name, p.phone FROM phones p right JOIN firms f ON p.FirmID = f.id WHERE p.phone IS NULL");
        return $data->fetchAll();
    }

    public function getFirm(){// По сути решение 2 задач :)
        $data = $this->pdo->query("SELECT f.name, p.phone,count(p.phone) as count_num_phone FROM phones p inner JOIN firms f ON p.FirmID = f.id GROUP BY f.name having count_num_phone>=2");
        return $data->fetchAll();
    }

    public function getOneFirmMaxPhone(){// Получаем одну фирму с максимальных кол телефоном
        $data = $this->pdo->query("SELECT f.name, p.phone,count(p.phone) as count_num_phone FROM phones p INNER JOIN firms f ON p.FirmID = f.id GROUP BY f.name ORDER BY count_num_phone desc limit 1;");
        return $data->fetchAll();
    }
}

$WorkTable = WorkTable::instance();
$data = $WorkTable->getOneFirmMaxPhone();


echo "<pre>";
var_dump($data);