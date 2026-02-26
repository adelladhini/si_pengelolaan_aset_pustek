// search editor
document.addEventListener('DOMContentLoaded', function() {
    let searchInputEditors = document.querySelectorAll('#id-editor');
    let searchEditors = document.querySelectorAll('#search-editor');
    let inputIdEditorHiddens = document.querySelectorAll('#id-editor-hidden');

    // Function filter data
    searchInputEditors.forEach(function(searchInputEditor, index) {
        searchInputEditor.addEventListener('input', function() {
            filterEditor(searchInputEditor, searchEditors[index], penuliss,
                inputIdEditorHiddens[index]);
        });
    });

    function filterEditor(searchInputEditor, searchEditor, penuliss, inputIdEditorHidden) {
        let inputValue = searchInputEditor.value.toLowerCase().trim();
        let filteredEditor = penuliss.filter(function(item) {
            return item.nama.toLowerCase().includes(inputValue);
        });

        if (inputValue === "") {
            searchEditor.style.display = "none";
            searchEditor.innerHTML = '';
            inputIdEditorHidden.value = '';
        } else if (filteredEditor.length > 0) {
            searchEditor.style.display = "block";
            generateSearchEditor(filteredEditor, searchEditor, searchInputEditor, inputIdEditorHidden);
        } else {
            searchEditor.innerHTML =
                `<p class="mb-2 text-secondary border-bottom border-secondary" style="cursor: pointer;">Penulis tidak ditemukan</p>`;
        }
    }

    // Function generate editor
    function generateSearchEditor(data, searchEditor, searchInputEditor, inputIdEditorHidden) {
        searchEditor.style.display = "block";
        searchEditor.innerHTML = '';

        data.forEach(function(item) {
            let searchEditorContainer = document.createElement('div');
            searchEditorContainer.classList.add('mb-2');

            let searchEditorContent =
                `<p class="text-secondary border-bottom border-secondary" style="cursor: pointer;">${item.nama}</p>`;
            searchEditorContainer.innerHTML = searchEditorContent;

            searchEditorContainer.addEventListener('click', function() {
                inputIdEditorHidden.value = item.id;
                // console.log(inputIdEditorHidden.value)
                searchInputEditor.value = item.nama;
                searchEditor.style.display = "none";
            });

            searchEditor.appendChild(searchEditorContainer);
        });
    }

    // add row
    let btnAdd = document.getElementById('btn-add');
    let tabelPenulis = document.querySelector('.tabel-penulis');

    btnAdd.addEventListener('click', function() {
        let index = Math.floor(tabelPenulis.children.length / 2);
        let [newTr1, newTr2] = createTableRow(index);

        tabelPenulis.appendChild(newTr1);
        tabelPenulis.appendChild(newTr2);

        // delete row
        deleteRows();

        // update row
        updateRowNumbers();
    });

    // add row
    function createTableRow(index) {
        let tr1 = document.createElement('tr');
        tr1.className = 'tr1';
        let td1 = document.createElement('td');
        td1.setAttribute('rowspan', '2');
        td1.className = 'p-1 border text-center';
        td1.textContent = index + 1;
        tr1.appendChild(td1);

        let td2 = document.createElement('td');
        td2.setAttribute('rowspan', '2');
        td2.className = 'position-relative p-1 border text-start';
        let inputPenulis = document.createElement('input');
        inputPenulis.type = 'text';
        inputPenulis.id = 'id-editor';
        inputPenulis.className = 'w-100 border-0';
        inputPenulis.style.outline = 'none';
        inputPenulis.required = true;
        inputPenulis.placeholder = 'Masukkan penulis';
        let requiredPenulis1 = document.createElement('span');
        requiredPenulis1.textContent = '*';
        requiredPenulis1.className = 'position-absolute d-flex align-items-end text-danger';
        requiredPenulis1.style.top = '30%';
        requiredPenulis1.style.right = '5px';
        let div = document.createElement('div');
        div.id = 'search-editor';
        div.className = 'w-100 overflow-auto';
        div.style.maxHeight = '150px';
        let inputHidden = document.createElement('input');
        inputHidden.type = 'hidden';
        inputHidden.name = 'id_penulis[]';
        inputHidden.id = 'id-editor-hidden';
        inputHidden.className = 'w-50';
        td2.appendChild(requiredPenulis1);
        td2.appendChild(inputPenulis);
        td2.appendChild(div);
        td2.appendChild(inputHidden);
        tr1.appendChild(td2);

        let td3 = document.createElement('td');
        let inputJudul = document.createElement('input');
        td3.className = 'position-relative p-1 border text-start';
        inputJudul.type = 'text';
        inputJudul.name = 'judul[]';
        inputJudul.id = 'judul';
        inputJudul.className = 'w-100 border-0';
        inputJudul.style.outline = 'none';
        inputJudul.required = true;
        inputJudul.placeholder = 'Masukkan judul';
        let requiredJudul = document.createElement('span');
        requiredJudul.textContent = '*';
        requiredJudul.className = 'position-absolute d-flex align-items-end text-danger';
        requiredJudul.style.top = '30%';
        requiredJudul.style.right = '5px';
        td3.appendChild(requiredJudul);
        td3.appendChild(inputJudul);
        tr1.appendChild(td3);

        let td4 = document.createElement('td');
        let button = document.createElement('button');
        td4.setAttribute('rowspan', '2');
        td4.className = 'p-1 border text-center';
        button.type = 'button';
        button.id = 'btn-delete';
        button.className = 'btn btn-danger';
        button.innerHTML = '<i class="ri-delete-bin-line me-1"></i>Hapus';
        td4.appendChild(button);
        tr1.appendChild(td4);

        // create row 2
        let tr2 = document.createElement('tr');
        tr2.className = 'tr2';

        let td6 = document.createElement('td');
        let inputAbstrak = document.createElement('input');
        td6.className = 'position-relative p-1 border text-start';
        inputAbstrak.type = 'text';
        inputAbstrak.name = 'abstrak[]';
        inputAbstrak.id = 'abstrak';
        inputAbstrak.className = 'w-100 border-0';
        inputAbstrak.style.outline = 'none';
        inputAbstrak.required = true;
        inputAbstrak.placeholder = 'Masukkan abstrak';
        let requiredAbstrak = document.createElement('span');
        requiredAbstrak.textContent = '*';
        requiredAbstrak.className = 'position-absolute d-flex align-items-end text-danger';
        requiredAbstrak.style.top = '30%';
        requiredAbstrak.style.right = '5px';
        td6.appendChild(requiredAbstrak);
        td6.appendChild(inputAbstrak);
        tr2.appendChild(td6);

        // run filter editor
        inputPenulis.addEventListener('input', function() {
            filterEditor(inputPenulis, div, penuliss);
        });

        div.addEventListener('click', function(event) {
            let editor = event.target;
            if (editor.tagName === 'P') {
                inputPenulis.value = editor.textContent;
                inputHidden.value = penuliss.find(item => item.nama === editor.textContent).id;
                console.log(inputHidden);
                div.style.display = "none";
            }
        });

        return [tr1, tr2];
    }

    // function delete row
    function deleteRows() {
        let deleteButtons = document.querySelectorAll('#btn-delete');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                let row = button.closest('tr');
                let tableBody = row.parentElement;
                let index = Array.from(tableBody.children).indexOf(row);

                if (index % 2 === 0) {
                    tableBody.removeChild(row);
                    tableBody.removeChild(tableBody.children[index]);
                } else {
                    tableBody.removeChild(tableBody.children[index - 1]);
                    tableBody.removeChild(row);
                }

                updateRowNumbers();
            });
        });
    }

    // function update row number
    function updateRowNumbers() {
        let rows = document.querySelectorAll('.tabel-penulis tr');
        rows.forEach(function(row, index) {
            let numberCell = row.querySelector('.text-center');
            if (numberCell) {
                numberCell.textContent = Math.floor(index / 2) + 1;
            }
        });
    }
});
