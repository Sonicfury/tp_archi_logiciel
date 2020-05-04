const validateButton = document.getElementById('validate-button');
const getUsersButton = document.getElementById('get-users-button');
const deleteUserButton = document.getElementById('delete-user-button');
const deleteAllUsersButton = document.getElementById('delete-all-users-button');
const result = document.getElementById('request-result');
const usersList = document.getElementById('users-list');
const lastName = document.querySelector("input[name='lastname']");
const firstName = document.querySelector("input[name='firstname']");
const tel = document.querySelector("input[name='tel']");
const email = document.querySelector("input[name='email']");
const idToDelete = document.querySelector("input[name='id-to-delete']");

const BASE_URI = 'http://localhost/TP_IHAB_04-mai/exercice1/middle';

validateButton.addEventListener('click', function (e) {
    e.preventDefault();
    addUser();
});

getUsersButton.addEventListener('click', function (e) {
    e.preventDefault();
    fetchUsers();
});

deleteUserButton.addEventListener('click', function (e) {
    e.preventDefault();
    deleteUser();
});

deleteAllUsersButton.addEventListener('click', function (e) {
    e.preventDefault();
    if (confirm('You sure ?')){
        deleteAllUsers();
    }
});

const fetchUsers = function () {
    fetch(BASE_URI + '/getUser')
        .then((response) => {
            return response.json();
        })
        .then(res => {
            usersList.innerHTML = '';
            res.forEach(i => {
                let user = document.createElement('li');
                user.innerText = `ID:${i.id} Nom:${i.lastname} Prenom:${i.firstname}`;
                usersList.appendChild(user);
            })
        })
};

const addUser = function () {
    const config = {
        method: 'POST',
        body: "lastname=" + lastName.value
            + "&firstname=" + firstName.value
            + "&tel=" + tel.value
            + "&email=" + email.value,
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
        }
    };
    fetch(BASE_URI + '/addUser', config).then((response) => {
        return response.json()
    }).then(res => {
        result.innerHTML = '';
        result.innerHTML += res.message;
    })
};

const deleteUser = function () {
    const config = {
        method: 'POST',
        body: "id-to-delete=" + idToDelete.value,
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
        }
    };
    fetch(BASE_URI + '/deleteUser', config).then((response) => {
        return response.json()
    });
};

const deleteAllUsers = function () {
    const config = {
        method: 'POST',
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
        }
    };
    fetch(BASE_URI + '/deleteAllUsers', config).then((response) => {
        return response.json()
    });
};