<?php
require __DIR__ . '/includes/utils.php';
$siteData = require __DIR__ . '/includes/site-data.php';
$page = 'classes';
$pageTitle = 'Classes & Programs | Fitness Time';
$pageDescription = 'Explore the Fitness Time class schedule, specialty programs, and membership options.';
$host = "localhost";
$db = "my_gim";  
$user = "root";  
$pass = "";      

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Filter for class focus
$focus = isset($_GET['focus']) ? strtolower(trim($_GET['focus'])) : 'all';
$focusOptions = ['all' => 'All focuses'];
foreach ($siteData['classSpotlights'] as $spotlight) {
    $category = $spotlight['category'];
    if (!isset($focusOptions[$category])) {
        $focusOptions[$category] = ucwords(str_replace('-', ' ', $category));
    }
}
if (!array_key_exists($focus, $focusOptions)) {
    $focus = 'all';
}
$filteredPrograms = array_values(array_filter(
    $siteData['classSpotlights'],
    fn($program) => $focus === 'all' || $program['category'] === $focus
));

// Initialize form state
$planFormState = [
    'values' => [
        'name' => '',
        'email' => '',
        'goal' => '',
        'plan' => 'Starter',
    ],
    'status' => null,
    'message' => '',
];

$availablePlanTiers = array_column($siteData['plans'], 'tier');

// Handle plan request form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['plan_request'])) {
    $planFormState['values']['name'] = trim($_POST['name'] ?? '');
    $planFormState['values']['email'] = trim($_POST['email'] ?? '');
    $planFormState['values']['goal'] = trim($_POST['goal'] ?? '');
    $planFormState['values']['plan'] = $_POST['plan'] ?? 'Starter';
    if (!in_array($planFormState['values']['plan'], $availablePlanTiers, true)) {
        $planFormState['values']['plan'] = $availablePlanTiers[0] ?? 'Starter';
    }

    $errors = [];
    if ($planFormState['values']['name'] === '') {
        $errors[] = 'Please share your name.';
    }
    if (!filter_var($planFormState['values']['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Add a valid email so we can reply.';
    }
    if ($planFormState['values']['goal'] === '') {
        $errors[] = 'Tell us a primary goal for coaching.';
    }

    if (empty($errors)) {
        // Use prepared statements for security
        $stmt = $conn->prepare("INSERT INTO plan_requests (name, email, plan, goal) VALUES (?, ?, ?, ?)");
        $stmt->bind_param(
            "ssss",
            $planFormState['values']['name'],
            $planFormState['values']['email'],
            $planFormState['values']['plan'],
            $planFormState['values']['goal']
        );

        if ($stmt->execute()) {
            $planFormState['status'] = 'success';
            $planFormState['message'] = 'Thanks! A coach will reach out with your next steps.';
            $planFormState['values'] = ['name' => '', 'email' => '', 'goal' => '', 'plan' => 'Starter'];
        } else {
            $planFormState['status'] = 'error';
            $planFormState['message'] = 'Database error: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        $planFormState['status'] = 'error';
        $planFormState['message'] = implode(' ', $errors);
    }
}

include __DIR__ . '/partials/site-head.php';
?>

<header class="site-header site-header--subpage">
    <?php include __DIR__ . '/partials/nav.php'; ?>
    <div class="page__hero">
        <div class="page__hero__content">
            <p class="eyebrow">Programs &amp; classes</p>
            <h1>Find a class that fits your ambition</h1>
            <p>Mix and match strength, conditioning, and recovery sessions to create a training plan that truly fits your lifestyle. Build consistency, stay motivated, and enjoy workouts that keep you energized, challenged, and excited to show up every day. This is fitness designed to work for you — not the other way around.</p>
        </div>
        <div class="page__hero__image">
            <img src="assets/service.png" alt="Coach leading a class" />
        </div>
    </div>
</header>

<?php include __DIR__ . '/partials/auth-modal.php'; ?>

<main>
    <section class="section__container">
        <form class="filter-bar" method="get">
            <label for="focusFilter">Focus</label>
            <select id="focusFilter" name="focus" onchange="this.form.submit()">
                <?php foreach ($focusOptions as $value => $label): ?>
                    <option value="<?= e($value) ?>"<?= $focus === $value ? ' selected' : '' ?>><?= e($label) ?></option>
                <?php endforeach; ?>
            </select>
            <?php if ($focus !== 'all'): ?>
                <a class="link-btn" href="classes.php">Reset</a>
            <?php endif; ?>
        </form>
        <div class="page__grid">
            <?php foreach ($filteredPrograms as $program): ?>
                <article class="card">
                    <span class="pill"><?= e($program['pill']) ?></span>
                    <h3><?= e($program['title']) ?></h3>
                    <p><?= e($program['description']) ?></p>
                </article>
            <?php endforeach; ?>
            <?php if (empty($filteredPrograms)): ?>
                <p>No sessions match that focus right now. Try another filter.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="section__container page__grid">
        <?php foreach ($siteData['plans'] as $plan): ?>
            <article class="plan-card">
                <span class="pill"><?= e($plan['tier']) ?></span>
                <h3><?= e($plan['name']) ?></h3>
                <p class="plan-card__price"><?= e($plan['price']) ?></p>
                <ul>
                    <?php foreach ($plan['perks'] as $perk): ?>
                        <li><?= e($perk) ?></li>
                    <?php endforeach; ?>
                </ul>
<a href="#plan-consult" class="btn">
  Join <?= e($plan['tier']) ?>
</a>
            </article>
        <?php endforeach; ?>
    </section>

<section class="section__container plan-request" id="plan-consult">
        <div class="card">
            <span class="pill">Need guidance?</span>
            <h3>Request a plan consult</h3>
            <p>Share a few details and a coach will send the perfect starting point for your goals.</p>
            <form class="plan-request__form" method="post">
                <input type="hidden" name="plan_request" value="1" />
                <div class="form-alert" data-form-alert<?= $planFormState['status'] ? ' data-state="' . e($planFormState['status']) . '"' : '' ?>>
                    <?= $planFormState['status'] ? e($planFormState['message']) : '' ?>
                </div>
                <label class="input-field" for="planName">
                    <span>Name</span>
                    <input type="text" id="planName" name="name" value="<?= e($planFormState['values']['name']) ?>" placeholder="Jordan Strong" required />
                </label>
                <label class="input-field" for="planEmail">
                    <span>Email</span>
                    <input type="email" id="planEmail" name="email" value="<?= e($planFormState['values']['email']) ?>" placeholder="you@email.com" required />
                </label>
                <label class="input-field" for="planSelect">
                    <span>Plan of interest</span>
                    <select id="planSelect" name="plan" required>
                        <?php foreach ($siteData['plans'] as $plan): ?>
                            <option value="<?= e($plan['tier']) ?>"<?= $planFormState['values']['plan'] === $plan['tier'] ? ' selected' : '' ?>>
                                <?= e($plan['tier']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="input-field" for="planGoal">
                    <span>Primary goal</span>
                    <textarea id="planGoal" name="goal" placeholder="Share a quick win you are chasing" required><?= e($planFormState['values']['goal']) ?></textarea>
                </label>
                <button class="btn" type="submit">Send request</button>
            </form>
        </div>
    </section>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
<?php include __DIR__ . '/partials/site-foot.php'; ?>
