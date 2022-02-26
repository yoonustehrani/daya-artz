"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_react_Pages_Private_Finance_Invoices_components_Bills_jsx"],{

/***/ "./resources/js/react/Pages/Private/Finance/Invoices/components/Bills.jsx":
/*!********************************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Finance/Invoices/components/Bills.jsx ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Bills)
/* harmony export */ });
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");


function Bills(_ref) {
  var bills = _ref.bills;
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("div", {
    className: "float-left w-100 table-responsive mt-5",
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("h3", {
      className: "factor-section-title",
      children: "\u0648\u0636\u0639\u06CC\u062A \u067E\u0631\u062F\u0627\u062E\u062A\u06CC"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("table", {
      className: "table table-hover",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("thead", {
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("tr", {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("th", {
            scope: "col",
            children: "\u0646\u0648\u0639"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("th", {
            scope: "col",
            children: "\u0634\u0645\u0627\u0631\u0647 \u0642\u0628\u0636"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("th", {
            scope: "col",
            children: "\u0639\u0646\u0648\u0627\u0646"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("th", {
            scope: "col",
            children: "\u0645\u0642\u062F\u0627\u0631"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("th", {
            scope: "col",
            children: "\u0648\u0636\u0639\u06CC\u062A \u067E\u0631\u062F\u0627\u062E\u062A"
          })]
        })
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("tbody", {
        children: bills.length && bills.map(function (bill) {
          /*#__PURE__*/
          (0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("tr", {}, bill.id);
        })
      })]
    })]
  });
}

/***/ })

}]);