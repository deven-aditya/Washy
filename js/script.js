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

function fn_ValRegister()
{
    var sMsg = "";
    const errorBox = document.getElementById("errorMsgReg");
    errorBox.innerHTML = "";

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

    if(sMsg != "")
    {
        errorBox.innerHTML = sMsg;
        return false;
    } else
    {
        return true;
    }
}