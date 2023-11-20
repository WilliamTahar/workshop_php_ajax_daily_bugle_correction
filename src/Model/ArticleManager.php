<?php

namespace App\Model;

class ArticleManager extends AbstractManager
{
    public const TABLE = 'Article';

    public function selectRandomOne(): array
    {
        $statement = $this->pdo->query("SELECT * FROM " . self::TABLE . " ORDER BY RAND() LIMIT 1");
        return $statement->fetch();
    }

    public function searchArticles(string $search): array
    {
        $query = "SELECT id, title FROM " . self::TABLE . " WHERE title LIKE :search";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':search', "%$search%", \PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
}
