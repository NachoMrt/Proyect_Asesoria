
<!DOCTYPE html>
<html>
    <style>
        nav ul {
            display:flex;
            flex-direction:row;
            gap: 20px;
        }
    </style>
<body>
<nav>Acceso a API-REST</nav>
<ul>
    <li><a href="#asesores">Asesores</a></li>
    <li><a href="#clientes">Clientes</a></li>
     <li><a href="#facturas">Clientes</a></li>
      <li><a href="#servicios">Clientes</a></li>
    <li></li>
</ul>
</nav>
<!-- GET -->
<h1 id="asesores"> Lista de de asesores </h1>
<ul id="lista"></ul>
<script>
fetch('http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/asesores')
  .then(response => response.json())
  .then(data => {
    const lista = document.getElementById('lista');
    data.forEach(asesor => {
      lista.innerHTML += `<li>${asesor.nombre}</li>`;
    });
  });
</script>


<!-- POST -->
<form id="formulario">
  <input type="text" name="nombre" placeholder="Nombre">
  <input type="text" name="especialidad" placeholder="especialidad">
  <input type="text" name="email" placeholder="tu email">
  <button type="submit"> Guardar </button>
</form>
<script>
document.getElementById("formulario").addEventListener("submit", function(e){
  e.preventDefault();

  fetch('http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/asesores', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre: this.nombre.value,
      especialidad: this.email.value,
      email: this.password.value
    })
  });
});
</script>


<!-- UPDATE -->
<h2> Actualizar asesor </h2>
<form id="formUpdate">
    <input type="number" name="id_asesor" placeholder="ID asesor" required>
    <input type="text" name="nombre" placeholder="Nuevo nombre" required>
  <input type="text" name="especialidad" placeholder="tu especialidad" required>
  <input type="text" name="email" placeholder="tu email">
  <button type="submit"> Actualizar </button>
</form>
<script>
document.getElementById("formUpdate").addEventListener("submit", function(e){
  e.preventDefault();

  const id_asesor = this.id_asesor.value;

  fetch(`http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/asesores/${id_asesor}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre: this.nombre.value,
      especialidad: this.especialidad.value,
      email: this.email.value
    })
  })
  .then(response => response.json())
  .then(data => {
    console.log("Asesor actualizado:", data);
    alert("Asesor actualizado correctamente");
  })
  .catch(error => console.error("Error:", error));
});
</script>


<!-- DELETE -->
<h2> Eliminar asesor </h2>
<input type="number" id="idEliminar" placeholder="ID asesor">
<button onclick="eliminarAsesor()"> Eliminar </button>
<script>
function eliminarAsesor() {

  const id_asesor = document.getElementById("idEliminar").value;

  fetch(`http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/asesores/${id_asesor}`, {
    method: 'DELETE'
  })
  .then(response => response.json())
  .then(data => {
    console.log("Usuario eliminado:", data);
    alert("Usuario eliminado correctamente");
  })
  .catch(error => console.error("Error:", error));
}
</script>
<!-- GET -->
<h1 id="clientes"> Lista de de clientes </h1>
<ul id="lista"></ul>
<script>
fetch('http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/clientes')
  .then(response => response.json())
  .then(data => {
    const lista = document.getElementById('lista');
    data.forEach(cliente => {
      lista.innerHTML += `<li>${cliente.nombre}</li>`;
    });
  });
</script>


<!-- POST -->
<form id="formulario">
  <input type="text" name="nombre" placeholder="Nombre">
  <input type="text" name="dnie" placeholder="dnie">
  <input type="text" name="email" placeholder="tu email">
   <input type="text" name="telefono" placeholder="telefono">
  <button type="submit"> Guardar </button>
</form>
<script>
document.getElementById("formulario").addEventListener("submit", function(e){
  e.preventDefault();

  fetch('http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/clientes', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre: this.nombre.value,
      dnie: this.dnie.value,
      email: this.email.value,
      telefono: this.telefono.value
    })
  });
});
</script>


<!-- UPDATE -->
<h2> Actualizar cliente</h2>
<form id="formUpdate">
    <input type="number" name="id_cliente" placeholder="ID cliente" required>
    <input type="text" name="nombre" placeholder="Nuevo nombre" required>
  <input type="text" name="dnie" placeholder="tu dnie" required>
  <input type="text" name="email" placeholder="tu email">
  <input type="text" name="telefono" placeholder="tu telefono">
  <button type="submit"> Actualizar </button>
</form>
<script>
document.getElementById("formUpdate").addEventListener("submit", function(e){
  e.preventDefault();

  const id_cliente = this.id_cliente.value;

  fetch(`http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/clientes/${id_cliente}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre: this.nombre.value,
      dnie: this.dnie.value,
      email: this.email.value,
      telefono: this.telefono.value
    })
  })
  .then(response => response.json())
  .then(data => {
    console.log("Cliente actualizado:", data);
    alert("Cliente actualizado correctamente");
  })
  .catch(error => console.error("Error:", error));
});
</script>


<!-- DELETE -->
<h2> Eliminar cliente </h2>
<input type="number" id="idEliminar" placeholder="ID cliente">
<button onclick="eliminarCliente()"> Eliminar </button>
<script>
function eliminarCliente() {

  const id_cliente = document.getElementById("idEliminar").value;

  fetch(`http://localhost/Certificado/Proyect_Asesoria/Parte_2_API_REST/public/index.php/clientes/${id_cliente}`, {
    method: 'DELETE'
  })
  .then(response => response.json())
  .then(data => {
    console.log("Cliente eliminado:", data);
    alert("Cliente eliminado correctamente");
  })
  .catch(error => console.error("Error:", error));
}
</script>

</body>
</html>
