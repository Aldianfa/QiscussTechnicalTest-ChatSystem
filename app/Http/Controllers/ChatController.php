<?php

namespace App\Http\Controllers;

use App\Services\ChatService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    protected ChatService $chatService;

    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    public function index()
    {
        $conversation = $this->chatService->getConversation();
        return view('chat.index', compact('conversation'));
    }
}
