// open close sidebar menu
// var devWidth = $(window).width();


// open big img
$(document).on('click', '.image-small', function() {
  var srcImg = $(this).attr('data-image');
  addEllement(srcImg);
});

function addEllement(srcImg){
  var forImgBg = '<div class="_bg-for-img"><img src=' + srcImg + '></div>';
  var curentOpenImg = '.image-middle';
  $('body').append(forImgBg);
  $('._bg-for-img').click(function() {
    $('._bg-for-img').remove();
  });
}


function openSidebar (){

  var devWidth = $(window).width();

  if (devWidth > 1400) {
    $('.wrapper').removeClass('menu-open');
    $('.sidebar-toggle').click(function (){
      $('.wrapper').toggleClass('menu-close');
    })
  }
  if (devWidth < 1400){
    $('body').css({
      'overflow-x': 'hidden',
    });
    $('.wrapper').removeClass('menu-close');
    $('.sidebar-toggle').click(function (){
      $('.wrapper').toggleClass('menu-open');
    })
  }

}

$(window).on('load resize', openSidebar);


$('.ui-jqgrid-htable').addClass('table table-striped');
// this is just an example, remember to adapt the selectors to your code!
// @link http://stackoverflow.com/a/22264259
$(document).on('click', '[data-toggle="modal"]', function (e) {
	var elm = $(this);
	var modalSize = elm.data('size') || 'md';

	if (elm.hasClass('disabled')) {
		return false;
	}

	// @link http://stackoverflow.com/a/4158203
	var modal = $('<div/>', {
			'id': elm.data('target'),
			'class': 'modal fade',
			'tabindex': -1,
			'role': 'dialog',
			'aria-hidden': 'true',
			'data-select-to' : elm.data('select-to'),
			'data-refresh' : elm.data('refresh'),
			'data-context' : elm.data('context')
		}).appendTo('body'),

		modalDialog = $('<div/>', {
			'class': 'modal-dialog modal-' + modalSize,
			'role': 'document'
		}).appendTo(modal),

		modalContent = $('<div/>', {
			'class': 'modal-content'
		}).appendTo(modalDialog),

		modalHeader = jQuery('<div/>', {
			'class': 'modal-header'
		}).html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><h4 class="modal-title">' + elm.data('title') + '</h4>')
			.appendTo(modalContent),

		modalBody = jQuery('<div/>', {
			'class': 'modal-body'
		}).appendTo(modalContent),

		modalFooter = jQuery('<div/>', {
			'class': 'modal-footer'
		}).appendTo(modalContent),

		removeModal = function(evt) {      // Remove modal handler
			modal.off('hidden.bs.modal');  // Turn off 'hide' event
			modal.remove();                // Remove modal from DOM
		};

	modal.on('show.bs.modal', function () {
		var elm = $(e.currentTarget);

		//console.log(e.currentTarget);
		//console.log(e);
		//console.log(elm);
		//console.log(elm.data('body'));

		if (elm.data('href') && elm.data('href').length) {
			modalBody.load(elm.data('href'));
		} else if (elm.data('body') && elm.data('body').length) {
			modalBody.html(elm.data('body'));
		}

		/*if (elm.data('select-in') && elm.data('select-in').length) {

		}*/

		modal.on('hidden.bs.modal', removeModal);
	}).modal();

	e.preventDefault();
});

// Multiple modals
// @link http://stackoverflow.com/a/24914782
$(document).on('show.bs.modal', '.modal', function () {
	var zIndex = 1040 + (10 * $('.modal:visible').length);
	$(this).css('z-index', zIndex);
	setTimeout(function() {
		$('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
	}, 0);
});
$(document).on('hidden.bs.modal', '.modal', function () {
	$('.modal:visible').length && $(document.body).addClass('modal-open');
});
/**
 * Usage:
 * <div id="card-info" class="row row-buffer" data-href="/discount/card/5">some content here</div>
 * <script>
 * $('#card-info').trigger('refresh');
 * </script>
 */
// TODO: Говнокод!! Не знаю, як ще можна передати сюди id сутності, якщо trigger викликається не із модального вікна
$(document).on('refresh', function(e, extraParam) {

    var elm = $(e.target);
    var href = elm.data('href');
    if (undefined != extraParam) {
        href += '/' + extraParam;
    }

    var wildcard = [];
    $.each(elm.data('href-params'), function(key, value) {
        wildcard.push(key + '/' + value);
    });
    if (wildcard.length) {
        href += '/' + wildcard.join('/');
    }

    //console.log(href);
    // @todo Додати data-refresh-params щоб мати змогу передавати додаткові параметри
    // або навіть краще передавати урл поточної сторінки як context
    $.get(href, function(data) {
        elm.replaceWith(data);
    });
});
$(document).on('click', '[data-toggle="ajax"]', function (e) {

    var elm = $(this);

    if (elm.hasClass('disabled')) {
        return false;
    }

    var url = elm.data('href');
    // TODO: Трохи говнокоду. Доводиться форматувати в такий вигляд id, бо на стороні контролера очикується саме на такий вигляд
    var $sentData = {
        'ids': {
            0: $(elm.data('select-to')).val()
        }
    };
    $.post(url, $sentData)
        .success(function(result) {
            switch (elm.data('set-received-value')) {
                case '1':
                    // Якщо треба встановити отримане з сервера значення, то не міняємо зміст $result
                    break;
                case '0':
                default:
                    // Перевіряємо, чи треба встановити якесь фіксоване значення
                    // Якщо цей параметр не встановлений, то $result отримає значення "undefined"
                    result = elm.data('set-fixed-value');
                    break;
            }
            // Якщо в $result щось є, то треба встановити це значення по елементах
            if (undefined != result) {
                $(elm.data('select-to')).val(result);
                // Можливо треба оновити також ще якісь елементи
                // Селектори мають бути перелічені у JSON форматі
                $.each(elm.data('refresh-also'), function(id, selector) {
                    $(selector).val(result);
                });
                // TODO: Говнокод!! Не знаю, як ще можна передати сюди id сутності, якщо trigger викликається не із модального вікна
                $(elm.data('refresh')).trigger('refresh', result);
            }
        });
    e.preventDefault();
});
