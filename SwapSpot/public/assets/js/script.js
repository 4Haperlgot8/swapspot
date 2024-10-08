const loginBtn = document.getElementById('loginBtn');
const registerBtn = document.getElementById('registerBtn');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');

loginBtn.addEventListener('click', () => {
    loginForm.classList.add('active');
    registerForm.classList.remove('active');
    loginBtn.classList.add('active');
    registerBtn.classList.remove('active');
});

registerBtn.addEventListener('click', () => {
    registerForm.classList.add('active');
    loginForm.classList.remove('active');
    registerBtn.classList.add('active');
    loginBtn.classList.remove('active');
});


/*Img del formulario de publicar*/ 
function previewImages(event) {
    const container = document.getElementById('image-preview-container');
    container.innerHTML = ""; // Limpiar el contenedor antes de mostrar nuevas imágenes
    const files = event.target.files;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const imgElement = document.createElement('img');
            imgElement.src = e.target.result;
            imgElement.style.maxWidth = '30%';
            imgElement.style.height = 'center';
            imgElement.style.marginBottom = '10px';
            container.appendChild(imgElement);
        }

        reader.readAsDataURL(file);
    }
}


