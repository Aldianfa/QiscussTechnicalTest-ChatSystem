<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</head>

<body>
    <div class="chat-container">
        <div class="chat-header">
            <img src="{{ $conversation['room']['image_url'] }}" alt="Product" class="product-image">
            <div class="header-info">
                <div class="room-name">{{ $conversation['room']['name'] }}</div>
                <div class="room-id">ID: #{{ $conversation['room']['id'] }}</div>
            </div>
            <button class="participants-badge" onclick="openModal()">
                {{ count($conversation['room']['participant']) }} participants
            </button>
        </div>

        <div id="participantModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Participants</h3>
                    <button class="close-btn" onclick="closeModal()">&times;</button>
                </div>
                <div class="modal-body">
                    @foreach ($conversation['room']['participant'] as $participant)
                        <div class="participant-item">
                            <div class="participant-avatar">
                                {{ strtoupper(substr($participant['name'], 0, 1)) }}
                            </div>
                            <div class="participant-info">
                                <div class="participant-name">{{ $participant['name'] }}</div>
                                <div class="participant-email">{{ $participant['id'] }}</div>
                            </div>
                            <div class="participant-role">
                                @if ($participant['role'] == 0)
                                    <span class="role-badge admin">Admin</span>
                                @elseif($participant['role'] == 1)
                                    <span class="role-badge agent">Agent</span>
                                @else
                                    <span class="role-badge customer">Customer</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="chat-body">
            @foreach ($conversation['comments'] as $comment)
                @php
                    $isMe = $comment['sender'] === 'customer@mail.com';
                    $sender = collect($conversation['room']['participant'])->firstWhere('id', $comment['sender']);
                @endphp
                <div class="message {{ $isMe ? 'me' : 'other' }}">
                    <div class="message-content">
                        <div class="sender-name">{{ $sender['name'] ?? 'Unknown' }}</div>
                        <div class="bubble">
                            @if ($comment['type'] === 'text')
                                {{ $comment['message'] }}
                            @elseif($comment['type'] === 'image')
                                <img src="{{ $comment['message'] }}" alt="Image">
                            @elseif($comment['type'] === 'video')
                                <video controls>
                                    <source src="{{ $comment['message'] }}">
                                </video>
                            @elseif($comment['type'] === 'pdf')
                                <a href="{{ $comment['message'] }}" target="_blank" class="pdf-link">
                                    <div class="pdf-icon">PDF</div>
                                    <div class="pdf-info">
                                        <div class="pdf-title">Document</div>
                                        <div class="pdf-subtitle">Click to view</div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('js/chat.js') }}"></script>
</body>

</html>
