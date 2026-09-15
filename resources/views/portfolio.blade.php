<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achmad Yogi Pamungkas — Data Analyst</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="site-shell">
        <header class="topbar">
            <a class="mark" href="/">ay<span>.</span></a>
            <nav class="nav" aria-label="Main navigation"><a href="#work">Work</a><a href="#about">About</a><a href="#skills">Skills</a><a href="#contact">Contact</a></nav>
            <div class="status"><i></i> Open to opportunities</div>
        </header>
        <main>
            <section class="hero">
                <div>
                    <div class="eyebrow mono">East Jakarta</div>
                    <h1>Turning data<br>into <em>direction.</em></h1>
                    <p class="hero-copy">I am Achmad Yogi Pamungkas, an Informatics student focused on data analytics, data science, machine learning, and evidence-based decisions.</p>
                    <div class="hero-links">
                        <!-- <a href="mailto:achmadyogipamungkas@gmail.com">Email me <span>↗</span></a> -->
                        <a href="https://github.com/achmadyogiii" target="_blank" rel="noreferrer">GitHub <span>↗</span></a>
                    </div>
                </div>
                <div class="hero-aside">
                    <div class="portrait"><img src="{{ asset('images/profile.png') }}" alt="Achmad Yogi Pamungkas" onerror="this.style.display='none'"><span class="portrait-label mono">YOGI / 2026</span></div><span class="mono section-count">Scroll to explore ↓</span>
                </div>
            </section>
            <section class="section" id="work">
                <div class="section-head">
                    <h2>Academic Projects</h2><span class="mono section-count">03 projects / 02 publications</span>
                </div>
                <div class="work-grid">
                    <article class="project project-featured">
                        <div class="project-number mono">01 / ANALYTICS</div>
                        <div class="project-art churn-art"><span>16.84%</span><small>overall churn rate</small><i></i></div>
                        <h3 class="project-title">Customer Churn &amp; Behavioral Analytics Dashboard</h3><span class="project-meta mono">Python / Pandas / Power BI</span>
                        <p class="project-meta">Analyzed 5,630 e-commerce customers to identify churn drivers. New users represented 68.88% of churned customers, while complaints tripled churn risk.</p>
                    </article>
                    <article class="project">
                        <div class="project-number mono">02 / PUBLICATION</div>
                        <div class="project-art sentiment-art"><span>SVM</span><small>98% test accuracy</small><i></i></div>
                        <h3 class="project-title"><a class="publication-link" href="https://ioinformatic.org/index.php/JAIEA/article/view/1901" target="_blank" rel="noreferrer">Sentiment Analysis of Honda eSAF Frame Quality ↗</a></h3><span class="project-meta mono">NLP / TF-IDF / Python</span>
                        <p class="project-meta">Built an end-to-end NLP pipeline from 1,513 social media reviews, covering preprocessing, feature extraction, sentiment labeling, and SVM classification.</p>
                    </article>
                </div>
                <div class="publication-row"><span class="mono">ALSO PUBLISHED</span>
                    <p><a class="publication-link" href="https://informasiinteraktif.janabadra.ac.id/index.php/jii/article/view/220" target="_blank" rel="noreferrer">Sentiment Analysis of Pertamina Fuel Quality Using SVM Algorithm on Platform X ↗</a> <b>94% accuracy</b></p><span class="mono">JII / 2025</span>
                </div>
            </section>
            <section class="section about" id="about">
                <div><span class="eyebrow mono">Profile / 01</span></div>
                <div>
                    <p class="about-copy">Careful with the raw data. Curious about the story behind it.</p>
                    <p class="about-detail">Final-year Bachelor of Computer Science in Informatics student at Universitas Bina Sarana Informatika. I work across data cleansing, statistical analysis, NLP pipelines, and insight extraction to support research and operational decisions.</p>
                    <div class="education"><span class="mono">EDUCATION</span><strong>Universitas Bina Sarana Informatika</strong><small>2023 — 2027 / expected · GPA 3.97 / 4.00</small></div>
                </div>
            </section>
            <section class="section skills-section" id="skills">
                <div><span class="eyebrow mono">Toolkit / 02</span>
                    <h2>What I work<br><em>with.</em></h2>
                </div>
                <div class="skill-list">
                    <div><span class="mono">01</span>
                        <p>Data Analysis &amp; Processing</p><small>EDA, data cleansing, RFM segmentation, cohort analysis, sentiment analysis</small>
                    </div>
                    <div><span class="mono">02</span>
                        <p>Machine Learning &amp; Modeling</p><small>SVM, NLP, scikit-learn, statistical modeling, TF-IDF</small>
                    </div>
                    <div><span class="mono">03</span>
                        <p>Tools &amp; Platforms</p><small>Python, Pandas, NumPy, Matplotlib, Seaborn, Power BI, MySQL, Git</small>
                    </div>
                </div>
            </section>
            <section class="section contact" id="contact">
                <div><span class="eyebrow mono">Have a question or opportunity?</span>
                    <h2>Let's find<br>the <em>signal.</em></h2>
                    <!-- </div><a class="contact-link mono" href="mailto:achmadyogipamungkas@gmail.com">achmadyogipamungkas@gmail.com ↗</a> -->
            </section>
        </main>
        <footer><span class="mono">© 2026 Achmad Yogi Pamungkas</span><span class="mono">
                <!-- <a href="https://www.linkedin.com/in/achmadyogipamungkas" target="_blank" rel="noreferrer">LinkedIn</a> /  -->
                <a href="https://github.com/achmadyogiii" target="_blank" rel="noreferrer">GitHub</a></span></footer>
    </div>
</body>

</html>