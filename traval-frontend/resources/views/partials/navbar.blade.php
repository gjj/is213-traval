<header id="header" class="u-header u-header--dark-nav-links-xl u-header--show-hide-xl u-header--static-xl" data-header-fix-moment="500" data-header-fix-effect="slide">
    <div class="u-header__section u-header__shadow-on-show-hide py-4 py-xl-0">
        <!-- Topbar -->
        <div class="container-fluid u-header__hide-content u-header__topbar u-header__topbar-lg border-bottom border-color-8">
            <div class="d-flex align-items-center">
                <ul class="list-inline list-inline-dark u-header__topbar-nav-divider--dark mb-0">
                    <li class="list-inline-item mr-0"><a href="tel:(000)999-898-999" class="u-header__navbar-link">(000) 999 - 898 -999</a></li>
                    <li class="list-inline-item mr-0"><a href="mailto:info@mytravel.com" class="u-header__navbar-link">info@mytravel.com</a></li>
                </ul>
                <div class="ml-auto d-flex align-items-center">
                    <ul class="list-inline mb-0 mr-2 pr-1">
                        <li class="list-inline-item">
                            <a class="btn btn-xs btn-icon btn-pill btn-soft-dark btn-bg-transparent transition-3d-hover" href="https://www.facebook.com/" target="_blank">
                                <span class="fab fa-facebook-f btn-icon__inner"></span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-xs btn-icon btn-pill btn-soft-dark btn-bg-transparent transition-3d-hover" href="https://twitter.com/" target="_blank">
                                <span class="fab fa-twitter btn-icon__inner"></span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-xs btn-icon btn-pill btn-soft-dark btn-bg-transparent transition-3d-hover" href="https://www.instagram.com/" target="_blank">
                                <span class="fab fa-instagram btn-icon__inner"></span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-xs btn-icon btn-pill btn-soft-dark btn-bg-transparent transition-3d-hover" href="https://www.linkedin.com/" target="_blank">
                                <span class="fab fa-linkedin-in btn-icon__inner"></span>
                            </a>
                        </li>
                    </ul>
                    <div class="position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider--dark">
                        <a id="signUpDropdownInvoker" href="javascript:;" class="d-flex align-items-center text-dark" aria-controls="signUpDropdown" aria-haspopup="true" aria-expanded="true" data-unfold-event="click" data-unfold-target="#signUpDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                            <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                            <span class="d-inline-block font-size-14 mr-1">Sign in or Register</span>
                        </a>
                        <div id="signUpDropdown" class="dropdown-menu dropdown-unfold dropdown-menu-right py-0 mt-0" aria-labelledby="signUpDropdownInvoker" style="min-width: 500px;">
                            <div class="card rounded-xs">
                                <form class="js-validate" novalidate="novalidate" method="post">
                                    <!-- Login -->
                                    <div id="login" style="opacity: 1;" data-target-group="idForm" class="animated fadeIn">
                                        <!-- Header -->
                                        <div class="card-header text-center">
                                            <h3 class="h5 mb-0 font-weight-semi-bold">Login</h3>
                                        </div>
                                        <!-- End Header -->
                                        <div class="card-body pt-6 pb-4">
                                            <!-- Form Group -->
                                            <div class="form-group pb-1">
                                                <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                    <label class="sr-only" for="signinSrEmail">Email</label>
                                                    <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                        <input type="email" class="form-control" name="email" id="signinSrEmail" placeholder="Email Or Username" aria-label="Email Or Username" aria-describedby="signinEmail" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="signinEmail">
                                                                <span class="far fa-envelope font-size-20"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Form Group -->
                                            <!-- Form Group -->
                                            <div class="form-group pb-1">
                                                <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                    <label class="sr-only" for="signinSrPassword">Password</label>
                                                    <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                        <input type="password" class="form-control" name="password" id="signinSrPassword" placeholder="Password" aria-label="Password" aria-describedby="signinPassword" required="" data-msg="Your password is invalid. Please try again." data-error-class="u-has-error" data-success-class="u-has-success">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="signinPassword">
                                                                <span class="flaticon-password font-size-20"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Form Group -->
                                            <div class="mb-3 pb-1">
                                                <button type="submit" class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Login</button>
                                            </div>
                                            <div class="d-flex justify-content-between mb-1">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox" id="customCheckboxInline1" name="customCheckboxInline1" class="custom-control-input">
                                                    <label class="custom-control-label" for="customCheckboxInline1">Remember me</label>
                                                </div>
                                                <a class="js-animation-link text-primary font-size-14" href="javascript:;" data-target="#forgotPassword" data-link-group="idForm" data-animation-in="fadeIn"><u>Forgot Password?</u></a>
                                            </div>
                                        </div>
                                        <div class="card-footer p-0">
                                            <div class="card-footer__top border-bottom border-color-8 py-3">
                                                <div class="text-center mt-2 mb-4 pb-1">
                                                    <span class="d-block text-gray-1 fontsize-14">or continue with</span>
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <a class="btn btn-block btn-sm btn-facebook transition-3d-hover" href="#">
                                                        <span class="fab fa-facebook-f mr-2"></span>
                                                        Facebook
                                                    </a>
                                                    <a class="btn btn-block btn-sm btn-twitter transition-3d-hover ml-5 mt-0" href="#">
                                                        <span class="fab fa-twitter mr-2"></span>
                                                        Twitter
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="card-footer__bottom p-4 text-center font-size-14">
                                                <span class="text-gray-1">Do not have an account?</span>
                                                <a class="js-animation-link font-weight-bold" href="javascript:;" data-target="#signup" data-link-group="idForm" data-animation-in="fadeIn">Sign Up</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Login -->

                                    <!-- Signup -->
                                    <div id="signup" style="opacity: 0; display: none;" data-target-group="idForm">
                                        <!-- Header -->
                                        <div class="card-header text-center">
                                            <h3 class="h5 mb-0 font-weight-semi-bold">Register</h3>
                                        </div>
                                        <!-- End Header -->
                                        <div class="card-body pt-5 pb-4">
                                            <ul class="nav nav-default nav-pills nav-white nav-justified nav-rounded-pill font-weight-medium px-6 pb-5" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-one-code-sample-tab" data-toggle="pill" href="#pills-one-code-sample" role="tab" aria-controls="pills-one-code-sample" aria-selected="true">Normal User</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-two-code-sample-tab" data-toggle="pill" href="#pills-two-code-sample" role="tab" aria-controls="pills-two-code-sample" aria-selected="false">Partner User</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="pills-one-code-sample" role="tabpanel" aria-labelledby="pills-one-code-sample-tab">
                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="uname">User Name</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="text" class="form-control" name="uname" id="uname" placeholder="User Name" aria-label="User Name" aria-describedby="username" required="" data-msg="Please enter a valid user name." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="username">
                                                                        <span class="flaticon-user font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="name">Full Name</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" aria-label="Full Name" aria-describedby="normalname" required="" data-msg="Please enter a valid name." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="normalname">
                                                                        <span class="flaticon-browser-1 font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="signupSrEmail">Email</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="email" class="form-control" name="email" id="signupSrEmail" placeholder="Email" aria-label="Email" aria-describedby="signupEmail" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="signupEmail">
                                                                        <span class="far fa-envelope font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="signupSrPassword">Password</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="password" class="form-control" name="password" id="signupSrPassword" placeholder="Password" aria-label="Password" aria-describedby="signupPassword" required="" data-msg="Your password is invalid. Please try again." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="signupPassword">
                                                                        <span class="flaticon-password font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->
                                                    <div class="mb-3 pb-1">
                                                        <button type="submit" class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Register</button>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="customCheckboxInline2" name="customCheckboxInline2" class="custom-control-input">
                                                            <label class="custom-control-label" for="customCheckboxInline2">I have read and accept the <a href="#">Terms and Privacy Policy</a></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-two-code-sample" role="tabpanel" aria-labelledby="pills-two-code-sample-tab">
                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="puname">User Name</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="text" class="form-control" name="puname" id="puname" placeholder="User Name" aria-label="User Name" aria-describedby="partnerusername" required="" data-msg="Please enter a valid user name." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="partnerusername">
                                                                        <span class="flaticon-user font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="pname">Full Name</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="text" class="form-control" name="pname" id="pname" placeholder="Full Name" aria-label="Full Name" aria-describedby="partnername" required="" data-msg="Please enter a valid name." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="partnername">
                                                                        <span class="flaticon-browser-1 font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="signupPartnerSrEmail">Email</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="email" class="form-control" name="pemail" id="signupPartnerSrEmail" placeholder="Email" aria-label="Email" aria-describedby="signupPartnerEmail" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="signupPartnerEmail">
                                                                        <span class="far fa-envelope font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="signupPartnerSrPassword">Password</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="password" class="form-control" name="Partnerpassword" id="signupPartnerSrPassword" placeholder="Password" aria-label="PartnerPassword" aria-describedby="signupPartnerPassword" required="" data-msg="Your password is invalid. Please try again." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="signupPartnerPassword">
                                                                        <span class="flaticon-password font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="signupPartnerSrConfirmPassword">Confirm Password</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="password" class="form-control" name="confirmpartnerpassword" id="signupPartnerSrConfirmPassword" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="signupPartnerConfirmPassword" required="" data-msg="Your password is invalid. Please try again." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="signupPartnerConfirmPassword">
                                                                        <span class="fas fa-key font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <div class="mb-3 pb-1">
                                                        <button type="submit" class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Register</button>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="customCheckboxInline3" name="customCheckboxInline3" class="custom-control-input">
                                                            <label class="custom-control-label" for="customCheckboxInline3">I have read and accept the <a href="#">Terms and Privacy Policy</a></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer p-0">
                                            <div class="card-footer__top border-bottom border-color-8 py-3">
                                                <div class="text-center mt-2 mb-4 pb-1">
                                                    <span class="d-block text-gray-1 fontsize-14">or continue with</span>
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <a class="btn btn-block btn-sm btn-facebook transition-3d-hover" href="#">
                                                        <span class="fab fa-facebook-f mr-2"></span>
                                                        Facebook
                                                    </a>
                                                    <a class="btn btn-block btn-sm btn-twitter transition-3d-hover ml-5 mt-0" href="#">
                                                        <span class="fab fa-twitter mr-2"></span>
                                                        Twitter
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="card-footer__bottom p-4 text-center font-size-14">
                                                <span class="text-gray-1">Already have an account?</span>
                                                <a class="js-animation-link font-weight-bold" href="javascript:;" data-target="#login" data-link-group="idForm" data-animation-in="fadeIn">Log In</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Signup -->

                                    <!-- Forgot Passwrd -->
                                    <div id="forgotPassword" style="opacity: 0; display: none;" data-target-group="idForm">
                                        <!-- Header -->
                                        <div class="card-header bg-light text-center py-3 px-5">
                                            <h3 class="h6 mb-0 font-weight-semi-bold">Recover password</h3>
                                        </div>
                                        <!-- End Header -->
                                        <div class="card-body px-10 py-5">
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                    <label class="sr-only" for="recoverSrEmail">Your email</label>
                                                    <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                        <input type="email" class="form-control" name="email" id="recoverSrEmail" placeholder="Your email" aria-label="Your email" aria-describedby="recoverEmail" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="recoverEmail">
                                                                <span class="far fa-envelope font-size-20"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Form Group -->
                                            <div class="mb-2">
                                                <button type="submit" class="btn btn-sm btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Recover Password</button>
                                            </div>
                                            <div class="text-center font-size-14">
                                                <span class="text-gray-1">Remember your password?</span>
                                                <a class="js-animation-link font-weight-bold" href="javascript:;" data-target="#login" data-link-group="idForm" data-animation-in="fadeIn">Log In</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Forgot Passwrd -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative pl-3 language-switcher dropdown-connector-xl u-header__topbar-divider--dark">
                        <a id="languageDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center ml-1" href="javascript:;" role="button" aria-controls="languageDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#languageDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                            <span class="d-inline-block">EUR</span>
                        </a>
                        <div id="languageDropdown" class="dropdown-menu dropdown-unfold dropdown-menu-right mt-0" aria-labelledby="languageDropdownInvoker">
                            <a class="dropdown-item" href="#">USD</a>
                            <a class="dropdown-item active" href="#">EUR</a>
                            <a class="dropdown-item" href="#">TUR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div id="logoAndNav" class="container-fluid py-xl-2 border-bottom-xl">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space">
                <!-- Logo -->
                <a class="navbar-brand u-header__navbar-brand-default u-header__navbar-brand-center u-header__navbar-brand-text-dark-xl" href="../home/index.html" aria-label="MyTour">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="55px" height="53px" style="margin-bottom: 0;">
                        <path fill-rule="evenodd" class="fill-primary" d="M53.175,51.207 C50.755,53.610 46.848,53.594 44.448,51.171 L40.766,47.484 C40.378,47.082 40.378,46.443 40.766,46.041 C41.164,45.628 41.821,45.617 42.233,46.016 L45.915,49.702 C47.503,51.246 50.030,51.246 51.619,49.702 C53.243,48.125 53.283,45.528 51.708,43.902 L50.100,42.291 C49.712,41.889 49.712,41.251 50.100,40.849 C50.498,40.436 51.155,40.425 51.567,40.823 L53.174,42.433 C53.186,42.444 53.198,42.456 53.210,42.468 C55.610,44.891 55.594,48.804 53.175,51.207 ZM47.857,37.404 C47.757,37.404 47.657,37.389 47.561,37.360 C47.561,37.360 47.561,37.360 47.561,37.360 C47.012,37.196 46.700,36.617 46.864,36.068 C48.542,30.412 47.740,24.309 44.659,19.280 C38.665,9.497 25.886,6.432 16.116,12.434 C16.085,12.456 16.054,12.475 16.021,12.493 C15.518,12.767 14.888,12.581 14.614,12.077 C14.340,11.574 14.526,10.943 15.029,10.669 C18.623,8.455 22.761,7.284 26.981,7.287 C29.178,7.289 31.363,7.608 33.469,8.234 C45.556,11.831 52.442,24.559 48.851,36.662 C48.719,37.102 48.315,37.403 47.857,37.404 ZM13.802,8.022 L12.765,6.983 C12.377,6.581 12.377,5.943 12.765,5.540 C13.163,5.128 13.820,5.116 14.232,5.515 L15.269,6.553 C15.657,6.956 15.657,7.594 15.269,7.996 C14.871,8.409 14.214,8.420 13.802,8.022 ZM9.654,3.868 L9.084,3.296 C7.495,1.753 4.968,1.752 3.379,3.296 C1.755,4.873 1.715,7.470 3.291,9.096 L10.083,15.900 C10.278,16.094 10.387,16.358 10.387,16.634 C10.387,17.208 9.923,17.672 9.350,17.672 C9.075,17.672 8.812,17.563 8.617,17.368 L1.824,10.566 C1.812,10.554 1.800,10.542 1.788,10.530 C-0.611,8.107 -0.596,4.195 1.824,1.792 C4.243,-0.612 8.150,-0.596 10.550,1.827 L11.121,2.399 C11.129,2.408 11.138,2.416 11.146,2.425 C11.544,2.838 11.533,3.495 11.121,3.894 C10.709,4.292 10.052,4.280 9.654,3.868 ZM7.742,19.850 C8.260,20.095 8.480,20.715 8.234,21.233 C5.232,27.580 5.635,35.016 9.305,41.001 C15.302,50.779 28.080,53.839 37.845,47.834 C37.876,47.813 37.908,47.793 37.940,47.775 C38.444,47.501 39.073,47.687 39.347,48.191 C39.621,48.695 39.435,49.326 38.932,49.599 C35.338,51.813 31.200,52.984 26.981,52.980 C23.606,52.979 20.273,52.228 17.223,50.782 C5.829,45.379 0.966,31.751 6.360,20.342 C6.606,19.824 7.225,19.603 7.742,19.850 ZM40.262,35.347 C40.601,35.280 40.951,35.386 41.196,35.631 L43.270,37.708 C43.675,38.113 43.675,38.770 43.270,39.176 L39.551,42.900 C37.191,45.264 33.364,45.264 31.004,42.900 L24.906,36.795 L21.491,40.215 C21.086,40.620 20.430,40.620 20.025,40.215 L17.951,38.138 C17.719,37.905 17.612,37.576 17.660,37.251 L18.624,30.501 L12.590,24.460 C11.040,22.907 11.040,20.390 12.590,18.837 C14.141,17.285 16.654,17.285 18.205,18.837 L24.077,24.716 L35.851,18.820 C36.250,18.620 36.732,18.699 37.048,19.015 L39.122,21.092 C39.527,21.498 39.527,22.155 39.122,22.561 L30.521,31.173 L35.622,36.277 L40.262,35.347 ZM20.758,38.012 L23.440,35.326 L20.454,32.337 L19.784,37.036 L20.758,38.012 ZM34.541,38.138 L28.318,31.907 C27.914,31.501 27.914,30.844 28.318,30.439 L36.919,21.826 L36.107,21.013 L24.333,26.910 C23.934,27.109 23.452,27.031 23.136,26.714 L16.735,20.306 C16.379,19.949 15.897,19.749 15.394,19.749 C14.347,19.750 13.498,20.600 13.499,21.649 C13.496,22.153 13.695,22.638 14.051,22.995 L20.449,29.401 L25.635,34.593 L32.464,41.432 C34.014,42.984 36.528,42.984 38.078,41.432 L41.064,38.442 L40.115,37.492 L35.474,38.421 C35.135,38.488 34.786,38.382 34.541,38.138 Z"></path>
                    </svg>
                    <span class="u-header__navbar-brand-text">MyTravel</span>
                </a>
                <!-- End Logo -->

                <!-- Responsive Toggle Button -->
                <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--primary order-2 ml-3" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                    <span id="hamburgerTrigger" class="u-hamburger__box">
                        <span class="u-hamburger__inner"></span>
                    </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Navigation -->
                <div id="navBar" class="navbar-collapse u-header__navbar-collapse collapse order-2 order-xl-0 pt-4 p-xl-0 position-relative">
                    <ul class="navbar-nav u-header__navbar-nav">
                        <!-- Home -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="homeMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="homeSubMenu">Home</a>
                            <!-- Home Submenu -->
                            <ul id="homeSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="homeMenu" style="min-width: 230px;">
                                <li class="active"><a class="nav-link u-header__sub-menu-nav-link" href="../home/index.html">Home v1 All Services</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/home-v2.html">Home v2 All Services</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/home-v3.html">Home v3 All Services</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/home-v4.html">Home v4 Hotel</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/home-v5.html">Home v5 Tour</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/home-v6.html">Home v6 Activity</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/home-v7.html">Home v7 Rental</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/home-v8.html">Home v8 Car</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/home-v9.html">Home v9 Yacht</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/home-v10.html">Home v10 Flights</a></li>
                            </ul>
                            <!-- End Home Submenu -->
                        </li>
                        <!-- End Home -->

                        <!-- Hotel -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="hotelMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="hotelSubMenu">Hotel</a>
                            <!-- Hotel Submenu -->
                            <ul id="hotelSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="hotelMenu" style="min-width: 230px;">
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../hotels/hotel-list.html">Sidebar</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../hotels/hotel-list-02.html">List With Map</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../hotels/hotel-single-v1.html">Hotel Single v1</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../hotels/hotel-single-v2.html">Hotel Single v2</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../hotels/hotel-single-v3.html">Hotel Single v3</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../hotels/hotel-booking.html">Hotel Booking</a></li>
                            </ul>
                            <!-- End Hotel Submenu -->
                        </li>
                        <!-- End Hotel -->

                        <!-- Tour -->
                        <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut" data-max-width="722px" data-position="right">
                            <a id="tourMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">Tour</a>

                            <!-- Tour - Mega Menu -->
                            <div class="hs-mega-menu u-header__sub-menu u-header__sub-menu-rounded u-header__mega-menu-position-right-fix-10" aria-labelledby="tourMegaMenu">
                                <div class="row">
                                    <div class="col-12 col-xl-3dot64">
                                        <span class="u-header__sub-menu-title">List Style</span>
                                        <ul class="u-header__sub-menu-nav-group u-header__sub-menu-bordered mb-3">
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../tour/tour-list.html">Sidebar</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../tour/tour-fullwidth.html">Full Width</a></li>
                                        </ul>
                                        <span class="u-header__sub-menu-title">Tour Booking</span>
                                        <ul class="u-header__sub-menu-nav-group u-header__sub-menu-bordered mb-3">
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../tour/tour-booking.html">Tour Booking</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-xl-3dot64">
                                        <span class="u-header__sub-menu-title">Single</span>
                                        <ul class="u-header__sub-menu-nav-group u-header__sub-menu-bordered mb-3">
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../tour/tour-single-v1.html">Tour Single v1</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../tour/tour-single-v2.html">Tour Single v2</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-xl">
                                        <!-- Banner Image -->
                                        <div class="u-header__banner u-header__banner-no-overlay rounded-xs" style="background-image: url(../../assets/img/240x243/img1.jpg);">
                                            <div class="u-header__banner-content u-header__banner-content-not-centered">
                                                <span class="u-header__banner-title">Special Offers</span>
                                                <p class="u-header__banner-text">Find Your Perfect Hotels Get the best prices on 20,000+ properties the best prices on</p>
                                                <a class="btn btn-white text-blue btn-sm rounded-xs transition-3d-hover" href="#">See Deals</a>
                                            </div>
                                        </div>
                                        <!-- End Banner Image -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Tour - Mega Menu -->
                        </li>
                        <!-- End Tour -->

                        <!-- Activity -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="ActivityMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="ActivitySubMenu">Activity</a>
                            <!-- Activity Submenu -->
                            <ul id="ActivitySubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="ActivityMenu" style="min-width: 230px;">
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../activities/activities-list.html">Sidebar</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../activities/activities-fullwidth.html">Full Width</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../activities/activities-single-v1.html">Activity Single v1</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../activities/activities-single-v2.html">Activity Single v2</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../activities/activities-booking.html">Activity Booking</a></li>
                            </ul>
                            <!-- End Activity Submenu -->
                        </li>
                        <!-- End Activity -->

                        <!-- Rental -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="rentalMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="rentalSubMenu">Rental</a>
                            <!-- Rental Submenu -->
                            <ul id="rentalSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="rentalMenu" style="min-width: 230px;">
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../rental/rental-list.html">Sidebar</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../rental/rental-list-02.html">List With Map</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../rental/rental-single-v1.html">Rental Single v1</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../rental/rental-single-v2.html">Rental Single v2</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../rental/rental-booking.html">Rental Booking</a></li>
                            </ul>
                            <!-- End Rental Submenu -->
                        </li>
                        <!-- End Rental -->

                        <!-- Car -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="carMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="carSubMenu">Car</a>
                            <!-- Car Submenu -->
                            <ul id="carSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="carMenu" style="min-width: 230px;">
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../cars/cars-list.html">Sidebar</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../cars/cars-fullwidth.html">Full Width</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../cars/cars-single-v1.html">Car Single v1</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../cars/cars-single-v2.html">Car Single v2</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../cars/cars-booking.html">Car Booking</a></li>
                            </ul>
                            <!-- End Car Submenu -->
                        </li>
                        <!-- End Car -->

                        <!-- Yacht -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="yachtMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="yachtSubMenu">Yacht</a>
                            <!-- Yacht Submenu -->
                            <ul id="yachtSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="yachtMenu" style="min-width: 230px;">
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../yacht/yacht-list.html">Sidebar</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../yacht/yacht-fullwidth.html">Full Width</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../yacht/yacht-single-v1.html">Yacht Single v1</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../yacht/yacht-single-v2.html">Yacht Single v2</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../yacht/yacht-booking.html">Yacht Booking</a></li>
                            </ul>
                            <!-- End Yacht Submenu -->
                        </li>
                        <!-- End Yacht -->

                        <!-- Flights -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="flightsMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="flightsSubMenu">Flights</a>
                            <!-- Flights Submenu -->
                            <ul id="flightsSubMenu" class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer" aria-labelledby="flightsMenu" style="min-width: 230px;">
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../flights/flights-list.html">Sidebar</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="../flights/flights-booking.html">Flights Booking</a></li>
                            </ul>
                            <!-- End Flights Submenu -->
                        </li>
                        <!-- End Flights -->

                        <!-- Pages -->
                        <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut" data-max-width="722px" data-position="right">
                            <a id="pagesMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">Pages</a>
                            <!-- Pages - Mega Menu -->
                            <div class="hs-mega-menu u-header__sub-menu u-header__sub-menu-rounded" aria-labelledby="pagesMegaMenu">
                                <div class="row">
                                    <div class="col-12 col-xl-4">
                                        <ul class="u-header__sub-menu-nav-group u-header__sub-menu-bordered mb-3">
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../others/destination.html">Destination</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../others/about.html">About us</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../others/contact.html">Contact</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../others/terms-conditions.html">Terms of Use</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../others/faq.html">FAQs</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-xl-4">
                                        <ul class="u-header__sub-menu-nav-group u-header__sub-menu-bordered mb-3">
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../blog/blog-list.html">Blog</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../blog/blog-single.html">Blog Single</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../others/become-expert.html">Become Expert</a></li>
                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="../others/404.html">404</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-xl-4">
                                        <a href="../../documentation/index.html" class="btn btn-soft-primary mb-3 w-100"><span class="fas fa-laptop-code mr-2"></span>Documentation</a>
                                        <a href="../../starter/index.html" class="btn btn-soft-secondary w-100"><span class="fas fa-th mr-2"></span>Starter</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Pages - Mega Menu -->
                        </li>
                        <!-- End Pages -->

                    </ul>
                </div>
                <!-- End Navigation -->

                <!-- Shopping Cart -->
                <div class="pl-2 pl-md-4 ml-auto shopping-cart">
                    <a id="shoppingCartDropdownInvoker" class="btn-text-secondary py-4 position-relative" href="javascript:;" role="button" aria-controls="shoppingCartDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#shoppingCartDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                        <span class="flaticon-shopping-basket font-size-25 text-primary-max-lg"></span>
                    </a>

                    <div id="shoppingCartDropdown" class="dropdown-menu dropdown-unfold dropdown-menu-right dropdown-menu-right-fix-wd-10 p-0 mt-0 w-max-sm-100 u-unfold--css-animation font-size-16" aria-labelledby="shoppingCartDropdownInvoker" style="width: 500px; animation-duration: 300ms; right: 0px;">
                        <div class="card">
                            <!-- Header -->
                            <div class="card-header border-color-8 py-3 px-5">
                                <span class="font-weight-semi-bold">Your Cart</span>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body p-0">
                                <div class="px-2 px-md-3 py-2 py-md-1 border-bottom border-color-8">
                                    <div class="media p-2 p-md-3">
                                        <div class="u-avatar u-lg-avatar-md mr-2 mr-md-3">
                                            <img class="img-fluid rounded-pill" src="../../assets/img/80x80/img1.jpg" alt="Image Description">
                                        </div>
                                        <div class="media-body position-relative pl-md-1">
                                            <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                                                <span class="d-block text-dark font-weight-bold">Hyatt Centric Times Square</span>
                                                <button type="button" class="close close-rounded position-md-absolute right-0 ml-2" aria-label="Close">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <span class="d-block text-gray-1">Price £590.00 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-2 px-md-3 py-2 py-md-1 border-bottom border-color-8">
                                    <div class="media p-2 p-md-3">
                                        <div class="u-avatar u-lg-avatar-md mr-2 mr-md-3">
                                            <img class="img-fluid rounded-pill" src="../../assets/img/80x80/img2.jpg" alt="Image Description">
                                        </div>
                                        <div class="media-body position-relative pl-md-1">
                                            <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                                                <span class="d-block text-dark font-weight-bold">Hyatt Centric Times Square</span>
                                                <button type="button" class="close close-rounded position-md-absolute right-0 ml-2" aria-label="Close">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <span class="d-block text-gray-1">Price £590.00 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer border-0 p-3 px-md-5 py-md-4">
                                <div class="mb-4 pb-md-1">
                                    <span class="d-block font-weight-semi-bold">Subtotal: £1180.00</span>
                                </div>
                                <div class="d-md-flex button-inline-group-md mb-1">
                                    <a class="btn btn-block btn-md btn-gray-1 rounded-xs font-weight-bold transition-3d-hover" href="#">
                                        View cart
                                    </a>
                                    <a class="btn btn-block btn-md btn-blue-1 rounded-xs font-weight-bold transition-3d-hover mt-md-0 ml-md-5" href="#">
                                        Check Out
                                    </a>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>
                    </div>
                </div>
                <!-- End Shopping Cart -->

                <!-- Button -->
                <div class="pl-4 ml-1 u-header__last-item-btn u-header__last-item-btn-xl">
                    <a class="btn btn-wide rounded-xs btn-primary transition-3d-hover" href="../others/become-expert.html">Become Local Expert</a>
                </div>
                <!-- End Button -->
            </nav>
            <!-- End Nav -->
        </div>
    </div>
</header>