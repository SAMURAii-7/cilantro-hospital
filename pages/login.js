document.getElementById("loginForm").addEventListener("submit", postData);

function postData(e) {
    e.preventDefault();

    const form = {
        userName: document.getElementById("uname"),
        password: document.getElementById("pwd")
    };

    const params = `userName=${form.userName.value}&password=${form.password.value}`;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send(params);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                ev = xhr.responseText
                if (ev === "die") {
                    alert("Login Unsuccessful\nUsername/Password is incorrect")
                } else {
                    alert("Login Successful")
                    eval(xhr.responseText)
                }
            }
        }
    }
    document.getElementById("loginForm").reset();
}