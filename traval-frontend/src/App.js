import React from 'react';
import logo from './logo.svg';
import './App.css';

function App() {
  return (
    <header id="header"
    class="u-header u-header--abs-top-xl u-header--white-nav-links-xl u-header--bg-transparent-xl u-header--show-hide-xl"
    data-header-fix-moment="500" data-header-fix-effect="slide">
    <div class="u-header__section u-header__shadow-on-show-hide py-4 py-xl-0">
        <div id="logoAndNav" class="container-fluid py-xl-3">
            <nav class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space">
                <a class="navbar-brand u-header__navbar-brand-default u-header__navbar-brand-center u-header__navbar-brand-text-white"
                    href="../home/index.html" aria-label="Traval">
                    <span class="u-header__navbar-brand-text">Traval</span>
                </a>
                
                <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-collapsed"
                    href="../home/index.html" aria-label="Traval">
 
                    <span class="u-header__navbar-brand-text">Traval</span>
                </a>
                
                <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-on-scroll"
                    href="../home/index.html" aria-label="Traval">

                    <span class="u-header__navbar-brand-text">Traval</span>
                </a>
                
                <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--primary order-2 ml-3"
                    aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar"
                    data-toggle="collapse" data-target="#navBar">
                    <span id="hamburgerTrigger" class="u-hamburger__box">
                        <span class="u-hamburger__inner"></span>
                    </span>
                </button>
                
                <div id="navBar"
                    class="navbar-collapse u-header__navbar-collapse collapse order-2 order-xl-0 pt-4 p-xl-0 position-relative">
                    <ul class="navbar-nav u-header__navbar-nav">
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover"
                            data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="homeMenu"
                                class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border"
                                href="javascript:;" aria-haspopup="true" aria-expanded="false"
                                aria-labelledby="homeSubMenu">Home</a>
                            <ul id="homeSubMenu"
                                class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer"
                                aria-labelledby="homeMenu" style="min-width: 230px;">
                                <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Home v1 All
                                        Services</a></li>
                            </ul>
                            
                        </li>
                        
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover"
                            data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="ActivityMenu"
                                class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border"
                                href="javascript:;" aria-haspopup="true" aria-expanded="false"
                                aria-labelledby="ActivitySubMenu">Activity</a>
                            <ul id="ActivitySubMenu"
                                class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer"
                                aria-labelledby="ActivityMenu" style="min-width: 230px;">
                                <li><a class="nav-link u-header__sub-menu-nav-link"
                                        href="../activities/activities-list.html">Sidebar</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link"
                                        href="../activities/activities-fullwidth.html">Full Width</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link"
                                        href="../activities/activities-single-v1.html">Activity Single v1</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link"
                                        href="../activities/activities-single-v2.html">Activity Single v2</a></li>
                                <li><a class="nav-link u-header__sub-menu-nav-link"
                                        href="../activities/activities-booking.html">Activity Booking</a></li>
                            </ul>
                            
                        </li>
                        
                    </ul>
                </div>
                
                <div class="pl-md-4 ml-auto shopping-cart">
                    <a id="shoppingCartDropdownInvoker" class="btn-text-secondary position-relative py-4"
                        href="javascript:;" role="button" aria-controls="shoppingCartDropdown" aria-haspopup="true"
                        aria-expanded="false" data-unfold-event="hover" data-unfold-target="#shoppingCartDropdown"
                        data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300"
                        data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp"
                        data-unfold-animation-out="fadeOut">
                        <span class="flaticon-shopping-basket font-size-25 text-primary-max-lg"></span>
                    </a>
                    <div id="shoppingCartDropdown"
                        class="dropdown-menu dropdown-unfold dropdown-menu-right dropdown-menu-right-fix-wd-10 text-center p-7"
                        aria-labelledby="shoppingCartDropdownInvoker" style="min-width: 250px;">
                        <span class="btn btn-icon btn-soft-primary rounded-circle mb-3">
                            <span class="flaticon-shopping-basket btn-icon__inner"></span>
                        </span>
                        <span class="d-block">Your cart is empty</span>
                    </div>
                </div>
                <div class="pl-4 ml-1 u-header__last-item-btn u-header__last-item-btn-xl">
                    <a class="btn btn-wide rounded-sm btn-outline-white border-width-2 transition-3d-hover"
                        href="#">
                        <i class="flaticon-user font-size-16 mr-2"></i>
                        <span class="d-inline-block">Sign in or Register</span>
                    </a>
                </div>
                
            </nav>
            
        </div>
    </div>
</header>

  );
}

export default App;
