// Throughout the admin I chose to use slow animations to make it clear that stuff is being hidden or shown depending on settings.
jQuery(document).ready(function() {
  jQuery('.show_list').change(function() {
    if (jQuery('.show_list:checked').length == 0) {
      jQuery('.content_placement').hide('slow');
      jQuery('.content_placement input').attr('disabled','disabled');
      jQuery('.show_template').attr('checked', 'checked');
    } else {
      jQuery('.show_template').attr('checked', false);
      jQuery('.content_placement').show('slow');
      jQuery('.content_placement input').removeAttr('disabled');
    }

    var postName = 'instaemail_option[show_on_posts]';
    var homeName = 'instaemail_option[show_on_homepage]';

    var optionName = jQuery(this).attr('name');
    if (optionName == homeName || optionName == postName){
      if(jQuery(this).is(':checked')) {
        jQuery('#etp-categories').show('slow');
      } else if(!jQuery('input[name="' + homeName + '"]').is(':checked')
                && !jQuery('input[name="' + postName + '"]').is(':checked')) {
        jQuery('#etp-categories').hide('slow');
      }
    }
  }).change();

  jQuery('.show_template').change(function() {
    if(jQuery(this).is(':checked')) {
      jQuery('.show_list').attr('checked', false);
      jQuery('.show_list').attr('disabled', 'disabled');
      jQuery('.content_placement').hide('slow');
      jQuery('.content_placement input').attr('disabled','disabled');
      jQuery('#etp-categories').hide('slow');
    } else {
      jQuery('.show_list').removeAttr('disabled');
    }
  }).change();

  jQuery('#toggle-categories').click(function() {
    if(jQuery('#etp-categories-metabox').is(':visible')) {
      jQuery('#etp-categories-metabox').hide('slow');
    } else {
      jQuery('#etp-categories-metabox').show('slow');
    }
  });

  jQuery(document).mouseup(function (e) {
    var container = jQuery("#etp-categories");

    if (container.has(e.target).length === 0) {
      jQuery('#etp-categories-metabox').hide('slow');
    }
  });


  jQuery('#colorSelector').ColorPicker({
    color: jQuery('#text_color').val(),
    onShow: function (colpkr) {
      jQuery(colpkr).fadeIn(500);
      return false;
    },
    onHide: function (colpkr) {
      jQuery(colpkr).fadeOut(500);
      return false;
    },
    onChange: function (hsb, hex, rgb) {
      jQuery('#colorSelector div').css('backgroundColor', '#' + hex);
      jQuery('#text_color').val('#' + hex);
      jQuery('.printfriendly-text2').css('color','#' + hex);
    }
  });

  jQuery('#text_size').change(function(){
    size = jQuery('#text_size').val();
    jQuery('.printfriendly-text2').css('font-size',parseInt(size));
  }).change();

  jQuery('#css input').change(function() {
    if(jQuery(this).attr('checked')) {
      jQuery(this).val('off');
      jQuery('#margin, #txt-color, #txt-size').hide('slow');
      pf_reset_style();
    } else {
      jQuery(this).val('on');
      jQuery('#margin, #txt-color, #txt-size').show('slow');
      pf_apply_style();
    }
  }).change();

  jQuery('#custom_text').change(function(){
    pf_custom_text_change();
  }).change();

  jQuery('#custom_text').keyup(function(){
    pf_custom_text_change();
  });

  function pf_custom_text_change(){
    jQuery('#button-style span.printfriendly-text2').text( jQuery('#custom_text').val() );
  }

  function pf_initialize_preview(urlInputSelector, previewSelector) {
    var el = jQuery(urlInputSelector);
    var preview = jQuery(previewSelector + '-preview');
    var error = jQuery(previewSelector + '-error');
    el.bind('input paste change keyup', function() {
      setTimeout(function() {
        var img = jQuery('<img />').on('error', function() {
          preview.html('');
          if(img.attr('src') != '') {
            error.html('<div class="error settings-error"><p><strong>Invalid Image URL</strong></p></div>');
          }
        }).attr('src', jQuery.trim(el.val()));
        error.html('');
        preview.html('').append(img);
      }, 100);
    });
  }

  pf_initialize_preview('#custom_image', '#pf-custom-button');
  pf_initialize_preview('#upload-an-image', '#pf-image');
  jQuery('#custom_image, #upload-an-image').change();
  jQuery('#custom_image').bind('focus', function() {
    jQuery('#custom-image').attr('checked', 'checked');
    jQuery('#pf-custom-button-error').show();
  });
  jQuery('#button-style input.radio').bind('change', function() {
    if(jQuery('#custom-image').attr('checked')) {
      jQuery('#pf-custom-button-error').show();
    } else {
      jQuery('#pf-custom-button-error').hide();
    }
  }).change();

  function pf_reset_style() {
    console.log('reseting styles');
    jQuery('.printfriendly-text2').css('font-size',14);
    jQuery('.printfriendly-text2').css('color','#000000');
  }

  function pf_apply_style() {
    jQuery('.printfriendly-text2').css('color', jQuery('#text_color').val() );
    size = jQuery('#text_size').val();
    jQuery('.printfriendly-text2').css('font-size',parseInt(size));
  }

  // postboxes setup
  jQuery('.if-js-closed').removeClass('if-js-closed').addClass('closed');

  // categories checkboxes
  var category_ids = jQuery('#category_ids').val().split(',');
  if(category_ids[0] == 'all') {
    var ids = [];
    jQuery('#categorydiv :checkbox').each(function() {
      jQuery(this).attr('checked', 'checked');
    });
    jQuery('#category-all :checkbox').each(function() {
      ids.push(jQuery(this).val());
    });
    // for older wp versions we do not have per category settings so
    // ids array will be empty and in that case we shouldn't replace 'all'
    if(ids.length != 0) {
      jQuery('#category_ids').val(ids.join(','));
    }
  } else {

    jQuery('#categorydiv :checkbox').each(function() {
      if(jQuery.inArray(jQuery(this).val(), category_ids) != -1) {
        jQuery(this).attr('checked', 'checked');
      }
    });
  }

  jQuery('#categorydiv :checkbox').click(function() {
    var values = jQuery('#category_ids').val();
    var ids = [];
    if(values != '')
      ids = values.split(',');

    var id = jQuery(this).val();

    if(jQuery(this).is(':checked'))
      ids.push(id);
    else {
      ids = jQuery.grep(ids, function(value) {
        return value != id;
      });
    }

    jQuery('#category_ids').val(ids.join(','));
  });

});
