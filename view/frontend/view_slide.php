<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
          <!-- Indicators -->
          <ol class="carousel-indicators">
          <?php 
            $n=0;
            foreach($arr as $rows)
            {
              $n++;
           ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $n-1; ?>" class="<?php echo $n==1?"active":""; ?>"></li>
            <?php } ?>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
          <?php 
            $n=0;
            foreach($arr as $rows)
            {
              $n++;
           ?>
            <div class="item <?php echo $n==1?"active":""; ?>"> <img src="<?php echo $rows->c_img; ?>" alt="<?php echo $rows->c_name; ?>"> </div>
          <?php } ?>
          </div>

          <!-- Left and right controls --> 
          </div>