/*
JavaScript Plugin 
Written By: Arjun AdhiQari
Github Repo: https://github.com/arjunadhikari789/MultiSelect.js
Written Date: 3-8-2019
License: Free for Everyone
:)
NOTE: This Plugin requires HTML, css and PHP files too.
*/
function MultiSelect( id , colors = {}){
	this.className = "multi-select";
	this.color = {
		background: 'lightgreen',
		selected: 'green'
	};
	this.data = {} ;
	this.id = id ;
	this.chosen = [] ;
	this.domNode = null ;
	this.colorsUpdated = false ;

	if(colors.hasOwnProperty('background')){
		this.color.background = colors.background ;
	}
	if(colors.hasOwnProperty('selected')){
		this.color.selected = colors.selected ;
	}	

	// Functions
	
	this.getNewSn = function(){
		var previous = this.getPreviousMss() ;
		var highestId = 1 ;
		switch(previous.length){
			case 0 :
				return 1 ;
				break ;
			default:
				for( mss in previous){
					if( previous[mss] instanceof HTMLDivElement ){
						if( this.findSnOfMs(previous[mss]) > highestId ){
							highestId = this.findSnOfMs(previous[mss]) ;
						} 
					}
				}
				return highestId + 1 ;
		}
	}

	this.findSnOfMs = function( multiSelect ){
		return Number(multiSelect.dataset.sn) ;
	}
	this.getPreviousMss = function(){
		return document.querySelectorAll("." + this.className ); 
	}	


	this.isValidKey = function(key){
		if(this.data[key] != undefined){
			return true 
		}
		return false ;	
	}	
	this.choose = function( key ){
		key = Number(key);
		if(this.isValidKey(key)){
			this.chosen.push(key);
		}
		this.updateGUI();
	}
	this.unChoose = function( key ){
		if( this.isValidKey(key) ){
			if(this.isChosenKey(key)){
				let n = this.chosen.length ;
				for( let i = 0 ; i < n ; i++){
					if( key == this.chosen[i]){
						this.chosen.splice(i, 1);
						i-- ;
						n-- ;
					}
				}
			}
		}
		this.updateGUI() ;
	}
	this.chooseAll = function( ){
		for( key in this.data){
			this.choose( key );
		}
	}
	this.unChooseAll = function(){
		this.chosen.splice(0, this.chosen.length ) ;
		this.updateGUI() ;
	}
	this.isChosenKey = function( key ){
		if( ( this.chosen.indexOf(Number(key)) > -1) || ( this.chosen.indexOf(key) > -1) ){
			return true ;
		}else{
			return false ;
		}
	}
	this.findOptionByKey = function( key ){
		return this.domNode.querySelector("div[data-value='"+key+"']");
	}	
	this.updateGUI = function(){
		for( key in this.data ){
			let opt = this.findOptionByKey( key );
			if( this.isChosenKey(key) ){
				this.showIcon(opt );
			}else{
				this.hideIcon( opt );
			}
		}
		this.updateColors() ;
	}
	this.updateColors = function(){
		if( ! this.colorsUpdated){
			let options = this.domNode.querySelectorAll("div.ms-option");
			let texts = this.domNode.querySelectorAll("div.ms-option-text") ;
			for( o in options ){
				if(options[o] instanceof HTMLDivElement){
					options[o].style.background = this.color.selected ;
				}
				
			}
			for(t in texts){
				if(texts[t] instanceof HTMLDivElement){
					texts[t].style.background = this.color.background ;
				}
				
			}
			console.log("colors updated");
		}
		this.colorsUpdated = true ;
	}
	this.forceColorUpdate = function(){
		this.colorsUpdated = false ;
		this.updateColors() ;
	}
	this.showIcon = function ( opt ){
		opt.querySelector("div.ms-option-icon").style.display = "flex";
		opt.style.border = "1px solid "+ this.color.selected ;
	}
	this.hideIcon = function ( opt ){
		opt.querySelector("div.ms-option-icon").style.display = "none";
		opt.style.border = "0px";
	}
	this.bindEvents = function(){
		var that = this ;
		for( key in this.data ){
			this.findOptionByKey(key).addEventListener("click", function(){
				let keyVal = Number(this.dataset.value) ;
				if(that.isChosenKey(keyVal)){
					that.unChoose( keyVal );
				}else{
					that.choose( keyVal );
				}
				});
		}
		this.domNode.querySelector("div.ms-select-all").addEventListener("click", function(){
			that.chooseAll() ;
		});
		this.domNode.querySelector("div.ms-reset").addEventListener("click", function(){
			that.unChooseAll() ;
		});		
	}

	this.read = function ( multiSelect ){
		this.domNode = multiSelect ;
		this.sn = multiSelect.dataset.sn ;
		var options = multiSelect.querySelectorAll("div.ms-option");
		this.data = {} ;
		for( opt in options ){
			if(options[opt] instanceof HTMLDivElement){
				this.data[ options[opt].dataset.value ] = options[opt].querySelector("div.ms-option-text").innerText ;
				if(options[opt].dataset.chosen == 1){
					this.chosen.push(options[opt].dataset.value); 
				}
			}
		}
		this.bindEvents() ;
		// this.updateGUI() ;
	}
	/*
	Reading ID from param of constructor function
	*/
	this.read( document.querySelector("#"+ this.id ) );	
	this.updateGUI() ;
}
