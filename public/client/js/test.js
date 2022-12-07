$(document).ready(function () {
    $("#TimKiem").on("click", function () {
        var value = $("#search").val();
        if (value) {
            $(".alldata").hide();
            $(".searchdata").show();
        } else {
            $(".alldata").show();
            $(".searchdata").hide();
        }
        $.ajax({
            type: "get",
            url: "/search",
            data: { search: value },
            dataType: "json",
            success: function (data) {
                $("#Content").html(data);
            },
        });
    });
});
