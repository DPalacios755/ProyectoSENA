const mysql = require('mysql2');
const connection = require('../Config/db');

// Configurar el objeto Estudiante con métodos para interactuar con la base de datos
const Estudiante = {
    crear: (data, callback) => {
        const query = 'INSERT INTO user_estudiante (nombre, correo, documento, Colegio, rol, curso) VALUES (?, ?, ?, ?, ?, ?)';
        connection.query(query, [data.nombre, data.correo, data.documento, data.Colegio, data.rol, data.curso], callback);
    },

    obtenerTodos: (callback) => {
        const query = 'SELECT * FROM user_estudiante';
        connection.query(query, callback);
    },

    obtenerPorCorreo: (correo, callback) => {
        const query = 'SELECT * FROM user_estudiante WHERE correo = ?';
        connection.query(query, [correo], callback);
    },

    actualizar: (correo, data, callback) => {
        const query = 'UPDATE user_estudiante SET nombre = ?, documento = ?, Colegio = ?, rol = ?, curso = ? WHERE correo = ?';
        connection.query(query, [data.nombre, data.documento, data.Colegio, data.rol, data.curso, correo], callback);
    },

    eliminar: (correo, callback) => {
        const query = 'DELETE FROM user_estudiante WHERE correo = ?';
        connection.query(query, [correo], callback);
    }
};

// Exportar el objeto Estudiante
module.exports = Estudiante;
