<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table = "article";
    protected $primaryKey = "id";

    use HasFactory;

    protected $fillable = [
        "title",
        "intro",
        "locked",
        "user_id",
        "editor_id",
    ];
}
