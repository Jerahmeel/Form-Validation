

// var stat = $('#status').val()
// if (stat == "statusform") {

document.getElementById('btnout').disabled = true;

// }


$(document).ready(function () {
//AJAX BABEH
$('#btnin').on('click', function () {
    var uname = $('#username').val(),
        tin = $('#timein').val(),
        din = $('#datein').val(),
        tout = $('#timeout').val(),
        stat = $('#status').val(),
        dout = $('#dateout').val()
      

    if (uname == "" || din == "" ) {
        alert('all fields are required!');
    } else {
        $.ajax({
            type: 'POST',
            url: 'insert.php',
            data: {
                username: uname,
                datein: din,
                timein: tin,
                dateout: dout,
                timeout: tout,
                status :stat
              
            },
            success: function (data) {
                $('#retrieve').html(data);
                document.getElementById('statusform').style.visibility = "hidden";
                document.getElementById('status').style.visibility = "visible";

                document.querySelector('#status').value ="On Work";
                document.getElementById('btnin').disabled = true;
                document.getElementById('btnout').disabled = false;
            }
        });
    }

});

    $('#btnout').on('click', function () {
        var uname = $('#username').val(),
            tin = $('#timein').val(),
            din = $('#datein').val(),
            tout = $('#timeout').val(),
            stat = $('#status').val(),
            dout = $('#dateout').val()


        if (uname == "" || din == "") {
            alert('all fields are required!');
        } else {
            $.ajax({
                type: 'POST',
                url: 'out.php',
                data: {
                    username: uname,
                    datein: din,
                    timein: tin,
                    dateout: dout,
                    timeout: tout,
                    status: stat

                },
                success: function (data) {
                    $('#retrieve').html(data);
                    document.getElementById('statusform').style.visibility = "hidden";
                    document.getElementById('status').style.visibility = "visible";

                    document.querySelector('#status').value = "Out";
                    document.getElementById('btnin').disabled = false;
                    document.getElementById('btnout').disabled = true;
                }
            });
        }

    });


});



function startTime() {

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yy = today.getFullYear();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    //Add a zero in front of numbers<10
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + " : " + min + " : " + sec;
    document.getElementById("date").innerHTML = dd + " / " + mm + " / " + yy;
    document.querySelector('#timein').value = hr + " : " + min + " : " + sec;
    document.querySelector('#timeout').value = hr + " : " + min + " : " + sec;
    document.querySelector('#datein').value = dd + " / " + mm + " / " + yy;
    document.querySelector('#dateout').value = dd + " / " + mm + " / " + yy;
    var time = setTimeout(function () { startTime() }, 500);



}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
