<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Interfaces\CrudInterface;
use App\Services\UserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(private CrudInterface $service)
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return UserResource|string
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
