const registerForm = document.getElementById('registerForm');
if (registerForm) {
    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const username = document.getElementById('username').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const message = document.getElementById('registerMessage');

        if (!username || !email || !password || !confirmPassword) {
            message.textContent = 'Ju lutem plotësoni të gjitha fushat.';
            message.style.color = 'red';
            return;
        }
        if (password !== confirmPassword) {
            message.textContent = 'Fjalëkalimet nuk përputhen.';
            message.style.color = 'red';
            return;
        }
        message.textContent = 'Regjistrimi i suksesshëm!';
        message.style.color = 'green';
        registerForm.reset();
    });
}


const loginForm = document.getElementById('loginForm');
if (loginForm) {
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const email = document.getElementById('emailLogin').value.trim();
        const password = document.getElementById('passwordLogin').value;
        const message = document.getElementById('loginMessage');

        if (!email || !password) {
            message.textContent = 'Ju lutem plotësoni të gjitha fushat.';
            message.style.color = 'red';
            return;
        }
        message.textContent = 'Login i suksesshëm!';
        message.style.color = 'green';
        loginForm.reset();
    });
}
function checkAlgebra(){
    const val = document.getElementById('algebraAnswer').value;
    document.getElementById('algebraResult').textContent = val == 5 ? "Saktë ✅" : "Gabim ❌";
}
function checkGeometry(){
    const val = document.getElementById('geomAnswer').value;
    document.getElementById('geomResult').textContent = val == 20 ? "Saktë ✅" : "Gabim ❌";
}
function checkStatistics(){
    const val = document.getElementById('statsAnswer').value;
    document.getElementById('statsResult').textContent = val == 5 ? "Saktë ✅" : "Gabim ❌";
}
// Funksioni linear f(x) = 2x + 1
function drawAlgebraGraph(){
    const canvas = document.getElementById('algebraCanvas');
    if (!canvas.getContext) return;
    const ctx = canvas.getContext('2d');

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Koordinatat
    const width = canvas.width;
    const height = canvas.height;
    const scaleX = 20; // 1 njësi = 20px
    const scaleY = 20;

    // Vizatimi i boshtit X dhe Y
    ctx.beginPath();
    ctx.moveTo(0, height - height/2);
    ctx.lineTo(width, height - height/2);
    ctx.moveTo(width/2, 0);
    ctx.lineTo(width/2, height);
    ctx.strokeStyle = "#2a9d8f";
    ctx.lineWidth = 2;
    ctx.stroke();

    // Vizato funksionin f(x) = 2x + 1
    ctx.beginPath();
    ctx.strokeStyle = "#e76f51";
    ctx.lineWidth = 3;

    for(let x = -width/2; x <= width/2; x += 1){
        let y = 2*(x/scaleX) + 1;
        let canvasX = x + width/2;
        let canvasY = height/2 - y*scaleY;
        if(x === -width/2) ctx.moveTo(canvasX, canvasY);
        else ctx.lineTo(canvasX, canvasY);
    }
    ctx.stroke();
    ctx.fillStyle = "#264653";
    ctx.font = "14px Arial";
    ctx.fillText("0", width/2 + 5, height/2 + 15);
}
function animateFunction(canvasId, fn, opts={}) {
    const c = document.getElementById(canvasId);
    if (!c) return;
    const ctx = c.getContext("2d");

    const width = c.width;
    const height = c.height;

    const xMin = opts.xMin ?? -10;
    const xMax = opts.xMax ?? 10;
    const yMin = opts.yMin ?? -20;
    const yMax = opts.yMax ?? 20;
    const speed = opts.speed ?? 0.05;

    const px = x => (x - xMin) / (xMax - xMin) * width;
    const py = y => (yMax - y) / (yMax - yMin) * height;

    let x = xMin;

    function frame() {
       
        ctx.clearRect(0, 0, width, height);
        ctx.fillStyle = "#fafffd";
        ctx.fillRect(0, 0, width, height);

        ctx.strokeStyle = "#2a9d8f";
        ctx.lineWidth = 2;

        
        if (yMin <= 0 && yMax >= 0) {
            ctx.beginPath();
            ctx.moveTo(0, py(0));
            ctx.lineTo(width, py(0));
            ctx.stroke();
        }

        
        if (xMin <= 0 && xMax >= 0) {
            ctx.beginPath();
            ctx.moveTo(px(0), 0);
            ctx.lineTo(px(0), height);
            ctx.stroke();
        }

      
        ctx.strokeStyle = opts.color ?? "#e76f51";
        ctx.lineWidth = 3;
        ctx.beginPath();

        let first = true;
        for (let t = xMin; t <= x; t += 0.1) {
            const yy = fn(t);
            if (!isFinite(yy)) continue;
            if (first) {
                ctx.moveTo(px(t), py(yy));
                first = false;
            } else {
                ctx.lineTo(px(t), py(yy));
            }
        }
        ctx.stroke();

        x += speed;
if (x > xMax) x = xMin; 
requestAnimationFrame(frame);

    }

    frame();
}

