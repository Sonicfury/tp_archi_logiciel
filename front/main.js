const validateButton = document.getElementById('validate-button');
const result = document.getElementById('result');
const BASE_URI = 'http://localhost/TP_IHAB_04-mai/coursArchitectureAP2019/exercice1/';

validateButton.addEventListener('click', function (e) {
    e.preventDefault();
    const lastName = document.querySelector("input[name='lastname']");
    const firstName = document.querySelector("input[name='firstname']");
    const tel = document.querySelector("input[name='tel']");
    const email = document.querySelector("input[name='email']");

    const config = {
        method : 'POST',
        mode: 'cors',
        body : "lastname="+lastName.value
            +"&firstname="+firstName.value
            +"&tel="+tel.value
            +"&email="+email.value,
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
        }
    };
    fetch(BASE_URI+'back/testForm.php', config).then((response) => {
        return response.json()
    }).then(res => {
        result.innerHTML = '';
        result.innerHTML += res.name + " "
            + res.firstname + " "
            + res.tel + " "
            + res.email;
    })
});

