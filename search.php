<?php 
require_once "admin/class/category.class.php";
$title = $_POST['search'];
require_once 'header.php'; 

$news->set('title',$_POST['search']);
$cnews = $news->getNewsBySearchTitle();

?>

<div class="wrapper">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="index.php">Home</a></li>
      <li>&#187;</li>
    
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">

    <div id="hpage_cats">
    <?php $i=0; foreach ($cnews as $cn) {

        if($i%2==0){
          $c='fl_left';
        }else{
          $c='fl_right';
        }
        $i++;
        ?>
        <div class="<?php echo $c ?>">
          <img src="admin/images/<?php echo $cn->feature_image ?>" width="100" height="100" alt="<?php echo $cn->title ?>">
          <p><strong><a href="news.php?id=<?php echo $cn->id ?>"><?php echo $cn->title ?></a></strong></p>
          <p><?php echo substr($cn->short_description, 0, 300).'...' ?></p>
        </div>
        <?php } ?>
        <div class="clear"></div>
      </div>
    </div>
  </div>

  <?php require_once 'footer.php' ?>