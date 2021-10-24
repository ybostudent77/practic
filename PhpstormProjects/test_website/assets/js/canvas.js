
function canvas(selector, options) {
    const canvas = document.querySelector(selector);
    canvas.classList.add('canvas')
    canvas.setAttribute('width', `${options.width || 400}px`)
    canvas.setAttribute('height', `${options.height || 300}px`)

    const context = canvas.getContext('2d')
    const rect = canvas.getBoundingClientRect();
    let isPaint = false // чи активно малювання
    let points = [] //масив з точками


    const addPoint = (x, y, dragging) => {
        // преобразуємо координати події кліка миші відносно canvas
        points.push({
            x: (x - rect.left),
            y: (y - rect.top),
            dragging: dragging
        })
    }

    // головна функція для малювання
    const redraw = () => {
        //очищуємо  canvas
        context.clearRect(0, 0, context.canvas.width, context.canvas.height);

        context.strokeStyle = options.strokeColor;
        context.lineJoin = "round";
        context.lineWidth = options.strokeWidth;
        let prevPoint = null;
        for (let point of points) {
            context.beginPath();
            if (point.dragging && prevPoint) {
                context.moveTo(prevPoint.x, prevPoint.y)
            } else {
                context.moveTo(point.x - 1, point.y);
            }
            context.lineTo(point.x, point.y)
            context.closePath()
            context.stroke();
            prevPoint = point;
        }
    }

    // функції обробники подій миші
    const mouseDown = event => {
        isPaint = true
        addPoint(event.pageX, event.pageY);
        redraw();
    }

    const mouseMove = event => {
        if (isPaint) {
            addPoint(event.pageX, event.pageY, true);
            redraw();
        }
    }

// додаємо обробку подій
    canvas.addEventListener('mousemove', mouseMove)
    canvas.addEventListener('mousedown', mouseDown)
    canvas.addEventListener('mouseup', () => {
        isPaint = false;
    });
    canvas.addEventListener('mouseleave', () => {
        isPaint = false;
    });
    document.getElementById('color-picker').addEventListener('click', function (e) {
        console.log(e.target.value);
        canvas.strokeColor.color = e.target.value;
    });
    showTime()
    // TOOLBAR
    const toolBar = document.getElementById('toolbar')
// clear button

    const clearBtn = document.createElement('button')
    clearBtn.classList.add('btn')
    clearBtn.textContent = 'Clear'
    clearBtn.addEventListener('click', () => {
        context.clearRect(0, 0, context.canvas.width, context.canvas.height);


    })
    toolBar.insertAdjacentElement('afterbegin', clearBtn)

    const saveBtn = document.createElement('button')
    saveBtn.classList.add('btn')
    saveBtn.textContent = 'Save'

    saveBtn.addEventListener('click', () => {
        localStorage.setItem(points, JSON.stringify(points));
        points = JSON.parse(localStorage.getItem("points"));
        console.log(typeof points); // объект
        console.log(points);

    })
    toolBar.insertAdjacentElement('afterbegin', saveBtn)



    const restoreBtn = document.createElement('button')
    restoreBtn.classList.add('btn')
    restoreBtn.textContent = 'Restore'


    restoreBtn.addEventListener('click', () => {
        let stringyfied_points = localStorage.getItem('points');
        points = JSON.parse(stringyfied_points);
        isPaint= true;
        redraw();
        isPaint = false;
    })
    toolBar.insertAdjacentElement('afterbegin', restoreBtn)




    function showTime() {
        const ctx = document.getElementById('draw').getContext('2d');
        ctx.font = '16px serif';
        let now = new Date()
        alert( now.getHours() );
        ctx.fillText(now.toString() , 5, 15);


    }


}






