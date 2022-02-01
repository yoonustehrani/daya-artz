(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_react_Pages_Private_Tickets_Ticket_jsx"],{

/***/ "./resources/js/react/Pages/Private/Layout/components/Activity.jsx":
/*!*************************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Layout/components/Activity.jsx ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-activity */ "./node_modules/react-activity/dist/react-activity.js");
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react_activity__WEBPACK_IMPORTED_MODULE_2__);
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





var Activity = /*#__PURE__*/function (_Component) {
  _inherits(Activity, _Component);

  var _super = _createSuper(Activity);

  function Activity() {
    _classCallCheck(this, Activity);

    return _super.apply(this, arguments);
  }

  _createClass(Activity, [{
    key: "render",
    value: function render() {
      return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
        className: "activity-container",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)(react_activity__WEBPACK_IMPORTED_MODULE_2__.Spinner, {
          color: "#6332df",
          size: 34
        })
      });
    }
  }]);

  return Activity;
}(react__WEBPACK_IMPORTED_MODULE_0__.Component);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Activity);

/***/ }),

/***/ "./resources/js/react/Pages/Private/Tickets/Ticket.jsx":
/*!*************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Tickets/Ticket.jsx ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _Layout_components_Activity__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../Layout/components/Activity */ "./resources/js/react/Pages/Private/Layout/components/Activity.jsx");
/* harmony import */ var _components_TicketTopNav__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./components/TicketTopNav */ "./resources/js/react/Pages/Private/Tickets/components/TicketTopNav.jsx");
/* harmony import */ var _components_TicketMessages__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./components/TicketMessages */ "./resources/js/react/Pages/Private/Tickets/components/TicketMessages.jsx");
/* harmony import */ var _components_TicketInputs__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./components/TicketInputs */ "./resources/js/react/Pages/Private/Tickets/components/TicketInputs.jsx");
/* harmony import */ var _hooks__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../../../hooks */ "./resources/js/react/hooks.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }



function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

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









