function spoiler() {
    let name = document.getElementById("nameext");
    let value = name.value.trim();
    if (!value)
        alert("Externally-name cannot be empty");
    else
        alert("Hello, " + value + "!\nGreetings-External");
}