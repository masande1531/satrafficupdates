/**
 * - almond is licensed under the MIT license. See: https://github.com/jrburke/almond/.
 * - RequireJS Text is licensed under the MIT license.  See: http://github.com/requirejs/text.
 */
 var tomtom;(function(){if(typeof tomtom=="undefined"){tomtom={};var e,t,n;(function(r){function c(e,t){var n=t&&t.split("/"),r=o.map,i=r&&r["*"]||{},s,u,a,f,l,c,h;if(e&&e.charAt(0)==="."&&t){n=n.slice(0,n.length-1),e=n.concat(e.split("/"));for(l=0;h=e[l];l++)if(h===".")e.splice(l,1),l-=1;else if(h===".."){if(l===1&&(e[2]===".."||e[0]===".."))return!0;l>0&&(e.splice(l-1,2),l-=2)}e=e.join("/")}if((n||i)&&r){s=e.split("/");for(l=s.length;l>0;l-=1){u=s.slice(0,l).join("/");if(n)for(c=n.length;c>0;c-=1){a=r[n.slice(0,c).join("/")];if(a){a=a[u];if(a){f=a;break}}}f=f||i[u];if(f){s.splice(0,l,f),e=s.join("/");break}}}return e}function h(e,t){return function(){return l.apply(r,a.call(arguments,0).concat([e,t]))}}function p(e){return function(t){return c(t,e)}}function d(e){return function(t){i[e]=t}}function v(e){if(s.hasOwnProperty(e)){var t=s[e];delete s[e],u[e]=!0,f.apply(r,t)}if(!i.hasOwnProperty(e))throw new Error("No "+e);return i[e]}function m(e,t){var n,r,i=e.indexOf("!");return i!==-1?(n=c(e.slice(0,i),t),e=e.slice(i+1),r=v(n),r&&r.normalize?e=r.normalize(e,p(t)):e=c(e,t)):e=c(e,t),{f:n?n+"!"+e:e,n:e,p:r}}function g(e){return function(){return o&&o.config&&o.config[e]||{}}}var i={},s={},o={},u={},a=[].slice,f,l;f=function(e,t,n,o){var a=[],f,l,c,p,y,b;o=o||e;if(typeof n=="function"){t=!t.length&&n.length?["require","exports","module"]:t;for(b=0;b<t.length;b++){y=m(t[b],o),c=y.f;if(c==="require")a[b]=h(e);else if(c==="exports")a[b]=i[e]={},f=!0;else if(c==="module")l=a[b]={id:e,uri:"",exports:i[e],config:g(e)};else if(i.hasOwnProperty(c)||s.hasOwnProperty(c))a[b]=v(c);else if(y.p)y.p.load(y.n,h(o,!0),d(c),{}),a[b]=i[c];else if(!u[c])throw new Error(e+" missing "+c)}p=n.apply(i[e],a);if(e)if(l&&l.exports!==r&&l.exports!==i[e])i[e]=l.exports;else if(p!==r||!f)i[e]=p}else e&&(i[e]=n)},e=t=l=function(e,t,n,i){return typeof e=="string"?v(m(e,t).f):(e.splice||(o=e,t.splice?(e=t,t=n,n=null):e=r),t=t||function(){},i?f(r,e,t,n):setTimeout(function(){f(r,e,t,n)},15),l)},l.config=function(e){return o=e,l},n=function(e,t,n){t.splice||(n=t,t=[]),s[e]=[e,t,n]},n.amd={jQuery:!0}})(),tomtom.requirejs=e,tomtom.require=t,tomtom.define=n}})(),tomtom.define("lib/almond",function(){}),tomtom.define("jquery",[],function(){return jQuery}),tomtom.define("OpenLayers",[],function(){return OpenLayers}),tomtom.define("Main",["./OpenLayers"],function(){window.tomtom||(window.tomtom={}),window.tomtom.dom={},window.tomtom.layers={},window.tomtom.services={},window.tomtom.controls={},typeof String.prototype.trim!="function"&&(String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g,"")}),Array.prototype.indexOf||(Array.prototype.indexOf=function(e){if(this==null)throw new TypeError;var t=Object(this),n=t.length>>>0;if(n===0)return-1;var r=0;arguments.length>0&&(r=Number(arguments[1]),r!=r?r=0:r!=0&&r!=Infinity&&r!=-Infinity&&(r=(r>0||-1)*Math.floor(Math.abs(r))));if(r>=n)return-1;var i=r>=0?r:Math.max(n-Math.abs(r),0);for(;i<n;i++)if(i in t&&t[i]===e)return i;return-1}),window.tomtom.setImagePath=function(e){OpenLayers.ImgPath=e},tomtom.setImagePath("./images/"),window.tomtom.API_BASE_URL="https://api.tomtom.com/",window.tomtom.releaseInfo={version:"1.0.5-RELEASE",build:"DEV"},window.tomtom.isDebugMode=!1,window.tomtom.apiKey=null,window.tomtom.languages={en_US:{units:{distance:{meter:"m;; m",km:"km;; km",yard:"yd;; yds",mile:"mi;; mi"},time:{day:"day;; days",hour:"hour;; hours",minute:"min;; mins"}},errors:{Unknown:"Sorry, an error occurred. Please try again or come back later"},IncidentItem:{from:"From",to:"To",delay:"Delay",length:"Length"},IncidentBalloon:{Cluster:{title:"Incidents in this area: ",listHeader:"{count} most severe incidents",orderedByLength:"(Ordered by length)",orderedByDelay:"(Ordered by delay)"},zoomIn:"Click to zoom in"}}}}),tomtom.define("Logger",["./Main","./OpenLayers"],function(){return tomtom.Logger=OpenLayers.Class({initialize:function(){},info:function(){this._log("info",arguments)},debug:function(){this._log("debug",arguments)},log:function(){this._log("log",arguments)},error:function(){this._log("error",arguments)},warn:function(){this._log("warn",arguments)},_log:function(e,t){if(!tomtom.isDebugMode&&(e=="log"||e=="debug"))return;if(typeof console!="undefined"){var n=console[e];n?n.apply?n.apply(console,t):n(t[0]):n!="log"&&this._log("log",t)}}}),tomtom.Logger}),tomtom.define("Utils",["./Main"],function(){tomtom.Utils={hostIndex:0,hosts:[],getServiceUrl:function(e,t,n,r){var i=tomtom.API_BASE_URL;if(t){paramCount=0,e.indexOf("?")==-1&&(e+="?");for(var s in t)paramCount>0&&(e+="&"),e+=s+"="+t[s],paramCount++}return tomtom.proxyUrl&&(i=tomtom.proxyUrl),typeof r!="undefined"&&(r?i=i.replace(/https?:\/\//g,"https://"):i=i.replace(/https?:\/\//g,"http://")),n&&(i="http://"+this.getRandomHost(i)),i+e},getRandomHost:function(e){e=e.replace(/https?:\/\//g,"");if(typeof tomtom.enableHostCycling=="undefined"||tomtom.enableHostCycling)this.hosts.length==0&&this.initHosts(),e=this.hosts[this.hostIndex],this.hostIndex++,this.hostIndex>3&&(this.hostIndex=0);return e},initHosts:function(){var e=tomtom.API_BASE_URL;tomtom.proxyUrl&&(e=tomtom.proxyUrl),tomtom.Utils.hosts.push(e.replace(/https?:\/\//g,"a.")),tomtom.Utils.hosts.push(e.replace(/https?:\/\//g,"b.")),tomtom.Utils.hosts.push(e.replace(/https?:\/\//g,"c.")),tomtom.Utils.hosts.push(e.replace(/https?:\/\//g,"d."))},isArray:function(e){return Object.prototype.toString.call(e)==="[object Array]"},zeroPad:function(e,t){e=String(e);var n=[];for(var r=0;r<t;++r)n.push("0");return n.join("").substring(0,t-e.length)+e},hitch:function(e,t){return function(){return t.apply(e,arguments)}},setCookie:function(e,t,n){if(n){var r=new Date;r.setTime(r.getTime()+n*24*60*60*1e3);var i="; expires="+r.toGMTString()}else var i="";document.cookie=e+"="+t+i+"; path=/"},getCookie:function(e){var t=e+"=",n=document.cookie.split(";");for(var r=0;r<n.length;r++){var i=n[r];while(i.charAt(0)==" ")i=i.substring(1,i.length);if(i.indexOf(t)==0)return i.substring(t.length,i.length)}return null},removeCookie:function(e){this.setCookie(e,"",-1)},formatSeconds:function(e){if(e==0)return"0 min";if(e<60)return e+" secs";if(e>=60&&e<=3600)return this.round(e/60,1)+" mins";if(e>=3600)return this.round(e/3600,1)+" hours"},metersToMiles:function(t){return t*e/5280},round:function(e,t){return Math.round(e*Math.pow(10,t))/Math.pow(10,t)}};var e=3.28084,t=5280;return tomtom.Utils}),tomtom.define("BaseObject",["./Main","./Logger","./Utils","./OpenLayers"],function(e,t,n){return tomtom.BaseObject=OpenLayers.Class({initialize:function(){this.log=new t},hitch:function(e){return n.hitch(this,e)}}),tomtom.BaseObject}),tomtom.define("services/BaseService",["../BaseObject"],function(e){return tomtom.services.BaseService=OpenLayers.Class(e,{initialize:function(t){e.prototype.initialize.apply(this,[]),t?this.apiKey=t:this.apiKey=tomtom.apiKey,!this.apiKey&&!tomtom.proxyUrl&&this.log.warn('An API Key has not been specified.  TomTom services will not work without an API Key. Please specify an API key either via tomtom.apiKey OR by passing the apiKey to the service\'s constructor: var service = new tomtom.services.GeocodeService("your key here");')}}),tomtom.services.BaseService}),tomtom.define("dom/DomUtilResult",["../BaseObject","../Utils","../OpenLayers"],function(e,t){return tomtom.dom.DomUtilResult=OpenLayers.Class(e,{initialize:function(e,t){this.elements=e,this.dutil=t},html:function(e){if(e==null){var t=this.first();return t?t.innerHTML:null}return this.each(function(t){t.innerHTML=e}),this},css:function(e,t){if(t==null){var n=this.first();return n?this.dutil.css(n,e):null}this.each(this.hitch(function(n){this.dutil.css(n,e,t)}))},append:function(e){if(typeof e=="string")this.each(function(t){t.innerHTML+=e});else{var t=this.first();t&&t.appendChild(e)}return this},first:function(){return this.get(0)},get:function(e){return e==null&&(e=0),this.elements.length>e?this.elements[e]:null},each:function(e){if(!this.elements.length)return e(this.elements,0),this;for(var t=0;t<this.elements.length;t++){var n=e(this.elements[t],t);if(n===!1)break}return this},val:function(e){if(e==undefined){var t=this.first();return t&&t.value?t.value:null}this.dutil.val(this.elements,e)},find:function(e){return this.dutil.query(e,this.elements)},bind:function(e,t,n){return this.dutil.bind(this.elements,e,t,n)},attr:function(e,t){return this.dutil.attr(this.elements,e,t)},data:function(e,t){return this.dutil.data(this.elements,e,t)},removeAttr:function(e){return this.dutil.removeAttr(this.elements,e),this},next:function(e){return this.dutil.next(this.elements,e)},prev:function(e){return this.dutil.prev(this.elements,e)},children:function(e){return this.dutil.children(this.elements,e)},length:function(){return this.elements.length},addClass:function(e){return this.dutil.addClass(this.elements,e),this},removeClass:function(e){return this.dutil.removeClass(this.elements,e),this},offset:function(){return this.dutil.offset(this.first())},position:function(){return this.dutil.position(this.first())},offsetHeight:function(){var e=this.first();return e?e.offsetHeight:null},offsetWidth:function(){var e=this.first();return e?e.offsetWidth:null}}),tomtom.dom.DomUtilResult}),tomtom.define("dom/DomUtil",["../BaseObject","./DomUtilResult","../OpenLayers"],function(e){return tomtom.dom.DomUtil=OpenLayers.Class(e,{initialize:function(){},query:function(e,t){},animate:function(e,t){},css:function(e,t,n){},offset:function(e){},jsonp:function(e){},bind:function(e,t,n,r){},unbind:function(e){},mixin:function(e,t){},addClass:function(e,t){},removeClass:function(e,t){},wrap:function(e){return new tomtom.dom.DomUtilResult(e,this)},empty:function(e){while(e.children.length>0)e.removeChild(e.children[0]);return new tomtom.dom.DomUtilResult(e,this)},html:function(e,t){typeof t=="string"?e.innerHTML=t:(this.empty(e),e.appendChild(t))},append:function(e,t){return typeof t=="string"?e.innerHTML+=t:e.appendChild(t),new tomtom.dom.DomUtilResult(e,this)},unbindAll:function(e){for(var t=0;t<e.length;t++)this.unbind(e[t])},attr:function(e,t,n){},removeAttr:function(e,t){},data:function(e,t,n){},val:function(e,t){},next:function(e,t){},prev:function(e,t){},children:function(e,t){},viewport:function(){},dimensions:function(e){}}),tomtom.dom.DomUtil}),tomtom.define("jqueryEasing",["jquery"],function(e){e.easing.jswing=e.easing.swing,e.extend(e.easing,{def:"easeOutQuad",swing:function(t,n,r,i,s){return e.easing[e.easing.def](t,n,r,i,s)},easeInQuad:function(e,t,n,r,i){return r*(t/=i)*t+n},easeOutQuad:function(e,t,n,r,i){return-r*(t/=i)*(t-2)+n},easeInOutQuad:function(e,t,n,r,i){return(t/=i/2)<1?r/2*t*t+n:-r/2*(--t*(t-2)-1)+n},easeInCubic:function(e,t,n,r,i){return r*(t/=i)*t*t+n},easeOutCubic:function(e,t,n,r,i){return r*((t=t/i-1)*t*t+1)+n},easeInOutCubic:function(e,t,n,r,i){return(t/=i/2)<1?r/2*t*t*t+n:r/2*((t-=2)*t*t+2)+n},easeInQuart:function(e,t,n,r,i){return r*(t/=i)*t*t*t+n},easeOutQuart:function(e,t,n,r,i){return-r*((t=t/i-1)*t*t*t-1)+n},easeInOutQuart:function(e,t,n,r,i){return(t/=i/2)<1?r/2*t*t*t*t+n:-r/2*((t-=2)*t*t*t-2)+n},easeInQuint:function(e,t,n,r,i){return r*(t/=i)*t*t*t*t+n},easeOutQuint:function(e,t,n,r,i){return r*((t=t/i-1)*t*t*t*t+1)+n},easeInOutQuint:function(e,t,n,r,i){return(t/=i/2)<1?r/2*t*t*t*t*t+n:r/2*((t-=2)*t*t*t*t+2)+n},easeInSine:function(e,t,n,r,i){return-r*Math.cos(t/i*(Math.PI/2))+r+n},easeOutSine:function(e,t,n,r,i){return r*Math.sin(t/i*(Math.PI/2))+n},easeInOutSine:function(e,t,n,r,i){return-r/2*(Math.cos(Math.PI*t/i)-1)+n},easeInExpo:function(e,t,n,r,i){return t==0?n:r*Math.pow(2,10*(t/i-1))+n},easeOutExpo:function(e,t,n,r,i){return t==i?n+r:r*(-Math.pow(2,-10*t/i)+1)+n},easeInOutExpo:function(e,t,n,r,i){return t==0?n:t==i?n+r:(t/=i/2)<1?r/2*Math.pow(2,10*(t-1))+n:r/2*(-Math.pow(2,-10*--t)+2)+n},easeInCirc:function(e,t,n,r,i){return-r*(Math.sqrt(1-(t/=i)*t)-1)+n},easeOutCirc:function(e,t,n,r,i){return r*Math.sqrt(1-(t=t/i-1)*t)+n},easeInOutCirc:function(e,t,n,r,i){return(t/=i/2)<1?-r/2*(Math.sqrt(1-t*t)-1)+n:r/2*(Math.sqrt(1-(t-=2)*t)+1)+n},easeInElastic:function(e,t,n,r,i){var s=1.70158,o=0,u=r;if(t==0)return n;if((t/=i)==1)return n+r;o||(o=i*.3);if(u<Math.abs(r)){u=r;var s=o/4}else var s=o/(2*Math.PI)*Math.asin(r/u);return-(u*Math.pow(2,10*(t-=1))*Math.sin((t*i-s)*2*Math.PI/o))+n},easeOutElastic:function(e,t,n,r,i){var s=1.70158,o=0,u=r;if(t==0)return n;if((t/=i)==1)return n+r;o||(o=i*.3);if(u<Math.abs(r)){u=r;var s=o/4}else var s=o/(2*Math.PI)*Math.asin(r/u);return u*Math.pow(2,-10*t)*Math.sin((t*i-s)*2*Math.PI/o)+r+n},easeInOutElastic:function(e,t,n,r,i){var s=1.70158,o=0,u=r;if(t==0)return n;if((t/=i/2)==2)return n+r;o||(o=i*.3*1.5);if(u<Math.abs(r)){u=r;var s=o/4}else var s=o/(2*Math.PI)*Math.asin(r/u);return t<1?-0.5*u*Math.pow(2,10*(t-=1))*Math.sin((t*i-s)*2*Math.PI/o)+n:u*Math.pow(2,-10*(t-=1))*Math.sin((t*i-s)*2*Math.PI/o)*.5+r+n},easeInBack:function(e,t,n,r,i,s){return s==undefined&&(s=1.70158),r*(t/=i)*t*((s+1)*t-s)+n},easeOutBack:function(e,t,n,r,i,s){return s==undefined&&(s=1.70158),r*((t=t/i-1)*t*((s+1)*t+s)+1)+n},easeInOutBack:function(e,t,n,r,i,s){return s==undefined&&(s=1.70158),(t/=i/2)<1?r/2*t*t*(((s*=1.525)+1)*t-s)+n:r/2*((t-=2)*t*(((s*=1.525)+1)*t+s)+2)+n},easeInBounce:function(t,n,r,i,s){return i-e.easing.easeOutBounce(t,s-n,0,i,s)+r},easeOutBounce:function(e,t,n,r,i){return(t/=i)<1/2.75?r*7.5625*t*t+n:t<2/2.75?r*(7.5625*(t-=1.5/2.75)*t+.75)+n:t<2.5/2.75?r*(7.5625*(t-=2.25/2.75)*t+.9375)+n:r*(7.5625*(t-=2.625/2.75)*t+.984375)+n},easeInOutBounce:function(t,n,r,i,s){return n<s/2?e.easing.easeInBounce(t,n*2,0,i,s)*.5+r:e.easing.easeOutBounce(t,n*2-s,0,i,s)*.5+i*.5+r}})}),tomtom.define("DomUtil",["./dom/DomUtil","jquery","jqueryEasing","./dom/DomUtilResult","./Utils"],function(e,t,n,r,i){tomtom.dom.DomUtilJQuery=OpenLayers.Class(e,{initialize:function(){},query:function(e,n){return n?new r(t(n).find(e),this):new r(t(e),this)},animate:function(e,n){return n||(n={}),t(e).animate(n.properties,n.duration?n.duration:s,n.easing,n.callback),new r(e,this)},offset:function(e){return t(e).offset()},dimensions:function(e){return{width:t(e).width(),height:t(e).height(),outerWidth:t(e).outerWidth(),outerHeight:t(e).outerHeight()}},position:function(e){return t(e).position()},css:function(e,n,i){return i!=undefined?new r(t(e).css(n,i),this):t(e).css(n)},jsonp:function(e){t.ajax({url:e.url,jsonp:e.callbackParam,dataType:"jsonp",data:e.data,success:e.callback,error:e.errorCallback})},getJson:function(e){t.ajax({url:e.url,dataType:"json",data:e.data,success:e.callback,error:e.errorCallback})},bind:function(e,n,r,s){var o=s?i.hitch(s,r):r;return t(e).bind(n,o),{element:e,event:n,callback:o}},unbind:function(e){t(e.element).unbind(e.event,e.callback)},mixin:function(e,n){return t.extend(e,n)},addClass:function(e,n){t(e).addClass(n)},removeClass:function(e,n){t(e).removeClass(n)},attr:function(e,n,i){return i!=undefined?new r(t(e).attr(n,i),this):t(e).attr(n)},removeAttr:function(e,n){return new r(t(e).removeAttr(n),this)},data:function(e,n,i){return i!=undefined?new r(t(e).data(n,i),this):t(e).data(n)},val:function(e,n){return n!=undefined?new r(t(e).val(n),this):t(e).val()},next:function(e,n){return new r(t(e).next(n),this)},prev:function(e,n){return new r(t(e).prev(n),this)},children:function(e,n){return new r(t(e).children(n),this)},viewport:function(){return{width:t(window).width(),height:t(window).height()}}});var s=500;return new tomtom.dom.DomUtilJQuery}),tomtom.define("services/GeocodingService",["./BaseService","../DomUtil","../Utils"],function(e,t,n){tomtom.services.GeocodingService=OpenLayers.Class(e,{initialize:function(t){e.prototype.initialize.apply(this,arguments)},geocode:function(e,i,s,o){typeof i=="function"&&(o=s,s=i,i={});var u={q:e};this.apiKey&&(u.key=this.apiKey),t.mixin(u,i),tomtom.proxyUrl?t.getJson({url:n.getServiceUrl(r,u),callback:s,errorCallback:o}):t.jsonp({url:n.getServiceUrl(r+"p",u),callback:s,callbackParam:"jsonp",errorCallback:o})},reverseGeocode:function(e,r,s,o,u){typeof s=="function"&&(u=o,o=s,s={});var a={point:r+","+e,projection:"EPSG4326"};t.mixin(a,s),this.apiKey&&(a.key=this.apiKey),tomtom.proxyUrl?t.getJson({url:n.getServiceUrl(i,a),callback:o,errorCallback:u}):t.jsonp({url:n.getServiceUrl(i+"p",a),callback:o,errorCallback:u,callbackParam:"jsonp"})}});var r="lbs/services/geocode/3/json",i="lbs/services/reverseGeocode/3/json";return tomtom.services.GeocodingService}),tomtom.define("services/RoutingService",["./BaseService","../DomUtil","../Utils","../OpenLayers"],function(e,t,n){tomtom.services.RoutingService=OpenLayers.Class(e,{initialize:function(t){e.prototype.initialize.apply(this,arguments)},getRoute:function(e,s,o,u){typeof s=="function"&&(u=o,o=s,s={}),this.apiKey&&(s.key=this.apiKey);var a=t.mixin({},s);a.routeType&&delete a.routeType,s.routeType||(s.routeType=i);var f=[];for(var l=0;l<e.length;l++){var c=e[l];f.push(c.lat+","+c.lon)}var h={points:f.join(":"),routeType:s.routeType};tomtom.proxyUrl?t.getJson({url:n.getServiceUrl(OpenLayers.String.format(r,h),a),callback:o,errorCallback:u}):t.jsonp({url:n.getServiceUrl(OpenLayers.String.format(r+"p",h),a),callback:o,callbackParam:"jsonp",errorCallback:u})}});var r="lbs/services/route/3/${points}/${routeType}/json",i="Quickest";return tomtom.services.RoutingService}),tomtom.define("i18n",["./Utils","./Main","./OpenLayers"],function(e){function l(e,t){if(e&&e.indexOf(".")>-1){var n=e.split("."),r=n.length-1;for(var i=0;i<r&&t;i++)t=t[n[i]];return e=n[i],t&&t[e]||undefined}return t[e]}var t=/{([\w_]+)}/g,n=/^([a-z]{2})([-_])([a-z]{2})/i,r=/;; ?/,i=null,s={},o=null,u="en_US",a={_rules:[[1,function(e){return 0}],[2,function(e){return e!=1?1:0}],[2,function(e){return e>1?1:0}],[3,function(e){return e%10==1&&e%100!=11?1:e!=0?2:0}],[4,function(e){return e==1||e==11?0:e==2||e==12?1:e>0&&e<20?2:3}],[3,function(e){return e==1?0:e==0||e%100>0&&e%100<20?1:2}],[3,function(e){return e%10==1&&e%100!=11?0:e%10>=2&&(e%100<10||e%100>=20)?2:1}],[3,function(e){return e%10==1&&e%100!=11?0:e%10>=2&&e%10<=4&&(e%100<10||e%100>=20)?1:2}],[3,function(e){return e==1?0:e>=2&&e<=4?1:2}],[3,function(e){return e==1?0:e%10>=2&&e%10<=4&&(e%100<10||e%100>=20)?1:2}],[4,function(e){return e%100==1?0:e%100==2?1:e%100==3||e%100==4?2:3}],[5,function(e){return e==1?0:e==2?1:e>=3&&e<=6?2:e>=7&&e<=10?3:4}],[6,function(e){return e==0?5:e==1?0:e==2?1:e%100>=3&&e%100<=10?2:e%100>=11&&e%100<=99?3:4}],[4,function(e){return e==1?0:e==0||e%100>0&&e%100<=10?1:e%100>10&&e%100<20?2:3}],[3,function(e){return e%10==1?0:e%10==2?1:2}],[2,function(e){return e%10==1&&e%100!=11?0:1}]],_languages:{"hu-HU":0,"id-ID":0,"ms-MY":0,"th-TH":0,"tr-TR":0,"zh-CN":0,"zh-TW":0,de:1,en:1,es:1,it:1,nl:1,pt:1,"af-ZA":1,"ca-ES":1,"da-DK":1,"de-DE":1,"en-GB":1,"en-US":1,"es-ES":1,"es-MX":1,"it-IT":1,"nl-BE":1,"nl-NL":1,"no-NO":1,"pt-BR":1,"pt-PT":1,"sv-SE":1,"et-EE":1,"fi-FI":1,"bg-BG":1,"el-GR":1,fr:2,"fr-CA":2,"fr-FR":2,"lv-LV":3,"lt-LT":6,"hr-HR":7,"ru-RU":7,"cs-CZ":8,"sk-SK":8,"pl-PL":9,"sl-SI":10},getPluralForm:function(e){var t=a._rules,i;if(isNaN(e)&&"string"==typeof e)if(e in a._languages)i=a._languages[e];else{var s=e.match(n);i=s&&a._languages[s[1]]}else i=Number(e);if(i==null||isNaN(i)||i<0||i>t.length)i=0;var o=t[i][1];return function(e,t){if("string"!=typeof e)return;t=isNaN(t)?1:t<0?0:t;var n=o(t),i=e?e.split(r):[""],s=n<i.length?i[n]:i[i.length-1];return s}}},f={_locale:"",getLocale:function(){return this._locale},setLocale:function(e){this._locale=e,o=a.getPluralForm(this._locale),i=tomtom.languages[this._locale]},getCountryCode:function(){var e=this._locale.match(n);return e&&e[3]||null},getPrimaryLanguage:function(){return this._locale.substr(0,2)},hasLocalizedStrings:function(){return"object"==typeof i&&i!=null},setLocaleRule:function(t,n,r){var i=t=="*",o=e.isArray(t),u=this._locale==t||o&&t.indexOf(this._locale)>-1;if(!i&&!u){var a=this.getCountryCode(),f=a==t||o&&t.indexOf(a)>-1;if(!f)return}"function"==typeof r&&(s[n]=e.hitch(new c(n),r))}},c=OpenLayers.Class({initialize:function h(e,t){var n={},r,s;t&&(s=t._branch,this._pathKey=t._pathKey?t._pathKey+"."+e:e),s=s||i||h._branch||n,r=s==n?n:l(e,s),this._branch="object"==typeof r?r:null}});c._branch=null,c._pathKey="",c._pluralFormRule=null,c.getBranch=function(e){return new c(e,this)},c.getString=function(e,n,r){var u=this._branch||i||{},a=l(e,u),f=(this._pathKey?this._pathKey+".":"")+e,c=s[f];if(c)return c(n,r);var h=this._pluralFormRule||o;return h&&(a=h(a,r)),"string"==typeof a?(n&&(a=a.replace(t,function(e,t){return t in n?n[t]:"#"+t+"#"})),a):"#"+e+"#"},c.prototype._pathKey=c._pathKey,c.prototype._branch=c._branch,c.prototype.getBranch=c.getBranch,c.prototype.getString=c.getString,f.setLocale(u),f.setLocaleRule("*","units.distance",function(e,t){var n=t/1e3;return t<500?t+" "+this.getString("meter",null,t):n.toFixed(1)+" "+this.getString("km",null,n)}),f.setLocaleRule(["en_GB","en_US"],"units.distance",function(e,t){var n=Math.round(t*.10936133)*10,r=n/1760;return r<.5?Math.round(n)+" "+this.getString("yard",null,n):r.toFixed(1)+" "+this.getString("mile",null,r)}),f.setLocaleRule("*","common.TomTom.HDTraffic",function(){return"HD Traffic"}),tomtom.LocaleManager=f,tomtom.StringBundle=c,tomtom.PluralForm=a}),tomtom.define("services/TrafficService",["./BaseService","../DomUtil","../Utils","../OpenLayers","../i18n"],function(e,t,n){tomtom.services.TrafficService=OpenLayers.Class(e,{initialize:function(t){e.prototype.initialize.apply(this,arguments)},getTrafficModel:function(e,i,s,o,u){typeof s=="function"&&(u=o,o=s,s={}),s.projection||(s.projection="EPSG4326");var a=t.mixin({},s);s.trafficModelID||(s.trafficModelID=-1),a.trafficModelID&&delete a.trafficModelID,a.language||(a.language=tomtom.LocaleManager.getPrimaryLanguage()),s.zoom=i,e=new OpenLayers.Bounds(e.left,e.bottom,e.right,e.top),s.minY=e.top,s.minX=e.left,s.maxY=e.bottom,s.maxX=e.right,this.apiKey&&(a.key=this.apiKey),a.expandCluster=!0,tomtom.proxyUrl?t.getJson({url:n.getServiceUrl(OpenLayers.String.format(r,s),a),callback:o,errorCallback:u}):t.jsonp({url:n.getServiceUrl(OpenLayers.String.format(r+"p",s),a),callback:o,callbackParam:"jsonp",errorCallback:u})}});var r="lbs/services/trafficIcons/3/s2/${minY},${minX},${maxY},${maxX}/${zoom}/${trafficModelID}/json";return tomtom.services.TrafficService}),tomtom.define("services/ViewportService",["./BaseService","../DomUtil","../Utils"],function(e,t,n){tomtom.services.ViewportService=OpenLayers.Class(e,{initialize:function(t){e.prototype.initialize.apply(this,arguments)},getViewportModel:function(e,i,s,o,u,a,f){typeof u=="function"&&(f=a,a=u,u={}),e=new OpenLayers.Bounds(e.left,e.bottom,e.right,e.top),e.transform(new OpenLayers.Projection(u.projection?u.projection:"EPSG:4326"),new OpenLayers.Projection("EPSG:900913")),s=new OpenLayers.Bounds(s.left,s.bottom,s.right,s.top),s.transform(new OpenLayers.Projection(u.projection?u.projection:"EPSG:4326"),new OpenLayers.Projection("EPSG:900913"));var l={box:e.bottom+","+e.left+","+e.top+","+e.right,zoom:i,overviewBox:s.bottom+","+s.left+","+s.top+","+s.right,overviewZoom:o,copyright:typeof u.copyright=="undefined"?!0:u.copyright};this.apiKey&&(u.key=this.apiKey),tomtom.proxyUrl?t.getJson({url:n.getServiceUrl(OpenLayers.String.format(r,l),u),callback:a,errorCallback:f}):t.jsonp({url:n.getServiceUrl(OpenLayers.String.format(r+"p",l),u),callback:a,callbackParam:"jsonp",errorCallback:f})}});var r="lbs/services/viewportDesc/3/${box}/${zoom}/${overviewBox}/${overviewZoom}/${copyright}/json";return tomtom.services.ViewportService}),tomtom.require("Main"),tomtom.require("services/GeocodingService"),tomtom.require("services/RoutingService"),tomtom.require("services/TrafficService"),tomtom.require("services/ViewportService")