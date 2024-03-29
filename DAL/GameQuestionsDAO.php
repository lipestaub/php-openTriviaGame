<?php
    require_once __DIR__ . '/../config/Connect.php';
    
    class GameQuestionsDAO
    {
        private $db;

        public function __construct()
        {
            $this->db = Connection::getConnection();
        }

        public function createGameQuestions(GameQuestions $gameQuestions)
        {
            $query = "INSERT INTO game_questions (game_id, question_id, user_answer, is_correct) VALUES (:game_id, :question_id, :user_answer, :is_correct);";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":game_id", $gameQuestions->getGameId());
            $stmt->bindValue(":question_id", $gameQuestions->getQuestionId());
            $stmt->bindValue(":user_answer", $gameQuestions->getUserAnswer());
            $stmt->bindValue(":is_correct", $gameQuestions->getIsCorrect(), PDO::PARAM_BOOL);
            $stmt->execute();
        }

        public function getCorrectAnswersCountByGameId(int $gameId)
        {
            $query = "SELECT * FROM game_questions WHERE game_id = :game_id AND is_correct = true;";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":game_id", $gameId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return count($stmt->fetchAll());
        }
    }
?>