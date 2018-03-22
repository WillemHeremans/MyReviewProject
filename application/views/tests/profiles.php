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
<style> .well:hover {
background-color:#29c19c;;
}
</style>
<body>
    
<div class="container">
        <div class="row">

        <?php foreach ($profiles as $profiles_item): ?>
                <!--Card-->
                <a href="#aboutModal" data-toggle="modal" data-target="#<?php echo $profiles_item['pseudo']; ?>">
                <div class="span3 well col-xs-12 col-sm-6 col-md-3">
                        <center>
                        <img src=<?php if ($profiles_item['gender']==="male") {
                        echo "https://stroops.com/wp-content/uploads/2016/11/placeholder-profile-male-500x500.png";
                        $sexe="https://stroops.com/wp-content/uploads/2016/11/placeholder-profile-male-500x500.png";
                } else {
                        echo "https://vignette.wikia.nocookie.net/strangerthings8338/images/e/ee/JaneDoeP.jpg/revision/latest?cb=20160717214233";
                        $sexe = "https://vignette.wikia.nocookie.net/strangerthings8338/images/e/ee/JaneDoeP.jpg/revision/latest?cb=20160717214233";
                }
                  ?> name="aboutme" width="140" height="140" class="img-circle">
                        <h3><?php echo $profiles_item['pseudo']; ?></h3>
                        <em><?php echo $profiles_item['age']; ?></em>
                                </center>
                </div>
                </a>
                <!-- Modal -->
                <div class="modal fade" id="<?php echo $profiles_item['pseudo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title" id="myModalLabel">More About <?php echo $profiles_item['pseudo']; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                                <center>
                                                <img src=<?php echo $sexe ?> name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                                                <h3 class="media-heading"><?php echo $profiles_item['pseudo']; ?> <small><?php echo $profiles_item['gender']; ?></small></h3>
                                                <span><strong>Skills: </strong></span>
                                                        <span class="label label-warning">HTML5/CSS</span>
                                                        <span class="label label-info">Adobe CS 5.5</span>
                                                        <span class="label label-info">Microsoft Office</span>
                                                        <span class="label label-success">Windows XP, Vista, 7</span>
                                                </center>
                                                <hr>
                                                <center>
                                                <p class="text-left"><strong>Bio: </strong><br>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
                                                <br>
                                                </center>
                                        </div>
                                        <div class="modal-footer">
                                                <center>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">I've heard enough about <?php echo $profiles_item['pseudo']; ?></button>
                                                <button type="button" class="btn btn-default">Go to my profile</button>
                                                </center>
                                        </div>
                                </div>
                        </div>
                </div>
                <?php endforeach; ?>
        </div>
</div>