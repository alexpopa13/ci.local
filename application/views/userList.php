<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $index = 1;
        foreach ($users as $user) :
            ?>
            <tr>
                <th scope="row"><?php echo $index++; ?></th>
                <td><?php echo $user->firstname ?></td>
                <td><?php echo $user->lastname ?></td>
                <td><?php echo $user->username ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#user-list" data-remote="addNewUser">
    Add new user
</button>
<!--<a href="addNewUser">Add new user</a>-->

<div class="modal fade" id="user-list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>