var Ticket = /*#__PURE__*/function (_Component) {
  _inherits(Ticket, _Component);

  var _super = _createSuper(Ticket);

  function Ticket(props) {
    var _this;

    _classCallCheck(this, Ticket);

    _this = _super.call(this, props);

    _defineProperty(_assertThisInitialized(_this), "setNewMessage", function (e) {
      _this.setState({
        new_message: e.target.value
      });
    });

    _defineProperty(_assertThisInitialized(_this), "sendMessage", function (e) {
      e.preventDefault();
      var _this$state = _this.state,
          new_message = _this$state.new_message,
          sending = _this$state.sending;

      if (new_message.length > 0 && !sending) {
        _this.setState({
          sending: true
        }, /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
          var response;
          return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
            while (1) {
              switch (_context.prev = _context.next) {
                case 0:
                  _context.next = 2;
                  return _this.http.put("tickets/".concat(_this.props.params.ticketId), {
                    message: new_message
                  });

                case 2:
                  response = _context.sent;

                  if (!response.okay) {
                    _context.next = 6;
                    break;
                  }

                  _this.setState(function (prevState) {
                    return {
                      new_message: "",
                      sending: false,
                      messages: [].concat(_toConsumableArray(prevState.messages), [response.message])
                    };
                  });

                  return _context.abrupt("return");

                case 6:
                  _this.setState({
                    sending: false
                  });

                case 7:
                case "end":
                  return _context.stop();
              }
            }
          }, _callee);
        })));
      }
    });

    _defineProperty(_assertThisInitialized(_this), "loadTicket", /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee2() {
      var _this$state$next_page;

      var ticketId, url, appends, _yield$_this$http$get, ticket, messages;

      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee2$(_context2) {
        while (1) {
          switch (_context2.prev = _context2.next) {
            case 0:
              ticketId = _this.props.params.ticketId, url = (_this$state$next_page = _this.state.next_page_url) !== null && _this$state$next_page !== void 0 ? _this$state$next_page : "tickets/".concat(ticketId), appends = {};
              _context2.next = 3;
              return _this.http.get(url);

            case 3:
              _yield$_this$http$get = _context2.sent;
              ticket = _yield$_this$http$get.ticket;
              messages = _yield$_this$http$get.messages;

              if (_this.state.ticket === null) {
                appends = {
                  ticket: ticket,
                  loading: false
                };
                document.title = "".concat(ticket.title, " |\u200C \u067E\u0634\u062A\u06CC\u0628\u0627\u0646\u06CC \u062F\u0627\u06CC\u0627 \u0622\u0631\u062A\u0632");
              }

              _this.setState(function (prev) {
                var newMessages = messages.data.sort(function (a, b) {
                  return new Date(a.created_at) >= new Date(b.created_at) ? 1 : -1;
                });
                return _objectSpread(_objectSpread({}, appends), {}, {
                  loading_messages: false,
                  next_page_url: messages.next_page_url,
                  hasMore: messages.next_page_url !== null,
                  messages: newMessages.concat(_toConsumableArray(prev.messages))
                });
              });

            case 8:
            case "end":
              return _context2.stop();
          }
        }
      }, _callee2);
    })));

    _defineProperty(_assertThisInitialized(_this), "loadMore", function () {
      console.log('loading more');

      _this.setState({
        loading_messages: true
      }, _this.loadTicket);
    });

    _this.state = {
      loading: true,
      ticket: null,
      messages: [],
      hasMore: false,
      next_page_url: null,
      loading_messages: false,
      new_message: "",
      sending: false
    };
    _this.http = (0,_hooks__WEBPACK_IMPORTED_MODULE_7__.useHttpService)('/userarea/');
    return _this;
  }

  _createClass(Ticket, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      document.title = "Ticket No ".concat(this.props.params.ticketId);
      this.loadTicket();
    }
  }, {
    key: "render",
    value: function render() {
      var _this$state2 = this.state,
          loading = _this$state2.loading,
          ticket = _this$state2.ticket,
          new_message = _this$state2.new_message,
          sending = _this$state2.sending,
          messages = _this$state2.messages,
          hasMore = _this$state2.hasMore,
          current_page = _this$state2.current_page,
          loading_messages = _this$state2.loading_messages;
      return !loading && ticket !== null ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__.jsxs)("div", {
        className: "ticket-container",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__.jsx)(_components_TicketTopNav__WEBPACK_IMPORTED_MODULE_4__["default"], _objectSpread({}, ticket)), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__.jsx)(_components_TicketMessages__WEBPACK_IMPORTED_MODULE_5__["default"], {
          messages: messages,
          hasMore: hasMore,
          current_page: current_page,
          loading_messages: loading_messages,
          loadMore: this.loadMore
        }), ticket.messaging_is_allowed ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__.jsx)(_components_TicketInputs__WEBPACK_IMPORTED_MODULE_6__["default"], {
          messageText: new_message,
          setNewMessage: this.setNewMessage,
          sendMessage: this.sendMessage,
          sending: sending
        }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__.jsx)("div", {
          className: "alert alert-info",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__.jsx)("p", {
            className: "m-0",
            children: "\u062F\u0631 \u0627\u06CC\u0646 \u062F\u0631\u062E\u0648\u0627\u0633\u062A \u067E\u0634\u062A\u06CC\u0628\u0627\u0646\u06CC \u0628\u062F\u0644\u06CC\u0644 \u0648\u0636\u0639\u06CC\u062A \u0641\u0639\u0644\u06CC \u062A\u06CC\u06A9\u062A \u0645\u062C\u0627\u0632 \u0628\u0647 \u0627\u0631\u0633\u0627\u0644 \u067E\u06CC\u0627\u0645 \u0646\u06CC\u0633\u062A\u06CC\u062F. \u0645\u06CC \u062A\u0648\u0627\u0646\u06CC\u062F \u062F\u0631 \u0635\u0648\u0631\u062A \u0644\u0632\u0648\u0645 \u0645\u0631\u0627\u062A\u0628 \u0631\u0627 \u0627\u0632 \u0637\u0631\u06CC\u0642 \u062A\u0645\u0627\u0633 \u0628\u0627 \u067E\u0634\u062A\u06CC\u0628\u0627\u0646\u06CC \u0631\u0641\u0639 \u0631\u062C\u0648\u0639 \u06A9\u0646\u06CC\u062F."
          })
        })]
      }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_8__.jsx)(_Layout_components_Activity__WEBPACK_IMPORTED_MODULE_3__["default"], {});
    }
  }]);

  return Ticket;
}(react__WEBPACK_IMPORTED_MODULE_1__.Component);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Ticket);

