$('#menuBtn').on('click', function (e) {
    $('.sidebar').toggleClass('show');
});

$(document).on('click', function (e) {

    if (!$(e.target).closest('.sidebar').length && !$(e.target).closest('#menuBtn').length) {

        $('.sidebar').removeClass('show');

    }
});

$(".sidebar ul li").on("click", function () {
    $(".sidebar ul li").removeClass("active");
    $(this).addClass("active");
});


$(".card-box").hover(
    function () {
        $(this).addClass("shadow-lg");
    },
    function () {
        $(this).removeClass("shadow-lg")
    }
);

$(document).ready(function (e) {
    loadUsers();
});

// function loadUsers() {
//     $.ajax({
//         url: "../ajax/get_users.php",
//         type: "GET",
//         dataType: "json",
//         success: function (response) {

//             let html = "";

//             if (response.length > 0) {
//                 $(".no-users-found").hide();

//                 $.each(response, function (index, user) {

//                     let image = user.profile_pic ? user.profile_pic : "../assets/images/default-user.png";

//                     let status = user.is_active == 1
//                         ? '<span class="badge bg-success">Active</span>'
//                         : '<span class="badge bg-danger">Inactive</span>';

//                     html += `
//                     <tr>
//                     <td><img class = "table-img" src="${image}"></td>
//                     <td>${user.full_name}</td>
//                     <td>${user.email}</td>
//                     <td>${status}</td>
//                     </tr>
//                     `;
//                 });
//             } else {
//                 $(".no-users-found").show();
//             }

//             $("#usersTableBody").html(html);
//         }

//     });
// }

// $(".search-box").on("keyup", function () {
//     let keyword = $(this).val();

//     $.ajax({
//         url: "../ajax/get_users.php",
//         type: "GET",
//         data: {
//             search: keyword
//         },
//         dataType: "json",
//         success: function (response) {
//             let html = "";

//             if (response.length > 0) {
//                 $(".no-users-found").hide();


//                 $.each(response, function (index, user) {

//                     let image = user.profile_pic ? user.profile_pic : "../assets/images/default-user.png";

//                     let status = user.is_active == 1
//                         ? '<span class="badge bg-success">Active</span>'
//                         : '<span class="badge bg-danger">Inactive</span>';

//                     html += `
//                         <tr>
//                             <td>
//                                 <img class="table-img" src="${image}">
//                             </td>
//                             <td>${user.full_name}</td>
//                             <td>${user.email}</td>
//                             <td>${status}</td>
//                         </tr>
//                     `;

//                 });
//             } else {

//                 $(".no-users-found").show();

//             }

//             $("#usersTableBody").html(html);
//         }

//     });


// });


let currentPage = 1;
let searchKeyword = "";


function loadUsers(page = 1) {
    currentPage = page;

    $.ajax({
        url: "../ajax/get_users.php",
        type: "GET",
        data: {
            page: page,
            search: searchKeyword
        },
        dataType: "json",
        success: function (response) {

            let html = "";

            if (response.users.length > 0) {
                $(".no-users-found").hide();

                $.each(response.users, function (index, user) {

                    let image = user.profile_pic ? user.profile_pic : "../assets/images/default-user.png";

                    let status = user.is_active == 1 ? '<span class= "badge bg-success">Active</span>' : '<span class= "badge bg-danger">Inactive</span>';

                    html += `
<tr>

    <td>
        <img class="table-img" src="${image}">
    </td>

    <td>${user.full_name}</td>

    <td>${user.email}</td>

    <td>${status}</td>

    <td>

        <button class="btn btn-sm btn-warning editBtn"
            data-id="${user.user_id}">
            <i class="bi bi-pencil"></i>
        </button>

        <button class="btn btn-sm btn-danger deleteBtn"
            data-id="${user.user_id}">
            <i class="bi bi-trash"></i>
        </button>

    </td>

</tr>
`;

                });
            } else {
                $(".no-users-found").show();


            }

            $("#usersTableBody").html(html);

            createPagination(response.totalPages, response.currentPage);

        }

    });
}


