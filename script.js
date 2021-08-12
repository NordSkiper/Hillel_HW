let tableCreationButton = document.getElementsByClassName('create-table')[0];
let tableVerificationButton = document.querySelector('.table-verification-button');
let tableAddInformation = document.querySelector('.table-add-information');
let InputDataButton = document.querySelector(".show-form-insert")
let phoneCheckBox = document.querySelector('.phone-checkbox');
let inputId = document.querySelector('.all-id-div');
let allId = document.querySelector('.all-id');

phoneCheckBox.addEventListener('change', function () {
    showForm('.phone');
});

InputDataButton.addEventListener('click', function () {
    showForm('.form-insert');
    showForm('.table-add-information');
});

function showForm(e) {
    let element = document.querySelector(e);
    if (element.classList.contains('hidden')) {
        element.classList.remove('hidden');
    } else {
        element.classList.add('hidden');
    }
}


allId.addEventListener('click', function (){

    let data = JSON.stringify({
        "all-id": 1,
    });

    sendJSON(data);
});

//Переробити, все неправильно
// inputId.addEventListener('click', function () {
//
//     let data = JSON.stringify({
//         "id": 1,
//     });
//     sendJSON(data);
//
// })

tableVerificationButton.addEventListener('click', function () {
    let message = document.querySelector('.tableMessage');

    let data = JSON.stringify({
        "table": 1,
    });
    sendJSON(data);
});

tableCreationButton.addEventListener("click", function () {
    let data = JSON.stringify({
        "tableCreation": 1,
    });
    sendJSON(data);
});

tableAddInformation.addEventListener('click', function () {

    let form = document.querySelector('.form-insert');
    let name = form.querySelector('.name');
    let surname = form.querySelector('.surname');
    let age = form.querySelector('.age');
    let email = form.querySelector('.email');
    let phone = form.querySelector('.phone');

    let data = JSON.stringify({
        "name": name.value,
        "surname": surname.value,
        "age": age.value,
        "email": email.value,
        "phone": phone.value
    });

    sendJSON(data);

});

function sendJSON(data) {

    let xhr = new XMLHttpRequest();
    let url = "json.php";
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
                    let result = document.querySelector(".result")
                    let message = 'Данные внесены в таблицу'
                    result.innerHTML = message;
                    break
                case 'Table created':
                    document.querySelector('.tableMessage').classList.remove('hidden');
                    break
                default:

                    const userInformation = JSON.parse(xhr.responseText);

                    if (userInformation['allId']){
                        showAllId(userInformation);
                    }else{
                        console.log(userInformation[0]);
                        let id_container = document.querySelector(".id" + userInformation[0].id);
                        console.log(id_container);


                        if (id_container.classList.contains('fill')) {
                            let div = document.querySelector('.id-' + userInformation[0].id)
                            console.log(div);
                            id_container.classList.remove('fill');
                            div.remove();
                        } else {
                            showData(userInformation);
                        }
                    }

                    break
            }

        }
    };
}

function showAllId(data)
{
    inputId.textContent = '';

    Object.keys(data).forEach(key => {

        if(key !== 'allId'){
            Object.keys(data[key]).forEach(keys => {



                //create div content for each id
                let id = data[key][keys];
                let div = document.createElement('div');
                div.classList.add('id');
                div.classList.add('id' + id);
                div.textContent = 'Id ' + id;

                //create button
                let deleteButton = document.createElement('button')
                deleteButton.classList.add('id' + id);
                deleteButton.textContent = 'Удалить Id' + id;

                inputId.appendChild(deleteButton);
                inputId.appendChild(div);



                //create appearance all information about id
                div.addEventListener('click', function () {
                    let data = JSON.stringify({
                        "id": id,
                    });
                    sendJSON(data);
                });
            });
        }

    });
}

function showData(data) {
    let id = data[0].id;
    let id_container = document.querySelector(".id" + id);
    let div = document.createElement('div');
    div.classList.add('id-' + id);
    let name = document.createElement('p');
    let surname = document.createElement('p');
    let age = document.createElement('p');
    let email = document.createElement('p');
    let phone = document.createElement('p');

    name.textContent = 'Name: ' + data[0].name;
    surname.textContent = 'Surname: ' + data[0].surname;
    age.textContent = 'Age: ' + data[0].age;
    email.textContent = 'Email: ' + data[0].email;
    if (data[0].phone) {
        phone.textContent = 'Phone: ' + data[0].phone;
    }

    id_container.insertAdjacentElement('afterend', div);
    div.appendChild(name);
    div.appendChild(surname);
    div.appendChild(age);
    div.appendChild(email);
    if (data[0].phone) {
        div.appendChild(phone);
    }
    id_container.classList.add('fill');
}