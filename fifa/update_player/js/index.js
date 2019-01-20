var svg = document.querySelector("svg");
var cursor = svg.createSVGPoint();
var arrows = document.querySelector(".arrows");
var randomAngle = 0;

// center of target
var target = {
	x: 900,
	y: 249.5
};

// target intersection line segment
var lineSegment = {
	x1: 875,
	y1: 280,
	x2: 925,
	y2: 220
};

// bow rotation point
var pivot = {
	x: 100,
	y: 250
};
aim({
	clientX: 320,
	clientY: 300
});



// set up start drag event
window.addEventListener("mousedown", draw);

function draw(e) {
	// pull back arrow
	randomAngle = (Math.random() * Math.PI * 0.03) - 0.015;
	TweenMax.to(".arrow-angle use", 0.3, {
		opacity: 1
	});
	window.addEventListener("mousemove", aim);
	window.addEventListener("mouseup", loose);
	aim(e);
}



function aim(e) {
	// get mouse position in relation to svg position and scale
	var point = getMouseSVG(e);
	point.x = Math.min(point.x, pivot.x - 7);
	point.y = Math.max(point.y, pivot.y + 7);
	var dx = point.x - pivot.x;
	var dy = point.y - pivot.y;
	// Make it more difficult by adding random angle each time
	var angle = Math.atan2(dy, dx) + randomAngle;
	var bowAngle = angle - Math.PI;
	var distance = Math.min(Math.sqrt((dx * dx) + (dy * dy)), 50);
	var scale = Math.min(Math.max(distance / 30, 1), 2);
	TweenMax.to("#bow", 0.3, {
		scaleX: scale,
		rotation: bowAngle + "rad",
		transformOrigin: "right center"
	});
	var arrowX = Math.min(pivot.x - ((1 / scale) * distance), 88);
	TweenMax.to(".arrow-angle", 0.3, {
		rotation: bowAngle + "rad",
		svgOrigin: "100 250"
	});
	TweenMax.to(".arrow-angle use", 0.3, {
		x: -distance
	});
	TweenMax.to("#bow polyline", 0.3, {
		attr: {
			points: "88,200 " + Math.min(pivot.x - ((1 / scale) * distance), 88) + ",250 88,300"
		}
	});

	var radius = distance * 9;
	var offset = {
		x: (Math.cos(bowAngle) * radius),
		y: (Math.sin(bowAngle) * radius)
	};
	var arcWidth = offset.x * 3;

	TweenMax.to("#arc", 0.3, {
		attr: {
			d: "M100,250c" + offset.x + "," + offset.y + "," + (arcWidth - offset.x) + "," + (offset.y + 50) + "," + arcWidth + ",50"
		},
			autoAlpha: distance/60
	});

}

function loose() {
	// release arrow
	window.removeEventListener("mousemove", aim);
	window.removeEventListener("mouseup", loose);

	TweenMax.to("#bow", 0.4, {
		scaleX: 1,
		transformOrigin: "right center",
		ease: Elastic.easeOut
	});
	TweenMax.to("#bow polyline", 0.4, {
		attr: {
			points: "88,200 88,250 88,300"
		},
		ease: Elastic.easeOut
	});
	// duplicate arrow
	var newArrow = document.createElementNS("http://www.w3.org/2000/svg", "use");
	newArrow.setAttributeNS('http://www.w3.org/1999/xlink', 'href', "#arrow");
	arrows.appendChild(newArrow);
	
	// animate arrow along path
	var path = MorphSVGPlugin.pathDataToBezier("#arc");
	TweenMax.to([newArrow], 0.5, {
		force3D: true,
		bezier: {
			type: "cubic",
			values: path,
			autoRotate: ["x", "y", "rotation"]
		},
		onUpdate: hitTest,
		onUpdateParams: ["{self}"],
		onComplete: onMiss,
		ease: Linear.easeNone
	});
	TweenMax.to("#arc", 0.3, {
		opacity: 0
	});
	//hide previous arrow
	TweenMax.set(".arrow-angle use", {
		opacity: 0
	});
}

function hitTest(tween) {
	// check for collisions with arrow and target
	var arrow = tween.target[0];
	var transform = arrow._gsTransform;
	var radians = transform.rotation * Math.PI / 180;
	var arrowSegment = {
		x1: transform.x,
		y1: transform.y,
		x2: (Math.cos(radians) * 60) + transform.x,
		y2: (Math.sin(radians) * 60) + transform.y
	}

	var intersection = getIntersection(arrowSegment, lineSegment);
	if (intersection.segment1 && intersection.segment2) {
		tween.pause();
		var dx = intersection.x - target.x;
		var dy = intersection.y - target.y;
		var distance = Math.sqrt((dx * dx) + (dy * dy));
		var selector = ".hit";
		if (distance < 7) {
			selector = ".bullseye"
		}
		showMessage(selector);
	}

}

function onMiss() {
	// Damn!
	showMessage(".miss");
}

