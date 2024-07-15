const axios_ins = axios.create({
    baseURL: "http://127.0.0.1:8000/api/v1"
});

const layoutSelect = ({id, name}) => {
    return `<option value="${id}">${name}</option>`;
}

document.querySelector('.categories').addEventListener('change', async (e) => {
    const id = e.target.value;
    try {
        if (id) {
            const response = await axios_ins.get(`/categories/${id}/subcategories`);
            const htmls = response.data.map(item => {
                return layoutSelect(item);
            }).join('');

            document.querySelector('.subcategories').innerHTML = htmls;
        }
    }catch (e) {
        console.log(e);
    }
})