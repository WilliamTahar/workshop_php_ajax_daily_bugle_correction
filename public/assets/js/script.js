function updateHeadline(id, title, picture, content) {
    document.getElementById('headlineTitle').innerHTML = `<a href="/article?id=${id}">${title}</a>`;
    document.getElementById('headlinePicture').setAttribute('src', picture);
    document.getElementById('headlineContent').innerHTML = content;
}

document.getElementById('changeHeadlineButton').addEventListener('click', function () {
    getRandomArticle();
});

document.getElementById('searchHeadline').addEventListener('input', function(e) {
    //Here we get the value typed in the input
    let search = e.target.value;
    const ul = document.getElementById('resultList');
    ul.innerHTML = '';
    fetch('/api/articles/search?search=' + search)
        .then(response => response.json())
        .then(articles => {
            articles.forEach(article => {
                const li = document.createElement('li');
                li.innerHTML = `<a href="/article?id=${article.id}">${article.title}</a>`;
                ul.appendChild(li);
            })
        });

});

function getRandomArticle() {
    fetch('/api/articles/random')
        .then(response => response.json())
        .then(article => updateHeadline(article.id, article.title, article.picture, article.content));
}

//ICI
getRandomArticle();