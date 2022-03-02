"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_react_Pages_Private_Finance_Discounts_Discounts_jsx"],{

/***/ "./resources/js/react/Pages/Private/Finance/Discounts/Discounts.jsx":
/*!**************************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Finance/Discounts/Discounts.jsx ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _services_AlertService__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../services/AlertService */ "./resources/js/services/AlertService.js");
/* harmony import */ var _hooks__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../hooks */ "./resources/js/react/hooks.js");
/* harmony import */ var _Layout_components_Loading__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../Layout/components/Loading */ "./resources/js/react/Pages/Private/Layout/components/Loading.jsx");
/* harmony import */ var _Layout_components_NoItem__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../Layout/components/NoItem */ "./resources/js/react/Pages/Private/Layout/components/NoItem.jsx");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }



function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }









var Discounts = /*#__PURE__*/function (_Component) {
  _inherits(Discounts, _Component);

  var _super = _createSuper(Discounts);

  function Discounts(props) {
    var _this;

    _classCallCheck(this, Discounts);

    _this = _super.call(this, props);

    _defineProperty(_assertThisInitialized(_this), "loadOffers", /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
      var response;
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.next = 2;
              return _this.http.get('/offers');

            case 2:
              response = _context.sent;

              if (!response.error) {
                _this.setState(function (prevState) {
                  return {
                    offers: [].concat(_toConsumableArray(prevState.offers), _toConsumableArray(response.data)),
                    next_page: response.next_page,
                    loading: false
                  };
                });
              }

            case 4:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    })));

    _this.state = {
      offers: [],
      next_page: null,
      loading: true
    };
    _this.http = (0,_hooks__WEBPACK_IMPORTED_MODULE_3__.useHttpService)('/userarea');
    return _this;
  }

  _createClass(Discounts, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      this.loadOffers();
    }
  }, {
    key: "copyToClipboard",
    value: function copyToClipboard(code) {
      navigator.permissions.query({
        name: "clipboard-write"
      }).then(function (result) {
        if (result.state == "granted" || result.state == "prompt") {
          navigator.clipboard.writeText(code).then(function () {
            new _services_AlertService__WEBPACK_IMPORTED_MODULE_2__["default"]().success({
              timer: 2000,
              title: 'کد تخفیف در حافظه موقت کپی شد'
            });
          }, function () {
            new _services_AlertService__WEBPACK_IMPORTED_MODULE_2__["default"]().error({
              timer: 2000,
              title: 'متاسفانه در هنگام کپی مشکلی پیش آمد'
            });
          });
        }
      });
    }
  }, {
    key: "getOfferValue",
    value: function getOfferValue(offer) {
      return offer.value_type === 'amount' ? "".concat(offer.value, " \u062A\u0648\u0645\u0627\u0646") : "".concat(offer.value, "%");
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      var _this$state = this.state,
          loading = _this$state.loading,
          offers = _this$state.offers;
      if (loading) return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_Layout_components_Loading__WEBPACK_IMPORTED_MODULE_4__["default"], {});
      return offers.length ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("div", {
        className: "discount-container",
        children: offers.map(function (discount) {
          return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("div", {
            className: "p-0 discount-item rounded-lg",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
              className: "w-100 p-2 text-white",
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("img", {
                src: APP_PATH + 'images/discount-icon.png'
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("p", {
                className: "shadowed-text",
                children: discount.title
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("p", {
                children: _this2.getOfferValue(discount)
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("p", {
                className: "shadowed-text",
                children: discount.description
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("span", {
                onClick: function onClick() {
                  return _this2.copyToClipboard(discount.code);
                },
                className: "cursor-pointer w-50 badge bg-pink p-2 rounded-pill bold ltr",
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("i", {
                  className: "fas fa-copy mr-2"
                }), discount.code]
              })]
            })
          }, discount.id);
        })
      }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_Layout_components_NoItem__WEBPACK_IMPORTED_MODULE_5__["default"], {});
    }
  }]);

  return Discounts;
}(react__WEBPACK_IMPORTED_MODULE_1__.Component);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Discounts);

/***/ }),

/***/ "./resources/js/react/Pages/Private/Layout/components/Loading.jsx":
/*!************************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Layout/components/Loading.jsx ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Loading)
/* harmony export */ });
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-activity */ "./node_modules/react-activity/dist/react-activity.js");
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_activity__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");


function Loading(props) {
  var _props$size;

  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("div", {
    className: "activity-container mb-2",
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)(react_activity__WEBPACK_IMPORTED_MODULE_1__.Spinner, {
      color: "#999999",
      size: (_props$size = props.size) !== null && _props$size !== void 0 ? _props$size : 34,
      speed: 0.5,
      animating: true
    })
  });
}

/***/ }),

/***/ "./resources/js/react/Pages/Private/Layout/components/NoItem.jsx":
/*!***********************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Layout/components/NoItem.jsx ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ NoItem)
/* harmony export */ });
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");

function NoItem() {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("div", {
    id: "no-item-elem",
    className: "activity-container alert alert-light",
    children: "\u0645\u0648\u0631\u062F\u06CC \u0628\u0631\u0627\u06CC \u0646\u0645\u0627\u06CC\u0634 \u0648\u062C\u0648\u062F \u0646\u062F\u0627\u0631\u062F"
  });
}

/***/ })

}]);