/***/ }),

/***/ "./resources/js/react/Pages/Private/Tickets/components/TicketInputs.jsx":
/*!******************************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Tickets/components/TicketInputs.jsx ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-activity */ "./node_modules/react-activity/dist/react-activity.js");
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react_activity__WEBPACK_IMPORTED_MODULE_2__);
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






var TicketInputs = /*#__PURE__*/function (_Component) {
  _inherits(TicketInputs, _Component);

  var _super = _createSuper(TicketInputs);

  function TicketInputs() {
    _classCallCheck(this, TicketInputs);

    return _super.apply(this, arguments);
  }

  _createClass(TicketInputs, [{
    key: "render",
    value: function render() {
      var _this$props = this.props,
          messageText = _this$props.messageText,
          setNewMessage = _this$props.setNewMessage,
          sendMessage = _this$props.sendMessage,
          sending = _this$props.sending;
      return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
        className: "ticket-inputs",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
          className: "ticket-text-input",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
            className: "input-group",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("textarea", {
              disabled: sending,
              className: "form-control",
              placeholder: "\u0645\u062A\u0646 \u067E\u06CC\u0627\u0645 :",
              value: messageText,
              onChange: setNewMessage.bind(this)
            })
          }), sending ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)(react_activity__WEBPACK_IMPORTED_MODULE_2__.Spinner, {
            color: "#6332df",
            size: 20
          }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("button", {
            className: "badge badge-pill purple-btn",
            type: "button",
            onClick: sendMessage,
            children: "\u0627\u0631\u0633\u0627\u0644"
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
          className: "ticket-file-inputs",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("h4", {
              children: "\u0627\u0631\u0633\u0627\u0644 \u0639\u06A9\u0633"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
              children: "[jpg, jpeg, png]"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("button", {
              className: "badge badge-pill purple-btn",
              children: "\u0627\u0631\u0633\u0627\u0644 \u0639\u06A9\u0633"
            })]
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("h4", {
              children: "\u0627\u0631\u0633\u0627\u0644 \u0641\u0627\u06CC\u0644"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("span", {
              children: "[tiff, psd, gif]"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("button", {
              className: "badge badge-pill purple-btn",
              children: "\u0627\u0631\u0633\u0627\u0644 \u0641\u0627\u06CC\u0644"
            })]
          })]
        })]
      });
    }
  }]);

  return TicketInputs;
}(react__WEBPACK_IMPORTED_MODULE_0__.Component);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (TicketInputs);

/***/ }),

/***/ "./resources/js/react/Pages/Private/Tickets/components/TicketMessage.jsx":
/*!*******************************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Tickets/components/TicketMessage.jsx ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _hooks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../hooks */ "./resources/js/react/hooks.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");





function TicketMessage(_ref) {
  var side = _ref.side,
      created_at = _ref.created_at,
      body = _ref.body;
  var date = (0,_hooks__WEBPACK_IMPORTED_MODULE_1__.useJalaliDate)(created_at);
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)("div", {
    className: side === "customer" ? "right-msg" : "left-msg",
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
      className: "msg-meta"
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)("div", {
      className: "msg-content pb-1",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("p", {
        children: body
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
        className: "text-left ltr m-0",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)("span", {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("i", {
            className: "mx-1 far fa-calendar"
          }), date.format('jYYYY/jM/jD'), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("i", {
            className: "mx-1 far fa-clock"
          }), date.format('HH:mm:ss')]
        })
      })]
    })]
  });
}

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (TicketMessage);

/***/ }),

