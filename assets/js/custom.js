function addNewUser(reset) {
    $.ajax({
        url: "addNewUser",
        type: (reset === "TRUE") ? "GET" : "POST",
        data: (reset === "TRUE") ? "" : $('#addNewUser').serialize(),
    }).done(function (data) {
        $('.modal-content').html(data);
    });
}

function updateUsersList(order) {
    $.ajax({
        url: "usersList",
        type: "GET",
        data: order ? order : "request=AJAX",
    }).done(function (data) {
        $('#mainContent').html(data);
    });
}

$(document).ready(function () {
    // On close modal, trigger the hide event
    $('#closemodal').click(function () {
        $('#user-list').modal('hide');
    });

    // Hide event for modal
    $('#user-list').on('hide.bs.modal', function () {
        addNewUser("TRUE");
        updateUsersList("");
    });

    // Users list table header sort
    $("#mainContent").on("click", "#userListTable th", function () {
        var order = "&sortby=" + $(this).attr('id');
        updateUsersList(order);
    });
});
