const express = require('express');
const cors = require('cors');
const estudianteRoutes = require('../routes/estudiantesroutes');

const app = express();

app.use(cors());
app.use(express.json());
app.use('/estudiantes', estudianteRoutes);

const PORT = 3307;
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
