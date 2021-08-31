<?php
require_once 'models/Model.php';
require_once 'models/chitieu.php';
class Storage extends Model
{

    public $maht;
    public $masp;
    public $soluongton;
    public $vontonkho;
    /*
     * Chuỗi search, sinh tự động dựa vào tham số GET trên Url
     */
    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND hangton.MaHT LIKE '%{$_GET['title']}%'";
        }
    }

    /**
     * Tính tổng số bản ghi đang có trong bảng products
     * @return mixed
     */
    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(MaHT) FROM hangton");
        $obj_select->execute();

        return $obj_select->fetchColumn();
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
            ->prepare("SELECT h.MaHT, 
            s.TenSP,
            h.SoLuongTon,
            SUM(c.GiaTienNhap*c.SoLuongNhap) AS VonTonKho
            FROM 
            hangton h,
            chitieu c,
            sanpham s
            WHERE h.MaSP = c.MaSP and h.MaSP = s.MaSP
            GROUP BY h.MaSP
            ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * Lấy thông tin sản phẩm theo id
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM `hangton` WHERE `MaHT` = $id");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * Lấy thông tin tổng vốn kho hàng
     * @param $vontonkho
     * @return mixed
     */
    public function getTongVon()
    {
        $obj_select = $this->connection
            ->prepare("SELECT SUM(c.GiaTienNhap*c.SoLuongNhap) as TongVon 
            FROM hangton h, chitieu c, sanpham s 
            WHERE h.MaSP = c.MaSP and h.MaSP = s.MaSP
            ");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);

    }
    // /**
    //  * Lấy so luong ton
    //  * @param 
    //  * @return mixed
    //  */
    // public function getSoLuongCon()
    // {
    //     $obj_select = $this->connection
    //         ->prepare("SELECT 
    //         SUM(c.SoLuongNhap) 
    //         FROM 
    //         hangton h,
    //         chitieu c,
    //         sanpham s
    //         WHERE h.MaSP = c.MaSP and h.MaSP = s.MaSP
    //         GROUP BY h.MaSP
    //         ");

    //     $obj_select->execute();
    //     return $obj_select->fetch(PDO::FETCH_ASSOC);

    // }

}