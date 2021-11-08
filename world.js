
window.onload = function () {
    var btn = document.querySelector("#lookup");
    var input = document.querySelector("#country");
    var result = document.querySelector("#result");

    btn.addEventListener('click', function(element){
        element.preventDefault();
        fetch('http://localhost/info2180-lab5/world.php?country='+ input.value.trim(), {method: 'GET'})
            .then(response => response.text())
            .then(data => {
                result.innerHTML = data
            })
            .catch(error => {
                console.log(error)
            });
    })
}