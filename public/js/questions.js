
fetch("http://localhost:8000/src/questionGenerator.php").then(
    response => response.json()
).then(
    question => {
        console.log(question.question.question)
        document.getElementById("question").innerHTML = question.question.question
        document.getElementById("answer1").innerHTML = question.question.answers[0]
        document.getElementById("answer2").innerHTML = question.question.answers[1]
        document.getElementById("answer3").innerHTML = question.question.answers[2]
        document.getElementById("answer4").innerHTML = question.question.answers[3]
    }
).catch(
    error => console.error("Erreur :", error)
)