function do_login() {
    $('span[id^="error"]').remove();
    var uname = $("#uname").val();
    var pass = $("#password").val();
    if (uname != "" && pass != "") {
        $.ajax
            ({
                type: 'post',
                url: 'sign_in.php',
                data: {
                    do_login: "do_login",
                    uname: uname,
                    password: pass
                },
                success: function (response) {
                    try {
                        var res =
                            $.parseJSON(response);
                    }
                    catch (e) { }
                    if (response != 'fail') {
                        console.log(res);
                        if (res.type == 'user')
                            window.location.href = "home_user.php?uid=" + res.user_id;
                        else window.location.href = "home_admin.php?uid=" + res.user_id;
                    }
                    else $('#btn').after('<span id="errorInput" style="color: #FF0000;">Invalid user credentials</span>');

                }
            });
    }

    else {
        if (pass.length < 1) {
            $('#password').after('<span id="errorPass" class="error">Password required</span>');
        }
        if (uname.length < 1) {
            $('#uname').after('<span id="errorUname" class="error">Username required</span>');
        }

    }
    return false;
}