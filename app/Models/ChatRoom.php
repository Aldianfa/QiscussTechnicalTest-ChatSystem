<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $fillable = [
        'name',
        'image_url',
        'is_group',
    ];

    protected $primaryKey = 'id';

    protected $table = 'chat_rooms';

    public function participants()
    {
        return $this->hasMany(ChatRoomParticipant::class, 'chat_room_id');
    }
}
