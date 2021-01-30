<!-- This is the contact us form -->
<section class="contactus">
  <h2>Contact Us</h2>
  <p>Please fill out your contact details and your question below and we shall get back to you promptly!</p>
  <?php if($missingFields): ?>
  <p class="error">Please supply the missing information.</p>
  <?php endif; ?>
  <form method="post" id="contact-form">
    <fieldset>
      <legend>Contact Us Form</legend>
      <p>
        <label for="firstName" <?= validateField("firstName", $missingFields) ?>>First name &#42;:</label>
        <input type="text" name="firstName" id="firstName" value="<?= setValue("firstName") ?>" required>
      </p>
      <p>
        <label for="lastName" <?= validateField("lastName", $missingFields) ?>>Last name &#42;:</label>
        <input type="text" name="lastName" id="lastName" value="<?= setValue("lastName") ?>" required>
      </p>
      <p>
        <label for="phone">Contact Number:</label>
        <input type="text" name="phone" id="phone" value="<?= setValue("phone") ?>">
      </p>
      <p>
        <label for="email" <?= validateField("email", $missingFields) ?>>Contact Email &#42;:</label>
        <input type="email" name="email" id="email" value="<?= setValue("email") ?>" required>
      </p>
      <p>
        <label for="question" <?= validateField("question", $missingFields) ?>>Your Question &#42;:</label>
        <textarea name="question" id="question" rows="6" cols="50" required><?= setValue("question") ?></textarea>
      </p>
    </fieldset>
    <div class="formbutton clearfix">
        <input type="submit" name="submitButton" id="submitButton" value="Ask us!">
        <input type="reset" name="resetButton" id="resetButton" value="Start over">
    </div>
  </form>
</section>
