<?php
require_once 'inc/utils.php';
$pageTitle = 'What We Do';
require_once 'inc/head.php';
?>

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/banner3.jpg)">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <h2><?php echo $pageTitle; ?></h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="<?php echo DEF_ROOT_PATH; ?>">Home</a></li>
                <li><span>/</span></li>
                <li class="active"><?php echo $pageTitle; ?></li>
            </ul>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Offerings Start-->
<section class="welcome-one" style="margin-top:100px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="about-page__img">
                    <img src="assets/images/backgrounds/student-sitting-alone.jpg" alt="Student Sitting">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="welcome-one__right">
                    <div class="section-title text-left">
                        <h2>Learn about our activities</h2>
                    </div>
                    <p class="welcome-one__text-2">At StudentsCabin, we attend to various student needs and offer a wide range of programs and initiatives designed to support the holistic development of students.</p>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-xl-12">
                <ul class="about-one__points list-unstyled">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>Weekly Referral Rewards</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">We incentivize students to refer their peers to StudentsCabin
                        by offering weekly referral rewards. Students who refer new members to our community
                        are eligible to receive diverse rewards. This program encourages students to actively
                        engage with our community and help us grow our network of support.</p>
                    </li>
                </ul>

                <ul class="about-one__points list-unstyled mt-4">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>Emergency Financial Assistance (Urgent 2k)</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">In times of urgent need, we provide
                        emergency financial assistance of ₦2,000 to students facing unforeseen financial
                        hardships. Whether it's covering emergency medical expenses like drugs, transportation
                        costs, money for breakfast, lunch or dinner or essential living expenses, we offer
                        immediate support to ensure that students can focus on their studies without the burden
                        of financial stress.</p>
                    </li>
                </ul>

                <ul class="about-one__points list-unstyled mt-4">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>Weekly Mobile Data Giveaways</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">We understand the importance of staying connected in
                        today's digital world. That's why we offer weekly mobile data giveaways to ensure that
                        students have access to online resources, educational materials, and support services.
                        By providing free mobile data, we help students overcome barriers to connectivity and
                        empower them to fully participate in academic and extracurricular activities.
                        </p>
                    </li>
                </ul>

                <ul class="about-one__points list-unstyled mt-4">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>Mini Scholarships for Tuition Support</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">We offer mini scholarships to provide tuition
                        support for students facing financial barriers to education. These scholarships are
                        awarded based on academic merit, financial need, and personal circumstances. By
                        alleviating the financial burden of tuition costs, we enable students to pursue their
                        educational goals and aspirations without financial constraints.</p>
                    </li>
                </ul>

                <ul class="about-one__points list-unstyled mt-4">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>Weekly Tasks with Diverse Rewards</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">We engage students through weekly tasks that
                        offer diverse rewards, By completing tasks, students earn rewards.</p>
                    </li>
                </ul>

                <ul class="about-one__points list-unstyled mt-4">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>Bi-weekly Student Products and Services Showcasing</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">We provide opportunities for
                        students to showcase their talents, skills, and entrepreneurial ventures through bi-weekly
                        showcases of student products and services. Whether it's launching a business, selling a
                        product or rendering a service, we celebrate the creativity and innovation of our students
                        and provide a platform for them to share their work with the community.</p>
                    </li>
                </ul>

                <ul class="about-one__points list-unstyled mt-4">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>Monthly Seminars on Personal, Academic, and Career Development</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">We organize
                        monthly seminars focused on personal, academic, and career development to provide
                        students with valuable insights, skills, and resources for success. These seminars cover
                        a wide range of topics, including time management, study skills, goal setting, career
                        exploration, resume writing, interview preparation, and networking strategies. By
                        attending seminars, students gain practical knowledge and tools to navigate their
                        academic and professional journey with confidence.</p>
                    </li>
                </ul>

                <ul class="about-one__points list-unstyled mt-4">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>BookClub</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">Join our BookClub and embark on a journey of literary exploration with fellow
                        students. Each month, we select a new book to read and review together, during our
                        review session we discuss the selected book, covering its themes, characters, and
                        messages. The aim is to provide opportunities for meaningful dialogue, intellectual
                        stimulation, and the joy of communal reading. Whether you're an avid reader or just
                        getting started, our BookClub offers a welcoming and inclusive space to discover new
                        books, expand your horizons, and cultivate a lifelong love of reading.</p>
                    </li>
                </ul>

                <ul class="about-one__points list-unstyled mt-4">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>Access to Diverse Opportunities</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">We connect students with a wide range of
                        opportunities, including internships, scholarships, job placements, mentorship programs,
                        and community engagement initiatives. Whether it's gaining practical experience,
                        building professional networks, or making a positive impact in the community, we provide
                        students with access to diverse opportunities to explore their interests, expand their
                        horizons, and achieve their aspirations.</p>
                    </li>
                </ul>

                <p class="mt-5">By offering these programs and initiatives, StudentsCabin aims to provide comprehensive
                support and empowerment to students in Nigeria, helping them overcome challenges, realize
                their full potential, and create a better future for themselves and their communities.</p>

            </div>
        </div>
    </div>
</section>
<!--Offerings End-->

<?php
require_once 'inc/foot.php';
?>