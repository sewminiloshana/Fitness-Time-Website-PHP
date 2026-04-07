<?php
session_start();

// Database connection
$host = "localhost";
$dbname = "my_gim";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$regError = $loginError = "";

if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $goal = trim($_POST['goal']);

    // Validation
    if (!$name || !$email || !$password || !$goal) {
        $regError = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $regError = "Invalid email format!";
    } elseif (strlen($password) < 8) {
        $regError = "Password must be at least 8 characters!";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("INSERT INTO users (name,email,password,goal) VALUES (:name,:email,:password,:goal)");
            $stmt->execute([
                ':name'=>$name,
                ':email'=>$email,
                ':password'=>$hashedPassword,
                ':goal'=>$goal
            ]);

            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_name'] = $name;
            $_SESSION['user_email'] = $email;

            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) $regError = "Email already registered!";
            else $regError = "Something went wrong. Try again!";
        }
    }
}

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!$email || !$password) {
        $loginError = "Both fields are required!";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute([':email'=>$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password,$user['password'])) {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            header("Location: index.php");
            exit;
        } else {
            $loginError = "Invalid email or password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gym Auth</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Inter',sans-serif;}
body{
  background: url('backp1.jpg') no-repeat center center fixed;
  background-size: cover;
  min-height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
}

/* Container */
.container{
  width:100%;
  max-width:520px;
  background:#1c1c2d;
  border-radius:22px;
  padding:60px 50px;
  box-shadow:0 10px 30px rgba(0,0,0,0.7);
  position:relative;
}

/* Header */
.header{
  display:flex;
  justify-content:center;
  align-items:center;
  margin-bottom:35px;
  gap:20px;
}
.header button{
  flex:1;
  padding:16px;
  border:none;
  border-radius:14px;
  background:#2b2f48;
  color:#fff;
  font-weight:600;
  cursor:pointer;
  font-size:17px;
  transition: all 0.2s ease;
}
.header button.active{
  background:#1abc9c;
  color:#fff;
}
.header button:hover:not(.active){
  background:#3a3e60;
}

/* Forms */
form{
  display:flex;
  flex-direction:column;
  transition: all 0.3s ease;
  opacity:1;
}
form.hidden{
  opacity:0;
  transform:translateY(15px);
  position:absolute;
  top:70px;
  left:0;
  width:100%;
  pointer-events:none;
}

input, select{
  padding:18px;
  margin-bottom:20px;
  border-radius:14px;
  border:none;
  background:#2b2f48;
  color:#fff;
  font-size:17px;
}
input::placeholder{color:#ccc;}
select{color:#fff;}
input:focus, select:focus{
  outline:none;
  background:#353a60;
}

/* Submit */
button.submit-btn{
  padding:18px;
  border:none;
  border-radius:14px;
  font-size:17px;
  font-weight:600;
  cursor:pointer;
  background:#1abc9c;
  color:#fff;
  transition: all 0.2s ease;
}
button.submit-btn:hover{
  background:#16a085;
}

/* Error Alerts */
.alert{
  padding:14px;
  margin-bottom:20px;
  border-radius:10px;
  text-align:center;
  font-weight:600;
  font-size:15px;
  background:#ff4d4d;
  color:#fff;
}

/* Responsive */
@media(max-width:480px){.container{padding:45px 25px;}}
</style>
</head>
<body>
<div class="container">
  <div class="header">
    <button id="registerBtn" class="active" onclick="showForm('register')">Register</button>
    <button id="loginBtn" onclick="showForm('login')">Login</button>
  </div>

  <!-- Register -->
  <form id="registerForm" method="POST">
    <?php if($regError) echo "<div class='alert'>$regError</div>"; ?>
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password (min 8 chars)" minlength="8" required>
    <select name="goal" required>
      <option value="" disabled selected>Select Goal</option>
      <option value="strength">Gain strength</option>
      <option value="weight-loss">Lose weight</option>
      <option value="performance">Boost performance</option>
      <option value="wellness">Feel healthier</option>
    </select>
    <button type="submit" name="register" class="submit-btn">Register</button>
  </form>

  <!-- Login -->
  <form id="loginForm" class="hidden" method="POST">
    <?php if($loginError) echo "<div class='alert'>$loginError</div>"; ?>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login" class="submit-btn">Login</button>
  </form>
</div>

<script>
function showForm(form){
    const regForm = document.getElementById('registerForm');
    const logForm = document.getElementById('loginForm');
    const regBtn = document.getElementById('registerBtn');
    const logBtn = document.getElementById('loginBtn');

    if(form==='register'){
        regForm.classList.remove('hidden');
        logForm.classList.add('hidden');
        regBtn.classList.add('active');
        logBtn.classList.remove('active');
    } else {
        logForm.classList.remove('hidden');
        regForm.classList.add('hidden');
        logBtn.classList.add('active');
        regBtn.classList.remove('active');
    }
}
</script>
</body>
</html>
