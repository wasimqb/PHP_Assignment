function do_add_user() {
    $('span[id^="error"]').remove();
    var uname = $("#uname").val();
    var name = $("#name").val();
    var email = $("#email").val();
    var pass = $("#pass").val();
    var addr = $("#addr").val();
    var fon = $("#fon").val();
    var dept = $("#dept").val();
    var location = $("#location").val();

    if (uname.length >= 1) {
        var x = username_check();
        var uname_check = x.responseText;
    }
    if (email.length >= 1) {
        var y = email_check();
        var em_check = y.responseText;
    }
    if (name != "" && fon != "" && dept != "" && addr != "" && location != "" && fon.length == 10 &&
        uname != "" && pass != "" && pass.length > 6 && email != "" && uname_check == "not exist" &&
        em_check == "not exist" && isEmail(email) && isFon(fon)) {
        $.ajax
            ({
                type: 'post',
                url: 'adding_user_admin.php',
                data: {
                    do_add_user: "do_add_user",
                    uname: uname,
                    name: name,
                    email: email,
                    pass: pass,
                    addr: addr,
                    fon: fon,
                    dept: dept,
                    location: location
                },
                success: function (response) {
                    if (response == "successful") {
                        window.location.href = "home_admin.php";
                    }
                }
            });
    }
    else {
        if (name.length < 1) {
            $('#name').after('<span id="errorPass" class="error">Name required</span>');
        }
        if (uname.length < 1) {
            $('#uname').after('<span id="errorUname" class="error">Username required</span>');
        }
        if (pass.length <= 6) {
            $('#pass').after('<span id="errorPass" class="error">Password must be atleast 6 characters</span>');
        }
        if (email.length < 1) {
            $('#email').after('<span id="errorPass" class="error">Email required</span>');
        } else if (!isEmail(email)) {
            $('#email').after('<span id="errorEmail" class="error">Email invalid</span>');
        }
        if (addr.length < 1) {
            $('#addr').after('<span id="errorUname" class="error">Address required</span>');
        }
        if (fon.length < 1) {
            $('#fon').after('<span id="errorUname" class="error">Phone number required</span>');
        } else if (!isFon(fon)) {
            $('#fon').after('<span id="errorFon" class="error">Phone number invalid</span>');
        }
        if (dept.length < 1) {
            $('#dept').after('<span id="errorUname" class="error">Department required</span>');
        }
        if (location.length < 1) {
            $('#location').after('<span id="errorUname" class="error">Location required</span>');
        }
    }
    return false;
};

//Function to check if username exists
function username_check() {
    var uname = $("#uname").val();
    if (uname.length >= 1) {
        $("#uname").next("span").remove();
        return $.ajax
            ({
                type: 'post',
                url: 'adding_user_admin.php',
                data: {
                    do_check_uname: "do_check_uname",
                    uname: uname
                },
                async: false,
                success: function (response) {
                    var data = response;
                    if (data == "not exist") {
                        $("#uname").after('<span id="erroravailable" class="error"></span>');
                    }
                    else {
                        $("#uname").after('<span id="error_available" class="error"> Username already taken</span>');
                    }
                }
            });
        return data;
    }
}

//Function to check if email exists
function email_check() {
    var email = $("#email").val();
    if (email.length > 1) {
        $("#email").next("span").remove();
        return $.ajax
            ({
                type: 'post',
                url: 'adding_user_admin.php',
                data: {
                    do_check_email: "do_check_email",
                    email: email
                },
                async: false,
                success: function (response) {
                    var data = response;
                    if (data != "not exist") {
                        $("#email").after('<span id="erroravailable" class="error"> Email already exists</span>');
                    }
                }
            });
        return data;
    }
}

function pass_strength() {
    var pass = $("#pass").val();

    if (pass.length != 0 && pass.length < 6) {
        $("#pass").next("span").remove();
        $('#pass').after('<span id="errorPass" class="error">Weak</span>');
        return "low";
    }
    if (pass.length != 0 && pass.length > 6) {
        $("#pass").next("span").remove();
        $('#pass').after('<span id="errorPass" class="strongPass">Strong</span>');
    }
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function isFon(fon) {
    var regexfon = /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
    return regexfon.test(fon);
}