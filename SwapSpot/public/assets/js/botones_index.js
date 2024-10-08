document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.boton-noti').addEventListener('click', function() {
        var notiDiv = document.querySelector('.container-noti');
        if (notiDiv.style.display === 'none' || notiDiv.style.display === '') {
            notiDiv.style.display = 'grid';
        } else {
            notiDiv.style.display = 'none';
        }
    });
});
/* cerrar sesion */
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.boton-cerrar').addEventListener('click', function() {
        var notiDiv = document.querySelector('.container-cerrar-sesion');
        if (notiDiv.style.display === 'none' || notiDiv.style.display === '') {
            notiDiv.style.display = 'grid';
        } else {
            notiDiv.style.display = 'none';
        }
    });
});
