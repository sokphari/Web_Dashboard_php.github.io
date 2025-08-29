<?php
session_start();
 include("database.php");
// check if admin not login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../src/style/index.css">
</head>
    <style>
        a{
            text-decoration: none;
        }
        body{
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        :root{
            --main-font:"Noto Sans", "sans-serif";
        }
        /* Background overlay */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 999; 
            left: 0; 
            top: 0; 
            width: 100%; 
            height: 100%; 
            background-color: rgba(0,0,0,0.6); 
            justify-content: center; 
            align-items: center; 
        }

        /* Centered modal box */
        .modal-content {
            background: #fff; 
            border-radius: 10px; 
            padding: 20px; 
            width: 50%; 
            height: 80vh; 
            overflow-y: auto; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.3); 
        }

        /* Modal header */
        .modal-header {
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            border-bottom: 1px solid #ddd; 
            padding-bottom: 10px; 
            margin-bottom: 15px; 
        }

        /* Close button */
        .close-modal {
            cursor: pointer; 
            font-size: 24px; 
            font-weight: bold; 
        }
    </style>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2><i class="fas fa-cog"></i> Admin Panel</h2>
            </div>
            <ul class="sidebar-menu">
                <li class="active"><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-tshirt"></i> Products</a></li>
                <li><a href="#"><i class="fas fa-list"></i> Categories</a></li>
                <li><a href="#"><i class="fas fa-image"></i> Banners</a></li>
                <li><a href="#"><i class="fas fa-chart-bar"></i> Reports</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Product Management Dashboard</h1>
                <div class="user-info">
                    <div class="user-avatar">
                        A
                    </div>
                    <span>Admin User</span>
                </div>
            </div>
         <?php
            $messageSuccess = "<script>alert('Successfully Inserted')</script>";
            $messageError = "Error Not found !!!!!";

            if (isset($_POST["AddProduct"])) {
                $name = htmlspecialchars($_POST["name"]);
                $description = htmlspecialchars($_POST["description"]);
                $category_id = $_POST["category_id"];
                $stock = $_POST["stock"];
                $price = $_POST["price"];   
                $status = $_POST["status"];   
                $image = $_FILES["image"]["name"];
                $Path = $_FILES["image"]["tmp_name"];

                // ✅ Real path to move uploaded file
                $targetDir = "../Image/"; 
                $targetFile = $targetDir . $image;

                // ✅ Path to store in DB (relative to project root, not from auth/)
                $folderImage = "Image/" . $image;

                if (move_uploaded_file($Path, $targetFile)) {
                    try {
                        $sql = "INSERT INTO `product` (name, description, price, status, category_id, image) 
                                VALUES ('$name', '$description', '$price', '$status', '$category_id', '$folderImage')";
                        
                        $result = mysqli_query($con, $sql);

                        if (!$result) {
                            die("<script>alert('$messageError')</script>" . mysqli_error($con));
                        } else {
                            echo $messageSuccess;
                            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
                            exit();
                        }
                    } catch (Exception $e) {
                        echo "201 " . $e->getMessage();
                    }
                } else {
                    echo "<script>alert('Image upload failed!')</script>";
                }
            }
            ?>

            <!-- Action Bar -->
            <div class="action-bar">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search products...">
                </div>
                <?php
                $category = isset($_GET['category']) ? $_GET['category'] : 'all';

                if ($category == "all") {
                    $sql = "SELECT * FROM product"; 
                } else {
                    $sql = "SELECT * FROM product WHERE category_id = '$category'";
                }

                $result = mysqli_query($con, $sql);
                ?>

                <div class="filter-box">
                    <form method="GET" action="dashboard.php">
                        <select name="category" onchange="this.form.submit()">
                            <option value="all" <?= $category == 'all' ? 'selected' : '' ?>>All Categories</option>
                            <option value="1"   <?= $category == '1' ? 'selected' : '' ?>>Women's Shirts</option>
                            <option value="2"   <?= $category == '2' ? 'selected' : '' ?>>Men's Shirts</option>
                            <option value="3"   <?= $category == '3' ? 'selected' : '' ?>>Products</option>
                        </select>

                    </form>
                    <button class="btn" type="button" onclick="openAddProductModal()">
                        <i class="fas fa-plus"></i> Add Product
                    </button>
                </div>

            </div>

            <!-- Products Table -->
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // $sql = "SELECT * FROM `women`"; 
                        // $result = mysqli_query($con,$sql);
                        while ($row = mysqli_fetch_assoc($result)) { 
                        if ($category == "all") {
                            $sql = "SELECT * FROM product"; 
                        } else {
                            $sql = "SELECT * FROM product WHERE category_id = '$category'";
                        }
                    }   
                        $result = mysqli_query($con, $sql);
                        if(!$result){
                            echo"Select Not Found.". mysqli_error($con);
                        }else{
                        }
                           while($row = mysqli_fetch_assoc($result)){
                            echo '
                                <tr>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['category_id'].'</td>
                                    <td>'.$row['price'].'</td>
                                    <td>'.$row['stock'].'</td>
                                    <td><span class="status in-stock">'.$row['status'].'</span></td>
                                    <td class="action-buttons">
                                        <a href="#" class="btn-edit"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="#" class="btn-delete"><i class="fas fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            ';
                        }


                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Product Modal -->
  <!-- Modal -->
