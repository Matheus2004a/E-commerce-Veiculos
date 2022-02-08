const inputPassword = document.querySelectorAll("fieldset .input-group input")[1]
const iconEye = document.querySelector("fieldset .input-group-text .fa-eye")

iconEye.addEventListener("click", changeVisiblePassword)

function changeVisiblePassword() {
    let inputIsPassword = inputPassword.type === "password"

    inputIsPassword ? inputPassword.type = "text" : inputPassword.type = "password"

    let eyeIsVisible = iconEye.className === "far fa-eye-slash"

    eyeIsVisible ? iconEye.className = "far fa-eye" : iconEye.className = "far fa-eye-slash"
}