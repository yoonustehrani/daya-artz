"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_react_Pages_Private_Finance_Invoices_Invoice_jsx"],{

/***/ "./resources/js/helpers/index.js":
/*!***************************************!*\
  !*** ./resources/js/helpers/index.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "NestedObj": () => (/* binding */ NestedObj),
/* harmony export */   "isObjEmpty": () => (/* binding */ isObjEmpty),
/* harmony export */   "translate": () => (/* binding */ translate),
/* harmony export */   "number_format": () => (/* binding */ number_format)
/* harmony export */ });
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var NestedObj = /*#__PURE__*/function () {
  function NestedObj(targetObj, path) {
    var value = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;

    _classCallCheck(this, NestedObj);

    this.targetObj = JSON.parse(JSON.stringify(targetObj));
    this.value = value;
    var keys = path.split(".");

    if (keys.length > 1) {
      this.lastKey = keys.pop();
      this.lastObj = keys.reduce(function (targetObj, key) {
        return targetObj[key] = targetObj[key] && !Array.isArray(targetObj[key]) ? targetObj[key] : {};
      }, this.targetObj);
    } else {
      this.lastObj = this.targetObj;
      this.lastKey = path;
    }
  }

  _createClass(NestedObj, [{
    key: "make",
    value: function make() {
      this.lastObj[this.lastKey] = this.value;
      return this.targetObj;
    }
  }, {
    key: "get",
    value: function get() {
      var _this$lastObj$this$la;

      return (_this$lastObj$this$la = this.lastObj[this.lastKey]) !== null && _this$lastObj$this$la !== void 0 ? _this$lastObj$this$la : "";
    }
  }]);

  return NestedObj;
}();
function isObjEmpty(obj) {
  return !Object.keys(obj).length;
}
var translate = function translate(key) {
  var _dic;

  var dic = (_dic = {
    // order methods
    "automate": "اتومات",
    "manual": "دستی",
    "just-recieved": "دریافت شده",
    "in-progress": "در حال انجام",
    "finished": "تمام شده",
    // statuses
    "submitted": "دریافت سفارش",
    "reviewed": "بررسی جزئیات",
    "designing": "در دست طراحی",
    "ready": "آماده تحویل",
    "editing": "در حال ویرایش",
    "canceled": "لغو شده",
    "suspended": "تعلیق شده"
  }, _defineProperty(_dic, "finished", "اتمام سفارش"), _defineProperty(_dic, "checked-out", "تصویه و تحویل"), _dic);
  return dic[key];
};
var number_format = function number_format(number) {
  var appendix = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
  return "".concat(Number(number).toLocaleString('en-US')).concat(appendix ? ' تومان' : '');
};

/***/ }),

/***/ "./resources/js/react/Pages/Private/Finance/Invoices/Invoice.jsx":
/*!***********************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Finance/Invoices/Invoice.jsx ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");
/* harmony import */ var _components_LoaderComponent__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../components/LoaderComponent */ "./resources/js/react/components/LoaderComponent.jsx");
/* harmony import */ var _hooks__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../../hooks */ "./resources/js/react/hooks.js");
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../../../helpers */ "./resources/js/helpers/index.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

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





 // custom components




var Bills = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.lazy(function () {
  return __webpack_require__.e(/*! import() */ "resources_js_react_Pages_Private_Finance_Invoices_components_Bills_jsx").then(__webpack_require__.bind(__webpack_require__, /*! ./components/Bills */ "./resources/js/react/Pages/Private/Finance/Invoices/components/Bills.jsx"));
});
var PaymentMethod = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.lazy(function () {
  return __webpack_require__.e(/*! import() */ "resources_js_react_Pages_Private_Finance_Invoices_components_PaymentMethod_jsx").then(__webpack_require__.bind(__webpack_require__, /*! ./components/PaymentMethod */ "./resources/js/react/Pages/Private/Finance/Invoices/components/PaymentMethod.jsx"));
});

