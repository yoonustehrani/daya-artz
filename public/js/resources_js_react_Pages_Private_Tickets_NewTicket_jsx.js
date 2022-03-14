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

/***/ "./resources/js/react/Pages/Private/Tickets/NewTicket.jsx":
/*!****************************************************************!*\
  !*** ./resources/js/react/Pages/Private/Tickets/NewTicket.jsx ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _components_select2__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../components/select2 */ "./resources/js/components/select2.js");
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
      ticket_content: "",
      department: "",
      files: null
    });

    _defineProperty(_assertThisInitialized(_this), "sendNewTicket", function () {
      var _this$state = _this.state,
          ticket_content = _this$state.ticket_content,
          department = _this$state.department,
          files = _this$state.files; // axios.post('', {message: ticket_content, department: department, files: files}).then(res => {
      //     let { data } = res.data
      // })
    });

    _defineProperty(_assertThisInitialized(_this), "changeContent", function (e) {
      _this.setState({
        ticket_content: e.target.value
      });
    });

    _defineProperty(_assertThisInitialized(_this), "onFileSelect", function (e) {
      var newEntries = [],
          files_size = 0,
          acceptableType = true,
          files = _this.state.files;
      Array.prototype.push.apply(newEntries, e.target.files);
      console.log(newEntries);
      var regex = /image\/\bjpg\b|\bpng\b|\bjpeg\b/;
      files ? newEntries = files.concat(newEntries) : null;

      for (var i = 0; i < newEntries.length; i++) {
        var elem = newEntries[i];
        files_size += elem.size;
        acceptableType = regex.test(elem.type);

        if (!acceptableType) {
          sweetalert2__WEBPACK_IMPORTED_MODULE_1___default().fire({
            icon: "error",
            title: "فرمت فایل",
            text: "فقط فرمت های jpg, jpeg و png قابل قبول هستند.",
            showConfirmButton: true,
            confirmButtonText: "بستن",
            customClass: {
              container: "rtl"
            }
          });
          break;
        }
      }

      if (acceptableType) {
        if (newEntries.length > 3) {
          sweetalert2__WEBPACK_IMPORTED_MODULE_1___default().fire({
            icon: "error",
            title: "تعداد فایل",
            text: "حد اکثر تعداد فایل های انتخابی 3 عدد می باشد.",
            showConfirmButton: true,
            confirmButtonText: "بستن",
            customClass: {
              container: "rtl"
            }
          });
        } else if (files_size > 12582912
        /*12 megabyte*/
        ) {
          "";
          sweetalert2__WEBPACK_IMPORTED_MODULE_1___default().fire({
            icon: "error",
            title: "حجم فایل های انتخابی",
            text: "حد اکثر حجم فایل های انتخابی 12 مگابایت می باشد.",
            showConfirmButton: true,
            confirmButtonText: "بستن",
            customClass: {
              container: "rtl"
            }
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

    return _this;
  }

  _createClass(NewTicket, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      var _this2 = this;

      document.title = "ارسال تیکت جدید";
      $("#department-section").select2((0,_components_select2__WEBPACK_IMPORTED_MODULE_2__.normal)("بخش مربوطه"));
      $("#department-section").on("select2:select", function () {
        _this2.setState({
          department: $("#department-section").val()
        });
      });
    }
  }, {
    key: "render",
    value: function render() {
      var _this3 = this;

      var files = this.state.files;
      return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
        className: "new-ticket-container",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
          className: "input-group",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("select", {
            id: "department-section",
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("option", {
              value: ""
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("option", {
              value: "support",
              children: "\u067E\u0634\u062A\u06CC\u0628\u0627\u0646\u06CC"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("option", {
              value: "sales",
              children: "\u0641\u0631\u0648\u0634"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("option", {
              value: "finance",
              children: "\u0627\u0645\u0648\u0631 \u0645\u0627\u0644\u06CC"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("option", {
              value: "management",
              children: "\u0645\u062F\u06CC\u0631\u06CC\u062A"
            })]
          })
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
          className: "msg-text-section",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
            className: "input-group",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("textarea", {
              className: "form-control",
              onChange: this.changeContent.bind(this),
              placeholder: "\u0645\u062A\u0646 \u067E\u06CC\u0627\u0645:"
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("button", {
            className: "btn btn-lg btn-light",
            children: "\u0627\u0631\u0633\u0627\u0644 \u062A\u06CC\u06A9\u062A"
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
          className: "upload-boxes",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
            className: "files-preview",
            children: files && files.length > 0 ? files.map(function (file, i) {
              return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
                className: "selected-image",
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("img", {
                  src: URL.createObjectURL(file)
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("a", {
                  className: "badge badge-pill badge-dark",
                  onClick: _this3.deleteFile.bind(_this3, i),
                  children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("i", {
                    className: "far fa-trash-alt"
                  })
                })]
              }, i);
            }) : "فایل های ضمیمه شما در این قسمت نمایش داده می شود"
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
            className: "choose-file",
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("h4", {
              children: "\u0627\u0641\u0632\u0648\u062F\u0646 \u0639\u06A9\u0633"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("span", {
              children: "[jpg, jpeg, png]"
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("input", {
              className: "d-none",
              type: "file",
              name: "image-input",
              id: "image-input",
              onChange: this.onFileSelect,
              accept: ".png,.jpg,.jpeg",
              multiple: true
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("label", {
              className: "btn btn-light btn-sm",
              htmlFor: "image-input",
              children: "\u0627\u0646\u062A\u062E\u0627\u0628"
            })]
          })]
        })]
      });
    }
  }]);

  return NewTicket;
}(react__WEBPACK_IMPORTED_MODULE_0__.Component);

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (NewTicket);

/***/ })

}]);