<?php

require "questionGenerator.php";

class Quiz implements JsonSerializable {
    private int $lives;
    private array $questions;
    private string $difficulty;

    public function __construct() {
        $this->difficulty = $_POST["difficulty"];
        $this->lives = $_POST["lives"];
        $this->questions = generateQuestions($_POST["difficulty"]);
    }

    public function jsonSerialize(): mixed {
        return [
            'lives' => $this->lives,
            'questions' => $this->questions,
            'difficulty' => $this->difficulty
        ];
    }
}