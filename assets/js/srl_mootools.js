// author: Sven Rhinow		website: http://www.sr-tag.de
// myLayer is MIT-Licensed

 var myLayer = new Class
 ( {

	Implements: [ Options ],

	options:{
	    parentEl : 'top',
	    overLayID: 'overLay',
	    drawOverLay: false, // false = nicht erstellen wenn ein Element mit dieser ID schon im HTML existiert
	    overLayOpacity: 0.7,
	    layerID : 'layer',
	    layerWidth: 500,
	    layerHeight: 400,
	    drawLayer: false, //false = nicht erstellen wenn ein Element mit dieser ID schon im HTML existiert
	    closePerLayerClick:true,
	    closePerEsc:true,
	    closeID : 'closeBtn',
	    closeClass: 'closer',
	    drawCloseBtn: false, //false = nicht erstellen wenn ein Element mit dieser ID schon im HTML existiert
	    contentID : 'layercontent',
	    mkLinkEvents: true, // wenn false wird kein Link mit dem Click-Event ausgestattet (z.B. beim sortigen anzeigen)
	    duration : 1000,
        drawLayerCenterY:true,
	    drawLayerCenterX:true,

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
	    this.layerWidth = this.options.layerWidth,
	    this.layerHeight = this.options.layerHeight,
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
        this.overLayOpacity = this.options.overLayOpacity;
	    this.drawLayerCenterY = this.options.drawLayerCenterY;
	    this.drawLayerCenterX = this.options.drawLayerCenterX;

        //resize and positon if resize browser
	    window.addEvent('resize', function()
	    {
		    //your logic goes here
 		    this.parentsize = this.parentEl.getSize();

		    $(this.overLayID).setStyles({
		    	width : this.parentsize.x,
				height : this.parentsize.y
			});

		    if(this.drawLayerCenterX) $(this.layerID).setStyles({ 'left': (this.parentsize.x - this.layerWidth) / 2 });
		    if(this.drawLayerCenterY) $(this.layerID).setStyles({ 'top': (this.parentsize.y - this.layerHeight) / 2 });

	    }.bind(this));

	    //key-events verarbeiten
	    if(this.closePerEsc)
	    {
			document.addEvent('keydown', function(event){
			    switch(event.code){
					    case 27:	// Esc
					    case 88:	// 'x'
					    case 67:	// 'c'
					    this.close();
					    break
			    }
			}.bind(this));
	    }

	    //add event of all links with rel="openlayer"
	    if(this.mkLinkEvents)
	    {
			var links = $$("a").filter(function(el) {
			    return el.rel && el.rel.test(/^openlayer/i);
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
	       $(this.overLayID).setStyles({
			    width : this.parentsize.x,
			    height : this.parentsize.y,
			    top: this.topheight,
			    opacity: 0
			});

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

	    // position layer
	    if( $(this.layerID) )
	    {
	       $(this.layerID).setStyles(
	       {
				width : this.layerWidth,
		    	height : this.layerHeight,
		    	opacity: 0
			});
	       var centerLeft = (this.parentsize.x - this.layerWidth) / 2;
	       var centerTop = (this.parentsize.y - this.layerHeight) / 2;
	       if(this.drawLayerCenterX) $(this.layerID).setStyle( 'left', centerLeft ); 
	       if(this.drawLayerCenterY) $(this.layerID).setStyle( 'top',centerTop ); 
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
	   $(this.layerID).tween('opacity',0).setStyle('display', 'none');
	   $(this.overLayID).tween('opacity',0).setStyle('display', 'none');
	},

	open: function(el)
	{
	    $(this.layerID).set('tween',{
	    		duration: this.duration,
				transition: Fx.Transitions.Quad.easeIn,
	    });
		$(this.layerID).setStyle('display', 'block').tween('opacity',1);

	    $(this.overLayID).set('tween',{
	    		duration: this.duration,
				transition: Fx.Transitions.Quad.easeIn,
	    });
		$(this.overLayID).setStyle('display', 'block').tween('opacity',this.overLayOpacity);

	}

} );
// var ml = new  myLayer();


