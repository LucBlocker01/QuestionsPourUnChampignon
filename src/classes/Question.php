<?php

class Question {

    private $question;
    private $answers;
    private $correctAnswer;
    private $answered;

    public function __construct($question, $answers, $correctAnswer) {
        $this->question = $question;
        $this->answers = $answers;
        $this->correctAnswer = $correctAnswer;
        $this->answered = false;
    }

    public function toArray(){
        return [
            "question" => $this->question,
            "answers" => $this->answers,
            "correctAnswer" => $this->correctAnswer
        ];
    }
}