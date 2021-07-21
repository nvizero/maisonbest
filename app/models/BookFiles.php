<?php

/**
 * Page
 *
 */
class BookFiles extends \Eloquent {

	// Add your validation rules here
	public static $rules = [		    		
        	'book_title' => 'required',
			"file"=>"required",
	];

	// protected $softDelete = true;
	protected $talbe = "book_files";

	protected $fillable = ['book_id', 'file_pic', 'content', 'file', 'book_title', 'created_at', 'updated_at', 'deleted_at'];

  // public function cate(){
  //     // return $this->belongsTo('categories');
  // }

}
