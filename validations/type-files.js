const file = document.querySelector("input[type='file']")
const error = document.querySelectorAll(".invalid-feedback")[5]

file.addEventListener("change", checkExtensionFile)

function checkExtensionFile(event) {
    let fileName = event.target.files[0].name
    let extension = fileName.split(".").pop()
    let extensionAllowed = ["jpg", "jpeg", "png"]
    
    if (!extensionAllowed.includes(extension)) {
        error.innerHTML = "Tipo de extensão inválida. "
        const paragraph = document.createElement("p")
        paragraph.innerHTML = "Extensões permitidas: (jpg, jpeg e png)"
        error.appendChild(paragraph)
        file.value = ""
    }
}