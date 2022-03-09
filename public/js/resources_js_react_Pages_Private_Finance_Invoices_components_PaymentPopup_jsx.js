"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_react_Pages_Private_Finance_Invoices_components_PaymentPopup_jsx"],{

/***/ "./resources/js/react/Pages/Private/Finance/Invoices/components/PaymentPopup.jsx":
/*!***************************************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Finance/Invoices/components/PaymentPopup.jsx ***!
  \***************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ PaymentPopup)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _components_LoaderComponent__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../components/LoaderComponent */ "./resources/js/react/components/LoaderComponent.jsx");
/* harmony import */ var _hooks__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../hooks */ "./resources/js/react/hooks.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]; if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }






var OnlinePayment = /*#__PURE__*/(0,react__WEBPACK_IMPORTED_MODULE_1__.lazy)(function () {
  return __webpack_require__.e(/*! import() */ "resources_js_react_Pages_Private_Finance_Invoices_components_OnlinePayment_jsx").then(__webpack_require__.bind(__webpack_require__, /*! ./OnlinePayment */ "./resources/js/react/Pages/Private/Finance/Invoices/components/OnlinePayment.jsx"));
});
var DirectPayment = /*#__PURE__*/(0,react__WEBPACK_IMPORTED_MODULE_1__.lazy)(function () {
  return __webpack_require__.e(/*! import() */ "resources_js_react_Pages_Private_Finance_Invoices_components_DirectPayment_jsx").then(__webpack_require__.bind(__webpack_require__, /*! ./DirectPayment */ "./resources/js/react/Pages/Private/Finance/Invoices/components/DirectPayment.jsx"));
});
function PaymentPopup(_ref) {
  var close = _ref.close,
      id = _ref.id,
      amount = _ref.amount;

  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)("online"),
      _useState2 = _slicedToArray(_useState, 2),
      payMethod = _useState2[0],
      setPayMethod = _useState2[1];

  var onClose = function onClose(e) {
    if (!$(e.target).closest("#popup-box").length) {
      close();
    }
  };

  function payOnline(_x) {
    return _payOnline.apply(this, arguments);
  }

  function _payOnline() {
    _payOnline = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee(method) {
      var http, response, gateway;
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              http = (0,_hooks__WEBPACK_IMPORTED_MODULE_3__.useHttpService)("/userarea/bills/".concat(id, "/"));
              _context.next = 3;
              return http.post("pay/".concat(method));

            case 3:
              response = _context.sent;

              if (response.okay) {
                gateway = response.gateway;
                window.location.href = gateway;
              }

            case 5:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    }));
    return _payOnline.apply(this, arguments);
  }

  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("div", {
    className: "popup-container",
    onClick: onClose,
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)("div", {
      className: "popup-box alert-light animated fadeInDown",
      id: "popup-box",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)("div", {
        className: "popup-header-tab",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("a", {
          href: "#online_payment",
          className: payMethod === "online" ? "active" : null,
          onClick: function onClick() {
            return setPayMethod("online");
          },
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("span", {
            children: "\u067E\u0631\u062F\u0627\u062E\u062A \u0628\u0647 \u0635\u0648\u0631\u062A \u0622\u0646\u0644\u0627\u06CC\u0646"
          })
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("a", {
          href: "#directpayment",
          className: payMethod === "direct" ? "active" : null,
          onClick: function onClick() {
            return setPayMethod("direct");
          },
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)("span", {
            children: "\u067E\u0631\u062F\u0627\u062E\u062A \u0627\u0632 \u0637\u0631\u06CC\u0642 \u0648\u0627\u0631\u06CC\u0632 \u0628\u0647 \u062D\u0633\u0627\u0628"
          })
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsxs)("div", {
        className: "popup-content",
        children: [payMethod === "online" && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(react__WEBPACK_IMPORTED_MODULE_1__.Suspense, {
          fallback: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_components_LoaderComponent__WEBPACK_IMPORTED_MODULE_2__["default"], {}),
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(OnlinePayment, {
            amount: amount,
            pay: payOnline
          })
        }), payMethod === "direct" && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(react__WEBPACK_IMPORTED_MODULE_1__.Suspense, {
          fallback: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(_components_LoaderComponent__WEBPACK_IMPORTED_MODULE_2__["default"], {}),
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_4__.jsx)(DirectPayment, {})
        })]
      })]
    })
  });
}

/***/ })

}]);