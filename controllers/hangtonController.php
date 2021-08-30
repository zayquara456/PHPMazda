<?php
require_once 'controllers/Controller.php';
require_once 'models/hangton.php';
require_once 'models/Pagination.php';

class HangTonController extends Controller
{
  public function index()
  {
    $product_model = new Storage();

    //lấy tổng số bản ghi đang có trong bảng hangton
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
        'controller' => 'hangton',
        'action' => 'index',
        'full_mode' => false,
        'query_additional' => $query_additional,
        'page' => isset($_GET['page']) ? $_GET['page'] : 1
    ];
    $storages = $product_model->getAllPagination($arr_params);
    $pagination = new Pagination($arr_params);

    $pages = $pagination->getPagination();


    $this->content = $this->render('views/storages/index.php', [
        'storages' => $storages,
        'pages' => $pages,
    ]);
    require_once 'views/layouts/main.php';
  }

  public function create()
  {
    if (isset($_POST['submit'])) {
      $masp= $_POST['masp'];

      if (empty($this->error)) {
        $storage_model = new Storage();
        $storage_model->masp = $masp;
      
        $is_insert = $storage_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Thêm mới thành công';
        } else {
          $_SESSION['error'] = 'Thêm mới thất bại';
        }
        header('Location: index.php?controller=hangton&action=index');
        exit();
      }

    }

    //lấy nội dung view create.php
    $this->content = $this->render('views/storages/create.php');
    //gọi layout để nhúng nội dung view create vừa lấy đc
    require_once 'views/layouts/main.php';
  } 

  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=chitieu&action=index');
      exit();
    }

    $maht = $_GET['id'];
    $product_model = new Pay();
    $storage = $product_model->getPayById($maht);

    $this->content = $this->render('views/storages/detail.php', [
        'storage' => $storage
    ]);
    require_once 'views/layouts/main.php';
  }


}