// author: Sven Rhinow		website: http://www.sr-tag.de
// myLayer is MIT-Licensed

 var srLayer = new Class
 ( {

	Implements: [ Options ],

	options:{
	    parentEl : 'top',
	    overLayID: 'srl_overLay',
	    drawOverLay: false, // false = nicht erstellen wenn ein Element mit dieser ID schon im HTML existiert
	    overLayOpacity: 0.7,
	    layerID : 'srl_layer',
	    drawLayer: false, //false = nicht erstellen wenn ein Element mit dieser ID schon im HTML existiert
	    closePerLayerClick:true,
	    closePerEsc:true,
	    closeID : 'srl_closeBtn',
	    closeClass: 'srl_closer',
	    drawCloseBtn: false, //false = nicht erstellen wenn ein Element mit dieser ID schon im HTML existiert
	    contentID : 'srl_content',
	    mkLinkEvents: true, // wenn false wird kein Link mit dem Click-Event ausgestattet (z.B. beim sortigen anzeigen)
	    duration : 1000,

	    //    Höhe vom Headimage + Höhe der Hauptnavigation
	    topheight : 0, //  differenz wenn der Layer obere Bereiche überdecken soll
	    parentsize : '',
	    showNow: false  //der Layer wird direkt beim laden der Seite angezeigt
	},

	initialize: function(options) 
	{

	    //overwrite options
	    this.setOptions(options);
	    this.parentEl = document.id(this.options.parentEl);
	    this.overLayID = this.options.overLayID;
	    this.layerID = this.options.layerID;
	    this.closePerLayerClick = this.options.closePerLayerClick;
	    this.closePerEsc = this.options.closePerEsc;
	    this.closeID = this.options.closeID;
	    this.closeClass = this.options.closeClass;
	    this.contentID = this.options.contentID;
	    this.mkLinkEvents = this.options.mkLinkEvents;
	    this.duration = this.options.duration;
	    this.topheight = this.options.topheight;
	    this.parentsize = this.options.parentsize;
	    this.showNow = this.options.showNow;

	    //key-events verarbeiten
	    if(this.closePerEsc)
	    {
			document.addEvent('keydown', function(event){
			    switch(event.code)
			    {
				    case 27:	// Esc
				    // case 88:	// 'x' #fix: sonst functionieren Formulareingaben nicht
				    // case 67:	// 'c' #fix: sonst functionieren Formulareingaben nicht
				    this.close();
				    break
			    }
			}.bind(this));
	    }

	    //add event of all links with rel="openlayer" or class="openlayer"
	    if(this.mkLinkEvents)
	    {
			var links = $$("a").filter(function(el) {
			    if( el.rel && el.rel.test(/^openlayer/i) ) return true;
			    else if ( el.hasClass('openlayer') ) return true;
			    else false;
			});

			links.each(function(item,index)
			{
			    item.addEvent('click', function(event)
			    {
					event.stop(); //Prevents the browser from following the link.
					window.scrollTo(0, 0);
					this.open(item);

			    }.bind(this));

			 }.bind(this));
	    }

		this.createHtml();

	    if(this.showNow)
	    {
			this.open();
	    }
	    else
	    {
			$(this.layerID).setStyle('display', 'none');
	    }
	},

	createHtml: function()
	{
	    this.parentsize = this.parentEl.getSize();

	    // position overlay
	    if($(this.overLayID))
	    {
	       	//add event on overlay
			if(this.closePerLayerClick)
			{
			    $(this.overLayID).addEvent('click', function(event)
			    {
					event.stop(); //Prevents the browser from following the link.
					this.close();
			    }.bind(this));
			}
	    }


 	    // add event on close-button
	    if($(this.closeID))
	    {
	        $(this.closeID).addEvent('click', function(event)
	        {
				event.stop(); //Prevents the browser from following the link.
				this.close();
			}.bind(this));
	    }

		// add event on close-link
        if($$(this.closeClass))
        {
			$$('.'+this.closeClass).addEvent('click', function(event)
			{
				event.stop(); //Prevents the browser from following the link.
				this.close();
			}.bind(this));
	    }

	},

	close: function()
	{
	   if($(this.layerID)) $(this.layerID).setStyle('display', 'none');
	   if($(this.overLayID)) $(this.overLayID).setStyle('display', 'none');
	},

	open: function(el)
	{
	    if($(this.layerID))
    	{
			$(this.layerID).set('tween',{
					duration: this.duration,
					transition: Fx.Transitions.Quad.easeIn,
			});
			$(this.layerID).setStyle('display', 'block');
		}
		if($(this.overLayID))
		{
			$(this.overLayID).setStyle('display', 'block');
		}
	}
} );
// var ml = new  myLayer();


