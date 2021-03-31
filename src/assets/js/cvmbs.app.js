
// ========================================================================================================
// START :: require + modules + dependencies
// ========================================================================================================

    // import modules
    import $ from 'jquery';
    import whatInput from 'what-input';
    import { menusFX } from './components/menus.ui';
    // import { slides } from './interactive/billboard.slides';

    import './library/foundation.explicit';

    // global jQuery object
    window.jQuery = window.$ = $;

    // global velocity object
    // var velocity = $.velocity = require( 'velocity-animate' );
    import velocity from 'velocity-animate';

    // foundation module
    import Foundation from 'foundation-sites';

    // lazyload
    import LazyLoad from 'vanilla-lazyload';

    // datatables
    import DataTable from 'datatables.net';
    require( 'datatables.net-responsive-dt' );

    // slick.js
    require( 'slick-carousel' );
    import slick from 'slick-carousel';

    // initialize foundation
    $(document).foundation();

// ========================================================================================================
// END :: require + modules + dependencies
// ========================================================================================================



// ========================================================================================================
// START :: config.objects
// ========================================================================================================

    // base object
    export var site = {};

    // functions
    site.fx = {

        // scrollpage

    };

    // cookies
    site.cookie = {

        control : $('.cookie_control'),
        set     : $('#set_cookie'),
        delete  : $('#delete_cookie'),
        show    : $('#show_cookies')

    };

    // brand
    site.brand = {

        camelot : $('#brand-rams'),
        state   : $('#brand-state'),
        local   : $('#brand-cvmbs')

    };

    // site.ui
    site.ui = {

        header    : $('#site-header'),
        toolbar   : $('#site-menu-toolbar'),
        layout    : $('#site-layout'),
        billboard : $('#billboard-homepage'),
        slides    : $('#billboard-slides'),
        content   : $('#content-homepage'),
        articles  : $('#content-homepage .ui-article'),
        active    : $('#content-homepage .ui-article.active' ),
        footer    : $('#site-footer')

    };

    // menus
    site.ui.menus = {};

    // controls + buttons
    site.ui.controls = {

        university : 'university',
        college    : 'college'
        // department : 'department'

    };

    // menu.navigation
    site.ui.menus.navigation = {

        component  : $('#site-menu'),
        controller : $('#site-menu-button')

    };

    // menu.programs
    site.ui.menus.programs = {};

    // menu.content
    site.ui.menus.content = {};

    // homepage.sections
    site.ui.sections = {

        academics: $('#academics'),
        research: $('#research'),
        facilities: $('#facilities'),
        alumni: $('#alumni'),
        events: $('#events'),
        news: $('#news')

    };

    // visual debug
    export var log = {

        brite : 'color: rgba(144, 187, 34, 1.00)',
        callb : 'color: rgba(85, 168, 182, 0.80)',
        proms : 'color: rgba(85, 168, 182, 0.47)',
        init  : 'color: rgba(214, 221, 242, 0.80)',
        brack : 'color: rgba(255, 255, 255, 0.35)',
        activ : 'color: rgba(243, 133, 72, 1.000)',
        reset : 'color: rgba(243, 133, 72, 0.47)',
        load  : 'color: rgba(188, 197, 60, 0.60)',
        displ : 'color: rgba(219, 27, 137, 1.00)',
        fail  : 'color: rgba(255, 45, 45, 0.85)',
        fx    : 'color: rgba(76, 185, 246, 1.00)',
        prnth : 'color: rgba(255, 255, 255, 1.00)',
        pink  : 'color: rgba(249, 87, 231, 1.00)',
        purpl : 'color: rgba(140, 108, 206, 1.00)'

    };

// ========================================================================================================
// END :: config.objects
// ========================================================================================================



