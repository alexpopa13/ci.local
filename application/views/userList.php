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
