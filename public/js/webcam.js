const preview = document.getElementById("preview");
const capture = document.getElementById("capture");
const output = document.getElementById("output");
const result = document.getElementById("result");
const btnUpload = document.getElementById("btnUpload");
const picture = document.getElementById("picture");

navigator.mediaDevices
    .getUserMedia({
        audio: false,
        video: {
            width: 200,
            height: 200,
        },
    })
    .then((stream) => {
        preview.srcObject = stream;
        preview.play();
    })
    .catch((error) => {
        console.log(error);
    });

capture.addEventListener("click", () => {
    const context = output.getContext("2d");

    output.width = 200;
    output.height = 200;

    context.drawImage(preview, 0, 0, output.width, output.height);
    result.src = output.toDataURL();

    picture.value = result.src;

    console.log(picture.value);
});
