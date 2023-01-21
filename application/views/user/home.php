<?php include "header.php"; ?>
<!-- Search Section -->
<section class="container-xl text-center">
<div class="row">
    <div class="cont col-12 col-md-6">
    <form class="form" action="<?php echo base_url('main/search'); ?>" method="GET">
        <div class="mb-3">
                <a class="btn navbar-brand text-primary btn-light mb-2" href="<?php echo base_url('main'); ?>">
                <img src="https://img.icons8.com/nolan/96/note.png"/></a>
                <h2>Notes Sharing Club</h2>
            <input type="text" class="form-control" placeholder="Search" name="search">
        </div>
        <input class="btn btn-lg btn-light" type="submit"></input>
    </form>
    </div>
</div>
</section>
<?php include "footer.php"; ?>