const express = require('express');
const app = express();
const hbs = require('hbs');
require('./hbs/helpers');

// partials
hbs.registerPartials('./views/partials');
// Template engine principal
app.set('view engine', 'hbs');


// Ruta de renderizado
app.get('/', (req, res) => {
    res.render('home', {
        title: 'HOME PAGE',
        name: 'Carlos'
    });
});

app.get('/about', (req, res) => {
    res.render('about', {
        title: 'ABOUT PAGE',
        desc: 'Lorem'
    });
});


const PORT = 8080;
app.listen(PORT, () => {
    console.log(`Running in http://localhost:${PORT}`);
});