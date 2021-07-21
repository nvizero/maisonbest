<?php

/**
 * Page
 *
 */
class Book extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
//        	'content' => 'required',
			"title"=>"required",
	];

	// protected $softDelete = true;
	protected $talbe = "books";

	protected $fillable = [	'title' ,'parent_id','content',
							'file_name',  'image','image_facebook',
							'cdate',
							'created_at','updated_at','deleted_at'];

  // public function cate(){
  //     // return $this->belongsTo('categories');
  // }

}
