<?php  namespace App\Services; use App\Models\Client; class ClientService {  private Client $client;public function __construct(Client $client)
    {
        $this->client = $client;
    }public function store(array $data){ $this->client->name = $data['name'];
 $this->client->telefone = $data['telefone'];
 $this->client->email = $data['email'];
 $this->client->save();
 return $this->client;
}public function update(Client $client, array $data){ $client->name = $data['name'];
 $client->telefone = $data['telefone'];
 $client->email = $data['email'];
 $client->save();
return $client;
}public function findAll()
    {
        return $this->client->all();
    }public function findOne(int $id)
    {
        return $this->client->find($id);
    }public function delete(int $id)
    {
        return $this->client->find($id)->delete();
    }  }