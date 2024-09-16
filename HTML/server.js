const express = require('express');
const sql = require('mssql'); // MSSQL library

const app = express();

// Configure MSSQL connection
const config = {
  user: 'root',
  password: '12345678',
  server: 'localhost',
  database: 'test',
};

// Endpoint to fetch data from the database
app.get('/data', async (req, res) => {
  try {
    // Connect to the database
    await sql.connect(config);

    // Query the database
    const result = await sql.query('SELECT * FROM price');

    // Send the data as JSON
    res.json(result.recordset);
  } catch (err) {
    console.error(err);
    res.status(500).send('Error retrieving data');
  }
});

// Start the server
app.listen(3000, () => {
  console.log('Server running on port 3000');
});