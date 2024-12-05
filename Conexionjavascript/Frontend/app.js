const API_URL = 'http://localhost:3307/estudiantes';

const obtenerEstudiantes = async () => {
    try {
        console.log('Enviando solicitud para obtener estudiantes...');
        const respuesta = await fetch(API_URL);
        console.log('Estado de la respuesta:', respuesta.status);
        if (!respuesta.ok) throw new Error('Error al obtener estudiantes');
        const estudiantes = await respuesta.json();
        console.log('Estudiantes recibidos:', estudiantes);

        const tabla = document.getElementById('tablaEstudiantes');
        tabla.innerHTML = '';

        estudiantes.forEach((estudiante) => {
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${estudiante.nombre}</td>
                <td>${estudiante.correo}</td>
                <td>${estudiante.documento}</td>
                <td>${estudiante.Colegio}</td>
                <td>${estudiante.rol}</td>
                <td>${estudiante.curso}</td>
                <td>
                    <button onclick='eliminarEstudiante("${estudiante.correo}")'>Eliminar</button>
                    <button onclick='editarEstudiante("${estudiante.correo}", "${estudiante.nombre}", "${estudiante.documento}", "${estudiante.Colegio}", "${estudiante.rol}", "${estudiante.curso}")'>Editar</button>
                </td>
            `;
            tabla.appendChild(fila);
        });
    } catch (error) {
        console.error('Error al obtener estudiantes:', error);
    }
};

const agregarEstudiante = async (estudiante) => {
    try {
        console.log('Enviando solicitud para agregar estudiante...');
        await fetch(API_URL, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(estudiante),
        });
        obtenerEstudiantes();
    } catch (error) {
        console.error('Error al agregar estudiante:', error);
    }
};

const eliminarEstudiante = async (correo) => {
    try {
        console.log(`Enviando solicitud para eliminar estudiante con correo: ${correo}`);
        await fetch(`${API_URL}/${correo}`, {
            method: 'DELETE',
        });
        obtenerEstudiantes();
    } catch (error) {
        console.error('Error al eliminar estudiante:', error);
    }
};

const editarEstudiante = (correo, nombre, documento, Colegio, rol, curso) => {
    document.getElementById('nombre').value = nombre;
    document.getElementById('correo').value = correo;
    document.getElementById('documento').value = documento;
    document.getElementById('Colegio').value = Colegio;
    document.getElementById('rol').value = rol;
    document.getElementById('curso').value = curso;
};

const form = document.getElementById('formEstudiante');
form.onsubmit = async (event) => {
    event.preventDefault();
    const correo = document.getElementById('correo').value;

    const estudiante = {
        nombre: document.getElementById('nombre').value,
        correo: document.getElementById('correo').value,
        documento: document.getElementById('documento').value,
        Colegio: document.getElementById('Colegio').value,
        rol: document.getElementById('rol').value,
        curso: document.getElementById('curso').value,
    };

    if (correo) {
        // Si hay un correo, actualizar el estudiante
        try {
            console.log(`Enviando solicitud para actualizar estudiante con correo: ${correo}`);
            await fetch(`${API_URL}/${correo}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(estudiante),
            });
            obtenerEstudiantes();
        } catch (error) {
            console.error('Error al actualizar estudiante:', error);
        }
    } else {
        // Si no hay correo, agregar un nuevo estudiante
        agregarEstudiante(estudiante);
    }

    form.reset();
};

const manejaSubmit = (event) => {
    event.preventDefault();

    const nuevoEstudiante = {
        nombre: document.getElementById('nombre').value,
        correo: document.getElementById('correo').value,
        documento: document.getElementById('documento').value,
        Colegio: document.getElementById('Colegio').value,
        rol: document.getElementById('rol').value,
        curso: document.getElementById('curso').value,
    };

    agregarEstudiante(nuevoEstudiante);
    event.target.reset();
};

document.getElementById('formEstudiante').addEventListener('submit', manejaSubmit);

obtenerEstudiantes();
