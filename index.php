<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CampusCare helps students share concerns and stay informed about campus support.">
    <title>CampusCare | Student Support, Made Simple</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="site-header">
        <nav class="navbar container" aria-label="Main navigation">
            <a class="brand" href="#home" aria-label="CampusCare home">
                <span class="brand-mark" aria-hidden="true">C</span>
                <span>Campus<span class="brand-accent">Care</span></span>
            </a>

            <button class="menu-toggle" type="button" aria-label="Open navigation menu"
                    aria-expanded="false" aria-controls="primary-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="nav-menu" id="primary-menu">
                <div class="nav-links">
                    <a class="nav-link" href="#home">Home</a>
                    <a class="nav-link" href="#about">About Us</a>
                    <a class="nav-link" href="#services">Services</a>
                    <a class="nav-link" href="#contact">Contact Us</a>
                </div>
                <div class="nav-actions">
                    <a class="login-link" href="student_login.php">Student Login</a>
                    <a class="button button-small button-outline" href="admin_login.php">Admin Login</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="container hero-layout">
                <div class="hero-copy">
                    <span class="eyebrow"><span class="status-dot"></span> A better way to be heard</span>
                    <h1>Your voice matters.<br><span>CampusCare is here.</span></h1>
                    <p class="hero-text">
                        A supportive campus starts with listening. Share a concern, find the right help,
                        and feel confident that your voice is part of the conversation.
                    </p>
                    <div class="hero-actions">
                        <a class="button button-primary" href="complaint.php">
                            Register a Complaint
                            <span aria-hidden="true">&rarr;</span>
                        </a>
                        <a class="text-link" href="#about">Discover CampusCare <span aria-hidden="true">&darr;</span></a>
                    </div>
                    <div class="hero-note">
                        <span class="note-icon" aria-hidden="true">&#10003;</span>
                        <span>Here to help make campus life better for everyone.</span>
                    </div>
                </div>

                <div class="hero-art" aria-label="CampusCare student support overview">
                    <div class="art-orbit orbit-one"></div>
                    <div class="art-orbit orbit-two"></div>
                    <div class="support-card">
                        <div class="support-card-top">
                            <span class="card-icon" aria-hidden="true">&#9829;</span>
                            <span class="card-menu" aria-hidden="true">&#8226;&#8226;&#8226;</span>
                        </div>
                        <p class="card-label">YOUR CAMPUS, YOUR VOICE</p>
                        <h2>Every concern deserves care.</h2>
                        <p class="card-description">A clear, supportive path to help you move forward.</p>
                        <div class="card-divider"></div>
                        <div class="support-step">
                            <span class="step-number">01</span>
                            <span>Share what’s on your mind</span>
                            <span class="step-check" aria-hidden="true">&#10003;</span>
                        </div>
                        <div class="support-step">
                            <span class="step-number">02</span>
                            <span>Connect with campus support</span>
                            <span class="step-check" aria-hidden="true">&#10003;</span>
                        </div>
                        <div class="support-step">
                            <span class="step-number">03</span>
                            <span>Be part of positive change</span>
                            <span class="step-check" aria-hidden="true">&#10003;</span>
                        </div>
                    </div>
                    <div class="floating-note">
                        <span class="floating-icon" aria-hidden="true">&#10022;</span>
                        <span><strong>Here for you</strong><small>Support starts with listening</small></span>
                    </div>
                    <span class="art-decoration decoration-one" aria-hidden="true"></span>
                    <span class="art-decoration decoration-two" aria-hidden="true"></span>
                </div>
            </div>
            <div class="hero-bottom-shape" aria-hidden="true"></div>
        </section>

        <section class="welcome section-space" id="about">
            <div class="container welcome-layout">
                <div class="section-heading">
                    <span class="eyebrow eyebrow-blue">WELCOME TO CAMPUSCARE</span>
                    <h2>A campus community<br>that listens.</h2>
                </div>
                <div class="welcome-copy">
                    <p>
                        College life comes with challenges, and knowing where to turn can make all the
                        difference. CampusCare is a friendly place for students to raise concerns and
                        find support from their college community.
                    </p>
                    <a class="text-link blue-link" href="#services">See how we can help <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </section>

        <section class="services section-space" id="services">
            <div class="container">
                <div class="section-intro">
                    <span class="eyebrow eyebrow-blue">SUPPORT THAT STARTS WITH YOU</span>
                    <h2>Here to make things easier.</h2>
                    <p>CampusCare helps students take the next step with confidence.</p>
                </div>

                <div class="service-grid">
                    <article class="service-card">
                        <div class="service-icon icon-blue" aria-hidden="true">&#9998;</div>
                        <h3>Speak up</h3>
                        <p>Share a campus concern in a welcoming space where your experience matters.</p>
                        <a href="complaint.php" class="card-link">Register a complaint <span aria-hidden="true">&rarr;</span></a>
                    </article>
                    <article class="service-card">
                        <div class="service-icon icon-teal" aria-hidden="true">&#9825;</div>
                        <h3>Find support</h3>
                        <p>Get connected with the right people and resources in your college community.</p>
                        <a href="#contact" class="card-link">Get in touch <span aria-hidden="true">&rarr;</span></a>
                    </article>
                    <article class="service-card">
                        <div class="service-icon icon-purple" aria-hidden="true">&#10022;</div>
                        <h3>Create change</h3>
                        <p>Help your college understand student needs and build a more caring campus.</p>
                        <a href="#about" class="card-link">About CampusCare <span aria-hidden="true">&rarr;</span></a>
                    </article>
                </div>
            </div>
        </section>

        <section class="portal-section" id="portals">
            <div class="container portal-content">
                <div>
                    <span class="eyebrow">YOUR NEXT STEP</span>
                    <h2>Ready to be heard?</h2>
                    <p>Student and administrator portals will be available here soon.</p>
                </div>
                <div class="portal-actions">
                    <a class="button button-white" href="complaint.php">Register a Complaint <span aria-hidden="true">&rarr;</span></a>
                    <a class="portal-login" href="student_login.php">Student Login <span aria-hidden="true">&rarr;</span></a>
                    <a class="portal-login" href="admin_login.php">Admin Login <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </section>

        <section class="contact section-space" id="contact">
            <div class="container contact-layout">
                <div>
                    <span class="eyebrow eyebrow-blue">WE’RE HERE TO HELP</span>
                    <h2>Questions? Let’s talk.</h2>
                    <p>For help with CampusCare, reach out to your college’s student support office.</p>
                </div>
                <a class="contact-card" href="mailto:student-support@yourcollege.edu">
                    <span class="contact-icon" aria-hidden="true">&#9993;</span>
                    <span><small>STUDENT SUPPORT</small><strong>student-support@yourcollege.edu</strong></span>
                    <span class="contact-arrow" aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-content">
            <a class="brand footer-brand" href="#home">
                <span class="brand-mark" aria-hidden="true">C</span>
                <span>Campus<span class="brand-accent">Care</span></span>
            </a>
            <p>Care begins when we listen.</p>
            <span class="copyright">&copy; <span id="current-year">2026</span> CampusCare. All rights reserved.</span>
            <a class="back-to-top" href="#home">Back to top <span aria-hidden="true">&uarr;</span></a>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
