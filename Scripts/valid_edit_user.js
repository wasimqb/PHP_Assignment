function do_edit_user() {
    $('span[id^="error"]').remove();
    var name = $("#name").val();
    var pass = $("#pass").val();
    var addr = $("#addr").val();
    var fon = $("#fon").val();
    var dept = $("#dept").val();
    var location = $("#location").val();
    
    if (name != "" && fon != "" && dept != "" && addr != "" && location != "" && fon.length == 10) {
        $.ajax
            ({
                type: 'post',
                url: 'update_user.php',
                data: {
                    do_edit_user: "do_edit_user",
                    name: name,
                    pass: pass,
                    addr: addr,
                    fon: fon,
                    dept: dept,
                    location: location
                },
                success: function (response) {
                            window.location.href = "home_user.php?uid=" + response;
                }
            });
    }

    else {
        if (name.length < 1) {
            $('#name').after('<span id="errorPass" class="error">Name required</span>');
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
}

function validatePhone(txtPhone) {
    var a = txtPhone;
    alert(a);
    var filter = /^[0-9]{10}$/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}