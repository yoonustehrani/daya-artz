"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_userarea_Pages_Private_Dashboard_index_js"],{

/***/ "./resources/js/userarea/Pages/Private/Dashboard/Dashboard.jsx":
/*!*********************************************************************!*\
  !*** ./resources/js/userarea/Pages/Private/Dashboard/Dashboard.jsx ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");
/* harmony import */ var _hooks__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../hooks */ "./resources/js/userarea/hooks.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }



function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]; if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

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



 // components


var BottomItem = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.lazy(function () {
  return __webpack_require__.e(/*! import() */ "resources_js_userarea_Pages_Private_Dashboard_components_BottomItem_jsx").then(__webpack_require__.bind(__webpack_require__, /*! ./components/BottomItem */ "./resources/js/userarea/Pages/Private/Dashboard/components/BottomItem.jsx"));
});
var MiddleItem = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.lazy(function () {
  return __webpack_require__.e(/*! import() */ "resources_js_userarea_Pages_Private_Dashboard_components_MiddleItem_jsx").then(__webpack_require__.bind(__webpack_require__, /*! ./components/MiddleItem */ "./resources/js/userarea/Pages/Private/Dashboard/components/MiddleItem.jsx"));
});
var TopItem = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.lazy(function () {
  return __webpack_require__.e(/*! import() */ "resources_js_userarea_Pages_Private_Dashboard_components_TopItem_jsx").then(__webpack_require__.bind(__webpack_require__, /*! ./components/TopItem */ "./resources/js/userarea/Pages/Private/Dashboard/components/TopItem.jsx"));
});

var Dashboard = /*#__PURE__*/function (_Component) {
  _inherits(Dashboard, _Component);

  var _super = _createSuper(Dashboard);

  function Dashboard(props) {
    var _this;

    _classCallCheck(this, Dashboard);

    _this = _super.call(this, props);

    _defineProperty(_assertThisInitialized(_this), "loadStats", /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
      var _yield$Promise$all, _yield$Promise$all2, general, orders, latest;

      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.next = 2;
              return Promise.all([_this.http.get('/general'), _this.http.get('/orders'), _this.http.get('/latest')]);

            case 2:
              _yield$Promise$all = _context.sent;
              _yield$Promise$all2 = _slicedToArray(_yield$Promise$all, 3);
              general = _yield$Promise$all2[0];
              orders = _yield$Promise$all2[1];
              latest = _yield$Promise$all2[2];

              _this.setState(function (prev) {
                return {
                  statistics: _objectSpread(_objectSpread(_objectSpread({}, prev.statistics), general), {}, {
                    orders: orders
                  }),
                  recent_orders: _toConsumableArray(latest.orders.map(function (x) {
                    return {
                      text: x.text,
                      href: "/orders/".concat(x.id)
                    };
                  })),
                  recent_pays: _toConsumableArray(latest.transactions.map(function (x) {
                    return {
                      text: x.text,
                      href: "/finance/transactions"
                    };
                  })),
                  recent_notifications: latest.notifications.map(function (x) {
                    return {
                      text: x.data.title,
                      href: '#'
                    };
                  })
                };
              });

            case 8:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    })));

    _this.http = (0,_hooks__WEBPACK_IMPORTED_MODULE_3__.useHttpService)('/userarea/stats');
    _this.state = {
      statistics: {
        invoices_count: false,
        orders_count: false,
        tickets_count: false,
        orders: {}
      },
      recent_orders: [],
      recent_pays: [],
      recent_notifications: []
    };
    return _this;
  }

  _createClass(Dashboard, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      document.title = "داشبورد";
      this.loadStats();
    }
  }, {
    key: "render",
    value: function render() {
      var _this$state = this.state,
          statistics = _this$state.statistics,
          recent_orders = _this$state.recent_orders,
          recent_pays = _this$state.recent_pays,
          recent_notifications = _this$state.recent_notifications;
      var components = {
        top_items: TopItem,
        middle_items: MiddleItem,
        bottom_items: BottomItem
      };
      var dashboard_items = {
        top_items: [{
          title: "سفارش در حال انجام",
          number: statistics.orders_count,
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
          number: statistics.invoices_count,
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
          number: statistics.tickets_count,
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
          number: statistics.orders.completed
        }, {
          title: "سفارشات در انتظار تایید",
          number: statistics.orders.awaiting
        }, {
          title: "سفارشات پیش پرداخت شده",
          number: statistics.orders.prepaid
        }],
        bottom_items: [{
          title: "سفارشات اخیر",
          items: recent_orders
        }, {
          title: "پرداخت های اخیر",
          items: recent_pays
        }, {
          title: "آخرین پیام ها",
          items: recent_notifications
        }]
      };
      return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("div", {
        className: "dashboard-container",
        children: Object.keys(dashboard_items).map(function (key, i) {
          return dashboard_items[key].map(function (item, index) {
            return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.createElement(components[key], _objectSpread({
              key: index
            }, item));
          });
        })
      });
    }
  }]);

  return Dashboard;
}(react__WEBPACK_IMPORTED_MODULE_1__.Component);

var mapStateToProps = function mapStateToProps(state) {
  return {
    user: state.auth.user
  };
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ((0,react_redux__WEBPACK_IMPORTED_MODULE_2__.connect)(mapStateToProps)(Dashboard));

/***/ }),

/***/ "./resources/js/userarea/Pages/Private/Dashboard/index.js":
/*!****************************************************************!*\
  !*** ./resources/js/userarea/Pages/Private/Dashboard/index.js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _Dashboard__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _Dashboard__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Dashboard */ "./resources/js/userarea/Pages/Private/Dashboard/Dashboard.jsx");


/***/ })

}]);