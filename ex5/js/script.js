function dropDown(data) {

    const ulFrag = document.createDocumentFragment();


    for (const key in data.categories) {
        const li = document.createElement('li');

        const sHtml = `<a class="dropdown-item" href='index.php?bookCat="${data.categories[key]}"'>${data.categories[key]}</a>`;
        li.innerHTML = sHtml;

        ulFrag.appendChild(li);
    }

    document.getElementById("drop").appendChild(ulFrag);


}

fetch("data/category.json")
    .then(response => response.json())
    .then(data => dropDown(data));