
document.getElementById("btnout").disabled = true;

$("#btnin").click(function (e) {
    e.preventDefault();
    document.getElementById("btnin").disabled = true;
    document.getElementById("btnout").disabled = false;
});

$("#btnout").click(function (e) {
    e.preventDefault();
    document.getElementById("btnin").disabled = false;
    document.getElementById("btnout").disabled = true;
});