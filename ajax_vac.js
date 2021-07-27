document.getElementById("vacform").addEventListener("submit", postData);

function postData(e) {
    e.preventDefault();

    const form = {name: document.getElementById("name1"),
                    age: document.getElementById("age1"),
                    email: document.getElementById("email1"),
                    phone: document.getElementById("phone1"),
                    gender: document.getElementById("gender1"),
                    vaccine: document.getElementById("vac-type")};

    const params = `name=${form.name.value}&age=${form.age.value}&email=${form.email.value}&phone=${form.phone.value}&gender=${form.gender.value}&vaccine=${form.vaccine.value}`;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "vaccine.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        console.log(this.responseText);
    }

    xhr.send(params);

    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status >= 200 && xhr.status <=400) {
            alert("You are successfully registered for COVID-19 Vaccine");
            document.getElementById("vacform").reset();
        }
    }


}