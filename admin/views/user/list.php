<?php
/* @var $this yii\web\View */

$this->title = 'My Profile';
//echo "<pre>"; print_r($result); echo "</pre>";
$count = 1;
?>
<div class="box">
<div class="box-header with-border">
    <h3 class="box-title">Users List</h3>
</div>
<!-- /.box-header -->
<div class="box-body no-padding">
    <?php if (count($result)>0) { ?>
    <table class="table table-striped">
        <tr>
            <th style="width: 10px">#</th>
            <th>Username</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($result as $res) { ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $res['email']; ?></td>
            <td><?php echo $res['username']; ?></td>
            <td>
                <?php echo $res['first_name']; ?>
            </td>
            <td><?php echo $res['last_name']; ?></td>
            <td><?php echo $res['status']; ?></td>
            <td></td>
        </tr>
    <?php $count++; } } else { ?>
        <p>No result found.</p>
    <?php } ?>
    </table>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
        <li><a>&laquo;</a></li>
        <li><a>1</a></li>
        <li><a>&raquo;</a></li>
    </ul>
</div>
</div>
