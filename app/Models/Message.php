<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'chat_room_id',
        'sender_id',
        'type',
        'content',
    ];

    protected $primaryKey = 'id';

    protected $table = 'messages';

    public function chatRoom()
    {
        return $this->belongsTo(ChatRoom::class, 'chat_room_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
