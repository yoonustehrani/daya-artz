"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_userarea_Pages_Auth_EmailValidation_jsx"],{

/***/ "./resources/js/userarea/Pages/Auth/EmailValidation.jsx":
/*!**************************************************************!*\
  !*** ./resources/js/userarea/Pages/Auth/EmailValidation.jsx ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");
/* harmony import */ var react_router__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react-router */ "./node_modules/react-router/esm/react-router.js");
/* harmony import */ var _services_AlertService__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../services/AlertService */ "./resources/js/services/AlertService.js");
/* harmony import */ var _redux_actions__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../redux/actions */ "./resources/js/userarea/redux/actions.js");
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! react-activity */ "./node_modules/react-activity/dist/react-activity.js");
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(react_activity__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }



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











var EmailValidation = /*#__PURE__*/function (_Component) {
  _inherits(EmailValidation, _Component);

  var _super = _createSuper(EmailValidation);

  function EmailValidation(props) {
    var _this;

    _classCallCheck(this, EmailValidation);

    _this = _super.call(this, props);

    _defineProperty(_assertThisInitialized(_this), "setResendTime", function () {
      var next_attempt_in_seconds = _this.props.resend.next_attempt_in_seconds;
      clearInterval(_this.interval);

      if (next_attempt_in_seconds > 0) {
        _this.setState({
          resendIn: next_attempt_in_seconds
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
      }
    });

    _defineProperty(_assertThisInitialized(_this), "handleEdit", function (e) {
      e.preventDefault();

      _this.setState({
        editing: true
      }, /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return _this.props.editEmail(_this.state.email);

              case 2:
                response = _context.sent;

                _this.setState({
                  edit: typeof response.error !== 'undefined',
                  editing: false
                }, _this.setResendTime);

              case 4:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      })));
    });

    _defineProperty(_assertThisInitialized(_this), "handleResend", /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee2() {
      var result, okay;
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee2$(_context2) {
        while (1) {
          switch (_context2.prev = _context2.next) {
            case 0:
              _context2.next = 2;
              return _this.props.authResend('email');

            case 2:
              result = _context2.sent;

              _this.setResendTime();

              okay = result.payload.okay;
              if (okay) _this.Alert.success({
                title: 'ایمیل حاوی لینک تایید حساب ارسال شد',
                timer: 2000
              });

            case 6:
            case "end":
              return _context2.stop();
          }
        }
      }, _callee2);
    })));

    _this.state = {
      email: props.user.email,
      edit: false,
      editing: false,
      resendIn: props.resend.next_attempt_in_seconds
    };
    _this.interval = null;
    _this.Alert = new _services_AlertService__WEBPACK_IMPORTED_MODULE_3__["default"]();
    return _this;
  }

  _createClass(EmailValidation, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      document.title = 'تایید ایمیل';
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
          user = _this$props.user,
          resend = _this$props.resend,
          sending_data = _this$props.sending_data,
          history = _this$props.history,
          changeSection = _this$props.changeSection;
      var _this$state = this.state,
          edit = _this$state.edit,
          resendIn = _this$state.resendIn,
          editing = _this$state.editing;
      var left_attempts = resend.left_attempts;
      return user.email && user.email_verified_at || user.phone_number && !user.phone_verified ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)(react_router__WEBPACK_IMPORTED_MODULE_6__.Redirect, {
        to: "/dashboard"
      }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.Fragment, {
        children: !edit ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsxs)("div", {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("h2", {
            children: "\u062A\u0627\u06CC\u06CC\u062F \u0622\u062F\u0631\u0633 \u0627\u06CC\u0645\u06CC\u0644"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsxs)("p", {
            children: ["\u0644\u0637\u0641\u0627 \u0628\u0631\u0627\u06CC \u0641\u0639\u0627\u0644\u0633\u0627\u0632\u06CC \u062D\u0633\u0627\u0628 \u06A9\u0627\u0631\u0628\u0631\u06CC \u062E\u0648\u062F \u0627\u06CC\u0645\u06CC\u0644 \u0627\u0631\u0633\u0627\u0644 \u0634\u062F\u0647 \u0628\u0647 \u0622\u062F\u0631\u0633 ", user.email, " \u0631\u0627 \u0686\u06A9 \u06A9\u0646\u06CC\u062F", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("br", {}), "\u0628\u0627 \u06A9\u0644\u06CC\u06A9 \u06A9\u0631\u062F\u0646 \u0631\u0648\u06CC \u062F\u06A9\u0645\u0647 \u06CC\u0627 \u0644\u06CC\u0646\u06A9 \u0642\u0631\u0627\u0631 \u062F\u0627\u062F\u0647 \u0634\u062F\u0647 \u062F\u0631 \u062F\u0627\u062E\u0644 \u0627\u06CC\u0645\u06CC\u0644\u06CC \u06A9\u0647 \u0627\u0632 \u0633\u0645\u062A \u0645\u0627 \u0628\u0631\u0627\u06CC\u062A\u0627\u0646 \u0627\u0631\u0633\u0627\u0644 \u0634\u062F\u0647 \u0645\u06CC \u062A\u0648\u0627\u0646\u06CC\u062F \u062D\u0633\u0627\u0628 \u06A9\u0627\u0631\u0628\u0631\u06CC \u062A\u0627\u0646 \u0631\u0627 \u0641\u0639\u0627\u0644 \u06A9\u0646\u06CC\u062F"]
          }), left_attempts > 0 && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("button", {
            disabled: resendIn > 0,
            onClick: this.handleResend,
            className: "btn btn-lg",
            children: resendIn > 0 ? resendIn : "ارسال مجدد ایمیل"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsxs)("p", {
            className: "text-right mt-5 text-small",
            children: ["\u0622\u062F\u0631\u0633 \u0627\u06CC\u0645\u06CC\u0644 ", user.email, " \u0627\u0634\u062A\u0628\u0627\u0647 \u0627\u0633\u062A \u061F ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("span", {
              className: "span-hover",
              onClick: function onClick() {
                return _this2.setState({
                  edit: true
                });
              },
              children: "\u0648\u06CC\u0631\u0627\u06CC\u0634"
            })]
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("span", {
            className: "change-form-mobile d-md-none mt-2",
            onClick: changeSection.bind(this, history, "login"),
            children: "\u062E\u0631\u0648\u062C \u0627\u0632 \u062D\u0633\u0627\u0628 \u06A9\u0627\u0631\u0628\u0631\u06CC"
          })]
        }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsxs)("div", {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("h2", {
            children: "\u0648\u06CC\u0631\u0627\u06CC\u0634 \u0627\u06CC\u0645\u06CC\u0644"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("form", {
            onSubmit: this.handleEdit,
            className: "form-group w-50",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsxs)("div", {
              className: "input-group",
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsxs)("div", {
                className: "input-group-prepend",
                children: [sending_data && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("span", {
                  className: "auth-windmill",
                  children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)(react_activity__WEBPACK_IMPORTED_MODULE_7__.Windmill, {
                    size: 30,
                    color: "#6332df"
                  })
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("button", {
                  disabled: editing,
                  className: "btn btn-def m-0 w-auto btn-success",
                  type: "submit",
                  children: "\u0648\u06CC\u0631\u0627\u06CC\u0634"
                })]
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("input", {
                type: "text",
                className: "form-control text-left ltr",
                value: this.state.email,
                onChange: function onChange(e) {
                  return _this2.setState({
                    email: e.target.value
                  });
                }
              })]
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("button", {
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

  return EmailValidation;
}(react__WEBPACK_IMPORTED_MODULE_1__.Component);

var mapStateToProps = function mapStateToProps(state) {
  return {
    user: state.auth.user,
    resend: state.auth.resend
  };
};

var mapDispatchToProps = function mapDispatchToProps(dispatch) {
  return {
    editEmail: function editEmail(email) {
      return dispatch((0,_redux_actions__WEBPACK_IMPORTED_MODULE_4__.changeUserEmail)(email));
    },
    authResend: function authResend(method) {
      return dispatch((0,_redux_actions__WEBPACK_IMPORTED_MODULE_4__.resendBasedOnAuthMethod)(method));
    }
  };
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ((0,react_redux__WEBPACK_IMPORTED_MODULE_2__.connect)(mapStateToProps, mapDispatchToProps)(EmailValidation));

/***/ })

}]);