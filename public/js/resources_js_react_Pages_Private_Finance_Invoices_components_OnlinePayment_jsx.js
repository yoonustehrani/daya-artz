"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_react_Pages_Private_Finance_Invoices_components_OnlinePayment_jsx"],{

/***/ "./resources/js/react/Pages/Private/Finance/Invoices/components/OnlinePayment.jsx":
/*!****************************************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Finance/Invoices/components/OnlinePayment.jsx ***!
  \****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ OnlinePayment)
/* harmony export */ });
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../../helpers */ "./resources/js/helpers/index.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");




function OnlinePayment(_ref) {
  var pay = _ref.pay,
      amount = _ref.amount;
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("p", {
      children: ["\u067E\u0631\u062F\u0627\u062E\u062A \u0645\u0628\u0644\u063A : ", (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.number_format)(amount, true)]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
      children: "\u0628\u0627 \u06A9\u0644\u06CC\u06A9 \u0628\u0631 \u0631\u0648\u06CC \u062F\u0631\u06AF\u0627\u0647 \u0632\u06CC\u0631 \u062E\u0648\u062F \u0628\u0647 \u062E\u0648\u062F \u0628\u0647 \u0635\u0641\u062D\u0647 \u067E\u0631\u062F\u0627\u062E\u062A \u0645\u0646\u062A\u0642\u0644 \u0634\u062F\u0647 \u0648 \u0627\u0645\u06A9\u0627\u0646 \u062A\u0633\u0648\u06CC\u0647 \u062D\u0633\u0627\u0628 \u0628\u0631\u0627\u06CC \u0634\u0645\u0627 \u0641\u0631\u0627\u0647\u0645 \u0645\u06CC\u06AF\u0631\u062F\u062F."
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
      className: "w-100 text-center my-4",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("span", {
        className: "gateway-btn cursor-pointer",
        onClick: function onClick() {
          return pay('zarinpal');
        },
        children: ["\u062F\u0631\u06AF\u0627\u0647 \u0628\u0627\u0646\u06A9\u06CC \u0632\u0631\u06CC\u0646 \u067E\u0627\u0644", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("img", {
          src: APP_PATH + "images/gallery/zarin-paal.jpg",
          alt: "zarin-paal logo"
        })]
      })
    })]
  });
}

/***/ })

}]);