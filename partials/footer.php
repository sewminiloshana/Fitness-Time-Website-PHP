<footer class="footer">
  <div class="section__container footer__container">
    <div class="footer__col">
      <a href="index.php" class="footer__logo">
        <img src="assets/logo-white.png" alt="Fitness Time logo" />
      </a>
      <ul class="footer__links">
        <li>
          <a href="tel:<?= e($siteData['contactInfo']['phone']) ?>">
            <span><i class="ri-phone-line"></i></span> <?= e($siteData['contactInfo']['phone_display']) ?>
          </a>
        </li>
        <li>
          <a href="https://maps.google.com/?q=<?= rawurlencode($siteData['contactInfo']['address']) ?>" target="_blank" rel="noreferrer">
            <span><i class="ri-map-pin-line"></i></span> <?= e($siteData['contactInfo']['address']) ?>
          </a>
        </li>
        <li>
          <a href="mailto:<?= e($siteData['contactInfo']['email']) ?>">
            <span><i class="ri-mail-line"></i></span> <?= e($siteData['contactInfo']['email']) ?>
          </a>
        </li>
      </ul>
    </div>
    <div class="footer__col">
      <h4>Quick Links</h4>
      <ul class="footer__links">
        <?php foreach ($siteData['navLinks'] as $link): ?>
          <li><a href="<?= e($link['href']) ?>"><?= e($link['label']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="footer__col">
      <h4>Gym Hours</h4>
      <ul class="footer__links">
        <?php foreach ($siteData['gymHours'] as $hours): ?>
          <li><?= e($hours) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="footer__bar">&copy; <?= date('Y') ?> Fitness Time. All rights reserved.</div>
</footer>
