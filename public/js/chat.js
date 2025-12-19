
function openModal() {
    document.getElementById('participantModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('participantModal').style.display = 'none';
}

window.onclick = function (event) {
    const modal = document.getElementById('participantModal');
    if (event.target == modal) {
        closeModal();
    }
}