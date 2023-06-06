<?php 
include 'header.php';

if(isset($_POST['add'])){
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $weight = $_POST['weight'];
  $dimension = $_POST['dimension'];
  $material = $_POST['material'];
  $category = $_POST['category'];

  $img1 = $_FILES['files1'];
  $img2 = $_FILES['files2'];
  $img3 = $_FILES['files3'];
  $img4 = $_FILES['files4'];
  $img5 = $_FILES['files5'];
  $image1 = $img1['name'];
  $image2 = $img2['name'];
  $image3 = $img3['name'];
  $image4 = $img4['name'];
  $image5 = $img5['name'];

  $insert = "INSERT INTO `products` ( `title`, `price`, `description`, `img1`, `img2`, `img3`, `img4`, `img5`, `weight`, `dimension`, `material`, `category`) VALUES ( '$title', '$price', '$description', '$image1', '$image2', '$image3', '$image4', '$image5', '$weight', '$dimension', '$material', '$category')";
  $result = mysqli_query($conn, $insert);




}
?>



    <!--start main content-->
     <main class="page-content">
        <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">eCommerce</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Product</li>
							</ol>
						</nav>
					</div>
          
					<div class="ms-auto">
						<div class="btn-group">
							<a href="products.php" class="btn btn-primary">Show Product</a>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
              	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
         <form method="post" enctype="multipart/form-data">
         <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card">
                   <div class="card-body">
                     <div class="mb-4">
                        <h5 class="mb-3">Product Title</h5>
                        <input type="text" class="form-control" name="title" placeholder="write title here....">
                     </div>
                     <div class="mb-4">
                       <h5 class="mb-3">Product Description</h5>
                       <textarea class="form-control" name="description" cols="4" rows="6" placeholder="write a description here.."></textarea>
                     </div>
                     <div class="mb-4">
                      <h5 class="mb-3">Display images</h5>
                      <input  type="file" name="files1" accept=".jpg, .png, image/jpeg, image/png" >
                      <input type="file" name="files2" accept=".jpg, .png, image/jpeg, image/png" >
                      <input type="file" name="files3" accept=".jpg, .png, image/jpeg, image/png" >
                      <input  type="file" name="files4" accept=".jpg, .png, image/jpeg, image/png" >
                      <input  type="file" name="files5" accept=".jpg, .png, image/jpeg, image/png" >
                    </div>
                    <div class="mb-4">
                     
                      
                      <div class="row g-3">
                  
                        <div class="col-12 col-lg-9">
                          <div class="tab-content">

                          </div>
                        </div>
                       </div>
                     </div> 
                   </div>
                </div>
            </div> 
            <div class="col-12 col-lg-4">
               
                <div class="card">
                  <div class="card-body">
                     <h5 class="mb-3">Organize</h5>
                        <div class="row g-3">
                            <div class="col-12">
                              <label for="AddCategory" class="form-label fw-bold">Category</label>
                              <select class="form-select" id="AddCategory"  name='category'>
                                <option disabled selected>Select Category</option>
                                <?php 
                                $category = "SELECT * FROM `category`";
                                $categoryResult = mysqli_query($conn,$category);

                                while($crow = mysqli_fetch_array($categoryResult)){

                               
                                ?>
                                <option value="<?php echo $crow['cid']?>"><?php echo $crow[1]?></option>
                               <?php  }?>
                              </select>
                            </div>
                          
                           
                          
                           
                          </div><!--end row-->
                       </div>
                  </div>

                  <div class="card">
                    <div class="card-body">
                      <h5 class="mb-3">Information</h5>
                      <div class="row g-3">
                        <div class="col-12">
                          <label for="Brand" class="form-label fw-bold">Price</label>
                          <input type="number" class="form-control" id="Brand" name="price" placeholder="Brand">
                         </div>
                        <div class="col-12">
                          <label for="Brand" class="form-label fw-bold">Weight</label>
                          <input type="number" class="form-control" id="Brand" name="weight" placeholder="Brand">
                         </div>
                        <div class="col-12">
                          <label for="SKU" class="form-label fw-bold">Dimension</label>
                          <input type="number" class="form-control" id="SKU" name="dimension" placeholder="SKU">
                         </div>
                         <div class="col-12">
                          <label for="Color" class="form-label fw-bold">Material</label>
                          <input type="text" class="form-control" id="Color" name="material" placeholder="Color">
                         </div>
                        
                          <div class="col-12">
                            <div class="d-grid"> 
                              <button type="submit" name="add" class="btn btn-primary">Add Product</button>
                            </div>
                          </div>
                        </div>
                    </div>
                   </div>

                </div>                
            
           </div><!--end row-->
           </form>
     </main>
     <!--end main content-->
 

    <!--start overlay-->
      <div class="overlay btn-toggle-menu"></div>
    <!--end overlay-->

    <!-- Search Modal -->
    <div class="modal" id="exampleModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header gap-2">
            <div class="position-relative popup-search w-100">
              <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
              <span class="material-symbols-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
            </div>
            <button type="button" class="btn-close d-xl-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="search-list">
                 <p class="mb-1">Html Templates</p>
                 <div class="list-group">
                    <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2"><i class="bi bi-filetype-html fs-5"></i>Best Html Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-award fs-5"></i>Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-box2-heart fs-5"></i>Responsive Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-camera-video fs-5"></i>eCommerce Html Templates</a>
                 </div>
                 <p class="mb-1 mt-3">Web Designe Company</p>
                 <div class="list-group">
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-chat-right-text fs-5"></i>Best Html Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-cloud-arrow-down fs-5"></i>Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-columns-gap fs-5"></i>Responsive Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-collection-play fs-5"></i>eCommerce Html Templates</a>
                 </div>
                 <p class="mb-1 mt-3">Software Development</p>
                 <div class="list-group">
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-cup-hot fs-5"></i>Best Html Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-droplet fs-5"></i>Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-exclamation-triangle fs-5"></i>Responsive Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-eye fs-5"></i>eCommerce Html Templates</a>
                 </div>
                 <p class="mb-1 mt-3">Online Shoping Portals</p>
                 <div class="list-group">
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-facebook fs-5"></i>Best Html Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-flower2 fs-5"></i>Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-geo-alt fs-5"></i>Responsive Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-github fs-5"></i>eCommerce Html Templates</a>
                 </div>
              </div>
          </div>
        </div>
      </div>
    </div>


    <!--start theme customization-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="ThemeCustomizer" aria-labelledby="ThemeCustomizerLable">
      <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="ThemeCustomizerLable">Theme Customizer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <h6 class="mb-0">Theme Variation</h6>
        <hr>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1">
          <label class="form-check-label" for="LightTheme">Light</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2" checked="">
          <label class="form-check-label" for="DarkTheme">Dark</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
          <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
        </div>
        <hr>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3">
          <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ShadowTheme" value="option4">
          <label class="form-check-label" for="ShadowTheme">Shadow Theme</label>
        </div>
       
      </div>
    </div>
    <!--end theme customization-->

   <!--plugins-->
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
   <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
   <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
   <script src="assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	 <script src="assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	 <script src="assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	 <script src="assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
   <script>
		$('#fancy-file-upload').FancyFileUpload({
			params: {
				action: 'fileuploader'
			},
			maxfilesize: 1000000
		});
	 </script>

    <!--BS Scripts-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>