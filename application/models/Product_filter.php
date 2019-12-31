<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Product_filter extends CI_Model
 {
    function fetch_filter_type($type)
	 {
	  $this->db->distinct();
	  $this->db->select($type);
	  $this->db->from('product');
	  $this->db->where('status', '0');
	  return $this->db->get();
	 }

	 function make_query($minimum_price, $maximum_price,$size,$color)
	 {
	  $q = "
	  SELECT * FROM product 
	  WHERE status = '0	' 
	  ";

	  if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
	  {
	   $q .= "
	    AND price BETWEEN '".$minimum_price."' AND '".$maximum_price."'
	   ";
	  }
	    if(isset($size))
		    {
			   $size_filter = implode("','", $size);
			   $q .= "
			    AND size IN('".$size_filter."')
			   ";
			}
	    if(isset($color))
		    {
			   $color_filter = implode("','", $color);
			   $q .= "
			    AND color IN('".$color_filter."')
			   ";
			}
			return $q;
     }

     function count_all($minimum_price, $maximum_price,$size,$color)
		 {
		  $q = $this->make_query($minimum_price, $maximum_price,$size,$color);
		  $data = $this->db->query($q);
		  return $data->num_rows();
		 }

	function fetch_data($limit, $start, $minimum_price, $maximum_price,$size,$color)
    {
		  $q = $this->make_query($minimum_price, $maximum_price,$size,$color);
          
          $start = 1;
		  $q .= ' LIMIT '.$start.', ' . $limit;
  
		  $data = $this->db->query($q);

		 $output = '';

		  if($data->num_rows() > 0)
		  {
		   foreach($data->result_array() as $row)
		   {
		    $output .= '
		    <div class="col-sm-4">
		    <div style="border:2px solid #ccc; border-radius:50px; padding:16px; margin-bottom:16px; height:390px;">
		    <img src="'.base_url().'/assests/DataTables/images/'. $row["image"] .'" class="img-responsive" style="border-radius: 15px;">
		    <p style="margin-bottom:16px; padding-top:10px; text-align:center;"><strong><a href="'.base_url("Estore/product_detail/").'?id='.$row['id'].'">'. $row["title"] .'</a></strong></p>
		    <h4 class="text-danger" style="text-align: center;">'. $row["price"] .'</h4>
		    <p style="text-align: center;">Color : '. $row["color"].'<br />
		       Size : '. $row["size"] .'<br /> </p>
		       </div>
		    </div>
		    ';
		   }
		  }
		  else
		  {
		   $output = '<h3>No Data Found</h3>';
		  }
		  return $output;
		 }

public function getRows($id = '')
     {
        $this->db->select('*');
        $this->db->from('product');
        $res = $this->db->where('status', '1');
       if($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else
        {
            $this->db->order_by('title', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }

        return !empty($result)?$result:false;
    }

    public function order_product($data)
    {
       $this->db->insert('product_order', $data);
    }

    /*public function */
}

?>