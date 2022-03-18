"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_react_Pages_Private_Tickets_NewTicket_jsx"],{

/***/ "./resources/js/components/select2.js":
/*!********************************************!*\
  !*** ./resources/js/components/select2.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "state_select": () => (/* binding */ state_select),
/* harmony export */   "normal": () => (/* binding */ normal)
/* harmony export */ });
var state_select = {
  templateResult: function templateResult(state) {
    if (!state.id) {
      return state.text;
    }

    var baseUrl = "".concat(APP_PATH, "images/world-icons/");
    var $state = $("<span class=\"span-option\"><img src=".concat(baseUrl + state.id.toLowerCase() + ".svg", " class=\"img-flag\"/>").concat(state.text, "</span>"));
    return $state;
  },
  width: "100%",
  dir: "rtl",
  dropdownAutoWidth: true
};
var normal = function normal() {
  var placeholder = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  return {
    width: "100%",
    dir: "rtl",
    placeholder: placeholder
  };
};

/***/ }),

/***/ "./resources/js/react/Pages/Private/Layout/components/Activity.jsx":
/*!*************************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Layout/components/Activity.jsx ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Activity)
/* harmony export */ });
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-activity */ "./node_modules/react-activity/dist/react-activity.js");
/* harmony import */ var react_activity__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_activity__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");


function Activity(_ref) {
  var _ref$size = _ref.size,
      size = _ref$size === void 0 ? 34 : _ref$size;
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("div", {
    className: "activity-container",
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)(react_activity__WEBPACK_IMPORTED_MODULE_1__.Spinner, {
      color: "#6332df",
      size: size
    })
  });
}
;

/***/ }),

/***/ "./resources/js/react/Pages/Private/Tickets/NewTicket.jsx":
/*!****************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Tickets/NewTicket.jsx ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _components_select2__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../components/select2 */ "./resources/js/components/select2.js");
/* harmony import */ var _services_AlertService__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../services/AlertService */ "./resources/js/services/AlertService.js");
/* harmony import */ var _hooks__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../hooks */ "./resources/js/react/hooks.js");
/* harmony import */ var _Layout_components_Activity__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../Layout/components/Activity */ "./resources/js/react/Pages/Private/Layout/components/Activity.jsx");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }



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

 // import axios from 'axios';









