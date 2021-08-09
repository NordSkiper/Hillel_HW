
var tableCreationButton = document.querySelector('.create-table');
var tableVerificationButton = document.querySelector('.table-verification-button');
var tableAddInformation = document.querySelector('.table-add-information');
var buttonForInputData = document.querySelector(".show-form-insert")

console.log(tableCreationButton);

buttonForInputData.addEventListener('click', function (){
    showForm('.form-insert');
    showForm('.table-add-information');
});

function showForm(e){
    var element = document.querySelector(e);
    if(element.classList.contains('hidden')){
        element.classList.remove('hidden');
    }else{
        element.classList.add('hidden');
    }
}

tableCreationButton.classList.remove('hidden');

tableVerificationButton.addEventListener('click', function (){
    var message = document.querySelector('.tableMessage');
    // if(false){
    //     tableCreationButton.classList.add('hidden');
    //     message.classList.remove('hidden');
    // }else{
        tableCreationButton.classList.remove('hidden');
    // }
});

tableCreationButton.addEventListener("click", function (){
    document.querySelector('.tableMessage').classList.remove('hidden');
});

tableAddInformation.addEventListener('click', function (){sendJSON()});

function sendJSON(){

    var form = document.querySelector('.form-insert');
    var name = form.querySelector('.name');
    var surname = form.querySelector('.surname');
    var age = form.querySelector('.age');
    var email = form.querySelector('.email');
    var phone = form.querySelector('.phone');
    var result = document.querySelector(".result")

    var xhr = new XMLHttpRequest();
    var url = "json.php";
    xhr.open("POST", url, true);
    // xhr.setRequestHeader("Content-Type", "application/json");

    var data = JSON.stringify({
        "name": name.value,
        "surname": surname.value,
        "age": age.value,
        "email": email.value,
        "phone": phone.value
    });

    xhr.send(data);

    xhr.onreadystatechange = function () {
        // если запрос принят и сервер ответил, что всё в порядке
        if (xhr.readyState === 4 && xhr.status === 200) {
            // выводим то, что ответил нам сервер — так мы убедимся, что данные он получил правильно
            result.innerHTML = this.responseText;
        }
    };

}