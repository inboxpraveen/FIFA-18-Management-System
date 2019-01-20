var iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);
var ff = navigator.userAgent.indexOf('Firefox') > 0;
var tap = ('ontouchstart' in window || navigator.msMaxTouchPoints) ? 'touchstart' : 'mousedown';
if (iOS) document.body.classList.add('iOS');

var fireworks = (function() {

  var getFontSize = function() {
    return parseFloat(getComputedStyle(document.documentElement).fontSize);
  }

  var canvas = document.querySelector('.fireworks');
  var ctx = canvas.getContext('2d');
  var numberOfParticules = 24;
  var distance = 200;
  var x = 0;
  var y = 0;
  var animations = [];

  var setCanvasSize = function() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }

  var updateCoords = function(e) {
    x = e.clientX || e.touches[0].clientX;
    y = e.clientY || e.touches[0].clientY;
  }

  var colors = ['#FF324A', '#31FFA6', '#206EFF', '#FFFF99'];

  var createCircle = function(x,y) {
    var p = {};
    p.x = x;
    p.y = y;
    p.color = colors[anime.random(0, colors.length - 1)];
    p.color = '#FFF';
    p.radius = 0;
    p.alpha = 1;
    p.lineWidth = 6;
    p.draw = function() {
      ctx.globalAlpha = p.alpha;
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.radius, 0, 2 * Math.PI, true);
      ctx.lineWidth = p.lineWidth;
      ctx.strokeStyle = p.color;
      ctx.stroke();
      ctx.globalAlpha = 1;
    }
    return p;
  }

  var createParticule = function(x,y) {
    var p = {};
    p.x = x;
    p.y = y;
    p.color = colors[anime.random(0, colors.length - 1)];
    p.radius = anime.random(getFontSize(), getFontSize() * 2);
    p.draw = function() {
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.radius, 0, 2 * Math.PI, true);
      ctx.fillStyle = p.color;
      ctx.fill();
    }
    return p;
  }

  var createParticles = function(x,y) {
    var particules = [];
    for (var i = 0; i < numberOfParticules; i++) {
      var p = createParticule(x, y);
      particules.push(p);
    }
    return particules;
  }

  var removeAnimation = function(animation) {
    var index = animations.indexOf(animation);
    if (index > -1) animations.splice(index, 1);
  }

  var animateParticules = function(x, y) {
    setCanvasSize();
    var particules = createParticles(x, y);
    var circle = createCircle(x, y);
    var particulesAnimation = anime({
      targets: particules,
      x: function(p) { return p.x + anime.random(-distance, distance); },
      y: function(p) { return p.y + anime.random(-distance, distance); },
      radius: 0,
      duration: function() { return anime.random(1200, 1800); },
      easing: 'easeOutExpo',
      complete: removeAnimation
    });
    var circleAnimation = anime({
      targets: circle,
      radius: function() { return anime.random(getFontSize() * 8.75, getFontSize() * 11.25); },
      lineWidth: 0,
      alpha: {
        value: 0,
        easing: 'linear',
        duration: function() { return anime.random(400, 600); }
      },
      duration: function() { return anime.random(1200, 1800); },
      easing: 'easeOutExpo',
      complete: removeAnimation
    });
    animations.push(particulesAnimation);
    animations.push(circleAnimation);
  }

  var mainLoop = anime({
    duration: Infinity,
    update: function() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      animations.forEach(function(anim) {
        anim.animatables.forEach(function(animatable) {
          animatable.target.draw();
        });
      });
    }
  });

  document.addEventListener(tap, function(e) {
    updateCoords(e);
    animateParticules(x, y);
  }, false);

  window.addEventListener('resize', setCanvasSize, false);

  return {
    boom: animateParticules
  }

})();

var logoAnimation = function() {

  document.body.classList.add('ready');

  var setDashoffset = function(el) {
    var l = el.getTotalLength();
    el.setAttribute('stroke-dasharray', l);
    return [l,0];
  }

  var letters = anime({
    targets: '#lines path',
    strokeDashoffset: {
      value: setDashoffset,
      duration: 700,
      easing: 'easeOutQuad'
    },
    transform: ['translate(0 128)', 'translate(0 0)'],
    delay: function(el, i) {
      return 750 + (i * 120)
    },
    duration: 1400
  });

  var dotJSRoll = anime({
    targets: '#dot-js',
    transform: ['translate(0 0)', 'translate(544 0)'],
    delay: letters.duration - 800,
    duration: 800,
    elasticity: 300
  });

  var dotJSDown = anime({
    targets: '#dot-js',
    transform: ['translate(0 -304)', 'translate(0 0)'],
    duration: 500,
    elasticity: 600,
    autoplay: false
  });

  var dotJSUp = anime({
    targets: '#dot-js',
    transform: ['translate(0 0) scale(1 3)', 'translate(0 -352) scale(1 1)'],
    duration: 800,
    easing: 'easeOutCirc',
    complete: dotJSDown.play
  });

  var boom = anime({
    duration: 880,
    complete: function(a) {
      var dot = dotJSDown.animatables[0].target.getBoundingClientRect();
      var pos = {x: dot.left + (dot.width / 2), y: dot.top + (dot.height / 2)}
      fireworks.boom(pos.x, pos.y);
    }
  });

  var letterI = anime({
    targets: '#line-i-1',
    strokeDashoffset: {
      value: setDashoffset,
      duration: 700,
      easing: 'easeOutQuad'
    },
    transform: function() {
      return ff ? ['rotate(360)', 'rotate(0)'] : ['rotate(360 240 64)', 'rotate(0 240 64)'];
    },
    duration: 2500,
    delay: letters.duration - 780
  });

  var dotI = anime({
    targets: '#dot-i',
    transform: ['translate(0 -352) scale(1 3)', 'translate(0 0) scale(1 1)'],
    opacity: {
      value: [0, 1],
      easing: 'linear',
      duration: 100
    },
    delay: letters.duration + 250
  });

  var JSletters = anime({
    targets: ['#line-j', '#line-s'],
    strokeDashoffset: setDashoffset,
    duration: 1400,
    delay: function(el, i) { return (letterI.duration - 1400) + (i * 60) },
    easing: 'easeInOutQuart'
  });

  var gradients = anime({
    targets: '#fills *:not(#dot-i)',
    opacity: [0, 1],
    delay: letterI.duration - 300,
    delay: function(el, i, l) {
      var mid = l/2;
      var index = (i - mid) > mid ? 0 : i;
      var delay = Math.abs(index - mid);
      return (letterI.duration - 1300) + (delay * 30);
    },
    duration: 500,
    easing: 'linear'
  });

}

document.addEventListener('DOMContentLoaded', logoAnimation, false);