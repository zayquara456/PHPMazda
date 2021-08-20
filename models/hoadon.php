<?php
//models/Category
require_once 'models/Model.php';
class Bill extends Model {
  //khai báo các thuộc tính cho model trùng với các trường
//    của bảng categories
  public $mahd;
  public $time;
  public $nhanvien;
  public $tenkhachhang;
  public $masp;
  public $soluongmua;

  //insert dữ liệu vào bảng categories
  public function insert() {
    $sql_insert =
      "INSERT INTO `hoadon`( `NgayGioTao`, `NhanVien`, `TenKhachHang`, `MaSP`, `SoLuongMua`) 
VALUES (:time, :nhanvien,  :tenkhachhang, :masp , :soluongmua);
		UPDATE `sanpham` SET `SoLuong`=`SoLuong`- :soluongmua WHERE `MaSP`=:masp
";
    //cbi đối tượng truy vấn
    $obj_insert = $this->connection
      ->prepare($sql_insert);
    //gán giá trị thật cho các placeholder
    $arr_insert = [
      ':nhanvien' => $this->nhanvien,
      ':time' => $this->time,
      ':tenkhachhang' => $this->tenkhachhang,
      ':masp' => $this->masp,
	  ':soluongmua' => $this->soluongmua,
    ];
    return $obj_insert->execute($arr_insert);
  }

  /**
   * LẤy thông tin danh mục trên hệ thống
   * @param $params array Mảng các tham số search
   * @return array
   */
  public function getAll($params = []) {
    // echo "<pre>";
    // print_r($params);
    // echo "</pre>";
    //tạo 1 chuỗi truy vấn để thêm các điều kiện search
    //dựa vào mảng params truyền vào
    $str_search = 'WHERE TRUE';
    //check mảng param truyền vào để thay đổi lại chuỗi search
    if (isset($params['name']) && !empty($params['name'])) {
      $name = $params['name'];
      //nhớ phải có dấu cách ở đầu chuỗi
      $str_search .= " AND `NhanVien` LIKE '%$name%'";
    }
    //tạo câu truy vấn
    //gắn chuỗi search nếu có vào truy vấn ban đầu
    $sql_select_all = "SELECT * FROM hoadon $str_search";
    //cbi đối tượng truy vấn
    $obj_select_all = $this->connection
      ->prepare($sql_select_all);
    $obj_select_all->execute();
    $bills = $obj_select_all
      ->fetchAll(PDO::FETCH_ASSOC);
    return $bills;
  }

  public function getById($id) {
    $sql_select_one = "SELECT * FROM hoadon WHERE `MaHD` = $id";
    $obj_select_one = $this->connection
      ->prepare($sql_select_one);
    $obj_select_one->execute();
    $category = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $category;
  }

  /**
   * Lấy category theo id truyền vào
   * @param $id
   * @return array
   */
  public function getBillById($id)
  {
    $obj_select = $this->connection
      ->prepare("select  c.*, r.TenSP TenSP, r.GiaTien DonGia
from hoadon c
inner join sanpham r 
    on r.MaSP = c.MaSP
WHERE MaHD = $id");
    $obj_select->execute();
    $bill = $obj_select->fetch(PDO::FETCH_ASSOC);

    return $bill;
  }


  /**
   * Lấy tổng số bản ghi trong bảng categories
   * @return mixed
   */
  public function countTotal()
  {
    $obj_select = $this->connection->prepare("SELECT COUNT(MaHD) FROM hoadon");
    $obj_select->execute();

    return $obj_select->fetchColumn();
  }

  public function getAllPagination($params = [])
  {
    $limit = $params['limit'];
    $page = $params['page'];
    $start = ($page - 1) * $limit;
    $obj_select = $this->connection
      ->prepare("SELECT * FROM hoadon LIMIT $start, $limit");

//    do PDO coi tất cả các param luôn là 1 string, nên cần sử dụng bindValue / bindParam cho các tham số start và limit
//        $obj_select->bindParam(':limit', $limit, PDO::PARAM_INT);
//        $obj_select->bindParam(':start', $start, PDO::PARAM_INT);
    $obj_select->execute();
    $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

    return $categories;
  }
}