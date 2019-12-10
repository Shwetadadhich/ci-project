<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style type="text/css">
   .div_cat ul
   {
    margin: 0;
    padding: 0;
    list-style-type: none;
   
   }
  .ul_cat
    {
     
  list-style: none;
  padding: 0px;
  margin:0px;
    }
    .li_cat
    { 
      display: inline;
      list-style: none;
      margin-left: auto;
      margin-right: auto;
      padding: 10px;
      float: left;
    }
    
  </style>
</head>
<body>
   <h1>Categories</h1>
    <a href="<?php echo base_url('Categories/add_category'); ?>" style="margin-right:20px;" class='btn btn-primary pull-right'>Add Category</a>
      <div class="div_cat">
         <?php 
                  if(!empty($catproduct))  
                  {
                     foreach ($catproduct as $ind => $category) { 
                  ?>
                  <ul class="ul_cat">
                    <li style="list-style-type:none;"><a href="<?php echo base_url("Categories/allcategory/$category->cat_id");?>"><?php echo $category->title;?></a></li>
                    <li class="li_cat"><img class="img-thumbnail" style="width:200px; height:250px;border-radius:8px;border:3px solid #222d32;" src="<?php echo base_url('assests/DataTables/images/'.$category->image); ?>"></li>
                  </ul>
                  <?php 
                    }
                  }
        ?>
    </div>
</body>
</html>