const { google } = require("googleapis");
const fs = require("fs");

// Cargar las credenciales
const credentials = JSON.parse(fs.readFileSync("./weighty-gasket-453316-t5-e495e335a2a6.json", "utf8"));
credentials.private_key = credentials.private_key.replace(/\\n/g, "\n");

const client = new google.auth.JWT(
  credentials.client_email,
  null,
  credentials.private_key,
  ["https://www.googleapis.com/auth/spreadsheets"]
);

// ID de la hoja de cálculo
const SPREADSHEET_ID = "1OaHYqbKk_32qZDkH9re2VdutLaOcxmNkqnOxc7CQ-Xc";

async function leerDatos() {
  try {
    const sheets = google.sheets({ version: "v4", auth: client });
    const response = await sheets.spreadsheets.values.get({
      spreadsheetId: SPREADSHEET_ID,
      range: "'Hoja 1'!A1:Z10",
    });

    console.log("Datos obtenidos:", response.data.values);
  } catch (error) {
    console.error("Error al obtener los datos:", error.message);
  }
}

// Ejecutar la función
leerDatos();
