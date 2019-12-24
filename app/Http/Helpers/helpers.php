<?php

use App\Category;

function subCategory($id)
{
	
	$category_id = [];
	$categories = Category::select('id')
					  	 ->where('main_category', $id)
					  	 ->where('status', 1)
					     ->get();

	foreach($categories as $cat){
		array_push($category_id, $cat->id);
	}

	return $category_id;

}
