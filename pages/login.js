document.getElementById("loginForm").addEventListener("submit", postData);

function postData(e) {
    e.preventDefault();

    const form = {userName: document.getElementById("uname"),
                    password: document.getElementById("pwd")};

    const params = `userName=${form.userName.value}&password=${form.password.value}`;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send(params);

    alert("Login Successful");
    if(xhr.status >= 200 && xhr.status <=400) {
        eval(xhr.responseText);
    }
    document.getElementById("loginForm").reset();


}