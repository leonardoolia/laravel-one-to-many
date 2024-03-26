// Preview dell'immagine nel form per aggiungere un nuovo progetto

const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png';
const imageField = document.getElementById('image');
const previewField = document.getElementById('preview');

let blobUrl;

imageField.addEventListener('change', () => {

    // controllo se ho il file 
    if(imageField.files && imageField.files[0]){
        // prendo il file
        const file = imageField.files[0];
        // preparo url temporaneo
        const blobUrl = URL.createObjectURL(file);

        // lo inserisco nel src
        previewField.src = blobUrl;
    } else{
        previewField.src = placeholder;
    }    
})

window.addEventListener('beforeunload', () =>{
    if(blobUrl) URL.revokeObjectURL(blobUrl);
})