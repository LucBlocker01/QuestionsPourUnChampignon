<?php

require "Quiz.php";

$quiz = new Quiz(3);

echo json_encode($quiz);