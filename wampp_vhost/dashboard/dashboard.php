<?php
require_once "../config/database.php"
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/dashboard.css">

</head>

<body>

    <div class="wrapper">

        <!-- Sidebar -->
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

        <!-- <div class="overlay"></div> -->

        <!-- Main -->
        <main class="content">

            <!-- Navbar -->

            <nav class="topbar">

                <button id="menuBtn">

                    <i class="bi bi-list"></i>

                </button>

                <div class="profile">

                    <img src="../assets/images/default-user.png">

                    <span>Admin</span>

                </div>

            </nav>

            <!-- Welcome -->

            <div class="welcome">

                <h2>

                    Welcome Back 👋

                </h2>

                <p>

                    Here's what's happening today.

                </p>

            </div>

            <!-- Cards -->

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

            <!-- Table -->

            <div class="table-card">

                <div class="d-flex justify-content-between mb-3">

                    <h4>

                        Recent Users

                    </h4>

                    <input class="form-control search-box" placeholder="Search">

                </div>

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>Profile</th>

                            <th>Name</th>

                            <th>Email</th>

                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $result = $conn->query("SELECT * FROM users ORDER BY user_id DESC");

                        while ($row = $result->fetch_assoc()) {

                            ?>

                            <tr>

                                <td>

                                    <img class="table-img"
                                        src="<?= !empty($row['profile_pic']) ? $row['profile_pic'] : '../assets/images/default-user.png'; ?>">

                                </td>

                                <td><?= $row['full_name']; ?></td>

                                <td><?= $row['email']; ?></td>

                                <td>

                                    <?php if ($row['is_active']) { ?>

                                        <span class="badge bg-success">

                                            Active

                                        </span>

                                    <?php } else { ?>

                                        <span class="badge bg-danger">

                                            Inactive

                                        </span>

                                    <?php } ?>

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </main>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/dashboard.js"></script>

</body>

</html>