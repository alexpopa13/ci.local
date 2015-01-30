function addNewUser() {
    $.ajax({
        url: "addNewUser",
        type: "POST",
        data: $('#addNewUser').serialize(),
    }).done(function (data) {
        $('.modal-content').html(data);
    });
}

$(function () {
    $('#user-list').on('hide.bs.modal', function (e) {
        $(this).find('form')[0].reset();
        console.log($("#addNewUser")[0]);
        $("#addNewUser")[0].reset();
//        $.ajax({
//            url: "addNewUser",
//        }).done(function (data) {
//            $('.modal-content').html(data);
//        });
    });
});
