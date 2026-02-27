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
            .then(res => res.json())
            .then(data => {
                editContainer.innerHTML = `
                <h3>Editar Servicio</h3>
                <form id="editForm">
                    <input type="hidden" id="edit_id" value="${data.id_servicio}">

                    <label>Nombre:</label>
                    <input type="text" id="edit_nombre" value="${data.nombre_servicio}" required>

                    <label>Precio:</label>
                    <input type="number" id="edit_precio" value="${data.precio}" required>

                    <button type="submit">Actualizar</button>
                </form>
            `;
            })
    }
})

document.addEventListener("submit", async (e) => {

    if (e.target.id === "editForm") {
        e.preventDefault();

        const id = document.querySelector("#edit_id").value;
        const nombre = document.querySelector("#edit_nombre").value;
        const precio = document.querySelector("#edit_precio").value;

        fetch(
            `http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/servicios/${id}`,
            {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    nombre_servicio: nombre,
                    precio: precio
                })
            }
        )
        .then(res => res.json())

        document.querySelector('.edit_container').innerHTML = "";
        tbody.innerHTML = "";
        getAllServicios();
    }
});
// no actualiza data!!!!