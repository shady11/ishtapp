<?php

namespace App\Events;

use Illuminate\Console\Command;
use App\Models\Region;

class SendChatMessage extends Command
{
    /**
     * Create a new event instance.
     *
     * @param PHPSocketIO\SocketIO $server
     * @return void
     */
    public function __construct($server)
    {
        Region::create([
            'name' => '$message',
        ]);
        $server->on('connection', function($socket) use($server) {
            $socket->on('chat message', function($message) use($server) {
                Region::create([
                    'name' => $message,
                ]);
                $server->emit('chat message', $message);

            });
            $socket->on('event', function() use($server) {
                Region::create([
                    'name' => '$message1',
                ]);
                $server->emit('chat message', '$message1');
            });
        });
    }
}
