<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest;
use App\Http\Resources\UserJsonResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Vendedor;
use App\Services\UserService;

class UserController extends Controller {

    private UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function indexApi(int $client_id) {
        $user = $this->userService->findAllByClient($client_id);
        return response()->json(new UserResource($user), 200);
    }

    public function index() {
        $user = $this->userService->findAll();
        return view('user.index', ['user' => $user]);
    }

    public function storeApi(Request $request) {
        #if ($request->isMethod("post")) {
            $user = $this->userService->store($request->all());
            return response()->json(($user), 200);
        #}
    }

    public function editApi(int $id, Request $request) {
        #if ($request->isMethod("post")) {
            $user = $this->userService->update($id, $request->all());
            return response()->json(($user), 200);
        #}
    }

    public function store(StoreUserRequest $request) {
        if ($request->isMethod("post")) {
            $user = $this->userService->store($request->validated());
        }
        return view('user.add');
    }

    public function edit(User $user, StoreUserRequest $request) {
        if ($request->isMethod("post")) {
            $user = $this->userService->update($user, $request->validated());
        }
        return view('user.edit', ['dados' => $user]);
    }

    public function removerApi(int $id) {
        //if ($request->isMethod("post")) {
            $this->userService->delete($id);
            return response()->json((true), 200);
        //}
    }

    public function delete(int $id) {
        $this->userService->delete($id);
        return redirect('/index');
    }

}
