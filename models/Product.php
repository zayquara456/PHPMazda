<?php
require_once 'models/Model.php';

class Product extends Model
{

    public $id;
    public $tensp;
    public $hang;
	public $mau;
	public $soghe;
    public $gia;
    /*
     * Chuỗi search, sinh tự động dựa vào tham số GET trên Url
     */
    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND c.TenSP LIKE '%{$_GET['title']}%'";
        }
    }

    /**
     * Lấy thông tin của sản phẩm đang có trên hệ thống
     * @return array
     */
    public function getAll()
    {
        $obj_select = $this->connection
            ->prepare("SELECT c.*, r.SoLuongTon SoLuong FROM sanpham c inner join hangton r on r.MaSP = c.MaSP
			WHERE TRUE $this->str_search
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * Lấy thông tin của sản phẩm đang có trên hệ thống
     * @param array Mảng các tham số phân trang
     * @return array
     */
    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT c.*, r.SoLuongTon SoLuong FROM sanpham c inner join hangton r on r.MaSP = c.MaSP
			WHERE TRUE $this->str_search LIMIT $start, $limit");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * Tính tổng số bản ghi đang có trong bảng products
     * @return mixed
     */
    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM sanpham WHERE TRUE $this->str_search");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

    /**
     * Insert dữ liệu vào bảng products
     * @return bool
     */
    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO `hangton`(`MaSP`, `SoLuongTon`) VALUES ((SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES
     WHERE TABLE_SCHEMA = 'project_cc' AND TABLE_NAME = 'sanpham'),'0');
			INSERT INTO `sanpham`( `TenSP`, `Hang`, `MauHienCo`, `SoGhe`, `GiaTien`) 
             VALUES (:tensp, :hang, :mau, :soghe, :giatien);
						");
        $arr_insert = [
            ':tensp' => $this->tensp,
            ':hang' => $this->hang,
            ':mau' => $this->mauhienco,
            ':soghe' => $this->soghe,
            ':giatien' => $this->giatien,
        ];
        return $obj_insert->execute($arr_insert);
    }

    /**
     * Lấy thông tin sản phẩm theo id
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT c.*, r.SoLuongTon SoLuong FROM `sanpham` c inner join `hangton` r on r.MaSP = c.MaSP WHERE c.MaSP = $id");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }


    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE `sanpham` SET `TenSP`=:tensp,`Hang`=:hang,`MauHienCo`=:mau,`SoGhe`=:soghe,`GiaTien`=:giatien WHERE MaSP = $id
");
        $arr_update = [
            ':tensp' => $this->tensp,
            ':hang' => $this->hang,
            ':mau' => $this->mauhienco,
            ':soghe' => $this->soghe,
            ':giatien' => $this->giatien,
        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM sanpham WHERE MaSP = $id");
        return $obj_delete->execute();
    }
}