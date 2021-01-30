<div class="col-lg-6">
  <h1>Settings</h1>
  <fieldset>
    <legend>Change Password</legend>
    <form action="settings.php" method="post" id="change-password">
      <div class="form-group">
        <label for="new_password">New Password:</label>
        <input class="form-control" type="password" name="newpassword" id="newpassword" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm New Password:</label>
        <input class="form-control" type="password" name="confirm_password" id="confirm-password" required>
      </div>
      <input class="btn btn-default" type="submit" id="Submit" value="Change My Password">
    </form>
  </fieldset>
  <p><?= $message ?></p>
  <br>
  <fieldset>
    <legend>Change Theme</legend>
    <form action="settings.php" method="post">
      <div class="form-group">
        <label for="theme">Pick Your Theme:</label>
        <select name="theme" class="form-control">
            <option value="plain">Plain</option>
            <?php if($theme == "cornsilk.css"): ?>
              <option value="cornsilk" selected>Cornsilk</option>
            <?php else: ?>
              <option value="cornsilk">Cornsilk</option>
            <?php endif;
            if($theme == "pink.css"): ?>  
              <option value="blanchedalmond" selected>Blanchedalmond</option>
            <?php else: ?>
            <option value="blanchedalmond">Blanchedalmond</option>
            <?php endif; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-default">Change My Theme</button>
    </form>
  </fieldset>
</div>
