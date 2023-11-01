<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatModel extends Model
{
    use HasFactory;
    protected $table = 'chat';

    static public function getChat($receiver_id, $sender_id)
    {
        $query = self::select('chat.*')
                ->where(function($q) use ($receiver_id, $sender_id){
                    $q->where(function($q) use ($receiver_id, $sender_id){
                        $q->where('receiver_id', $sender_id)
                          ->where('sender_id', $receiver_id)
                          ->where('status', '>', '-1');

                    })->orWhere(function($q) use ($receiver_id, $sender_id){
                            $q->where('receiver_id', $receiver_id)
                              ->where('sender_id', $sender_id);
                        });
                })
                ->where('message', '!=', '')
                ->orderBy('id', 'desc')
                ->get();
        return $query;
    }
}
