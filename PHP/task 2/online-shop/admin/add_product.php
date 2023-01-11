<?php
define('BASE_PATH', '../');
require_once('../logic/categories.php');
$categories = getCategories();
require_once('../logic/colors.php');
$colors = getColors();
require_once('../logic/sizes.php');
$sizes = getSizes();
?>

<link href="../css/style.css" rel="stylesheet" />
<section class="content">
<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
  <div class="container-fluid">
        <div class="row px-xl-5">
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Product Name</label>
                            <input  type="text" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Product Name</label>
                            <input  type="text" class="form-control">
                          </div>
                          <div class="col-md-6 form-group">
                            <label>Description</label>
                            <input  type="message" class="form-control">
                          </div>
                          <div class="col-md-6 form-group">
                            <label>price</label>
                            <input  type="text" class="form-control">
                          </div>
                          <div class="col-md-6 form-group">
                            <label>Discount</label>
                            <input  type="text" class="form-control">
                          </div>
                          <div class="col-md-6 form-group">
                            <label>BarCode</label>
                            <input  type="text" class="form-control">
                          </div>
                          <div class="col-md-6 form-group">
                            <label>Color</label>
                            <select name="color_id" class="form-control">
                              <?php
                                foreach ($colors as $color) {?>
                                  <option ><?=$color['name'] ?></option>';
                                  <?php
                                }
                                ?>
                              </select>
                          </div>
                          <div class="col-md-6 form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                <?php
                                foreach ($categories as $category) {?>
                                  <option><?=$category['name'] ?></option>';
                                  <?php
                                }
                                ?>
                              </select>
                          </div>
                          <div class="col-md-6 form-group">
                            <label>Recent</label>
                            <input type="checkbox" name="is_recent"  />
                          </div>
                          <div class="col-md-6 form-group">
                            <label>Featured</label>
                            <input type="checkbox" name="is_featured"  />
                          </div>
                        </div>
                        <button class="btn btn-success">Add</button>
         
    </div>
</form>
  </section>
