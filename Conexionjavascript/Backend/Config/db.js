const mysql = require('mysql2');

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'proyectosena'
});

connection.connect((err) => {
    if (err) {
        console.error('Error al conectar a MySQL: ', err);
        return;
    }
    console.log('Conectado a la base de datos');
});

module.exports = connection;