<div id="addProductModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Add New Product</h2>
            <span class="close-modal" onclick="closeAddProductModal()">&times;</span>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" id="productName" name="name" placeholder="Enter product name">
            </div>

            <div class="form-group">
                <label for="productCategory">Category</label>
                <input type="number" id="productCategory" name="category_id">
            </div>

            <div class="form-group">
                <label for="productPrice">Price ($)</label>
                <input type="number" id="productPrice" name="price" placeholder="Enter price" step="0.01">
            </div>
            <div class="form-group">
                <label for="productPrice">stock</label>
                <input type="number" id="productPrice" name="stock" placeholder="Enter stock" step="0.01">
            </div>

            <div class="form-group">
                <label for="productStatus">Status</label>
                <select name="status" id="productStatus">
                    <option value="in-stock">In Stock</option>
                    <option value="out-of-stock">Out of Stock</option>
                    <option value="low-stock">Low Stock</option>
                </select>
            </div>

            <div class="form-group">
                <label for="productDescription">Description</label>
                <textarea id="productDescription" name="description" placeholder="Enter product description"></textarea>
            </div>

            <div class="form-group">
                <label for="productImage">Product Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="form-actions">
                <button class="btn-delete" type="button" onclick="closeAddProductModal()">Cancel</button>
                <button class="btn-primary" type="submit" name="AddProduct" id="addProductModal">Add Product</button>
            </div>
        </form>
    </div>
</div>

<script>
 function openAddProductModal() {
        document.getElementById("addProductModal").style.display = "block";
    }

    function closeAddProductModal() {
        document.getElementById("addProductModal").style.display = "none";
    }
    closeAddProductModal();
</script>

    <!--<script>
        // Simulated login function
        function login() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            // Simple validation
            if (username && password) {
                // Hide login screen and show dashboard
                document.getElementById('loginScreen').style.display = 'none';
                document.getElementById('dashboard').style.display = 'flex';
            } else {
                alert('Please enter both username and password');
            }
        }
        
        // Logout function
        function logout() {
            document.getElementById('loginScreen').style.display = 'flex';
            document.getElementById('dashboard').style.display = 'none';
        }
        
        // Modal functions
        function openAddProductModal() {
            document.getElementById('addProductModal').style.display = 'flex';
        }
        
        function closeAddProductModal() {
            document.getElementById('addProductModal').style.display = 'none';
        }
        
        function openEditProductModal() {
            // In a real app, this would populate the form with product data
            openAddProductModal();
            document.querySelector('.modal-header h2').textContent = 'Edit Product';
            document.querySelector('.form-actions button.btn-primary').textContent = 'Update Product';
        }
        
        // Product functions
        function addProduct() {
            // In a real app, this would send data to the server
            alert('Product added successfully!');
            closeAddProductModal();
        }
        
        function deleteProduct() {
            if (confirm('Are you sure you want to delete this product?')) {
                // In a real app, this would send a delete request to the server
                alert('Product deleted successfully!');
            }
        }
        
        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('addProductModal');
            if (event.target === modal) {
                closeAddProductModal();
            }
        };
    </script> -->
</body>
</html>