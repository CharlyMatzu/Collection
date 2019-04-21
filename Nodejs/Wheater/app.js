const locationServ = require('./services/location');
const weatherServ = require('./services/weather');

const argv = require('yargs').options({
    direccion: {
        alias: 'd',
        desc: 'Dirección de la ciudad a obtener el clima',
        demand: true
    }
}).argv;


const getInfo = async (direccion) => {
    try{
        const location  = await locationServ.getLocationLatLng(direccion);
        const clima     = await weatherServ.getClima(location.latitude, location.longitude);
        return `El clima de ${direccion} es ${clima} grados`;
    }catch(e){
        return `No se pudo determnar el clima de ${direccion}: ${e}`;
    }
}

getInfo(argv.direccion)
    .then(console.log)
    .catch(console.log)

// location.getLocationLatLng(argv.direccion)
//     .then(resp => weather.getClima(resp.latitude, resp.longitude))
//     .then(resp => console.log(resp))
//     .catch(err => console.log(err));