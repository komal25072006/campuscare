<?php
$categories = [
    'Academic',
    'Facilities',
    'Harassment or discrimination',
    'Technology',
    'Other'
];

$values = [
    'student_name' => '',
    'student_id' => '',
    'email' => '',
    'department' => '',
    'category' => '',
    'subject' => '',
    'description' => ''
];
$errors = [];
$success = isset($_GET['submitted']) && $_GET['submitted'] === '1';

function escapeHtml($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $field => $value) {
        $values[$field] = trim($_POST[$field] ?? '');
    }

    foreach (['student_name', 'student_id', 'email', 'department', 'category', 'subject', 'description'] as $field) {
        if ($values[$field] === '') {
            $errors[$field] = 'Please complete this field.';
        }
    }

    if ($values['email'] !== '' && !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    if ($values['category'] !== '' && !in_array($values['category'], $categories, true)) {
        $errors['category'] = 'Please select a valid category.';
    }

    if (!$errors) {
        require_once __DIR__ . '/db.php';

        $statement = mysqli_prepare(
            $conn,
            'INSERT INTO complaints (student_name, student_id, email, department, category, subject, description)
             VALUES (?, ?, ?, ?, ?, ?, ?)'
        );

        if (!$statement) {
            error_log('CampusCare complaint prepare failed: ' . mysqli_error($conn));
            $errors['form'] = 'Your complaint could not be saved right now. Please try again later.';
        } else {
            mysqli_stmt_bind_param(
                $statement,
                'sssssss',
                $values['student_name'],
                $values['student_id'],
                $values['email'],
                $values['department'],
                $values['category'],
                $values['subject'],
                $values['description']
            );

            if (mysqli_stmt_execute($statement)) {
                mysqli_stmt_close($statement);
                header('Location: complaint.php?submitted=1');
                exit;
            }

            error_log('CampusCare complaint insert failed: ' . mysqli_stmt_error($statement));
            mysqli_stmt_close($statement);
            $errors['form'] = 'Your complaint could not be saved right now. Please try again later.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Share a concern with CampusCare and connect with your college support team.">
    <title>Register a Complaint | CampusCare</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/complaint.css">
</head>
<body>
    <header class="site-header">
        <nav class="complaint-navbar container" aria-label="Main navigation">
            <a class="brand" href="index.php" aria-label="CampusCare home">
                <span class="brand-mark" aria-hidden="true">C</span>
                <span>Campus<span class="brand-accent">Care</span></span>
            </a>
            <a class="complaint-home-link" href="index.php">&larr; Back to Home</a>
        </nav>
    </header>

    <main class="complaint-main">
        <div class="container complaint-container">
            <div class="complaint-heading">
                <span class="eyebrow eyebrow-blue">WE’RE HERE TO LISTEN</span>
                <h1>Register a complaint</h1>
                <p>Tell us what happened. Your college support team will use these details to understand your concern.</p>
            </div>

            <form class="complaint-form" action="complaint.php" method="post">
                <?php if ($success): ?>
                    <div class="form-message form-success" role="status">
                        Your complaint has been submitted. Thank you for letting us know.
                    </div>
                <?php endif; ?>

                <?php if (isset($errors['form'])): ?>
                    <div class="form-message form-error" role="alert">
                        <?php echo escapeHtml($errors['form']); ?>
                    </div>
                <?php endif; ?>

                <h2>Your details</h2>
                <div class="form-grid">
                    <div class="form-field">
                        <label for="student_name">Full name <span aria-hidden="true">*</span></label>
                        <input id="student_name" name="student_name" type="text" maxlength="100" autocomplete="name"
                               value="<?php echo escapeHtml($values['student_name']); ?>" required>
                        <?php if (isset($errors['student_name'])): ?><small class="field-error"><?php echo escapeHtml($errors['student_name']); ?></small><?php endif; ?>
                    </div>

                    <div class="form-field">
                        <label for="student_id">Student ID <span aria-hidden="true">*</span></label>
                        <input id="student_id" name="student_id" type="text" maxlength="50" autocomplete="off"
                               value="<?php echo escapeHtml($values['student_id']); ?>" required>
                        <?php if (isset($errors['student_id'])): ?><small class="field-error"><?php echo escapeHtml($errors['student_id']); ?></small><?php endif; ?>
                    </div>

                    <div class="form-field">
                        <label for="email">Email address <span aria-hidden="true">*</span></label>
                        <input id="email" name="email" type="email" maxlength="150" autocomplete="email"
                               value="<?php echo escapeHtml($values['email']); ?>" required>
                        <?php if (isset($errors['email'])): ?><small class="field-error"><?php echo escapeHtml($errors['email']); ?></small><?php endif; ?>
                    </div>

                    <div class="form-field">
                        <label for="department">Department <span aria-hidden="true">*</span></label>
                        <input id="department" name="department" type="text" maxlength="100" autocomplete="organization"
                               value="<?php echo escapeHtml($values['department']); ?>" required>
                        <?php if (isset($errors['department'])): ?><small class="field-error"><?php echo escapeHtml($errors['department']); ?></small><?php endif; ?>
                    </div>
                </div>

                <h2 class="complaint-details-heading">Complaint details</h2>
                <div class="form-grid">
                    <div class="form-field">
                        <label for="category">Category <span aria-hidden="true">*</span></label>
                        <select id="category" name="category" required>
                            <option value="">Choose a category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo escapeHtml($category); ?>" <?php echo $values['category'] === $category ? 'selected' : ''; ?>>
                                    <?php echo escapeHtml($category); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['category'])): ?><small class="field-error"><?php echo escapeHtml($errors['category']); ?></small><?php endif; ?>
                    </div>

                    <div class="form-field">
                        <label for="subject">Subject <span aria-hidden="true">*</span></label>
                        <input id="subject" name="subject" type="text" maxlength="200"
                               value="<?php echo escapeHtml($values['subject']); ?>" required>
                        <?php if (isset($errors['subject'])): ?><small class="field-error"><?php echo escapeHtml($errors['subject']); ?></small><?php endif; ?>
                    </div>

                    <div class="form-field form-field-full">
                        <label for="description">Describe your concern <span aria-hidden="true">*</span></label>
                        <textarea id="description" name="description" rows="6" required><?php echo escapeHtml($values['description']); ?></textarea>
                        <?php if (isset($errors['description'])): ?><small class="field-error"><?php echo escapeHtml($errors['description']); ?></small><?php endif; ?>
                    </div>
                </div>

                <div class="form-footer">
                    <p>Fields marked <span aria-hidden="true">*</span> are required.</p>
                    <button class="button button-primary" type="submit">
                        Submit Complaint <span aria-hidden="true">&rarr;</span>
                    </button>
                </div>
            </form>

            <p class="complaint-note">Your information will be shared with the college team responsible for responding to student concerns.</p>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container complaint-footer">
            <a class="brand footer-brand" href="index.php">
                <span class="brand-mark" aria-hidden="true">C</span>
                <span>Campus<span class="brand-accent">Care</span></span>
            </a>
            <p>Care begins when we listen.</p>
            <a class="back-to-top" href="index.php">Back to CampusCare <span aria-hidden="true">&rarr;</span></a>
        </div>
    </footer>
</body>
</html>
