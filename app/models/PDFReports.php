<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait; // <-- This is required for soft deletes

class PDFReports extends Eloquent
{
	use SoftDeletingTrait;
	
	protected $table = 'pdfreports'; // <-- table name

	protected $fillable = ['title','description','file','uploaded_by']; // <-- That can be filled

}