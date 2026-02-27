const tbody = document.querySelector('.tbody_container');

const getAllServicios = async () => {
    fetch('http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/servicios')
        .then(res => res.json())
        .then(data => {
            data.forEach(item => {
                const tr = document.createElement('tr');
                tr.innerHTML = `<td>${item.id_servicio}</td>
                                <td>${item.nombre_servicio}</td>
                                <td>${item.precio}</td>
                                <td><button class="edit_serv" data-id="${item.id_servicio}">Editar</button>
                                    <button class="borrar_serv" data-id="${item.id_servicio}">Borrar</button>
                                </td>`;
                tbody.appendChild(tr);
            })
        })
}

getAllServicios();

document.addEventListener("click", (e) => {
    e.preventDefault();
    if (e.target.classList.contains("edit_serv")) {
        const editContainer = document.querySelector('.edit_container');
        const id = e.target.dataset.id;
        fetch(`http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/servicios/${id}`)
        .then()
    }
})