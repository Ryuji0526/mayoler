/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/like.js":
/*!******************************!*\
  !*** ./resources/js/like.js ***!
  \******************************/
/***/ (() => {

eval("$(function () {\n  var like = $('.like-toggle');\n  var withMayoId;\n  like.on('click', function () {\n    var $this = $(this);\n    withMayoId = $this.data('with-mayo-id'); //ajax\n\n    $.ajax({\n      headers: {\n        'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n      },\n      url: '/like',\n      method: 'POST',\n      data: {\n        'with_mayo_id': withMayoId\n      }\n    }) //通信成功した時\n    .done(function (data) {\n      $this.toggleClass('liked');\n      console.log('1');\n      console.log(data.with_mayo_likes_count);\n      $this.next('.like-counter').html(data.with_mayo_likes_count);\n    }) //通信失敗した時\n    .fail(function () {\n      console.log('fail');\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbGlrZS5qcz8wMjE2Il0sIm5hbWVzIjpbIiQiLCJsaWtlIiwid2l0aE1heW9JZCIsIm9uIiwiJHRoaXMiLCJkYXRhIiwiYWpheCIsImhlYWRlcnMiLCJhdHRyIiwidXJsIiwibWV0aG9kIiwiZG9uZSIsInRvZ2dsZUNsYXNzIiwiY29uc29sZSIsImxvZyIsIndpdGhfbWF5b19saWtlc19jb3VudCIsIm5leHQiLCJodG1sIiwiZmFpbCJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQyxZQUFZO0FBQ1osTUFBSUMsSUFBSSxHQUFHRCxDQUFDLENBQUMsY0FBRCxDQUFaO0FBQ0EsTUFBSUUsVUFBSjtBQUNBRCxFQUFBQSxJQUFJLENBQUNFLEVBQUwsQ0FBUSxPQUFSLEVBQWlCLFlBQVk7QUFDM0IsUUFBSUMsS0FBSyxHQUFHSixDQUFDLENBQUMsSUFBRCxDQUFiO0FBQ0FFLElBQUFBLFVBQVUsR0FBR0UsS0FBSyxDQUFDQyxJQUFOLENBQVcsY0FBWCxDQUFiLENBRjJCLENBSTNCOztBQUNBTCxJQUFBQSxDQUFDLENBQUNNLElBQUYsQ0FBTztBQUNMQyxNQUFBQSxPQUFPLEVBQUU7QUFDUCx3QkFBaUJQLENBQUMsQ0FBQyx5QkFBRCxDQUFELENBQTZCUSxJQUE3QixDQUFrQyxTQUFsQztBQURWLE9BREo7QUFJTEMsTUFBQUEsR0FBRyxFQUFFLE9BSkE7QUFLTEMsTUFBQUEsTUFBTSxFQUFFLE1BTEg7QUFNTEwsTUFBQUEsSUFBSSxFQUFFO0FBQ0osd0JBQWdCSDtBQURaO0FBTkQsS0FBUCxFQVVBO0FBVkEsS0FXQ1MsSUFYRCxDQVdNLFVBQVVOLElBQVYsRUFBZ0I7QUFDcEJELE1BQUFBLEtBQUssQ0FBQ1EsV0FBTixDQUFrQixPQUFsQjtBQUNBQyxNQUFBQSxPQUFPLENBQUNDLEdBQVIsQ0FBWSxHQUFaO0FBQ0FELE1BQUFBLE9BQU8sQ0FBQ0MsR0FBUixDQUFZVCxJQUFJLENBQUNVLHFCQUFqQjtBQUNBWCxNQUFBQSxLQUFLLENBQUNZLElBQU4sQ0FBVyxlQUFYLEVBQTRCQyxJQUE1QixDQUFpQ1osSUFBSSxDQUFDVSxxQkFBdEM7QUFDRCxLQWhCRCxFQWlCQTtBQWpCQSxLQWtCQ0csSUFsQkQsQ0FrQk0sWUFBWTtBQUNoQkwsTUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVksTUFBWjtBQUNELEtBcEJEO0FBcUJELEdBMUJEO0FBMkJDLENBOUJGLENBQUQiLCJzb3VyY2VzQ29udGVudCI6WyIkKGZ1bmN0aW9uICgpIHtcbiAgbGV0IGxpa2UgPSAkKCcubGlrZS10b2dnbGUnKTtcbiAgbGV0IHdpdGhNYXlvSWQ7XG4gIGxpa2Uub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xuICAgIGxldCAkdGhpcyA9ICQodGhpcyk7XG4gICAgd2l0aE1heW9JZCA9ICR0aGlzLmRhdGEoJ3dpdGgtbWF5by1pZCcpO1xuXG4gICAgLy9hamF4XG4gICAgJC5hamF4KHtcbiAgICAgIGhlYWRlcnM6IHtcbiAgICAgICAgJ1gtQ1NSRi1UT0tFTicgOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpXG4gICAgICB9LFxuICAgICAgdXJsOiAnL2xpa2UnLFxuICAgICAgbWV0aG9kOiAnUE9TVCcsXG4gICAgICBkYXRhOiB7XG4gICAgICAgICd3aXRoX21heW9faWQnOiB3aXRoTWF5b0lkXG4gICAgICB9LFxuICAgIH0pXG4gICAgLy/pgJrkv6HmiJDlip/jgZfjgZ/mmYJcbiAgICAuZG9uZShmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgJHRoaXMudG9nZ2xlQ2xhc3MoJ2xpa2VkJyk7XG4gICAgICBjb25zb2xlLmxvZygnMScpO1xuICAgICAgY29uc29sZS5sb2coZGF0YS53aXRoX21heW9fbGlrZXNfY291bnQpO1xuICAgICAgJHRoaXMubmV4dCgnLmxpa2UtY291bnRlcicpLmh0bWwoZGF0YS53aXRoX21heW9fbGlrZXNfY291bnQpO1xuICAgIH0pXG4gICAgLy/pgJrkv6HlpLHmlZfjgZfjgZ/mmYJcbiAgICAuZmFpbChmdW5jdGlvbiAoKSB7XG4gICAgICBjb25zb2xlLmxvZygnZmFpbCcpO1xuICAgIH0pO1xuICB9KTtcbiAgfSk7Il0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9saWtlLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/like.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/like.js"]();
/******/ 	
/******/ })()
;