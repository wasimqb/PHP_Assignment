function do_register() {
    $('span[id^="error"]').remove();
    var uname = $("#uname").val();
    var name = $("#name").val();
    var email = $("#email").val();
    var pass = $("#pass").val();
    var addr = $("#addr").val();
    var fon = $("#fon").val();
    var dept = $("#dept").val();
    var location = $("#location").val();
    var x = username_check();
    var uname_check = x.responseText;
    var y = email_check();
    var em_check = y.responseText;
    if (name != "" && fon != "" && dept != "" && addr != "" && location != "" && fon.length == 10 &&
        uname != "" && pass != "" && email != "" && uname_check == "not exist" && em_check=="not exist" ) {
        
            alert("Hi");
            $.ajax
            ({
                type: 'post',
                url: 'registration.php',
                data: {
                    do_register: "do_register",
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
                    if(response == "successful"){
                       window.location.href = "index.php";
                    }
                }
            });
    }
    else{
        if (name.length < 1) {
            $('#name').after('<span id="errorPass" class="error">Name required</span>');
        }
        if (uname.length < 1) {
            $('#uname').after('<span id="errorPass" class="error">Username required</span>');
        }
        if (pass.length < 1) {
            $('#pass').after('<span id="errorPass" class="error">Password required</span>');
        }
        if (email.length < 1) {
            $('#email').after('<span id="errorPass" class="error">Email required</span>');
        }
        if (addr.length < 1) {
            $('#addr').after('<span id="errorUname" class="error">Address required</span>');
        }
        if (fon.length != 10) {
            $('#fon').after('<span id="errorUname" class="error">Phone number invalid</span>');
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

function username_check() {
    var uname = $("#uname").val();
    if (uname.length >= 1) {
        $("#uname").next("span").remove();
       return $.ajax
            ({
                type: 'post',
                url: 'registration.php',
                data: {
                    do_check_uname: "do_check_uname",
                    uname: uname
                },
                async: false,
                success: function (response) {
                    var data = response;
                    if (data == "not exist") {
                        $("#uname").after('<span id="xavailable" class="error"></span>');
                    }
                    else {
                        $("#uname").after('<span id="xerror_available" class="error"> Username already taken</span>');
                    }
                }
            });
            return data;
    }
};

function email_check() {
    var email = $("#email").val();
    if(email.length>1){
        $("#email").next("span").remove();
        return $.ajax
            ({
                type: 'post',
                url: 'registration.php',
                data: {
                    do_check_email: "do_check_email",
                    email: email
                },
                async: false,
                success: function (response) {
                    var data = response;
                    if (data != "not exist") {
                        $("#email").after('<span id="xavailable" class="error"> Email already exists</span>');
                    }
                }
            });
            return data;
    }
};   