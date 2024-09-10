document.getElementById('formProducto').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    fetch(this.action, {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
        } else {
            alert(data.mensaje);
            this.reset();
        }
    })
    .catch(error => console.error('Error:', error));
});
