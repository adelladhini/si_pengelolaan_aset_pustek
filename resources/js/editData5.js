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
        let [newTr1, newTr2, newTr3, newTr4, newTr5, newTr6, newTr7, newTr8, newTr9, newTr10] =
        createTableRow(index);

        tabelPenulis.appendChild(newTr1);
        tabelPenulis.appendChild(newTr2);
        tabelPenulis.appendChild(newTr3);
        tabelPenulis.appendChild(newTr4);
        tabelPenulis.appendChild(newTr5);
        tabelPenulis.appendChild(newTr6);
        tabelPenulis.appendChild(newTr7);
        tabelPenulis.appendChild(newTr8);
        tabelPenulis.appendChild(newTr9);
        tabelPenulis.appendChild(newTr10);

        // delete row
        deleteRows();

        // update row
        updateRowNumbers();
    });

    // add row
    function createTableRow(index) {
        // create row 1
        let tr1 = document.createElement('tr');
        tr1.className = 'tr1';
        let td1 = document.createElement('td');
        td1.setAttribute('rowspan', '10');
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
        inputPenulis1.required = true;
        inputPenulis1.placeholder = 'Masukkan penulis 1';
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
        td4.setAttribute('rowspan', '10');
        td4.className = 'p-1 border text-end';
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
        inputPenulis2.required = true;
        inputPenulis2.placeholder = 'Masukkan penulis 2';
        let requiredPenulis2 = document.createElement('span');
        requiredPenulis2.textContent = '*';
        requiredPenulis2.className = 'position-absolute d-flex align-items-end text-danger';
        requiredPenulis2.style.top = '30%';
        requiredPenulis2.style.right = '5px';
        let div2 = document.createElement('div');
        div2.id = 'search-editor';
        div2.className = 'w-100 overflow-auto';
        div2.style.maxHeight = '150px';
        let inputHidden2 = document.createElement('input');
        inputHidden2.type = 'hidden';
        inputHidden2.name = 'id_penulis2[]';
        inputHidden2.id = 'id-editor-hidden';
        inputHidden2.className = 'w-50';
        td5.appendChild(requiredPenulis2);
        td5.appendChild(inputPenulis2);
        td5.appendChild(div2);
        td5.appendChild(inputHidden2);
        tr2.appendChild(td5);

        let td6 = document.createElement('td');
        let inputJudulEn = document.createElement('input');
        td6.className = 'position-relative p-1 border text-start';
        inputJudulEn.type = 'text';
        inputJudulEn.name = 'judul_en[]';
        inputJudulEn.id = 'judul-en';
        inputJudulEn.className = 'w-100 border-0';
        inputJudulEn.style.outline = 'none';
        inputJudulEn.placeholder = 'Masukkan judul en';
        td6.appendChild(inputJudulEn);
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
        inputPenulis3.required = true;
        inputPenulis3.placeholder = 'Masukkan penulis 3';
        let requiredPenulis3 = document.createElement('span');
        requiredPenulis3.textContent = '*';
        requiredPenulis3.className = 'position-absolute d-flex align-items-end text-danger';
        requiredPenulis3.style.top = '30%';
        requiredPenulis3.style.right = '5px';
        let div3 = document.createElement('div');
        div3.id = 'search-editor';
        div3.className = 'w-100 overflow-auto';
        div3.style.maxHeight = '150px';
        let inputHidden3 = document.createElement('input');
        inputHidden3.type = 'hidden';
        inputHidden3.name = 'id_penulis3[]';
        inputHidden3.id = 'id-editor-hidden';
        inputHidden3.className = 'w-50';
        td7.appendChild(requiredPenulis3);
        td7.appendChild(inputPenulis3);
        td7.appendChild(div3);
        td7.appendChild(inputHidden3);
        tr3.appendChild(td7);

        let td8 = document.createElement('td');
        let inputAbstrak1 = document.createElement('input');
        td8.className = 'position-relative p-1 border text-start';
        inputAbstrak1.type = 'text';
        inputAbstrak1.name = 'abstrak1[]';
        inputAbstrak1.id = 'abstrak1';
        inputAbstrak1.className = 'w-100 text-start border-0';
        inputAbstrak1.style.outline = 'none';
        inputAbstrak1.required = true;
        inputAbstrak1.placeholder = 'Masukkan abstrak 1';
        let requiredAbstrak1 = document.createElement('span');
        requiredAbstrak1.textContent = '*';
        requiredAbstrak1.className = 'position-absolute d-flex align-items-end text-danger';
        requiredAbstrak1.style.top = '30%';
        requiredAbstrak1.style.right = '5px';
        td8.appendChild(requiredAbstrak1);
        td8.appendChild(inputAbstrak1);
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
        inputPenulis4.required = true;
        inputPenulis4.placeholder = 'Masukkan penulis 4';
        let requiredPenulis4 = document.createElement('span');
        requiredPenulis4.textContent = '*';
        requiredPenulis4.className = 'position-absolute d-flex align-items-end text-danger';
        requiredPenulis4.style.top = '30%';
        requiredPenulis4.style.right = '5px';
        let div4 = document.createElement('div');
        div4.id = 'search-editor';
        div4.className = 'w-100 overflow-auto';
        div4.style.maxHeight = '150px';
        let inputHidden4 = document.createElement('input');
        inputHidden4.type = 'hidden';
        inputHidden4.name = 'id_penulis4[]';
        inputHidden4.id = 'id-editor-hidden';
        inputHidden4.className = 'w-50';
        td9.appendChild(requiredPenulis4);
        td9.appendChild(inputPenulis4);
        td9.appendChild(div4);
        td9.appendChild(inputHidden4);
        tr4.appendChild(td9);

        let td10 = document.createElement('td');
        let inputAbstrak2 = document.createElement('input');
        td10.className = 'position-relative p-1 border text-start';
        inputAbstrak2.type = 'text';
        inputAbstrak2.name = 'abstrak2[]';
        inputAbstrak2.id = 'abstrak2';
        inputAbstrak2.className = 'w-100 text-start border-0';
        inputAbstrak2.style.outline = 'none';
        inputAbstrak2.placeholder = 'Masukkan abstrak 2';
        td10.appendChild(inputAbstrak2);
        tr4.appendChild(td10);

        // create row 5
        let tr5 = document.createElement('tr');
        tr5.className = 'tr5';
        let td11 = document.createElement('td');
        td11.setAttribute('rowspan', '6');
        td11.className = 'position-relative p-1 border text-start';
        tr5.appendChild(td11);

        let td12 = document.createElement('td');
        let inputAbstrak3 = document.createElement('input');
        td12.className = 'position-relative p-1 border text-start';
        inputAbstrak3.type = 'text';
        inputAbstrak3.name = 'abstrak3[]';
        inputAbstrak3.id = 'abstrak3';
        inputAbstrak3.className = 'w-100 text-start border-0';
        inputAbstrak3.style.outline = 'none';
        inputAbstrak3.placeholder = 'Masukkan abstrak 3';
        td12.appendChild(inputAbstrak3);
        tr5.appendChild(td12);

        // create row 6
        let tr6 = document.createElement('tr');
        tr6.className = 'tr6';

        let td13 = document.createElement('td');
        let inputAbstrak4 = document.createElement('input');
        td13.className = 'position-relative p-1 border text-start';
        inputAbstrak4.type = 'text';
        inputAbstrak4.name = 'abstrak4[]';
        inputAbstrak4.id = 'abstrak4';
        inputAbstrak4.className = 'w-100 text-start border-0';
        inputAbstrak4.style.outline = 'none';
        inputAbstrak4.placeholder = 'Masukkan abstrak 4';
        td13.appendChild(inputAbstrak4);
        tr6.appendChild(td13);

        // create row 7
        let tr7 = document.createElement('tr');
        tr7.className = 'tr7';

        let td14 = document.createElement('td');
        let inputAbstrakEn1 = document.createElement('input');
        td14.className = 'position-relative p-1 border text-start';
        inputAbstrakEn1.type = 'text';
        inputAbstrakEn1.name = 'abstrak_en1[]';
        inputAbstrakEn1.id = 'abstrak-en1';
        inputAbstrakEn1.className = 'w-100 text-start border-0';
        inputAbstrakEn1.style.outline = 'none';
        inputAbstrakEn1.placeholder = 'Masukkan abstrak en 1';
        td14.appendChild(inputAbstrakEn1);
        tr7.appendChild(td14);

        // create row 8
        let tr8 = document.createElement('tr');
        tr8.className = 'tr8';

        let td15 = document.createElement('td');
        let inputAbstrakEn2 = document.createElement('input');
        td15.className = 'position-relative p-1 border text-start';
        inputAbstrakEn2.type = 'text';
        inputAbstrakEn2.name = 'abstrak_en2[]';
        inputAbstrakEn2.id = 'abstrak-en2';
        inputAbstrakEn2.className = 'w-100 text-start border-0';
        inputAbstrakEn2.style.outline = 'none';
        inputAbstrakEn2.placeholder = 'Masukkan abstrak en 2';
        td15.appendChild(inputAbstrakEn2);
        tr8.appendChild(td15);

        // create row 9
        let tr9 = document.createElement('tr');
        tr9.className = 'tr9';

        let td16 = document.createElement('td');
        let inputAbstrakEn3 = document.createElement('input');
        td16.className = 'position-relative p-1 border text-start';
        inputAbstrakEn3.type = 'text';
        inputAbstrakEn3.name = 'abstrak_en3[]';
        inputAbstrakEn3.id = 'abstrak-en3';
        inputAbstrakEn3.className = 'w-100 text-start border-0';
        inputAbstrakEn3.style.outline = 'none';
        inputAbstrakEn3.placeholder = 'Masukkan abstrak en 3';
        td16.appendChild(inputAbstrakEn3);
        tr9.appendChild(td16);

        // create row 10
        let tr10 = document.createElement('tr');
        tr10.className = 'tr10';

        let td17 = document.createElement('td');
        let inputAbstrakEn4 = document.createElement('input');
        td17.className = 'position-relative p-1 border text-start';
        inputAbstrakEn4.type = 'text';
        inputAbstrakEn4.name = 'abstrak_en4[]';
        inputAbstrakEn4.id = 'abstrak-en4';
        inputAbstrakEn4.className = 'w-100 text-start border-0';
        inputAbstrakEn4.style.outline = 'none';
        inputAbstrakEn4.placeholder = 'Masukkan abstrak en 4';
        td17.appendChild(inputAbstrakEn4);
        tr10.appendChild(td17);


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

        return [tr1, tr2, tr3, tr4, tr5, tr6, tr7, tr8, tr9, tr10];
    }

    // function delete row
    function deleteRows() {
        let deleteButtons = document.querySelectorAll('#btn-delete');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                let row = button.closest('tr');
                let tableBody = row.parentElement;
                let index = Array.from(tableBody.children).indexOf(row);

                for (let i = 0; i < 10; i++) {
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
                numberCell.textContent = Math.floor(index / 10) + 1;
            }
        });
    }
});
