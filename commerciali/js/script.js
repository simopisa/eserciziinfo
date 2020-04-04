function controllo() {
    if (document.getElementById("user").value=="") {
        document.getElementById("user").style.border="2px solid red";
        document.getElementById("user").placeholder="username required";
        return false;
    }
    if (document.getElementById("password").value=="") {
        document.getElementById("password").style.border="2px solid red";
        document.getElementById("password").placeholder="password required";
        return false;
    }
    
}