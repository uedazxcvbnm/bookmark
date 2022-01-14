<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadImage extends Model
{
    use HasFactory;

    // public function post()
    // {
    //     return $this->belongsTo(Post::class);
    // }

    protected $table = "upload_image";
    protected $fillable = ["file_name","file_path"];
}
