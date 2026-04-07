<?php
require __DIR__ . '/includes/utils.php';
$siteData = require __DIR__ . '/includes/site-data.php';
$page = 'contact';
$pageTitle = 'Contact Fitness Time';
$pageDescription = 'Get in touch with the Fitness Time team, book a tour, or message our coaches.';

// Database connection
$host = "localhost";
$db = "my_gim";  // Your database name
$user = "root";  // DB username
$pass = "";      // DB password

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize form state
$contactFormState['values'] = [
    'name' => '',
    'email' => '',
    'message' => '',
    'telephone' => '',
    'city' => ''
];



// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form'])) {
    $contactFormState['values']['name'] = trim($_POST['name'] ?? '');
    $contactFormState['values']['email'] = trim($_POST['email'] ?? '');
    $contactFormState['values']['message'] = trim($_POST['message'] ?? '');
    $contactFormState['values']['telephone'] = trim($_POST['telephone'] ?? '');
    $contactFormState['values']['city'] = trim($_POST['city'] ?? '');

    $errors = [];
    if ($contactFormState['values']['name'] === '') {
        $errors[] = 'Please enter your name.';
    }
    if (!filter_var($contactFormState['values']['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email.';
    }
    if ($contactFormState['values']['message'] === '') {
        $errors[] = 'Please enter your message.';
    }

    if (empty($errors)) {
        $name = $conn->real_escape_string($contactFormState['values']['name']);
$email = $conn->real_escape_string($contactFormState['values']['email']);
$message = $conn->real_escape_string($contactFormState['values']['message']);
$telephone = $conn->real_escape_string($contactFormState['values']['telephone']);
$city = $conn->real_escape_string($contactFormState['values']['city']);


$sql = "INSERT INTO contact_messages (name, email, message, telephone, city) 
        VALUES ('$name', '$email', '$message', '$telephone' , '$city')";


        if ($conn->query($sql)) {
            $contactFormState['status'] = 'success';
            $contactFormState['message'] = 'Thanks! Your message has been sent.';
            // Clear form fields
            $contactFormState['values'] = ['name' => '', 'email' => '', 'message' => ''];
        } else {
            $contactFormState['status'] = 'error';
            $contactFormState['message'] = 'Database error: ' . $conn->error;
        }
    } else {
        $contactFormState['status'] = 'error';
        $contactFormState['message'] = implode(' ', $errors);
    }
}

include __DIR__ . '/partials/site-head.php';
?>
<header class="site-header site-header--subpage">
    <?php include __DIR__ . '/partials/nav.php'; ?>
    <div class="page__hero">
        <div class="page__hero__content">
            <p class="eyebrow">Let's talk</p>
            <h1>Come See Us or Send Us a Message</h1>
            <p>We’re here to answer your membership questions, schedule studio tours, and connect you with a dedicated coach who truly understands your goals. Whether you’re just getting started or ready to level up your training, our team is happy to guide you every step of the way and help you find the perfect fit for your fitness journey.</p>
        </div>
        <div class="page__hero__image">
            <img src="assets/contact.png" alt="Fitness Time front desk" />
        </div>
    </div>
</header>

<?php include __DIR__ . '/partials/auth-modal.php'; ?>

<main>
    <section class="section__container contact-grid">
        <?php foreach ($siteData['contactCards'] as $card): ?>
            <article class="card contact-card">
                <span class="pill"><?= e($card['pill']) ?></span>
                <h3><?= e($card['title']) ?></h3>
                <?php if (!empty($card['body'] ?? '')): ?>
                    <p><?= e($card['body']) ?></p>
                <?php endif; ?>
                <ul class="footer__links">
                    <?php foreach ($card['items'] as $item): ?>
                        <?php if (is_array($item)): ?>
                            <li>
                                <a href="<?= e($item['href']) ?>"<?= $item['type'] === 'map' ? ' target="_blank" rel="noreferrer"' : '' ?>>
                                    <i class="ri-<?= $item['type'] === 'phone' ? 'phone' : ($item['type'] === 'email' ? 'mail' : 'navigation') ?>-line"></i>
                                    <?= e($item['label']) ?>
                                </a>
                            </li>
                        <?php else: ?>
                            <li><?= e($item) ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </article>
        <?php endforeach; ?>

        <form class="contact-form" method="post">
            <input type="hidden" name="contact_form" value="1" />
            <span class="pill">Message us</span>
            <h3>Send us a quick note</h3>
            <div class="form-alert" data-form-alert<?= $contactFormState['status'] ? ' data-state="' . e($contactFormState['status']) . '"' : '' ?>>
                <?= $contactFormState['status'] ? e($contactFormState['message']) : '' ?>
            </div>
            <label class="input-field" for="contactName">
                <span>Name</span>
                <input type="text" id="contactName" name="name" value="<?= e($contactFormState['values']['name']) ?>" placeholder="Ariana Silva" required />
            </label>
            <label class="input-field" for="contactEmail">
                <span>Email</span>
                <input type="email" id="contactEmail" name="email" value="<?= e($contactFormState['values']['email']) ?>" placeholder="you@email.com" required />
            </label>
            <label class="input-field" for="contactMessage">
                <span>How can we help?</span>
                <textarea id="contactMessage" name="message" placeholder="Tell us about your goals or questions..." required><?= e($contactFormState['values']['message']) ?></textarea>
            </label>
                            <label class="input-field" for="TelephoneNo">
    <span>Telephone</span>
    <input 
        type="tel" 
        id="TelephoneNo" 
        name="telephone" 
        placeholder="Enter your telephone number" 
        value="<?= e($contactFormState['values']['telephone'] ?? '') ?>" 
        required
    >
</label>

<label class="input-field" for="city">
                <span>City</span>
                <textarea id="City" name="city" placeholder="Enter your city" required><?= e($contactFormState['values']['message']) ?></textarea>
            </label>


            <button class="btn" type="submit">Send Message</button>
        </form>
    </section>

    <section class="section__container timeline">
        <p class="eyebrow">Events &amp; support</p>
        <h2 class="section__header">Stay connected</h2>
        <div class="timeline__grid">
            <?php foreach ($siteData['contactEvents'] as $event): ?>
                <article class="timeline__card">
                    <h4><?= e($event['title']) ?></h4>
                    <p><?= e($event['description']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
<?php include __DIR__ . '/partials/site-foot.php'; ?>
