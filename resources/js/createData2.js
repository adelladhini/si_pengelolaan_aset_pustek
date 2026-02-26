  // search
  document.addEventListener('DOMContentLoaded', function() {
    let searchJudulRuu = document.querySelectorAll('#search-ruu');
    let inputIdJudulRuuHiddens = document.querySelectorAll('#id-ruu-hidden');
    let searchInputJudulRuus = document.querySelectorAll('#id-ruu');

    // Function filter data
    searchInputJudulRuus.forEach(function(searchInputJudulRuu, index) {
        searchInputJudulRuu.addEventListener('input', function() {
            filterEditor(searchInputJudulRuu, searchJudulRuu[index], draftRuus,
                inputIdJudulRuuHiddens[index]);
        });
    });

    function filterEditor(searchInputJudulRuu, searchJudul, draftRuus, inputIdJudulRuuHidden) {
        let inputValue = searchInputJudulRuu.value.toLowerCase().trim();
        let filteredJudulRuu = draftRuus.filter(function(item) {
            return item.judul.toLowerCase().includes(inputValue);
        });

        if (inputValue === "") {
            searchJudul.style.display = "none";
            searchJudul.innerHTML = '';
            inputIdJudulRuuHidden.value = '';
        } else if (filteredJudulRuu.length > 0) {
            searchJudul.style.display = "block";
            generateSearchJudul(filteredJudulRuu, searchJudul, searchInputJudulRuu, inputIdJudulRuuHidden);
        } else {
            searchJudul.innerHTML =
                `<p class="mb-2 text-secondary border-bottom border-secondary" style="cursor: pointer;">Judul ruu tidak ditemukan</p>`;
        }
    }

    // Function generate judul ruu
    function generateSearchJudul(data, searchJudul, searchInputJudulRuu, inputIdJudulRuuHidden) {
        searchJudul.style.display = "block";
        searchJudul.innerHTML = '';

        data.forEach(function(item) {
            let searchJudulRuuContainer = document.createElement('div');
            searchJudulRuuContainer.classList.add('mb-2');

            let searchJudulRuuContent =
                `<p class="text-secondary border-bottom border-secondary" style="cursor: pointer;">${item.judul}</p>`;
            searchJudulRuuContainer.innerHTML = searchJudulRuuContent;

            searchJudulRuuContainer.addEventListener('click', function() {
                inputIdJudulRuuHidden.value = item.id;
                searchInputJudulRuu.value = item.judul;
                searchJudul.style.display = "none";
            });

            searchJudul.appendChild(searchJudulRuuContainer);
        });
    }

    // function show/hide table
    let btnKuisioner = document.getElementById("btnKuisioner");
    let btnSusunanTim = document.getElementById("btnSusunanTim");
    let tableSusunanTim = document.getElementById("table-susunan-tim");
    let tableResponden = document.getElementById("table-responden");

    if(btnKuisioner || btnSusunanTim) {
        btnKuisioner.addEventListener("click", function() {
            tableSusunanTim.style.display = "none";
            tableResponden.style.display = "block";
        });

        btnSusunanTim.addEventListener("click", function() {
            tableSusunanTim.style.display = "block";
            tableResponden.style.display = "none";
        });
    }
});
// end search