var NewTicket = /*#__PURE__*/function (_Component) {
  _inherits(NewTicket, _Component);

  var _super = _createSuper(NewTicket);

  function NewTicket() {
    var _this;

    _classCallCheck(this, NewTicket);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _super.call.apply(_super, [this].concat(args));

    _defineProperty(_assertThisInitialized(_this), "state", {
      departments: [],
      loading: true,
      files: [],
      department: "",
      title: "",
      ticket_content: ""
    });

    _defineProperty(_assertThisInitialized(_this), "sendNewTicket", /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
      var _this$state, title, department, ticket_content, files, data, response, okay, ticket;

      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _this$state = _this.state, title = _this$state.title, department = _this$state.department, ticket_content = _this$state.ticket_content, files = _this$state.files;
              data = new FormData();
              Object.entries({
                title: title,
                department: department,
                ticket_content: ticket_content
              }).map(function (_ref2) {
                var _ref3 = _slicedToArray(_ref2, 2),
                    key = _ref3[0],
                    value = _ref3[1];

                data.append(key, value);
              });
              files.map(function (file) {
                data.append('files[]', file);
              });
              console.log();
              _context.next = 7;
              return _this.http.post('/', data, {
                headers: {
                  "Content-Type": "multipart/form-data"
                }
              });

            case 7:
              response = _context.sent;
              okay = response.okay, ticket = response.ticket;

              if (okay) {
                _this.props.history.push("/tickets/".concat(ticket.id));
              }

            case 10:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    })));

    _defineProperty(_assertThisInitialized(_this), "onFileSelect", function (e) {
      var newEntries = [],
          files_size = 0,
          acceptableType = true,
          files = _this.state.files;
      Array.prototype.push.apply(newEntries, e.target.files);
      var regex = /image\/\bjpg\b|\bpng\b|\bjpeg\b/;
      files ? newEntries = files.concat(newEntries) : null;

      for (var i = 0; i < newEntries.length; i++) {
        var elem = newEntries[i];
        files_size += elem.size;
        acceptableType = regex.test(elem.type);

        if (!acceptableType) {
          _this.Alert.error({
            title: "فرمت فایل",
            text: "فقط فرمت های jpg, jpeg و png قابل قبول هستند."
          });

          break;
        }
      }

      if (acceptableType) {
        if (newEntries.length > 3) {
          _this.Alert.error({
            title: "تعداد فایل",
            text: "حد اکثر تعداد فایل های انتخابی 3 عدد می باشد."
          });
        } else if (files_size > 12582912
        /*12 megabyte*/
        ) {
          _this.Alert.error({
            title: "حجم فایل های انتخابی",
            text: "حد اکثر حجم فایل های انتخابی 12 مگابایت می باشد."
          });
        } else {
          _this.setState({
            files: newEntries
          }, function () {
            $('#image-input').val("");
          });
        }
      }
    });

    _defineProperty(_assertThisInitialized(_this), "deleteFile", function (index) {
      var files = _this.state.files;
      files.splice(index, 1);

      _this.setState({
        files: files
      });
    });

    _defineProperty(_assertThisInitialized(_this), "changeDepartment", function (department) {
      _this.setState({
        department: department
      });
    });

    _defineProperty(_assertThisInitialized(_this), "loadDepartments", /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee2() {
      var response;
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee2$(_context2) {
        while (1) {
          switch (_context2.prev = _context2.next) {
            case 0:
              _context2.next = 2;
              return _this.http.get('/departments');

            case 2:
              response = _context2.sent;

              if (response[0]) {
                _this.setState({
                  loading: false,
                  departments: response
                }, function () {
                  $("#department-section").select2((0,_components_select2__WEBPACK_IMPORTED_MODULE_2__.normal)("بخش مربوطه"));
                  $("#department-section").on("select2:select", function () {
                    _this.changeDepartment($("#department-section").val());
                  });
                });
              }

            case 4:
            case "end":
              return _context2.stop();
          }
        }
      }, _callee2);
    })));

    return _this;
  }

  _createClass(NewTicket, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      document.title = "ارسال تیکت جدید";
      this.http = (0,_hooks__WEBPACK_IMPORTED_MODULE_4__.useHttpService)('/userarea/tickets');
      this.Alert = new _services_AlertService__WEBPACK_IMPORTED_MODULE_3__["default"]({
        showConfirmButton: true,
        confirmButtonText: "بستن",
        customClass: {
          container: "rtl"
        }
      });
      this.loadDepartments();
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      var _this$state2 = this.state,
          files = _this$state2.files,
          departments = _this$state2.departments,
          loading = _this$state2.loading;
      return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("div", {
        className: "new-ticket-container",
        children: loading ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_Layout_components_Activity__WEBPACK_IMPORTED_MODULE_5__["default"], {}) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.Fragment, {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("div", {
            className: "input-group",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("select", {
              id: "department-section",
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("option", {}), departments.length > 0 && departments.map(function (dep) {
                return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("option", {
                  value: dep.id,
                  children: dep.name
                }, dep.id);
              })]
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("div", {
            className: "input-group my-2",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("input", {
              className: "form-control",
              onChange: function onChange(e) {
                return _this2.setState({
                  title: e.target.value
                });
              },
              placeholder: "\u0639\u0646\u0648\u0627\u0646 \u062A\u06CC\u06A9\u062A"
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
            className: "msg-text-section",
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("div", {
              className: "input-group",
              children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("textarea", {
                className: "form-control",
                onChange: function onChange(e) {
                  return _this2.setState({
                    ticket_content: e.target.value
                  });
                },
                placeholder: "\u0645\u062A\u0646 \u062A\u06CC\u06A9\u062A"
              })
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("button", {
              className: "btn btn-lg btn-light",
              onClick: this.sendNewTicket,
              children: "\u0627\u0631\u0633\u0627\u0644 \u062A\u06CC\u06A9\u062A"
            })]
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
            className: "upload-boxes",
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("div", {
              className: "files-preview",
              children: files && files.length > 0 ? files.map(function (file, i) {
                return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
                  className: "selected-image",
                  children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("img", {
                    src: URL.createObjectURL(file)
                  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("a", {
                    className: "badge badge-pill badge-dark",
                    onClick: _this2.deleteFile.bind(_this2, i),
                    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("i", {
                      className: "far fa-trash-alt"
                    })
                  })]
                }, i);
              }) : "فایل های ضمیمه شما در این قسمت نمایش داده می شود"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
              className: "choose-file",
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("h4", {
                children: "\u0627\u0641\u0632\u0648\u062F\u0646 \u0639\u06A9\u0633"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("span", {
                children: "[jpg, jpeg, png]"
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("input", {
                className: "d-none",
                type: "file",
                name: "image-input",
                id: "image-input",
                onChange: this.onFileSelect,
                accept: ".png,.jpg,.jpeg",
                multiple: true
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("label", {
                className: "btn btn-light btn-sm",
                htmlFor: "image-input",
                children: "\u0627\u0646\u062A\u062E\u0627\u0628"
              })]
            })]
          })]
        })
      });
    }
  }]);

  return NewTicket;
}(react__WEBPACK_IMPORTED_MODULE_1__.Component);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (NewTicket);

/***/ })

}]);