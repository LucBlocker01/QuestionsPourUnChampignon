<?php

class Question {

    private $question;
    private $answers;
    private $correctAnswer;

    public function __construct($question, $answers, $correctAnswer) {
        $this->question = $question;
        $this->answers = $answers;
        $this->correctAnswer = $correctAnswer;
    }
}