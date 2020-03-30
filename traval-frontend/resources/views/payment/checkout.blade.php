@extends('partials.master')

@section('title')
Checkout @stop

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/css/intlTelInput.css" />
<style>
    /* Override dispaly: inline-block; */
    .iti {
        position: relative;
        display: block;
    }

    .hide {
        display: none;
    }
</style>

@endsection

@section('content')
<main id="content" class="bg-gray space-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="mb-5 shadow-soft bg-white rounded-sm">
                    <div class="py-3 px-4 px-xl-12 border-bottom">
                        <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                <div class="flex-content-center mb-3 width-40 height-40 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                    1
                                </div>
                                <div class="text-primary">💁 Your info</div>
                            </li>
                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                    2
                                </div>
                                <div class="text-gray-1">💳 Payment info</div>
                            </li>
                            <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                    3
                                </div>
                                <div class="text-gray-1">🎟️ Booking is confirmed!</div>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-4">
                            My information
                        </h5>
                        <div class="row">
                            <div class="col-sm-12 mb-4">
                                <label class="form-label">
                                    Full Name
                                </label>

                                <input type="text" class="form-control" name="name" placeholder="Jack Phan" required />
                            </div>

                            <div class="col-sm-6 mb-4">
                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email" class="form-control" name="email" placeholder="Your email address" />
                            </div>

                            <div class="col-sm-6 mb-4">
                                <label class="form-label">
                                    Mobile Phone
                                </label>

                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="+65 8228 6030" />
                            </div>

                            <div class="w-100"></div>

                            <!-- <div class="col-sm-6 mb-4">
                                    <label class="form-label">
                                        Country
                                    </label>
                                    <select class="form-control js-select selectpicker dropdown-select" required="" data-msg="Please select country." data-error-class="u-has-error" data-success-class="u-has-success" data-live-search="true" data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                        <option value="">Select country</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div> -->

                            <!-- <div class="col-sm-12 align-self-end">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3">NEXT PAGE</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="mb-5 shadow-soft bg-white rounded-sm">
                    <div class="py-3 px-4 px-xl-12 border-bottom">
                        <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                    1
                                </div>
                                <div class="text-gray-1">💁 Your info</div>
                            </li>
                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                <div class="flex-content-center mb-3 width-40 height-40 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                    2
                                </div>
                                <div class="text-primary">💳 Payment info</div>
                            </li>
                            <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                    3
                                </div>
                                <div class="text-gray-1">🎟️ Booking is confirmed!</div>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-4">
                            Payment type
                        </h5>

                        <ul class="nav nav-classic nav-choose border-0 nav-justified border mx-n3" role="tablist">
                            <li class="nav-item mx-3 mb-4 mb-md-0">
                                <a class="rounded py-5 border-width-2 border nav-link font-weight-medium active" id="pills-one-example2-tab" data-toggle="pill" href="#pills-one-example2" role="tab" aria-controls="pills-one-example2" aria-selected="true">
                                    <div class="height-25 width-25 flex-content-center bg-primary rounded-circle position-absolute left-0 top-0 ml-2 mt-2">
                                        <i class="flaticon-tick text-white font-size-15"></i>
                                    </div>
                                    <div class="d-md-flex justify-content-md-center align-items-md-center flex-wrap">
                                        <img class="img-fluid mb-3" style="height:35px;" src="https://cdn.worldvectorlogo.com/logos/stripe-3.svg" alt="Image-Description">
                                        <div class="w-100 text-dark">Payment with Debit/Credit Card</div>
                                    </div>
                                </a>
                            </li>
                            <!-- <li class="nav-item mx-3">
                                <a class="rounded py-5 border-width-2 border nav-link font-weight-medium" id="pills-two-example2-tab" data-toggle="pill" href="#pills-two-example2" role="tab" aria-controls="pills-two-example2" aria-selected="false">
                                    <div class="height-25 width-25 flex-content-center bg-primary rounded-circle position-absolute left-0 top-0 ml-2 mt-2">
                                        <i class="flaticon-tick text-white font-size-15"></i>
                                    </div>
                                    <div class="d-md-flex justify-content-md-center align-items-md-center flex-wrap">
                                        <img class="img-fluid mb-3" src="assets/img/199x35/img2.jpg" alt="Image-Description">
                                        <div class="w-100 text-dark">Payment with PayPal</div>
                                    </div>
                                </a>
                            </li> -->
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade pt-8 show active" id="pills-one-example2" role="tabpanel" aria-labelledby="pills-one-example2-tab">
                                <form action="" method="post" id="checkout">
                                    <div class="row">
                                        <div class="col-sm-12 mb-4">
                                            <label class="form-label">
                                                Card Holder Name
                                            </label>

                                            <input type="text" class="form-control" name="card_name" placeholder="" required>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label">
                                                Card Details
                                            </label>
                                            <span id="card-element" class="form-control"></span>
                                            <div id="card-errors" role="alert"></div>
                                        </div>

                                        <div class="w-100"></div>

                                        <div class="col">
                                            <button type="submit" class="btn btn-primary w-100 rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3">
                                                Pay Now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade pt-8" id="pills-two-example2" role="tabpanel" aria-labelledby="pills-two-example2-tab">
                                <form class="js-validate">
                                    <div id="login" data-target-group="idForm">
                                        <div class="form-group">
                                            <label class="sr-only" for="signinEmail">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signinEmailLabel">
                                                        <span class="fas fa-user"></span>
                                                    </span>
                                                </div>
                                                <input type="email" class="form-control" name="email" id="signinEmail" placeholder="Email" aria-label="Email" aria-describedby="signinEmailLabel" required data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label class="sr-only" for="signinPassword">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signinPasswordLabel">
                                                        <span class="fas fa-lock"></span>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" name="password" id="signinPassword" placeholder="Password" aria-label="Password" aria-describedby="signinPasswordLabel" required data-msg="Your password is invalid. Please try again." data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <button type="submit" class="btn btn-block btn-primary transition-3d-hover">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-xl-3">
                <div id="checkout_items"></div>
                <div id="checkout_payment"></div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('scripts')
