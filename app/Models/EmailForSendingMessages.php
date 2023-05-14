<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailForSendingMessages extends Model
{
    use HasFactory;
    protected $table = 'emails_for_sending_messages';
    protected $fillable = [
      'email',
      'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
