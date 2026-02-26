// search penyusun
document.addEventListener('DOMContentLoaded', function() {
    // let penuliss = {!! json_encode($penuliss) !!};
    let searchPenyusun = document.getElementById('search-penyusun');
    let inputIdPenyusunHidden = document.getElementById('id-penyusun-hidden');
    let searchInputPenyusun = document.getElementById('nama-penyusun');

    // Function generate editor
    function generateSearchPenyusun(data) {
        // console.log(data);
        searchPenyusun.style.display = "block";
        searchPenyusun.innerHTML = '';

        data.forEach(function(item) {
            let searchPenyusunContainer = document.createElement('div');
            searchPenyusunContainer.classList.add('mb-2');

            let searchPenyusunContent =
                `<p class="text-secondary border-bottom border-secondary" style="cursor: pointer;">${item.nama}</p>`;
            searchPenyusunContainer.innerHTML = searchPenyusunContent;

            searchPenyusunContainer.addEventListener('click', function() {
                inputIdPenyusunHidden.value = item.id;
                searchInputPenyusun.value = item.nama;
                searchPenyusun.style.display = "none";
            });

            searchPenyusun.appendChild(searchPenyusunContainer);
        });
    }

    // Function filter data
    searchInputPenyusun.addEventListener('input', filterJudul);

    function filterJudul() {
        let inputValue = searchInputPenyusun.value.toLowerCase().trim();
        let filteredEditor = penuliss.filter(function(item) {
            return item.nama.toLowerCase().includes(inputValue);
        });

        if (inputValue === "") {
            searchPenyusun.style.display = "none";
            searchPenyusun.innerHTML = '';
        } else if (filteredEditor.length > 0) {
            searchPenyusun.style.display = "block";
            generateSearchPenyusun(filteredEditor);
        } else {
            searchPenyusun.innerHTML =
                `<p class="mb-2 text-secondary border-bottom border-secondary" style="cursor: pointer;">Penyusun tidak ditemukan</p>`;
        }
    }
});
// end search penyusun
