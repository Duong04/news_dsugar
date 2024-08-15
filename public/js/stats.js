import axios_ins from "./axios.js";

const demo = async () => {
    const response = await axios_ins.get('/stats/categories/top-views?limit=3');
    console.log(response); 
}

demo();