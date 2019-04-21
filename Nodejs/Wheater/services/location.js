const axios = require('axios');

const getLocationLatLng = async (dirParam) => {
    const encodedUri = encodeURI(dirParam);
    // configuracion de Axios 
    // API: https://rapidapi.com
    const instance = axios.create({
        baseURL: `https://devru-latitude-longitude-find-v1.p.rapidapi.com/latlon.php?location=${encodedUri}`,
        headers: {'X-RapidAPI-Key': '48cf8c0f79msh29dcfd23523e29dp17a8c9jsn8fea5d43fe5f'}
        // timeout: 1000,
    });

    const response = await instance.get();
    if( response.data.Results.length === 0 )
        throw new Error(`No se encontró dirección ${dirParam}`);
    
    const data = response.data.Results[0];
    const direccion = data.name;
    const latitude = data.lat;
    const longitude = data.lon;
    
    return {
        direccion,
        latitude,
        longitude
    }
};

module.exports = {
    getLocationLatLng
}