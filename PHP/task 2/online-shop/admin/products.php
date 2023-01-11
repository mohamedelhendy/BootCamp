<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="../css/style.css" rel="stylesheet" />
</head>


<?php
define('BASE_PATH', '../');
require_once('./adminheader.php');
require_once('../logic/products.php');
$products = getProducts(); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Category</th>
                <th>Price</th>
                <th>Discount</th>
                <th colspan="2">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($products as $product){ ?>
              <tr>
                <td>
                  <?= $product['id'] ?>
                </td>
                <td><?= $product['name'] ?></td>
                <td><img src="<?="/../" . $product['image_url'] ?>" width="30px"></td>
                <td>
                  <?= $product['category_name'] ?>
                </td>
                <td><?= $product['price'] ?></td>
                <td>
                  <?= $product['discount'] ?>
                </td>
                <td scope="col">
                  <a class="btn btn-success" href="products/edit.php?id=<?= $p['id'] ?>">
                    <h7 class="fa fa-pen text-white"></h7>
                  </a>
                </td>
                <td scope="col">
                  <form action="products/delete.php" method="post">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>" />
                    <button class="btn btn-danger" onclick="return confirm('Are you sure ?');">
                      <h7 class="fa fa-trash text-white"></h7>
                    </button>
                  </form>
                </td>

              </tr>
          <?php
        } ?>
            </tbody>
          </table>
        </div>
        <a class="btn btn-success" href="add_product.php">Add</a>
      </div>
      <?require_once('./adminfooter.php');?>

    </div>

  </section>
</div>