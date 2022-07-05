<?php

require './db.php';

class Hp
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    public function read()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $query = "SELECT * FROM hp ORDER BY nama LIMIT {$page}, 4";
        $sql = $this->db->prepare($query);
        $sql->execute();
        $data = [];

        while ($row = $sql->fetch()) {
            array_push($data, $row);
        }

        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function create($data)
    {
        foreach ($data as $key => $value) {
            $value = is_array($value) ? trim(implode(',', $value)) : trim($value);
            $data[$key] = (strlen($value) > 0 ? $value : NULL);
        }

        $query = "INSERT INTO hp VALUES (Null, :nama, :seri_id, :layar, :ram, :rom, :kamera_utama, :kamera_depan, :baterai, :warna, :harga, :gambar)";

        $sql = $this->db->prepare($query);

        $sql->bindParam(':nama', $data['nama'], PDO::PARAM_STR);
        $sql->bindParam(':seri_id', $data['seri_id'], PDO::PARAM_STR);
        $sql->bindParam(':layar', $data['layar'], PDO::PARAM_STR);
        $sql->bindParam(':ram', $data['ram'], PDO::PARAM_INT);
        $sql->bindParam(':rom', $data['rom'], PDO::PARAM_INT);
        $sql->bindParam(':kamera_utama', $data['kamera_utama'], PDO::PARAM_INT);
        $sql->bindParam(':kamera_depan', $data['kamera_depan'], PDO::PARAM_INT);
        $sql->bindParam(':baterai', $data['baterai'], PDO::PARAM_INT);
        $sql->bindParam(':warna', $data['warna'], PDO::PARAM_STR);
        $sql->bindParam(':harga', $data['harga'], PDO::PARAM_INT);
        $sql->bindParam(':gambar', $data['gambar'], PDO::PARAM_STR);

        try {
            $sql->execute();
        } catch (PDOException $e) {
            $this->db = Null;
            http_response_code(500);
            die($e->getMessage());
        }
        $this->db = Null;
    }
}

$hp = new Hp();

switch ($_GET['action']) {
    case 'create':
        $hp->create($_POST);
        break;

    default:
        $hp->read();
        break;
}