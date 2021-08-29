<?php
require_once 'controllers/Controller.php';
require_once 'models/doanhthu.php';
require_once 'models/Pagination.php';
class DoanhThuController extends Controller
{

  public function index()
  {
    //hiển thị danh sách category
    $doanhthu_model = new DoanhThu();
    //do có sử dụng phân trang nên sẽ khai báo mảng các params
    $params = [
      'limit' => 10, //giới hạn 10 bản ghi 1 trang
      'query_string' => 'page',
      'controller' => 'doanhthu',
      'action' => 'index',
      'full_mode' => FALSE,
    ];
    $page = 1;
  
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }

    if (isset($_GET['name'])) {
      $params['query_additional'] = '&name=' . $_GET['name'];
    }

    //lấy tổng số bản ghi dựa theo các điều kiện có được từ mảng params truyền vào
    $count_total = $doanhthu_model->countTotal();
    $params['total'] = $count_total;

    //gán biến name cho mảng params với key là name
    $params['page'] = $page;
    $pagination = new Pagination($params);
    //lấy ra html phân trang
    $pages = $pagination->getPagination();

    //lấy danh sách category sử dụng phân trang
    $doanhthus = $doanhthu_model->getAllPagination($params);
    $this->content = $this->render('views/doanhthus/index.php', [
      //truyền biến $categories ra vew
      'doanhthus' => $doanhthus,
      //truyền biến phân trang ra view
      'pages' => $pages,
    ]);

    //gọi layout để nhúng thuộc tính $this->content
    require_once 'views/layouts/main.php';
  }

  public function create()
  {
    if (isset($_POST['submit'])) {
      // $khachhang = $_POST['khachhang'];
      $ngay= $_POST['ngay'];

      if (empty($this->error)) {
        $doanhthu_model = new DoanhThu();
        $doanhthu_model->ngay = $ngay;
      
        $is_insert = $doanhthu_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Thêm mới thành công';
        } else {
          $_SESSION['error'] = 'Thêm mới thất bại';
        }
        header('Location: index.php?controller=doanhthu&action=index');
        exit();
      }

    }

    //lấy nội dung view create.php
    $this->content = $this->render('views/doanhthus/create.php');
    //gọi layout để nhúng nội dung view create vừa lấy đc
    require_once 'views/layouts/main.php';
  } 
  public function delete()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=doanhthu');
      exit();
    }

    $id = $_GET['id'];
    $doanhthu_model = new DoanhThu();
    $is_delete = $doanhthu_model->delete($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Xóa thành công';
    } else {
      $_SESSION['error'] = 'Xóa thất bại';
    }
    header('Location: index.php?controller=doanhthu');
    exit();
  }
}
