/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/lifewake.js":
/*!**********************************!*\
  !*** ./resources/js/lifewake.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  alert('Life Wake!');
}); // var chart = c3.generate({
//     data: {
//         selection: {
//             draggable: true
//         },
//         columns: [
//             ['data1', 300, 350, 300, 0,450, 100],
//         ]
//     }
// });

$(function () {
  $("#sortable").sortable();
  $("#sortable").disableSelection();
});
var dataset = [{
  key: 0,
  x: 0,
  y: 50,
  title: "aaa",
  content: "aaaaaaaaaaaaaaa"
}, {
  key: 1,
  x: 50,
  y: 80,
  title: "bbb",
  content: "bbbbbbbbbbbbbbb"
}, {
  key: 2,
  x: 100,
  y: 50,
  title: "ccc",
  content: "ccccccccccccccc"
}, {
  key: 3,
  x: 150,
  y: 20,
  title: "ddd",
  content: "ddddddddddddddd"
}, {
  key: 4,
  x: 200,
  y: 75,
  title: "eee",
  content: "eeeeeeeeeeeeeee"
}, {
  key: 5,
  x: 250,
  y: 100,
  title: "fff",
  content: "fffffffffffffff"
}, {
  key: 6,
  x: 300,
  y: 75,
  title: "ggg",
  content: "ggggggggggggggg"
}, {
  key: 7,
  x: 350,
  y: 20,
  title: "hhh",
  content: "hhhhhhhhhhhhhhh"
}, {
  key: 8,
  x: 400,
  y: 0,
  title: "iii",
  content: "iiiiiiiiiiiiiii"
}, {
  key: 9,
  x: 450,
  y: 50,
  title: "jjj",
  content: "jjjjjjjjjjjjjjj"
}]; //y値をスライダーのvalueとテキストに代入

var sliders_num = 10;

for (i = 0; i < sliders_num; i++) {
  console.log(dataset[i].title);
  document.getElementById("slider".concat(i)).value = dataset[i].y;
  document.getElementById("slider".concat(i, "-value")).innerHTML = dataset[i].y;
  document.getElementById("event-title".concat(i)).value = dataset[i].title;
  document.getElementById("event-content".concat(i)).value = dataset[i].content;
} //保存ボタンクリックでデータを更新


btn0.addEventListener('click', function () {
  // dataset[this.key].title = document.myform.title.value;
  dataset[0].title = document.getElementById("event-title0").value;
  dataset[0].content = document.getElementById("event-content0").value;
  console.log(dataset); //ラベル更新

  svg.selectAll(".label").data(dataset, key).text(function (d, i) {
    return d.title;
  });
}); //キー関数定義（データを要素にバインド）

var key = function key(d) {
  return d.key;
}; //ツールチップ用div要素


var tooltip = d3.select("body").append("div").attr("class", "tooltip"); //SVG設定

var width = 800;
var height = 500;
var margin = {
  "top": 50,
  "bottom": 50,
  "right": 50,
  "left": 50
};
var svg = d3.select("#svg-area").append("svg").attr("width", width).attr("height", height); //軸スケール設定

var xScale = d3.scaleLinear().domain([0, d3.max(dataset, function (d) {
  return d.x;
})]).range([margin.left, width - margin.right]);
var yScale = d3.scaleLinear().domain([0, 100]).range([height - margin.bottom, margin.top]); //軸表示

var axisx = d3.axisBottom(xScale).ticks(5);
var axisy = d3.axisLeft(yScale).ticks(5);
svg.append("g").attr("transform", "translate(" + 0 + "," + (height - margin.bottom) + ")").call(axisx).append("text").attr("fill", "black").attr("x", (width - margin.left - margin.right) / 2 + margin.left).attr("y", 35).attr("text-anchor", "middle").attr("font-size", "10pt").attr("font-weight", "bold").text("Date");
svg.append("g").attr("transform", "translate(" + margin.left + "," + 0 + ")").call(axisy).append("text").attr("fill", "black").attr("text-anchor", "middle").attr("x", -(height - margin.top - margin.bottom) / 2 - margin.top).attr("y", -35).attr("transform", "rotate(-90)").attr("font-weight", "bold").attr("font-size", "10pt").text("Happiness"); //折れ線グラフ表示

svg.append("path").datum(dataset, key).attr("class", "line").attr("fill", "none").attr("stroke", "steelblue").attr("stroke-width", 1.5).attr("d", d3.line().x(function (d) {
  return xScale(d.x);
}).y(function (d) {
  return yScale(d.y);
}).curve(d3.curveCatmullRom)); //ドット表示とツールチップの条件表示

svg.append("g").selectAll("circle").data(dataset, key).enter().append("circle").attr("cx", function (d) {
  return xScale(d.x);
}).attr("cy", function (d) {
  return yScale(d.y);
}).attr("fill", "steelblue").attr("r", 10) // .attr("class", "circle")
.on("mouseover", function (d) {
  tooltip.style("visibility", "visible").html(d.title + "<br>" + d.content);
}).on("mousemove", function (d) {
  tooltip.style("top", d3.event.pageY - 20 + "px").style("left", d3.event.pageX + 10 + "px");
}).on("mouseout", function (d) {
  tooltip.style("visibility", "hidden");
}); //ラベル表示

svg.append("g").selectAll("circle").data(dataset, key).enter().append("text") // テキスト要素追加
.attr("class", "label").attr("x", function (d) {
  return xScale(d.x);
}).attr("y", function (d) {
  return yScale(d.y);
}).text(function (d, i) {
  return d.title;
}).attr("dx", "+18px").attr("dy", "-18px").attr("fill", "blue").attr("font-size", "15px").attr('text-anchor', "start"); //スライダーを監視してupdate関数に代入 

for (i = 0; i <= sliders_num; i++) {
  d3.select("#slider".concat(i)).on("input", function () {
    update(this.value, this.id);
  });
} //update関数


function update(value, id) {
  //スライダーの値をテキスト表示
  d3.select("#" + id + "-value").text(value); //スライダーの値をドットに代入

  if (id == "slider0") {
    dataset[0].y = value;
  } else if (id == "slider1") {
    dataset[1].y = value;
  } else if (id == "slider2") {
    dataset[2].y = value;
  } else if (id == "slider3") {
    dataset[3].y = value;
  } else if (id == "slider4") {
    dataset[4].y = value;
  } else if (id == "slider5") {
    dataset[5].y = value;
  } else if (id == "slider6") {
    dataset[6].y = value;
  } else if (id == "slider7") {
    dataset[7].y = value;
  } else if (id == "slider8") {
    dataset[8].y = value;
  } else if (id == "slider9") {
    dataset[9].y = value;
  } //ドット更新


  svg.selectAll("circle").data(dataset, key).attr("cy", function (d) {
    return yScale(d.y);
  }); //ラベル更新

  svg.selectAll(".label").data(dataset, key).attr("y", function (d) {
    return yScale(d.y);
  }); //折れ線グラフ更新

  svg.selectAll(".line").datum(dataset, key).attr("d", d3.line().x(function (d) {
    return xScale(d.x);
  }).y(function (d) {
    return yScale(d.y);
  }).curve(d3.curveCatmullRom));
}

/***/ }),

/***/ 1:
/*!****************************************!*\
  !*** multi ./resources/js/lifewake.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ec2-user/environment/cms/resources/js/lifewake.js */"./resources/js/lifewake.js");


/***/ })

/******/ });