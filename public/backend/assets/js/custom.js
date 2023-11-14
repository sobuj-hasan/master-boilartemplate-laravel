$(document).ready(function () {
    var table = $("#data-table").DataTable({
        language: {
            search: "<i class='fa fa-search search-icon'></i>",
            lengthMenu: "_MENU_ ",
            paginate: {
                first: '<i class="fa fa-angle-double-left"></i>',
                last: '<i class="fa fa-angle-double-right"></i>',
                previous: '<i class="fa fa-angle-left"></i>',
                next: '<i class="fa fa-angle-right"></i>',
            },
        },
        // oLanguage: {
        //     sLengthMenu: "_MENU_",
        //     sInfo: "Showing _TOTAL_ results ",
        // },
        dom: "Blfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],
        order: [],
    });

    $(".delete-confirm").click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete ${name}?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });

    $(".accept-confirm").click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to accept this order?`,
            text: "If you accept this, it will be marked as completed.",
            icon: "success",
            buttons: true,
            dangerMode: true,
        }).then((willAccept) => {
            if (willAccept) {
                form.submit();
            }
        });
    });

    // Use for Admin Panel Edit Header Banner
    table.on("click", ".edit-banner-header", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");
        $.get("/header_banner/" + item + "/edit", function (data) {
            var action = "/header_banner/" + data.id;
            $("#editForm").attr("action", action);
            var myModal = new bootstrap.Modal(
                document.getElementById("editModal")
            );
            $("#HBannerTitleID").val(data.title.allwords);
            $("#HBannerDescriptionID").val(data.description);
            myModal.show();
        });
    });

    // Use for Admin Panel Edit Header Banner Button
    table.on("click", ".edit-banner-header-button", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");
        $.get("/header_banner_button/" + item + "/edit", function (data) {
            var action = "/header_banner_button/" + data.id;
            $("#editForm").attr("action", action);
            var myModal = new bootstrap.Modal(
                document.getElementById("editModal")
            );
            $("#HBannerBtnTitleID").val(data.title);
            $("#HBannerBtnURLID").val(data.url);
            myModal.show();
        });
    });


    // Use for Admin Panel Edit Compare Header Edit & Update Button
    table.on("click", ".edit-compare-header", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");
        $.get("compare-header/" + item + "/edit", function (data) {
            var action = "compare-header/" + data.id;
            $("#editForm").attr("action", action);
            var myModal = new bootstrap.Modal(
                document.getElementById("editModal")
            );
            $("#HBannerServiceTitleID").val(data.title);
            $("#compareHeaderTitleEdit").val(data.title);
            myModal.show();
        });
    });
  
    // Use for Admin Panel Edit Compare Item  Edit & Update Button
      table.on("click", ".edit-compare-item", function () {
          $tr = $(this).closest("tr");
          if ($($tr).hasClass("child")) {
              $tr = $tr.prev(".parent");
          }
          var item = $(this).data("item");
          $.get("compare-item/" + item + "/edit", function (data) {
              var action = "compare-item/" + data.id;
            $("#editForm").attr("action", action);
              var myModal = new bootstrap.Modal(
                  document.getElementById("editModal")
              );
              $("#compareItemTitleEdit").val(data.title);
              tinymce.activeEditor.setContent(data.description);
              $("#compareItemTImageEdit").html('<img src='+ "{{ asset('storage/images/"+ data.image +"') }}" +' atr="">');
              myModal.show();
          });
      });

    // Use for Edit trusted-client-header
    table.on("click", ".edit-trusted-client-header", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");
        $.get("/trusted-client-header/" + item + "/edit", function (data) {
            var action = "/trusted-client-header/" + data.id;
            $("#editForm").attr("action", action);
            var myModal = new bootstrap.Modal(
                document.getElementById("editModal1")
            );
            $("#trustClintTitleEdit").val(data.title);
            myModal.show();
        });
    });

    // Use for Edit trusted-client-header
    table.on("click", ".edit-trusted-client-items", function () {
        console.log('Helo');
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");
        $.get("/trusted-client-items/" + item + "/edit", function (data) {
            var action = "/trusted-client-items/" + data.id;
            $("#editForm").attr("action", action);
            var myModal = new bootstrap.Modal(
                document.getElementById("editModal")
            );
            $("#trustClintItemTitleEdit").val(data.title);
            myModal.show();
        });
    });
      
});

