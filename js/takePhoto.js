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

function snapshot() {
    // Рисует текущее изображение из видео элемента в холст
    ctx.drawImage(video, 0,0, canvas.width, canvas.height);
}

function addToDraft() {
    let picture = canvas.toDataURL();
    // console.log(picture);
    // const xhr = new XMLHttpRequest();
    // xhr.open('POST', '/addpost/createDraft');
    // xhr.send();

    fetch('/addpost/createDraft', {
        method : 'post',
        body   : "HELLO"
    });

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
    // xhr.send(data);
}




























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