<script id="tpl_checkout_items" type="text/x-jsrender">
    <div class="shadow-soft bg-white rounded-sm mb-2">
    <div class="pt-3 pb-1 px-4 border-bottom">
        <a href="activity/@{{:item_id}}" class="text-dark font-weight-bold mb-2 d-block">@{{:title}}</a>
    </div>
    <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
        <div class="card-body px-4 pt-1">
            <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                <li class="d-flex justify-content-between py-2">
                    <span class="font-weight-medium">Quantity</span>
                    <span class="text-secondary">@{{:quantity}}</span>
                </li>
                <li class="d-flex justify-content-between py-2">
                    <span class="font-weight-medium">Price</span>
                    <span class="text-secondary">S$@{{:price}}</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
        <div class="card-body px-4 pt-1">
            <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                <li class="d-flex justify-content-between py-2">
                    <span class="font-weight-medium">Subtotal</span>
                    <span class="font-weight-medium">S$@{{:subtotal}}</span>
                </li>
            </ul>
        </div>
    </div>
</div>
</script>

<script id="tpl_checkout_payment" type="text/x-jsrender">
    <div class="shadow-soft bg-white rounded-sm mb-2">
    <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
        <div class="card-body px-4 pt-1">
            <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                <li class="d-flex justify-content-between py-2">
                    <span class="font-weight-bold">Payment Amount</span>
                    <span class="font-weight-bold">S$@{{:total_price}}</span>
                </li>
            </ul>
        </div>
    </div>
