<?php


class pokemonDAO
{
    function __construct()
    {
        $this->table = 'pokemon';
        $this->connection = new PDO('mysql:host=localhost;dbname=pokemon', 'root', '');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function fetchAll()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $this->createAll($result);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function fetch($id)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE pk = ?");
            $statement->execute([
                $id
            ]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->create($result);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function createAll($results)
    {
        $pokemons = array();
        foreach ($results as $result) {
            array_push($pokemons, $this->create($result));
        }
        return $pokemons;
    }

    function create($result)
    {
        return new pokemon(
            $result['pk'],
            $result['name'],
            $result['sprite']
        );
    }

    function store($data)
    {

        $pokemon = $this->create(['pk' => 0, 'name' => $data['name'], 'sprite' => $data['sprite']]);

        if ($pokemon) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO {$this->table} (name, sprite) VALUES (?, ?)"
                );
                $statement->execute([
                    htmlspecialchars($pokemon->__get('name')),
                    htmlspecialchars($pokemon->__get('sprite'))
                ]);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
    }

    function delete($data)
    {
        if (empty($data['id'])) {
            return false;
        }

        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE pk = ?");
            $statement->execute([
                $data['id']
            ]);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

}