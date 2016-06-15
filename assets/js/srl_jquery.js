// author: Sven Rhinow
// website: http://www.sr-tag.de
// srLayer is MIT-Licensed

;(function($){

	$.srLayer = function( options )
	{
		var defaults = {

		    parentEl : '#top',
		    overLayID: '#srl_overLay',
		    drawOverLay: false, // false = nicht erstellen wenn ein Element mit dieser ID schon im HTML existiert
		    overLayOpacity: 0.7,
		    layerID : '#srl_layer',
		    drawLayer: false, //false = nicht erstellen wenn ein Element mit dieser ID schon im HTML existiert
		    closePerLayerClick:true,
		    closePerEsc:true,
		    closeID : '#srl_closeBtn',
		    closeClass: '.srl_closer',
		    drawCloseBtn: false, //false = nicht erstellen wenn ein Element mit dieser ID schon im HTML existiert
		    contentID : '#srl_content',
		    mkLinkEvents: true, // wenn false wird kein Link mit dem Click-Event ausgestattet (z.B. beim sortigen anzeigen)
		    duration : 1000,

		    // Hoehe vom Headimage + Höhe der Hauptnavigation
		    topheight : 0, //  differenz wenn der Layer obere Bereiche überdecken soll
		    parentsize : '',
		    showNow: false  //der Layer wird direkt beim laden der Seite angezeigt

		};

		var plugin = this;

		var init = function() {

			//overwrite options
		    plugin.settings = $.extend({}, defaults, options);

		    //key-events verarbeiten
		    if(plugin.settings.closePerEsc)
		    {
				$(document).on('keydown', function(e){
				    var code = e.keyCode || e.which;

				    switch(code)
				    {
					    case 27:	// Esc
					    // case 88:	// 'x' #fix: sonst functionieren Formulareingaben nicht
					    // case 67:	// 'c' #fix: sonst functionieren Formulareingaben nicht
					    close();
				    }
				});
		    }

		    //add event of all links with rel="openlayer" or class="openlayer"
		    if(plugin.settings.mkLinkEvents)
		    {
				var links = $('a').filter(function(el) 
				{
					var patt = /^openlayer/i;

					if($(this).attr('rel') && patt.test($(this).attr('rel')) ) return true;
				    else if ( $(this).hasClass('openlayer') ) return true;
				    else return false;
				});

				links.each(function(i)
				{
				    $(this).on('click', function(e)
				    {
						e.preventDefault(); //Prevents the browser from following the link.
						$('html body').animate(
		        			{scrollTop: ($('#'+plugin.settings.parent).top)},0
		    			);
						open(this);
				    });

				});
		    }

			createHtml();

		    if(plugin.settings.showNow)
		    {
				open();
		    }
		    else
		    {
				$(plugin.settings.layerID).css('display', 'none');
		    }
		}


		var createHtml = function()
		{
		    if($(plugin.settings.overLayID))
		    {
		       	//add event on overlay
				if(plugin.settings.closePerLayerClick)
				{
				    $(plugin.settings.overLayID).on('click', function(e)
				    {
						e.preventDefault(); //Prevents the browser from following the link.
						close();
				    });
				}
		    }

			    // add event on close-button
		    if($(plugin.settings.closeID))
		    {
		        $(plugin.settings.closeID).on('click', function(e)
		        {
					e.preventDefault(); //Prevents the browser from following the link.
					close();
				});
		    }

			// add event on close-link
		    if($(plugin.settings.closeClass))
		    {
				$(plugin.settings.closeClass).on('click', function(e)
				{
					e.preventDefault(); //Prevents the browser from following the link.
					close();
				});
		    }
		}

		var close = function()
		{
		   if($(plugin.settings.layerID)) $(plugin.settings.layerID).fadeOut(plugin.settings.duration);
		   if($(plugin.settings.overLayID)) $(plugin.settings.overLayID).fadeOut(plugin.settings.duration);
		}

		var open = function(el)
		{
		    if($(plugin.settings.layerID))
			{
				$(plugin.settings.layerID).fadeIn(plugin.settings.duration);
			}
			if($(plugin.settings.overLayID))
			{
				$(plugin.settings.overLayID).fadeIn(plugin.settings.duration);
			}
		}

		init();
	}

}) (jQuery);



