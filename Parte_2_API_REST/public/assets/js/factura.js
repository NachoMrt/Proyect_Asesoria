const URL_FACTURA = 'http://localhost/Dinamica_grupos/Asesoria/Proyect_Asesoria/Parte_2_API_REST/public/index.php/facturas';

export function cargarFacturas() {
    fetch(URL_FACTURA)
        .then(res => res.json())
        .then(data => {
            const lista = document.getElementById('lista-facturas');
            lista.innerHTML = data.map(f => `
                <tr>
                    <td>#${f.id_factura}</td>
                    <td>ID Cliente: ${f.id_cliente}</td>
                    <td><strong>${f.costo}€</strong></td>
                    <td><button onclick="eliminarFactura(${f.id_factura})" class="btn btn-sm btn-danger">Borrar</button></td>
                </tr>`).join('');
        });
}

window.eliminarFactura = (id) => {
    fetch(`${URL_FACTURA}/${id}`, { method: 'DELETE' })
        .then(() => { alert("Factura anulada"); cargarFacturas(); });
};