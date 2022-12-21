$(document).ready(function () {
    $(document).on("click", "#update_image", function (e) {
        e.preventDefault();
        if (!$("#photo").length) {
            $("#old_image").html(
                '<input type="file" name="photo" id="photo">'
            );
            $("#update_image").hide();
            $("#cancel_update_image").show();
        }
        else{

        }
        return false;
    });

    $(document).on("click", "#cancel_update_image", function (e) {
        e.preventDefault();
        $("#update_image").show();
        $("#old_image").html(
            ' '
        );
        $("#cancel_update_image").hide();
        return false;
    });
});
