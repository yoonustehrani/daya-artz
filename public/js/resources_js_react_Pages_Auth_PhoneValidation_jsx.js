"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_react_Pages_Auth_PhoneValidation_jsx"],{

/***/ "./resources/js/react/Pages/Auth/PhoneValidation.jsx":
/*!***********************************************************!*\
  !*** ./resources/js/react/Pages/Auth/PhoneValidation.jsx ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");
/* harmony import */ var react_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react-router */ "./node_modules/react-router/esm/react-router.js");
/* harmony import */ var _redux_actions__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../redux/actions */ "./resources/js/react/redux/actions.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

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









var PhoneValidation = /*#__PURE__*/function (_Component) {
  _inherits(PhoneValidation, _Component);

  var _super = _createSuper(PhoneValidation);

  function PhoneValidation(props) {
    var _this;

    _classCallCheck(this, PhoneValidation);

    _this = _super.call(this, props);

    _defineProperty(_assertThisInitialized(_this), "setResendTime", function (time) {
      clearInterval(_this.interval);

      _this.setState({
        resendIn: time
      }, function () {
        _this.interval = setInterval(function () {
          if (_this.state.resendIn <= 0) {
            clearInterval(_this.interval);
          } else {
            _this.setState(function (prevState) {
              return {
                resendIn: prevState.resendIn - 1
              };
            });
          }
        }, 1000);
      });
    });

    _defineProperty(_assertThisInitialized(_this), "handleResend", function () {
      var handleResend = _this.props.handleResend;
      handleResend('phone').then(function (res) {
        console.log(res.data); // let {okay, left_attempts, next_attempt_in_seconds} = res.data;
        // this.setResendTime(next_attempt_in_seconds)
        // this.setState({
        //     left_attempts: left_attempts
        // })
      })["catch"](function (err) {
        return console.log(err);
      });
    });

    _defineProperty(_assertThisInitialized(_this), "handleEdit", function (e) {
      e.preventDefault();

      _this.props.editPhone(_this.state.phone_number).then(function (res) {
        console.log(res);
      });
    });

    _this.state = {
      resendIn: 0,
      resend: true,
      left_attempts: 3,
      edit: false,
      phone_number: props.user.phone_number
    };
    _this.interval = null;
    return _this;
  }

  _createClass(PhoneValidation, [{
    key: "componentDidMount",
    value: function componentDidMount() {// this.setResendTime(60)
    }
  }, {
    key: "componentWillUnmount",
    value: function componentWillUnmount() {
      clearInterval(this.interval);
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      var _this$props = this.props,
          onChangeField = _this$props.onChangeField,
          code = _this$props.code,
          checkCode = _this$props.checkCode,
          user = _this$props.user;
      return user.phone_number && user.phone_verified ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(react_router__WEBPACK_IMPORTED_MODULE_4__.Redirect, {
        to: "/dashboard"
      }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.Fragment, {
        children: !this.state.edit ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("h2", {
            children: "\u062A\u0627\u06CC\u06CC\u062F \u0634\u0645\u0627\u0631\u0647 \u062A\u0644\u0641\u0646"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("p", {
            children: "\u062C\u0647\u062A \u062A\u06A9\u0645\u06CC\u0644 \u0641\u0631\u0622\u06CC\u0646\u062F \u062B\u0628\u062A \u0646\u0627\u0645 \u0644\u0627\u0632\u0645 \u0627\u0633\u062A \u06A9\u062F \u0627\u062D\u0631\u0627\u0632 \u0647\u0648\u06CC\u062A \u0627\u0631\u0633\u0627\u0644 \u0634\u062F\u0647 \u0628\u0647 \u0634\u0645\u0627\u0631\u0647 \u062A\u0644\u0641\u0646 \u062E\u0648\u062F \u0631\u0627 \u062F\u0631 \u06A9\u0627\u062F\u0631 \u0632\u06CC\u0631 \u0648\u0627\u0631\u062F \u06A9\u0646\u06CC\u062F"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("form", {
            onSubmit: checkCode,
            className: "form-group",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
              className: "input-group",
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("input", {
                type: "text",
                maxLength: 6,
                value: code,
                className: "form-control text-left ltr",
                placeholder: "\u06A9\u062F \u0627\u0631\u0633\u0627\u0644\u06CC",
                onChange: onChangeField.bind(this, "validation", "code")
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
                className: "input-group-append",
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("button", {
                  disabled: code.length < 6,
                  className: "btn btn-def btn-primary m-0 w-auto",
                  type: "submit",
                  children: "\u062A\u0627\u06CC\u06CC\u062F"
                }), this.state.left_attempts > 0 && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("button", {
                  disabled: this.state.resendIn > 0,
                  onClick: this.handleResend,
                  className: "btn m-0 w-auto",
                  children: this.state.resendIn > 0 ? this.state.resendIn : "ارسال مجدد"
                })]
              })]
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("p", {
            children: ["\u0634\u0645\u0627\u0631\u0647 \u062A\u0644\u0641\u0646 ", user.phone_number, " \u0627\u0634\u062A\u0628\u0627\u0647 \u0627\u0633\u062A \u061F ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("a", {
              onClick: function onClick() {
                return _this2.setState({
                  edit: true
                });
              },
              href: "#edit",
              children: "\u0648\u06CC\u0631\u0627\u06CC\u0634"
            })]
          })]
        }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("h2", {
            children: "\u0648\u06CC\u0631\u0627\u06CC\u0634 \u062A\u0644\u0641\u0646 \u0647\u0645\u0631\u0627\u0647"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("form", {
            onSubmit: this.handleEdit,
            className: "form-group",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
              className: "input-group",
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
                className: "input-group-prepend",
                children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("button", {
                  className: "btn btn-def m-0 w-auto btn-success",
                  type: "submit",
                  children: "\u0648\u06CC\u0631\u0627\u06CC\u0634"
                })
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("input", {
                type: "text",
                className: "form-control text-left ltr",
                value: this.state.phone_number,
                onChange: function onChange(e) {
                  return _this2.setState({
                    phone_number: e.target.value
                  });
                }
              })]
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("button", {
            className: "btn btn-def btn-outline-secondary",
            type: "button",
            onClick: function onClick() {
              return _this2.setState({
                edit: false
              });
            },
            children: "\u0628\u0627\u0632\u06AF\u0634\u062A"
          })]
        })
      });
    }
  }]);

  return PhoneValidation;
}(react__WEBPACK_IMPORTED_MODULE_0__.Component);

var mapStateToProps = function mapStateToProps(state) {
  return {
    user: state.auth.user
  };
};

var mapDispatchToProps = function mapDispatchToProps(dispatch) {
  return {
    editPhone: function editPhone(phone_number) {
      return dispatch((0,_redux_actions__WEBPACK_IMPORTED_MODULE_2__.changeUserPhoneNumber)(phone_number));
    }
  };
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ((0,react_redux__WEBPACK_IMPORTED_MODULE_1__.connect)(mapStateToProps, mapDispatchToProps)(PhoneValidation));

/***/ })

}]);