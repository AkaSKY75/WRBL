<?php
Class Forms extends CI_Model{
   	//get the fields in the form
	function get_fields($fields){
		$post=array();
		foreach ($fields as $key=>$value){
			if ($this->input->post($key)!="")
				if ($value)
					$post[$key]=$this->input->post($value);
				else
					$post[$key]=$this->input->post($key);
		}
		return $post;
	}
	//get the fields in the form with same names as database
	function get_fields_original($fields){
		$post=array();
		foreach ($fields as $key){
			$post[$key]=$this->input->post($key);
		}
		return $post;
	}
	
	function make_seo_url($title){
		$seo_url= str_replace("&", "", $title);
		// Delete any chars but letters, numbers, spaces and _, -
		$seo_url = preg_replace("/[^a-zA-Z0-9 _-]/", "", $seo_url);
		// Make the string lowercase
		$seo_url = strtolower($seo_url);
		// Delete double spaces
		$seo_url = preg_replace("/[ ]+/", " ", $seo_url);
		// Replace spaces with replacement
		$seo_url = str_replace(" ", "-", $seo_url);
		
		//check for duplicates
		if ($this->check_if_duplicate("info", "seo_url", $seo_url))
			$seo_url=$this->make_seo_url($title."-1");
			elseif ($this->check_if_duplicate("projects", "project_slug", $seo_url))				
			$seo_url=$this->make_seo_url($title."-1");
			elseif ($this->check_if_duplicate("project_categories", "category_slug", $seo_url))				
			$seo_url=$this->make_seo_url($title."-1");
		
		
		return $seo_url; 
	}
	
	function check_if_duplicate($table, $field, $value){
		$dup= $this->db->get_where($table, array($field => $value))->row();		
		if (sizeof($dup))
			return true;
		return false;
		
	}
	
	function resize($new_name, $upload_path, $new_upload_path, $new_width, $new_height){		
		$config2['image_library'] = 'gd2';
		$config2['source_image'] = $upload_path.$new_name;
		$config2['new_image'] = $new_upload_path.$new_name;
		$config2['maintain_ratio'] = TRUE;
		$config2['create_thumb'] = TRUE;
		$config2['overwrite'] = TRUE;
		$config2['thumb_marker'] = '';
		$config2['width'] = $new_width;
		$config2['height'] = $new_height;		
		$config2['file_name'] = $new_name;
        $this->image_lib->initialize($config2);
		
		
		if (!$this->image_lib->resize()){
			echo $this->image_lib->display_errors();
			exit;
		}
		$this->image_lib->clear();
	}
	
	function crop($new_name, $upload_path, $new_upload_path, $new_width, $new_height){		
		$this->load->library('image_lib'); 
		$image_config['image_library'] = 'gd2';
		$image_config['source_image'] = $upload_path.$new_name;
		$image_config['new_image'] = $new_upload_path.$new_name;
		$image_config['width'] = $new_width;
		$image_config['height'] = $new_height;
		$image_config['x_axis'] = 0;
		$image_config['y_axis'] = 0;
		$image_config['quality'] = "100%";
		$image_config['maintain_ratio'] = FALSE;
		
		$this->image_lib->clear();
		$this->image_lib->initialize($image_config); 
		
		if (!$this->image_lib->crop()){
			return false;
		}else{
			return true;
		}
	}
	
	
	function update_products($product_type, $thing){
		//1 carry - e direct in products, 2 gear, 3 vanity, 4 boss, 6 - scanner ,9- guide
		
		$product=array();
		switch ($product_type){
			case 1: { // carry - ok 16.05.2016
				$obj=$this->db->query("select c.id_carry, c.carry_type, cls.class_name, rl.role_name, lvl.level_name, c.price, lvl.level_min, lvl.level_max
										from carry c 
										left join classes cls on c.id_class=cls.id_class
										left join roles rl on c.id_role=rl.id_role
										left join levels  lvl on c.id_level=lvl.id_level
										where id_carry='".$thing."'")->row();
				
				$product["product_name"]=ucfirst($obj->carry_type)." carry for ".$obj->role_name." ".$obj->class_name." - level ".$obj->level_name." (".$obj->level_min." - ".$obj->level_max.")";
				$product["product_details"]=ucfirst($obj->carry_type)." carry for ".$obj->role_name." ".$obj->class_name." - level ".$obj->level_name." (".$obj->level_min." - ".$obj->level_max.")";			
				$product["price"]=$obj->price;
				$product["product_photo"]="";
				$product["id_setting"]=$thing;
				$product["id_type"]=$product_type;
				
				$exista=$this->db->query("select id_product from products where id_type=".$product_type." and id_setting='".$thing."'")->result();
				if (sizeof($exista)){
					if($this->db->update("products",$product,array('id_type' =>$product_type, "id_setting"=>$thing)))
					break;
				}	else {					
					if($this->db->insert("products",$product))
					break;
				}
			}
			case 2: { // items - ok 16.05.2016
				$obj=$this->db->query("select * from items where id_item='".$thing."'")->row();
				$product["product_name"]=$obj->item_name;
				$product["product_details"]=$obj->item_name;
				$product["price"]=$obj->item_price;
				$product["product_photo"]="./images/uploads/items/".$obj->item_photo;
				$product["id_setting"]=$thing;
				$product["id_type"]=$product_type;
				
				$exista=$this->db->query("select id_product from products where id_type=".$product_type." and id_setting='".$thing."'")->result();
				if (sizeof($exista)){
					if($this->db->update("products",$product,array('id_type' =>$product_type, "id_setting"=>$thing)))
					break;
				}	else {					
					if($this->db->insert("products",$product))
					break;
				}
				break;
			}
			case 3: { // vanity - ok 16.05.2016
				/// thing e numele setarii, nu id_ul
				$obj=$this->db->query("select s.*, o.object_name, o.object 
					from values_settings s
					left join objects o on s.name=o.object 
					where s.name='".$thing."' and s.page='vanity'")->row();
				if ($obj){
					$product["product_name"]=$obj->object_name;
					$product["product_details"]=$obj->object_name;
					$product["price"]=$obj->value;				
					$product["product_photo"]="./images/vanity/".$obj->object.".png";
					$product["id_type"]=$product_type;	
					$product["id_setting"]=$obj->id_value;		
					$exista=$this->db->query("select id_product from products where id_type='".$product_type."' and id_setting='".$obj->id_value."'")->result();
					if (sizeof($exista)){
						if($this->db->update("products",$product,array('id_type' =>$product_type, "id_setting"=>$obj->id_value)))
						break;
					}	else {					
						if($this->db->insert("products",$product))
						break;
					}
				}
			break;
			}
			case 4: { // boss - ok 16.05.2016
				$obj=$this->db->query("select * from bosses where id_boss='".$thing."'")->row();
				
				$product["product_name"]="Boss kill - ".$obj->boss_name;
				$product["product_details"]="Boss kill - ".$obj->boss_name;			
				$product["price"]=$obj->boss_price;
				$product["id_setting"]=$thing;
				$product["product_photo"]="./images/uploads/bosses/".$obj->boss_img1;
				$product["id_type"]=4;
				
				$exista=$this->db->query("select id_product from products where id_type=4 and id_setting='".$thing."'")->result();
				if (sizeof($exista)){
					if($this->db->update("products",$product,array('id_type' =>4, "id_setting"=>$thing)))
					break;
				}	else {					
					if($this->db->insert("products",$product))
					break;
				}
			}
			case 5: { // boosting - ok 16.05.2016
				$obj=$this->db->query("select classes.class_name, blevels.level_min, boosting.*, blevels.level_max, blevels.level_name, roles.role_name
										from boosting
										left join classes on classes.id_class=boosting.id_class
										left join roles on roles.id_role=boosting.id_role 
										left join blevels on  blevels.id_blevel=boosting.id_blevel 
										where id_boosting='".$thing."'")->row();
				
				$product["product_name"]="Boosting  for ".$obj->role_name." ".$obj->class_name." - arena type: ".$obj->arena_type."x".$obj->arena_type."";
				$product["product_details"]="Boosting  for ".$obj->role_name." ".$obj->class_name." arena type: ".$obj->arena_type."x".$obj->arena_type."";			
				$product["price"]=$obj->price;
				$product["product_photo"]="";
				$product["id_setting"]=$thing;
				$product["id_type"]=5;
				
				$exista=$this->db->query("select id_product from products where id_type=5 and id_setting='".$thing."'")->result();
				if (sizeof($exista)){
					if($this->db->update("products",$product,array('id_type' =>5, "id_setting"=>$thing)))
					break;
				}	else {					
					if($this->db->insert("products",$product))
					break;
				}
			}
			case 9:{
				// guides
				$obj=$this->db->query("select * from guides where id_guide='".$thing."'")->row();
				$product["product_name"]=$obj->guide_title;
				$product["product_details"]=$obj->guide_content;
				$product["price"]=$obj->guide_price;
				$product["product_photo"]="./images/guides/".$obj->guide_photo;
				$product["id_setting"]=$thing;
				$product["id_type"]=$product_type;
				
				$exista=$this->db->query("select id_product from products where id_type=".$product_type." and id_setting='".$thing."'")->result();
				if (sizeof($exista)){
					if($this->db->update("products",$product,array('id_type' =>$product_type, "id_setting"=>$thing)))
					break;
				}	else {					
					if($this->db->insert("products",$product))
					break;
				}
				break;}
		}
		
		
		
	}
	
}