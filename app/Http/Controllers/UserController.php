<?php
            namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest; 
use App\Http\Resources\UserJsonResource;
use App\Http\Resources\UserResource;use App\Models\User;
use App\Models\Vendedor; 
use App\Services\UserService;
class UserController extends Controller { 
private UserService $userService; 
public function __construct(UserService $userService) {$this->userService = $userService; 
}
public function indexApi(Request $request) {
if ($request->isMethod("post")) {$user = $this->userService->findAll();
return response()->json(new UserResource($user), 200);
}
}
public function index() {
$user = $this->userService->findAll();
return view('user.index', ['user' => $user ]);}
public function storeApi(StoreUserRequest $request) {if ($request->isMethod("post")) {$user = $this->userService->store($request->validated());return response()->json(new UserJsonResource($user), 200);}
}
public function editApi(User$user ,StoreUserRequest $request) {if ($request->isMethod("post")) {$user = $this->userService->update($user,$request->validated());return response()->json(new UserJsonResource($user), 200);}
}
public function store(StoreUserRequest $request) {if ($request->isMethod("post")) {$user = $this->userService->store($request->validated());}
return view('user.add');}
public function edit(User$user ,StoreUserRequest $request) {if ($request->isMethod("post")) {$user = $this->userService->update($user,$request->validated());}
return view('user.edit', ['dados' => $user ]);}
public function deleteApi(int $id) {if ($request->isMethod("post")) {$this->userService->delete($id);
return response()->json((true), 200);
}
}
public function delete(int $id) {$this->userService->delete($id);
return redirect('/index');
}
}
