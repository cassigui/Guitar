(window.webpackJsonp=window.webpackJsonp||[]).push([[42],{sFsg:function(e,t,n){"use strict";n.r(t),n.d(t,"IndexPageModule",function(){return F});var o=n("tyNb"),i=n("HJNQ"),c=n("mrSG"),r=n("TEn/"),s=n("Qv/T"),l=n("fXoL"),a=n("ao1k"),d=n("IfTO"),b=n("G2dz"),u=n("3Pt+"),h=n("ofXK");const p=["search"],f=function(){return["/product-classes/create"]};function g(e,t){1&e&&(l.Rb(0,"ion-button",24),l.Mb(1,"ion-icon",25),l.Qb()),2&e&&l.jc("routerLink",l.lc(1,f))}const m=function(e){return["/product-classes",e]};function v(e,t){if(1&e&&(l.Rb(0,"ion-button",30),l.Mb(1,"ion-icon",31),l.zc(2," edit "),l.Qb()),2&e){const e=l.dc().$implicit;l.jc("routerLink",l.mc(1,m,e.id))}}function Q(e,t){if(1&e){const e=l.Sb();l.Rb(0,"ion-button",32),l.Zb("click",function(t){l.sc(e);const n=l.dc().$implicit;return l.dc().remove(n,t)}),l.Mb(1,"ion-icon",33),l.zc(2," remove "),l.Qb()}}const R=function(){return{update:"product_classes"}},x=function(e){return[e]},z=function(){return{delete:"product_classes"}};function _(e,t){if(1&e&&(l.Rb(0,"ion-item",null,26),l.Rb(2,"ion-col",16),l.zc(3),l.Qb(),l.Rb(4,"ion-col",17),l.zc(5),l.Qb(),l.Rb(6,"ion-col",27),l.xc(7,v,3,3,"ion-button",28),l.xc(8,Q,3,0,"ion-button",29),l.Qb(),l.Qb()),2&e){const e=t.$implicit;l.zb(3),l.Bc("#",e.id,""),l.zb(2),l.Bc(" ",e.name," "),l.zb(2),l.jc("ifAuth",l.mc(5,x,l.lc(4,R))),l.zb(1),l.jc("ifAuth",l.mc(8,x,l.lc(7,z)))}}function k(e,t){1&e&&(l.Rb(0,"div"),l.Mb(1,"ion-skeleton-text",34),l.Qb())}function w(e,t){if(1&e&&(l.Pb(0),l.xc(1,k,2,0,"div",18),l.Ob()),2&e){const e=l.dc();l.zb(1),l.jc("ngForOf",e.trs)}}function j(e,t){if(1&e){const e=l.Sb();l.Rb(0,"ion-row",35),l.Rb(1,"ion-col",36),l.Rb(2,"ion-icon",37),l.Zb("click",function(){return l.sc(e),l.dc().content.scrollToTop(500)}),l.Qb(),l.Rb(3,"ion-label",38),l.zc(4," Todos registros foram listados "),l.Mb(5,"ion-icon",39),l.Qb(),l.Qb(),l.Qb()}if(2&e){const e=l.dc();l.zb(2),l.jc("hidden",e.product_classes.length<10)}}function M(e,t){1&e&&(l.Rb(0,"ion-row",40),l.Rb(1,"ion-col",36),l.Rb(2,"ion-label",41),l.zc(3,"  Não há registros. "),l.Qb(),l.Qb(),l.Qb())}const S=function(){return{create:"product_classes"}},y=[{path:"",component:(()=>{class e{constructor(e,t){this.productClassService=e,this.helperService=t,this.product_classes=[],this.loading=!1,this.filters={name:null},this.total_of_data=0,this._paginate={take:30,page:1},this.trs=new Array(5),this.tds=new Array(1)}ngOnInit(){}ionViewWillEnter(){this.paginate(null,null)}getFilters(){var e={};return Object.keys(this.filters).forEach(t=>{this.filters[t]&&(e[t]="%"+this.filters[t]+"%")},this),e}paginate(e=null,t=null){return Object(c.a)(this,void 0,void 0,function*(){(null!==e||null==e&&null==t)&&(this.product_classes=[],this._paginate.page=1),this.loading=!0,this.productClassService.get([],this.getFilters(),this._paginate).then(n=>Object(c.a)(this,void 0,void 0,function*(){this.total_of_data=n.product_classes.total,this._paginate.page=n.product_classes.current_page+1;for(let e of n.product_classes.data)this.product_classes.push(new s.a(e));this.loading=!1,e&&e.target.complete(),t&&t.target.complete()}),e=>{this.helperService.responseErrors(e)})})}remove(e,t){return Object(c.a)(this,void 0,void 0,function*(){let n=yield this.helperService.popover(t,"He is sure?",[{text:"back",color:"gray",value:!1},{text:"remove",color:"danger",value:!0}]);n.onDidDismiss().then(t=>{!0===t.data&&(this.helperService.loading("Removendo"),this.destroy(e))}),n.present()})}destroy(e){this.productClassService.destroy(e.id).then(t=>{if(!t.error){var n=this.product_classes.findIndex(t=>t.id==e.id);n>-1&&this.product_classes.splice(n,1)}this.helperService.toast(t.error?"warning":"success",t.message)},e=>{this.helperService.responseErrors(e)}).then(()=>this.helperService.loading_dismiss())}toggleSearch(){this.showFilter=!this.showFilter,this.showFilter&&setTimeout(()=>{this.search.setFocus()},100)}}return e.\u0275fac=function(t){return new(t||e)(l.Lb(a.a),l.Lb(d.a))},e.\u0275cmp=l.Fb({type:e,selectors:[["app-index"]],viewQuery:function(e,t){if(1&e&&(l.Ec(p,1),l.Ec(r.k,1),l.Ec(r.p,1)),2&e){let e;l.pc(e=l.ac())&&(t.search=e.first),l.pc(e=l.ac())&&(t.content=e.first),l.pc(e=l.ac())&&(t.infiniteScroll=e.first)}},decls:34,vars:12,consts:[["mode","ios"],["mode","ios","slot","start"],[3,"click"],["slot","end"],["mode","ios","color","white",3,"routerLink",4,"ifAuth"],["mode","ios",3,"color","click"],["name","funnel"],[1,"ion-no-padding"],["slot","fixed",1,"text-darkprimary",3,"ionRefresh"],["pullingText","Atualizar","refreshingSpinner","dots","refreshingText","Atualizando"],["lines","full","mode","ios",1,"no-border","mb-0"],["color","customer","mode","md",3,"hidden"],["debounce","250","mode","ios","placeholder","id ...",1,"p0","input-light",3,"ngModel","ngModelChange","ionChange"],["search",""],["debounce","250","mode","ios","placeholder","nome ...",1,"p0","input-light",3,"ngModel","ngModelChange","ionChange"],["mode","md"],["size","3"],["size","6"],[4,"ngFor","ngForOf"],[4,"ngIf"],["threshold","30px",3,"ionInfinite"],["loadingSpinner","none"],["class","no-border","text-center","",4,"ngIf"],["color","light","text-center","",4,"ngIf"],["mode","ios","color","white",3,"routerLink"],["name","add-circle"],["slidingItem",""],["size","3",1,"block","text-right"],["color","primary","class","text-center","expandable","",3,"routerLink",4,"ifAuth"],["color","danger","expandable","","class","text-center",3,"click",4,"ifAuth"],["color","primary","expandable","",1,"text-center",3,"routerLink"],["slot","start","name","create",1,"m0"],["color","danger","expandable","",1,"text-center",3,"click"],["slot","start","name","trash",1,"m0"],["animated","",2,"width","100%","height","50px"],["text-center","",1,"no-border"],[1,"text-center"],["color","medium","size","large","name","caret-up-circle-outline",1,"mt-15","ion-float-end",3,"hidden","click"],["color","medium",1,"p20"],["name","thumbs-up","color","medium"],["color","light","text-center",""],["padding-top","","padding-bottom",""]],template:function(e,t){1&e&&(l.Rb(0,"ion-header"),l.Rb(1,"ion-toolbar",0),l.Mb(2,"ion-menu-button",1),l.Rb(3,"ion-title",2),l.Zb("click",function(){return t.content.scrollToTop(500)}),l.zc(4,"Product Classes"),l.Qb(),l.Rb(5,"ion-buttons",3),l.xc(6,g,2,2,"ion-button",4),l.Rb(7,"ion-button",5),l.Zb("click",function(){return t.toggleSearch()}),l.Mb(8,"ion-icon",6),l.Qb(),l.Qb(),l.Qb(),l.Qb(),l.Rb(9,"ion-content",7),l.Rb(10,"ion-refresher",8),l.Zb("ionRefresh",function(e){return t.paginate(e)}),l.Mb(11,"ion-refresher-content",9),l.Qb(),l.Rb(12,"ion-row"),l.Rb(13,"ion-col",7),l.Rb(14,"ion-list",10),l.Rb(15,"ion-item-divider",11),l.Rb(16,"ion-col"),l.Rb(17,"ion-searchbar",12,13),l.Zb("ngModelChange",function(e){return t.filters.id=e})("ionChange",function(){return t.paginate()}),l.Qb(),l.Qb(),l.Rb(19,"ion-col"),l.Rb(20,"ion-searchbar",14,13),l.Zb("ngModelChange",function(e){return t.filters.name=e})("ionChange",function(){return t.paginate()}),l.Qb(),l.Qb(),l.Qb(),l.Rb(22,"ion-item-divider",15),l.Rb(23,"ion-col",16),l.zc(24,"#Id"),l.Qb(),l.Rb(25,"ion-col",17),l.zc(26,"Name"),l.Qb(),l.Mb(27,"ion-col",16),l.Qb(),l.xc(28,_,9,10,"ion-item",18),l.xc(29,w,2,1,"ng-container",19),l.Rb(30,"ion-infinite-scroll",20),l.Zb("ionInfinite",function(e){return t.paginate(null,e)}),l.Mb(31,"ion-infinite-scroll-content",21),l.Qb(),l.xc(32,j,6,1,"ion-row",22),l.xc(33,M,4,0,"ion-row",23),l.Qb(),l.Qb(),l.Qb(),l.Qb()),2&e&&(l.zb(6),l.jc("ifAuth",l.mc(10,x,l.lc(9,S))),l.zb(1),l.kc("color",t.showFilter?"medium":"white"),l.zb(8),l.jc("hidden",!t.showFilter),l.zb(2),l.jc("ngModel",t.filters.id),l.zb(3),l.jc("ngModel",t.filters.name),l.zb(8),l.jc("ngForOf",t.product_classes),l.zb(1),l.jc("ngIf",t.loading),l.zb(3),l.jc("ngIf",t.total_of_data===t.product_classes.length&&t.total_of_data>0),l.zb(1),l.jc("ngIf",!t.loading&&!t.product_classes.length))},directives:[r.n,r.O,r.A,r.M,r.g,b.a,r.f,r.o,r.k,r.C,r.D,r.F,r.j,r.y,r.t,r.G,r.Z,u.g,u.h,h.k,h.l,r.p,r.q,r.Y,o.g,r.s,r.H,r.x],encapsulation:2}),e})()}];let F=(()=>{class e{}return e.\u0275fac=function(t){return new(t||e)},e.\u0275mod=l.Jb({type:e}),e.\u0275inj=l.Ib({providers:[],imports:[[i.a,o.i.forChild(y)]]}),e})()}}]);
