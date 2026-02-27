const URL_SERVICIO = 'http://localhost/Dinamica_grupos/Asesoria/Proyect_Asesoria/Parte_2_API_REST/public/index.php/servicios';

export function cargarServicios() {
    fetch(URL_SERVICIO)
        .then(res => res.json())
        .then(data => {
            const lista = document.querySelector('.tbody_container');
            lista.innerHTML = data.map(s => `
                <tr>
                    <td>${s.id_servicio}</td>
                    <td>${s.nombre_servicio}</td>
                    <td>${s.precio}€</td>
                    <td><button onclick="eliminarServicio(${s.id_servicio})" class="btn btn-danger btn-sm">X</button></td>
                </tr>`).join('');
        });
}

window.eliminarServicio = (id) => {
    fetch(`${URL_SERVICIO}/${id}`, { method: 'DELETE' })
        .then(() => { alert("Servicio quitado"); cargarServicios(); });
};