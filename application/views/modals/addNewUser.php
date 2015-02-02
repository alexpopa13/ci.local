<div class="modal-header">
    <button id="closemodal" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Add new user</h4>
</div>
<?php echo form_open("user/addNewUser", "id=addNewUser"); ?>
<div class="modal-body">
    <div class="input-group input-group-sm">
        <?php
        $fields['username']['value'] = set_value('username');
        echo form_input($fields['username']);
        ?>
    </div>
    <?php
    if (form_error('username'))
        echo form_error('username');
    ?>
    <div class="input-group input-group-sm">
        <?php
        $fields['firstname']['value'] = set_value('firstname');
        echo form_input($fields['firstname']);
        ?>
    </div>
    <?php
    if (form_error('firstname'))
        echo form_error('firstname');
    ?>
    <div class="input-group input-group-sm">
        <?php
        $fields['lastname']['value'] = set_value('lastname');
        echo form_input($fields['lastname']);
        ?>
    </div>
    <?php
    if (form_error('lastname'))
        echo form_error('lastname');
    ?>
    <div class="input-group input-group-sm">
        <?php
        $fields['email']['value'] = set_value('email');
        echo form_input($fields['email']);
        ?>
    </div>
    <?php
    if (form_error('email'))
        echo form_error('email');
    ?>
</div>
<div class="modal-footer">
    <?php echo form_button($fields['submit']); ?>
</div>
<?php echo form_close(); ?>