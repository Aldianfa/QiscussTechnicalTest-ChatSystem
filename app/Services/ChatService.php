<?php 

namespace App\Services;

use App\Repositories\ChatRepository;

class ChatService
{
    protected ChatRepository $chatRepository;

    public function __construct(ChatRepository $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }

    public function getConversation(): Array
    {
        $data = $this->chatRepository->getChatData();
        return $data['results'][0];
    }
}


?>