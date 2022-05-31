<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageCreateRequest;
use App\Http\Requests\MessageUpdateRequest;
use App\Http\Resources\MessageResource;
use App\Interfaces\MessageCrudInterface;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    public function __construct(private MessageCrudInterface $service)
    {
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        try {
            return MessageResource::collection($this->service->getAll());
        } catch (\Exception $e) {
            $massage = ['errors' => $e->getMessage()];

            return response(json_encode($massage), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function store(MessageCreateRequest $request)
    {
        try {
            return $this->service->create($request);
        } catch (\Exception $e) {
            $massage = ['errors' => $e->getMessage()];

            return response(json_encode($massage), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     *
     */
    public function show(int $id)
    {
        try {
            return new MessageResource($this->service->getOne($id));
        } catch (\Exception $e) {
            $massage = ['errors' => $e->getMessage()];

            return response(json_encode($massage), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function update(MessageUpdateRequest $request, int $id)
    {
        try {
            return new MessageResource($this->service->update($request, $id));
        } catch (\Exception $e) {
            $massage = ['errors' => $e->getMessage()];

            return response(json_encode($massage), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(int $id)
    {
        try {
            return $this->service->delete($id);
        } catch (\Exception $e) {
            $massage = ['errors' => $e->getMessage()];

            return response(json_encode($massage), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
