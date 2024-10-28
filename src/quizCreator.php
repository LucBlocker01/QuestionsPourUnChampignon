<?php

require "classes/Quiz.php";

$quiz = new Quiz();

echo json_encode($quiz);