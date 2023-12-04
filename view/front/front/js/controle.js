function validateForm() {
    var password = document.getElementById("password").value;
    if (password.length < 4) {
        alert("Le mot de passe doit contenir au moins 4 caractères.");
        return false;
    }

    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;

    if (!checkUniqueNameAndSurname(nom, prenom)) {
        alert("you already have an account .");
        return false;
    }

    var email = document.getElementById("email").value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Veuillez entrer une adresse e-mail valide.");
        return false;
    }

    return true;
}

function checkUniqueNameAndSurname(nom, prenom) {
    // check unique name 
    return true;
}
