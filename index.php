<?php 
require_once 'header.php'; 
$slidernews = $news->getSliderNews();
$latestnews = $news->getLatestNews();
?>

<div class="wrapper">
  <div class="container">
    <div class="content">
      <div id="featured_slide">
        <ul id="featurednews">
          <?php foreach ($slidernews as $sn) { ?>
            <li><img src="admin/images/<?php echo $sn->feature_image ?>" alt="<?php echo $sn->title ?>" />
            <div class="panel-overlay">
              <h2><?php echo substr($sn->title, 0, 60) ?></h2>
              <p><?php echo substr($sn->short_description, 0, 80).'...' ?><br />
                <a href="news.php?id=<?php echo $sn->id ?>">Continue Reading &raquo;</a></p>
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="column">
      <ul class="latestnews">
        <?php foreach ($latestnews as $ln) {?>
         <li><img src="admin/images/<?php echo $ln->feature_image ?>" width="100" height="100" alt="<?php echo $ln->title ?>" />
          <p><strong><a href="news.php?id=<?php echo $ln->id ?>"><?php echo substr($ln->title, 0, 40) ?></a></strong><br> <?php echo substr($ln->short_description, 0, 130).'...' ?></p>
        </li>
        <?php } ?>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="adblock">
    <div class="fl_left"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <div class="fl_right"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <br class="clear" />
  </div>
  <div id="hpage_cats">
    <?php $i=0; foreach ($catlist as $cl) { 
      
      $news->category_id=$cl->id;
      $fn=$news->getFeaturedNews();

      if($i%2==0){
        $c='fl_left';
      }else{
        $c='fl_right';
      }
      $i++;
      ?>
      <div class="<?php echo $c ?>">
      <h2><a href="category.php?catid=<?php echo $cl->id ?>"><?php echo $cl->name ?> &raquo;</a></h2>
      <img src="admin/images/<?php echo $fn[0]->feature_image ?>" width="100" height="100" alt="<?php echo $fn[0]->title ?>"/>
      <p><strong><a href="news.php?id=<?php echo $cl->id ?>"><?php echo $fn[0]->title ?></a></strong></p>
      <p><?php echo substr($fn[0]->short_description, 0, 280).'...' ?></p>
    </div>
    <?php } ?>
    <div class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <div id="hpage_latest">
        <h2>Feugiatrutrum rhoncus semper</h2>
        <ul>
          <li><img src="images/demo/190x130.gif" alt="" />
            <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
            <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
          </li>
          <li><img src="images/demo/190x130.gif" alt="" />
            <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
            <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
          </li>
          <li class="last"><img src="images/demo/190x130.gif" alt="" />
            <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
            <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
          </li>
        </ul>
        <br class="clear" />
      </div>
    </div>
    <div class="column">
      <div class="holder"><a href="#"><img src="images/demo/300x250.gif" alt="" /></a></div>
      <div class="holder"><a href="#"><img src="images/demo/300x80.gif" alt="" /></a></div>
    </div>
    <br class="clear" />
  </div>
</div>

<?php require_once 'footer.php' ?>