function createPagination(totalPages, currentPage) {
    let html = "";

    if (totalPages <= 1) {
        $("#pagination").html("");
        return;
    }

    html += `
    <nav><ul class="pagination">
    `;

    html += `
    <li class="page-item ${currentPage == 1 ? "disabled" : ""}">
    <a class="page-link" href="#" data-page="${currentPage - 1}">Previous</a></li>
    `;


    for (let i = 1; i <= totalPages; i++) {
        html += `
        <li class="page-item ${i == currentPage ? "active" : ""}">

        <a class = "page-link" href="#" data-page="${i}">${i}</a></li>

        `;
    }

    html += `
    <li class="page-item ${currentPage == totalPages ? "disabled" : ""}">
    <a class="page-link" href="#" data-page="${currentPage + 1}">Next</a></li>
    `;



    html += `</ul></nav>`;

    $("#pagination").html(html);
}


$(document).on("click", ".page-link", function (e) {
    e.preventDefault();

    let page = $(this).data("page");

    if (page > 0) {
        loadUsers(page);
    }
});

$(".search-box").on("keyup", function () {
    searchKeyword = $(this).val();

    loadUsers(1);
});


const userModal = new bootstrap.Modal(document.getElementById("userModal"));

$("#addUserBtn").click(function () {

    clearForm();

    $(".modal-title").text("Add User");
    $("#saveUserBtn").text("Save");

    $("#userModal").modal("show");

});

$(document).on("click", "#saveUserBtn", function () {

    let user_id = $("#user_id").val();
    let full_name = $("#full_name").val().trim();
    let username = $("#username").val().trim();
    let email = $("#email").val().trim();
    let mobile = $("#mobile").val().trim();

    if (full_name == "" || username == "" ||
        email == "" || mobile == "") {

        alert("All fields are required");
        return;
    }

    let url = user_id
        ? "../ajax/update_user.php"
        : "../ajax/insert_user.php";

    $.ajax({

        url: url,

        type: "POST",

        data: {
            user_id: user_id,
            full_name: full_name,
            username: username,
            email: email,
            mobile: mobile
        },

        dataType: "json",

        success: function (response) {

            alert(response.message);

            if (response.status == "success") {

                $("#userModal").modal("hide");

                clearForm();

                loadUsers(currentPage);

            }

        }

    });

});


function clearForm() {

    $("#user_id").val("");
    $("#full_name").val("");
    $("#username").val("");
    $("#email").val("");
    $("#mobile").val("");

}





$(document).on("click", ".editBtn", function () {

    let user_id = $(this).data("id");

    $.ajax({

        url: "../ajax/get_user.php",

        type: "GET",

        data: {
            user_id: user_id
        },

        dataType: "json",

        success: function (user) {

            $("#full_name").val(user.full_name);
            $("#username").val(user.username);
            $("#email").val(user.email);
            $("#mobile").val(user.mobile);

            $("#saveUserBtn").text("Update");

            $("#userModal").modal("show");

        }

    });

});


$(document).on("click", ".editBtn", function () {

    let user_id = $(this).data("id");

    $.ajax({

        url: "../ajax/get_user.php",

        type: "GET",

        data: { user_id: user_id },

        dataType: "json",

        success: function (user) {

            $("#user_id").val(user.user_id);
            $("#full_name").val(user.full_name);
            $("#username").val(user.username);
            $("#email").val(user.email);
            $("#mobile").val(user.mobile);

            $(".modal-title").text("Edit User");
            $("#saveUserBtn").text("Update");

            $("#userModal").modal("show");

        }

    });

});

$(document).on("click", ".deleteBtn", function () {

    let user_id = $(this).data("id");

    if (!confirm("Are you sure you want to delete this user?")) {
        return;
    }

    $.ajax({

        url: "../ajax/delete_user.php",

        type: "POST",

        data: {
            user_id: user_id
        },

        dataType: "json",

        success: function (response) {

            alert(response.message);

            if (response.status == "success") {

                loadUsers(currentPage);

            }

        }

    });

});







