// search editor
document.addEventListener('DOMContentLoaded', function() {
    // let penuliss = {!! json_encode($penuliss) !!};
    let searchEditors = document.querySelectorAll('#search-editor');
    let inputIdEditorHiddens = document.querySelectorAll('#id-editor-hidden');
    let searchInputEditors = document.querySelectorAll('#id-editor');

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
        let [newTr1, newTr2, newTr3, newTr4] = createTableRow(index);

        tabelPenulis.appendChild(newTr1);
        tabelPenulis.appendChild(newTr2);
        tabelPenulis.appendChild(newTr3);
        tabelPenulis.appendChild(newTr4);

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
        td1.setAttribute('rowspan', '4');
        td1.className = 'p-1 border text-center';
        td1.textContent = index + 1;
        tr1.appendChild(td1);

        let td2 = document.createElement('td');
        let inputPenulis1 = document.createElement('input');
        td2.className = 'position-relative p-1 border text-start';
        inputPenulis1.type = 'text';
        inputPenulis1.id = 'id-editor';
        inputPenulis1.className = 'w-100 border-0';
        inputPenulis1.style.outline = 'none';
        inputPenulis1.placeholder = 'Masukkan penulis 1';
        inputPenulis1.required = true;
        let requiredPenulis1 = document.createElement('span');
        requiredPenulis1.textContent = '*';
        requiredPenulis1.className = 'position-absolute d-flex align-items-end text-danger';
        requiredPenulis1.style.top = '30%';
        requiredPenulis1.style.right = '5px';
        let div1 = document.createElement('div');
        div1.id = 'search-editor';
        div1.className = 'w-100 overflow-auto';
        div1.style.maxHeight = '150px';
        let inputHidden1 = document.createElement('input');
        inputHidden1.type = 'hidden';
        inputHidden1.name = 'id_penulis1[]';
        inputHidden1.id = 'id-editor-hidden';
        inputHidden1.className = 'w-50';
        td2.appendChild(requiredPenulis1);
        td2.appendChild(inputPenulis1);
        td2.appendChild(div1);
        td2.appendChild(inputHidden1);
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
        td4.setAttribute('rowspan', '4');
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
        let td5 = document.createElement('td');
        let inputPenulis2 = document.createElement('input');
        td5.className = 'position-relative p-1 border text-start';
        inputPenulis2.type = 'text';
        inputPenulis2.id = 'id-editor';
        inputPenulis2.className = 'w-100 h-100 border-0';
        inputPenulis2.style.outline = 'none';
        inputPenulis2.placeholder = 'Masukkan penulis 2';
        let div2 = document.createElement('div');
        div2.id = 'search-editor';
        div2.className = 'w-100 overflow-auto';
        div2.style.maxHeight = '150px';
        let inputHidden2 = document.createElement('input');
        inputHidden2.type = 'hidden';
        inputHidden2.name = 'id_penulis2[]';
        inputHidden2.id = 'id-editor-hidden';
        inputHidden2.className = 'w-50';
        td5.appendChild(inputPenulis2);
        td5.appendChild(div2);
        td5.appendChild(inputHidden2);
        tr2.appendChild(td5);

        let td6 = document.createElement('td');
        let inputAbstrak = document.createElement('input');
        td6.className = 'position-relative p-1 border text-start';
        inputAbstrak.type = 'text';
        inputAbstrak.name = 'abstrak[]';
        inputAbstrak.id = 'abstrak';
        inputAbstrak.className = 'w-100 text-start border-0 align-top';
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

        // create row 3
        let tr3 = document.createElement('tr');
        tr3.className = 'tr3';
        let td7 = document.createElement('td');
        let inputPenulis3 = document.createElement('input');
        td7.className = 'position-relative p-1 border text-start';
        inputPenulis3.type = 'text';
        inputPenulis3.id = 'id-editor';
        inputPenulis3.className = 'w-100 h-100 border-0';
        inputPenulis3.style.outline = 'none';
        inputPenulis3.placeholder = 'Masukkan penulis 3';
        let div3 = document.createElement('div');
        div3.id = 'search-editor';
        div3.className = 'w-100 overflow-auto';
        div3.style.maxHeight = '150px';
        let inputHidden3 = document.createElement('input');
        inputHidden3.type = 'hidden';
        inputHidden3.name = 'id_penulis3[]';
        inputHidden3.id = 'id-editor-hidden';
        inputHidden3.className = 'w-50';
        td7.appendChild(inputPenulis3);
        td7.appendChild(div3);
        td7.appendChild(inputHidden3);
        tr3.appendChild(td7);

        let td8 = document.createElement('td');
        td8.setAttribute('rowspan', '2');
        tr3.appendChild(td8);

        // create row 4
        let tr4 = document.createElement('tr');
        tr4.className = 'tr4';
        let td9 = document.createElement('td');
        let inputPenulis4 = document.createElement('input');
        td9.className = 'position-relative p-1 border text-start';
        inputPenulis4.type = 'text';
        inputPenulis4.id = 'id-editor';
        inputPenulis4.className = 'w-100 h-100 border-0';
        inputPenulis4.style.outline = 'none';
        inputPenulis4.placeholder = 'Masukkan penulis 4';
        let div4 = document.createElement('div');
        div4.id = 'search-editor';
        div4.className = 'w-100 overflow-auto';
        div4.style.maxHeight = '150px';
        let inputHidden4 = document.createElement('input');
        inputHidden4.type = 'hidden';
        inputHidden4.name = 'id_penulis4[]';
        inputHidden4.id = 'id-editor-hidden';
        inputHidden4.className = 'w-50';
        td9.appendChild(inputPenulis4);
        td9.appendChild(div4);
        td9.appendChild(inputHidden4);
        tr4.appendChild(td9);

        // run filter editor
        let inputElements = [inputPenulis1, inputPenulis2, inputPenulis3, inputPenulis4];
        let divElements = [div1, div2, div3, div4];
        let inputHiddenElements = [inputHidden1, inputHidden2, inputHidden3, inputHidden4];

        for (let i = 0; i < inputElements.length; i++) {
            let inputElement = inputElements[i];
            let divElement = divElements[i];

            inputElement.addEventListener('input', function() {
                filterEditor(inputElement, divElement, penuliss);
            });

            divElement.addEventListener('click', function(event) {
                let editor = event.target;
                if (editor.tagName === 'P') {
                    inputElement.value = editor.textContent;
                    inputHiddenElements[i].value = penuliss.find(item => item.nama === editor
                        .textContent).id;
                    divElement.style.display = "none";
                }
            });
        }

        return [tr1, tr2, tr3, tr4];
    }

    // function delete row
    function deleteRows() {
        let deleteButtons = document.querySelectorAll('#btn-delete');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                let row = button.closest('tr');
                let tableBody = row.parentElement;
                let index = Array.from(tableBody.children).indexOf(row);

                for (let i = 0; i < 4; i++) {
                    if (tableBody.children[index]) {
                        tableBody.removeChild(tableBody.children[index]);
                    }
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
                numberCell.textContent = Math.floor(index / 4) + 1;
            }
        });
    }
});
