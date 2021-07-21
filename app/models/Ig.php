<?php

class Ig extends \Eloquent {
    protected $table = 'ig';
	public static $rules = [
	    'name' => 'required',
        'url' => 'required'
	];

	protected $softDelete = true;

	protected $fillable = ['name','pr' ,'image' , 'url' , 'created_at', 'updated_at' ];
}