function showMessage(selector) {
	// handle all text animations by providing selector
	TweenMax.killTweensOf(selector);
	TweenMax.killChildTweensOf(selector);
	TweenMax.set(selector, {
		autoAlpha: 1
	});
	TweenMax.staggerFromTo(selector + " path", .5, {
		rotation: -5,
		scale: 0,
		transformOrigin: "center"
	}, {
		scale: 1,
		ease: Back.easeOut
	}, .05);
	TweenMax.staggerTo(selector + " path", .3, {
		delay: 2,
		rotation: 20,
		scale: 0,
		ease: Back.easeIn
	}, .03);
}



function getMouseSVG(e) {
	// normalize mouse position within svg coordinates
	cursor.x = e.clientX;
	cursor.y = e.clientY;
	return cursor.matrixTransform(svg.getScreenCTM().inverse());
}

function getIntersection(segment1, segment2) {
	// find intersection point of two line segments and whether or not the point is on either line segment
	var dx1 = segment1.x2 - segment1.x1;
	var dy1 = segment1.y2 - segment1.y1;
	var dx2 = segment2.x2 - segment2.x1;
	var dy2 = segment2.y2 - segment2.y1;
	var cx = segment1.x1 - segment2.x1;
	var cy = segment1.y1 - segment2.y1;
	var denominator = dy2 * dx1 - dx2 * dy1;
	if (denominator == 0) {
		return null;
	}
	var ua = (dx2 * cy - dy2 * cx) / denominator;
	var ub = (dx1 * cy - dy1 * cx) / denominator;
	return {
		x: segment1.x1 + ua * dx1,
		y: segment1.y1 + ua * dy1,
		segment1: ua >= 0 && ua <= 1,
		segment2: ub >= 0 && ub <= 1
	};
}

$('.button--bubble').each(function() {
	var $circlesTopLeft = $(this).parent().find('.circle.top-left');
	var $circlesBottomRight = $(this).parent().find('.circle.bottom-right');
  
	var tl = new TimelineLite();
	var tl2 = new TimelineLite();
  
	var btTl = new TimelineLite({ paused: true });
  
	tl.to($circlesTopLeft, 1.2, { x: -25, y: -25, scaleY: 2, ease: SlowMo.ease.config(0.1, 0.7, false) });
	tl.to($circlesTopLeft.eq(0), 0.1, { scale: 0.2, x: '+=6', y: '-=2' });
	tl.to($circlesTopLeft.eq(1), 0.1, { scaleX: 1, scaleY: 0.8, x: '-=10', y: '-=7' }, '-=0.1');
	tl.to($circlesTopLeft.eq(2), 0.1, { scale: 0.2, x: '-=15', y: '+=6' }, '-=0.1');
	tl.to($circlesTopLeft.eq(0), 1, { scale: 0, x: '-=5', y: '-=15', opacity: 0 });
	tl.to($circlesTopLeft.eq(1), 1, { scaleX: 0.4, scaleY: 0.4, x: '-=10', y: '-=10', opacity: 0 }, '-=1');
	tl.to($circlesTopLeft.eq(2), 1, { scale: 0, x: '-=15', y: '+=5', opacity: 0 }, '-=1');
  
	var tlBt1 = new TimelineLite();
	var tlBt2 = new TimelineLite();
	
	tlBt1.set($circlesTopLeft, { x: 0, y: 0, rotation: -45 });
	tlBt1.add(tl);
  
	tl2.set($circlesBottomRight, { x: 0, y: 0 });
	tl2.to($circlesBottomRight, 1.1, { x: 30, y: 30, ease: SlowMo.ease.config(0.1, 0.7, false) });
	tl2.to($circlesBottomRight.eq(0), 0.1, { scale: 0.2, x: '-=6', y: '+=3' });
	tl2.to($circlesBottomRight.eq(1), 0.1, { scale: 0.8, x: '+=7', y: '+=3' }, '-=0.1');
	tl2.to($circlesBottomRight.eq(2), 0.1, { scale: 0.2, x: '+=15', y: '-=6' }, '-=0.2');
	tl2.to($circlesBottomRight.eq(0), 1, { scale: 0, x: '+=5', y: '+=15', opacity: 0 });
	tl2.to($circlesBottomRight.eq(1), 1, { scale: 0.4, x: '+=7', y: '+=7', opacity: 0 }, '-=1');
	tl2.to($circlesBottomRight.eq(2), 1, { scale: 0, x: '+=15', y: '-=5', opacity: 0 }, '-=1');
	
	tlBt2.set($circlesBottomRight, { x: 0, y: 0, rotation: 45 });
	tlBt2.add(tl2);
  
	btTl.add(tlBt1);
	btTl.to($(this).parent().find('.button.effect-button'), 0.8, { scaleY: 1.1 }, 0.1);
	btTl.add(tlBt2, 0.2);
	btTl.to($(this).parent().find('.button.effect-button'), 1.8, { scale: 1, ease: Elastic.easeOut.config(1.2, 0.4) }, 1.2);
  
	btTl.timeScale(2.6);
  
	$(this).on('mouseover', function() {
	  btTl.restart();
	});
  });
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