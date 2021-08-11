var tableCreationButton = document.getElementsByClassName('create-table')[0];
var tableVerificationButton = document.querySelector('.table-verification-button');
var tableAddInformation = document.querySelector('.table-add-information');
var InputDataButton = document.querySelector(".show-form-insert")
var phoneCheckBox = document.querySelector('.phone-checkbox');
var inputId = document.querySelector('.id');

phoneCheckBox.addEventListener('change', function () {
    showForm('.phone');
});

InputDataButton.addEventListener('click', function () {
    showForm('.form-insert');
    showForm('.table-add-information');
});

function showForm(e) {
    var element = document.querySelector(e);
    if (element.classList.contains('hidden')) {
        element.classList.remove('hidden');
    } else {
        element.classList.add('hidden');
    }
}

inputId.addEventListener('click', function(){

    var data = JSON.stringify({
        "id": 1,
    });
    sendJSON(data);

})

tableVerificationButton.addEventListener('click', function () {
    var message = document.querySelector('.tableMessage');

    var data = JSON.stringify({
        "table": 1,
    });
    sendJSON(data);
});

tableCreationButton.addEventListener("click", function () {
    var data = JSON.stringify({
        "tableCreation": 1,
    });
    sendJSON(data);
});



tableAddInformation.addEventListener('click', function () {

    var form = document.querySelector('.form-insert');
    var name = form.querySelector('.name');
    var surname = form.querySelector('.surname');
    var age = form.querySelector('.age');
    var email = form.querySelector('.email');
    var phone = form.querySelector('.phone');

    var data = JSON.stringify({
        "name": name.value,
        "surname": surname.value,
        "age": age.value,
        "email": email.value,
        "phone": phone.value
    });

    sendJSON(data);

});

function sendJSON(data) {

    var xhr = new XMLHttpRequest();
    var url = "json.php";
    xhr.open("POST", url, true);
    // xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(data);

    xhr.onreadystatechange = function () {

        if (xhr.readyState === 4 && xhr.status === 200) {

            switch (this.responseText) {
                case 'Table exist':
                    document.querySelector('.tableMessage').classList.remove('hidden');
                    break
                case 'Table not exist':
                    tableCreationButton.classList.remove('hidden');
                    break
                case 'Data has been insert':
                    var result = document.querySelector(".result")
                    var message = 'Данные внесены в таблицу'
                    result.innerHTML = message;
                    break
                case 'Table created':
                    document.querySelector('.tableMessage').classList.remove('hidden');
                    break
                default:
                    // this.responseType = 'json'
                    // console.log(xhr.responseText);
                    // var userInformation = JSON.parse(xhr.responseText);
                    //
                    var result1 = document.querySelector(".result1")
                    result1.innerHTML = this.responseText;
                    console.log(this.responseText);


                    break
            }

        }
    };
}