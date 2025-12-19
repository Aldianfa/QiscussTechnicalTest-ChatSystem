<?php 

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;

class ChatRepository
{
    public function getChatData(): array 
    {
        $json = Storage::disk('public')->get('chat.json');
        return json_decode($json, true);
    }
}


?>