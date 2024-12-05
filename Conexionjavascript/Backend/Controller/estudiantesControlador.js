const Estudiante = require('../Models/estudiantesModels');

exports.crearEstudiante = (req, res) => {
    Estudiante.crear(req.body, (error, results) => {
        if (error) {
            return res.status(500).send('Error al crear al Estudiante');
        }
        res.status(201).send(`Estudiante creado con correo: ${req.body.correo}`);
    });
};

exports.obtenerEstudiantes = (req, res) => {
    Estudiante.obtenerTodos((error, results) => {
        if (error) {
            return res.status(500).send('Error al obtener Estudiante');
        }
        res.json(results);
    });
};

exports.obtenerEstudiantePorCorreo = (req, res) => {
    const correo = req.params.correo;
    Estudiante.obtenerPorCorreo(correo, (error, results) => {
        if (error) {
            return res.status(500).send('Error al obtener el Estudiante');
        }
        if (results.length === 0) {
            return res.status(404).send('Estudiante no encontrado');
        }
        res.json(results[0]);
    });
};

exports.actualizarEstudiante = (req, res) => {
    const correo = req.params.correo;
    Estudiante.actualizar(correo, req.body, (error, results) => {
        if (error) {
            return res.status(500).send('Error al actualizar el Estudiante');
        }
        if (results.affectedRows === 0) {
            return res.status(404).send('Estudiante no encontrado');
        }
        res.send('Estudiante actualizado correctamente');
    });
};

exports.eliminarEstudiante = (req, res) => {
    const correo = req.params.correo;
    Estudiante.eliminar(correo, (error, results) => {
        if (error) {
            return res.status(500).send('Error al eliminar el Estudiante');
        }
        if (results.affectedRows === 0) {
            return res.status(404).send('Estudiante no encontrado');
        }
        res.send('Estudiante eliminado');
    });
};
