
<!DOCTYPE html>
<html>
<body>
<nav>Acceso a API-REST</nav>
<ul>
    <li><a href="#asesores">Asesores</a></li>
    <li><a href="#clientes">Clientes</a></li>
     <li><a href="#facturas">Clientes</a></li>
      <li><a href="#servicios">Clientes</a></li>
    <li></li>
</ul>
<!-- GET -->
<h1 id="asesores"> Lista de de asesores </h1>
<ul id="lista"></ul>
<script>
fetch('http://localhost/Certificado/API_REST/REST/public/index.php/usuarios')
  .then(response => response.json())
  .then(data => {
    const lista = document.getElementById('lista');
    data.forEach(usuario => {
      lista.innerHTML += `<li>${usuario.nombre}</li>`;
    });
  });
</script>


<!-- POST -->
<form id="formulario">
  <input type="text" name="nombre" placeholder="Nombre">
  <input type="text" name="email" placeholder="tu email@com">
  <input type="text" name="password" placeholder="tu contraseña">
  <button type="submit"> Guardar </button>
</form>
<script>
document.getElementById("formulario").addEventListener("submit", function(e){
  e.preventDefault();

  fetch('public/index.php/usuarios', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre: this.nombre.value,
      email: this.email.value,
      password: this.password.value
    })
  });
});
</script>


<!-- UPDATE -->
<h2> Actualizar usuario </h2>
<form id="formUpdate">
  <input type="number" name="id" placeholder="ID usuario" required>
  <input type="text" name="nombre" placeholder="Nuevo nombre" required>
  <input type="text" name="email" placeholder="tu email@com">
  <input type="text" name="password" placeholder="tu contraseña">
  <button type="submit"> Actualizar </button>
</form>
<script>
document.getElementById("formUpdate").addEventListener("submit", function(e){
  e.preventDefault();

  const id = this.id.value;

  fetch(`/Certificado/API_REST/REST/public/index.php/usuarios/${id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre: this.nombre.value,
       email: this.email.value,
      password: this.password.value
    })
  })
  .then(response => response.json())
  .then(data => {
    console.log("Usuario actualizado:", data);
    alert("Usuario actualizado correctamente");
  })
  .catch(error => console.error("Error:", error));
});
</script>


<!-- DELETE -->
<h2> Eliminar usuario </h2>
<input type="number" id="idEliminar" placeholder="ID usuario">
<button onclick="eliminarUsuario()"> Eliminar </button>
<script>
function eliminarUsuario() {

  const id = document.getElementById("idEliminar").value;

  fetch(`http://localhost/Certificado/API_REST/REST/public/index.php/usuarios/${id}`, {
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


</body>
</html>
