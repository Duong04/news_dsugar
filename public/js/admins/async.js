const axios_ins = axios.create({
    baseURL: "http://127.0.0.1:8000/api/v1",
});

const editFormAction = document.querySelectorAll(".btn-edit-action");
const editFormType = document.querySelectorAll(".btn-edit-type");
const btnStatus= document.querySelectorAll(".btn-status");
const btnRole = document.querySelectorAll(".btn-role");

const messageSuccess = (text) => {
    swal("Success!", text, {
        icon: "success",
        buttons: {
            confirm: {
                className: "btn btn-success",
            },
        },
    });
};

const layoutSelect = ({ id, name }, subcat_id) => {
    return `<option value="${id}" ${
        subcat_id && subcat_id == id ? "selected" : ""
    }>${name}</option>`;
};

document.addEventListener("DOMContentLoaded", () => {
    const categoriesElement = document.querySelector(".categories");

    if (categoriesElement) {
        categoriesElement.addEventListener("change", async (e) => {
            getSubcategories(e);
        });

        getSubcategories({ target: categoriesElement });
    }
});

const getSubcategories = async (e) => {
    const subcategories = document.querySelector(".subcategories");
    const id = e.target.value;
    const subcat_id = subcategories.getAttribute("data-id");
    try {
        if (id) {
            const response = await axios_ins.get(
                `/categories/${id}/subcategories`
            );
            const htmls = response.data
                .map((item) => {
                    return layoutSelect(item, subcat_id);
                })
                .join("");

            subcategories.innerHTML = htmls;
        }
    } catch (e) {
        console.log(e);
    }
};

editFormType.forEach(item => {
    item.onclick = async () => {
        const id = item.getAttribute("data-id");
        const inpName = document.querySelector(".inp-name");
        const inpUrl = document.querySelector(".inp-url");
        const formEdit = document.querySelector("#form-edit");
        const btnSubmit = document.querySelector(".btn-submit");
        const route = `${formEdit.getAttribute("action")}/${id}`;
        btnSubmit.onclick = (e) => {
            e.preventDefault();
            formEdit.action = route;
            formEdit.submit();
        };

        try {
            const response = await axios_ins.get(`/types/${id}`);
            inpName.value = response.data.name;
            inpUrl.value = response.data.redirect_url;
        } catch (error) {
            console.log(error);
        }
    };
});

editFormAction.forEach((item) => {
    item.onclick = async () => {
        const id = item.getAttribute("data-id");
        const inpName = document.querySelector(".inp-name");
        const inpValue = document.querySelector(".inp-value");
        const formEdit = document.querySelector("#form-edit");
        const btnSubmit = document.querySelector(".btn-submit");
        const route = `${formEdit.getAttribute("action")}/${id}`;
        btnSubmit.onclick = (e) => {
            e.preventDefault();
            formEdit.action = route;
            formEdit.submit();
        };

        try {
            const response = await axios_ins.get(`/actions/${id}`);
            inpName.value = response.data.name;
            inpValue.value = response.data.value;
        } catch (error) {
            console.log(error);
        }
    };
});

btnStatus.forEach((item) => {
    item.onclick = async () => {
        await updateStatus(item);
    };
});

const updateStatus = async (item) => {
    const status = item.getAttribute("data-status");
    const id = item.getAttribute("data-id");
    const classStatus = document.querySelector(`#status-${id}`);
    swal({
        title: "Bạn có chắc?",
        text: `Bạn có chắc muốn ${status == 'active' ? 'kích hoạt' : 'vô hiệu hóa'} tài khoản này không!`,
        type: "warning",
        buttons: {
          confirm: {
            text: `Có, ${status == 'active' ? 'kích hoạt' : 'vô hiệu hóa'} nó!`,
            className: "btn btn-success",
          },
          cancel: {
            'text': 'Thoát',
            visible: true,
            className: "btn btn-danger",
          },
        },
    }).then(async (isCheck) => {
        if (isCheck) {
            const response = await axios_ins.put(`/users/${id}/status`, {
                status: status,
            });
            if (response.status === 203) {
                messageSuccess(`Đã ${status == 'active' ? 'kích hoạt' : 'vô hiệu hóa'} tài khoản này thành công`);
                classStatus.innerHTML = status === 'active'
                ? '<span class="mx-auto badge badge-success">Đã kích hoạt</span>'
                : '<span class="mx-auto badge badge-danger">Vô hiệu hóa</span>';
            }
        }
    });
}

btnRole.forEach(item => {
    item.onclick = async () => {
        await updateRole(item);
    }
});

const updateRole = async (item) => {
    const userId = item.getAttribute('data-user-id');
    const roleId = item.getAttribute('data-role-id');
    const roleName = item.getAttribute('data-role-name');
    const roleUser = document.querySelector(`#role-${userId}`);
    swal({
        title: "Bạn có chắc?",
        text: `Bạn có chắc muốn cấp vai trò cho tài khoản này không!`,
        type: "warning",
        buttons: {
          confirm: {
            text: `Có, cấp vai trò!`,
            className: "btn btn-success",
          },
          cancel: {
            'text': 'Thoát',
            visible: true,
            className: "btn btn-danger",
          },
        },
    }).then(async (isCheck) => {
        if (isCheck) {
            const response = await axios_ins.put(`/users/${userId}/role`, {
                role_id: roleId,
            });
            if (response.status === 203) {
                messageSuccess(`Đã cấp vai trò cho tài khoản này thành công`);
                roleUser.innerHTML = textHtml(roleName);
            }
        }
    });
}

const textHtml = (roleName) => {
    const bg = {
        'Super Admin': 'btn-success',
        'Editor': 'btn-warning',
        'Author': 'btn-primary',
        'Contributor': 'btn-info',
        'Subscriber': 'btn-secondary',
        'Support': 'btn-danger',
    }

    return `<span class="mx-auto badge ${bg[roleName]}">${roleName}</span>`;
}
