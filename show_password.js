function showPassword() {
    var p = document.getElementById("password");
      if (p.type === "password") {
    p.type = "text";
    } else {
        p.type = "password";
    }
    } 