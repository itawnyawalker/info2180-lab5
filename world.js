
window.onload = function () {
    var btn1 = document.querySelector("#lookup");
    var input = document.querySelector("#country");
    var result = document.querySelector("#result");
    var btn2 = document.querySelector("#clookup");

    btn1.addEventListener('click', function(element){
        element.preventDefault();
        fetch('http://localhost/info2180-lab5/world.php?country='+ input.value.trim() + '&context=', {method: 'GET'})
            .then(response => response.text())
            .then(data => {
                result.innerHTML = data
            })
            .catch(error => {
                console.log(error)
            });
    })

    btn2.addEventListener('click', function(element){
        element.preventDefault();
        fetch('http://localhost/info2180-lab5/world.php?country='+ input.value.trim() + '&context=cities', {method: 'GET'})
            .then(response => response.text())
            .then(data => {
                result.innerHTML = data
            })
            .catch(error => {
                console.log(error)
            });
    })

}