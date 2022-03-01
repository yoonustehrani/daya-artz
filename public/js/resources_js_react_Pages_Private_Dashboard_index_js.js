"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_react_Pages_Private_Dashboard_index_js"],{

/***/ "./resources/js/react/Pages/Private/Dashboard/Dashboard.jsx":
/*!******************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Dashboard/Dashboard.jsx ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

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


 // components


var BottomItem = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.lazy(function () {
  return __webpack_require__.e(/*! import() */ "resources_js_react_Pages_Private_Dashboard_components_BottomItem_jsx").then(__webpack_require__.bind(__webpack_require__, /*! ./components/BottomItem */ "./resources/js/react/Pages/Private/Dashboard/components/BottomItem.jsx"));
});
var MiddleItem = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.lazy(function () {
  return __webpack_require__.e(/*! import() */ "resources_js_react_Pages_Private_Dashboard_components_MiddleItem_jsx").then(__webpack_require__.bind(__webpack_require__, /*! ./components/MiddleItem */ "./resources/js/react/Pages/Private/Dashboard/components/MiddleItem.jsx"));
});
var TopItem = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.lazy(function () {
  return __webpack_require__.e(/*! import() */ "resources_js_react_Pages_Private_Dashboard_components_TopItem_jsx").then(__webpack_require__.bind(__webpack_require__, /*! ./components/TopItem */ "./resources/js/react/Pages/Private/Dashboard/components/TopItem.jsx"));
});

var Dashboard = /*#__PURE__*/function (_Component) {
  _inherits(Dashboard, _Component);

  var _super = _createSuper(Dashboard);

  function Dashboard(props) {
    var _this;

    _classCallCheck(this, Dashboard);

    _this = _super.call(this, props);
    _this.state = {
      statistics: {
        inprogress_orders: 10,
        complted_orders: 25,
        waiting_orders: 25,
        prepaid_orders: 25,
        unpaid_factors: 5,
        inprogress_tickets: 0
      },
      recent_orders: [{
        title: "لوگو تایپ",
        href: "#"
      }, {
        title: "کارت ویزیت",
        href: "#"
      }],
      recent_pais: [],
      recent_messages: [{
        title: "سلام",
        href: "#"
      }]
    };
    _this.dashboard_items = {
      top_items: [{
        title: "سفارش در حال انجام",
        number: _this.state.statistics.inprogress_orders,
        icon: "fas fa-clipboard-list",
        buttons: [{
          title: "لیست سفارشات",
          href: "/orders"
        }, {
          title: "سفارش جدید",
          href: "#special-order"
        }]
      }, {
        title: "فاکتور پرداخت نشده",
        number: _this.state.statistics.unpaid_factors,
        icon: "fas fa-file-invoice-dollar",
        buttons: [{
          title: "پرداخت فاکتور ها",
          href: "#factors_pay"
        }, {
          title: "پیش فاکتور ها",
          href: "/finance/invoices"
        }, {
          title: "فاکتور ها",
          href: "/finance/invoices?active"
        }]
      }, {
        title: "تیکت های در حال بررسی",
        number: _this.state.statistics.inprogress_tickets,
        icon: "fas fa-headset",
        buttons: [{
          title: "تیکت جدید",
          href: "/tickets/new"
        }, {
          title: "لیست تیکت ها",
          href: "/tickets"
        }]
      }],
      middle_items: [{
        title: "سفارشات تکمیل شده",
        number: _this.state.statistics.complted_orders
      }, {
        title: "سفارشات در انتظار تایید شما",
        number: _this.state.statistics.waiting_orders
      }, {
        title: "سفارشات پیش پرداخت شده",
        number: _this.state.statistics.prepaid_orders
      }],
      bottom_items: [{
        title: "سفارشات اخیر شما",
        items: _this.state.recent_orders
      }, {
        title: "پرداخت های اخیر شما",
        items: _this.state.recent_pais
      }, {
        title: "آخرین پیام ها",
        items: _this.state.recent_messages
      }]
    };
    return _this;
  }

  _createClass(Dashboard, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      document.title = "داشبورد";
    }
  }, {
    key: "render",
    value: function render() {
      var dashboard_items = this.dashboard_items,
          components = {
        top_items: TopItem,
        middle_items: MiddleItem,
        bottom_items: BottomItem
      };
      return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
        className: "dashboard-container",
        children: Object.keys(dashboard_items).map(function (key, i) {
          return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
            className: key,
            children: dashboard_items[key].map(function (item, index) {
              return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement(components[key], _objectSpread({
                key: index
              }, item));
            })
          }, i);
        })
      });
    }
  }]);

  return Dashboard;
}(react__WEBPACK_IMPORTED_MODULE_0__.Component);

var mapStateToProps = function mapStateToProps(state) {
  return {
    user: state.auth.user
  };
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ((0,react_redux__WEBPACK_IMPORTED_MODULE_1__.connect)(mapStateToProps)(Dashboard));

/***/ }),

/***/ "./resources/js/react/Pages/Private/Dashboard/index.js":
/*!*************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Dashboard/index.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _Dashboard__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _Dashboard__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Dashboard */ "./resources/js/react/Pages/Private/Dashboard/Dashboard.jsx");


/***/ })

}]);