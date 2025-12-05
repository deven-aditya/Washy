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

function countPrice(service_type, weight)
{
    let price = 0;
    const priceBox = document.getElementById("count_price");
    if(service_type === 'Express')
    {
        price = 12000 * weight;
    } else if(service_type === 'Regular')
    {
        price = 6000 * weight;
    } 

    priceBox.innerHTML = "Rp " + price.toLocaleString();
}

function ValCustomer()
{
    var sMsg = "";
    const errorBox = document.getElementById("errorMsgCus");
    errorBox.innerHTML = "";

    const first_name = document.getElementById("first_name").value;
    const last_name = document.getElementById("last_name").value;
    const house_address = document.getElementById("house_address").value;
    const email_address = document.getElementById("email_address").value;
    const phone_number = document.getElementById("phone_number").value;

    if(phone_number == "")
    {
        sMsg = "\nYou haven't filled in customer's Phone Number";
    }

    if(email_address == "")
    {
        sMsg = "\nYou haven't filled in customer's Email Address";
    }

    if(house_address == "")
    {
        sMsg = "\nYou haven't filled in customer's House Address";
    }

    if(last_name == "")
    {
        sMsg = "\nYou haven't filled in customer's Last Name";
    }

    if(first_name == "")
    {
        sMsg = "\nYou haven't filled in customer's First Name";
    }

    if(first_name == "" && last_name == "" && house_address == "" && email_address == "" && phone_number == "")
    {
        sMsg = "\nYou haven't filled in anything";
    }

    if (!validateEmail(email_address) && email_address != "")
    {
        sMsg = "Please enter a valid email address";
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

function ValTrans()
{
    var sMsg = "";
    const errorBox = document.getElementById("errorMsgTrans");
    errorBox.innerHTML = "";

    const nama_customer = document.getElementById("nama_customer").value;
    const service_type = document.getElementById("service_type").value;
    const weight = document.getElementById("weight").value;

    if(weight == "")
    {
        sMsg = "\nYou haven't filled in customer's laundry weight";
    }

    if(service_type == "null")
    {
        sMsg = "\nYou haven't filled in customer's service type";
    }

    if(nama_customer == "null")
    {
        sMsg = "\nYou haven't filled in customer's name";
    }

    if(weight == "" && service_type == "null" && nama_customer == "null")
    {
        sMsg = "\nYou haven't filled in anything";
    }

    if(weight < 1 && weight != "")
    {
        sMsg = "\nLaundry Weight can't be less than 0 kg";
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