function fn_ValLogin()
{
    var sMsg = "";
    const errorBox = document.getElementById("errorMsg");
    errorBox.innerHTML = "";

    if(document.getElementById("username").value == "")
    {
        sMsg = "\nYou haven't filled in your Username";
    }

    if(document.getElementById("password").value == "")
    {
        sMsg = "\nYou haven't filled in your password";
    }

    if(document.getElementById("username").value == "" && document.getElementById("password").value == "")
    {
        sMsg = "\nYou haven't filled in your username and password";
    }

    if(sMsg != "")
    {
        errorBox.innerHTML = sMsg;
        return false;
    } else
    {
        return true;
    }
}

function validateEmail(email)
{
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function validatePassword(password)
{
    const regex = /^(?=.*[A-Za-z])(?=.*\d).{8,}$/;
    return regex.test(password);
}

function fn_ValRegister()
{
    var sMsg = "";
    const errorBox = document.getElementById("errorMsgReg");
    errorBox.innerHTML = "";

    //cek kosong
    if(document.getElementById("conf_password").value == "")
    {
        sMsg = "\nYou haven't filled in your Confirmation Password";
    }

    if(document.getElementById("password").value == "")
    {
        sMsg = "\nYou haven't filled in your Password";
    }

    if(document.getElementById("username").value == "")
    {
        sMsg = "\nYou haven't filled in your Username";
    }

    if(document.getElementById("phone_number").value == "")
    {
        sMsg = "\nYou haven't filled in your Phone Number";
    }

    if(!validateEmail(document.getElementById("email_address").value))
    {
        sMsg = "Please enter a valid email address";
    }

    if(document.getElementById("email_address").value == "")
    {
        sMsg = "\nYou haven't filled in your Email Address";
    }

    if(document.getElementById("last_name").value == "")
    {
        sMsg = "\nYou haven't filled in your Last Name";
    }

    if(document.getElementById("first_name").value == "")
    {
        sMsg = "\nYou haven't filled in your First Name";
    }

    if(document.getElementById("first_name").value == "" && document.getElementById("last_name").value == "" && document.getElementById("email_address").value == ""
    && document.getElementById("phone_number").value == "" && document.getElementById("username").value == "" && document.getElementById("password").value == "" && document.getElementById("conf_password").value == "")
    {
        sMsg = "\nYou haven't filled in anything";
    }

    if (!validateEmail(document.getElementById("email_address").value) && document.getElementById("email_address").value != "")
    {
        sMsg = "Please enter a valid email address";
    }

    if(!validatePassword(document.getElementById("password").value) && document.getElementById("password").value != "")
    {
        sMsg = "Password must be at least 8 characters and contain letters and numbers";
    }

    if(document.getElementById("password").value !== document.getElementById("conf_password").value)
    {
        sMsg = "Password and Confirmation Password do not match";
    }

    if(sMsg != "")
    {
        errorBox.innerHTML = sMsg;
        return false;
    } else
    {
        return true;
    }
}

function checkUsernameAvail()
{
    var sMsg = "";
    const errorBox = document.getElementById("errorMsgReg");
    errorBox.innerHTML = "";

    const username = document.getElementById("username").value;

    if(document.getElementById("username").value == "")
    {
        errorBox.innerHTML = "";
        return;
    }

    fetch(`/WASHY/check_user.php?username=${username}`).then(response => response.text)
}

function checkEmailAvail()
{

}