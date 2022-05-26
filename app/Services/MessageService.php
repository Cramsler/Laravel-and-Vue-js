<?php

namespace App\Services;

use App\Http\Requests\MessageCreateRequest;
use App\Http\Requests\MessageUpdateRequest;
use App\Interfaces\MessageCrudInterface;
use App\Models\Message;

class MessageService extends BaseService implements MessageCrudInterface
{
    public function getAll()
    {
        return Message::paginate(self::PAGINATE_COUNT);
    }

    public function getOne(int $id)
    {
        return Message::findOrFail($id);
    }

    public function create(MessageCreateRequest $request)
    {
        return Message::create($request->post());
    }

    public function update(MessageUpdateRequest $request, int $id)
    {
        $user = $this->getOne($id);

        return $user->update($request->post());
    }

    public function delete(int $id)
    {
        return Message::destroy($id);
    }
}
