<?php

namespace App\Events;

use App\Repositories\MessageRepository;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;


class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        private readonly array $data,
    ) {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('general'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'name' => $this->data['name'],
            'message' => $this->data['message'],
            'dt' => Carbon::parse($this->data['dt'])->format('Y-m-d H:i:s'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'new-message';
    }
}
