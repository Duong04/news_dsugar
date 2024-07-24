const selectAll = document.querySelector('#select-all');
const actionCheckboxes = document.querySelectorAll('.check-action');

selectAll.addEventListener('change', () => {
    const parentCheckox = document.querySelector('.parent-checkox');
    const isChecked = selectAll.checked;
    actionCheckboxes.forEach(item => {
        item.checked = isChecked;
    });
});