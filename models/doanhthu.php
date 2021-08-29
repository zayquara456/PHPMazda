<?php
//models/Category
require_once 'models/Model.php';
class DoanhThu extends Model {
  public $madt;
  public $ngay;
  public $soluongdon;
  public $doanhthu;


  public function countTotal()
  {
    $obj_select = $this->connection->prepare("SELECT COUNT(madt) FROM doanhthu");
    $obj_select->execute();

    return $obj_select->fetchColumn();
  }

  public function insert() {
    $sql_insert =
      "INSERT INTO `doanhthu`( `ngay`) 
VALUES (:ngay)";
    //cbi đối tượng truy vấn
    $obj_insert = $this->connection
      ->prepare($sql_insert);
    //gán giá trị thật cho các placeholder
    $arr_insert = [
      ':ngay' => $this->ngay,
      
    ];
    return $obj_insert->execute($arr_insert);
  
}

  public function getAllPagination($params = [])
  {
    $limit = $params['limit'];
    $page = $params['page'];
    $start = ($page - 1) * $limit;
    $obj_select = $this->connection
      ->prepare("SELECT madt,
      ngay,
      COUNT(hoadon.NgayGioTao) AS soluongdon,
     SUM(giatien*soluongmua) AS doanhthu
      FROM doanhthu,hoadon,sanpham
      WHERE doanhthu.ngay=hoadon.NgayGioTao AND hoadon.MaSP=sanpham.MaSP
      GROUP BY NgayGioTao
      ORDER BY doanhthu.madt");
    $obj_select->execute();
    $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

    return $categories;
  }
  
  public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM doanhthu WHERE madt = $id");
        return $obj_delete->execute();
    }
}