<?php
require_once 'includes/config.php';
require_once 'includes/connection.php';
require_once 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/layouts/header.php' ?>
<body>
<?php require_once 'includes/layouts/navigation.php'; ?>
<main role="main">
    <section class="section-employees mt-3">
        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4">Hello, world!</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div>
    </section>
</main>
<?php
require_once 'includes/layouts/footer.php';
require_once 'includes/layouts/scripts.php';
?>
</body>
</html>
