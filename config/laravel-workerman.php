<?php

return [

    /**
     * Listen port for SocketIO client.
     */
    'server' => [
		'port' => 8001,
	],

	/**
	 * Events dispatched when SocketIO server is running.
	 */
	'events' => [
		App\Events\SendChatMessage::class,
	],
];
