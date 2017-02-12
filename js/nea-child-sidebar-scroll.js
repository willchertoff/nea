jQuery(document).ready(function ($) {

    $.each($('h3,h1'), function() {
      var toAdd = $(this).html().replace(/ /g,'-').toLowerCase();
      toAdd = toAdd.replace(/[?!:]/g,'');
      $(this).addClass(toAdd);
      $('#sidebar ul').append('<li id="'+toAdd+'" class="sidebar-menu-item"><a name="toAdd" href="#">'+$(this).html()+'</a></li>');
      var waypoints = $(this).waypoint({
        handler: function() {
          console.log(this.element.innerHTML);
          id = this.element.innerHTML.toLowerCase().replace(/ /g,'-');
          id = id.replace(/[?!:]/g,'');
          $('.sidebar-menu-item').removeClass('active');
          $('#'+id).addClass('active');
        },
        offset: '50%'
      })
    });

    $('.sidebar-menu-item').click(function(e) {
      e.preventDefault();
      $('html, body').animate({
        scrollTop: $('.'+$(this).attr('id')).offset().top - $('#long-form-body').offset().top
    }, 1000);
    });

      var waypoints = $('#sidebar-dummy').waypoint({
        handler: function(direction) {
          if (direction === 'down') {
            $('#sidebar').addClass('fixed')
            $('#sidebar').css('top','0');
          } else {
            $('#sidebar').removeClass('fixed');
          }
        },
      })

});
