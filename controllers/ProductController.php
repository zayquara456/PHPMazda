<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/hoadon.php';
require_once 'models/Pagination.php';

class ProductController extends Controller
{
  public function index()
  {
    $product_model = new Product();

    //lấy tổng số bản ghi đang có trong bảng products
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
        'controller' => 'product',
        'action' => 'index',
        'full_mode' => false,
        'query_additional' => $query_additional,
        'page' => isset($_GET['page']) ? $_GET['page'] : 1
    ];
    $products = $product_model->getAllPagination($arr_params);
    $pagination = new Pagination($arr_params);

    $pages = $pagination->getPagination();


    $this->content = $this->render('views/products/index.php', [
        'products' => $products,
        'pages' => $pages,
    ]);
    require_once 'views/layouts/main.php';
  }

  public function create()
  {
    //xử lý submit form
    if (isset($_POST['submit'])) {
      $tensp = $_POST['tensp'];
      $hang = $_POST['hang'];
      $mauhienco = $_POST['mauhienco'];
      $soghe = $_POST['soghe'];
      $giatien = $_POST['giatien'];
      //xử lý validate


      //nếu ko có lỗi thì tiến hành save dữ liệu
      if (empty($this->error)) {


        //save dữ liệu vào bảng products
        $product_model = new Product();
        $product_model->tensp = $tensp;
        $product_model->hang = $hang;
        $product_model->mauhienco = $mauhienco;
        $product_model->soghe = $soghe;
        $product_model->giatien = $giatien;
        $is_insert = $product_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Insert dữ liệu thành công';
        } else {
          $_SESSION['error'] = 'Insert dữ liệu thất bại';
        }
        header('Location: index.php?controller=product');
        exit();
      }
    }

    //lấy danh sách category đang có trên hệ thống để phục vụ cho search
    $category_model = new Bill();
    $categories = $category_model->getAll();

    $this->content = $this->render('views/products/create.php', [
        'categories' => $categories
    ]);
    require_once 'views/layouts/main.php';
  }

  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=product');
      exit();
    }

    $masp = $_GET['id'];
    $product_model = new Product();
    $product = $product_model->getById($masp);

    $this->content = $this->render('views/products/detail.php', [
        'product' => $product
    ]);
    require_once 'views/layouts/main.php';
  }

  public function update()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=product');
      exit();
    }

	$id = $_GET['id'];
    $product_model = new Product();
    $product = $product_model->getById($id);
    //xử lý submit form
    if (isset($_POST['submit'])) {
      $tensp = $_POST['tensp'];
      $hang = $_POST['hang'];
      $mauhienco = $_POST['mauhienco'];
      $soghe = $_POST['soghe'];
      $giatien = $_POST['giatien'];
      //xử lý validate
      if (empty($tensp)) {
        $this->error = 'Không được để trống tên sản phẩm';
      }

      //nếu ko có lỗi thì tiến hành save dữ liệu
      if (empty($this->error)) {

        //save dữ liệu vào bảng products
        $product_model->tensp = $tensp;
        $product_model->hang = $hang;
        $product_model->mauhienco = $mauhienco;
        $product_model->soghe = $soghe;
        $product_model->giatien = $giatien;

        $is_update = $product_model->update($id);
        if ($is_update) {
          $_SESSION['success'] = 'Update dữ liệu thành công';
        } else {
          $_SESSION['error'] = 'Update dữ liệu thất bại';
        }
        header('Location: index.php?controller=product');
        exit();
      }
    }

    $this->content = $this->render('views/products/update.php', [
        'product' => $product,
    ]);
    require_once 'views/layouts/main.php';
  }

  public function delete()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=product');
      exit();
    }

    $id = $_GET['id'];
    $product_model = new Product();
    $is_delete = $product_model->delete($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Xóa dữ liệu thành công';
    } else {
      $_SESSION['error'] = 'Xóa dữ liệu thất bại';
    }
    header('Location: index.php?controller=product');
    exit();
  }
}