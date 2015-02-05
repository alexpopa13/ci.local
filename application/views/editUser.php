<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<?php echo form_open("user/editUser", "id=editUser"); ?>
<div class="modal-body">
    <div class="input-group input-group-sm">
        <?php
        $fields['username']['value'] = $loggedUser["username"];
        echo form_input($fields['username']);
        ?>
    </div>
    <?php
    if (form_error('username'))
        echo form_error('username');
    ?>
    <div id="infoMessage"><?php echo $this->session->flashdata('message'); ?></div>
    <div class="input-group input-group-sm">
        <?php
        $fields['firstname']['value'] = $loggedUser["firstname"];
        echo form_input($fields['firstname']);
        ?>
    </div>
    <?php
    if (form_error('firstname'))
        echo form_error('firstname');
    ?>
    <div class="input-group input-group-sm">
        <?php
        $fields['lastname']['value'] = $loggedUser["lastname"];
        echo form_input($fields['lastname']);
        ?>
    </div>
    <?php
    if (form_error('lastname'))
        echo form_error('lastname');
    ?>
    <div class="input-group input-group-sm">
        <?php
        $fields['email']['value'] = $loggedUser["email"];
        echo form_input($fields['email']);

        $fields['id']['value'] = $loggedUser["id"];
        echo form_input($fields['id']);
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