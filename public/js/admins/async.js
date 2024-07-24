const axios_ins = axios.create({
    baseURL: "http://127.0.0.1:8000/api/v1"
});

const layoutSelect = ({id, name}, subcat_id) => {
    return `<option value="${id}" ${subcat_id && subcat_id == id ? 'selected' : ''}>${name}</option>`;
}

document.addEventListener('DOMContentLoaded', () => {
    const categoriesElement = document.querySelector('.categories');
    
    if (categoriesElement) {
        categoriesElement.addEventListener('change', async (e) => {
            getSubcategories(e);
        });

        getSubcategories({ target: categoriesElement });
    }
});

const getSubcategories = async (e) => {
    const subcategories = document.querySelector('.subcategories');
    const id = e.target.value;
    const subcat_id = subcategories.getAttribute('data-id');
    try {
        if (id) {
            const response = await axios_ins.get(`/categories/${id}/subcategories`);
            const htmls = response.data.map(item => {
                return layoutSelect(item, subcat_id);
            }).join('');

            subcategories.innerHTML = htmls;
        }
    }catch (e) {
        console.log(e);
    }
}

const editFormPermission = document.querySelectorAll('.btn-edit-permission');
const editFormAction = document.querySelectorAll('.btn-edit-action');

editFormPermission.forEach(item => {
    item.onclick = async () => {
        const id = item.getAttribute('data-id');
        const inpName = document.querySelector('.inp-name');
        const inpDesc = document.querySelector('.inp-desc');
        const formEdit = document.querySelector('#form-edit');
        const btnSubmit = document.querySelector('.btn-submit');
        const route = `${formEdit.getAttribute('action')}/${id}`;
        btnSubmit.onclick = (e) => {
            e.preventDefault();
            formEdit.action = route;
            formEdit.submit();
        }

        try {
            const response = await axios_ins.get(`/permissions/${id}`);
            inpName.value = response.data.name;
            inpDesc.value = response.data.description;
        } catch (error) {
            console.log(error);
        }
    };
});

editFormAction.forEach(item => {
    item.onclick = async () => {
        const id = item.getAttribute('data-id');
        const inpName = document.querySelector('.inp-name');
        const formEdit = document.querySelector('#form-edit');
        const btnSubmit = document.querySelector('.btn-submit');
        const route = `${formEdit.getAttribute('action')}/${id}`;
        btnSubmit.onclick = (e) => {
            e.preventDefault();
            formEdit.action = route;
            formEdit.submit();
        }

        try {
            const response = await axios_ins.get(`/actions/${id}`);
            inpName.value = response.data.name;
        } catch (error) {
            console.log(error);
        }
    };
});
