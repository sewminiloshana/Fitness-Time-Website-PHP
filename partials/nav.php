<nav>
  <div class="nav__container">
    <div class="nav__header">
      <div class="nav__logo">
        <a href="index.php">
          <img src="assets/logo-white.png" alt="Fitness Time logo" class="logo-white" />
          <img src="assets/logo-dark.png" alt="Fitness Time logo" class="logo-dark" />
        </a>
      </div>
      <button class="nav__menu__btn" id="menu-btn" type="button" aria-label="Toggle navigation" aria-expanded="false">
        <i class="ri-menu-line" aria-hidden="true"></i>
        <span class="sr-only">Open menu</span>
      </button>
    </div>
    <div class="nav__menu" id="nav-menu">
      <ul class="nav__links" id="nav-links">
        <?php foreach ($siteData['navLinks'] as $link): ?>
          <?php $isActive = $page === $link['page']; ?>
          <li>
            <a href="<?= e($link['href']) ?>" data-nav="<?= e($link['page']) ?>"<?= $isActive ? ' class="active"' : '' ?>>
              <?= e($link['label']) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
   <div class="user-auth">
  <!-- Join Now => register.php -->
  <form action="logout.php" style="display:inline;">
    <button type="submit" class="btn btn--ghost">log out</button>
  </form>

  <!-- Member Login => login.php -->

</div>

    </div>
  </div>
</nav>
