<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ISOL</title>


    <link rel="stylesheet" href="{{asset('/')}}public/front/assets/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}public/front/assets/vendor/fontawesome/css/all.min.css">
    <link href="{{asset('/')}}public/front/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('/')}}public/front/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/')}}public/front/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}public/front/assets/css/middle_header.css">


    <!--    slick slider-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}public/front/assets/vendor/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}public/front/assets/vendor/slick/slick-theme.css">

    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet"> <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet"> <!-- Google fonts -->
</head>
<body>

<!-- Header -->
@include('front.include.top_header')

<main>
    <!-- ======= Page Top Section ======= -->
    <section class="page_top_section">
        <div class="container">
            <div class="page-header my-auto">
                <h3>Interworld Shipping Overseas Limited</h3>
                <h2>CV Login Form</h2>
            </div>
        </div>
    </section>

    <!-- ======= About Section ======= -->

    <section class="">

        <div class="container pt-4">
            <div class="row ">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body custom_form_color">
                            <div class="custom_form_div">
                                <form action="{{ route('jobSeekerPartOnePost') }}" method="post">
                                    @csrf
                                    <div class="form_header">
                                        <h3>All Details </h3>
                                        <p>We'll need these details in order to be able to contact you when a job is
                                            made available. </p>
                                            @include('flash_message')
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">1. Tell us a little more about
                                            yourself.</label>
                                        <textarea class="form-control" name="your_self" id="" rows="4"
                                                  placeholder="About yourself"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">2. Do you have any Seaman Book or Bangladesh
                                            CDC.</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="seaman_book_or_bd_cdc" id="yes" checked="checked"/>
                                                    <label for="yes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="seaman_book_or_bd_cdc" id="no"/>
                                                    <label for="no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="" class="form-text">(If the answer is yes, then describe the
                                            details.)
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Describe Details</label>
                                        <textarea class="form-control" name="seaman_book_or_bd_cdc_detail" id="" rows="4"
                                                  placeholder="About yourself"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">3. Do you currently hold a passport that is
                                            valid for at least one year from the date of
                                            application?
                                        </label>
                                        <select class="form-select" name="password_valid_till_one_year" aria-label="Default select example">
                                            <option selected>Select here ...</option>
                                            <option value="Yes, I have a passport that is valid for more than one year.">Yes, I have a passport that is valid for more than one
                                                year.
                                            </option>
                                            <option value="No, I do not have a passport.">No, I do not have a passport.</option>
                                            <option value="I currently have a passport; however, it will expire within one year.">I currently have a passport; however, it will expire within
                                                one year.
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">4. Are you currently fully vaccinated for
                                            COVID? (Full vaccination is typically a series of two shots plus a booster,
                                            depending on brand.)</label>
                                        <select class="form-select" name="full_vaccinated_for_covid" aria-label="Default select example">
                                            <option value="">Select here ...</option>
                                            <option value="Yes, I am fully vaccinated for COVID.">Yes, I am fully vaccinated for COVID.</option>
                                            <option value="No, I am not fully vaccinated for COVID.">No, I am not fully vaccinated for COVID.</option>
                                            <option value="I am not currently fully vaccinated for COVID; however, I am willing to complete the series">I am not currently fully vaccinated for COVID; however, I
                                                am willing to complete the series
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">5. When would you be interested in having your
                                            application for placement onboard considered?</label>
                                        <select class="form-select" name="placement_onboard_considered" aria-label="Default select example">
                                            <option value="">Select here ...</option>
                                            <option value="My schedule is negotiable. Either a placement that is more immediate or one that is made in two years interests me.">My schedule is negotiable. Either a placement that is more
                                                immediate or one that is made in two years interests me.
                                            </option>
                                            <option value="Currently I am interested only in more immediate placement onboard.">Currently I am interested only in more immediate placement
                                                onboard.
                                            </option>
                                            <option value="I did like to be given priority consideration for subsequent onboard placement whenever a job replacement becomes available.">I'd like to be given priority consideration for subsequent
                                                onboard placement whenever a job replacement becomes available.
                                            </option>
                                            <option value="My timing is flexible. I am interested in either more immediate or later placement.">My timing is flexible. I am interested in either more
                                                immediate or later placement.
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">6. Do you have IELTS score certificate?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="ielts_score" id="yesielts" checked="checked"/>
                                                    <label for="yesielts">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="ielts_score" id="noielts"/>
                                                    <label for="noielts">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="" class="form-text">(If the answer is yes, then describe the
                                            details.)
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Describe Details</label>
                                        <textarea name="ielts_score_des" class="form-control" id="" rows="4"
                                                  placeholder="About yourself"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">7. Do you have at least two years of prior work
                                            experience that is relevant to the position for which you are
                                            applying?</label>
                                        <div id="" class="form-text text-danger mb-3">(Your application won't be taken
                                            into consideration if you are lacking any
                                            relevant professional skills.)
                                        </div>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="work_experience" id="yesexperience"
                                                           checked="checked"/>
                                                    <label for="yesexperience">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="work_experience" id="noexperience"/>
                                                    <label for="noexperience">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="" class="form-text">(If the answer is yes, then describe the
                                            details.)
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Describe Details</label>
                                        <textarea name="work_experience_des" class="form-control" id="" rows="4"
                                                  placeholder="About yourself"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">8. Which country you dreamed to be settled in
                                            near future?</label>
                                        <select class="form-select" name="settled_country" aria-label="Default select example">
                                            <option selected>Select here ...</option>
                                            <option value="USA">USA</option>
                                            <option value="Canada">Canada</option>
                                            <option value="UK">UK.</option>
                                            <option value="Europe">Europe</option>
                                            <option value="Australia">Australia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Japan">Japan</option>
                                            <option value="NON">NON</option>
                                            <option value="I am  proud to be a Bangladeshi-born person.">I', proud to be a Bangladeshi-born person.</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">9. Why are you interested to work on
                                            ship?</label>
                                        <select class="form-select" name="interested_to_work_on_ship" aria-label="Default select example">
                                            <option selected>Select here ...</option>
                                            <option value="Working on a cruise ship is a great way to gain experience and skills that I can use in any career.">Working on a cruise ship is a great way to gain experience
                                                and skills that I can use in any career.
                                            </option>
                                            <option value="I am passionate about travel, and I love the idea of being able to see the world while working.">I am passionate about travel, and I love the idea of being
                                                able to see the world while working.
                                            </option>
                                            <option value="I did like to visit my relatives and friends who live along the coast in the United States, Canada, Europe, the United Kingdom,Australia, New Zealand, or Japan.">I'd like to visit my relatives and friends who live along
                                                the coast in the United States, Canada, Europe, the United Kingdom,
                                                Australia, New Zealand, or Japan.
                                            </option>
                                            <option value="I have chosen not to answer.">I have chosen not to answer.</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">10. Do you have any relative who is working in
                                            ship</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="relative_work_on_ship" id="yesrelative"
                                                           checked="checked"/>
                                                    <label for="yesrelative">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="relative_work_on_ship" id="norelative"/>
                                                    <label for="norelative">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="" class="form-text">(If the answer is yes, then describe the
                                            details.)
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Describe Details</label>
                                        <textarea name="relative_work_on_ship_des" class="form-control" id="" rows="4"
                                                  placeholder="About yourself"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">11. Did you pay any money to Interworld
                                            Shipping Overseas Limited (ISOL) or any other ISOL employee or Crewing Agent
                                            in Bangladesh to get this employment?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="pay_isol_or_other" id="yesisol"
                                                           checked="checked"/>
                                                    <label for="yesisol">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="pay_isol_or_other" id="noisol"/>
                                                    <label for="noisol">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">12. Would you pay someone, a fellow crew
                                            member, or a third-party agent to find a job for you?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="pay_third_party" id="payyes"
                                                           checked="checked"/>
                                                    <label for="payyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="pay_third_party" id="payno"/>
                                                    <label for="payno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">13. Did somebody assist you in filling out this
                                            computerized application for the aforementioned job?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="fill_up_by_assists" id="assist_yes"
                                                           checked="checked"/>
                                                    <label for="assist_yes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="fill_up_by_assists" id="assist_no"/>
                                                    <label for="assist_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">14. Do you have any cousin/friends/ relative
                                            working in USA, Canada, UK, Europe, Australia, New Zealand, or
                                            Japan </label>
                                        <div class="form-check">
                                            <input class="form-check-input" name="family_members_country[]" type="checkbox" value="USA" id="">
                                            <label class="form-check-label" for="">
                                                USA
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="family_members_country[]" type="checkbox" value="Canada" id="" checked>
                                            <label class="form-check-label" for="">
                                                Canada
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="family_members_country[]" type="checkbox" value="UK" id="">
                                            <label class="form-check-label" for="">
                                                UK
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="family_members_country[]" type="checkbox" value="Europe" id="">
                                            <label class="form-check-label" for="">
                                                Europe
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="family_members_country[]" type="checkbox" value="Australia" id="">
                                            <label class="form-check-label" for="">
                                                Australia
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="family_members_country[]" type="checkbox" value="New Zealand" id="">
                                            <label class="form-check-label" for="">
                                                New Zealand
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="family_members_country[]" type="checkbox" value="Japan" id="">
                                            <label class="form-check-label" for="">
                                                Japan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="family_members_country[]" type="checkbox" value="NON" id="">
                                            <label class="form-check-label" for="">
                                                NON
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">If the response is yes, please provide more
                                            information. 13 and 14.</label>
                                        <textarea class="form-control" name="assists_and_family_des" id="" rows="4"
                                                  placeholder="About yourself"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">15. What is your salary expectation?</label>
                                        <textarea class="form-control" name="expected_salary" id="" rows="4"
                                                  placeholder="About yourself"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">16. How did you hear about us?</label>
                                        <select name="hear_about_us" class="form-select" aria-label="Default select example">
                                            <option value="">Select here ...</option>
                                            <option value="Search engines (other websites, blogs, videos, pictures)">Search engines (other websites, blogs, videos, pictures)
                                            </option>
                                            <option value="Internet ads.">Internet ads.</option>
                                            <option value="Social media.">Social media.</option>
                                            <option value="Fellow Crew">Fellow Crew</option>
                                            <option value="Friends">Friends</option>
                                            <option value="Advertise">Advertise</option>
                                            <option value="LinkedIn">LinkedIn</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">17. Are you Married?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="married_or_not" id="marriedyes"
                                                           checked="checked"/>
                                                    <label for="marriedyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="married_or_not" id="marriedno"/>
                                                    <label for="marriedno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">18. What is your qualification?</label>
                                        <select class="form-select" name="qualification" aria-label="Default select example">
                                            <option value="">Select here ...</option>
                                            <option value="O level">O level</option>
                                            <option value="A level">A level</option>
                                            <option value="SSC">SSC</option>
                                            <option value="HSC">HSC</option>
                                            <option value="BA">BA</option>
                                            <option value="MBA">MBA</option>
                                            <option value="HM">HM</option>
                                            <option value="NHTTI">NHTTI</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">19. Do you have any Hospitality Courses
                                            completed from any hotel school?</label>
                                        <select name="hospitali_course" class="form-select" aria-label="Default select example">
                                            <option value="">Select here ...</option>
                                            <option value="Hotel Management">a. Hotel Management</option>
                                            <option value="NHTTI">b. NHTTI</option>
                                            <option value="Certificate Course">c. Certificate Course</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">20. Are you willing to work under pressure at
                                            sea motions?</label>
                                        <select class="form-select" name="sea_motion_work" aria-label="Default select example">
                                            <option value="">Select here ...</option>
                                            <option value="I work well under pressure because I use the pressure to help me work more efficiently">I work well under pressure because I use the pressure to
                                                help me work more efficiently
                                            </option>
                                            <option value="I enjoy working under pressure because I believe it helps me grow."> I enjoy working under pressure because I believe it helps
                                                me grow.
                                            </option>
                                            <option value="I have chosen not to answer.">I have chosen not to answer.</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">21. Have you ever been issued a U.S.
                                            Visa?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="get_us_visa" id="visayes"
                                                           checked="checked"/>
                                                    <label for="visayes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="get_us_visa" id="visano"/>
                                                    <label for="visano">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">22. Has your U.S. Visa ever been cancelled or
                                            revoked?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="visa_cancelled_or_not" id="revokedyes"
                                                           checked="checked"/>
                                                    <label for="revokedyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="visa_cancelled_or_not" id="revokedno"/>
                                                    <label for="revokedno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">23. Have you ever been refused a U.S. Visa, or
                                            been refused admission to the United States, or withdrawn your application
                                            for admission at the port of entry?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="refused_us_visa" id="refusedyes"
                                                           checked="checked"/>
                                                    <label for="refusedyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="refused_us_visa" id="refusedno"/>
                                                    <label for="refusedno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">24. Have you traveled to any countries/regions
                                            within the last 2 years?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="travel_country" id="traveledyes"
                                                           checked="checked"/>
                                                    <label for="traveledyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="travel_country" id="traveledno"/>
                                                    <label for="traveledno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">25. Are you a member or representative of a
                                            terrorist organization?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="terrorist_organization_member" id="representativeyes"
                                                           checked="checked"/>
                                                    <label for="representativeyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="terrorist_organization_member" id="representativeno"/>
                                                    <label for="representativeno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">26. Do you have police clearance
                                            certificate? </label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="police_clearance_certificate" id="clearanceyes"
                                                           checked="checked"/>
                                                    <label for="clearanceyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="police_clearance_certificate" id="clearanceno"/>
                                                    <label for="clearanceno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">27. Do you seek to engage in espionage,
                                            sabotage, export control violations, or any other illegal activity while in
                                            Bangladesh or outside of the country? </label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="illegal_activity" id="seekyes"
                                                           checked="checked"/>
                                                    <label for="seekyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="illegal_activity" id="seekno"/>
                                                    <label for="seekno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">28. Have you ever been arrested or convicted
                                            for any offense or crime, even though subject of a pardon, amnesty, or other
                                            similar action? </label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="arrested" id="arrestedyes"
                                                           checked="checked"/>
                                                    <label for="arrestedyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="arrested" id="arrestedno"/>
                                                    <label for="arrestedno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">29. Do you have a mental or physical disorder
                                            that poses or is likely to pose a threat to the safety or welfare of
                                            yourself or others? </label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="mental_or_physical_disorder" id="mentalyes"
                                                           checked="checked"/>
                                                    <label for="mentalyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="mental_or_physical_disorder" id="mentalno"/>
                                                    <label for="mentalno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">30. Do you have a communicable disease of
                                            public health significance? (Communicable diseases of public significance
                                            include chancroid, gonorrhea, granuloma inguinale, infectious leprosy,
                                            lymphogranuloma venereum, infectious stage syphilis, active tuberculosis,
                                            and others diseases as determined by the Department of Health and Human
                                            Services.)</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="disease" id="communicableyes"
                                                           checked="checked"/>
                                                    <label for="communicableyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="disease" id="communicableno"/>
                                                    <label for="communicableno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">31. Have you ever served in, been a member of,
                                            or been involved with a paramilitary unit, vigilante unit, rebel group,
                                            guerrilla group, or insurgent organization?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="insurgent_organization" id="servedyes"
                                                           checked="checked"/>
                                                    <label for="servedyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="insurgent_organization" id="servedno"/>
                                                    <label for="servedno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">32.	Have you ever served in the military?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes"  name="served_military" id="militaryyes"
                                                           checked="checked"/>
                                                    <label for="militaryyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="served_military" id="militaryno"/>
                                                    <label for="militaryno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">33.	Have you belonged to, contributed to, or worked for any professional, social, or charitable organization?</label>
                                        <div class="custom_radio_button_form">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="radio" value="yes" name="charitable_organization" id="contributedyes"
                                                           checked="checked"/>
                                                    <label for="contributedyes">Yes</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" value="no" name="charitable_organization" id="contributedno"/>
                                                    <label for="contributedno">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mt-4">
                                        <button style="background-color:#FF8C00; padding:16px;" class="btn btn-success" type="submit">Next Step</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- End Mission Vision Section -->
</main>


<!-- ======= Footer ======= -->
@include('front.include.footer')

<script src="{{asset('/')}}public/front/assets/js/jquery-3.5.1.min.js"></script>
<script src="{{asset('/')}}public/front/assets/js/navik.menu.js"></script>

</body>
</html>
