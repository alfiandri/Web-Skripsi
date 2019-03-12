// cursor by codrops
$(document).ready(function(){const a=(c,a,b)=>(1-b)*c+b*a,b=document.body,c=a=>{let c=0,d=0;return a||(a=window.event),a.pageX||a.pageY?(c=a.pageX,d=a.pageY):(a.clientX||a.clientY)&&(c=a.clientX+b.scrollLeft+document.documentElement.scrollLeft,d=a.clientY+b.scrollTop+document.documentElement.scrollTop),{x:c,y:d}};const d=new// Custom mouse cursor.
class{constructor(a){this.DOM={el:a},this.DOM.dot=this.DOM.el.querySelector(".cursor__inner--dot"),this.DOM.circle=this.DOM.el.querySelector(".cursor__inner--circle"),this.bounds={dot:this.DOM.dot.getBoundingClientRect(),circle:this.DOM.circle.getBoundingClientRect()},this.scale=1,this.opacity=1,this.mousePos={x:0,y:0},this.lastMousePos={dot:{x:0,y:0},circle:{x:0,y:0}},this.lastScale=1,this.lastOpacity=1,this.initEvents(),requestAnimationFrame(()=>this.render())}initEvents(){window.addEventListener("mousemove",a=>this.mousePos=c(a))}render(){this.lastMousePos.dot.x=a(this.lastMousePos.dot.x,this.mousePos.x-this.bounds.dot.width/2,1),this.lastMousePos.dot.y=a(this.lastMousePos.dot.y,this.mousePos.y-this.bounds.dot.height/2,1),this.lastMousePos.circle.x=a(this.lastMousePos.circle.x,this.mousePos.x-this.bounds.circle.width/2,.15),this.lastMousePos.circle.y=a(this.lastMousePos.circle.y,this.mousePos.y-this.bounds.circle.height/2,.15),this.lastScale=a(this.lastScale,this.scale,.15),this.lastOpacity=a(this.lastOpacity,this.opacity,.1),this.DOM.dot.style.transform=`translateX(${this.lastMousePos.dot.x}px) translateY(${this.lastMousePos.dot.y}px)`,this.DOM.circle.style.transform=`translateX(${this.lastMousePos.circle.x}px) translateY(${this.lastMousePos.circle.y}px) scale(${this.lastScale})`,this.DOM.circle.style.opacity=this.lastOpacity,requestAnimationFrame(()=>this.render())}enter(){d.scale=2.7}leave(){d.scale=1}click(){this.lastScale=1,this.lastOpacity=0}}(document.querySelector(".cursor"));// Custom cursor chnages state when hovering on elements with 'data-hover'.
[...document.querySelectorAll("[data-hover]")].forEach(a=>{a.addEventListener("mouseenter",()=>d.enter()),a.addEventListener("mouseleave",()=>d.leave()),a.addEventListener("click",()=>d.click())})});