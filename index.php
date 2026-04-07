<?php


session_start();

if(!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true){
    // Not logged in → redirect to register page
    header("Location: register.php");
    exit;
}
require __DIR__ . '/includes/utils.php';
$siteData = require __DIR__ . '/includes/site-data.php';
$page = 'home';
$pageTitle = 'Fitness Time | Strength For Every Body';
$pageDescription = 'Fitness Time is a boutique training studio offering classes, coaching, and memberships for every fitness level.';
include __DIR__ . '/partials/site-head.php';
?>
    <header class="site-header" id="home">
      <?php include __DIR__ . '/partials/nav.php'; ?>
      <div class="section__container header__container">
        <div class="header__content">
          <p class="eyebrow">Stronger every day</p>
          <h1>Push Your Limits</h1>
          <h2>Build Your Strength</h2>
          <p>
            Every workout is a step toward a stronger body and a sharper mind. Train with purpose, stay consistent, and watch
            yourself transform. Your fitness journey starts here.
          </p>
          <div class="header__btn">
            <a class="btn" href="classes.php">See Class Schedule</a>
            <a class="btn btn--ghost" href="about.php">Tour The Club</a>
          </div>
          <div class="header__meta">
            <p><span>70+</span> group sessions each week</p>
            <p><span>24/7</span> member access and support</p>
          </div>
        </div>
        <div class="header__image">
          <img src="assets/header.png" alt="Athlete training at Fitness Time" />
        </div>
      </div>
    </header>

    <?php include __DIR__ . '/partials/auth-modal.php'; ?>

    <main>
      <section class="about" id="about">
        <div class="section__container about__container">
          <div class="about__image">
            <img src="assets/about.png" alt="Training partner supporting workout" />
          </div>
          <div class="about__content">
            <p class="eyebrow">All levels welcome</p>
            <h2 class="section__header">Ready to make a change? Let&#39;s do this!</h2>
            <p>
              Your journey to a healthier, stronger, and more confident you starts right here. Taking that first step might feel
              challenging - but it&#39;s also the moment everything changes. Whether you&#39;re new to fitness or already pushing your
              limits, our programs help you reach your goals faster.
            </p>
            <p>
              Train in a motivating, high-energy environment with expert coaches, inspiring classes, and top-tier equipment that
              keeps you excited and consistent. We&#39;re here to support you, challenge you, and celebrate every win along the way.
            </p>
            <p>Let&#39;s turn your fitness goals into real results.</p>
            <div class="about__btn">
<div class="about__btn">
  <a class="btn" href="classes.php">Get Started Today</a>
</div>
            </div>
          </div>
        </div>
      </section>

      <section class="service" id="service">
        <div class="section__container service__container">
          <p class="eyebrow">How we help</p>
          <h2 class="section__header">How we help you succeed</h2>
          <div class="service__grid">
            <?php foreach ($siteData['services'] as $service): ?>
              <article class="service__card">
                <span><?= e($service['number']) ?></span>
                <h4><?= e($service['title']) ?></h4>
                <p><?= e($service['description']) ?></p>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section class="popular" id="class">
        <div class="section__container popular__container">
          <p class="eyebrow">Popular classes</p>
          <h2 class="section__header">What would you like to join today?</h2>
          <div class="popular__grid">
            <?php foreach ($siteData['popularClasses'] as $popular): ?>
              <article class="popular__card">
                <div>
                  <h4><?= e($popular['title']) ?></h4>
                  <p><?= e($popular['subtitle']) ?></p>
                </div>
                <span><i class="ri-arrow-right-line"></i></span>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section class="facility__container" id="facility">
        <div class="facility__image">
          <img src="assets/facility.jpg" alt="Fitness Time facility" />
        </div>
        <div class="facility__content">
          <p class="eyebrow">Space to grow</p>
          <h2 class="section__header">It&#39;s about who you can become</h2>
          <p>
            At our gym, fitness is more than a workout - it&#39;s a transformation. Every session builds strength, sharpens your
            mindset, and pushes you one step closer to the strongest, healthiest version of you.
          </p>
          <p>
            This isn&#39;t about shortcuts or quick fixes. It&#39;s about showing up, staying consistent, and creating a lifestyle that
            drives real change. With expert support and a motivating community, you&#39;ll break limits and crush goals you once
            thought were out of reach.
          </p>
        </div>
      </section>

      <section class="section__container mentor__container" id="mentors">
        <p class="eyebrow">Coaching team</p>
        <h2 class="section__header">Your personal coach &amp; mentor</h2>
        <div class="mentor__grid">
          <?php foreach ($siteData['mentors'] as $mentor): ?>
            <article class="mentor__card">
              <img src="<?= e($mentor['image']) ?>" alt="<?= e($mentor['name']) ?>" />
              <h4><?= e($mentor['name']) ?></h4>
              <p><?= e($mentor['role']) ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="stories" id="stories">
        <div class="section__container stories__container">
          <div>
            <p class="eyebrow">Member stories</p>
            <h2 class="section__header">Real results from real people</h2>
            <p>
              From first-timers to lifelong athletes, our members share one thing: progress they can feel. Get inspired by the wins
              happening inside Fitness Time every week.
            </p>
          </div>
          <div class="stories__grid">
            <?php foreach ($siteData['stories'] as $story): ?>
              <article class="story-card">
                <div class="story-card__profile">
                  <img src="<?= e($story['image']) ?>" alt="<?= e($story['name']) ?>" />
                  <div>
                    <h4><?= e($story['name']) ?></h4>
                    <p><?= e($story['result']) ?></p>
                  </div>
                </div>
                <p>&ldquo;<?= e($story['quote']) ?>&rdquo;</p>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section class="banner" id="contact">
        <div class="banner__content">
          <p class="eyebrow">Coach collective</p>
          <h2>The best trainers out there</h2>
          <p>Are you a trainer? <a href="mailto:<?= e($siteData['contactInfo']['email']) ?>">Join us</a></p>
        </div>
        <div class="banner__image">
          <img src="assets/banner.jpg" alt="Fitness Time trainers" />
        </div>
      </section>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php include __DIR__ . '/partials/site-foot.php'; ?>
