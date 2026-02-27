const URL_CLIENTE = 'http://localhost/Dinamica_grupos/Asesoria/Proyect_Asesoria/Parte_2_API_REST/public/index.php/clientes';

export function cargarClientes() {
    fetch(URL_CLIENTE)
        .then(res => res.json())
        .then(data => {
            const lista = document.getElementById('lista-clientes');
            lista.innerHTML = data.map(c => `
                <li class="list-group-item d-flex justify-content-between">
                    ${c.nombre} - ${c.email}
                    <button onclick="eliminarCliente(${c.id_cliente})" class="btn btn-danger btn-sm">Eliminar</button>
                </li>`).join('');
        });
}

window.eliminarCliente = (id) => {
    fetch(`${URL_CLIENTE}/${id}`, { method: 'DELETE' })
        .then(() => { alert("Cliente eliminado"); cargarClientes(); });
};