var Invoice = /*#__PURE__*/function (_Component) {
  _inherits(Invoice, _Component);

  var _super = _createSuper(Invoice);

  function Invoice(props) {
    var _this;

    _classCallCheck(this, Invoice);

    _this = _super.call(this, props);

    _defineProperty(_assertThisInitialized(_this), "loadInvoice", /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
      var invoiceId, response, order, invoice, subtotal;
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              invoiceId = _this.props.params.invoiceId;
              _context.next = 3;
              return _this.http.get("invoices/".concat(invoiceId));

            case 3:
              response = _context.sent;

              if (response.okay) {
                order = response.order, invoice = response.invoice;
                subtotal = 0;
                order.items.forEach(function (item) {
                  subtotal += item.total - item.off;
                  return item;
                });
                document.title = "".concat(invoice.active ? ' ' : 'پیش ', "\u0641\u0627\u06A9\u062A\u0648\u0631 \u0634\u0645\u0627\u0631\u0647 ").concat(invoice.id);

                _this.setState({
                  invoice: _objectSpread(_objectSpread({}, invoice), {}, {
                    calc: {
                      subtotal: subtotal
                    }
                  }),
                  order: order,
                  loading: false
                });
              }

            case 5:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    })));

    _this.state = {
      invoice: null,
      order: null,
      loading: true
    };
    _this.http = (0,_hooks__WEBPACK_IMPORTED_MODULE_4__.useHttpService)('/userarea/');
    return _this;
  }

  _createClass(Invoice, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      this.loadInvoice();
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      var _this$props = this.props,
          user = _this$props.user,
          company = _this$props.company;
      var _this$state = this.state,
          invoice = _this$state.invoice,
          order = _this$state.order,
          loading = _this$state.loading;
      return loading ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_components_LoaderComponent__WEBPACK_IMPORTED_MODULE_3__["default"], {}) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
        className: "factor-container p-3 p-md-4 ",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("div", {
          className: "factor-first-section",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("ul", {
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("li", {
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("span", {
                  children: [invoice.active ? ' ' : 'پیش ', " \u0641\u0627\u06A9\u062A\u0648\u0631 \u0628\u0631\u0627\u06CC :"]
                }), " \u0622\u0642\u0627 / \u062E\u0627\u0646\u0645 ", user.lastname]
              }), company && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.Fragment, {
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("li", {
                  children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("span", {
                    children: "\u0646\u0627\u0645 \u0634\u0631\u06A9\u062A:"
                  }), " ", [company.title, company.title_en].join(' - ')]
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("li", {
                  children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("span", {
                    children: "\u0622\u062F\u0631\u0633 \u0634\u0631\u06A9\u062A:"
                  }), " \u062E\u06CC\u0627\u0628\u0627\u0646 \u0633\u062C\u0627\u062F - \u0633\u062C\u0627\u062F 21 - \u067E\u0644\u0627\u06A9 124"]
                })]
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("li", {
                className: "contact-info",
                children: user.email
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("li", {
                className: "contact-info",
                children: user.phone_number
              })]
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("ul", {
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("li", {
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("span", {
                  children: "\u0634\u0645\u0627\u0631\u0647 \u0641\u0627\u06A9\u062A\u0648\u0631:"
                }), invoice.id]
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("li", {
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("span", {
                  children: "\u0634\u0645\u0627\u0631\u0647 \u0633\u0641\u0627\u0631\u0634:"
                }), order.code]
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("li", {
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("span", {
                  children: "\u062A\u0627\u0631\u06CC\u062E \u0641\u0627\u06A9\u062A\u0648\u0631:"
                }), (0,_hooks__WEBPACK_IMPORTED_MODULE_4__.useJalaliDate)(invoice.created_at).format('jYYYY/jMM/jDD')]
              })]
            })]
          })
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
          className: "float-left w-100 table-responsive mt-4",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("h3", {
            className: "factor-section-title",
            children: "\u0622\u06CC\u062A\u0645 \u0647\u0627\u06CC \u0633\u0641\u0627\u0631\u0634"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("table", {
            className: "table text-center",
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("thead", {
              children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("tr", {
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("th", {
                  children: "#"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("th", {
                  children: "\u0639\u0646\u0648\u0627\u0646 \u0633\u0641\u0627\u0631\u0634"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("th", {
                  children: "\u0642\u06CC\u0645\u062A"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("th", {
                  children: "\u062A\u062E\u0641\u06CC\u0641"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("th", {
                  children: "\u0645\u0628\u0644\u063A \u0646\u0647\u0627\u06CC\u06CC"
                })]
              })
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("tbody", {
              children: order && order.items.map(function (item, i) {
                return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("tr", {
                  children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("th", {
                    children: i + 1
                  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("th", {
                    scope: "row",
                    children: item.title
                  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("td", {
                    children: (0,_helpers__WEBPACK_IMPORTED_MODULE_5__.number_format)(item.total, true)
                  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("td", {
                    children: (0,_helpers__WEBPACK_IMPORTED_MODULE_5__.number_format)(item.off, true)
                  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("td", {
                    children: (0,_helpers__WEBPACK_IMPORTED_MODULE_5__.number_format)(item.total - item.off, true)
                  })]
                }, item.id);
              })
            })]
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
          className: "float-left w-100 table-responsive factor-info mt-4",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("h3", {
            className: "factor-section-title",
            children: "\u0647\u0632\u06CC\u0646\u0647 \u06A9\u0644\u06CC"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("table", {
            className: "table",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("tbody", {
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("tr", {
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("th", {
                  scope: "row",
                  children: "\u0645\u0628\u0644\u063A \u06A9\u0644 \u0633\u0641\u0627\u0631\u0634"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("td", {
                  children: (0,_helpers__WEBPACK_IMPORTED_MODULE_5__.number_format)(invoice.calc.subtotal, true)
                })]
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("tr", {
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("th", {
                  scope: "row",
                  children: "\u0642\u0627\u0628\u0644 \u067E\u0631\u062F\u0627\u062E\u062A"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("td", {
                  children: (0,_helpers__WEBPACK_IMPORTED_MODULE_5__.number_format)(invoice.calc.subtotal, true)
                })]
              })]
            })
          })]
        }), invoice.active && invoice.bills ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(react__WEBPACK_IMPORTED_MODULE_1__.Suspense, {
          fallback: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_components_LoaderComponent__WEBPACK_IMPORTED_MODULE_3__["default"], {}),
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(Bills, {
            bills: invoice.bills
          })
        }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(react__WEBPACK_IMPORTED_MODULE_1__.Suspense, {
          fallback: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_components_LoaderComponent__WEBPACK_IMPORTED_MODULE_3__["default"], {}),
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(PaymentMethod, {
            invoice: invoice,
            onActive: function onActive(newInvoice) {
              return _this2.setState(function (prev) {
                return {
                  invoice: _objectSpread(_objectSpread({}, prev.invoice), newInvoice)
                };
              });
            }
          })
        })]
      });
    }
  }]);

  return Invoice;
}(react__WEBPACK_IMPORTED_MODULE_1__.Component);

var mapStateToProps = function mapStateToProps(state) {
  return {
    user: state.auth.user,
    company: state.user.company
  };
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ((0,react_redux__WEBPACK_IMPORTED_MODULE_2__.connect)(mapStateToProps)(Invoice));

/***/ })

}]);