// search editor
document.addEventListener('DOMContentLoaded', function() {
    // let penuliss = {!! json_encode($penuliss) !!};
    let searchEditor = document.getElementById('search-editor');
    let searchInputEditor = document.getElementById('id-editor');
    let inputIdEditorHidden = document.getElementById('id-editor-hidden');

    // Function generate editor
    function generateSearchEditor(data) {
        // console.log(data);
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

    // Function filter data
    searchInputEditor.addEventListener('input', filterJudul);

    function filterJudul() {
        let inputValue = searchInputEditor.value.toLowerCase().trim();
        let filteredEditor = penuliss.filter(function(item) {
            return item.nama.toLowerCase().includes(inputValue);
        });

        if (inputValue === "") {
            searchEditor.style.display = "none";
            searchEditor.innerHTML = '';
        } else if (filteredEditor.length > 0) {
            searchEditor.style.display = "block";
            generateSearchEditor(filteredEditor);
        } else {
            searchEditor.innerHTML =
                `<p class="mb-2 text-secondary border-bottom border-secondary" style="cursor: pointer;">Editor tidak ditemukan</p>`;
        }
    }
});
// end search editor
