<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <h1>Welcome to <?= ucfirst($user) ?> Dashboard</h1>
    </div>
</section>
<?= $this->endSection() ?>
