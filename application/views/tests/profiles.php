<!-- <h2><?php echo $title; ?></h2> -->
<h1>Heyyyyy</h1>

<?php foreach ($profiles as $profiles_item): ?>

        <h3><?php echo $profiles_item['pseudo']; ?></h3>
        <div class="main">
                <?php echo $profiles_item['age']; ?>
        </div>
        <!-- <p><a href="<?php echo site_url('/news/'.$news_item['slug']); ?>">View article</a></p> -->

<?php endforeach; ?>