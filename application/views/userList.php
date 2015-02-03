<table class="table" id="userListTable">
    <thead>
        <tr>
            <th id="numberCrt">#</th>
            <th id="firstname">First Name</th>
            <th id="lastname">Last Name</th>
            <th id="username">Username</th>
            <th id="email">Email</th>
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
                <td><?php echo $user->email ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#user-list" data-remote="addNewUser">
    Add new user
</button>

<div class="modal fade" id="user-list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>