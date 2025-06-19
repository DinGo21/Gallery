<?php

namespace App\Database;

use mysqli;

class Connection
{
	private mysqli $mysqli;

	private string $host;

	private string $username;

	private string $password;

	private string $database;

	public function __construct()
	{
		$this->host = $GLOBALS['env']['DB_HOST'];
		$this->username = $GLOBALS['env']['DB_USERNAME'];
		$this->password = $GLOBALS['env']['DB_PASSWORD'];
		$this->database = $GLOBALS['env']['DB_DATABASE'];
		$this->mysqli = $this->connect();
	}

	private function connect(): mysqli
	{
		$mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);

		if ($mysqli->connect_error) {
			throw new \Exception('Connection failed: '.$mysqli->connect_error);
		}

		return $mysqli;
	}

    /**
     * @param array<int,mixed> $params
     */
    public function execPreparedQuery(string $query, array $params): mixed
    {
        $stmt = $this->mysqli->prepare($query);
        $types = '';

        foreach($params as $param) {
            switch (gettype($param)) {
                case 'string':
                    $types = $types . 's';
                    break;
                case 'integer':
                    $types = $types . 'i';
                    break;
                case 'double':
                    $types = $types . 'd';
                    break;
                case 'boolean':
                    $types = $types . 'b';
                    break;
                default:
                    throw new \Exception('Unsupported type for prepared statement: ' . $param);
                    break;
            }
        }

        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

	public function execQuery(string $query): mixed
	{
		$result = $this->mysqli->query($query);	

		return $result;
	}
}

