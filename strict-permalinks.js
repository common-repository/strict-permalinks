jQuery(document).ready(function($) {
  var prefix = $('#sample-permalink');
  var edit = $('#edit-slug-buttons');
  var feedback = $('#strict-permalinks-feedback');
  if ($('#original_post_status')[0].value == 'publish') {
    if (prefix && edit &&
        prefix.text().substr(0, 7) == 'http://') {
      prefix.html(prefix.text());
      edit.css('display', 'none');
      feedback.html('Permalink editing is <strong>disabled</strong> by the Strict Permalinks plugin. If you really want to update the permalink, unpublish the post first.');
    } else if (!document.getElementById('change-permalinks')) {
      feedback.html('Whoops, Strict Permalinks was unable to disable permalink editing. Most likely the admin page structure has changed and the plugin needs to be updated.');
    } else {
      feedback.html('To edit permalinks you must first <a href="options-permalink.php" target="_blank">change the permalink settings</a>.');
    }
  } else {
    feedback.html('Permalink editing is <strong>enabled</strong> until you publish this post.');
  }
});
