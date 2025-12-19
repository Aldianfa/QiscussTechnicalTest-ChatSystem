<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoomParticipant extends Model
{
    protected $fillable = [
        'chat_room_id',
        'user_id',
    ];

    protected $primaryKey = 'id';

    protected $table = 'chat_room_participants';

    public function chatRoom()
    {
        return $this->belongsTo(ChatRoom::class, 'chat_room_id');
    }
}
