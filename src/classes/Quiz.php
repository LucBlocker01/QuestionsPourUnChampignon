<?php

require "questionGenerator.php";

class Quiz implements JsonSerializable {
    private int $lives;
    private array $questions;
    private string $difficulty;

    public function __construct($lives) {
        $this->difficulty = "easy";
        $this->lives = $lives;
        $this->questions = generateQuestions("easy");
    }

    public function jsonSerialize(): mixed {
        return [
            'lives' => $this->lives,
            'questions' => $this->questions,
            'difficulty' => $this->difficulty
        ];
    }
}