// ========================================================================================================
// START :: initialize
// ========================================================================================================

    // you know what it is bruh
    $(document).ready(function() {

        // homepage alert
        var homepage_alert = $('#homepage_alert');
        var dismiss_alert  = $('#dismiss_alert');

        // get alert status
        var alert_status = $('body').attr( 'data-alert-status' );

        // test alert status
        if ( alert_status !== 'inactive' ) {

            // test cookie string
            if ( document.cookie.split( ';' ).some( function( item ) {

                return item.trim().indexOf( 'alert=dismissed' ) == 0

            } ) ) {

                // set cookie evidence
                $('body').attr( 'data-alert-status', 'dismissed' );

                // remove alert from DOM
                homepage_alert.remove();

            } else {

                // reset body
                $('body').addClass( 'has_alert' );

                // setup alert
                homepage_alert.addClass( 'activated' );

                // setup header
                site.ui.header.addClass( 'has_alert' );

            }

        }

        // set action
        dismiss_alert.on( 'click', function ( e ) {

            // set cookie evidence
            $('body').attr( 'data-alert-status', 'dismissed' );

            // reset body
            $('body').removeClass( 'has_alert' );

            // reset alert
            homepage_alert.removeClass( 'activated' );

            // reset header
            site.ui.header.removeClass( 'has_alert' );

            // set cookie
            document.cookie = 'alert=dismissed';

            // delay and remove alert
            setTimeout( function() {

                // remove alert from DOM
                homepage_alert.remove();

            }, 1000 );

        });

        // debug action
        site.ui.header.on( 'click', function ( e ) {

            // console.log( document.cookie );

        });

        // menus
        menusFX.init();

        // accessibility testing
        // trackFocus();

        // datatables
        renderDirectory();

        // lazyload
        var lazyLoadFX = new LazyLoad({

            elements_selector : '.lazyload',
            threshold         : 64

        });

        // research projects
        var laboratorySlideshow = $('.laboratory-slideshow');

        // config slick
        laboratorySlideshow.slick({

            // slide     : '.research-slide',

            arrows    : true,
            dots      : false,

            prevArrow : '<button id="prev-arrow-control" class="billboard-control prev-arrow" title="previous slide"><span class="button-label">previous slide</span><svg class="prev-arrow-icon arrow-icon" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve"><polygon fill="#FFFFFF" points="26.8,30.4 20.3,24 26.8,17.6 27.7,18.4 22.1,24 27.7,29.6" /></svg></button>',
            nextArrow : '<button id="next-arrow-control" class="billboard-control next-arrow" title="next slide"><span class="button-label">next slide</span><svg class="next-arrow-icon arrow-icon" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve"><polygon fill="#FFFFFF" points="22.2,30.4 21.3,29.6 26.9,24 21.3,18.4 22.2,17.6 28.7,24" /></svg></button>',

            autoplay       : false,
            // autoplaySpeed  : 10000,
            fade           : true,

            initialSlide   : 0,
            infinite       : true,
            slidesToShow   : 1,
            slidesToScroll : 1,
            // adaptiveHeight : true,

            speed     : 720,
            cssEase   : 'cubic-bezier(0.23, 1, 0.32, 1)',

            accessibility  : true,
            waitForAnimate : true

        });

    });

// ========================================================================================================
// END :: initialize
// ========================================================================================================



// ========================================================================================================
// START :: Data Tables
// ========================================================================================================

    // college directory
    function renderDirectory() {

        // alphabet search
        var _alphabetSearch = '';

        // push search settings to app
        $.fn.dataTable.ext.search.push( function ( settings, searchData ) {

            if ( ! _alphabetSearch ) {

                return true;

            }

            if ( searchData[0].charAt(0) === _alphabetSearch ) {

                return true;

            }

            return false;

        });

        // main directory view(s) vars + initialization
        var controlphabet = $('#directory-alphabet');
        var controlfields = $('#directory-fields');
        var directoryinfo = $('#directory-info');
        var controlpages  = $('#directory-controls');
        var table         = $('.directory').DataTable( {

            'order'    : [[ 0, 'asc' ]],
            stateSave  : true,
            responsive : true

        });

        // test for menu location
        if ( $(table).is( '.menu-directory' ) ) {

            console.log( 'ball so hard' );

        }

        // menu directory view vars
        var menucontrolfields  = $('#menu-directory-views');
        var menudirectoryinfo  = $('#menu-directory-info');
        var menucontrolpages   = $('#menu-directory-controls');

        // alphabet search
        var alphabet = $('<div class="alphabet"/>').append( '<span class="alphabet-label">Last Name: </span>' );

        // add clear action to alphabet
        $('<span class="alphabet-control clear active"/>').data( 'letter', '' ).html( 'None' ).appendTo( alphabet );

        // increment
        for ( var i = 0 ; i < 26 ; i++ ) {

            var letter = String.fromCharCode( 65 + i );

            $('<span class="alphabet-control letter"/>')
                .data( 'letter', letter )
                .html( letter )
                .appendTo( alphabet );

        }

        // prepend to page content container
        alphabet.appendTo( controlphabet );

        // rearrange DOM for main directory view(s)
        $('#directory-records_length').appendTo( controlfields );
        $('#directory-records_filter').prependTo( controlfields );
        $('#directory-records_info').appendTo( directoryinfo );
        $('#directory-records_paginate').appendTo( controlpages );

        // rearrange DOM for menu directory view(s)
        $('#menu-directory-records_filter').appendTo( menucontrolfields );
        $('#menu-directory-records_length').appendTo( menucontrolfields );
        $('#menu-directory-records_paginate').appendTo( menucontrolpages );
        $('#menu-directory-records_info').appendTo( menucontrolpages );

        // toggle classes
        alphabet.on( 'click', 'span', function () {

            alphabet.find( '.active' ).removeClass( 'active' );

            $(this).addClass( 'active' );

            _alphabetSearch = $(this).data('letter');

            table.draw();

        } );

    }

