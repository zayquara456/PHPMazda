<?php
require_once 'controllers/Controller.php';
require_once 'models/hoadon.php';
require_once 'models/Pagination.php';
require_once 'models/hangton.php';

class HoadonController extends Controller
{

  public function index()
  {
    //hiển thị danh sách category
    $category_model = new Bill();
    //do có sử dụng phân trang nên sẽ khai báo mảng các params
    $params = [
      'limit' => 5, //giới hạn 5 bản ghi 1 trang
      'query_string' => 'page',
      'controller' => 'hoadon',
      'action' => 'index',
      'full_mode' => FALSE,
    ];
//    mặc đinh page hiện tại là 1
    $page = 1;
    //nếu có truyền tham số page lên trình duyêt - tương đương đang ở tại trang nào, thì gán giá trị đó cho biến $page
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }

    //lấy tổng số bản ghi dựa theo các điều kiện có được từ mảng params truyền vào
    $count_total = $category_model->countTotal();
    $params['total'] = $count_total;

    //gán biến name cho mảng params với key là name
    $params['page'] = $page;
    $pagination = new Pagination($params);
    //lấy ra html phân trang
    $pages = $pagination->getPagination();

    //lấy danh sách category sử dụng phân trang
    $bills = $category_model->getAllPagination($params);

    $this->content = $this->render('views/bills/index.php', [
      //truyền biến $categories ra vew
      'bills' => $bills,
      //truyền biến phân trang ra view
      'pages' => $pages,
    ]);

    //gọi layout để nhúng thuộc tính $this->content
    require_once 'views/layouts/main.php';
  }

  public function create()
  {
    if (isset($_POST['submit'])) {
      $nhanvien = $_POST['nhanvien'];
      $time = $_POST['time'];
      $tenkhachhang = $_POST['tenkhachhang'];
	   $masp = $_POST['masp'];
      $soluongmua = $_POST['soluongmua'];
	 $product_model = new Storage();
    $product = $product_model->getByIdofproduct($masp);
	if($product['SoLuongTon'] < $soluongmua)
	{
		 $this->error = 'Không đủ mặt hàng cung cấp, số lượng hiện tại chỉ còn '.$product['SoLuongTon'].' chiếc';
	}
      //check validate
      if (empty($nhanvien)) {
        $this->error = 'Cần nhập tên';
      } 

      if (empty($this->error)) {
  
        //lưu vào csdl
        //gọi model để thực  hiện lưu
        $bill_model = new Bill();
        //gán các giá trị từ form cho các thuộc tính của category
        $bill_model->nhanvien = $nhanvien;
        $bill_model->time = $time;
        $bill_model->tenkhachhang = $tenkhachhang;
        $bill_model->masp = $masp;
		$bill_model->soluongmua = $soluongmua;
        //gọi phương thức insert
        $is_insert = $bill_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Thêm mới thành công';
        } else {
          $_SESSION['error'] = 'Thêm mới thất bại';
        }
        header('Location: index.php?controller=hoadon&action=index');
        exit();
      }

    }

    //lấy nội dung view create.php
    $this->content = $this->render('views/bills/create.php');
    //gọi layout để nhúng nội dung view create vừa lấy đc
    require_once 'views/layouts/main.php';
  }
  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=hoadon&action=index');
      exit();
    }
    $id = $_GET['id'];
    $bill_model = new Bill();
    $bills = $bill_model->getBillById($id);
    //lấy nội dung view create.php
    $this->content = $this->render('views/bills/detail.php', [
      'bill' => $bills
    ]);
    //gọi layout để nhúng nội dung view detail vừa lấy đc
    require_once 'views/layouts/main.php';

  }
}
