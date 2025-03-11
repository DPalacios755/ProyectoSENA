const express = require("express");
const bodyParser = require("body-parser");
const cors = require("cors");
const { google } = require("googleapis");
const fs = require("fs");
const path = require("path");

const app = express();
app.use(cors());
app.use(bodyParser.json());

// Servir archivos estáticos desde "public"
app.use(express.static(path.join(__dirname, "public")));

// Cargar credenciales de Google Sheets
const credentials = JSON.parse(fs.readFileSync("./weighty-gasket-453316-t5-e495e335a2a6.json", "utf8"));
credentials.private_key = credentials.private_key.replace(/\\n/g, "\n");

const client = new google.auth.JWT(
  credentials.client_email,
  null,
  credentials.private_key,
  ["https://www.googleapis.com/auth/spreadsheets"]
);

const SPREADSHEET_ID = "1OaHYqbKk_32qZDkH9re2VdutLaOcxmNkqnOxc7CQ-Xc";

// Función para obtener datos de una hoja específica
async function obtenerDatosDeHoja(hoja) {
  try {
    const sheets = google.sheets({ version: "v4", auth: client });
    const response = await sheets.spreadsheets.values.get({
      spreadsheetId: SPREADSHEET_ID,
      range: `${hoja}!D:E`, // D: Correo, E: Documento
    });
    return response.data.values || [];
  } catch (error) {
    console.error(`Error al obtener datos de ${hoja}:`, error);
    return [];
  }
}

// Ruta de autenticación
app.post("/login", async (req, res) => {
  const { email, documento } = req.body;

  try {
    // Verificar en cada hoja de roles
    const roles = ["Administradores", "Docentes", "Estudiantes"];
    for (const role of roles) {
      const datos = await obtenerDatosDeHoja(role);
      const usuario = datos.find(row => row[0] === email && row[1] === documento);

      if (usuario) {
        if (role === "Administradores") {
          return res.json({ success: true, role: "admin", message: "Bienvenido Administrador" });
        } else {
          return res.json({ success: true, role: role.toLowerCase(), message: "Conexión a la red exitosa." });
        }
      }
    }

    // Si no se encontró en ninguna hoja
    return res.json({ success: false, message: "Credenciales incorrectas" });

  } catch (error) {
    console.error("Error en la autenticación:", error);
    return res.status(500).json({ success: false, message: "Error en el servidor" });
  }
});

// Iniciar servidor
app.listen(3000, () => {
  console.log("Servidor corriendo en http://localhost:3000");
});
