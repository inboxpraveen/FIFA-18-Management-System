var _createClass = function () {
  function defineProperties(target, props)
  {for (var i = 0; i < props.length; i++)
    {var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);}}
    return function (Constructor, protoProps, staticProps)
    {if (protoProps) defineProperties(Constructor.prototype, protoProps);
    if (staticProps) defineProperties(Constructor, staticProps);
    return Constructor;};
  }();

  function _classCallCheck(instance, Constructor)
{if (!(instance instanceof Constructor))
{throw new TypeError("Cannot call a class as a function");}}
// ——————————————————————————————————————————————————
// TextScramble
// ——————————————————————————————————————————————————
var TextScramble = function () {
  function TextScramble(el) {_classCallCheck(this, TextScramble);
    this.el = el;
    this.chars = "!<>-_\\/[]{}—=+*^?#________";
    this.update = this.update.bind(this);
  }_createClass(TextScramble, [{ key: "setText", value: function setText(
    newText) {var _this = this;
      var oldText = this.el.innerText;
      var length = Math.max(oldText.length, newText.length);
      var promise = new Promise(function (resolve) {
return _this.resolve = resolve;});
      this.queue = [];
      for (var i = 0; i < length; i++) {
        var from = oldText[i] || "";
        var to = newText[i] || "";
        var start = Math.floor(Math.random() * 40);
        var end = start + Math.floor(Math.random() * 40);
        this.queue.push({ from: from, to: to, start: start, end: end });
      }
      cancelAnimationFrame(this.frameRequest);
      this.frame = 0;
      this.update();
      return promise;
    } }, { key: "update", value: function update()
    {
      var output = "";
      var complete = 0;
      for (var i = 0, n = this.queue.length; i < n; i++) {var _queue$i =
        this.queue[i],from = _queue$i.from,to = _queue$i.to,start = _queue$i.start,end = _queue$i.end,char = _queue$i.char;
        if (this.frame >= end) {
          complete++;
          output += to;
        } else if (this.frame >= start) {
          if (!char || Math.random() < 0.28) {
            char = this.randomChar();
            this.queue[i].char = char;
          }
          output += '<span class="dud">' + char + '</span>';
        } else {
          output += from;
        }
      }
      this.el.innerHTML = output;
      if (complete === this.queue.length) {
        this.resolve();
      } else {
        this.frameRequest = requestAnimationFrame(this.update);
        this.frame++;
      }
    } }, { key: "randomChar", value: function randomChar()
    {
      return this.chars[Math.floor(Math.random() * this.chars.length)];
    } }]);
  return TextScramble;}();


// ——————————————————————————————————————————————————
// Example
// ——————————————————————————————————————————————————

var phrases = [
  "HI THERE! WELCOME TO THE DEVELOPERS SPACE. YOU ARE ABOUT TO EXPLORE",
  "FIFA 18 DATABASE MANAGAMENT SYSTEM",
  "DEVELOPED WITH UNCONDITIONAL LOVE AND PASSION",
  "BY'PRAVEEN KUMAR'    USN:1MJ16CS105"];


var el = document.querySelector(".text");
var fx = new TextScramble(el);

var counter = 0;
var next = function next() {
  fx.setText(phrases[counter]).then(function () {
    setTimeout(next, 1700);
  });
  counter = (counter + 1) % phrases.length;
};

next();
