function validateRegister() {
    let name = document.getElementById("regName").value;
    let email = document.getElementById("regEmail").value;
    let password = document.getElementById("regPassword").value;
    let confirmPassword = document.getElementById("regConfirm").value;

    if (name === "" || email === "" || password === "" || confirmPassword === "") {
        alert("Please fill in all fields.");
        return false;
    }

    if (!email.includes("@") || !email.includes(".")) {
        alert("Please enter a valid email.");
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false;
    }

    alert("Registration successful (demo only)!");
    return true;
}
