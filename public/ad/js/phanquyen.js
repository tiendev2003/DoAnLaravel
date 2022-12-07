$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("#vaitro").change(function () {
        let vaitro = $("#vaitro").val();
        $.ajax({
            type: "GET",
            data: {
                message: vaitro,
            },
            url: "/admin/tai-khoan/phanquyen",
            success: function (result) {
                var content = "";
                $.each(result, function (i, taikhoan) {
                    content +=
                        "<tr> <td>" +
                        parseInt(i + 1) +
                        "</td>" +
                        "<td>" +
                        taikhoan.name +
                        "</td>" +
                        "<td>" +
                        taikhoan.email +
                        "</td>" +
                        "<td>" +
                        taikhoan.sdt +
                        "</td>" +
                        "<td>" +
                        taikhoan.address +
                        "</td>" +
                        "<td><select id='vt' class='form-control'>" +
                        "<option value='3'>admin</option>" +
                        "<option value='2'>shipper</option>" +
                        "<option value='1'>client</option>" +
                        "</select></td>" +
                        '<td> <a href="admin/tai-khoan/edit/' +
                        taikhoan.id +
                        '" class="btn btn-primary"><i class="fa fa-edit"></i></td>' +
                        '<td><a href="admin/tai-khoan/detroy/' +
                        taikhoan.id +
                        '" class="btn btn-danger"> <i class="fas fa-trash"></i></a></td></tr>';
                });
                $("#show").html(content);
                $.each(result, function (i, taikhoan) {
                    {$('#vt option[value="'+taikhoan.vt+'"]').attr("selected", "selected");}
                });
                  
                    
                   
            },
            // success: function (result) {
            //   var content;
            //   $.each(result, function (i, taikhoan) {
            //     content = "";
            //     content =
            //       "<tr><td>" +
            //       i +
            //       1 +
            //       "</td>" +
            //       "<td>" +
            //       taikhoan.name +
            //       "</td>" +
            //       "<td>" +
            //       taikhoan.email +
            //       "</td>" +
            //       "<td>" +
            //       taikhoan.sdt +
            //       "</td>" +
            //       "<td>" +
            //       taikhoan.address +
            //       "</td>" +
            //       "<td>" +
            //       taikhoan.vaitro +
            //       "</td>" +
            //       '<td> <a href="admin/tai-khoan/edit/' +
            //       taikhoan.id +
            //       '" class="btn btn-primary"><i class="fa fa-edit"></i></td>' +
            //       '<td><a href="admin/tai-khoan/detroy/' +
            //       taikhoan.id +
            //       '" class="btn btn-danger"> <i class="fas fa-trash"></i></a></td></tr>';
            //     $("#show").append(content);
            //   });
            // },
        });
    });
});
