<?php
require __DIR__ . '/includes/utils.php';
$siteData = require __DIR__ . '/includes/site-data.php';
$page = 'about';
$pageTitle = 'About Fitness Time | Our Story';
$pageDescription = 'Learn about the Fitness Time story, training philosophy, and the community that powers every class.';
include __DIR__ . '/partials/site-head.php';
?>
    <header class="site-header site-header--subpage">
      <?php include __DIR__ . '/partials/nav.php'; ?>
      <div class="page__hero">
        <div class="page__hero__content">
          <p class="eyebrow">Our story</p>
          <h1>Fitness that meets you where you are</h1>
          <p>
            Fitness Time started as a small strength studio focused on people, not fads. Today, we are a complete training
            destination with coaches who remember your goals and celebrate your wins.
          </p>
        </div>
        <div class="page__hero__image">
          <img src="assets/about.png" alt="Athletes training together" />
        </div>
      </div>
    </header>

    <?php include __DIR__ . '/partials/auth-modal.php'; ?>

    <main>
      <section class="section__container page__grid">
        <?php foreach ($siteData['aboutHighlights'] as $highlight): ?>
          <article class="card">
            <span class="pill"><?= e($highlight['pill']) ?></span>
            <h3><?= e($highlight['title']) ?></h3>
            <p><?= e($highlight['description']) ?></p>
          </article>
        <?php endforeach; ?>
      </section>

      <section class="section__container stats">
        <p class="eyebrow">By the numbers</p>
        <h2 class="section__header">Built by coaches, loved by members</h2>
        <p>
          We believe in quality coaching, smart programming, and a culture that celebrates the long game. That approach has helped
          thousands of members feel stronger inside and outside the gym.
        </p>
        <div class="stats__grid">
          <?php foreach ($siteData['stats'] as $stat): ?>
            <article class="stats__card">
              <h4><?= e($stat['value']) ?></h4>
              <p><?= e($stat['label']) ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="section__container timeline">
        <p class="eyebrow">What drives us</p>
        <h2 class="section__header">Values that keep us moving</h2>
        <div class="timeline__grid">
          <?php foreach ($siteData['values'] as $value): ?>
            <article class="timeline__card">
              <h4><?= e($value['title']) ?></h4>
              <p><?= e($value['description']) ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </section>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>
    <?php include __DIR__ . '/partials/site-foot.php'; ?>