/***/ "./resources/js/react/Pages/Private/Tickets/components/TicketMessages.jsx":
/*!********************************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Tickets/components/TicketMessages.jsx ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react_infinite_scroller__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-infinite-scroller */ "./node_modules/react-infinite-scroller/index.js");
/* harmony import */ var react_infinite_scroller__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_infinite_scroller__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _TicketMessage__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./TicketMessage */ "./resources/js/react/Pages/Private/Tickets/components/TicketMessage.jsx");
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react-activity */ "./node_modules/react-activity/dist/react-activity.js");
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(react_activity__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
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








var TicketMessages = /*#__PURE__*/function (_Component) {
  _inherits(TicketMessages, _Component);

  var _super = _createSuper(TicketMessages);

  function TicketMessages(props) {
    var _this;

    _classCallCheck(this, TicketMessages);

    _this = _super.call(this, props);
    _this.scrollerRef = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createRef();
    return _this;
  }

  _createClass(TicketMessages, [{
    key: "render",
    value: function render() {
      var _this$props = this.props,
          messages = _this$props.messages,
          loadMore = _this$props.loadMore,
          loading_messages = _this$props.loading_messages,
          hasMore = _this$props.hasMore;
      return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
        className: "ticket-messages",
        id: "userarea-ticket-scroller",
        ref: this.scrollerRef,
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)((react_infinite_scroller__WEBPACK_IMPORTED_MODULE_1___default()), {
          pageStart: 0,
          loadMore: loadMore,
          hasMore: hasMore && !loading_messages,
          useWindow: false,
          getScrollParent: function getScrollParent() {
            return document.getElementById('userarea-ticket-scroller');
          },
          isReverse: true,
          initialLoad: false,
          children: [loading_messages && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
            className: "w-100 mt-3 d-flex justify-content-center",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(react_activity__WEBPACK_IMPORTED_MODULE_4__.Spinner, {
              color: "#6332df",
              size: 28
            })
          }), messages.map(function (message) {
            return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_TicketMessage__WEBPACK_IMPORTED_MODULE_2__["default"], _objectSpread({}, message), "".concat(message.id));
          })]
        })
      });
    }
  }]);

  return TicketMessages;
}(react__WEBPACK_IMPORTED_MODULE_0__.Component);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (TicketMessages);

/***/ }),

/***/ "./resources/js/react/Pages/Private/Tickets/components/TicketTopNav.jsx":
/*!******************************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Tickets/components/TicketTopNav.jsx ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");



var TicketTopNav = function TicketTopNav(_ref) {
  var tracking_code = _ref.tracking_code,
      title = _ref.title,
      department = _ref.department,
      status = _ref.status;
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("div", {
    className: "ticket-top-nav",
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("h4", {
      children: ["\u0639\u0646\u0648\u0627\u0646: ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("span", {
        children: title
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("h4", {
      children: ["\u0628\u062E\u0634 \u0645\u0631\u0628\u0648\u0637\u0647: ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("span", {
        children: department.name
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("h4", {
      children: ["\u0634\u0645\u0627\u0631\u0647 \u062A\u06CC\u06A9\u062A: ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("span", {
        children: tracking_code
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("h4", {
      children: ["\u0648\u0636\u0639\u06CC\u062A:\u200C ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("span", {
        children: status
      })]
    })]
  });
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (TicketTopNav);

/***/ }),

/***/ "./node_modules/react-infinite-scroller/dist/InfiniteScroll.js":
/*!*********************************************************************!*\
  !*** ./node_modules/react-infinite-scroller/dist/InfiniteScroll.js ***!
  \*********************************************************************/
