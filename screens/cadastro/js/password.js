const inputPassword = document.querySelectorAll("fieldset .input-group input")[2]
const iconEye = document.querySelectorAll("fieldset .input-group-text i")[0]

iconEye.addEventListener("click", changeVisiblePassword)

function changeVisiblePassword() {
    let inputIsPassword = inputPassword.type === "password"

    inputIsPassword ? inputPassword.type = "text" : inputPassword.type = "password"

    let eyeIsVisible = iconEye.className === "far fa-eye-slash"

    eyeIsVisible ? iconEye.className = "far fa-eye" : iconEye.className = "far fa-eye-slash"
}