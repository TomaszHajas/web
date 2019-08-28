(function( $ ) {
    "use strict";

    // Theme color
    wp.customize( 'theme_color', function( value ) {
        value.bind( function( to ) {
            console.log('changed');
            var color = to;
            var styles = String('');
            styles += '<style type="text/css" id="jqstyle">';
                styles += 'a, a:hover{color: '+color+';}';
                styles += '.btn-default, input[type="submit"] {border: 1px solid '+color+'; background:'+color+';}';
                styles += 'textarea:focus {border: 1px solid '+color+';}';
                styles += 'input[type="search"]:focus, input[type="text"]:focus, input[type="url"]:focus, input[type="email"]:focus, input[type="password"]:focus, textarea:focus, .form-control:focus {border: 1px solid '+color+';}';
                styles += 'blockquote {border-left: 4px solid '+color+';}';
                styles += '::-moz-selection{background: '+color+';}';
                styles += '::selection{background: '+color+';}';
                styles += '.main-navigation .menu li:hover > a, .main-navigation .menu li:focus > a {color: '+color+';}';
                styles += '.main-navigation .menu li.current-menu-item > a {color: '+color+';}';
                styles += '.main-navigation .menu li ul > li.current-menu-ancestor > a {color: '+color+';}';
                styles += '.main-navigation .menu li ul:hover > a {color: '+color+';}';
                styles += '.post .featured {background: '+color+';}';
                styles += '.post .featured-media.no-image {background: '+color+';}';
                styles += '.post .tag-list a:hover {color: '+color+';}';
                styles += '.post .post-footer .category-list a:hover {color: '+color+';}';
                styles += '.post .post-footer .share .share-icons li a:hover i {background: '+color+'; border: 1px solid '+color+';}';
                styles += '.featured-media {background: '+color+';}';
                styles += '.pagination a {background: '+color+';}';
                styles += '.pagination .page-number {background: '+color+';}';
                styles += '.comment-wrap ol li header .comment-details .commenter-name a:hover {color: '+color+';}';
                styles += '.comment-wrap ol li header .comment-reply-link {background: '+color+';}';
                styles += '.widget a:hover, .widget a:focus {color: '+color+';}';
                styles += '.widget ul > li:hover .post-count {background: '+color+';  border: 1px solid '+color+';}';
                styles += '.widget .title:after {background: '+color+';}';
                styles += '.widget .social li a:hover i {background: '+color+'; border: 1px solid '+color+';}';
                styles += '.widget .tagcloud a:hover {background: '+color+'; border: 1px solid '+color+';}';
                styles += '.widget.widget_calendar caption {background: '+color+';}';
                styles += '.widget.widget_calendar table tbody a:hover, .widget.widget_calendar table tbody a:focus {background: '+color+';}';
                styles += '.main-footer .widget .tagcloud a:hover {border: 1px solid '+color+';}';
                styles += '.widget.widget_recent_entries ul li a:hover {color: '+color+';}';
                styles += '.main-footer .widget .tagcloud a:hover {border: 1px solid '+color+';}';
                styles += '.main-footer .widget.widget_recent_entries ul li a:hover {color: '+color+';}';
                styles += '#back-to-top {background: rgba( '+color+', 0.6);}';
                styles += '#back-to-top:hover {background: '+color+';}';
                styles += '.mejs-controls .mejs-time-rail .mejs-time-current {background: '+color+' !important;}';
                styles += '@media (max-width: 767px) {.main-navigation .menu li:hover > a {color: '+color+';}';
            styles += '</style>';
            $('#jqstyle').remove();
            $( styles ).appendTo( "head" );
        } );
    });
    // sidebar poition
    wp.customize( 'sidebar_position', function( value ) {
        value.bind( function( to ) {
        	if (to == 'left') {
        		$('.main-content').addClass('col-md-push-4');
        		$('.sidebar').addClass('col-md-pull-8');
        	} else {
        		$('.main-content').removeClass('col-md-push-4');
        		$('.sidebar').removeClass('col-md-pull-8');
        	}
        } );
    });
    // Footer widget area
    wp.customize( 'hide_footer_widgets', function( value ) {
        value.bind( function( to ) {
            if (to == 1) {
                $('.main-footer').css('display', 'none');
            } else {
                $('.main-footer').css('display', 'block');
            }
        } );
    });
    // copyright text
    wp.customize( 'copyright_textbox', function( value ) {
        value.bind( function( to ) {
            $('.custom-copyright-text').html(to);
        });
    });
 
})( jQuery );