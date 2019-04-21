const axios = require('axios');

const getClima = async (latitude, longitude) => {
    const res = await axios.get(`https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&units=metric&appid=b6864f0483601d7633199d5a37579de0`);
    return res.data.main.temp;
};

module.exports = {
    getClima
}