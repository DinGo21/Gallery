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
		$query = "SELECT * FROM $this->table;";
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

	public function findById(int $id): AbstractModel
	{
		$connection = new Connection();
		$query = "SELECT * FROM $this->table WHERE id = '$id';";
		$result = $connection->execQuery($query);
		$result = $result->fetch_assoc();

		$object = new $this();
		$object->id = $result['id'];
		unset($result['id']);

		foreach ($result as $key => $value) {
			$set = 'set' . ucfirst($key);
			$object->$set($value);
		}

		return $object;
	}
}
