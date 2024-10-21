<?php

require "Question.php";
require "questionGenerator.php";

class Quiz {
    private int $lives;
    private array $questions;

    public function __construct($lives) {
        $this->lives = $lives;
        $this->questions = generateQuestions();
    }
}