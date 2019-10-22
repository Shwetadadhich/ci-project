<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   <h1>Categories</h1>
    <a href="<?php echo base_url('Categories/add_category'); ?>" style="margin-right:20px;" class='btn btn-primary pull-right'>Add Category</a>
      <div class="container" style="min-height: 926px;">
         <?php 
                  if(!empty($catproduct))  
                  {
                     foreach ($catproduct as $ind => $category) { 
                  ?>
                    <li style="list-style-type:none;"><a href="<?php echo base_url("Categories/allcategory/$category->cat_id");?>"><?php echo $category->title;?></a></li>
                    <li style="list-style-type:none;float:left;padding:20px;"><img class="img-thumbnail" style="width:200px; height:250px;border-radius:8px;border:3px solid #222d32;" src="<?php echo base_url('assests/DataTables/images/'.$category->image); ?>"></li>
                  <?php 
                    }
                  }
        ?>
    </div>
</body>
</html>