<div class="auth-modal" id="authModal" aria-hidden="true">
  <div class="auth-modal__panel" role="dialog" aria-modal="true">
    <button class="close-btn-modal" type="button" id="closeBtn" aria-label="Close">
      <i class="ri-close-line"></i>
    </button>

    <!-- Tabs -->
    <div class="auth-tabs" role="tablist">
      <button class="auth-tab is-active" type="button" data-auth-tab="login">Login</button>
      <button class="auth-tab" type="button" data-auth-tab="register">Sign Up</button>
    </div>

    <div class="auth-forms" data-view="login">
      <!-- LOGIN FORM -->
      <div class="form-box" data-pane="login">
        <h2 class="form-box__title">Welcome Back</h2>
        <form class="auth-form" method="POST" action="login.php">
          <label class="input-field">
            <span>Email</span>
            <input type="email" name="email" placeholder="you@email.com" required />
          </label>
          <label class="input-field">
            <span>Password</span>
            <input type="password" name="password" placeholder="Minimum 6 characters" minlength="6" required />
          </label>
          <button class="btn" type="submit">Login</button>
          <p class="form-box__switch">
            New to Fitness Time?
            <button type="button" class="link-btn">Create an account</button>
          </p>
        </form>
      </div>

      <!-- REGISTER FORM -->
      <div class="form-box" data-pane="register">
        <h2 class="form-box__title">Create an Account</h2>
        <form class="auth-form" method="POST" action="register.php">
          <label class="input-field">
            <span>Full Name</span>
            <input type="text" name="name" placeholder="Jordan Strong" required />
          </label>
          <label class="input-field">
            <span>Email</span>
            <input type="email" name="email" placeholder="you@email.com" required />
          </label>
          <label class="input-field">
            <span>Password</span>
            <input type="password" name="password" placeholder="At least 8 characters" minlength="8" required />
          </label>
          <label class="input-field">
            <span>Primary Goal</span>
            <select name="goal" required>
              <option value="" disabled selected>Select a goal</option>
              <option value="strength">Gain strength</option>
              <option value="weight-loss">Lose weight</option>
              <option value="performance">Boost performance</option>
              <option value="wellness">Feel healthier</option>
            </select>
          </label>
          <button class="btn" type="submit">Create Account</button>
          <p class="form-box__switch">
            Already a member?
            <button type="button" class="link-btn" data-switch-view="login">Login</button>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>
