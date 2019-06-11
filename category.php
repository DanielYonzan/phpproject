<?php 
require_once "admin/class/category.class.php";
$id=$_GET['catid'];
$category = new Category();
$category->id=$id;
$cname = $category->getCategoryName();//For breadcrumb i.e; internal navigation (You Are Here » Home » Education)
$title = $cname[0]->name;
require_once 'header.php'; 

$news->set('category_id',$id);
$index = 0;
if (isset($_GET['page'])) {
  $index = ($_GET['page']- 1) * 2;
}
$cnews = $news->getNewsByCategoryID($index);

$tnews = $news->getTotalNewsByCategoryID();

?>

<div class="wrapper">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="index.php">Home</a></li>
      <li>&#187;</li>
      <li class="current"><a href="#"><?php echo $cname[0]->name ?></a></li>
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
        <?php for($i=1;$i<=ceil($tnews[0]->total/2);$i++){
          echo "<a href='category.php?catid=$_GET[catid]&page=$i'>$i</a>";
          } ?>
        <div class="clear"></div>
      </div>
    </div>
  </div>

  <?php require_once 'footer.php' ?>