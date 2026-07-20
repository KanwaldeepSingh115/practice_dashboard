$(document).ready(function () {

    // ===============================
    // Mobile Sidebar Toggle
    // ===============================

    $("#menuBtn").on("click", function () {
        $(".sidebar").toggleClass("show");
        $(".overlay").toggleClass("show");
    });

    // Close sidebar when overlay is clicked
    $(".overlay").on("click", function () {
        $(".sidebar").removeClass("show");
        $(".overlay").removeClass("show");
    });

    // ===============================
    // Active Sidebar Menu
    // ===============================

    $(".sidebar ul li").on("click", function () {
        $(".sidebar ul li").removeClass("active");
        $(this).addClass("active");
    });

    // ===============================
    // Search Users Table
    // ===============================

    $(".search-box").on("keyup", function () {

        var value = $(this).val().toLowerCase();

        $(".table tbody tr").filter(function () {

            $(this).toggle(
                $(this).text().toLowerCase().indexOf(value) > -1
            );

        });

    });

    // ===============================
    // Card Hover Animation
    // ===============================

    $(".card-box").hover(
        function () {
            $(this).addClass("shadow-lg");
        },
        function () {
            $(this).removeClass("shadow-lg");
        }
    );

    // ===============================
    // Profile Dropdown
    // ===============================

    $(".profile").on("click", function (e) {
        e.stopPropagation();
        $(".profile-dropdown").toggleClass("show");
    });

    $(document).on("click", function () {
        $(".profile-dropdown").removeClass("show");
    });

    // ===============================
    // Notification Bell Animation
    // ===============================

    $(".notification-btn").on("click", function () {
        $(this).find("i").addClass("bell-shake");

        setTimeout(function () {
            $(".notification-btn i").removeClass("bell-shake");
        }, 500);
    });

    // ===============================
    // Counter Animation
    // ===============================

    $(".counter").each(function () {

        let $this = $(this);
        let countTo = parseInt($this.text());

        $this.text("0");

        $({
            countNum: 0
        }).animate({
            countNum: countTo
        }, {

            duration: 1500,

            easing: "swing",

            step: function () {
                $this.text(Math.floor(this.countNum));
            },

            complete: function () {
                $this.text(this.countNum);
            }

        });

    });

});










$(document).ready(function () {
    loadUsers();
});

function loadUsers() {

    $.ajax({
        url: "../ajax/get_users.php",
        type: "GET",
        dataType: "json",
        success: function (response) {

            let html = "";

            if (response.length > 0) {

                $(".no-users-found").hide();

                $.each(response, function (index, user) {

                    let image = user.profile_pic
                        ? user.profile_pic
                        : "../assets/images/default-user.png";

                    let status = user.is_active == 1
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-danger">Inactive</span>';

                    html += `
                        <tr>
                            <td>
                                <img class="table-img" src="${image}">
                            </td>
                            <td>${user.full_name}</td>
                            <td>${user.email}</td>
                            <td>${status}</td>
                        </tr>
                    `;
                });

            } else {

                $(".no-users-found").show();

            }

            $("#usersTableBody").html(html);
        }
    });

}