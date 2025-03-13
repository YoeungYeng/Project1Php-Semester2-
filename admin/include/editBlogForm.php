<?php

require_once "./config.php";
$id = $_GET['p']; // retrieve the id from the URL



?>



<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-center mb-4"> Blog Page  </h2>

        <form action="action/save_blog.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title </label>
                <input type="hidden" name="blog_id" value="<?= $id ?>">
                <input type="text" class="form-control" id="title" name="txt-title" placeholder="Enter title" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Sub Title </label>
                <input type="hidden" name="blog_id" value="<?= $id ?>">
                <input type="text" class="form-control" id="title" name="txt-subtitle" placeholder="Enter sub title"
                    required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Link</label>
                
                <input type="text" class="form-control" id="title" name="txt-link" placeholder="Enter team name"
                    required>
            </div>

            

            
            

            <!-- image -->
            <div class="mb-3 no-image"
                style="padding: 12px 14px; width: 150px; height: 150px; cursor: pointer;  border-radius: 5px 7px; background: url('assets/images/no-image-icon-23485.png'); background-size: cover;">
                <!-- <label for="image" class="form-label">Product Image</label> -->
                <input type="file" style="width: 100%; height: 100px; opacity: 0" class="form-control" accept="image/*"
                    id="image" name="image" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="social" class="form-label">Social Media</label>
                <div>
                    <a href="#" class="btn btn-outline-primary me-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-outline-info me-2"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="btn btn-outline-danger me-2"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-outline-dark"><i class="bi bi-github"></i></a>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Save</button>
        </form>
        <!-- table -->
        <table class="table shadow ">
            <h2> Information of Products </h2>
            <hr class="shadow">
            <thead>
                <tr>

                    <th scope="col">Food</th>
                    <th scope="col">Subtitle</th>

                    <th scope="col">title</th>
                    <th scope="col">link</th>
                    <th scope="col">image</th>
                
                </tr>
            </thead>
            <tbody>
                <?php

                $selected = "SELECT * FROM `tbl_blog`";
                $result = $conn->query($selected);
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $im = htmlspecialchars($row['image']);  // Correct way to handle the image URL
                        $img = "../admin/action/" . $im;

                        ?>
                        <tr>
                          
                            <td> <?php echo htmlspecialchars($row['sub_title']) ?> </td>
                            <td> <?php echo htmlspecialchars($row['title']) ?> </td>
                            <td> <?php echo htmlspecialchars($row['link']) ?> </td>

                            <td> <img src="<?= $img ?>" alt="image" style='width: 40px; height: auto; '>
                            </td>
                            <td style="width: 200px; display: flex; gap: 10px;">
                                <a href="editBlog.php?p=<?php echo $row['blog_id']; ?>" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                <br>
                                <a href="action/delete_about.php?p=<?php echo $row['blog_id']; ?>">
                                    <button class="btn btn-danger"> Delete </button>
                                </a>
                            </td>
                        </tr>

                        <?php


                    }
                }
                ?>

            </tbody>
        </table>
    </div>
</div>


</html>

<!-- script for change image -->
<script>
    document.getElementById("image").addEventListener("change", function (event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector(".no-image").style.backgroundImage = `url('${e.target.result}')`;
            };
            reader.readAsDataURL(file);
        }
    });
</script>