function fn_ValLogin()
{
    var sMsg = "";
    const errorBox = document.getElementById("errorMsg");
    errorBox.innerHTML = "";

    if(document.getElementById("username").value == "")
    {
        sMsg = "\nAnda belum mengisikan username";
    }

    if(document.getElementById("password").value == "")
    {
        sMsg = "\nAnda belum mengisikan password";
    }

    if(document.getElementById("username").value == "" && document.getElementById("password").value == "")
    {
        sMsg = "\nAnda belum mengisikan username dan password";
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