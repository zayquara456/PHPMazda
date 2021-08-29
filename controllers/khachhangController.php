<?php
require_once 'controllers/Controller.php';
require_once 'models/khachhang.php';
require_once 'models/Pagination.php';
class KhachHangController extends Controller
{

  public function index()
  {
    //hiển thị danh sách category
    $khach_model = new Khach();
    //do có sử dụng phân trang nên sẽ khai báo mảng các params
    $params = [
      'limit' => 10, //giới hạn 5 bản ghi 1 trang
      'query_string' => 'page',
      'controller' => 'khach',
      'action' => 'index',
      'full_mode' => FALSE,
    ];
//    mặc đinh page hiện tại là 1
    $page = 1;
    //nếu có truyền tham số page lên trình duyêt - tương đương đang ở tại trang nào, thì gán giá trị đó cho biến $page
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    //xử lý form tìm kiếm
    if (isset($_GET['name'])) {
      $params['query_additional'] = '&name=' . $_GET['name'];
    }

    //lấy tổng số bản ghi dựa theo các điều kiện có được từ mảng params truyền vào
    $count_total = $khach_model->countTotal();
    $params['total'] = $count_total;

    //gán biến name cho mảng params với key là name
    $params['page'] = $page;
    $pagination = new Pagination($params);
    //lấy ra html phân trang
    $pages = $pagination->getPagination();

    //lấy danh sách category sử dụng phân trang
    $khachs = $khach_model->getAllPagination($params);

    $this->content = $this->render('views/khachs/index.php', [
      //truyền biến $categories ra vew
      'khachs' => $khachs,
      //truyền biến phân trang ra view
      'pages' => $pages,
    ]);

    //gọi layout để nhúng thuộc tính $this->content
    require_once 'views/layouts/main.php';
  }

  public function create()
  {
    if (isset($_POST['submit'])) {
      $tenkh = $_POST['tenkh'];
      $diachi = $_POST['diachi'];
      $sdt = $_POST['sdt'];
	   $sinhnhat = $_POST['sinhnhat'];
      $sothich = $_POST['sothich'];
      $ngaythem=$_POST['ngaythem'];

      if (empty($this->error)) {
  
        //lưu vào csdl
        //gọi model để thực  hiện lưu
        $khach_model = new Khach();
        //gán các giá trị từ form cho các thuộc tính của category
      
        $khach_model->tenkh = $tenkh;
        $khach_model->diachi = $diachi;
        $khach_model->sdt = $sdt;
        $khach_model->sinhnhat = $sinhnhat;
        $khach_model->sothich = $sothich;
        $khach_model->ngaythem = $ngaythem;
        //gọi phương thức insert
        $is_insert = $khach_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Đã thêm bản ghi mới';
        } else {
          $_SESSION['error'] = 'Thêm mới thất bại';
        }
        header('Location: index.php?controller=khachhang&action=index');
        exit();
      }

    }

    //lấy nội dung view create.php
    $this->content = $this->render('views/khachs/create.php');
    //gọi layout để nhúng nội dung view create vừa lấy đc
    require_once 'views/layouts/main.php';
  }
  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=khachhang&action=index');
      exit();
    }
    $id = $_GET['id'];
    $khach_model = new Khach();
    $khachs = $khach_model->getById($id);
    //lấy nội dung view create.php
    $this->content = $this->render('views/khachs/detail.php', [
      'khach' => $khachs
    ]);
    //gọi layout để nhúng nội dung view detail vừa lấy đc
    require_once 'views/layouts/main.php';

  }
  public function delete()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=khachhang');
      exit();
    }

    $id = $_GET['id'];
    $khach_model = new Khach();
    $is_delete = $khach_model->delete($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Xóa thành công';
    } else {
      $_SESSION['error'] = 'Xóa thất bại';
    }
    header('Location: index.php?controller=khachhang');
    exit();
  }

  public function update()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=product');
      exit();
    }

	$id = $_GET['id'];
    $khach_model = new Khach();
    $khachs = $khach_model->getById($id);
    //xử lý submit form
    if (isset($_POST['submit'])) {
      $tenkh = $_POST['tenkh'];
      $diachi = $_POST['diachi'];
      $sdt = $_POST['sdt'];
      $sinhnhat = $_POST['sinhnhat'];
      $sothich = $_POST['sothich'];
      $ngaythem=$_POST['ngaythem'];
      //xử lý validate
      

      //nếu ko có lỗi thì tiến hành save dữ liệu
      if (empty($this->error)) {

        //save dữ liệu vào bảng khachhang
        $khach_model->tenkh = $tenkh;
        $khach_model->diachi = $diachi;
        $khach_model->sdt = $sdt;
        $khach_model->sinhnhat = $sinhnhat;
        $khach_model->sothich = $sothich;
        $khach_model->ngaythem = $ngaythem;
        $is_update = $khach_model->update($id);
        if ($is_update) {
          $_SESSION['success'] = 'Cập nhật thông tin thành công';
        } else {
          $_SESSION['error'] = 'Cập nhật thông tin thất bại';
        }
        header('Location: index.php?controller=khachhang');
        exit();
      }
    }

    $this->content = $this->render('views/khachs/update.php', [
        'khach' => $khachs,
    ]);
    require_once 'views/layouts/main.php';
  }
}
