"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_userarea_Pages_Private_Profile_RegisterInfo_jsx"],{

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
  }, _defineProperty(_dic, "finished", "اتمام سفارش"), _defineProperty(_dic, "checked-out", "تسویه و تحویل"), _dic);
  return dic[key];
};
var number_format = function number_format(number) {
  var appendix = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
  return "".concat(Number(number).toLocaleString('en-US')).concat(appendix ? ' تومان' : '');
};

/***/ }),

/***/ "./resources/js/userarea/Pages/Private/Profile/Components/TextInput.jsx":
/*!******************************************************************************!*\
  !*** ./resources/js/userarea/Pages/Private/Profile/Components/TextInput.jsx ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
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





var TextInput = /*#__PURE__*/function (_Component) {
  _inherits(TextInput, _Component);

  var _super = _createSuper(TextInput);

  function TextInput() {
    _classCallCheck(this, TextInput);

    return _super.apply(this, arguments);
  }

  _createClass(TextInput, [{
    key: "render",
    value: function render() {
      var _this$props = this.props,
          value = _this$props.value,
          title = _this$props.title,
          onChangeHandler = _this$props.onChangeHandler,
          path = _this$props.path,
          _this$props$type = _this$props.type,
          type = _this$props$type === void 0 ? "text" : _this$props$type,
          _this$props$validate_ = _this$props.validate_types,
          validate_types = _this$props$validate_ === void 0 ? null : _this$props$validate_,
          not_null = _this$props.not_null;
      return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
        className: "field-item col-12 col-md-6",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("span", {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("i", {
            className: "text-danger",
            children: not_null && "*"
          }), title, ":"]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
          className: "input-group",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("input", {
            type: type,
            className: "form-control",
            value: value !== null && value !== void 0 ? value : "",
            onChange: function onChange(e) {
              return onChangeHandler(path, e.target, validate_types, title, not_null);
            }
          })
        })]
      });
    }
  }]);

  return TextInput;
}(react__WEBPACK_IMPORTED_MODULE_0__.Component);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (TextInput);

/***/ }),

/***/ "./resources/js/userarea/Pages/Private/Profile/ProfileLayout.jsx":
/*!***********************************************************************!*\
  !*** ./resources/js/userarea/Pages/Private/Profile/ProfileLayout.jsx ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! react-activity */ "./node_modules/react-activity/dist/react-activity.js");
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(react_activity__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var validator__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! validator */ "./node_modules/validator/index.js");
/* harmony import */ var validator__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(validator__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _helpers_Validator__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../helpers/Validator */ "./resources/js/helpers/Validator.js");
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../helpers */ "./resources/js/helpers/index.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");
/* harmony import */ var _redux_actions__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../redux/actions */ "./resources/js/userarea/redux/actions.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }



function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

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



 // helpers


 // redux






