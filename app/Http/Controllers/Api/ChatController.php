<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    private $user;

    public function __construct(Request $request)
    {
        $token = $request->header('Authorization');
        $this->user = User::where("password", $token)->firstOrFail();

        if(!$this->user) {
            return "token is not valid";
        }
    }

    public function index()
    {
        $result = [];

        if($this->user->type == 'USER') {

            $chats = Chat::where('user_id', $this->user->id)->get();

            foreach ($chats as $chat) {
                $result[] = [
                    'id' => $chat->id,
                    'user_name' => $chat->id,
                ];
            }

        } else {
            $chats = Chat::where('company_id', $this->user->id)->get();
        }
    }

    public function store(Request $request)
    {
        if($this->user->type == 'USER') {
            $chat = Chat::create([
                'user_id' => $this->user->id,
                'company_id' => $request->company_id
            ]);
        } else {
            $chat = Chat::create([
                'user_id' => $request->user_id,
                'company_id' => $this->user->id
            ]);
        }

        return 'OK';
    }
}
