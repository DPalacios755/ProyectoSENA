const express = require('express');
const router = express.Router();
const estudianteController = require('../Controller/estudiantesControlador');

router.post('/', estudianteController.crearEstudiante);
router.get('/', estudianteController.obtenerEstudiantes);
router.get('/:correo', estudianteController.obtenerEstudiantePorCorreo);
router.put('/:correo', estudianteController.actualizarEstudiante);
router.delete('/:correo', estudianteController.eliminarEstudiante);

module.exports = router;
