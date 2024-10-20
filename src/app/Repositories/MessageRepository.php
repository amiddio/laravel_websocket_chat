<?php

namespace App\Repositories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MessageRepository
{

    public static function create(array $data): Model
    {
        return Message::create($data);
    }

    public static function getAll(): Collection
    {
        return Message::orderBy('id', 'desc')->get();
    }
}
