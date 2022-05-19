<?php

namespace App\Services;

use App\Http\Requests\ChatCreateRequest;
use App\Http\Requests\ChatUpdateRequest;
use App\Interfaces\ChatCrudInterface;
use App\Models\Chat;

class ChatService extends BaseService implements ChatCrudInterface
{

    public function getAll()
    {
        return Chat::paginate(self::PAGINATE_COUNT);
    }

    public function getOne(int $id)
    {
        return Chat::findOrFail($id);
    }

    public function create(ChatCreateRequest $request)
    {
        return Chat::create($request->post());
    }

    public function update(ChatUpdateRequest $request, int $id)
    {
        $chat = $this->getOne($id);

        return $chat->update($request->post());
    }

    public function delete(int $id)
    {
        return Chat::destroy($id);
    }
}
