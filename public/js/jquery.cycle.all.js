/*!
 * jQuery Cycle Plugin (with Transition Definitions)
 * Examples and documentation at: http://jquery.malsup.com/cycle/
 * Copyright (c) 2007-2013 M. Alsup
 * Version: 3.0.2 (19-APR-2013)
 * Dual licensed under the MIT and GPL licenses.
 * http://jquery.malsup.com/license.html
 * Requires: jQuery v1.7.1 or later
 */
(function(e,t){"use strict";function r(t){if(e.fn.cycle.debug)i(t)}function i(){if(window.console&&console.log)console.log("[cycle] "+Array.prototype.join.call(arguments," "))}function s(t,n,r){var i=e(t).data("cycle.opts");if(!i)return;var s=!!t.cyclePause;if(s&&i.paused)i.paused(t,i,n,r);else if(!s&&i.resumed)i.resumed(t,i,n,r)}function o(n,r,o){function l(t,n,r){if(!t&&n===true){var s=e(r).data("cycle.opts");if(!s){i("options not found, can not resume");return false}if(r.cycleTimeout){clearTimeout(r.cycleTimeout);r.cycleTimeout=0}h(s.elements,s,1,!s.backwards)}}if(n.cycleStop===t)n.cycleStop=0;if(r===t||r===null)r={};if(r.constructor==String){switch(r){case"destroy":case"stop":var u=e(n).data("cycle.opts");if(!u)return false;n.cycleStop++;if(n.cycleTimeout)clearTimeout(n.cycleTimeout);n.cycleTimeout=0;if(u.elements)e(u.elements).stop();e(n).removeData("cycle.opts");if(r=="destroy")a(n,u);return false;case"toggle":n.cyclePause=n.cyclePause===1?0:1;l(n.cyclePause,o,n);s(n);return false;case"pause":n.cyclePause=1;s(n);return false;case"resume":n.cyclePause=0;l(false,o,n);s(n);return false;case"prev":case"next":u=e(n).data("cycle.opts");if(!u){i('options not found, "prev/next" ignored');return false}if(typeof o=="string")u.oneTimeFx=o;e.fn.cycle[r](u);return false;default:r={fx:r}}return r}else if(r.constructor==Number){var f=r;r=e(n).data("cycle.opts");if(!r){i("options not found, can not advance slide");return false}if(f<0||f>=r.elements.length){i("invalid slide index: "+f);return false}r.nextSlide=f;if(n.cycleTimeout){clearTimeout(n.cycleTimeout);n.cycleTimeout=0}if(typeof o=="string")r.oneTimeFx=o;h(r.elements,r,1,f>=r.currSlide);return false}return r}function u(t,n){if(!e.support.opacity&&n.cleartype&&t.style.filter){try{t.style.removeAttribute("filter")}catch(r){}}}function a(t,n){if(n.next)e(n.next).unbind(n.prevNextEvent);if(n.prev)e(n.prev).unbind(n.prevNextEvent);if(n.pager||n.pagerAnchorBuilder)e.each(n.pagerAnchors||[],function(){this.unbind().remove()});n.pagerAnchors=null;e(t).unbind("mouseenter.cycle mouseleave.cycle");if(n.destroy)n.destroy(n)}function f(n,r,o,a,f){var p;var g=e.extend({},e.fn.cycle.defaults,a||{},e.metadata?n.metadata():e.meta?n.data():{});var y=e.isFunction(n.data)?n.data(g.metaAttr):null;if(y)g=e.extend(g,y);if(g.autostop)g.countdown=g.autostopCount||o.length;var b=n[0];n.data("cycle.opts",g);g.$cont=n;g.stopCount=b.cycleStop;g.elements=o;g.before=g.before?[g.before]:[];g.after=g.after?[g.after]:[];if(!e.support.opacity&&g.cleartype)g.after.push(function(){u(this,g)});if(g.continuous)g.after.push(function(){h(o,g,0,!g.backwards)});l(g);if(!e.support.opacity&&g.cleartype&&!g.cleartypeNoBg)m(r);if(n.css("position")=="static")n.css("position","relative");if(g.width)n.width(g.width);if(g.height&&g.height!="auto")n.height(g.height);if(g.startingSlide!==t){g.startingSlide=parseInt(g.startingSlide,10);if(g.startingSlide>=o.length||g.startSlide<0)g.startingSlide=0;else p=true}else if(g.backwards)g.startingSlide=o.length-1;else g.startingSlide=0;if(g.random){g.randomMap=[];for(var w=0;w<o.length;w++)g.randomMap.push(w);g.randomMap.sort(function(e,t){return Math.random()-.5});if(p){for(var E=0;E<o.length;E++){if(g.startingSlide==g.randomMap[E]){g.randomIndex=E}}}else{g.randomIndex=1;g.startingSlide=g.randomMap[1]}}else if(g.startingSlide>=o.length)g.startingSlide=0;g.currSlide=g.startingSlide||0;var S=g.startingSlide;r.css({position:"absolute",top:0,left:0}).hide().each(function(t){var n;if(g.backwards)n=S?t<=S?o.length+(t-S):S-t:o.length-t;else n=S?t>=S?o.length-(t-S):S-t:o.length-t;e(this).css("z-index",n)});e(o[S]).css("opacity",1).show();u(o[S],g);if(g.fit){if(!g.aspect){if(g.width)r.width(g.width);if(g.height&&g.height!="auto")r.height(g.height)}else{r.each(function(){var t=e(this);var n=g.aspect===true?t.width()/t.height():g.aspect;if(g.width&&t.width()!=g.width){t.width(g.width);t.height(g.width/n)}if(g.height&&t.height()<g.height){t.height(g.height);t.width(g.height*n)}})}}if(g.center&&(!g.fit||g.aspect)){r.each(function(){var t=e(this);t.css({"margin-left":g.width?(g.width-t.width())/2+"px":0,"margin-top":g.height?(g.height-t.height())/2+"px":0})})}if(g.center&&!g.fit&&!g.slideResize){r.each(function(){var t=e(this);t.css({"margin-left":g.width?(g.width-t.width())/2+"px":0,"margin-top":g.height?(g.height-t.height())/2+"px":0})})}var x=(g.containerResize||g.containerResizeHeight)&&n.innerHeight()<1;if(x){var T=0,N=0;for(var C=0;C<o.length;C++){var k=e(o[C]),L=k[0],A=k.outerWidth(),O=k.outerHeight();if(!A)A=L.offsetWidth||L.width||k.attr("width");if(!O)O=L.offsetHeight||L.height||k.attr("height");T=A>T?A:T;N=O>N?O:N}if(g.containerResize&&T>0&&N>0)n.css({width:T+"px",height:N+"px"});if(g.containerResizeHeight&&N>0)n.css({height:N+"px"})}var M=false;if(g.pause)n.bind("mouseenter.cycle",function(){M=true;this.cyclePause++;s(b,true)}).bind("mouseleave.cycle",function(){if(M)this.cyclePause--;s(b,true)});if(c(g)===false)return false;var _=false;a.requeueAttempts=a.requeueAttempts||0;r.each(function(){var t=e(this);this.cycleH=g.fit&&g.height?g.height:t.height()||this.offsetHeight||this.height||t.attr("height")||0;this.cycleW=g.fit&&g.width?g.width:t.width()||this.offsetWidth||this.width||t.attr("width")||0;if(t.is("img")){var n=this.cycleH===0&&this.cycleW===0&&!this.complete;if(n){if(f.s&&g.requeueOnImageNotLoaded&&++a.requeueAttempts<100){i(a.requeueAttempts," - img slide not loaded, requeuing slideshow: ",this.src,this.cycleW,this.cycleH);setTimeout(function(){e(f.s,f.c).cycle(a)},g.requeueTimeout);_=true;return false}else{i("could not determine size of image: "+this.src,this.cycleW,this.cycleH)}}}return true});if(_)return false;g.cssBefore=g.cssBefore||{};g.cssAfter=g.cssAfter||{};g.cssFirst=g.cssFirst||{};g.animIn=g.animIn||{};g.animOut=g.animOut||{};r.not(":eq("+S+")").css(g.cssBefore);e(r[S]).css(g.cssFirst);if(g.timeout){g.timeout=parseInt(g.timeout,10);if(g.speed.constructor==String)g.speed=e.fx.speeds[g.speed]||parseInt(g.speed,10);if(!g.sync)g.speed=g.speed/2;var D=g.fx=="none"?0:g.fx=="shuffle"?500:250;while(g.timeout-g.speed<D)g.timeout+=g.speed}if(g.easing)g.easeIn=g.easeOut=g.easing;if(!g.speedIn)g.speedIn=g.speed;if(!g.speedOut)g.speedOut=g.speed;g.slideCount=o.length;g.currSlide=g.lastSlide=S;if(g.random){if(++g.randomIndex==o.length)g.randomIndex=0;g.nextSlide=g.randomMap[g.randomIndex]}else if(g.backwards)g.nextSlide=g.startingSlide===0?o.length-1:g.startingSlide-1;else g.nextSlide=g.startingSlide>=o.length-1?0:g.startingSlide+1;if(!g.multiFx){var P=e.fn.cycle.transitions[g.fx];if(e.isFunction(P))P(n,r,g);else if(g.fx!="custom"&&!g.multiFx){i("unknown transition: "+g.fx,"; slideshow terminating");return false}}var H=r[S];if(!g.skipInitializationCallbacks){if(g.before.length)g.before[0].apply(H,[H,H,g,true]);if(g.after.length)g.after[0].apply(H,[H,H,g,true])}if(g.next)e(g.next).bind(g.prevNextEvent,function(){return d(g,1)});if(g.prev)e(g.prev).bind(g.prevNextEvent,function(){return d(g,0)});if(g.pager||g.pagerAnchorBuilder)v(o,g);return g}function l(t){t.original={before:[],after:[]};t.original.cssBefore=e.extend({},t.cssBefore);t.original.cssAfter=e.extend({},t.cssAfter);t.original.animIn=e.extend({},t.animIn);t.original.animOut=e.extend({},t.animOut);e.each(t.before,function(){t.original.before.push(this)});e.each(t.after,function(){t.original.after.push(this)})}function c(t){var n,s,o=e.fn.cycle.transitions;if(t.fx.indexOf(",")>0){t.multiFx=true;t.fxs=t.fx.replace(/\s*/g,"").split(",");for(n=0;n<t.fxs.length;n++){var u=t.fxs[n];s=o[u];if(!s||!o.hasOwnProperty(u)||!e.isFunction(s)){i("discarding unknown transition: ",u);t.fxs.splice(n,1);n--}}if(!t.fxs.length){i("No valid transitions named; slideshow terminating.");return false}}else if(t.fx=="all"){t.multiFx=true;t.fxs=[];for(var a in o){if(o.hasOwnProperty(a)){s=o[a];if(o.hasOwnProperty(a)&&e.isFunction(s))t.fxs.push(a)}}}if(t.multiFx&&t.randomizeEffects){var f=Math.floor(Math.random()*20)+30;for(n=0;n<f;n++){var l=Math.floor(Math.random()*t.fxs.length);t.fxs.push(t.fxs.splice(l,1)[0])}r("randomized fx sequence: ",t.fxs)}return true}function h(n,i,s,o){function m(){var e=0,t=i.timeout;if(i.timeout&&!i.continuous){e=p(n[i.currSlide],n[i.nextSlide],i,o);if(i.fx=="shuffle")e-=i.speedOut}else if(i.continuous&&u.cyclePause)e=10;if(e>0)u.cycleTimeout=setTimeout(function(){h(n,i,0,!i.backwards)},e)}var u=i.$cont[0],a=n[i.currSlide],f=n[i.nextSlide];if(s&&i.busy&&i.manualTrump){r("manualTrump in go(), stopping active transition");e(n).stop(true,true);i.busy=0;clearTimeout(u.cycleTimeout)}if(i.busy){r("transition active, ignoring new tx request");return}if(u.cycleStop!=i.stopCount||u.cycleTimeout===0&&!s)return;if(!s&&!u.cyclePause&&!i.bounce&&(i.autostop&&--i.countdown<=0||i.nowrap&&!i.random&&i.nextSlide<i.currSlide)){if(i.end)i.end(i);return}var l=false;if((s||!u.cyclePause)&&i.nextSlide!=i.currSlide){l=true;var c=i.fx;a.cycleH=a.cycleH||e(a).height();a.cycleW=a.cycleW||e(a).width();f.cycleH=f.cycleH||e(f).height();f.cycleW=f.cycleW||e(f).width();if(i.multiFx){if(o&&(i.lastFx===t||++i.lastFx>=i.fxs.length))i.lastFx=0;else if(!o&&(i.lastFx===t||--i.lastFx<0))i.lastFx=i.fxs.length-1;c=i.fxs[i.lastFx]}if(i.oneTimeFx){c=i.oneTimeFx;i.oneTimeFx=null}e.fn.cycle.resetState(i,c);if(i.before.length)e.each(i.before,function(e,t){if(u.cycleStop!=i.stopCount)return;t.apply(f,[a,f,i,o])});var d=function(){i.busy=0;e.each(i.after,function(e,t){if(u.cycleStop!=i.stopCount)return;t.apply(f,[a,f,i,o])});if(!u.cycleStop){m()}};r("tx firing("+c+"); currSlide: "+i.currSlide+"; nextSlide: "+i.nextSlide);i.busy=1;if(i.fxFn)i.fxFn(a,f,i,d,o,s&&i.fastOnEvent);else if(e.isFunction(e.fn.cycle[i.fx]))e.fn.cycle[i.fx](a,f,i,d,o,s&&i.fastOnEvent);else e.fn.cycle.custom(a,f,i,d,o,s&&i.fastOnEvent)}else{m()}if(l||i.nextSlide==i.currSlide){var v;i.lastSlide=i.currSlide;if(i.random){i.currSlide=i.nextSlide;if(++i.randomIndex==n.length){i.randomIndex=0;i.randomMap.sort(function(e,t){return Math.random()-.5})}i.nextSlide=i.randomMap[i.randomIndex];if(i.nextSlide==i.currSlide)i.nextSlide=i.currSlide==i.slideCount-1?0:i.currSlide+1}else if(i.backwards){v=i.nextSlide-1<0;if(v&&i.bounce){i.backwards=!i.backwards;i.nextSlide=1;i.currSlide=0}else{i.nextSlide=v?n.length-1:i.nextSlide-1;i.currSlide=v?0:i.nextSlide+1}}else{v=i.nextSlide+1==n.length;if(v&&i.bounce){i.backwards=!i.backwards;i.nextSlide=n.length-2;i.currSlide=n.length-1}else{i.nextSlide=v?0:i.nextSlide+1;i.currSlide=v?n.length-1:i.nextSlide-1}}}if(l&&i.pager)i.updateActivePagerLink(i.pager,i.currSlide,i.activePagerClass)}function p(e,t,n,i){if(n.timeoutFn){var s=n.timeoutFn.call(e,e,t,n,i);while(n.fx!="none"&&s-n.speed<250)s+=n.speed;r("calculated timeout: "+s+"; speed: "+n.speed);if(s!==false)return s}return n.timeout}function d(t,n){var r=n?1:-1;var i=t.elements;var s=t.$cont[0],o=s.cycleTimeout;if(o){clearTimeout(o);s.cycleTimeout=0}if(t.random&&r<0){t.randomIndex--;if(--t.randomIndex==-2)t.randomIndex=i.length-2;else if(t.randomIndex==-1)t.randomIndex=i.length-1;t.nextSlide=t.randomMap[t.randomIndex]}else if(t.random){t.nextSlide=t.randomMap[t.randomIndex]}else{t.nextSlide=t.currSlide+r;if(t.nextSlide<0){if(t.nowrap)return false;t.nextSlide=i.length-1}else if(t.nextSlide>=i.length){if(t.nowrap)return false;t.nextSlide=0}}var u=t.onPrevNextEvent||t.prevNextClick;if(e.isFunction(u))u(r>0,t.nextSlide,i[t.nextSlide]);h(i,t,1,n);return false}function v(t,n){var r=e(n.pager);e.each(t,function(i,s){e.fn.cycle.createPagerAnchor(i,s,r,t,n)});n.updateActivePagerLink(n.pager,n.startingSlide,n.activePagerClass)}function m(t){function n(e){e=parseInt(e,10).toString(16);return e.length<2?"0"+e:e}function i(t){for(;t&&t.nodeName.toLowerCase()!="html";t=t.parentNode){var r=e.css(t,"background-color");if(r&&r.indexOf("rgb")>=0){var i=r.match(/\d+/g);return"#"+n(i[0])+n(i[1])+n(i[2])}if(r&&r!="transparent")return r}return"#ffffff"}r("applying clearType background-color hack");t.each(function(){e(this).css("background-color",i(this))})}var n="3.0.2";e.expr[":"].paused=function(e){return e.cyclePause};e.fn.cycle=function(t,n){var s={s:this.selector,c:this.context};if(this.length===0&&t!="stop"){if(!e.isReady&&s.s){i("DOM not ready, queuing slideshow");e(function(){e(s.s,s.c).cycle(t,n)});return this}i("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)"));return this}return this.each(function(){var u=o(this,t,n);if(u===false)return;u.updateActivePagerLink=u.updateActivePagerLink||e.fn.cycle.updateActivePagerLink;if(this.cycleTimeout)clearTimeout(this.cycleTimeout);this.cycleTimeout=this.cyclePause=0;this.cycleStop=0;var a=e(this);var l=u.slideExpr?e(u.slideExpr,this):a.children();var c=l.get();if(c.length<2){i("terminating; too few slides: "+c.length);return}var d=f(a,l,c,u,s);if(d===false)return;var v=d.continuous?10:p(c[d.currSlide],c[d.nextSlide],d,!d.backwards);if(v){v+=d.delay||0;if(v<10)v=10;r("first timeout: "+v);this.cycleTimeout=setTimeout(function(){h(c,d,0,!u.backwards)},v)}})};e.fn.cycle.resetState=function(t,n){n=n||t.fx;t.before=[];t.after=[];t.cssBefore=e.extend({},t.original.cssBefore);t.cssAfter=e.extend({},t.original.cssAfter);t.animIn=e.extend({},t.original.animIn);t.animOut=e.extend({},t.original.animOut);t.fxFn=null;e.each(t.original.before,function(){t.before.push(this)});e.each(t.original.after,function(){t.after.push(this)});var r=e.fn.cycle.transitions[n];if(e.isFunction(r))r(t.$cont,e(t.elements),t)};e.fn.cycle.updateActivePagerLink=function(t,n,r){e(t).each(function(){e(this).children().removeClass(r).eq(n).addClass(r)})};e.fn.cycle.next=function(e){d(e,1)};e.fn.cycle.prev=function(e){d(e,0)};e.fn.cycle.createPagerAnchor=function(t,n,i,o,u){var a;if(e.isFunction(u.pagerAnchorBuilder)){a=u.pagerAnchorBuilder(t,n);r("pagerAnchorBuilder("+t+", el) returned: "+a)}else a='<a href="#">'+(t+1)+"</a>";if(!a)return;var f=e(a);if(f.parents("body").length===0){var l=[];if(i.length>1){i.each(function(){var t=f.clone(true);e(this).append(t);l.push(t[0])});f=e(l)}else{f.appendTo(i)}}u.pagerAnchors=u.pagerAnchors||[];u.pagerAnchors.push(f);var c=function(n){n.preventDefault();u.nextSlide=t;var r=u.$cont[0],i=r.cycleTimeout;if(i){clearTimeout(i);r.cycleTimeout=0}var s=u.onPagerEvent||u.pagerClick;if(e.isFunction(s))s(u.nextSlide,o[u.nextSlide]);h(o,u,1,u.currSlide<t)};if(/mouseenter|mouseover/i.test(u.pagerEvent)){f.hover(c,function(){})}else{f.bind(u.pagerEvent,c)}if(!/^click/.test(u.pagerEvent)&&!u.allowPagerClickBubble)f.bind("click.cycle",function(){return false});var p=u.$cont[0];var d=false;if(u.pauseOnPagerHover){f.hover(function(){d=true;p.cyclePause++;s(p,true,true)},function(){if(d)p.cyclePause--;s(p,true,true)})}};e.fn.cycle.hopsFromLast=function(e,t){var n,r=e.lastSlide,i=e.currSlide;if(t)n=i>r?i-r:e.slideCount-r;else n=i<r?r-i:r+e.slideCount-i;return n};e.fn.cycle.commonReset=function(t,n,r,i,s,o){e(r.elements).not(t).hide();if(typeof r.cssBefore.opacity=="undefined")r.cssBefore.opacity=1;r.cssBefore.display="block";if(r.slideResize&&i!==false&&n.cycleW>0)r.cssBefore.width=n.cycleW;if(r.slideResize&&s!==false&&n.cycleH>0)r.cssBefore.height=n.cycleH;r.cssAfter=r.cssAfter||{};r.cssAfter.display="none";e(t).css("zIndex",r.slideCount+(o===true?1:0));e(n).css("zIndex",r.slideCount+(o===true?0:1))};e.fn.cycle.custom=function(t,n,r,i,s,o){var u=e(t),a=e(n);var f=r.speedIn,l=r.speedOut,c=r.easeIn,h=r.easeOut;a.css(r.cssBefore);if(o){if(typeof o=="number")f=l=o;else f=l=1;c=h=null}var p=function(){a.animate(r.animIn,f,c,function(){i()})};u.animate(r.animOut,l,h,function(){u.css(r.cssAfter);if(!r.sync)p()});if(r.sync)p()};e.fn.cycle.transitions={fade:function(t,n,r){n.not(":eq("+r.currSlide+")").css("opacity",0);r.before.push(function(t,n,r){e.fn.cycle.commonReset(t,n,r);r.cssBefore.opacity=0});r.animIn={opacity:1};r.animOut={opacity:0};r.cssBefore={top:0,left:0}}};e.fn.cycle.ver=function(){return n};e.fn.cycle.defaults={activePagerClass:"activeSlide",after:null,allowPagerClickBubble:false,animIn:null,animOut:null,aspect:false,autostop:0,autostopCount:0,backwards:false,before:null,center:null,cleartype:!e.support.opacity,cleartypeNoBg:false,containerResize:1,containerResizeHeight:0,continuous:0,cssAfter:null,cssBefore:null,delay:0,easeIn:null,easeOut:null,easing:null,end:null,fastOnEvent:0,fit:0,fx:"fade",fxFn:null,height:"auto",manualTrump:true,metaAttr:"cycle",next:null,nowrap:0,onPagerEvent:null,onPrevNextEvent:null,pager:null,pagerAnchorBuilder:null,pagerEvent:"click.cycle",pause:0,pauseOnPagerHover:0,prev:null,prevNextEvent:"click.cycle",random:0,randomizeEffects:1,requeueOnImageNotLoaded:true,requeueTimeout:250,rev:0,shuffle:null,skipInitializationCallbacks:false,slideExpr:null,slideResize:1,speed:1e3,speedIn:null,speedOut:null,startingSlide:t,sync:1,timeout:4e3,timeoutFn:null,updateActivePagerLink:null,width:null}})(jQuery)