/***/ ((module, exports, __webpack_require__) => {

"use strict";


Object.defineProperty(exports, "__esModule", ({
  value: true
}));

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(/*! react */ "./node_modules/react/index.js");

var _react2 = _interopRequireDefault(_react);

var _propTypes = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");

var _propTypes2 = _interopRequireDefault(_propTypes);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _objectWithoutProperties(obj, keys) { var target = {}; for (var i in obj) { if (keys.indexOf(i) >= 0) continue; if (!Object.prototype.hasOwnProperty.call(obj, i)) continue; target[i] = obj[i]; } return target; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var InfiniteScroll = function (_Component) {
  _inherits(InfiniteScroll, _Component);

  function InfiniteScroll(props) {
    _classCallCheck(this, InfiniteScroll);

    var _this = _possibleConstructorReturn(this, (InfiniteScroll.__proto__ || Object.getPrototypeOf(InfiniteScroll)).call(this, props));

    _this.scrollListener = _this.scrollListener.bind(_this);
    _this.eventListenerOptions = _this.eventListenerOptions.bind(_this);
    _this.mousewheelListener = _this.mousewheelListener.bind(_this);
    return _this;
  }

  _createClass(InfiniteScroll, [{
    key: 'componentDidMount',
    value: function componentDidMount() {
      this.pageLoaded = this.props.pageStart;
      this.options = this.eventListenerOptions();
      this.attachScrollListener();
    }
  }, {
    key: 'componentDidUpdate',
    value: function componentDidUpdate() {
      if (this.props.isReverse && this.loadMore) {
        var parentElement = this.getParentElement(this.scrollComponent);
        parentElement.scrollTop = parentElement.scrollHeight - this.beforeScrollHeight + this.beforeScrollTop;
        this.loadMore = false;
      }
      this.attachScrollListener();
    }
  }, {
    key: 'componentWillUnmount',
    value: function componentWillUnmount() {
      this.detachScrollListener();
      this.detachMousewheelListener();
    }
  }, {
    key: 'isPassiveSupported',
    value: function isPassiveSupported() {
      var passive = false;

      var testOptions = {
        get passive() {
          passive = true;
        }
      };

      try {
        document.addEventListener('test', null, testOptions);
        document.removeEventListener('test', null, testOptions);
      } catch (e) {
        // ignore
      }
      return passive;
    }
  }, {
    key: 'eventListenerOptions',
    value: function eventListenerOptions() {
      var options = this.props.useCapture;

      if (this.isPassiveSupported()) {
        options = {
          useCapture: this.props.useCapture,
          passive: true
        };
      }
      return options;
    }

    // Set a defaut loader for all your `InfiniteScroll` components

  }, {
    key: 'setDefaultLoader',
    value: function setDefaultLoader(loader) {
      this.defaultLoader = loader;
    }
  }, {
    key: 'detachMousewheelListener',
    value: function detachMousewheelListener() {
      var scrollEl = window;
      if (this.props.useWindow === false) {
        scrollEl = this.scrollComponent.parentNode;
      }

      scrollEl.removeEventListener('mousewheel', this.mousewheelListener, this.options ? this.options : this.props.useCapture);
    }
  }, {
    key: 'detachScrollListener',
    value: function detachScrollListener() {
      var scrollEl = window;
      if (this.props.useWindow === false) {
        scrollEl = this.getParentElement(this.scrollComponent);
      }

      scrollEl.removeEventListener('scroll', this.scrollListener, this.options ? this.options : this.props.useCapture);
      scrollEl.removeEventListener('resize', this.scrollListener, this.options ? this.options : this.props.useCapture);
    }
  }, {
    key: 'getParentElement',
    value: function getParentElement(el) {
      var scrollParent = this.props.getScrollParent && this.props.getScrollParent();
      if (scrollParent != null) {
        return scrollParent;
      }
      return el && el.parentNode;
    }
  }, {
    key: 'filterProps',
    value: function filterProps(props) {
      return props;
    }
  }, {
    key: 'attachScrollListener',
    value: function attachScrollListener() {
      var parentElement = this.getParentElement(this.scrollComponent);

      if (!this.props.hasMore || !parentElement) {
        return;
      }

      var scrollEl = window;
      if (this.props.useWindow === false) {
        scrollEl = parentElement;
      }

      scrollEl.addEventListener('mousewheel', this.mousewheelListener, this.options ? this.options : this.props.useCapture);
      scrollEl.addEventListener('scroll', this.scrollListener, this.options ? this.options : this.props.useCapture);
      scrollEl.addEventListener('resize', this.scrollListener, this.options ? this.options : this.props.useCapture);

      if (this.props.initialLoad) {
        this.scrollListener();
      }
    }
  }, {
    key: 'mousewheelListener',
    value: function mousewheelListener(e) {
      // Prevents Chrome hangups
      // See: https://stackoverflow.com/questions/47524205/random-high-content-download-time-in-chrome/47684257#47684257
      if (e.deltaY === 1 && !this.isPassiveSupported()) {
        e.preventDefault();
      }
    }
  }, {
    key: 'scrollListener',
    value: function scrollListener() {
      var el = this.scrollComponent;
      var scrollEl = window;
      var parentNode = this.getParentElement(el);

      var offset = void 0;
      if (this.props.useWindow) {
        var doc = document.documentElement || document.body.parentNode || document.body;
        var scrollTop = scrollEl.pageYOffset !== undefined ? scrollEl.pageYOffset : doc.scrollTop;
        if (this.props.isReverse) {
          offset = scrollTop;
        } else {
          offset = this.calculateOffset(el, scrollTop);
        }
      } else if (this.props.isReverse) {
        offset = parentNode.scrollTop;
      } else {
        offset = el.scrollHeight - parentNode.scrollTop - parentNode.clientHeight;
      }

      // Here we make sure the element is visible as well as checking the offset
      if (offset < Number(this.props.threshold) && el && el.offsetParent !== null) {
        this.detachScrollListener();
        this.beforeScrollHeight = parentNode.scrollHeight;
        this.beforeScrollTop = parentNode.scrollTop;
        // Call loadMore after detachScrollListener to allow for non-async loadMore functions
        if (typeof this.props.loadMore === 'function') {
          this.props.loadMore(this.pageLoaded += 1);
          this.loadMore = true;
        }
      }
    }
  }, {
    key: 'calculateOffset',
    value: function calculateOffset(el, scrollTop) {
      if (!el) {
        return 0;
      }

      return this.calculateTopPosition(el) + (el.offsetHeight - scrollTop - window.innerHeight);
    }
  }, {
    key: 'calculateTopPosition',
    value: function calculateTopPosition(el) {
      if (!el) {
        return 0;
      }
      return el.offsetTop + this.calculateTopPosition(el.offsetParent);
    }
  }, {
    key: 'render',
    value: function render() {
      var _this2 = this;

      var renderProps = this.filterProps(this.props);

      var children = renderProps.children,
          element = renderProps.element,
          hasMore = renderProps.hasMore,
          initialLoad = renderProps.initialLoad,
          isReverse = renderProps.isReverse,
          loader = renderProps.loader,
          loadMore = renderProps.loadMore,
          pageStart = renderProps.pageStart,
          ref = renderProps.ref,
          threshold = renderProps.threshold,
          useCapture = renderProps.useCapture,
          useWindow = renderProps.useWindow,
          getScrollParent = renderProps.getScrollParent,
          props = _objectWithoutProperties(renderProps, ['children', 'element', 'hasMore', 'initialLoad', 'isReverse', 'loader', 'loadMore', 'pageStart', 'ref', 'threshold', 'useCapture', 'useWindow', 'getScrollParent']);

      props.ref = function (node) {
        _this2.scrollComponent = node;
        if (ref) {
          ref(node);
        }
      };

      var childrenArray = [children];
      if (hasMore) {
        if (loader) {
          isReverse ? childrenArray.unshift(loader) : childrenArray.push(loader);
        } else if (this.defaultLoader) {
          isReverse ? childrenArray.unshift(this.defaultLoader) : childrenArray.push(this.defaultLoader);
        }
      }
      return _react2.default.createElement(element, props, childrenArray);
    }
  }]);

  return InfiniteScroll;
}(_react.Component);

InfiniteScroll.propTypes = {
  children: _propTypes2.default.node.isRequired,
  element: _propTypes2.default.node,
  hasMore: _propTypes2.default.bool,
  initialLoad: _propTypes2.default.bool,
  isReverse: _propTypes2.default.bool,
  loader: _propTypes2.default.node,
  loadMore: _propTypes2.default.func.isRequired,
  pageStart: _propTypes2.default.number,
  ref: _propTypes2.default.func,
  getScrollParent: _propTypes2.default.func,
  threshold: _propTypes2.default.number,
  useCapture: _propTypes2.default.bool,
  useWindow: _propTypes2.default.bool
};
InfiniteScroll.defaultProps = {
  element: 'div',
  hasMore: false,
  initialLoad: true,
  pageStart: 0,
  ref: null,
  threshold: 250,
  useWindow: true,
  isReverse: false,
  useCapture: false,
  loader: null,
  getScrollParent: null
};
exports["default"] = InfiniteScroll;
module.exports = exports['default'];


/***/ }),

/***/ "./node_modules/react-infinite-scroller/index.js":
/*!*******************************************************!*\
  !*** ./node_modules/react-infinite-scroller/index.js ***!
  \*******************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__(/*! ./dist/InfiniteScroll */ "./node_modules/react-infinite-scroller/dist/InfiniteScroll.js")


/***/ })

}]);