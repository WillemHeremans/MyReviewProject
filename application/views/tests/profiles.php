<h2><?php echo $title; ?></h2>

<?php foreach ($profiles as $profiles_item): ?>

        <h3>
                <?php echo $profiles_item['pseudo']; ?>
                <?php if ($profiles_item['gender']=="male") {
                        echo $profiles_item['gender'];
                } else {
                        echo "lol";
                }
                  ?>
        </h3>
        <div class="main">
                <?php echo $profiles_item['age']; ?>
                <?php echo $profiles_item['pref_1']; ?>
                <?php echo $profiles_item['pref_2']; ?>
                <?php echo $profiles_item['pref_3']; ?>
                <?php echo $profiles_item['pref_4']; ?>
                <?php echo $profiles_item['pref_5']; ?>
        </div>
        <!-- <p><a href="<?php echo site_url('/news/'.$news_item['slug']); ?>">View article</a></p> -->

<?php endforeach; ?>
