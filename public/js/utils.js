//Fonction de récupération des questions depuis le générateur php
async function quizFetcher() {
    response = await fetch("http://localhost:8000/src/quizCreator.php").catch(
        error => console.error("Erreur :", error)
    )
    return await response.json()
}

//Fonction qui vide le stockage
function clearStorage() {
    localStorage.removeItem("currentQuestion")
    localStorage.removeItem("questions")
    localStorage.removeItem("lives")
}