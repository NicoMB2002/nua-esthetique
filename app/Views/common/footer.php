<footer class="footer">
  <div class="footer-container">

    <div class="footer-logo">
      <img src="<?= APP_BASE_URL?>/public/assets/resources/images/NuaLogoShort.png" alt="Nua Salon Logo" width="150" height="150" class="me-2">
      <p>Nua Salon D'esthetique</p>
    </div>

    <div class="footer-contact">
      <h4><?= trans('footer.contact'); ?></h4>
      <p>2114 Rue Jean Talon<br>Montreal, QC, H2E 1V3</p>
      <p>438-922-1682<br><a href="mailto:info@nuaesthetique.com">info@nuaesthetique.com</a></p>
    </div>

    <div class="footer-links">
      <h4><?= trans('footer.links'); ?></h4>
      <ul>
        <li><a href="#"><?= trans('footer.refund'); ?></a></li>
        <li><a href="#"><?= trans('footer.services'); ?></a></li>
        <li><a href="#"><?= trans('footer.shipping'); ?></a></li>
        <li><a href="#"><?= trans('footer.return'); ?></a></li>
      </ul>
    </div>

    <div class="footer-newsletter">
      <h4><?= trans('footer.newsletter'); ?></h4>
      <form>
        <input type="email" placeholder="<?= trans('footer.enter_email'); ?>">
        <button type="submit"><?= trans('footer.subscribe'); ?></button>
      </form>
    </div>

  </div>

  <div class="footer-bottom">
    <hr>
    <p>© 2025 Nua Salon D’esthetique</p>
  </div>
</footer>

