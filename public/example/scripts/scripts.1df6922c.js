"use strict";angular.module("bhwheatherApp",["ngAnimate","ngCookies","ngResource","ngRoute","ngSanitize","ngTouch","angularCharts"]).config(["$routeProvider",function(a){a.when("/",{templateUrl:"views/main.html",controller:"MainCtrl"}).when("/about",{templateUrl:"views/about.html",controller:"AboutCtrl"}).otherwise({redirectTo:"/"})}]),angular.module("bhwheatherApp").controller("MainCtrl",["$scope","$http",function(a,b){a.weatherData,a.chartType="line",a.dataSerials,a.dataSerialsMoist,a.config1={labels:!1,title:"Weather",legend:{display:!0,position:"right"},innerRadius:0,lineLegend:"lineEnd"},b.jsonp("/api/sensor/8c81c348-9423-41d8-87a2-a5c2b3298b2e?api_key=qMR1S8lijc46gaAnrSXD&callback=JSON_CALLBACK").success(function(b){b[0].data.slice(1,50);a.weatherData=b[0].data;var c=[],d=0;angular.forEach(a.weatherData,function(a){var b=a.created_at.split(/[- :]/),e=new Date(b[0],b[1]-1,b[2],b[3],b[4],b[5]),f=new Date;if(f.setHours(e.getHours()-5),f.getHours()!=d){var g={x:[f.getHours()+"H"],y:[parseInt(a.temperature),parseFloat(a.moisture)]};c.push(g),d=f.getHours()}}),a.dataSerials=c,a.data1={series:["C","%"],data:a.dataSerials}}),a.awesomeThings=["HTML5 Boilerplate","AngularJS","Karma"]}]),angular.module("bhwheatherApp").controller("AboutCtrl",["$scope",function(a){a.awesomeThings=["HTML5 Boilerplate","AngularJS","Karma"]}]);