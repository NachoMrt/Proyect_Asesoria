const tbody = document.querySelector('.tbody_container');

const getAllServicios = async () => {
    fetch('http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/servicios')
        .then(res => res.json())
        .then(data => {
            data.foreach(item => {
                const tr = document.createElement('tr');
                tr.innerHTML = `<td>${item['id_servicio']}</td>
                                <td>${item['nombre_servicio']}</td>
                                <td>${item['precio']}</td>`;
                tbody.appendChild(tr);
            })
        })
}

getAllServicios();