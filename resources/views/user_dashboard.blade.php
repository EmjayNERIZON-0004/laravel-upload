<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #0d6efd;
        }
        .stats-card {
            border-left: 4px solid #0d6efd;
        }
        .sidebar {
            background-color: #212529;
            min-height: calc(100vh - 56px);
            position: sticky;
            top: 56px;
        }
        .sidebar-link {
            color: rgba(255,255,255,0.8);
            padding: 0.75rem 1rem;
            display: block;
            text-decoration: none;
            border-left: 3px solid transparent;
        }
        .sidebar-link:hover, .sidebar-link.active {
            color: white;
            background-color: rgba(255,255,255,0.1);
            border-left: 3px solid #0d6efd;
        }
        .section-heading {
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .quick-stats {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .badge-notification {
            position: absolute;
            top: -5px;
            right: -5px;
        }
        .progress {
            height: 8px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fas fa-chart-line me-2"></i>User Dashboard
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNavbar">
            <form class="d-flex ms-auto me-3">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
            
            <ul class="navbar-nav">
                <li class="nav-item me-3 position-relative">
                    <a  onclick="location.reload();" class="nav-link" href="#" title="Messages">
                        <i class="fas fa-envelope"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </a>
                </li>
                <li class="nav-item me-3 position-relative">
                    <a  onclick="location.reload();" class="nav-link" href="#" title="Notifications">
                        <i class="fas fa-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                            5
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-1" style="font-size:22px"></i> {{ session('user_id') ?? 'Guest' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>My Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Account Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-2 d-none d-lg-block sidebar p-0">
            <div class="py-4">
                <div class="text-center mb-4">
                    <div class="bg-light rounded-circle d-inline-flex justify-content-center align-items-center" style="width: 80px; height: 80px;">
                        <i class="fas fa-user fa-3x text-primary"></i>
                    </div>
                    <h6 class="mt-2 mb-0 text-white">{{ $user->username }}</h6>
                    <small class="text-muted">Member since 2023</small>
                </div>
                
                <a href="#"  onclick="location.reload();" class="sidebar-link active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                <a href="#"  onclick="location.reload();" class="sidebar-link"><i class="fas fa-user me-2"></i> Profile</a>
                <a href="#"  onclick="location.reload();" class="sidebar-link"><i class="fas fa-bell me-2"></i> Notifications</a>
                <a href="#"  onclick="location.reload();" class="sidebar-link"><i class="fas fa-file-alt me-2"></i> Documents</a>
                <a href="#"  onclick="location.reload();" class="sidebar-link"><i class="fas fa-calendar me-2"></i> Calendar</a>
                <a href="#"  onclick="location.reload();" class="sidebar-link"><i class="fas fa-chart-bar me-2"></i> Analytics</a>
                <a href="#"  onclick="location.reload();" class="sidebar-link"><i class="fas fa-cog me-2"></i> Settings</a>
                <a href="{{ route('password.update.form') }}" class="sidebar-link"><i class="fas fa-key me-2"></i> Change Password</a>
                <a href="{{ route('logout') }}" class="sidebar-link"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="col-lg-10 col-md-12 px-4 py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Welcome back, {{ $user->username }}</h4>
                <div class="text-muted">
                    <i class="fas fa-calendar-alt me-1"></i> Today: <?php echo date('F d, Y'); ?>
                </div>
            </div>
            
            <!-- Quick Stats Row -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm stats-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Projects</h6>
                                    <div class="quick-stats">12</div>
                                </div>
                                <div class="bg-primary bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-project-diagram text-primary"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <small class="text-success"><i class="fas fa-arrow-up me-1"></i>8% from last month</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm stats-card" style="border-left-color: #198754 !important;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Tasks</h6>
                                    <div class="quick-stats">38</div>
                                </div>
                                <div class="bg-success bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-tasks text-success"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <small class="text-success"><i class="fas fa-arrow-up me-1"></i>12% completed</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm stats-card" style="border-left-color: #dc3545 !important;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Messages</h6>
                                    <div class="quick-stats">27</div>
                                </div>
                                <div class="bg-danger bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-envelope text-danger"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <small class="text-danger"><i class="fas fa-arrow-up me-1"></i>3 unread</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm stats-card" style="border-left-color: #ffc107 !important;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Storage</h6>
                                    <div class="quick-stats">65%</div>
                                </div>
                                <div class="bg-warning bg-opacity-10 p-3 rounded">
                                    <i class="fas fa-database text-warning"></i>
                                </div>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Dashboard Cards -->
            <h5 class="section-heading">My Dashboard</h5>
            <div class="row g-4 mb-4">
                <!-- Profile Overview -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm dashboard-card h-100">
                        <div class="card-body text-center">
                            <div class="card-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <h5 class="card-title">Profile Overview</h5>
                            <p class="card-text text-muted">Update your personal information and profile details.</p>
                            <div class="mt-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Profile Completeness</span>
                                    <span>85%</span>
                                </div>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-outline-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>

                <!-- Notifications -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm dashboard-card h-100">
                        <div class="card-body text-center">
                            <div class="card-icon position-relative">
                                <i class="fas fa-bell"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    5
                                </span>
                            </div>
                            <h5 class="card-title">Notifications</h5>
                            <p class="card-text text-muted">Stay updated with your latest notifications and alerts.</p>
                            <div class="mt-3 text-start">
                                <div class="d-flex align-items-center mb-2 pb-2 border-bottom">
                                    <div class="bg-primary bg-opacity-10 rounded p-2 me-2">
                                        <i class="fas fa-comment text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">2 hours ago</small>
                                        <p class="mb-0 small">New comment on your post</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-2 pb-2 border-bottom">
                                    <div class="bg-success bg-opacity-10 rounded p-2 me-2">
                                        <i class="fas fa-check text-success"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">5 hours ago</small>
                                        <p class="mb-0 small">Task completed successfully</p>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-outline-primary mt-2">View All Notifications</a>
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm dashboard-card h-100">
                        <div class="card-body text-center">
                            <div class="card-icon">
                                <i class="fas fa-cog"></i>
                            </div>
                            <h5 class="card-title">Settings</h5>
                            <p class="card-text text-muted">Manage your account preferences and security settings.</p>
                            <div class="mt-3 text-start">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>Two-factor Authentication</span>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="twoFactorSwitch">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span>Email Notifications</span>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="emailNotifSwitch" checked>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('password.update.form') }}" class="btn btn-outline-primary mt-3">Change Password</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Additional Dashboard Components -->
            <h5 class="section-heading">Activities & Resources</h5>
            <div class="row g-4 mb-4">
                <!-- Recent Activities -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Recent Activities</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="activityDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        Filter
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="activityDropdown">
                                        <li><a class="dropdown-item" href="#">All Activities</a></li>
                                        <li><a class="dropdown-item" href="#">Projects</a></li>
                                        <li><a class="dropdown-item" href="#">Comments</a></li>
                                        <li><a class="dropdown-item" href="#">Tasks</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="timeline-item pb-3 mb-3 border-bottom">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                                                <i class="fas fa-file-alt text-primary"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Document Updated</h6>
                                            <p class="mb-1 small">You updated the document "Project Proposal"</p>
                                            <small class="text-muted">Today, 09:30 AM</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item pb-3 mb-3 border-bottom">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <div class="bg-success bg-opacity-10 rounded-circle p-2">
                                                <i class="fas fa-check text-success"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Task Completed</h6>
                                            <p class="mb-1 small">You marked the task "Design Homepage" as complete</p>
                                            <small class="text-muted">Yesterday, 4:23 PM</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <div class="bg-info bg-opacity-10 rounded-circle p-2">
                                                <i class="fas fa-comment text-info"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">New Comment</h6>
                                            <p class="mb-1 small">You commented on "Marketing Strategy"</p>
                                            <small class="text-muted">Yesterday, 10:15 AM</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-sm btn-link text-decoration-none mt-2">View All Activities</a>
                        </div>
                    </div>
                </div>
                
                <!-- File Storage -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">File Storage</h5>
                                <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-upload me-1"></i> Upload</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-grow-1 me-3">
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <p class="mb-0 fw-bold">6.5 GB / 10 GB</p>
                                    <small class="text-muted">65% used</small>
                                </div>
                            </div>
                            
                            <div class="row g-2 mt-4">
                                <div class="col-md-6">
                                    <div class="card bg-light border-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <i class="fas fa-file-image text-primary fa-2x"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Images</h6>
                                                    <p class="mb-0 small text-muted">2.1 GB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-light border-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <i class="fas fa-file-pdf text-danger fa-2x"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Documents</h6>
                                                    <p class="mb-0 small text-muted">1.8 GB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-light border-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <i class="fas fa-file-video text-success fa-2x"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Videos</h6>
                                                    <p class="mb-0 small text-muted">2.3 GB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-light border-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <i class="fas fa-ellipsis-h text-secondary fa-2x"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Others</h6>
                                                    <p class="mb-0 small text-muted">0.3 GB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="#" class="btn btn-sm btn-link text-decoration-none mt-3">Manage Storage</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bottom Row -->
            <div class="row g-4">
                <!-- Calendar Widget -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Calendar</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h5>April 2025</h5>
                            </div>
                            <table class="table table-sm table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Su</th>
                                        <th>Mo</th>
                                        <th>Tu</th>
                                        <th>We</th>
                                        <th>Th</th>
                                        <th>Fr</th>
                                        <th>Sa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-muted">30</td>
                                        <td class="text-muted">31</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                        <td>10</td>
                                        <td>11</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>14</td>
                                        <td>15</td>
                                        <td>16</td>
                                        <td>17</td>
                                        <td>18</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>21</td>
                                        <td>22</td>
                                        <td>23</td>
                                        <td>24</td>
                                        <td class="bg-primary text-white">25</td>
                                        <td>26</td>
                                    </tr>
                                    <tr>
                                        <td>27</td>
                                        <td>28</td>
                                        <td>29</td>
                                        <td>30</td>
                                        <td class="text-muted">1</td>
                                        <td class="text-muted">2</td>
                                        <td class="text-muted">3</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="mt-3">
                                <h6>Upcoming Events</h6>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-warning" style="width: 10px; height: 10px; border-radius: 50%;"></div>
                                    <span class="ms-2 small">Team Meeting - Apr 27, 10:00 AM</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="bg-info" style="width: 10px; height: 10px; border-radius: 50%;"></div>
                                    <span class="ms-2 small">Project Deadline - Apr 30, 5:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Task Manager -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Task Manager</h5>
                                <button class="btn btn-sm btn-outline-primary"><i class="fas fa-plus me-1"></i> New Task</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="task1">
                                        </div>
                                        <label class="form-check-label ms-2 flex-grow-1" for="task1">
                                            Complete project proposal
                                        </label>
                                        <span class="badge bg-danger">High</span>
                                    </div>
                                    <small class="text-muted ms-4">Due: Today</small>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="task2">
                                        </div>
                                        <label class="form-check-label ms-2 flex-grow-1" for="task2">
                                            Review analytics report
                                        </label>
                                        <span class="badge bg-warning text-dark">Medium</span>
                                    </div>
                                    <small class="text-muted ms-4">Due: Tomorrow</small>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="task3" checked>
                                        </div>
                                        <label class="form-check-label ms-2 flex-grow-1 text-decoration-line-through" for="task3">
                                            Schedule team meeting
                                        </label>
                                        <span class="badge bg-success">Low
                                        </span>
                                    </div>
                                    <small class="text-muted ms-4">Completed yesterday</small>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="task4">
                                        </div>
                                        <label class="form-check-label ms-2 flex-grow-1" for="task4">
                                            Update user documentation
                                        </label>
                                        <span class="badge bg-info">Normal</span>
                                    </div>
                                    <small class="text-muted ms-4">Due: Apr 30</small>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="task5">
                                        </div>
                                        <label class="form-check-label ms-2 flex-grow-1" for="task5">
                                            Prepare monthly report
                                        </label>
                                        <span class="badge bg-warning text-dark">Medium</span>
                                    </div>
                                    <small class="text-muted ms-4">Due: Apr 29</small>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-sm btn-link text-decoration-none mt-3">View All Tasks</a>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Links & Resources -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Quick Links & Resources</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <a href="#" class="text-decoration-none">
                                        <div class="p-3 bg-light rounded text-center border">
                                            <i class="fas fa-book fa-2x text-primary mb-2"></i>
                                            <p class="mb-0 small">Documentation</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="text-decoration-none">
                                        <div class="p-3 bg-light rounded text-center border">
                                            <i class="fas fa-question-circle fa-2x text-success mb-2"></i>
                                            <p class="mb-0 small">Help Center</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="text-decoration-none">
                                        <div class="p-3 bg-light rounded text-center border">
                                            <i class="fas fa-cloud-download-alt fa-2x text-info mb-2"></i>
                                            <p class="mb-0 small">Downloads</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="text-decoration-none">
                                        <div class="p-3 bg-light rounded text-center border">
                                            <i class="fas fa-video fa-2x text-warning mb-2"></i>
                                            <p class="mb-0 small">Tutorials</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            
                            <h6 class="mt-4 mb-3">Recent Documents</h6>
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action px-0 border-0">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-file-pdf text-danger me-2"></i>
                                        <div>
                                            <p class="mb-0">Q1 2025 Report.pdf</p>
                                            <small class="text-muted">Updated: Apr 22, 2025</small>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action px-0 border-0 py-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-file-excel text-success me-2"></i>
                                        <div>
                                            <p class="mb-0">Budget_2025.xlsx</p>
                                            <small class="text-muted">Updated: Apr 18, 2025</small>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action px-0 border-0 py-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-file-word text-primary me-2"></i>
                                        <div>
                                            <p class="mb-0">Project_Proposal.docx</p>
                                            <small class="text-muted">Updated: Apr 15, 2025</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Performance Analytics Section -->
            <h5 class="section-heading mt-4">Performance Analytics</h5>
            <div class="row g-4 mb-4">
                <!-- Project Progress -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Project Progress</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="projectDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        This Month
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="projectDropdown">
                                        <li><a class="dropdown-item" href="#">This Week</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">Last 3 Months</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0">Website Redesign</h6>
                                    <span class="badge bg-success">80%</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted">Due: May 5, 2025</small>
                            </div>
                            
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0">Mobile App Development</h6>
                                    <span class="badge bg-primary">65%</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted">Due: Jun 15, 2025</small>
                            </div>
                            
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0">Marketing Campaign</h6>
                                    <span class="badge bg-warning text-dark">45%</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted">Due: May 30, 2025</small>
                            </div>
                            
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0">Product Launch</h6>
                                    <span class="badge bg-danger">25%</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted">Due: Jul 10, 2025</small>
                            </div>
                            
                            <a href="#" class="btn btn-sm btn-link text-decoration-none mt-3">View All Projects</a>
                        </div>
                    </div>
                </div>
                
                <!-- Performance Stats -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Performance Stats</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="statsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        This Month
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="statsDropdown">
                                        <li><a class="dropdown-item" href="#">This Week</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">Last 3 Months</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="bg-light p-3 rounded">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">Tasks Completed</h6>
                                            <i class="fas fa-tasks text-primary"></i>
                                        </div>
                                        <h3>28</h3>
                                        <div class="text-success small">
                                            <i class="fas fa-arrow-up me-1"></i>12% increase
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <div class="bg-light p-3 rounded">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">Efficiency</h6>
                                            <i class="fas fa-chart-line text-success"></i>
                                        </div>
                                        <h3>92%</h3>
                                        <div class="text-success small">
                                            <i class="fas fa-arrow-up me-1"></i>5% increase
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <div class="bg-light p-3 rounded">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">Time Logged</h6>
                                            <i class="fas fa-clock text-warning"></i>
                                        </div>
                                        <h3>148h</h3>
                                        <div class="text-danger small">
                                            <i class="fas fa-arrow-down me-1"></i>3% decrease
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <div class="bg-light p-3 rounded">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">Milestones</h6>
                                            <i class="fas fa-flag text-info"></i>
                                        </div>
                                        <h3>8/10</h3>
                                        <div class="text-muted small">
                                            On track
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <h6 class="mb-3">Performance by Category</h6>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Design Tasks</span>
                                        <span>95%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Development Tasks</span>
                                        <span>88%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Research Tasks</span>
                                        <span>75%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Documentation Tasks</span>
                                        <span>65%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Team Members & Messages Section -->
            <div class="row g-4 mb-4">
                <!-- Team Members -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Team Members</h5>
                                <button class="btn btn-sm btn-outline-primary"><i class="fas fa-user-plus me-1"></i> Add Member</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Member</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary rounded-circle d-flex justify-content-center align-items-center text-white" style="width:40px;height:40px;">JD</div>
                                                    <div class="ms-2">
                                                        <p class="mb-0 fw-medium">John Doe</p>
                                                        <small class="text-muted">john@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Designer</td>
                                            <td><span class="badge bg-success">Online</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="memberAction1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="memberAction1">
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-comment me-2"></i>Message</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-edit me-2"></i>Edit</a></li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-user-minus me-2"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-success rounded-circle d-flex justify-content-center align-items-center text-white" style="width:40px;height:40px;">AS</div>
                                                    <div class="ms-2">
                                                        <p class="mb-0 fw-medium">Anna Smith</p>
                                                        <small class="text-muted">anna@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Developer</td>
                                            <td><span class="badge bg-success">Online</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="memberAction2" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="memberAction2">
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-comment me-2"></i>Message</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-edit me-2"></i>Edit</a></li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-user-minus me-2"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-info rounded-circle d-flex justify-content-center align-items-center text-white" style="width:40px;height:40px;">RW</div>
                                                    <div class="ms-2">
                                                        <p class="mb-0 fw-medium">Robert Wilson</p>
                                                        <small class="text-muted">robert@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Project Manager</td>
                                            <td><span class="badge bg-secondary">Away</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="memberAction3" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="memberAction3">
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-comment me-2"></i>Message</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-edit me-2"></i>Edit</a></li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-user-minus me-2"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-warning rounded-circle d-flex justify-content-center align-items-center text-white" style="width:40px;height:40px;">EJ</div>
                                                    <div class="ms-2">
                                                        <p class="mb-0 fw-medium">Emily Johnson</p>
                                                        <small class="text-muted">emily@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Content Writer</td>
                                            <td><span class="badge bg-danger">Offline</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="memberAction4" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="memberAction4">
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-comment me-2"></i>Message</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-edit me-2"></i>Edit</a></li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-user-minus me-2"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="#" class="btn btn-sm btn-link text-decoration-none">View All Team Members</a>
                        </div>
                    </div>
                </div>
                
                <!-- Messages -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Recent Messages</h5>
                                <button class="btn btn-sm btn-outline-primary"><i class="fas fa-plus me-1"></i> New Message</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item border-0 px-0">
                                    <div class="d-flex">
                                        <div class="bg-primary rounded-circle d-flex justify-content-center align-items-center text-white" style="width:45px;height:45px;">JD</div>
                                        <div class="ms-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0">John Doe</h6>
                                                <small class="text-muted">10:30 AM</small>
                                            </div>
                                            <p class="mb-0 text-muted">Hey, have you reviewed the latest design changes?</p>
                                            <div class="mt-2">
                                                <button class="btn btn-sm btn-outline-primary me-2"><i class="fas fa-reply me-1"></i>Reply</button>
                                                <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-archive me-1"></i>Archive</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="list-group-item border-0 px-0 mt-3">
                                    <div class="d-flex">
                                        <div class="bg-success rounded-circle d-flex justify-content-center align-items-center text-white" style="width:45px;height:45px;">AS</div>
                                        <div class="ms-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0">Anna Smith</h6>
                                                <small class="text-muted">Yesterday</small>
                                            </div>
                                            <p class="mb-0 text-muted">I've pushed the latest code changes to the repository. Please review when you get a chance.</p>
                                            <div class="mt-2">
                                                <button class="btn btn-sm btn-outline-primary me-2"><i class="fas fa-reply me-1"></i>Reply</button>
                                                <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-archive me-1"></i>Archive</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="list-group-item border-0 px-0 mt-3">
                                    <div class="d-flex">
                                        <div class="bg-info rounded-circle d-flex justify-content-center align-items-center text-white" style="width:45px;height:45px;">RW</div>
                                        <div class="ms-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0">Robert Wilson</h6>
                                                <small class="text-muted">Apr 23</small>
                                            </div>
                                            <p class="mb-0 text-muted">Team meeting scheduled for tomorrow at 10 AM. Please prepare your project updates.</p>
                                            <div class="mt-2">
                                                <button class="btn btn-sm btn-outline-primary me-2"><i class="fas fa-reply me-1"></i>Reply</button>
                                                <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-archive me-1"></i>Archive</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-sm btn-link text-decoration-none mt-3">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
<!-- Bootstrap JS -->
<script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>