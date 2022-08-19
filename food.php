<!-- head -->
<?php require_once('include/head.php'); ?>
<!-- head.// -->

<section class="">
    <!-- =================== COMPONENT 1 ====================== -->
    <div class="card bg-primary p-5" style="min-height: 450px; background-size: cover; background-image: url('assets/images/banners/intro-bg.jpg');">
        <header class=" mt-5">
            <h1 class="display-4 text-white"><?= $_lang['order_f_o_n'] ?></h1>
            <p class="lead text-white"><?= $_lang['discover_b_f_d_y_a'] ?></p>
        </header>
        <div class="nav-wrapper">
            <div class="sl-nav">
                <ul>
                    <li>
                        <?php
                            switch (isset($_SESSION['lang']) ? $_SESSION['lang'] : '') {
                                case 'en':
                                    $is_active = 'en';
                                    echo '<i class="sl-flag flag-en"></i> ';
                                    break;
                                case 'fr':
                                    $is_active = 'fr';
                                    echo '<i class="sl-flag flag-fr"></i> ';
                                    break;
                                case 'sp':
                                    $is_active = 'sp';
                                    echo '<i class="sl-flag flag-sp"></i> ';
                                    break;
                                case 'hi':
                                    $is_active = 'hi';
                                    echo '<i class="sl-flag flag-hi"></i> ';
                                    break;
                                default:
                                    $is_active = 'en';
                                    echo '<i class="sl-flag flag-en"></i> ';
                                    break;
                            }
                        ?>
                        <div class="triangle"></div>
                        <form method="post">
                            <ul>
                                <li><i class="sl-flag flag-en"></i> <span class="<?php echo $is_active == 'en' ? 'active' : '' ?>"><input type="submit" name="lang" value="en"/>English</span></li>
                                <li><i class="sl-flag flag-fr"></i> <span class="<?php echo $is_active == 'fr' ? 'active' : '' ?>"><input type="submit" name="lang" value="fr"/>Français</span></li>
                                <li><i class="sl-flag flag-sp"></i> <span class="<?php echo $is_active == 'sp' ? 'active' : '' ?>"><input type="submit" name="lang" value="sp"/>español</span></li>
                                <li><i class="sl-flag flag-hi"></i> <span class="<?php echo $is_active == 'hi' ? 'active' : '' ?>"><input type="submit" name="lang" value="hi"/>भारतीय</span></li>
                            </ul>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <form class="w-100 mb-3" style="max-width: 800px;" action="/main.php" method="get">
            <div class="row g-2 w-100">
                <div class="col flex-grow">
                    <div class="input-group">
                        <select class="form-select" name="expedition" style="max-width: 20%;">
                            <option><?= $_lang['delivery'] ?></option>
                            <option><?= $_lang['pickup'] ?></option>
                        </select>
                        <input type="text" placeholder="or Type Location" class="form-control location" name="location" id="locationAddress" value="" />
                    </div>
                </div>
                <!-- col.// -->
                <div class="col-auto"><button class="btn btn-warning btn-search" id="showMe" onclick="getLocation()"><i
                            class="fa me-1 fa-map-marker"></i><?= $_lang['findme'] ?> </button></div>
                <!-- col.// -->
            </div>
            <!-- row.// -->
        </form>

        <?php if(!isset($_SESSION['loggedin'])) :  ?>
            <article class="">
                <p class="lead text-white"><?= $_lang['L_R_d_y_n_l_f'] ?></p>
                <a href="#" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#register"> <?= $_lang['register'] ?></a> 
                <a href="main.php" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal"> <?= $_lang['login'] ?> </a>
            </article>
        <?php endif ?>
    </div>
</section>
<br />
<br />
<section class="">
    <div class="container">
        <div class="row align-items-center" style="min-height: 520px;">
            <div class="col-lg-6 col-md-6">
                <article class="my-5">
                    <h1 class="display-4">
                    <?= $_lang['register_restaurant'] ?>
                    </h1>
                    <p class="lead"><?= $_lang['c_r_s_i_y_r'] ?></p>
                    <a href="reg-restaurant.html" class="btn btn-primary btn-lg"> <?= $_lang['register'] ?> </a> <a href="learnmore.html" class="btn btn-light btn-lg"> <?= $_lang['learn_more'] ?> </a>
                </article>
            </div>
            <!-- col.// -->
            <div class="col-lg-6 col-md-6 order-lg-1"><img src="assets/images/banners/intro-item2.jpg" class="mw-100 rounded-circle" /></div>
            <!-- col.// -->
        </div>
        <!-- row.// -->
    </div>
    <!-- container end.// -->
</section>
<br />
<hr />
<section class="">
    <div class="container">
        <div class="row align-items-center" style="min-height: 520px;">
            <div class="col-lg-6 order-lg-2">
                <article class="my-5 ms-lg-5">
                    <h1 class="display-4">
                        <?= $_lang['become_deliverer'] ?>
                    </h1>
                    <p class="lead"><?= $_lang['j_e_b_t_d'] ?></p>
                    <a href="reg-deliverer.html" class="btn btn-primary btn-lg"> <?= $_lang['register'] ?> </a> <a href="learnmore.html" class="btn btn-light btn-lg"> <?= $_lang['learn_more'] ?> </a>
                </article>
            </div>
            <!-- col.// -->
            <div class="col-lg-6 col-md-6 order-lg-1"><img src="assets/images/banners/intro-item1.jpg" class="mw-100 rounded-circle" width="500" /></div>
            <!-- col.// -->
        </div>
        <!-- row.// -->
    </div>
    <!-- container end.// -->
