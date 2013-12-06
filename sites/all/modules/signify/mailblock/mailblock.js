Drupal.behaviors.mailblockBehavior = function (context) {
  // Hide the 'white list' and 'deliver to site domain' fieldsets
  // if the 'force' option is enabled.
  options = $('#edit-mailblock-whitelist-wrapper, #edit-mailblock-deliver-to-site-domain-wrapper');
  if ($('#edit-mailblock-force').attr('checked')) {
    options.hide();
  }
  $('#edit-mailblock-force').change(function(){
    options.toggle('fast');
  });
};
