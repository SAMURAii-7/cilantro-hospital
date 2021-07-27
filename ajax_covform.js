document.getElementById("covform").addEventListener("submit", postData);

function postData(e) {
    e.preventDefault();

    const form = {name: document.getElementById("name1"),
                    age: document.getElementById("age1"),
                    email: document.getElementById("email1"),
                    phone: document.getElementById("phone1"),
                    gender: document.getElementById("gender1")};

    const params = `name=${form.name.value}&age=${form.age.value}&email=${form.email.value}&phone=${form.phone.value}&gender=${form.gender.value}`;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "testform.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        console.log(this.responseText);
    }

    xhr.send(params);

    // if(xhr.status == 200) {
    //     alert("You are successfully registered for COVID-19 Test");
    //     document.getElementById("covform").reset();
    // }
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status >= 200 && xhr.status <=400) {
            alert("You are successfully registered for COVID-19 Test");
            document.getElementById("covform").reset();
        }
    }
    
}
