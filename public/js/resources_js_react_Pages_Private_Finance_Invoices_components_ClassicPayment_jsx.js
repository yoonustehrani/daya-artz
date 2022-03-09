"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_react_Pages_Private_Finance_Invoices_components_ClassicPayment_jsx"],{

/***/ "./resources/js/react/Pages/Private/Finance/Invoices/components/ClassicPayment.jsx":
/*!*****************************************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Finance/Invoices/components/ClassicPayment.jsx ***!
  \*****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ ClassicPayment)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]; if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }





function ClassicPayment() {
  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(null),
      _useState2 = _slicedToArray(_useState, 2),
      transactionCode = _useState2[0],
      setTransactionCode = _useState2[1];

  var sendForm = function sendForm() {
    console.log('here the req will be sent');
  };

  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
      children: "\u0628\u0647 \u0645\u0646\u0638\u0648\u0631 \u067E\u0631\u062F\u0627\u062E\u062A \u0647\u0632\u06CC\u0646\u0647 \u0627\u0632 \u0637\u0631\u06CC\u0642 \u0648\u0627\u0631\u06CC\u0632 \u0648\u062C\u0647 \u0628\u0647 \u062D\u0633\u0627\u0628\u060C \u0645\u06CC \u062A\u0648\u0627\u0646\u06CC\u062F \u0627\u0632 \u0634\u0645\u0627\u0631\u0647 \u062D\u0633\u0627\u0628 \u0632\u06CC\u0631 \u0627\u0633\u062A\u0641\u0627\u0647 \u06A9\u0631\u062F\u0647 \u0648 \u067E\u0633 \u0627\u0632 \u0627\u062A\u0645\u0627\u0645 \u0639\u0645\u0644\u06CC\u0627\u062A \u067E\u0631\u062F\u0627\u062E\u062A \u0627\u0637\u0644\u0627\u0639\u0627\u062A \u0641\u06CC\u0634 \u0648\u0627\u0631\u06CC\u0632\u06CC \u0631\u0627 \u062F\u0631 \u06A9\u0627\u062F\u0631 \u0632\u06CC\u0631 \u0648\u0627\u0631\u062F \u0646\u0645\u0627\u06CC\u06CC\u062F \u0648 \u0628\u0631 \u0628\u0631\u0648\u06CC \u062F\u06A9\u0645\u0647 \u0627\u0633\u062A\u0639\u0644\u0627\u0645 \u06A9\u0644\u06CC\u06A9 \u0646\u0645\u0627\u06CC\u06CC\u062F."
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("ul", {
      className: "popup-list",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("li", {
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("i", {
          className: "fad fa-credit-card-front"
        }), "\u0634\u0645\u0627\u0631\u0647 \u062D\u0633\u0627\u0628: ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
          children: "5022291078521463"
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("li", {
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("i", {
          className: "far fa-money-check-edit-alt"
        }), "\u0634\u0645\u0627\u0631\u0647 \u0634\u0628\u0627: ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
          children: "IR-3975024846780"
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("li", {
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("i", {
          className: "far fa-user-tie"
        }), "\u0628\u0647 \u0646\u0627\u0645: ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
          children: "\u062F\u0627\u0646\u06CC\u0627\u0644 \u0637\u0647\u0631\u0627\u0646\u06CC\u0645"
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("li", {
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("i", {
          className: "far fa-university"
        }), "\u0628\u0627\u0646\u06A9 \u0645\u0642\u0635\u062F: ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
          children: "\u0628\u0627\u0646\u06A9 \u0645\u0644\u062A"
        })]
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
      className: "input-group mt-4",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
        className: "input-group-prepend",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
          className: "input-group-text",
          children: "\u0634\u0646\u0627\u0633\u0647 \u0648\u0627\u0631\u06CC\u0632"
        })
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("input", {
        type: "text",
        className: "form-control",
        placeholder: "\u0645\u062B\u0627\u0644: 32963476075360",
        onChange: function onChange(e) {
          return setTransactionCode(e.target.value);
        }
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
      className: "w-100 text-center mt-4",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
        href: "#check_transaction",
        className: "btn btn-lg btn-light",
        onClick: sendForm,
        children: "\u0627\u0633\u062A\u0639\u0644\u0627\u0645"
      })
    })]
  });
}

/***/ })

}]);