var ProfileLayout = /*#__PURE__*/function (_Component) {
  _inherits(ProfileLayout, _Component);

  var _super = _createSuper(ProfileLayout);

  function ProfileLayout(props) {
    var _props$props$controll;

    var _this;

    _classCallCheck(this, ProfileLayout);

    _this = _super.call(this, props);

    _defineProperty(_assertThisInitialized(_this), "changeInfo", function (path, target, validate_types, title, not_null) {
      var only_number = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : false;
      var controller = _this.props.controller,
          errs = _this.state.errs,
          targetObj = _this.state[controller],
          value = target.value,
          errors = [],
          input_validate = [{
        validate_types: validate_types,
        value: value,
        title: title,
        not_null: not_null !== null && not_null !== void 0 ? not_null : false
      }];

      if (!only_number || validator__WEBPACK_IMPORTED_MODULE_7___default().isNumeric(value, {
        no_symbols: true
      }) || value === "") {
        validate_types ? errors = (0,_helpers_Validator__WEBPACK_IMPORTED_MODULE_2__["default"])(input_validate) : null;
        $(target).parent(".input-group").siblings("span.text-danger").each(function (i, el) {
          return $(el).remove();
        });

        if (errors.length) {
          $(target).addClass("input-err");
          errors.map(function (err, i) {
            $(target).parent(".input-group").after("<span class=\"text-danger d-block m-1\">".concat(err, "</span>"));

            _this.setState(function (prevState) {
              return {
                errs: _objectSpread(_objectSpread({}, prevState.errs), {}, _defineProperty({}, "".concat(controller, ".").concat(path), err))
              };
            });
          });
        } else {
          $(target).removeClass("input-err");
          delete errs["".concat(controller, ".").concat(path)];

          _this.setState({
            errs: errs
          });
        }

        var newData = new _helpers__WEBPACK_IMPORTED_MODULE_3__.NestedObj(targetObj, path, value);

        _this.setState(_defineProperty({}, controller, newData.make()));
      }
    });

    _defineProperty(_assertThisInitialized(_this), "updateInfo", function () {
      var _this$props = _this.props,
          controller = _this$props.controller,
          modifyUser = _this$props.modifyUser,
          modifyCustomer = _this$props.modifyCustomer,
          modifyCompany = _this$props.modifyCompany,
          _this$state = _this.state,
          user = _this$state.user,
          company = _this$state.company,
          customer = _this$state.customer,
          errs = _this$state.errs;
      controller === "user" && user.phone_number[0] === "0" ? user = _objectSpread(_objectSpread({}, user), {}, {
        phone_number: user.phone_number.slice(1)
      }) : null;

      if ((0,_helpers__WEBPACK_IMPORTED_MODULE_3__.isObjEmpty)(errs)) {
        _this.setState({
          sending_data: true,
          showSuccess: false,
          showErr: false
        }, /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
          var response;
          return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
            while (1) {
              switch (_context.prev = _context.next) {
                case 0:
                  _context.t0 = controller;
                  _context.next = _context.t0 === "user" ? 3 : _context.t0 === "company" ? 7 : _context.t0 === "customer" ? 11 : 15;
                  break;

                case 3:
                  _context.next = 5;
                  return modifyUser(user);

                case 5:
                  response = _context.sent;
                  return _context.abrupt("break", 15);

                case 7:
                  _context.next = 9;
                  return modifyCompany(company);

                case 9:
                  response = _context.sent;
                  return _context.abrupt("break", 15);

                case 11:
                  _context.next = 13;
                  return modifyCustomer(customer);

                case 13:
                  response = _context.sent;
                  return _context.abrupt("break", 15);

                case 15:
                  _this.setState(function (prevState) {
                    return !response.error ? {
                      sending_data: false,
                      showSuccess: true
                    } : {
                      sending_data: false
                    };
                  });

                  if (!response.error) {
                    setTimeout(function () {
                      _this.setState({
                        showSuccess: false
                      });
                    }, 5000);
                  }

                case 17:
                case "end":
                  return _context.stop();
              }
            }
          }, _callee);
        })));
      } else {
        _this.setState(_defineProperty({
          showErr: true,
          showSuccess: false
        }, "showErr", false));

        setTimeout(function () {
          _this.setState({
            showErr: false
          });
        }, 5000);
      }
    });

    _this.state = _defineProperty({
      sending_data: false,
      showSuccess: false,
      showErr: false,
      errs: {}
    }, props.controller, (_props$props$controll = _objectSpread({}, props[props.controller])) !== null && _props$props$controll !== void 0 ? _props$props$controll : {});
    return _this;
  }

  _createClass(ProfileLayout, [{
    key: "render",
    value: function render() {
      var _this2 = this;

      var _this$props2 = this.props,
          fields = _this$props2.fields,
          controller = _this$props2.controller,
          _this$state3 = this.state,
          sending_data = _this$state3.sending_data,
          showSuccess = _this$state3.showSuccess,
          showErr = _this$state3.showErr,
          errs = _this$state3.errs;
      return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("div", {
          className: "fields-container",
          children: fields.map(function (field, i) {
            var value = new _helpers__WEBPACK_IMPORTED_MODULE_3__.NestedObj(_this2.state[controller], field.path).get(),
                not_null;

            if ("".concat(controller, ".").concat(field.path) === "user.email") {
              new _helpers__WEBPACK_IMPORTED_MODULE_3__.NestedObj(_this2.state[controller], "phone_number").get().length <= 0 ? not_null = 1 : null;
            }

            return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(field.component, _objectSpread({
              onChangeHandler: _this2.changeInfo,
              value: value,
              not_null: "".concat(controller, ".").concat(field.path) === "user.email" ? not_null : null
            }, field), i);
          })
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
          className: "eggplant-btn col-12",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("button", {
            className: "btn btn-lg col-12 col-md-3 col-lg-2 ".concat(sending_data ? "disabled" : ""),
            disabled: sending_data,
            onClick: this.updateInfo,
            children: "\u062B\u0628\u062A"
          }), sending_data && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(react_activity__WEBPACK_IMPORTED_MODULE_8__.Windmill, {
            size: 30,
            color: "#6332df"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
            className: "col-12 col-md-7 col-lg-4 alert animated fadeIn ".concat(!showSuccess && !showErr ? "d-none" : showErr ? "alert-danger" : "alert-success"),
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("span", {
              className: showErr ? "d-none" : null,
              children: "\u062A\u063A\u06CC\u06CC\u0631\u0627\u062A \u0634\u0645\u0627 \u0628\u0627 \u0645\u0648\u0641\u0642\u06CC\u062A \u062B\u0628\u062A \u0634\u062F"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("span", {
              className: showSuccess ? "d-none" : null,
              children: "\u0644\u0637\u0641\u0627 \u0627\u0637\u0644\u0627\u0639\u0627\u062A \u062E\u0648\u062F \u0631\u0627 \u0628\u0647 \u062F\u0631\u0633\u062A\u06CC \u0648\u0627\u0631\u062F \u06A9\u0646\u06CC\u062F"
            })]
          })]
        })]
      });
    }
  }]);

  return ProfileLayout;
}(react__WEBPACK_IMPORTED_MODULE_1__.Component);

