# Technical Test – Chat System (Laravel)

## Overview
This project is a technical test implementation of a **chatting system** built with **Laravel**, following a **Service–Repository pattern**. The system supports **single chat and group chat**, multiple message types (text, image, video, PDF), and a responsive web interface.

The implementation intentionally uses **dummy JSON data** to focus on system design, architecture, and UI behavior rather than real-time infrastructure.

---

## Tech Stack
- **Laravel** (MVC Framework)
- **Blade** (Templating)
- **Service – Repository Pattern**
- **Vanilla JavaScript** (UI behavior)
- **HTML5 / CSS3** (Responsive layout)

---

## 1. Chat System Architecture Diagram

**High-level Flow:**

User → Controller → Service → Repository → Data Source (JSON / Database)

**Key Concepts:**
- One chat room can contain **many participants**
- One chat room can have **many messages**
- Messages belong to a **single sender**
- Chat room can be **group** or **single** based on participant count

---

## 2. Entity Relationship Diagram (ERD)

**Entities:**

### users
- id
- email
- name
- role (admin / agent / customer)

### chat_rooms
- id
- name
- image_url
- type (single / group)

### chat_room_participants
- id
- chat_room_id
- user_id

### messages
- id
- chat_room_id
- sender_id
- type (text / image / video / pdf)
- payload (string / JSON)
- created_at

**Relationships:**
- chat_rooms hasMany messages
- chat_rooms belongsToMany users
- users hasMany messages

---

## 3. Data Source (Dummy JSON)

Chat data is loaded from:
```
storage/app/chat.json
```

This approach was chosen to:
- Keep the project lightweight
- Focus on rendering logic and architecture
- Avoid unnecessary setup for real-time services

---

## 4. Supported Message Types

The system supports multiple message types using a flexible JSON payload.

### Example Extended JSON
```json
{
  "id": 885520,
  "type": "video",
  "message": "https://storage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4",
  "sender": "customer@mail.com"
}
```

Supported types:
- `text`
- `image`
- `video`
- `pdf`

---

## 5. Chat UI Features

- Responsive chat layout (desktop & mobile)
- Message bubble alignment based on sender
- Media preview for images and videos
- External PDF link preview
- Participant modal popup

The participant list is displayed in a modal to keep the main chat interface clean and focused.

---

## 6. Code Structure

```
app/
├── Http/Controllers/
│   └── ChatController.php
├── Services/
│   └── ChatService.php
├── Repositories/
│   └── ChatRepository.php

public/
├── css/
│   ├── chat.css
│   └── modal.css
├── js/
│   └── chat.js

resources/views/
└── chat.blade.php
```

---

## 7. Service–Repository Pattern Explanation

- **Controller**: Handles HTTP request & response
- **Service**: Contains business logic
- **Repository**: Handles data retrieval (JSON / DB)

This separation improves:
- Testability
- Maintainability
- Scalability

---

## 8. How to Run

1. Clone repository
2. Run `composer install`
3. Copy `.env.example` to `.env`
4. Place `chat.json` inside `storage/app`
5. Run:
```bash
php artisan serve
```
6. Open browser at:
```
http://localhost:8000/chat
```

---

## Notes
This implementation focuses on **architecture clarity**, **clean UI**, and **best practices**, rather than real-time messaging.

---

# Interviewer Q&A Simulation

### Q1: Why did you use a Service–Repository pattern?
**A:** To separate concerns clearly. Controller handles HTTP, Service handles business logic, and Repository handles data access. This makes the code easier to maintain and scale.

---

### Q2: Why use JSON instead of a database?
**A:** The test focuses on system design and UI rendering. JSON allows demonstrating the architecture without additional setup complexity.

---

### Q3: How would you scale this to real-time chat?
**A:** By replacing the JSON repository with a database-backed repository, adding WebSockets (Laravel Echo + Pusher / Socket.IO), and queueing message events.

---

### Q4: How do you handle multiple message types?
**A:** Using a `type` field and flexible payload. The UI renders content conditionally based on the message type.

---

### Q5: Why not use a frontend framework?
**A:** For this test, Blade + vanilla JS keeps the solution simple, transparent, and easy to review.

---

### Q6: How would you secure file uploads?
**A:** Validate MIME types, limit file size, store files in private storage, and serve them via signed URLs.

---

### Q7: How do you differentiate group chat and single chat?
**A:** By checking the participant count. More than two participants indicates a group chat.

---

## Final Note
This project demonstrates a clean, scalable foundation for a chat system using Laravel best practices.

