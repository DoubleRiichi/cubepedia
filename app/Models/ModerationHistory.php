<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModerationHistory extends Model
{
    use HasFactory;
    //["ban", "unban", "lock", "unlock", "delete", "revert"])
    protected $table = "moderation_history";

    protected $fillable = [
        "action",
        "comment",
        "user_id",
        "section_id",
    ];


    
}
