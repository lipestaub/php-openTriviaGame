<?php
    require_once __DIR__ . '/../config/Connect.php';
    
    class GameDAO
    {
        private $db;

        public function __construct()
        {
            $this->db = Connection::getConnection();
        }

        public function createGame(Game $game)
        {
            $query = "INSERT INTO game (user_id) VALUES (:user_id);";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":user_id", $game->getUserId());
            $stmt->execute();
        }

        public function getLastGameByUserId(int $userId)
        {
            $query = "SELECT * FROM game WHERE user_id = :user_id ORDER BY id DESC LIMIT 1;";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":user_id", $userId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll()[0];
        }
    }
?>