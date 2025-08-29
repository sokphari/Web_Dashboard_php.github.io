     <?php 
                    // if (isset($_GET['success'])) {
                    //     echo "<script>alert('Successfully Inserted!')</script>";
                    // }
                    // $messageSuccess="<script>alert('Successfully for Insert')</script>";
                    // $messageError = "Error Not found !!!!!";
                    // if (isset($_POST["save"])) {
                    //     $name = htmlspecialchars($_POST["name"]);
                    //     $description = htmlspecialchars($_POST["description"]);
                    //     $category_id = $_POST["category_id"];
                    //     $price = $_POST["price"];
                    //     $stock = $_POST["stock"];
                    //     $image =$_FILES["image"]["name"];
                    //     $Path = $_FILES["image"]["tmp_name"];
                    //     $folderImage ='upload/'.$image;
                    //     if(move_uploaded_file( $Path, $folderImage )) {
                    //         try{
                    //             $database = "INSERT INTO `product` (name, description, price, stock, category_id, image) 
                    //             VALUES ('$name', '$description', '$price', '$stock', '$category_id', '$folderImage')";
                    //             $result = mysqli_query($con, $database);
                    //            if(!$result){
                    //                 die("<script>alert('$messageError')</script>". mysqli_error($con));
                    //             }else{
                    //                 header("Location: ".$_SERVER['PHP_SELF']."?success=1");
                    //                 exit();
                    //             }
                    //         }catch(Exception $e){
                    //             echo "201". $e->getMessage() ."";
                    //         }
                    //     }
                        
                    // }
                    ?>
    <div class="container px-5">
        <!-- card two for woman and weman  -->
        <div class="container">
            <div class="row mt-3 justify-content-center " style="font-family: var(--main-font);">
                <div class="col-12 col-sm-6 d-flex flex-column align-items-center">
                    <div class="card w-100 rounded-0 " style="max-width: 700px; height: 90vh; overflow: hidden;">
                        <img src="./T-shiirt_drink1.jpg" alt="" class="card-img-top rounded-0 h-100 ">
                    </div>
                    <a href="" id="women" class="btn py-2 w-100 mt-2 border border-black rounded-0" style="max-width: 700px;">
                        Women Collection
                    </a>
                </div>
                <div class="col-12 col-sm-6 d-flex flex-column align-items-center">
                    <div class="card w-100 rounded-0" style="max-width: 700px; height:90vh; overflow:hidden">
                        <img src="./men-sit1.jpg" alt="" class="card-img-top rounded-0 h-100">
                    </div>
                    <a href="" id="men" class="btn py-2 w-100 mt-2 border border-black rounded-0" style="max-width: 700px;">
                        Men Collection
                    </a>
                </div>
            </div>
        </div>
         <!-- card for image 4 -->
        <div class="container d-flex mt-4 px-0">
            <div class="p-2 w-100 fs-3 fw-bolder text">Sip in style , stay Dry🍺☔</div>
            <div class="p-2 flex-shrink-1"></div>
        </div>
        <div class="container mb-3">
            <?php
                $category = isset($_GET['category']) ? $_GET['category'] : 'all';

                // Base query always includes category 1
                $sql = "SELECT * FROM product WHERE category_id = 3";

                // If user selects another category (not "all" or 1), include that category too
                if ($category !== 'all' && $category != 1) {
                    $sql = "SELECT * FROM product WHERE category_id = 1 OR category_id = '$category'";
                }

                $result = mysqli_query($con, $sql);
            ?>
                <div class="row">
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '
                         <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                                <div class="card h-100" style="border: none;">
                                    <img src="'.$row['image'].'" class="card-img-top rounded-0" alt="Product" style="height: 75%; object-fit: cover;">
                                    <div class="card-body px-0">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="card-title" style="color: var(--color); font-weight: bold;">$' . $row['price'] . '</h6>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                                                class="bi bi-bookmark" viewBox="0 0 16 16">
                                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 
                                                        13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 
                                                        1 0 0 0-1 1v12.566l4.723-2.482a.5.5 
                                                        0 0 1 .554 0L13 14.566V2a1 1 
                                                        0 0 0-1-1z"/>
                                            </svg>
                                        </div>
                                        <p class="card-text">' . $row['name'] . '</p>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                } else {
                    echo "Data Product in database empty";
                }
            ?>
                </div>
        </div>
        <div class="container d-flex mt-4 px-0" >
            <div class="p-2 w-100 fs-3 fw-bolder text">Men Hot Picks,70% Savings!🍎</div>
            <div class="p-2 flex-shrink-1"></div>
        </div>
          <div class="container mb-3">
            <?php
                $category = isset($_GET['category']) ? $_GET['category'] : 'all';

                // Base query always includes category 1
                $sql = "SELECT * FROM product WHERE category_id = 2";

                // If user selects another category (not "all" or 1), include that category too
                if ($category !== 'all' && $category != 1) {
                    $sql = "SELECT * FROM product WHERE category_id = 1 OR category_id = '$category'";
                }

                $result = mysqli_query($con, $sql);
            ?>
                <div class="row">
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '
                       <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                                <div class="card h-100" style="border: none;">
                                    <img src="'.$row['image'].'" class="card-img-top rounded-0" alt="Product" style="height: 75%; object-fit: cover;">
                                    <div class="card-body px-0">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="card-title" style="color: var(--color); font-weight: 600;" >$' . $row['price'] . '</h6>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                                                class="bi bi-bookmark" viewBox="0 0 16 16">
                                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 
                                                        13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 
                                                        1 0 0 0-1 1v12.566l4.723-2.482a.5.5 
                                                        0 0 1 .554 0L13 14.566V2a1 1 
                                                        0 0 0-1-1z"/>
                                            </svg>
                                        </div>
                                        <p class="card-text">' . $row['name'] . '</p>
                                    </div>
                                </div>
                        </div>
                        ';
                    }
                } else {
                    echo "Data Product in database empty";
                }
            ?>
                </div>
        </div>
        <div class="container d-flex mt-4 px-0">
            <div class="p-2 w-100 fs-3 fw-bolder text">💃Don't Miss - 70% OFF For Her!!</div>
            <div class="p-2 flex-shrink-1"></div>
        </div>
          <div class="container mb-3">
            <?php
                $category = isset($_GET['category']) ? $_GET['category'] : 'all';

                // Base query always includes category 1
                $sql = "SELECT * FROM product WHERE category_id = 1";

                // If user selects another category (not "all" or 1), include that category too
                if ($category !== 'all' && $category != 1) {
                    $sql = "SELECT * FROM product WHERE category_id = 1 OR category_id = '$category'";
                }

                $result = mysqli_query($con, $sql);
            ?>
                <div class="row">
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb-4">
                                <div class="card h-100" style="border: none;">
                                    <img src="'.$row['image'].'" class="card-img-top rounded-0" alt="Product" style="height: 75%; object-fit: cover;">
                                    <div class="card-body px-0">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="card-title" style="color: var(--color); font-weight:bold;">$' . $row['price'] . '</h6>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                                                class="bi bi-bookmark" viewBox="0 0 16 16">
                                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 
                                                        13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 
                                                        1 0 0 0-1 1v12.566l4.723-2.482a.5.5 
                                                        0 0 1 .554 0L13 14.566V2a1 1 
                                                        0 0 0-1-1z"/>
                                            </svg>
                                        </div>
                                        <p class="card-text">' . $row['name'] . '</p>
                                    </div>
                                </div>
                            </div>

                        ';
                    }
                } else {
                    echo "Data Product in database empty";
                }
            ?>
                </div>
        </div>
    </div>
    <div class="container-fluid my-5 bg-success">
        <h5 class="text-center text-light py-2">Free Delivey on order above 40$ spent</h5>
    </div>

   