const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const path = require('path');

const app = express();
app.use(bodyParser.urlencoded({ extended: true }));
const cors = require('cors');
app.use(cors());

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'goldenbulls',
    port: 3306
});

db.connect(function(err) {
    if (err) {
        console.error('Database query error:', err);
    } else {
      console.log('Connected to database');
    }
  });

app.post('/subscribe', (req, res) => {
    const email = req.body.email;
    const query = 'INSERT INTO subscribe (email) VALUES (?)';

    db.query(query, [email], (error, _results) => {
        if (error) {
            console.log(error);
            res.status(500).send('An error occurred.');
        } else {
            res.status(200).send('Subscription successful!');
        }
    });
});

app.get('/verblijf', (_req, res) => { 
    const query = `SELECT *, 'vakantiehuisjes' AS tabel FROM vakantiehuisjes UNION SELECT *, 'caravanplekken' AS tabel FROM caravanplekken`;

    db.query(query, (error, results) => {
        if (error) {
            console.log(error);
            res.status(500).send('An error occurred.');
        } else {
            res.status(200).send(results);
        }
    });
});

app.use(express.static(path.join(__dirname)));

app.get('/', (_req, res) => {
    res.sendFile(path.join(__dirname, 'index.html'));
});

app.listen(3000, () => {
    console.log('Server is running on port 3000');
});