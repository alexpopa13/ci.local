<table class="table" id="userListTable">
    <thead>
        <tr>
            <th id="id">
                #
                <i class="fa fa-sort"></i>
            </th>
            <th id="firstname">
                First Name
                <i class="fa fa-sort"></i>
            </th>
            <th id="lastname">
                Last Name
                <i class="fa fa-sort"></i>
            </th>
            <th id="username">
                Username
                <i class="fa fa-sort"></i>
            </th>
            <th id="email">
                Email
                <i class="fa fa-sort"></i>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $user) :
            ?>
            <tr>
                <th scope="row"><?php echo $user->id ?></th>
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