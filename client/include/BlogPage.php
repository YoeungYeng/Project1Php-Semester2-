<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        .hero-section {
            background-image: linear-gradient(to right, #ffecd2 0%, #fcb69f 100%);
          
            color: white;
            padding: 100px 0;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }
        .hero-section .btn {
            margin-top: 20px;
        }
        .featured-post {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }
        .featured-post img {
            transition: transform 0.3s ease;
        }
        .featured-post:hover img {
            transform: scale(1.05);
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        .sticky-sidebar {
            position: sticky;
            top: 20px;
        }
        .list-group-item a {
            color: #333;
            text-decoration: none;
        }
        .list-group-item a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <header class="hero-section text-center">
        <div class="container">
            <h1 class="display-4">Welcome to My Blog</h1>
            <p class="lead">Sharing knowledge, insights, and stories</p>
            <a href="#latest-posts" class="btn btn-light btn-lg\\\">Explore Posts</a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            <!-- Featured Post -->
           

            <!-- Blog Posts -->
            <div class="col-md-8" id="latest-posts">
                <h3 class="mb-4">Latest Posts</h3>
                <div class="row g-4">
                    <!-- Blog Post 1 -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <img src="Bestproduct/Kreanchi.jpg" class="card-img-top" alt="Blog Post">
                            <div class="card-body">
                                <h5 class="card-title">Blog Post Title</h5>
                                <p class="card-text">A short description of the blog post...</p>
                                <a href="#" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Post 2 -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <img src="Bestproduct/pork Bolkogi-.jpg" class="card-img-top" alt="Blog Post">
                            <div class="card-body">
                                <h5 class="card-title">Blog Post Title</h5>
                                <p class="card-text">A short description of the blog post...</p>
                                <a href="#" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Post 3 -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <img src="Bestproduct/pouring-honey-on-pancakes-1024x1024.png" class="card-img-top" alt="Blog Post">
                            <div class="card-body">
                                <h5 class="card-title">Blog Post Title</h5>
                                <p class="card-text">A short description of the blog post...</p>
                                <a href="#" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Post 4 -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <img src="Bestproduct/jaijangbion.jpg" class="card-img-top" alt="Blog Post">
                            <div class="card-body">
                                <h5 class="card-title">Blog Post Title</h5>
                                <p class="card-text">A short description of the blog post...</p>
                                <a href="#" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Post 5 -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <img src="Bestproduct/dum3.jpg" class="card-img-top" alt="Blog Post">
                            <div class="card-body">
                                <h5 class="card-title">Blog Post Title</h5>
                                <p class="card-text">A short description of the blog post...</p>
                                <a href="#" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Post 6 -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <img src="Bestproduct/burger-with-melted-cheese-1024x1024.png" class="card-img-top" alt="Blog Post">
                            <div class="card-body">
                                <h5 class="card-title">Blog Post Title</h5>
                                <p class="card-text">A short description of the blog post...</p>
                                <a href="#" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Post 7 -->
                    
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="sticky-sidebar">
                    <div class="card mb-4 shadow-sm rounded-lg">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">Categories</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php
                            // Define categories as an array
                            $categories = [
                                ["name" => "Tech", "icon" => "fas fa-laptop"],
                                ["name" => "Lifestyle", "icon" => "fas fa-heart"],
                                ["name" => "Business", "icon" => "fas fa-briefcase"],
                                ["name" => "Travel", "icon" => "fas fa-plane"]
                            ];

                            // Loop through categories and display them
                            foreach ($categories as $category) {
                                echo '
                                <li class="list-group-item">
                                    <a href="#" class="text-decoration-none d-block py-2">
                                        <i class="' . $category['icon'] . ' mr-2"></i>' . $category['name'] . '
                                    </a>
                                </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>