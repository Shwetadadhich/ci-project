<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   <h1>Categories</h1>
    <a href="<?php echo base_url('Categories/add_category'); ?>" style="margin-right:20px;" class='btn btn-primary pull-right'>Add Category</a>
      <div class="content-wrapper" style="min-height: 926px;">
         <?php 
                  if(!empty($catproduct))  
                  {
                     foreach ($catproduct as $ind => $category) { 
                  ?>
                    <li style="list-style-type: none;"><a href="<?php echo base_url("Categories/allcategory/$category->cat_id");?>"><?php echo $category->title;?></a></li>
                    <li style="list-style-type: none;"><img style="width:150px; height:200px;" src="<?php echo base_url('assests/DataTables/images/'.$category->image); ?>"></li>
                  <?php 
                    }
                  }
        ?>
    </div>
</body>
</html>