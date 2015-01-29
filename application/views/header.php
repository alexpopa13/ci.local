<?php if ($this->session->userdata('logged_in')) : ?>
    Logged in as: <?php echo anchor('user/logout', $this->session->userdata('logged_in')['username']); ?>
<?php else : ?>
    Please login in order to proceed:
<?php endif; ?>