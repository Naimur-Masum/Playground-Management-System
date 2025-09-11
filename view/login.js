let emailReg=/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;


function validateLogin() {
    let email = document.getElementById("loginEmail").value;
    let password = document.getElementById("loginPassword").value;
    let emailErr = document.getElementById("emailErr");
    console.log(email);
    console.log(emailReg.test(email));
    if (email === "" || password === "") {
        alert("Please fill in all fields.");
        return false;
    }

    if (!emailReg.test(email)) {
        /*console.log("here");*/
        /*alert("Please enter a valid email.");*/
        emailErr.innerHTML="Please provide an userName";
        emailErr.style.color="red";

        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    alert("Login successful");
    return true;
}
