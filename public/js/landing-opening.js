/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/landing-opening.js":
/*!*****************************************!*\
  !*** ./resources/js/landing-opening.js ***!
  \*****************************************/
/***/ (() => {

// import { render } from 'react-dom'
// import QuickOrder from './components/QuickOrder'
// quick order
// const quickOrderElement = document.getElementById("react-quick-order")
// if (quickOrderElement) {
//     render(<QuickOrder reCAPTCHA_Key={quickOrderElement.getAttribute('data-recaptcha')} targetApi={quickOrderElement.getAttribute('data-post-api')}/>, quickOrderElement)
// }
document.querySelectorAll('#faq-list > div > p:first-child').forEach(function (el, i) {
  el.addEventListener('click', function () {
    var icon = this.querySelector('i.far').classList;
    icon.toggle('fa-times-circle');
    icon.toggle('fa-caret-circle-down');
    this.parentNode.querySelector('p:nth-child(2)').classList.toggle('hidden');
    this.parentNode.parentNode.querySelectorAll("div:not(:nth-child(".concat(i + 1, "))")).forEach(function (sibling) {
      sibling.querySelector('p:nth-child(2)').classList.add('hidden');
      var ic = sibling.querySelector('i.far').classList;
      ic.remove('fa-times-circle');
      ic.add('fa-caret-circle-down');
    });
  });
}); // this code is for handling the menu in < md sizes

var body = document.body;

function toggle_menu() {
  var is_open,
      menu_el = document.getElementById("menu-list"),
      toggle_classes = ["opacity-0", "pointer-events-none"];
  is_open = menu_el.classList.contains("open");

  if (is_open) {
    menu_el.classList.remove("open");
    setTimeout(function () {
      menu_el.classList.add("hidden");
      toggle_classes.forEach(function (classname) {
        document.getElementById("menu-open").classList.toggle(classname);
      });
    }, 400);
  } else {
    menu_el.classList.remove("hidden");
    setTimeout(function () {
      menu_el.classList.add("open");
      toggle_classes.forEach(function (classname) {
        document.getElementById("menu-open").classList.toggle(classname);
      });
    }, 0);
  }

  body.classList.toggle("overflow-y-hidden");
}

body.addEventListener("click", function (e) {
  var el = e.target,
      menu_el = document.getElementById("menu-list");

  if (menu_el.classList.contains("open") && !el.closest("#menu-list") || el.closest("#menu-close") || el.closest("#menu-open")) {
    toggle_menu();
  }
}); // this code will set the header navbar fixed according to the window height

function setHeader() {
  var window_height = window.innerHeight,
      offset_top = body.scrollTop,
      target_header = document.getElementById("landing-header"),
      header_nav = document.getElementById("header-nav");

  if (window.innerWidth >= 768) {
    if (offset_top >= window_height && !target_header.classList.contains("pt-14")) {
      target_header.classList.add("pt-14");
      header_nav.classList.add("!fixed");
      header_nav.classList.add("slideInDown");
      setTimeout(function () {
        header_nav.classList.remove("slideInDown");
      }, 200);
    } else if (offset_top < window_height && target_header.classList.contains("pt-14")) {
      header_nav.classList.add("slideOutUp");
      setTimeout(function () {
        target_header.classList.remove("pt-14");
        header_nav.classList.remove("!fixed");
        header_nav.classList.remove("slideOutUp");
      }, 200);
    }
  } else {
    target_header.classList.remove("pt-14");
    header_nav.classList.remove("slideInDown", "slideOutUp", "!fixed");
  }
} // we use the above code as a trigger for scroll evenets and resize window events


body.addEventListener("scroll", function () {
  setHeader();
});
window.addEventListener("resize", function () {
  setHeader();
});

/***/ }),

/***/ "./resources/css/landing.css":
/*!***********************************!*\
  !*** ./resources/css/landing.css ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/landing-opening": 0,
/******/ 			"css/landing": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/landing"], () => (__webpack_require__("./resources/js/landing-opening.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/landing"], () => (__webpack_require__("./resources/css/landing.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;