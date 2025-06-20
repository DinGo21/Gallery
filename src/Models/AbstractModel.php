<?php

namespace App\Models;

use App\Database\Connection;

abstract class AbstractModel
{
	protected ?int $id = null;

	protected string $table;

	public function getId(): ?int
	{
		return $this->id;
	}

    /**
     * @return Model[]
     */
    public function findAll(): array 
	{
		$data = [];
		$connection = new Connection();
		$query = "SELECT * FROM $this->table";
		$result = $connection->execQuery($query);

		foreach ($result as $row) {
			$object = new $this();
			$object->id = $row['id'];
			unset($row['id']);

			foreach ($row as $key => $value) {
				$set = 'set' . ucfirst($key);
				$object->$set($value);
			}
			
			$data[] = $object;
		}

		return $data;
	}

	public function findById(int $id): ?AbstractModel
	{
		$connection = new Connection();
		$query = "SELECT * FROM $this->table WHERE id = '$id'";
		$result = $connection->execQuery($query);
		$result = $result->fetch_assoc();

		if (!$result) {
			return null;
		}

		$object = new $this();
		$object->id = $result['id'];
		unset($result['id']);

		foreach ($result as $key => $value) {
			$set = 'set' . ucfirst($key);
			$object->$set($value);
		}

		return $object;
	}

    /**
     * @return array<string,string[]>
     */
    private function prepareGetters(bool $removeId = false): array
	{
		$methods = get_class_methods(get_class($this));
		$getters = [];
		$vars = [];

		if ($removeId) {
			unset($methods[array_search('getId', $methods, true)]);
		}

		foreach ($methods as $method) {
			if (!strncmp($method, 'get', 3)) {
				$getters[] = $method;
				$vars[] = lcfirst(substr($method, 3, strlen($method) - 3));	
			}
		}

		return [
			'getters' => $getters,
			'vars' => $vars,
		];
	}

    /**
     * @return array<string,mixed>
     */
    private function prepareStoreQuery(): array
	{
		$data = $this->prepareGetters(true);
		$getters = $data['getters'];
        $vars = $data['vars'];
        $params = [];
		$query = "INSERT INTO $this->table (";
		
		foreach ($vars as $key => $var) {
			$query = $query . $var;

			if ($key != array_key_last($vars))
				$query = $query . ', ';
		}

		$query = $query . ') VALUES (';

		foreach ($getters as $key => $get) {
            $query = $query . '?';
            $params[] = $this->$get();

			if 	($key != array_key_last($getters))
				$query = $query . ', ';
        }

		$query = $query . ')';

        return [
            'query' => $query,
            'params' => $params
        ];
	}

    /**
     * @return array<string,mixed>
     */
    public function prepareUpdateQuery(): array
	{
		$data = $this->prepareGetters();
		$getters = $data['getters'];
        $vars = $data['vars'];
        $params = [];
		$query = "UPDATE $this->table SET ";

		foreach ($getters as $key => $get) {
            $query = $query . $vars[$key] . ' = ' . '?';
            $params[] = $this->$get();

			if ($key != array_key_last($getters))
				$query = $query . ', ';
		}
		
        $query = $query . " WHERE id = ?";
        $params[] = $this->id;

        return [
            'query' => $query,
            'params' => $params
        ];
	}

	public function store(): void
	{
		$connection = new Connection();
        $data = $this->prepareStoreQuery();
		$connection->execPreparedQuery($data['query'], $data['params']);

		$query = "SELECT id FROM $this->table ORDER BY id DESC LIMIT 1";
		$result = $connection->execQuery($query)->fetch_assoc();

		$this->id = $result['id'];
	}

	public function update(): void
	{
		if (!$this->id) {
			throw new \Exception('Cannot Update: Entity is not inside the database');	
		}

        $connection = new Connection();
        $data = $this->prepareUpdateQuery();
		$connection->execPreparedQuery($data['query'], $data['params']);
	}

    public function delete(): void
    {
        $connection = new Connection();
        $connection->execQuery("DELETE FROM $this->table WHERE id = '$this->id'");

        $this->id = null;
    }
}

