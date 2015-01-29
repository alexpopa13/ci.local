<?php echo form_open('user/login'); ?>
<div class="panel-body">
    <div class="input-group input-group-sm">
        <span class="input-group-addon" id="sizing-addon3">Please provide a valid username:</span>
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
        <span class="input-group-addon" id="sizing-addon3">Please provide a valid password: </span>
        <?php echo form_input($fields['password']); ?>
    </div>
    <?php
    if (form_error('password'))
        echo form_error('password');
    echo form_button($fields['submit']);
    ?>
</div>
<?php form_close(); ?>