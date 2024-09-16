<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditHistory extends Model
{
    use HasFactory;

    protected $table = "edit_history";

    protected $fillable = [
        "old_text",
        "new_text",
        "section_id",
        "user_id"
    ];
}
