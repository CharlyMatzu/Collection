const express = require('express');
const app = express();

// carpeta principal para render
app.use(express.static('./public'))
// Template engine principal
app.set('view engine', 'pug');

// Ruta de renderizado
app.get('/', (req, res) => {
    res.render('home', {
        name: 'Carlos',
        year: new Date().getFullYear()
    });
});

// app.get('/', (req, res) => {
//     res.send("Hola mundo");
// });



app.listen(8080, () => {
    console.log("Running in 8080");
});