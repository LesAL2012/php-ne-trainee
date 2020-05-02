//select Records per page
let numberPages = document.querySelector('#perPageCat');
numberPages.addEventListener("change", function () {
    let dataNumber = numberPages.value;
    let query = `numberPages=${dataNumber}`;
    fetch(`cats/perPage?`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: query,
    })
        .then(response => {
            if (response.status == 200) {
                window.location.replace("/cats")
            }
        })
});