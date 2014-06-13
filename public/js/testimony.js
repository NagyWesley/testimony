$(document).ready(function() {
    $(".test").click(function() {
        alert("God is Good");
    });
    $("#logout").click(function() {
        $.ajax({
            type: "POST",
            url: "/application/login/logout",
            success: function(response) {
                location.reload();
            },
            error: function(response) {

            }

        });
    });

    var pathname = window.location.pathname.substring(0, 10);

       
    switch (pathname) {
        case "/words":
            $("#word-nav").addClass("active");
            break;
        case "/share":
            $("#share-nav").addClass("active");
            break;
        case "/":
            $("#home-nav").addClass("active");
            break;
            case "/testimony":
                $("#test-nav").addClass("active");
            break;
        case "/login":

            break;
        case "/registrat":
            break;
        case "/":
            $("#home-nav").addClass("active");
            break;
        default:
            $("#home-nav").addClass("active");
    }
});

