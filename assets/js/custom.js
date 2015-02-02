function addNewUser(reset) {
    $.ajax({
        url: "addNewUser",
        type: (reset === "TRUE") ? "GET" : "POST",
        data: (reset === "TRUE") ? "" : $('#addNewUser').serialize(),
    }).done(function (data) {
        $('.modal-content').html(data);
    });
}

function updateUsersList() {
    $.ajax({
        url: "usersList",
        type: "GET",
        data: "request=AJAX",
    }).done(function (data) {
        $('#mainContent').html(data);
    });
}

$(function () {
    $('#closemodal').click(function () {
        $('#user-list').modal('hide');
    });
    $('#user-list').on('hide.bs.modal', function (e) {
        addNewUser("TRUE");
        updateUsersList();
    });
});
