<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LibraryModel extends Model
{
    //
    // use HasFactory;
    protected $tabel ='library_tabel';

    protected $fillable = ['title', 'author', 'category','date','file_path', 'is_hidden'];

}
