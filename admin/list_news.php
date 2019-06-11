<?php require_once "header.php"; ?>

<?php
require_once "class/news.class.php";
$news = new News();
$data = $news->lists();

?>
  <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">News Management </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            News Listing
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="CategoryTable">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Category Name</th>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <!-- <th>Description</th> -->
                                        <th>Feature Image</th>
                                        <th>Slider Key</th>
                                        <th>Feature Key</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Modified By</th>
                                        <th>Created  Date</th>
                                        <th>Modified Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                               <?php $i = 1;foreach ($data as $d) { ?>
                                  <tr class="odd gradeX">
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $d->cname ?></td>
                                        <td><?php echo $d->title ?></td>
                                        <td><?php echo $d->short_description ?></td>
                                       <!--  <td><?php echo $d->description ?></td> -->
                                        <td><img src="images/<?php echo $d->feature_image ?>" class="img-responsive" alt="<?php echo $d->title ?>"></td>
                                        <td class="center"><?php if ($d->slider_key == 1) {
                                           echo "Yes";
                                        } else {
                                            echo "No";
                                            } ?>                                                
                                        </td>
                                        <td class="center"><?php if ($d->feature_key == 1) {
                                           echo "Yes";
                                        } else {
                                            echo "No";
                                            } ?>                                                
                                        </td>
                                        <td class="center"><?php if ($d->status == 1) {
                                           echo "<label class='label label-success'>Active</label>";
                                        } else {
                                            echo "<label class='label label-danger'>No</label>";
                                            } ?>                                                
                                        </td>
                                        <td class="center"><?php echo $d->created_by ?></td>
                                        <td><?php echo $d->modified_by ?></td>
                                        <td><?php echo $d->created_date ?></td>
                                        <td><?php echo $d->modified_date ?></td>
                                        <td><a href="edit_news.php?id=<?php echo $d->id ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a> <a href="delete_news.php?id=<?php echo $d->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i> Delete</a></td>
                                    </tr>
                               <?php } ?>
                                    
                               </tbody>
                            </table>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php require_once "footer.php"; ?>
 <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

     <script>
    $(document).ready(function() {
        $('#CategoryTable').DataTable({
            responsive: true
        });
    });
    </script>
