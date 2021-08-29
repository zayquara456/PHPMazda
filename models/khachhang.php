<?php
//models/Category
require_once 'models/Model.php';
class Khach extends Model {
  //khai báo các thuộc tính cho model trùng với các trường
//    của bảng categories
  public $makh;
  public $tenkh;
  public $khachhang;
  public $diachi;
  public $sdt;
  public $sinhnhat;
  public $sothich;
  public $ngaythem;

  //insert dữ liệu vào bảng categories
  public function insert() {
    $sql_insert =
      "INSERT INTO `khachhang`( `tenkh`, `diachi`, `sdt`, `sinhnhat`, `sothich`,`ngaythem`) 
VALUES (:tenkh, :diachi,  :sdt, :sinhnhat , :sothich, :ngaythem)";
    //cbi đối tượng truy vấn
    $obj_insert = $this->connection
      ->prepare($sql_insert);
    //gán giá trị thật cho các placeholder
    $arr_insert = [
      ':tenkh' => $this->tenkh,
      ':diachi' => $this->diachi,
      ':sdt' => $this->sdt,
      ':sinhnhat' => $this->sinhnhat,
	  ':sothich' => $this->sothich,
    ':ngaythem' => $this->ngaythem,
    ];
    return $obj_insert->execute($arr_insert);
  }

  /**
   * LẤy thông tin danh mục trên hệ thống
   * @param $params array Mảng các tham số search
   * @return array
   */
  public function getAll($params = []) {
    $str_search = 'WHERE TRUE';
    //check mảng param truyền vào để thay đổi lại chuỗi search
    if (isset($params['name']) && !empty($params['name'])) {
      $name = $params['name'];
      //nhớ phải có dấu cách ở đầu chuỗi
      $str_search .= " AND `tenkh` LIKE '%$name%'";
    }
    //tạo câu truy vấn
    //gắn chuỗi search nếu có vào truy vấn ban đầu
    $sql_select_all = "SELECT * FROM khachhang $str_search";
    //cbi đối tượng truy vấn
    $obj_select_all = $this->connection
      ->prepare($sql_select_all);
    $obj_select_all->execute();
    $khachs = $obj_select_all
      ->fetchAll(PDO::FETCH_ASSOC);
    return $khachs;
  }

  public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM `khachhang` WHERE `makh` = $id");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

  /**
   * Lấy category theo id truyền vào
   * @param $id
   * @return array
   */
  public function getKhachById($id)
  {
    $obj_select = $this->connection
      ->prepare("select  c.*, r.TenSP TenSP, r.GiaTien DonGia
from hoadon c
inner join sanpham r 
    on r.MaSP = c.MaSP
WHERE MaHD = $id");
    $obj_select->execute();
    $khach = $obj_select->fetch(PDO::FETCH_ASSOC);

    return $khach;
  }


  /**
   * Lấy tổng số bản ghi trong bảng categories
   * @return mixed
   */
  public function countTotal()
  {
    $obj_select = $this->connection->prepare("SELECT COUNT(makh) FROM khachhang");
    $obj_select->execute();

    return $obj_select->fetchColumn();
  }

  public function getAllPagination($params = [])
  {
    $limit = $params['limit'];
    $page = $params['page'];
    $start = ($page - 1) * $limit;
    $obj_select = $this->connection
      ->prepare("SELECT * FROM khachhang LIMIT $start, $limit");
    $obj_select->execute();
    $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

    return $categories;
  }
  public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM khachhang WHERE makh = $id");
        return $obj_delete->execute();
    }
    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE khachhang SET tenkh=:tenkh, diachi=:diachi, sdt=:sdt, sinhnhat=:sinhnhat,sothich=:sothich,ngaythem=:ngaythem WHERE makh = $id
");
        $arr_update = [
            ':tenkh' => $this->tenkh,
            ':diachi' => $this->diachi,
            ':sdt' => $this->sdt,
            ':sinhnhat' => $this->sinhnhat,
            ':sothich' => $this->sothich,
            ':ngaythem' => $this->ngaythem,
        ];
        return $obj_update->execute($arr_update);
    }

}