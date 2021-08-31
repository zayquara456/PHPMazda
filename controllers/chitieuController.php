<?php
require_once 'controllers/Controller.php';
require_once 'models/chitieu.php';
require_once 'models/Pagination.php';

class ChiTieuController extends Controller
{
  public function index()
  {
    $product_model = new Pay();

    //lấy tổng số bản ghi đang có trong bảng chitieu
    $count_total = $product_model->countTotal();
    //        xử lý phân trang
    $query_additional = '';
    if (isset($_GET['title'])) {
      $query_additional .= '&title=' . $_GET['title'];
    }
    $arr_params = [
        'total' => $count_total,
        'limit' => 5,
        'query_string' => 'page',
        'controller' => 'chitieu',
        'action' => 'index',
        'full_mode' => false,
        'query_additional' => $query_additional,
        'page' => isset($_GET['page']) ? $_GET['page'] : 1
    ];
    $pays = $product_model->getAllPagination($arr_params);
    $pagination = new Pagination($arr_params);

    $pages = $pagination->getPagination();


    $this->content = $this->render('views/pays/index.php', [
        'pays' => $pays,
        'pages' => $pages,
    ]);
    require_once 'views/layouts/main.php';
  }

  public function create()
  {
    //xử lý submit form
    if (isset($_POST['submit'])) {
      $masp = $_POST['masp'];
      $giatiennhap = $_POST['giatiennhap'];
      $soluongnhap = $_POST['soluongnhap'];
      $nguoinhap = $_POST['nguoinhap'];
      //xử lý validate


      //nếu ko có lỗi thì tiến hành save dữ liệu
      if (empty($this->error)) {


        //save dữ liệu vào bảng chitieu
        $product_model = new Pay();
        $product_model->masp = $masp;
        $product_model->giatiennhap = $giatiennhap;
        $product_model->soluongnhap = $soluongnhap;
        $product_model->nguoinhap = $nguoinhap;
        $is_insert = $product_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Insert dữ liệu thành công';
        } else {
          $_SESSION['error'] = 'Insert dữ liệu thất bại';
        }
        header('Location: index.php?controller=chitieu');
        exit();
      }
    }

    $this->content = $this->render('views/pays/create.php');
    require_once 'views/layouts/main.php';
  }

  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=chitieu&action=index');
      exit();
    }

    $mact = $_GET['id'];
    $product_model = new Pay();
    $pay = $product_model->getPayById($mact);

    $this->content = $this->render('views/pays/detail.php', [
        'pay' => $pay
    ]);
    require_once 'views/layouts/main.php';
  }

  public function update()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=chitieu');
      exit();
    }

	$id = $_GET['id'];
    $product_model = new Pay();
    $pay = $product_model->getById($id);
    //xử lý submit form
    if (isset($_POST['submit'])) {
      $masp = $_POST['masp'];
      $giatiennhap = $_POST['giatiennhap'];
      $soluongnhap = $_POST['soluongnhap'];
      $soluongnhapcu = $pay['SoLuongNhap'];
      $nguoinhap = $_POST['nguoinhap'];
      //xử lý validate
      if (empty($masp)) {
        $this->error = 'Không được để trống mã sản phẩm';
      }

      //nếu ko có lỗi thì tiến hành save dữ liệu
      if (empty($this->error)) {

        //save dữ liệu vào bảng chitieu
        $product_model->masp = $masp;
        $product_model->giatiennhap = $giatiennhap;
        $product_model->soluongnhap = $soluongnhap;
        $product_model->nguoinhap = $nguoinhap;
        $is_update = $product_model->update($id);
        if ($is_update) {
          $_SESSION['success'] = 'Update dữ liệu thành công';
        } else {
          $_SESSION['error'] = 'Update dữ liệu thất bại';
        }
        header('Location: index.php?controller=chitieu');
        exit();
      }
    }

    $this->content = $this->render('views/pays/update.php', [
        'pay' => $pay,
    ]);
    require_once 'views/layouts/main.php';
  }

  public function delete()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=chitieu');
      exit();
    }

    $id = $_GET['id'];
    $product_model = new Pay();
    $is_delete = $product_model->delete($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Xóa dữ liệu thành công';
    } else {
      $_SESSION['error'] = 'Xóa dữ liệu thất bại';
    }
    header('Location: index.php?controller=chitieu');
    exit();
  }
}