</section>


<!-- Modal -->
<div class="modal fade" tabindex="-1" id="register" role="dialog">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $_lang['create_account'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="login-form">
                        <form action="controller/register.php" method="post">

                            <!-- form-group// -->
                            <div class="mb-3">
                                <label class="form-label"><?= $_lang['username'] ?></label>
                                <input type="text" class="form-control input_sign" id="username" name="username" placeholder="Username" value="<?php echo isset($_GET['user']) ? $_GET['user'] : ''; ?>">
                                <!-- Alert tool tip -->
                                <div id="userConditions" class="bubble right">
                                    <p id="userConditionsColor" class="info">Username must be atleast <b>3 characters long</b> and may only contain <b>letters</b> and <b>numbers</b></p>
                                </div>
                            </div>

                            <!-- form-group// -->
                            <div class="mb-3">
                                <label class="form-label"><?= $_lang['email'] ?></label>
                                <input type="text" class="form-control input_sign" name="email" placeholder="Email address" value="<?php echo isset($_GET['mail']) ? $_GET['mail'] : ''; ?>">
                            </div>

                            <!-- form-group// -->
                            <div class="mb-3">
                                <label class="form-label"><?= $_lang['phone'] ?></label>
                                <input type="text" class="form-control input_sign" name="phone" id="register_phone" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>">
                            </div>

                            <!-- form-group// -->
                            <div class="mb-3">
                                <label class="form-label"><?= $_lang['password'] ?></label>
                                <input type="password" class="form-control input_sign" id="psw" name="password" placeholder="Password">
                                <!-- Alert tool tip -->
                                <div id="conditions" class="bubble left">
                                    <p id="conditionsColor" class="info">Make sure your password is atleast <b>8 characters</b> long, contains a <b>lowercase</b> and an <b>uppercase</b> letter, and a <b>number</b></p>
                                </div>
                            </div>

                            <!-- form-group// -->
                            <div class="mb-3">
                                <label class="form-label"><?= $_lang['confirm_password'] ?></label>
                                <input type="password" class="form-control input_sign" id="confirm" name="confirm" placeholder="Confirm password">

                                <!-- Alert tool tip -->
                                <div id="match" class="bubble right">
                                    <p id="matchColor" class="info">Confirm that both of your passwords <b>match</b></p>
                                </div>
                            </div>
                            
                            <input type="submit" name="submit" class="submit" value="Sign up">
                            
                            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                        </form>
                    </div>
                    <p class="text-center small text-muted mb-15">or sign up with</p>
                    <div class="d-flex gap-2 mb-4">
                        <a href="#" class="w-50 btn btn-light font-sm">
                            <svg aria-hidden="true" class="icon-svg" style="vertical-align: bottom; margin-top: -4px" width="20" height="20" viewBox="0 0 20 20">
                                        <path d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 002.38-5.88c0-.57-.05-.66-.15-1.18z" fill="#4285F4"></path>
                                        <path d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 01-7.18-2.54H1.83v2.07A8 8 0 008.98 17z" fill="#34A853"></path>
                                        <path d="M4.5 10.52a4.8 4.8 0 010-3.04V5.41H1.83a8 8 0 000 7.18l2.67-2.07z" fill="#FBBC05"></path>
                                        <path d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 001.83 5.4L4.5 7.49a4.77 4.77 0 014.48-3.3z" fill="#EA4335"></path>
                                    </svg> Google
                        </a>
                        <a href="#" class="w-50 btn btn-light font-sm">
                            <svg aria-hidden="true" class="icon-svg" width="20" height="20" viewBox="0 0 20 20">
                                        <path d="M3 1a2 2 0 00-2 2v12c0 1.1.9 2 2 2h12a2 2 0 002-2V3a2 2 0 00-2-2H3zm6.55 16v-6.2H7.46V8.4h2.09V6.61c0-2.07 1.26-3.2 3.1-3.2.88 0 1.64.07 1.87.1v2.16h-1.29c-1 0-1.19.48-1.19 1.18V8.4h2.39l-.31 2.42h-2.08V17h-2.5z" fill="#4167B2"></path>
                                    </svg> Facebook
                        </a>
                    </div>
                    <p class="text-center mb-2"><?= $_lang['already_account'] ?> <a href="index.html"><?= $_lang['sign_in_now'] ?></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal.// -->

<!-- footer -->
<?php require_once('include/footer.php') ?>
<!-- footer.// -->

<!-- Yandex.Metrika counter -->
<script src="./assets/js/intlTelInput.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsXf3kypbmBUHDykCKHRIsNQAppgtZvrk&libraries=places&callback=initAutocomplete" async defer></script>

<script>
    var input = document.querySelector("#register_phone");
    window.intlTelInput(input, {
        utilsScript: "./assets/js/utils.js",
    });

    function initAutocomplete() {
        new google.maps.places.Autocomplete(
            (document.getElementById('locationAddress')), {
                types: ['geocode']
            }
        );
    }
</script>



</body>

</html>