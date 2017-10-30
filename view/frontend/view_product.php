<?php 
        //chi list cac danh muc co san pham thuoc danh muc do
        $arr_category = $this->model->fetch("select * from tbl_category_product where pk_category_product_id=$id");
        foreach($arr_category as $rows_category)
        {
     ?>
      <div class="wrapper-tab-collections" style="margin-top:0px;">
        <div class="tabs-container">
        <ul class="list-unstyled">
          <li><a href="#content-taba1" class="head-tabs head-tab1" data-src=".head-tab1">
          <h2><?php echo $rows_category->c_name; ?></h2>
          </a></li>
        </ul>
        </div>
        <div class="tabs-content row">
        <div id="content-taba4" class="content-tab content-tab-proindex"> 
        
          <?php 
            foreach($arr as $rows_product)
            {
         ?>
          <!-- box product -->
          <div class="col-xs-6 col-md-3 col-sm-6 ">
            <div class="product-grid" id="product-1168979">
            <div class="image"> <a href="index.php?controller=product_detail&id=<?php echo $rows_product->pk_product_id; ?>"><img src="public/upload/product/<?php echo $rows_product->c_img; ?>" title="<?php echo $rows_product->c_name; ?>" alt="<?php echo $rows_product->c_name; ?>" class="img-responsive"></a> </div>
            <div class="info">
              <h3 class="name"><a href="index.php?controller=product_detail&id=<?php echo $rows_product->pk_product_id; ?>"><?php echo $rows_product->c_name; ?></a></h3>
              <p class="price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($rows_product->c_price); ?> </span> </span> </p>
              <div class="action-btn">
              <form action="cart/add" method="post" enctype="multipart/form-data" id="product-actions-1168979">
                <a href="index.php?controller=cart&act=add&id=<?php echo $rows_product->pk_product_id; ?>" class="button">Chọn sản phẩm</a>
              </form>
              </div>
            </div>
            </div>
          </div>
          <!-- end box product --> 
        <?php } ?> 
        <div style="clear: both;"></div>
          <ul class="pagination pull-right" style="margin-top: 0px !important">
            <li><a href="#">Trang</a></li>
            <?php 
              for($i = 1; $i <= $num_page; $i++)
              {
             ?>
            <li><a href="index.php?controller=product&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
          </ul>


        </div>
        </div>
      </div>
      <?php } ?>