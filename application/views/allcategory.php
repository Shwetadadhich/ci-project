<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   <h1>categories</h1>
      <div class="content-wrapper" style="min-height: 926px;">
         <?php 
                  if(!empty($catproduct))  
                  {
                     foreach ($catproduct as $ind => $category) { 
                  ?>
                    <li><a href="<?php echo base_url("Categories/allcategory/$category->cat_id");?>"><i class="fa fa-circle-o"></i><?php echo $category->title;?></a></li>
                  <?php 
                    }
                  }
        ?>
    </div>
</body>
</html>