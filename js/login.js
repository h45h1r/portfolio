window.onload = function() {
    // Parse the URL query string
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        // Check if the error parameter is passed with 'invalid' value
        if(pair[0] == "error" && pair[1] == "invalid") {
            alert("Invalid email or password!");
            // Clear the query string after showing the message
            window.history.replaceState({}, document.title, "login.html");
            break;
        }
    }
}