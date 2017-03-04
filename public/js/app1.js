!function(a){"use strict";var b=a.HTMLCanvasElement&&a.HTMLCanvasElement.prototype,c=a.Blob&&function(){try{return Boolean(new Blob)}catch(a){return!1}}(),d=c&&a.Uint8Array&&function(){try{return 100===new Blob([new Uint8Array(100)]).size}catch(a){return!1}}(),e=a.BlobBuilder||a.WebKitBlobBuilder||a.MozBlobBuilder||a.MSBlobBuilder,f=(c||e)&&a.atob&&a.ArrayBuffer&&a.Uint8Array&&function(a){var b,f,g,h,i,j;for(b=a.split(",")[0].indexOf("base64")>=0?atob(a.split(",")[1]):decodeURIComponent(a.split(",")[1]),f=new ArrayBuffer(b.length),g=new Uint8Array(f),h=0;h<b.length;h+=1)g[h]=b.charCodeAt(h);return i=a.split(",")[0].split(":")[1].split(";")[0],c?new Blob([d?g:f],{type:i}):(j=new e,j.append(f),j.getBlob(i))};a.HTMLCanvasElement&&!b.toBlob&&(b.mozGetAsFile?b.toBlob=function(a,c,d){d&&b.toDataURL&&f?a(f(this.toDataURL(c,d))):a(this.mozGetAsFile("blob",c))}:b.toDataURL&&f&&(b.toBlob=function(a,b,c){a(f(this.toDataURL(b,c)))})),"function"==typeof define&&define.amd?define(function(){return f}):a.dataURLtoBlob=f}(this);
window.resize = (function () {

      'use strict';

      function Resize() {
            //
      }

      Resize.prototype = {

            init: function(outputQuality) {
                  this.outputQuality = (outputQuality === 'undefined' ? 0.8 : outputQuality);
            },

            photo: function(file, maxSize, outputType, callback) {

                  var _this = this;

                  var reader = new FileReader();
                  reader.onload = function (readerEvent) {
                        _this.resize(readerEvent.target.result, maxSize, outputType, callback);
                  }
                  reader.readAsDataURL(file);

            },

            resize: function(dataURL, maxSize, outputType, callback) {

                  var _this = this;

                  var image = new Image();
                  image.onload = function (imageEvent) {

                        // Resize image
                        var canvas = document.createElement('canvas'),
                              width = image.width,
                              height = image.height;
                        if (width > height) {
                              if (width > maxSize) {
                                    height *= maxSize / width;
                                    width = maxSize;
                              }
                        } else {
                              if (height > maxSize) {
                                    width *= maxSize / height;
                                    height = maxSize;
                              }
                        }
                        canvas.width = width;
                        canvas.height = height;
                        canvas.getContext('2d').drawImage(image, 0, 0, width, height);

                        _this.output(canvas, outputType, callback);

                  }
                  image.src = dataURL;

            },

            output: function(canvas, outputType, callback) {

                  switch (outputType) {

                        case 'file':
                              canvas.toBlob(function (blob) {
                                    callback(blob);
                              }, 'image/jpeg', 0.8);
                              break;

                        case 'dataURL':
                              callback(canvas.toDataURL('image/jpeg', 0.8));
                              break;

                  }

            }

      };

      return Resize;

}());
document.addEventListener('DOMContentLoaded', function (event) {

      'use strict';

      // Initialise resize library
      var resize = new window.resize();
      resize.init();

      // Upload photo
      var upload = function (photo, callback) {
            var formData = new FormData();
            formData.append('photo', photo);
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                  if (request.readyState === 4) {
                        callback(request.response);
                  }
            }
            request.open('POST', './process.php');
            request.responseType = 'json';
            request.send(formData);
      };

      var fileSize = function (size) {
            var i = Math.floor(Math.log(size) / Math.log(1024));
            return (size / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
      };

      document.querySelector('form input[type=file]').addEventListener('change', function (event) {
            event.preventDefault();

            var files = event.target.files;
            for (var i in files) {

                  if (typeof files[i] !== 'object') return false;

                  (function () {

                        var initialSize = files[i].size;

                        resize.photo(files[i], 1200, 'file', function (resizedFile) {

                              var resizedSize = resizedFile.size;

                              upload(resizedFile, function (response) {
                                    var rowElement = document.createElement('tr');
                                    rowElement.innerHTML = '<td>'+new Date().getHours()+':'+new Date().getMinutes()+':'+new Date().getSeconds()+'</td><td>'+fileSize(initialSize)+'</td><td>'+fileSize(resizedSize)+'</td><td>'+Math.round((initialSize - resizedSize) / initialSize * 100)+'%</td>';
                             
                                    document.querySelector('table.images tbody').appendChild(rowElement);
                              });

                             
                              resize.photo(resizedFile, 600, 'dataURL', function (thumbnail) {
                                    console.log('Display the thumbnail to the user: ', thumbnail);
                              });

                        });

                  }());

            }

      });

});