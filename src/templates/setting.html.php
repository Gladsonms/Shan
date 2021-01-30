<div class="col-lg-6">
  <h1>Setting</h1>
  <fieldset>
    <legend>Change password</legend>
    <form action="changePassword.php" method="post" id="change-password">
      <div class="form-group">
        <label for="old_password">Current password</label>
        <input class="form-control" type="password" name="old_password" id="old-password" required>
      </div>
      <div class="form-group">
        <label for="new_password">New password</label>
        <input class="form-control" type="password" name="new_password" id="new-password" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Re-enter new password</label>
        <input class="form-control" type="password" name="confirm_password" id="confirm-password" required>
      </div>
      <input class="btn btn-default" type="submit" id="Submit" value="Change my password">
    </form>
  </fieldset>
  <p><?= $message ?></p>
  <br>
  <fieldset>
    <legend>Change theme</legend>
  </fieldset>
</div>
