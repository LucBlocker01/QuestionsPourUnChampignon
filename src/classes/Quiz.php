<?php

require "questionGenerator.php";

class Quiz implements JsonSerializable {
    private int $lives;
    private array $questions;

    public function __construct($lives) {
        $this->lives = $lives;
        $this->questions = generateQuestions();
    }

    public function jsonSerialize(): mixed {
        return [
            'lives' => $this->lives,
            'questions' => $this->questions,
        ];
    }
}