var bordom = 0;
var iris = {ref: null, x: 0, y: 0, w: 60, h: 60, color:'', lerp: 0};
var black = {ref: null, x: 0, y: 0, size: 30, sizeGoal: 30, lerp: 0};
var mouse = {x: 50, y: 50, oldX: 50, oldY: 50};
var eye, center, distanceThreshold, r;
var distractedFlag = true;
var xp = 45;
var yp = 45;
var treg = /-?(\d|\.)+/g;

function init() {
  eye = $('#eye-white-01');

  iris.ref = $('#iris-01');
  iris.ref.css('transform', 'translate(0, 0)');
  iris.x = parseInt(iris.ref[0].style.transform.match(treg)[0] - 50);
  iris.y = parseInt(iris.ref[0].style.transform.match(treg)[1] - 130);
  iris.w = 74;
  iris.h = 74;

  r = iris.w/2;
  
  center = {
    x: 60 - r, 
    y: 60 - r
  };

  distanceThreshold = 60 - r;

  black.ref = $('#pupil-01');
  black.ref.css('transform', 'translate(0, 0)');
  black.x = parseInt(black.ref[0].style.transform.match(treg)[0]);
  black.y = parseInt(black.ref[0].style.transform.match(treg)[1]);
  black.w = 33;
  black.h = 33;
  
  $(window).mousemove(function(e){
    distractedFlag = false;

    var eyeposx = parseInt(eye[0].getBoundingClientRect().left);
    var eyeposy = parseInt(eye[0].getBoundingClientRect().top);

    var d = {
      x: e.pageX - r - eyeposx - center.x,
      y: e.pageY - r - eyeposy - center.y
    };
    
    var distance = Math.sqrt(d.x*d.x + d.y*d.y);
    if (distance < distanceThreshold) {
      mouse.x = e.pageX - eyeposx - r;
      mouse.y = e.pageY - eyeposy - r;
    } 
    else {
      mouse.x = (d.x / distance * distanceThreshold + center.x) * 1.4;
      mouse.y = (d.y / distance * distanceThreshold + center.y) * 1.4;
    }
  });


  animation();
}


function animation() {
  bordom -= 1;
  
  if (bordom <= 0) {
    bordom = randomInt(60, 120);
    
    if (distractedFlag == true) {

      var eyeposx = parseInt(eye[0].style.transform.match(treg)[0]);
      var eyeposy = parseInt(eye[0].style.transform.match(treg)[1]);
      var tempX = randomInt((mouse.x+eyeposx+r)-200, (mouse.x+eyeposx+r)+200);
      var tempY = randomInt((mouse.y+eyeposx+r)-200, (mouse.y+eyeposx+r)+100);

      var d = {
          x: tempX - r - eyeposx - center.x,
          y: tempY - r - eyeposy - center.y
        };
        var distance = Math.sqrt(d.x*d.x + d.y*d.y);
        if (distance < distanceThreshold) {
          mouse.x = tempX - eyeposx - r;
          mouse.y = tempY - eyeposy - r;
        } 
        else {
          mouse.x = d.x / distance * distanceThreshold + center.x;
          mouse.y = d.y / distance * distanceThreshold + center.y;
        }
      }
      distractedFlag = true;
    }
  followMouse();
  updateEyeParts();
  mouse.oldX = mouse.x;
  mouse.oldY = mouse.y;
  setTimeout(animation, 16);
}

function updateEyeParts() {
  iris.ref.css('transform', 'translate(' + iris.x + 'px, ' + iris.y + 'px)');
  black.ref.css('transform', 'translate(' + black.x + 'px, ' + black.y + 'px)');
  $('#shine-01').css('transform', 'translate(' + black.x + 'px, ' + black.y + 'px)');
}

function followMouse() { 
  var lerpSpeed = 0.12;
  xp = interpolate(xp, mouse.x, 0, lerpSpeed);
  yp = interpolate(yp, mouse.y, 0, lerpSpeed);
  
  var distance = Math.sqrt((mouse.x-mouse.oldX)*(mouse.x-mouse.oldX) + 
                           (mouse.y-mouse.oldY)*(mouse.y-mouse.oldY));
  
  if (distance >= 25) {
    xp = interpolate(xp, mouse.x, 0, 0.4);
    yp = interpolate(yp, mouse.y, 0, 0.4);
  }
  
  iris.x = xp - 50;
  iris.y = yp - 130;
  
  black.x = iris.x - 10;
  black.y = iris.y - 10;
}

function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function interpolate(part, goalPos, currentLerp, lerpSpeed) {
    
		if (part != goalPos) {
			currentLerp = 0;
		} 

		if (currentLerp <= 1.0) {
			currentLerp += lerpSpeed;
		}

		part = lerp(part, currentLerp, goalPos);

    return part;
}

function lerp(x, t, y) {
  return x * (1-t) + y*t;
}

MorphSVGPlugin.convertToPath('polygon'); 
MorphSVGPlugin.convertToPath('ellipse'); 
MorphSVGPlugin.convertToPath('circle'); 

TweenLite.ticker.useRAF(false);

var lightVein = new TimelineMax({repeatDelay:0, delay: 0});
		var darkVein = new TimelineMax({repeatDelay:0, delay: 0});
		var eyeWhite = new TimelineMax({repeatDelay:0, delay: 0});
		var eyeBlue = new TimelineMax({repeatDelay:0, delay: 0});
		var pupil = new TimelineMax({repeatDelay:0, delay: 0});
		var shine = new TimelineMax({repeatDelay:0, delay: 0, onComplete: init});

		lightVein
			.to('#vein-light-01', 5.75, {morphSVG: {shape:'#vein-light-02'}, ease: Elastic.easeOut.config(1, 0.15), y: -170 });
		darkVein
			.to('#veins-01', 5.75, {morphSVG: {shape:'#veins-02'}, ease: Elastic.easeOut.config(1, 0.15), y: -170 });
		eyeWhite
			.to('#eye-white-01', 5.75, {morphSVG: {shape:'#eye-white-02'}, ease: Elastic.easeOut.config(1, 0.15), y: -70 });
		eyeBlue
			.to('#iris-01', 5.75, {morphSVG: {shape:'#iris-02'}, ease: Elastic.easeOut.config(1, 0.15), y: -70 });
		pupil
			.to('#pupil-01', 5.75, {morphSVG: {shape:'#pupil-02'}, ease: Elastic.easeOut.config(1, 0.15), y: -80, x: -10 });
		shine
			.to('#shine-01', 5.75, {morphSVG: {shape:'#shine-02'}, ease: Elastic.easeOut.config(1, 0.15), y: -80, x: -10 });