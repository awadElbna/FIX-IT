var handleThemePanel = function() {
    "use strict";
    
    $('[data-click="header-theme-selector"]').click(function(e) {
        e.preventDefault();
        
        var targetClass = $(this).attr('data-value');
        var targetContainer = '#header';
        var targetRemoveClass = $(targetContainer).attr('data-current-theme');
        
        if (!targetRemoveClass) {
            targetRemoveClass = 'navbar-default';
        }
        if (targetClass == 'navbar-inverse') {
            $(targetContainer).find('.logo').attr('src','assets/img/logo-white.png');
        } else {
            $(targetContainer).find('.logo').attr('src','assets/img/logo.png');
        }
        $('[data-click="header-theme-selector"]').not(this).closest('li').removeClass('active');
        $(this).closest('li').addClass('active');
        $(targetContainer).removeClass(targetRemoveClass);
        $(targetContainer).addClass(targetClass);
        $(targetContainer).attr('data-current-theme', targetClass);
        
        $.cookie('header-theme', targetClass);
    });
    
    $('[data-click="sidebar-highlight-selector"]').click(function(e) {
        e.preventDefault();
        
        var targetClass = $(this).attr('data-value');
        var targetContainer = '.sidebar';
        var targetRemoveClass = $(targetContainer).attr('data-current-highlight');
        
        $('[data-click="sidebar-highlight-selector"]').not(this).closest('li').removeClass('active');
        $(this).closest('li').addClass('active');
        $(targetContainer).removeClass(targetRemoveClass);
        $(targetContainer).addClass(targetClass);
        $(targetContainer).attr('data-current-highlight', targetClass);
        
        $.cookie('sidebar-highlight', targetClass);
    });
    
    $('[data-click="sidebar-theme-selector"]').click(function(e) {
        e.preventDefault();
        
        var targetClass = $(this).attr('data-value');
        var targetContainer = '.sidebar, .sidebar-bg';
        var targetRemoveClass = $(targetContainer).attr('data-current-theme');
        
        $('[data-click="sidebar-theme-selector"]').not(this).closest('li').removeClass('active');
        $(this).closest('li').addClass('active');
        $(targetContainer).removeClass(targetRemoveClass);
        $(targetContainer).addClass(targetClass);
        $(targetContainer).attr('data-current-theme', targetClass);
        
        $.cookie('sidebar-theme', targetClass);
    });
    
    $('[data-click="body-font-family"]').click(function(e) {
        e.preventDefault();
        
        var targetClass = $(this).attr('data-value');
        var targetContainer = 'body';
        var targetSrc = $(this).attr('data-src');
        var targetRemoveClass = $(targetContainer).attr('data-current-font-family');
        
        $('[data-click="body-font-family"]').not(this).removeClass('active');
        $(this).addClass('active');
        $(targetContainer).removeClass(targetRemoveClass);
        $(targetContainer).addClass(targetClass);
        $(targetContainer).attr('data-current-font-family', targetClass);
        $('#fontFamilySrc').attr('href', targetSrc);
        
        $.cookie('body-font-family', targetClass);
    });
    
    $('[data-click="theme-panel-expand"]').click(function(e) {
        e.preventDefault();
        
        if ($('.theme-panel').hasClass('expand')) {
            $('.theme-panel').removeClass('expand');
        } else {
            $('.theme-panel').addClass('expand');
        }
    });
};
var handlePageLoadThemeSelect = function() {
    "use strict";
    
    if ($.cookie && $.cookie('header-theme')) {
        if ($('.header').length !== 0) {
            var targetClass = $.cookie('header-theme');
            var targetContainer = '.header';
            var targetRemoveClass = $(targetContainer).attr('data-current-theme');
            var targetLi = '[data-click="header-theme-selector"][data-value="'+ targetClass +'"]';
        
            if (!targetRemoveClass) {
                targetRemoveClass = 'navbar-default';
            }
            if (targetClass == 'navbar-inverse') {
                $(targetContainer).find('.logo').attr('src','assets/img/logo-white.png');
            } else {
                $(targetContainer).find('.logo').attr('src','assets/img/logo.png');
            }
            $('[data-click="header-theme-selector"]').not(targetLi).closest('li').removeClass('active');
            $(targetLi).closest('li').addClass('active');
            $(targetContainer).removeClass(targetRemoveClass);
            $(targetContainer).addClass(targetClass);
            $(targetContainer).attr('data-current-theme', targetClass);
        }
    }
    
    if ($.cookie && $.cookie('sidebar-highlight')) {
        if ($('.sidebar').length !== 0) {
            var targetClass = $.cookie('sidebar-highlight');
            var targetContainer = '.sidebar';
            var targetRemoveClass = $(targetContainer).attr('data-current-highlight');
            var targetLi = '[data-click="sidebar-highlight-selector"][data-value="'+ targetClass +'"]';
        
            $('[data-click="sidebar-highlight-selector"]').not(targetLi).closest('li').removeClass('active');
            $(targetLi).closest('li').addClass('active');
            $(targetContainer).removeClass(targetRemoveClass);
            $(targetContainer).addClass(targetClass);
            $(targetContainer).attr('data-current-highlight', targetClass);
        }
    }
    
    if ($.cookie && $.cookie('sidebar-theme')) {
        if ($('.sidebar').length !== 0) {
            var targetClass = $.cookie('sidebar-theme');
            var targetContainer = '.sidebar';
            var targetRemoveClass = $(targetContainer).attr('data-current-theme');
            var targetLi = '[data-click="sidebar-theme-selector"][data-value="'+ targetClass +'"]';
        
            $('[data-click="sidebar-theme-selector"]').not(targetLi).closest('li').removeClass('active');
            $(targetLi).closest('li').addClass('active');
            $(targetContainer).removeClass(targetRemoveClass);
            $(targetContainer).addClass(targetClass);
            $(targetContainer).attr('data-current-theme', targetClass);
        }
    }
    
    if ($.cookie && $.cookie('body-font-family')) {
        if ($('body').length !== 0) {
            var targetClass = $.cookie('body-font-family');
            var targetContainer = 'body';
            var targetRemoveClass = $(targetContainer).attr('data-current-font-family');
            var targetButton = '[data-click="body-font-family"][data-value="'+ targetClass +'"]';
            var targetSrc = $(targetButton).attr('data-src');
            
            $('[data-click="body-font-family"]').not(targetButton).removeClass('active');
            $(targetButton).addClass('active');
            $(targetContainer).removeClass(targetRemoveClass);
            $(targetContainer).addClass(targetClass);
            $(targetContainer).attr('data-current-font-family', targetClass);
            $('#fontFamilySrc').attr('href', targetSrc);
        }
    }
};
var Demo = function () {
	"use strict";
	
	return {
		//main function
		init: function () {
		    handleThemePanel();
		    handlePageLoadThemeSelect();
		},
		initThemePanel: function() {
		    handleThemePanel();
		    handlePageLoadThemeSelect();
		},
		initRightSidebar: function() {
		},
		initTopMenu: function() {
		}
  };
}();