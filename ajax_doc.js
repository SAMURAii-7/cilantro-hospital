document.getElementById("docform").addEventListener("submit", postData);

function postData(e) {
    e.preventDefault();

    const form = {name: document.getElementById("name1"),
                    age: document.getElementById("age1"),
                    email: document.getElementById("email1"),
                    phone: document.getElementById("phone1"),
                    gender: document.getElementById("gender1"),
                    doctor: document.getElementById("doc-name")};

    const params = `name=${form.name.value}&age=${form.age.value}&email=${form.email.value}&phone=${form.phone.value}&gender=${form.gender.value}&doctor=${form.doctor.value}`;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "doctor.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        console.log(this.responseText);
    }

    xhr.send(params);

    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status >= 200 && xhr.status <=400) {
            alert("Your appointment has been booked successfully");
            document.getElementById("docform").reset();
        }
    }


}