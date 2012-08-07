//$(document).on("click", "a[data-pjax]", function(e) {
//  e.preventDefault();
//
//  var el = $(this);
//
//  $.pjax({
//    url: el.attr('href'),
//    container: el.data('pjax')
//  });
//});

$(document).on('ready pjax:success', function() {

  $('a[data-pjax]').pjax();

  /* PARSE THE CHECKIN LISTS FOR PRETTIER DISPLAY */

  var addCheckinClasses = function() {
    $("h2:contains('Get Done')").next('ul').addClass('getdone');
    $("h2:contains('Got Done')").next('ul').addClass('gotdone');
  };


  var applyFlags = function(){
    var applyFlag = function(color) {
      var firstLetter = color.charAt(0);
      var reg = new RegExp("^(" + color + "|" + firstLetter + "):", 'i');
      var flags = flagList.find('li').filter(function(ind){
        if ( reg.test($(this).text()) ) {
          var newText = $(this).text().replace(reg, '<span class="flag ' + color + '">⚑</span>');
          $(this).html(newText).addClass(color);
        }
      });
    };

    var flagList = $("h2:contains('Flags')").next('ul').addClass('flags');
    applyFlag('red');
    applyFlag('yellow');
    applyFlag('green');
  };

  var attachGetDoneHandlers = function() {
    $(".my-last-checkin h2:contains('Get Done')").next('ul').find('li').click(function(e){
      var gotDoneText = $(this).text();
      var existingCheckin = $('#checkintext').val();
      //I'm bored with RegEx for today. Let's use my old favorite split/join trick...
      var newText = existingCheckin.split("##Got Done").join("##Got Done\r\n" + gotDoneText);
      $('#checkintext').val(newText);
    });
  };

  addCheckinClasses();
  applyFlags();
  attachGetDoneHandlers();

  /* EDIT EXISTING CHECKINS */
  var currentEditText;

  var toggleEditControls = function(e){
    $(this).find('.editcheckin').toggleClass('sneaky');
  };

  $('.my-last-checkin').hover(toggleEditControls, toggleEditControls);


  var toggleEdit = function($checkin){
    $checkin.find('.checkinform, .body, .startedit, .endedit').toggleClass('sneaky');
  };

  $('.startedit').click(function(e){
    e.preventDefault();
    var $checkin = $(this).closest('.checkin');
    currentEditText = $.trim($checkin.find('.editcheckinarea').val());
    toggleEdit($checkin);
  });

  $('.endedit').click(function(e){
    e.preventDefault();
    var $checkin = $(this).closest('.checkin');
    var newText = $checkin.find('.editcheckinarea').val();
    if ($.trim(newText) != currentEditText) {
      $.post("/checkins/" + $checkin.data('id'), {_method:"put", id:$checkin.data('id'), checkintext:newText}, function(data){
        $checkin.find('.body').html(data);
        addCheckinClasses();
        applyFlags();
        attachGetDoneHandlers();
      });
    }
    toggleEdit($checkin);
  });

  /* HIDE/SHOW OLDER CHECKINS */

  var toggleShowCheckins = function(e){
    $('#mymorecheckins, #showmorecheckins, #hidemorecheckins').toggleClass('sneaky');
  };

  $('#showmorecheckins, #hidemorecheckins').click(function(e){
    e.preventDefault();
    toggleShowCheckins();
  });

  /* HIDE/SHOW CHECKIN TIPS */

  var toggleShowTips = function(e){
    $('.showtipslinks a, #checkintips, .my-last-checkin').toggleClass('sneaky');
  };

  $('.showtipslinks a').click(function(e){
    e.preventDefault();
    toggleShowTips();
  });

  $('a[data-confirm]').click(function(e){
    e.preventDefault();
    var el = $(this);
    if (confirm(el.data('confirm'))) {
      window.location = el.attr('href');
    }
  });

  /* AUTO-SAVE THE TEXTAREA TO LOCAL STORAGE */
  $('#checkinform').sisyphus({customKeyPrefix: 'morning', timeout: 3});

});