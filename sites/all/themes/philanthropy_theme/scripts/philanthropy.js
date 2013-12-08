// set variable to use to detect certain browsers
var ie6 = $('html').hasClass('ie6');
var ie7 = $('html').hasClass('ie7');

/*
 * Main Menu helpers
 */
function releaseDropdown() {
  $(this).parents('.expanded').removeClass('hover');
  $(this).parents('.expanded').children('a').removeClass('active-parent');
}

$(document).ready(function() {
  
  $('#edit-search-theme-form-1').inputLabel();
  // js moves label from above input to on top of it; 
  // this adjusts padding for the different vertical space when js is on
  $('#nav #search-theme-form').css('padding','0.9em 0');
  
  
  /*
   * Conference Programme show/hide functions
   */
  //Collapse/Expand day
  
  $('.view-conference-programme .view-header').each(function() {
    var day = $(this).find('h2 .title').text();
    $(this).append('<div class="drop"><div class="up"></div><p>Collapse ' + day + ' programme</p></div>');
  });

  $('.view-conference-programme .drop').click(function() {
    if($(this).children('div').hasClass('up')) {
      $(this).children('div').removeClass('up').addClass('down');
      var text = $(this).children('p').text().replace('Collapse', 'Expand');
      $(this).children('p').text(text)
    }
    else if ($(this).children('div').hasClass('down')) {
      $(this).children('div').removeClass('down').addClass('up');
      var text = $(this).children('p').text().replace('Expand', 'Collapse');
      $(this).children('p').text(text)
    }
  
    $programme = $(this).parent().next('.view-conference-programme .view-content');
    $programme.toggle('slow');
  });
  
  //Collapse/Expand events
  $('.view-conference-programme .views-row').each(function() {
    if($.trim($(this).find('.conf-body').text()) != '') {
      $(this).find('.views-field-body .abstract').prepend('<div class="sml-drop"><div class="plus"></div></div>');
      $(this).find('.conf-body').hide();
    }
  });
  
  $('.view-conference-programme .sml-drop').click(function() {
    if($(this).children('div').hasClass('plus')) {
      $(this).children('div').removeClass('plus').addClass('minus');
    }
    else if ($(this).children('div').hasClass('minus')) {
      $(this).children('div').removeClass('minus').addClass('plus');
    }
  
    $item = $(this).parent().parent().find('.conf-body');
    $item.toggle('slow');
  });
  
  var count = 1;
  //Collapse/Expand all
  $('.view-conference-programme .floatwrapper').each(function() {
    if($.trim($(this).find('.conf-body').text()) != '') {
      $(this).children('.views-row-1').after('<div class="expand" id="item-' + count + '">Expand all</div>');
      count += 1;
    } 
  });
   
  $('.view-conference-programme .floatwrapper .expand').click(function(event) {
      if($(this).find('.plus')) {
        if($('#' + event.target.id).text() == "Expand all"){
          $('#' + event.target.id).parent().find('.conf-body').show('slow');
          $('#' + event.target.id).parent().find('.plus').removeClass('plus').addClass('minus');
          $('#' + event.target.id).html("Collapse all");
        }
        else {
          $('#' + event.target.id).parent().find('.conf-body').hide('slow');
          $('#' + event.target.id).parent().find('.minus').removeClass('minus').addClass('plus');
          $('#' + event.target.id).html("Expand all");
        }
      } 
  }); 
  
  // highlight specific rows in table on programme page
  $('.highlight-row-on').parents('.floatwrapper').css("background-color", "#009ED5").css("color", "white");
  
  /*
   * Site Navigation
   */
  $('#site-nav li a').focus(
    // Maintain dropdown while tabbing through links
    function() {
      $(this).parents('.expanded')
        .addClass('hover')
        .children('a').addClass('active-parent');
      // stop focus sticking while link loads which avoids flickering issues with the dropdown
      $(this).mouseup(releaseDropdown);
    }
  );

  $('#site-nav li a').blur(releaseDropdown);

  // Maintain active state on parent when hovering on children
  $('#site-nav li.expanded').hover(
    function() {
      $(this).children('a').addClass('active-parent');    
    },
    function() {
      $(this).children('a').removeClass('active-parent');
    }
  );

  // Maintain active state on parent when viewing child
  $('#site-nav a.active').parents('.expanded').children('a').addClass('parent');
  $('#site-nav li.active-trail').children('a').addClass('parent');

  if (ie6){
  // Fix for lack of pseudo-selectors
    $('#site-nav li').hover(
      function() {
        $(this).addClass('hover');
      },
      function() {
        $(this).removeClass('hover');
      }
    );
    // bgiframe call to avoid z-index issues on dropdown
    $('#site-nav ul').bgiframe();
  }
  
  /*
   * ie selector helpers
   */
  if (ie6 || ie7){
    $('li:first-child').addClass('first');
    $('li:last-child').addClass('last');
    $('dd:first-child').addClass('first');
    $('dd:last-child').addClass('last');    
  }
  
  $('.page-conference #carousel').cycle({
    fx: 'fade'
  });
});