// ========================================================================================================
// START :: Data Tables
// ========================================================================================================



// ========================================================================================================
// START :: launchpads
// ========================================================================================================

    var launchpads = $('.launchpads');

    if ( launchpads.length > 0 ) {

        var sticky = launchpads.find( '.sticky' );

        launchpads.prepend( sticky );

    };

// ========================================================================================================
// END :: launchpads
// ========================================================================================================



// ========================================================================================================
// START :: CVMBS Accordions
// ========================================================================================================

    if ( $('.cvmbs-accordions').length > 0 ) {
        $('.cvmbs-accordion').each(function() {
            $(this).addClass('has-loaded');
        });

        $('.cvmbs-accordion__title').each(function() {
            var accordionTitle = $(this).html();

            $(this).html('<button class="cvmbs-accordion__toggle" aria-expanded="false">' + accordionTitle + '</button>');
        });

        $('.cvmbs-accordion__content').each(function() {
            $(this).attr('aria-hidden', 'true');
        });

        $('.cvmbs-accordion__toggle').click(function() {
            $(this).attr('aria-expanded', function(i, attr) {
                $(this).parent().next().attr('aria-hidden', attr);
                return attr == 'true' ? 'false' : 'true';
            });
        });
    };

// ========================================================================================================
// END :: CVMBS Accordions
// ========================================================================================================



// ========================================================================================================
// START :: Places Filters
// ========================================================================================================

    if ( $('.places-archive__grid').length > 0 ) {

        var hash = location.hash;

        console.log( hash );

        var prseStatus = false;
        var prseFilter = '.cvmbs--prse';
        var deptFilter = '';

        var grid = $('.places-archive__grid-inner').isotope({

            itemSelector: '.places-archive__grid-item'

        });

        $('.places-prse__toggle').click(function(e) {

            var toggle = $(e.currentTarget);

            toggle.attr('aria-pressed', function(i, attr) {

                prseStatus = (attr == 'true') ? false : true;

                return prseStatus;

            });

            var filterValue = prseStatus ? prseFilter + deptFilter : deptFilter;

            grid.isotope({

                filter: filterValue

            });

        });

        $('.places-dept__option').click(function(e) {

            var button = $( e.currentTarget );

            if ( button.attr('aria-pressed') == 'false' ) {

                button.siblings().attr('aria-pressed', 'false');
                button.attr('aria-pressed', 'true');

                deptFilter = button.attr('data-filter');

            }

            var filterValue = prseStatus ? prseFilter + deptFilter : deptFilter;

            grid.isotope({

                filter: filterValue
            });

        });

    };

// ========================================================================================================
// END :: Places Filters
// ========================================================================================================



// ========================================================================================================
// START :: track focus
// ========================================================================================================

    function trackFocus() {

        $( 'body' ).delegate( '*', 'focus blur', function() {

            var elem = $( this );

            setTimeout(function() {

                elem.toggleClass( 'find-me', elem.is( ':focus' ) );

                var focusedElementCue  = $('.find-me');

                var elementHasFocusTag = focusedElementCue.text();
                var cleanElementOutput = elementHasFocusTag.toLowerCase();
                var stringFocusElement = String(cleanElementOutput);
                var elementHasFocus    = $.trim(stringFocusElement);

                console.log(elementHasFocus);

            }, 0 );

        });

    }

// ========================================================================================================
// END :: track focus
// ========================================================================================================



// ========================================================================================================
// START :: Skip Link Focus Fixes
// ========================================================================================================

    ( function() {
        var isIe = /(trident|msie)/i.test( navigator.userAgent );

        if ( isIe && document.getElementById && window.addEventListener ) {
            window.addEventListener( 'hashchange', function() {
                var id = location.hash.substring( 1 ),
                    element;

                if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
                    return;
                }

                element = document.getElementById( id );

                if ( element ) {
                    if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
                        element.tabIndex = -1;
                    }

                    element.focus();
                }
            }, false );
        }
    } )();

// ========================================================================================================
// END :: Skip Link Focus Fix
// ========================================================================================================
