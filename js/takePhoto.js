let webcamStream;

function startWebcam() {
    // запросить видео и аудио поток с веб-камеры пользователя
    navigator.mediaDevices.getUserMedia({
        video: true
    }).then((stream) => {
        let video = document.querySelector('#video');
        video.srcObject = stream;
        video.play();

        webcamStream = stream;
    }).catch((error) => {
        console.log('navigator.getUserMedia error: ', error);
    });
}

function stopWebcam() {
    webcamStream.getTracks()[0].stop(); // video
}

var canvas, ctx;

function init() {
    // Получить холст и получить контекст для
    // рисования в нём
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext('2d');
}

function switchFilter() {

}

function snapshot() {
    // Рисует текущее изображение из видео элемента в холст
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
}

function checkedFilter() {
    let filters = document.getElementById("filters")
    let inputs = filters.getElementsByTagName('input');
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].checked) {
            if (inputs[i].value == 'GTA')
                return document.getElementById("imgGTA").getAttribute('src');
            else if (inputs[i].value == 'wall')
                return document.getElementById("wall").getAttribute('src');
            else if (inputs[i].value == 'paint')
                return document.getElementById("paint").getAttribute('src');
            else if (inputs[i].value == 'woman')
                return document.getElementById("woman").getAttribute('src');
            else if (inputs[i].value == 'rus')
                return document.getElementById("rus").getAttribute('src');
            else if (inputs[i].value == 'arms')
                return document.getElementById("arms").getAttribute('src');
            else if (inputs[i].value == 'angel')
                return document.getElementById("angel").getAttribute('src');
        }
    }
}

function createPhotoFilter() {
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext('2d');

    let image_cam = new Image();
    image_cam.src = canvas.toDataURL();

    image_cam.onload = function () {
        ctx.drawImage(image_cam, 0, 0, 320, 240);
        let image_filter = new Image();
        image_filter.src = checkedFilter();
        image_filter.onload = function () {
            // if (image_filter.src = 'images/gtavice.png') {
            //     ctx.drawImage(image_filter, 170, -20, 150, 120);
            // } else {
                ctx.drawImage(image_filter, 0, 0, 320, 243);
            // }
            let Newimg = canvas.toDataURL("image/png");
            canvas.setAttribute('img', Newimg);
        }
    };
}

let makeEffect = document.getElementById("makeEffect");

makeEffect.addEventListener("click", function () {
    createPhotoFilter();
});

function isCanvasBlank(canvas) {
    return !canvas.getContext('2d')
        .getImageData(0, 0, canvas.width, canvas.height).data
        .some(channel => channel !== 0);
}


async function addToDraft() {
    let picture = document.getElementById("canvas");
    if (isCanvasBlank(picture) === false) {
        picture = picture.toDataURL();
        let data = new FormData();
        data.append('file', picture);
        const response = await fetch('/addpost/createDraft', {
            method: 'POST',
            body: data
        });
        location.reload();

        console.log(data);
        console.log(picture);
        // alert(await response.text());
    }
}


// let feedAllDrafts = document.getElementById("feedAllDrafts");
// let basicpost = document.createElement('div');
// basicpost.id = "draftFeed";
// let photo = document.createElement("img");
// photo.id = "yourphoto";
// photo.setAttribute("src", picture);
// basicpost.appendChild(photo);
// feedAllDrafts.append(basicpost);


//
// let readyimg = document.createElement("img");
// document.getElementById("")
//
// createimg.setAttribute("src", picture);
// document.getElementById("draftFeed").appendChild(createimg);

// function makeFilter() {


// let picture = canvas.toDataURL();
// console.log(picture);
// const xhr = new XMLHttpRequest();
// xhr.open('POST', '/addpost/createDraft');
// xhr.send();


//     canvas = document.getElementById("canvas");
//     ctx = canvas.getContext('2d');
//
//     let image_cam = new Image();
//     image_cam.src = canvas.toDataURL();
//
//     image_cam.onload = function () {
//         ctx.drawImage(image_cam, 0, 0, 320, 240);
//         let image_filter = new Image();
//         image_filter.src = checkedFilter();
//         image_filter.onload = function () {
//             ctx.drawImage(image_filter, 0, 0, 320, 240);
//             let img = canvas.toDataURL("image/png");
//             canvas.setAttribute('img', img);
//         }
//     };
//
// }


// xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//
// xhr.onreadystatechange = function() {
//     if ((this.readyState == 4) && (this.status == 200))
//     {
//         new_thumb = document.createElement("img");
//         document.getElementById("feedAllDrafts").appendChild(new_thumb);
//         new_thumb.setAttribute("src", this.response);
//         new_thumb.setAttribute("id", this.response);
//         new_thumb.setAttribute("onClick", `deleteImage("${this.response}")`);
//     }
//
// }
// // const data = "superposable=" + checkedBox + "&image=" + picture;
// const data = "&image=" + picture;


// const startMedia = () => {
//     if (!("mediaDevices" in navigator)) {
//         navigator.mediaDevices = {};
//     }
//
//     if (!("getUserMedia" in navigator.mediaDevices)) {
//         navigator.mediaDevices.getUserMedia = constraints => {
//             const getUserMedia =
//                 navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
//
//             if (!getUserMedia) {
//                 return Promise.reject(new Error("getUserMedia is not supported"));
//             } else {
//                 return new Promise((resolve, reject) =>
//                     getUserMedia.call(navigator, constraints, resolve, reject)
//                 );
//             }
//         };
//     }
//
//     navigator.mediaDevices
//         .getUserMedia({video: true})
//         .then(stream => {
//             videoPlayer.srcObject = stream;
//             videoPlayer.style.display = "block";
//         })
//         .catch(err => {
//             imagePickerArea.style.display = "block";
//         });
// };
//
// // Capture the image, save it and then paste it to the DOM
// captureButton.addEventListener("click", event => {
//     // Draw the image from the video player on the canvas
//     canvasElement.style.display = "block";
//     const context = canvasElement.getContext("2d");
//     context.drawImage(videoPlayer, 0, 0, canvas.width, canvas.height);
//
//     videoPlayer.srcObject.getVideoTracks().forEach(track => {
//         // track.stop();
//     });
//
//     // Convert the data so it can be saved as a file
//     let picture = canvasElement.toDataURL();
//
//     // Save the file by posting it to the server
//     fetch("", {
//         method: "post",
//         body: JSON.stringify({data: picture})
//     })
//         .then(res => res.json())
//         .catch(error => console.log(error));
// });
//
// window.addEventListener("load", event => startMedia());
