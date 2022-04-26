document.querySelectorAll('input[data-id]').forEach(element => {
    element.checked = false;
    element.onclick = function(e) {
        if (e.target.checked) {
            document.querySelectorAll('input[data-id]').forEach(element => {
                if (element !== e.target)
                    element.checked = false;
            });

            const url = '/edit/' + element.dataset.id;

            document.getElementById('edit_student').href = url; 


        } else {
            document.getElementById('edit_student').href = '#';
        }
    }
});

document.getElementById('checkbox-all').onclick = function() {
    document.querySelectorAll('input[data-id]').forEach(element => {
        element.checked = !element.checked;
    });
}

document.querySelectorAll('.filter-group').forEach(element => {
    element.onclick = function() {
        filter();
    }
});

function filter() {
    const xhr = new XMLHttpRequest;

    xhr.open('POST', '/', true);
    xhr.responseType = 'document';

    const fb = new FormData();
    document.querySelectorAll('.filter-group').forEach(element => {
        if (element.checked)
            fb.append(element.name, element.value);            
    });

    fb.append('_token', document.getElementsByName('_token')[0].value);

    xhr.send(fb);

    xhr.onload = function() {
        const res = this.response;
        const table = res.getElementById('students_table').innerHTML;
        document.getElementById('students_table').innerHTML = table;
    }
}

document.getElementById('search').onfocus = function() {
    document.getElementById('search-icon').style.display = 'none';
}