<?php
require_once 'models/Model.php';

class Pay extends Model
{

    public $mact;
    public $masp;
    public $giatiennhap;
    public $soluongnhap;
    public $soluongnhapcu;
    public $nguoinhap;
    /*
     * Chuỗi search, sinh tự động dựa vào tham số GET trên Url
     */
    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND chitieu.MaSP LIKE '%{$_GET['title']}%'";
        }
    }

    /**
     * Lấy thông tin của chi tiêu đang có trên hệ thống
     * @param array Mảng các tham số phân trang
     * @return array
     */
    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT chitieu.* FROM chitieu 
                        WHERE TRUE $this->str_search
                        LIMIT $start, $limit
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $pays = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $pays;
    }

    /**
     * Tính tổng số bản ghi đang có trong bảng chi tiêu
     * @return mixed
     */
    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(MaCT) FROM chitieu WHERE TRUE $this->str_search");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

    /**
     * Insert dữ liệu vào bảng chitieu
     * @return bool
     */
    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO `chitieu`( `MaSP`, `GiaTienNhap`, `SoLuongNhap`, `NguoiNhap`) 
                        VALUES (:masp, :giatiennhap, :soluongnhap, :nguoinhap);
                       UPDATE `hangton` SET `SoLuongTon` = `SoLuongTon` + :soluongnhap WHERE `MaSP`=:masp");
        $arr_insert = [
            ':masp' => $this->masp,
            ':giatiennhap' => $this->giatiennhap,
            ':soluongnhap' => $this->soluongnhap,
            ':nguoinhap' => $this->nguoinhap,
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
            ->prepare("SELECT * FROM `chitieu` WHERE `MaCT` = $id");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy chitieu theo id truyền vào
     * @param $id
     * @return array
     */
    public function getPayById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT  c.*, r.TenSP TenSP, r.Hang Hang, r.MauHienCo MauHienCo, r.SoGhe SoGhe
            FROM chitieu c
            inner join sanpham r 
            on r.MaSP = c.MaSP
            WHERE MaCT = $id");
        $obj_select->execute();
        $pay = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $pay;
    }

    
    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE `chitieu` SET `MaSP`=:masp,`GiaTienNhap`=:giatiennhap,
			`SoLuongNhap`=:soluongnhap, `NguoiNhap`=:nguoinhap WHERE MaCT = $id;
            UPDATE `sanpham` SET `SoLuong`=`SoLuong`+ :soluongnhap WHERE `MaSP`=:masp
            ");
        $arr_update = [
            ':masp' => $this->masp,
            ':giatiennhap' => $this->giatiennhap,
            ':soluongnhap' => $this->soluongnhap,
            ':nguoinhap' => $this->nguoinhap,
        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM chitieu WHERE MaCT = $id");
        return $obj_delete->execute();
    }
}