var mapStateToProps = function mapStateToProps(state) {
  return {
    user: state.auth.user,
    company: state.user.company,
    customer: state.auth.user
  };
};

var mapDispathToProps = function mapDispathToProps(dispatch) {
  return {
    modifyUser: function modifyUser(user) {
      return dispatch((0,_redux_actions__WEBPACK_IMPORTED_MODULE_5__.updateUserInfo)(user));
    },
    modifyCustomer: function modifyCustomer(customer) {
      return dispatch((0,_redux_actions__WEBPACK_IMPORTED_MODULE_5__.updateCustomerInfo)(customer));
    },
    modifyCompany: function modifyCompany(company) {
      return dispatch((0,_redux_actions__WEBPACK_IMPORTED_MODULE_5__.updateCompanyInfo)(company));
    }
  };
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ((0,react_redux__WEBPACK_IMPORTED_MODULE_4__.connect)(mapStateToProps, mapDispathToProps)(ProfileLayout));

/***/ }),

/***/ "./resources/js/userarea/Pages/Private/Profile/RegisterInfo.jsx":
/*!**********************************************************************!*\
  !*** ./resources/js/userarea/Pages/Private/Profile/RegisterInfo.jsx ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Components_TextInput__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Components/TextInput */ "./resources/js/userarea/Pages/Private/Profile/Components/TextInput.jsx");
/* harmony import */ var _ProfileLayout__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProfileLayout */ "./resources/js/userarea/Pages/Private/Profile/ProfileLayout.jsx");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
// components
 // import PhoneInput from './Components/PhoneInput';





function RegisterInfo() {
  var fields = [{
    component: _Components_TextInput__WEBPACK_IMPORTED_MODULE_0__["default"],
    title: "نام",
    path: "firstname",
    validate_types: ["short_text", "alpha-fa"]
  }, {
    component: _Components_TextInput__WEBPACK_IMPORTED_MODULE_0__["default"],
    title: "نام خانوادگی",
    path: "lastname",
    validate_types: ["short_text", "alpha-fa"],
    not_null: true
  } // {
  //     component: PhoneInput,
  //     title: "شماره تلفن (جهت پاسخگویی)",
  //     path: "phone_number",
  //     phone_type: "both",
  //     validate_types: ["phone_number"]
  // },
  ];
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_ProfileLayout__WEBPACK_IMPORTED_MODULE_1__["default"], {
    fields: fields,
    controller: "customer"
  });
}

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (RegisterInfo);

/***/ })

}]);