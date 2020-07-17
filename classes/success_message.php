<!-- success message if no errors on the form-->
<?php  if (isset($_POST['submit']) && count($errors) < 1) : ?>
    <div class="success">
            <p><?php echo "Thank you! Data has been submitted."; ?></p>
    </div>
<?php  endif ?>
