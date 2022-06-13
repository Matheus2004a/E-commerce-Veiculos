function closeModal() {
    let modal = document.getElementById("myModal");
    modal.style.display = "none";
    // valor == "sim" ? window.open("")
}


function showModal() {
    let modal = document.getElementById("myModal");
    let card_modal = document.getElementsByClassName("modal-content")[0];
    modal.style.display = "block";
}