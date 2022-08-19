<!-- head -->
<?php require_once('include/head.php') ?>
<!-- head.// -->

<div class="contatiner-fluid">
    <div class="row gx-2 gy-3 p-3 bg-white border border-primary fixed-top">
        <div class="col-md-2 col-6 flex-grow-0">
            <a href="index.html" class="brand-wrap me-3"> <img class="logo" height="100" src="assets/images/logo.png" /> </a>
            <!-- brand-wrap end.// -->
        </div>
        <div class="col-md-3 col-6 flex-grow-0">
            <div class="dropdown float-end">
                <div class="input-group"><input type="text" class="form-control" name="location" placeholder="Change Location" /> <span class="btn btn-primary"> <i class="fa me-1 fa-map-marker"></i> Change </span></div>                 
            </div>
            <!-- category-wrap end.// -->
        </div>
        <!-- col end.// -->
        <div class="col-md-4 col-12">
            <form action="#">
                <div class="input-group"><input type="search" class="form-control" placeholder="Food or Restaurant" /> <button class="input-group-text btn btn-primary">Search</button></div>
                <!-- input-group end.// -->
            </form>
            <!-- search-wrap end.// -->
        </div>
        <!-- col end.// -->
        <div class="col-md-3 col-12">
            <div class="float-md-end">
                <a href="#" class="btn btn-light"> <i class="fa fa-heart me-1"></i> Wishlist </a> <a data-bs-toggle="offcanvas" href="#offcanvas_cart" class="btn btn-light"> <i class="fa fa-shopping-cart me-1"></i> My cart </a>
                <button class="btn btn-dark d-md-none float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_main8" aria-controls="div_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- row end.// -->
</div>

<section class="bg-light shadow my-3">
    <div class="container main">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6"><img src="assets/images/banners/intro-item1.jpg" class="img-fluid" /></div>
            <!-- col.// -->
            <div class="col-lg-6 col-md-6">
            <article class="card">
                <div class="card-body">
                    <h5 class="card-title">Register Deliverer</h5>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3"><label class="form-label">First name</label> <input type="text" class="form-control" placeholder="Type here" /></div>
                        <!-- col end.// -->
                        <div class="col-md-6 col-sm-12"><label class="form-label">Last name</label> <input type="text" class="form-control" placeholder="Type here" /></div>
                        <!-- col end.// -->
                        <div class="col-md-6 col-sm-12 mb-3"><label class="form-label">Phone</label> <input type="text" value="" class="form-control" placeholder="+1" /></div>
                        <!-- col end.// -->
                        <div class="col-md-6 col-sm-12 mb-3"><label class="form-label">Email</label> <input type="text" class="form-control" placeholder="example@gmail.com" /></div>
                        <!-- col end.// -->
                        <div class="col-md-6 col-sm-12 mb-3"><label class="form-label">NIC</label> <input type="text" class="form-control" placeholder="Type here" /></div>
                        <!-- col end.// --> 
                        <div class="col-md-6 col-sm-12 mb-3"> <label class="form-label">Birthday</label> <input class="form-control" type="date"> </div>                              
                        <!-- col end.// -->

                    </div>
                    <!-- row.// -->
                    
                    <div class="row">
                        <div class="col-sm-12 mb-3"><label class="form-label">Address</label> <input type="text" class="form-control" placeholder="Type here" /></div>
                        <!-- col end.// -->
                        <div class="col-sm-12 col-md-6 mb-3">
                            <label class="form-label">City*</label>
                            <select class="form-select" id="city*" aria-label="City*">
                                <option value="">New York</option>
                                <option value="">Moscow</option>
                                <option value="">Samarqand</option>
                            </select>
                        </div>
                        <!-- col end.// -->   
                        <div class="col-sm-12 col-md-6 mb-3">
                            <label class="form-label">Country*</label>
                            <select class="form-select" id="city*" aria-label="City*">
                                <option value="">USA</option>
                                <option value="">Canada</option>
                                <option value="">India</option>
                                <option value="">Pakistan</option>
                            </select>
                        </div>
                        <!-- col end.// -->                           
                        <div class="col-sm-12 col-md-6 mb-3"><label class="form-label">Postal code</label> <input type="text" class="form-control" placeholder="" /></div>
                        <!-- col end.// -->
                        <div class="col-sm-12 col-md-6 mb-3"><label class="form-label">Zip</label> <input type="text" class="form-control" placeholder="" /></div>
                        <!-- col end.// -->
                    </div>
                    <!-- row.// -->
                    <button class="btn btn-primary">Register</button>
                    <button class="btn btn-light">Cancel</button>
                </div>
                <!-- card-body end.// -->
            </article>
        </div>
        <!-- col.// -->               
    </div>
    <!-- row.// -->
<!-- </div> -->
<!-- container end.// -->
</section>  
    
<!-- footer -->
<?php require_once('include/footer.php') ?>
<!-- footer.// -->
</body>
</html>