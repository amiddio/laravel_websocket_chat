<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Http\Requests\StoreChatRequest;
use App\Repositories\MessageRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class ChatController extends Controller
{

    public function index(): View
    {
        $messages = MessageRepository::getAll();

        return view('chat', compact('messages'));
    }

    public function store(StoreChatRequest $request): JsonResponse
    {
        $validated = $request->validated();
        Arr::set($validated, 'dt', Carbon::now());

        MessageRepository::create($validated);

        NewMessage::dispatch($validated);

        return response()->json(['success' => true]);
    }
}
