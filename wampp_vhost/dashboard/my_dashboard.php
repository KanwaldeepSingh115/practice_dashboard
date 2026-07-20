<?php
require_once "../config/database.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Dashboard</title>
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/mydashboard.css">


</head>

<body>


    <aside class="sidebar">

        <div class="logo">
            <img src="../assets/images/logo.png">
        </div>

        <ul>
            <li class="active">
                <i class="bi bi-grid"></i>
                Dashboard
            </li>

            <li>
                <i class="bi bi-people"></i>
                Users
            </li>

            <li>
                <i class="bi bi-bar-chart"></i>
                Reports
            </li>

            <li>
                <i class="bi bi-gear"></i>
                Settings
            </li>

            <li>
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </li>
        </ul>

    </aside>

    <main class="content">
        <nav class="topbar">
            <button id="menuBtn">
                <i class="bi bi-list"></i>
            </button>

            <div class="profile">
                <img src="../assets/images/default-user.png">
                <span>Admin</span>

            </div>
        </nav>

        <div class="welcome">
            <h2>Welcome Back 👋</h2>
            <p> Here's what's happening today.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <div>
                        <h3>100</h3>
                        <p>Total Users</p>
                    </div>

                    <i class="bi bi-people-fill"></i>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <div>
                        <h3>85</h3>
                        <p>Active</p>
                    </div>

                    <i class="bi bi-check-circle-fill"></i>
                </div>
            </div>



            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <div>
                        <h3>15</h3>
                        <p>Inactive</p>
                    </div>
                    <i class="bi bi-x-circle-fill"></i>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <div>
                        <h3>8</h3>
                        <p>New Today</p>
                    </div>
                    <i class="bi bi-person-plus-fill"></i>

                </div>
            </div>


        </div>


        <div class="table-card">

            <div class="list-heading mb-3">

                <h4>Recent Users</h4>

                <div class="d-flex gap-2">

                    <input class="form-control search-box" placeholder="Search">

                    <button class="btn btn-primary" id="addUserBtn">
                        <i class="bi bi-plus-lg"></i> Add User
                    </button>

                </div>

            </div>



            <div class="modal fade" id="userModal" tabindex="-1">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add User</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                        <input type="hidden" id="user_id">

                            <input type="text" id="full_name" class="form-control mb-3" placeholder="Full Name">
                            <input type="text" id="username" class="form-control mb-3" placeholder="Username">
                            <input type="email" id="email" class="form-control mb-3" placeholder="Email">
                            <input type="text" id="mobile" class="form-control mb-3" placeholder="Mobile">
                        </div>

                        <div class="modal-footer">

                            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <button class="btn btn-primary" id="saveUserBtn">Save</button>
                        </div>
                    </div>
                </div>
            </div>



            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="usersTableBody">

                </tbody>
            </table>

            <div id="pagination" class="mt-3 d-flex jsutify-content-center"></div>


            <p class="no-users-found text-center mt-3 pt-3 border-top" style="display:none">
                No Users Found!
            </p>
        </div>


    </main>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/mydashboard.js"></script>

</body>

</html>