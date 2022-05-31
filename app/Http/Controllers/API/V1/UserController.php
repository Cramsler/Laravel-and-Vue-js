<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\UserCrudInterface;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(private UserCrudInterface $service)
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
           return UserResource::collection($this->service->getAll());
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
    public function store(UserCreateRequest $request)
    {
        try {
            return UserResource::collection($this->service->create($request));
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
            return new UserResource($this->service->getOne($id));
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
    public function update(UserUpdateRequest $request, int $id)
    {
        try {
            return new UserResource($this->service->update($request, $id));
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
