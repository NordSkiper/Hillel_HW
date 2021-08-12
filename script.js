let tableCreationButton = document.getElementsByClassName('create-table')[0];
let tableVerificationButton = document.querySelector('.table-verification-button');

let tableAddInformation = document.querySelector('.table-add-information');
let InputDataButton = document.querySelector(".show-form-insert")
let phoneCheckBox = document.querySelector('.phone-checkbox');

let inputId = document.querySelector('.all-id-div');
// let allId = document.querySelector('.all-id');

let showUserButton = document.querySelector('.showUserButton');
let selectUserId = document.querySelector('.selectUserId');

let selectUserIdDel = document.querySelector('.selectDeleteUser');
let deleteUserButton = document.querySelector('.deleteUserButton');

//all id output to select
userInSelect();

phoneCheckBox.addEventListener('change', function () {
    showForm('.phone');
});

InputDataButton.addEventListener('click', function () {
    showForm('.form-insert');
    showForm('.table-add-information');
});

showUserButton.addEventListener('click', function () {

    let data = JSON.stringify({
        "id": selectUserId.value,
    });
    sendJSON(data);

})

tableVerificationButton.addEventListener('click', function () {
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

deleteUserButton.addEventListener('click', function () {

    let selectedValues = Array.from(selectUserIdDel.selectedOptions)
        .map(option => option.value);

    let data = JSON.stringify({
        "id-delete": selectedValues,
    });
    sendJSON(data);
});

function showForm(e) {
    let element = document.querySelector(e);
    if (element.classList.contains('hidden')) {
        element.classList.remove('hidden');
    } else {
        element.classList.add('hidden');
    }
}

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
                    result.innerHTML = this.responseText;
                    userInSelect();
                    break
                case 'Table created':
                    document.querySelector('.tableMessage').classList.remove('hidden');
                    break
                case 'deleted':
                    document.querySelector(".result-deleted").innerHTML = "User has been deleted";
                    userInSelect();
                    break
                default:

                    // console.log(xhr.responseText);
                    const userInformation = JSON.parse(xhr.responseText);

                    if (userInformation['allId']) {
                        showAllId(userInformation);
                    } else {

                        if (document.querySelector(".user-information-show")) {
                            document.querySelector(".user-information-show").remove();
                            showData(userInformation);
                        } else {
                            showData(userInformation);
                        }

                    }
                    break;
            }
        }
    }
}

function createOption(id_paremter) {
    let id = id_paremter;
    let option = document.createElement('option');
    option.classList.add('id' + id);
    option.value = id;
    option.textContent = 'Id ' + id;
    return option;
}

function showAllId(data) {
    selectUserIdDel.textContent = '';
    selectUserId.textContent = '';

    Object.keys(data).forEach(key => {
        if (key !== 'allId') {
            Object.keys(data[key]).forEach(keys => {

                let id = data[key][keys];

                selectUserId.appendChild(createOption(id));
                selectUserIdDel.appendChild(createOption(id));

            });
        }
    });
}

function showData(data) {

    let div = document.createElement('div');
    div.classList.add('user-information-show');
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

    div.appendChild(name);
    div.appendChild(surname);
    div.appendChild(age);
    div.appendChild(email);
    if (data[0].phone) {
        div.appendChild(phone);
    }
    inputId.insertAdjacentElement('beforeend', div);
}

function userInSelect() {
    selectUserId.textContent = "";
    let usersId = JSON.stringify({
        "all-id": 1,
    });
    sendJSON(usersId);
}