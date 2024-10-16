
fetch("http://localhost:8000/src/questionGenerator.php").then(
    response => response.json()
).then(
    question => console.log(question)
).catch(
    error => console.error("Erreur :", error)
)