window.addEventListener("load", () => {

    animateFunction(
        "animLinear",
        x => 2 * x + 1,
        { xMin: -10, xMax: 10, yMin: -20, yMax: 20, color: "#1f77b4", speed: 0.05 }
    );

    animateFunction(
        "animQuadratic",
        x => x*x - 2*x - 3,
        { xMin: -10, xMax: 10, yMin: -20, yMax: 40, color: "#d62828", speed: 0.04 }
    );

    animateFunction(
        "animCubic",
        x => 0.1 * x*x*x - x,
        { xMin: -10, xMax: 10, yMin: -50, yMax: 50, color: "#2ca02c", speed: 0.03 }
    );

});




navigator.mediaDevices.getUserMedia({video:true,audio:true})
.then(stream=>{
 document.getElementById("cam").srcObject=stream;
});







function animatedGraph(canvasId, func, color="#3498db") {
    const canvas = document.getElementById(canvasId);
    const ctx = canvas.getContext("2d");

    canvas.width = 380;
    canvas.height = 150;

    let offset = -5;

    function draw() {
        ctx.clearRect(0,0,canvas.width,canvas.height);

        const w = canvas.width;
        const h = canvas.height;

        
        ctx.strokeStyle = "#aaa";
        ctx.beginPath();
        ctx.moveTo(0, h/2);
        ctx.lineTo(w, h/2);
        ctx.moveTo(w/2, 0);
        ctx.lineTo(w/2, h);
        ctx.stroke();

        
        ctx.strokeStyle = color;
        ctx.lineWidth = 2;
        ctx.beginPath();

        let first = true;
        for(let x=-5; x<=offset; x+=0.05){
            let y = func(x);

            let px = w/2 + x*35;
            let py = h/2 - y*15;

            if(first){
                ctx.moveTo(px,py);
                first=false;
            }else{
                ctx.lineTo(px,py);
            }
        }
        ctx.stroke();

        offset += 0.05;
        if(offset > 5) offset = -5;

        requestAnimationFrame(draw);
    }

    draw();
}


animatedGraph("g1", x => x, "#e74c3c");            
animatedGraph("g2", x => x*x, "#2ecc71");          
animatedGraph("g3", x => 0.1*x*x*x - x, "#3498db");
animatedGraph("g4", x => Math.sin(x), "#f1c40f");   
animatedGraph("g5", x => Math.cos(x), "#9b59b6");   




function check(inputId, correct, resultId){
    const val = document.getElementById(inputId).value;
    const res = document.getElementById(resultId);

    if(val == correct){
        res.textContent = "✓ Saktë!";
        res.classList.remove("wrong");
        res.classList.add("correct");
    }else{
        res.textContent = "✗ Provoni përsëri!";
        res.classList.remove("correct");
        res.classList.add("wrong");
    }
}