</div>
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/intlTelInput.min.js" integrity="sha256-679hprK8vxlf4fnVBENMDhjXffz6MSULSiah9G9FRZg=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).on('ready', function() {
        if (!localStorage.getItem('token')) {
            window.location.replace('signin');
        } else {

            var data = {
                user_id: localStorage.getItem('user_id')
            };

            var input = document.querySelector("#phone")

            // initialise plugin
            var iti = window.intlTelInput(input, {
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/utils.js",
                initialCountry: "sg",
                geoIpLookup: function(callback) {
                    $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "";
                        callback(countryCode);
                    });
                },
            });

            // other stuff

            // Pre-fill in some fields.
            $.ajax({
                method: 'GET',
                url: apiUrl + '/api/v1/users/id/' + data.user_id,
                success: function(response) {
                    $('input[name=name]').val(response.name);
                    $('input[name=email]').val(response.email);
                    iti.setNumber(response.phone);

                },
                error: function(error) {
                    console.log(error.responseJSON);
                }
            });

            var cartItems = [];

            // Get cart items.
            $.ajax({
                method: 'GET',
                url: apiUrl + '/api/v1/orders/cart/' + data.user_id,
                success: function(response) {

                    var tpl = $.templates('#tpl_checkout_items');
                    $.each(response.items, function(i, item) {
                        item.subtotal = item.price * item.quantity;
                        $('#checkout_items').append(tpl.render(item));
                    });

                    var tpl = $.templates('#tpl_checkout_payment');
                    $('#checkout_payment').append(tpl.render(response));

                    data.total_price = response.total_price;
                    console.log(response);
                    updatePaymentIntent(data);

                    cartItems = response;
                },
                error: function(error) {
                    console.log(error.responseJSON);
                }
            });

            var stripe = Stripe('pk_test_FlBqXwgBTcD0Cnrg5WtCuqwX00wJVaEIdt');

            var elements = stripe.elements();

            var cardStyle = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            var card = elements.create('card', {
                style: cardStyle,
            });
            card.mount('#card-element');

            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            $('#checkout').on('submit', function(e) {
                e.preventDefault();
                var clientSecret = localStorage.getItem('stripe_clientSecret');

                data.items = cartItems.items;
                data.payment_intent_id = localStorage.getItem("stripe_paymentIntentId");

                console.log("Sending data...", data);
                $.ajax({
                    method: 'POST',
                    url: apiUrl + '/api/v1/orders',
                    data: JSON.stringify(data),
                    contentType: "application/json; charset=utf-8",
                    success: function(response) {
                        console.log(response);

                        data.order_id = response.id;
                        console.log("Checkout.", data);

                        updatePaymentIntent(data); // Attach order ID to this payment intent.

                        stripe.confirmCardPayment(clientSecret, {
                            payment_method: {
                                card: card,
                                billing_details: {
                                    name: $('input[name=card_name]').val()
                                }
                            }
                        }).then(function(result) {
                            if (result.error) {
                                // Show error to your customer (e.g., insufficient funds)
                                console.log(result.error.message);
                            } else {
                                // The payment has been processed!
                                if (result.paymentIntent.status === 'succeeded') {
                                    console.log(result.paymentIntent);
                                    // Show a success message to your customer
                                    // There's a risk of the customer closing the window before callback
                                    // execution. Set up a webhook or plugin to listen for the
                                    // payment_intent.succeeded event that handles any business critical
                                    // post-payment actions.
                                    $.ajax({
                                        method: 'POST',
                                        url: apiUrl + '/api/v1/orders/cart/clear',
                                        data: JSON.stringify(data),
                                        contentType: "application/json; charset=utf-8",
                                        success: function(response) {
                                            localStorage.removeItem('stripe_paymentIntentId');
                                            localStorage.removeItem('stripe_clientSecret');
                                            window.location.href = "payment/result";
                                        }
                                    });
                                }
                            }
                        });
                    },
                    error: function(error) {
                        console.log(error.responseJSON);
                    }
                });
            });
        }
    });

    function updatePaymentIntent(data) {
        // If no token and on page first visit
        if (!localStorage.getItem('stripe_clientSecret')) {
            $.ajax({
                method: 'POST',
                url: apiUrl + '/api/v1/payments/stripe',
                data: JSON.stringify(data),
                contentType: "application/json; charset=utf-8",
                success: function(response) {
                    localStorage.setItem('stripe_paymentIntentId', response.id);
                    localStorage.setItem('stripe_clientSecret', response.client_secret);

                    console.log("PaymentIntent created.", response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        } else {
            console.log("PaymentIntent has already been created. Attempting to update it...", localStorage);
            data.payment_intent_id = localStorage.getItem('stripe_paymentIntentId');
            $.ajax({
                method: 'POST',
                url: apiUrl + '/api/v1/payments/update',
                data: JSON.stringify(data),
                contentType: "application/json; charset=utf-8",
                success: function(response) {
                    console.log("PaymentIntent updated.", response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }
</script>
@endsection