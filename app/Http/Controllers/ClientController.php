<?php
            namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest; 
use App\Http\Resources\ClientJsonResource;
use App\Http\Resources\ClientResource;use App\Models\Client;
use App\Models\Vendedor; 
use App\Services\ClientService;
class ClientController extends Controller { 
private ClientService $clientService; 
public function __construct(ClientService $clientService) {$this->clientService = $clientService; 
}
public function indexApi(Request $request) {
if ($request->isMethod("post")) {$client = $this->clientService->findAll();
return response()->json(new ClientResource($client), 200);
}
}
public function index() {
$client = $this->clientService->findAll();
return view('client.index', ['client' => $client ]);}
public function storeApi(StoreClientRequest $request) {if ($request->isMethod("post")) {$client = $this->clientService->store($request->validated());return response()->json(new ClientJsonResource($client), 200);}
}
public function editApi(Client$client ,StoreClientRequest $request) {if ($request->isMethod("post")) {$client = $this->clientService->update($client,$request->validated());return response()->json(new ClientJsonResource($client), 200);}
}
public function store(StoreClientRequest $request) {if ($request->isMethod("post")) {$client = $this->clientService->store($request->validated());}
return view('client.add');}
public function edit(Client$client ,StoreClientRequest $request) {if ($request->isMethod("post")) {$client = $this->clientService->update($client,$request->validated());}
return view('client.edit', ['dados' => $client ]);}
public function deleteApi(int $id) {if ($request->isMethod("post")) {$this->clientService->delete($id);
return response()->json((true), 200);
}
}
public function delete(int $id) {$this->clientService->delete($id);
return redirect('/index');
}
}
