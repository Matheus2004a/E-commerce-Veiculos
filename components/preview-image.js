const fieldFile = document.querySelector("input[type='file']")
fieldFile.addEventListener("change", previewImage)

function previewImage(event) {
    const file = event.target.files[0]
    const areaUpload = document.querySelector("#uploadPreviewTemplate")
    areaUpload.classList.replace("d-none", "d-block")

    const reader = new FileReader()

    reader.onloadend = () => {
        const img = document.querySelector("#uploadPreviewTemplate img")
        img.style.width = "50px"
        img.style.height = "50px"
        nameFile.textContent = file.name

        const formatSize = file.size / 1048576
        sizeFile.textContent = `${formatSize.toFixed(2)} MB`
        img.src = reader.result
        
        const btnClose = document.querySelector(".button-close")
        btnClose.addEventListener("click", closePreviewFile)
    
        function closePreviewFile() {
            areaUpload.classList.replace("d-block", "d-none")
            fieldFile.value = ""
        }
    }
    reader.readAsDataURL(file)
}