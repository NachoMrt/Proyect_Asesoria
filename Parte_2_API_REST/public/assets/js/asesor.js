const URL_ASESOR = 'http://localhost/Dinamica_grupos/Asesoria/Proyect_Asesoria/Parte_2_API_REST/public/index.php/asesores';

export function cargarAsesores() {
    fetch(URL_ASESOR)
        .then(res => res.json())
        .then(data => {
            const lista = document.getElementById('lista-asesores');
            lista.innerHTML = data.map(a => `
                <li class="list-group-item d-flex justify-content-between">
                    ${a.nombre} (${a.especialidad})
                    <button onclick="eliminarAsesor(${a.id_asesor})" class="btn btn-danger btn-sm">Eliminar</button>
                </li>`).join('');
        });
}

window.eliminarAsesor = (id) => {
    fetch(`${URL_ASESOR}/${id}`, { method: 'DELETE' })
        .then(() => { alert("Asesor eliminado"); cargarAsesores(); });
};